<div>
    @section('title','Notulen Rapat')
    @section('section-header','Notulen Rapat')
        @push('page_specific_css')
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
        @endpush
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4>Notula</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form wire:submit.prevent="storeRapat">
                                <fieldset class="border p-4">
                                    <legend  class="w-auto"style="font-size: 1.3em;"><strong>Keterangan Notula</strong></legend>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Kantor</label>
                                                <div class="col-sm-8">
                                                    <select wire:model="newRapat.office_code" class="form-control">
                                                        <option selected>--Pilih Kantor--</option>
                                                        @foreach ($offices as $office)
                                                            <option value="{{$office->code}}">{{$office->code." - ".$office->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Tanggal</label>
                                                <div class="col-sm-8">
                                                    <input wire:model="newRapat.tanggal" type="date" class="form-control datetimepicker">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label datetimepicker">Jam</label>
                                                <div class="col-sm-8">
                                                    <input wire:model="newRapat.jam" type="time" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Tempat</label>
                                                <div class="col-sm-8">
                                                    <input wire:model="newRapat.tempat" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Pimpinan</label>
                                                <div class="col-sm-8">
                                                    <input wire:model="newRapat.pimpinan" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Dihadiri</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div wire:ignore class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Peserta</label>
                                                <div class="col-sm-8">                                                        
                                                    <select class="form-control select2" multiple="" id="peserta-rapat">
                                                        @foreach ($pegawai as $itemPegawai)
                                                        <option value="{{$itemPegawai->id}}">{{$itemPegawai->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div wire:ignore class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Notulis</label>
                                                <div class="col-sm-8">                                                        
                                                    <select class="form-control select2" id="notulis">
                                                        <option>--Pilih Notulis--</option>
                                                        @foreach ($pegawai as $itemPegawai)
                                                        <option value="{{$itemPegawai->id}}">{{$itemPegawai->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-2 col-form-label">Pembahasan</label>
                                                <div class="col-sm-10">
                                                    <textarea wire:model='newRapat.pembahasan' class="form-control summernote" name="" id="" cols="50" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="buttons">
                                                <button type="#" class="btn btn-primary float-right">
                                                    Simpan
                                                </button>
                                                <button type="submit" class="btn btn-danger float-right">
                                                    Batal
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @push('page_specific_js')
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
            <script>
                $(document).ready(function(){
                    $('#peserta-rapat').change(function(e){
                        let value = $(this).val();
                        @this.set('newPesertaRapat',value);
                    });
                    $('#notulis').change(function(e){
                        let value = $(this).val();
                        @this.set('newNotulis',value);
                    });
                });
            </script>
            {{-- <script src="{{asset('stisla/js/page/forms-advanced-forms.js')}}"></script> --}}
        @endpush
</div>
