<div>
        @section('title','Isi Notulen')
        @section('section-header','Isi Notulen')
        @push('page_specific_css')
        <style>
            .top-left{
                vertical-align: top;
                align:left;    
            }
            .top-center{
                vertical-align: top;
                text-align:center;    
            }
            .pendapat-area{
                min-height: 200px;
            }
            .div.card-body{
                padding:5px;
            }
        </style>
        @endpush
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="container">
                                <div class="title">
                                    <h4 align="center">NOTULEN</h4>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <table>
                                            <tr>
                                                <td>Hari, Tanggal</td>
                                                <td align="center" width="10%">:</td>
                                                <td>{{$rapat->tanggal}}</td>
                                            </tr>
                                            <tr>
                                                <td>Waktu</td>
                                                <td align="center" width="10%">:</td>
                                                <td>{{$rapat->jam}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat</td>
                                                <td align="center" width="10%">:</td>
                                                <td>{{$rapat->tempat}}</td>
                                            </tr>
                                            <tr>
                                                <td>Pimpinan</td>
                                                <td align="center" width="10%">:</td>
                                                <td>{{$rapat->pimpinan}}</td>
                                            </tr>
                                            <tr>
                                                <td>Dihadiri</td>
                                                <td align="center" width="10%">:</td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <table>   
                                            <tr>
                                                <td class="top-left"><b>Peserta Rapat</b></td>
                                            </tr>                                         
                                            <tr>
                                                <td colspan="3" class="pt-2">
                                                    @foreach ($peserta as $pesertaItem)
                                                        <li type="1">{{ucfirst(strtolower($pesertaItem->nama))}}</li>
                                                    @endforeach
                                                </td>                                            
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div>
                                    <div class="mt-5">
                                        <p><strong>Pembahasan</strong></p>
                                        <p align="justify">
                                            {{$rapat->pembahasan}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4><strong>Input Pendapat Peserta Rapat</strong></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <form wire:submit.prevent="storePendapat">
                                            <select wire:model="newPendapat.pegawai_id" class="form-control mb-3 mt-0 @error('newPendapat.pegawai_id') is-invalid @enderror">
                                                <option selected>-- Pilih Peserta --</option>
                                                @foreach ($peserta as $pesertaItem)
                                                    <option  value="{{$pesertaItem->id}}">{{$pesertaItem->nama}}</option>
                                                @endforeach
                                            </select>
                                            @error('newPendapat.pegawai_id')                                                
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <textarea wire:model='newPendapat.pendapat' class="form-control summernote pendapat-area mb-3 @error('newPendapat.pendapat') is-invalid @enderror" id="" cols="30" rows="10"></textarea>
                                            @error('newPendapat.pendapat')                                                
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <button type="submit" class="btn btn-success float-right">Tambah Pendapat</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                @forelse($rapat->pendapat->sortByDesc('created_at') as $itemPendapat)
                <div class="card px-0">
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                            <li class="media">
                                <img alt="image" class="mr-3 rounded-circle" width="40" src="{{ asset('img/avatar-1.png') }}">
                                <div class="media-body">
                                    <div class="media-title">
                                        {{$itemPendapat->pegawai->nama." (".$itemPendapat->pegawai->jabatan->nama." ".$itemPendapat->pegawai->bagian->nama.")"}}
                                    </div>
                                    <div class="media-description text-muted"><p align="justify" style="line-height: 1.3">{{$itemPendapat->pendapat}}</p></div>
                                    <div class="media-links">
                                        <div class="media-links mb-0">
                                            <a class="card-link" href="#" wire:click.prevent="deleteConfirm('{{$itemPendapat->id}}','{{$itemPendapat->pendapat}}')">
                                                edit
                                            </a>
                                        <div class="bullet"></div>
                                            <a class="card-link text-danger" href="#" wire:click.prevent="deleteConfirm('{{$itemPendapat->id}}','{{$itemPendapat->pendapat}}')">
                                                hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @empty
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h6>Belum ada pendapat</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
</div>
