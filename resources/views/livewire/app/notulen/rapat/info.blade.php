<div>
    @section('title','Notulen Verifikasi')
    @push('page_specific_css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Titillium Web', sans-serif;
        }
    </style>
    @endpush
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <img src="{{asset('img/img/cij-logo.png')}}" alt="" height="50px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4>Verifikasi Dokumen</h4>
                            <h6>PT BPR CIPATUJAH JABAR PERSERODA</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h6>Jenis Dokumen</h6>
                            <p>Notulen Rapat</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <h6>No Registrasi</h6>
                            <p>{{$rapat->no_registrasi}}</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <h6>Tanggal Rapat</h6>
                            <p>{{$waktu_rapat}}</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <h6>Pembahasan</h6>
                            <p align="justify">{{$rapat->pembahasan}}</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <label><strong>Peserta Rapat</strong></label>
                            <div class="row">
                                <div class="col">
                                    @forelse ($rapat->peserta->sortByDesc('jabatan_id') as $itemPeserta)
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                                <li class="media">
                                                    <img alt="image" class="mr-3 rounded-circle" height="50" width="50" src="{{ $itemPeserta->foto}}">
                                                    <div class="media-body">
                                                        <div class="media-title">
                                                            {{ucwords(strtolower($itemPeserta->nama))}}
                                                        </div>
                                                        <div class="media-description text-muted"><p align="justify" style="line-height: 1.3">{{$itemPeserta->jabatan->nama." ".$itemPeserta->bagian->nama}}</p></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>                                      
                                    @empty
                                        <div class="card">
                                            <div class="card-body">
                                                <p>Tidak ada peserta rapat!</p>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <img src="data:image/png;base64,{{base64_encode(QrCode::format('png')->size(120)->merge('img/logo-50.png',.3,true)->generate($rapat->link_notulen))}}"/>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col text-center">
                            <h6><i class="fas fa-check-circle text-success"></i> Dokumen tercatat sebagai dokumen notulen rapat.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
