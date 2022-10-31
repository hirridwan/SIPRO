<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>    
    <style type="text/css">
        @font-face{
            font-family: 'titillium';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url('fonts/Titillium/TitilliumWeb-Regular.ttf')format('truetype');
        }
        *{
            font-family: 'titillium',sans-serif;
            font-size: 11pt;
        }
        @media print {
            @page {
                margin-top: 0.2cm;
                margin-bottom: 0;
            }
        }
        body {
            background: rgb(255, 255, 255); 
            display: flex;
            min-height: 100vh;
        }
        page {
            display: flex;
            background: white;
            display: block;
            margin: auto;
        }
        page[size="A4"] {  
          width: 20.5cm;
          height: 29cm; 
        }
        page[size="A4"][layout="landscape"] {
          width: 29.7cm;
          height: 21cm;  
        }
        page[size="A3"] {
          width: 29.7cm;
          height: 42cm;
        }
        page[size="A3"][layout="landscape"] {
          width: 42cm;
          height: 29.7cm;  
        }
        page[size="A5"] {
          width: 14.8cm;
          height: 21cm;
        }
        page[size="A5"][layout="landscape"] {
          width: 21cm;
          height: 14.8cm;  
        }
        @media print {
          body, page {
            margin: 0;
            box-shadow: 0;
          }
        }
        .notulis{
            width: 300px;
            display: inline-block;
            position: relative;
            left: 0;
            height: 100px;
            text-align: center;
            right: 0px;
        }
        .notulis-label{
            position: relative;
            bottom: -20px;
        }
        .notulis-ttd{
            position: relative;
            height: 100px;
            z-index: 1000;
        }
        .notulis-ttd-box{
            position: relative;
            height: 150px;
            z-index: 1;
        }
        .notulis-nama{
            position: relative;
            top: -30px;
        }
        .ttd{
            display: flex;
            height: 70px;
            z-index: 100;
        }
        .qrcode-box{
            position: relative;
            display: flex;
            bottom: 0px;
        }
        .qrcode{
            margin-top: 5px;
            position: relative;
        }
    </style>
</head>
<body>
    <page size="A4">
        <div class="header">
            <img height="65px" src="{{$logo}}"/>
        </div>
        <h5 align="center">NOTULEN</h5>
        <table class="font-10">
            <tr>
                <td>Hari, Tanggal</td>
                <td>:</td>
                <td>{{$waktu_rapat}}</td>
            </tr>
            <tr>
                <td>Jam</td>
                <td>:</td>
                <td>{{$rapat->jam}}</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>{{$rapat->tempat}}</td>
            </tr>
            <tr>
                <td>Pimpinan</td>
                <td>:</td>
                <td>{{$rapat->pimpinan}}</td>
            </tr>
            <tr>
                <td class="top-left">Peserta</td>
                <td class="top-center">:</td>
                <td class="top-center"></td>
            </tr>
            <tr>
                <td class="top-left px-0" colspan="3">
                    <ul>
                    @forelse($rapat->peserta->sortByDesc('jabatan_id') as $peserta)
                        <li type="1">{{ucwords(strtolower($peserta->nama))}}</li>
                    @empty
                        <li>-</li>
                    @endforelse
                    </ul>
                </td>
            </tr>
        </table>
        <h5>Pembahasan</h5>
        <p class="font-10">{{$rapat->pembahasan}}</p>              

        @forelse ($rapat->peserta->sortByDesc('jabatan_id') as $itemPeserta)
            @if($itemPeserta->pendapat->where('rapat_id',$rapat->id)->where('pegawai_id',$itemPeserta->id)->count()>0)
            <h5>{{ucwords(strtolower($itemPeserta->nama))." (".$itemPeserta->jabatan->nama." ".$itemPeserta->bagian->nama.")"}}</h5>
            <ul>
                @foreach ($itemPeserta->pendapat->sortBy('id') as $itemPendapat)
                    @if($itemPendapat->rapat_id==$rapat->id)
                        <li type="1" class="font-10">{{$itemPendapat->pendapat}}</li>
                    @endif
                @endforeach
            </ul>
            @endif

        @empty
            <h5>Tidak ada pendapat!</h5>
        @endforelse
        <table width="100%">
            <tr>
                <td width="70%">
                    <div class="qrcode-box">
                        <img src="data:image/png;base64,{{base64_encode(QrCode::format('png')->size(100)->merge('img/logo-50.png',.3,true)->generate($rapat->link_notulen))}}"/>
                    </div>
                </td>
                <td>
                    <div align="right">
                        <div class="notulis">
                            <div class="notulis-label">
                                <label align="center" for="">Notulis,</label>
                            </div>
                            <div class="notulis-box" align="center">
                                <img class="notulis-ttd" height="70px"src="{{$rapat->notulis->ttd}}" alt="">
                            </div>
                            <div class="notulis-nama">
                                <strong>{{$rapat->notulis->nama}}</strong>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
        </table>
    </page>
</body>
</html>