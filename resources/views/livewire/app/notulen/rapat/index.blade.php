<div>
        @section('title','Rapat')
        @section('section-header','Rapat')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Notulen</h4>
                    </div>
                    <div class="card-body">
                    
                    <div class="buttons">
                        <a
                            href="{{route('notulen.rapat.register')}}"
                            type="button"
                            class="btn btn-success mb-4"
                            >
                            <i class="fas fa-plus-square"></i> <span>Buat Rapat</span>
                        </a>
                    </div>
        
                    {{-- filter dan pencarian start --}}
                    <div class="row mb-3">
                        <div class="col-md-2 d-flex align-items-center float-right">
                        Tampilkan
                        <select class="form-control mx-1" wire:model='paginate'>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        data
                        </div>
                        <div class="col-md-7 text-right d-flex align-middle"></div>
                        <div class="col-md-3 pull-right">
                        <input wire:model="querySearch" type="text" class="form-control" placeholder="Cari"/>
                        </div>
                    </div>
                    {{-- filter dan pencarian end --}}
        
                    <div class="table-responsive" style="font-size: 10pt;">
                        <table class="table table-striped table-md">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pembahasan</th>
                                <th>Tempat</th>
                                <th>Peserta</th>
                                <th colspan="4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rapat as $rapatItem)
                            <tr align="center">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$rapatItem->tanggal}}</td>
                                <td align="justify">{{$rapatItem->pembahasan}}</td>
                                <td>{{$rapatItem->tempat}}</td>
                                <td><a href="#" wire:click.prevent="showModalPeserta({{$rapatItem->id}})"><i class="fas fa-users text-primary"  data-toggle="tooltip" data-placement="top" title="Lihat Peserta Rapat"></i></a></td>
                                <td><a href="{{url($rapatItem->link_notulen)}}" target="_blank"><i class="fas fa-info text-danger"  data-toggle="tooltip" data-placement="top" title="Info Dokumen"></i></a></td>
                                <td><a href="/notulen/rapat/isi-notulen/{{$rapatItem->id}}"><i class="fas fa-pen-alt text-danger"  data-toggle="tooltip" data-placement="top" title="Isi Notulen"></i></a></td>
                                <td><a href="/notulen/rapat/detail/{{$rapatItem->id}}" alt="cetak" target="_blank"><i class="fa fa-eye"  data-toggle="tooltip" data-placement="top" title="Preview"></i></a></td>
                                <td><a href="#" wire:click.prevent="printNotulen('{{$rapatItem->id}}')" target="_blank"><i class="fas fa-print text-success" data-toggle="tooltip" data-placement="top" title="Print Notulen"></i></a></td>
                            </tr>
                            @empty  
                                <tr>
                                    <td colspan="1000">Data tidak ditemukan!</td>
                                </tr>
                            @endforelse
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        

        {{-- Modal Peserta Start --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="modalPeserta">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Daftar Peserta Rapat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <td><strong>No</strong></td>
                                    <td><strong>Nama Peserta</strong></td>
                                    <td align="center"><strong>Kehadiran</strong></td>
                                </tr>
                            </thead>
                            @if($peserta)
                                @forelse($peserta->sortByDesc('jabatan_id') as $itemPeserta)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$itemPeserta->nama}}</td>
                                    <td align="center"><i class="fas fa-check-circle"></i></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">Tidak ada data peserta rapat!</td>
                                </tr>
                                @endforelse
                            @else 
                                <td>no data</td>
                            @endif
                        </table>
                    </div>
                    {{-- <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- Modal Peserta End --}}
        @push('page_specific_js')
        <script src="{{asset('stisla/js/page/bootstrap-modal.js')}}"></script>
        <script>
            window.addEventListener('show-modal-peserta',event=>{
                $('#modalPeserta').appendTo('body').modal('show');
            });
        </script>
        @endpush
</div>
