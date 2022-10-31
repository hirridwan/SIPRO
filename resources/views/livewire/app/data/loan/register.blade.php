<div>
    @section('title','Register Kredit')
    @section('section-header','Register Kredit')
    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Masukan Nomor CIF</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    @if(Auth::user()->role->id == 1)
                                    <div class="col-lg-7">
                                        <div wire:ignore class="mb-3">
                                            <label for="officeId">Kantor Bank</label>
                                            <select wire:model="officeId" id="officeId" class="form-control select2 @error('officeId') is-invalid @enderror">
                                                @foreach($offices as $office)
                                                    @if($office->id==$officeId)
                                                        <option value="{{$office->code}}" selected>{{$office->code." - ".$office->name}}</option>
                                                    @else
                                                        <option value="{{$office->code}}">{{$office->code." - ".$office->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('officeId')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    @else 
                                    <div class="col-lg-7">
                                        <div wire:ignore class="mb-3">
                                            <label for="officeId">Kantor Bank</label>
                                            <select wire:model="officeId" id="officeId" class="form-control select2 @error('officeId') is-invalid @enderror" disabled>
                                                <option value="{{Auth::user()->office->code}}" selected>{{Auth::user()->office->code." - ".Auth::user()->office->name}}</option>
                                            </select>
                                            @error('officeId')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="cif" class="form-label">No CIF</label>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mx-0">
                                                    <input wire:model="cif" type="text" class="form-control @error('cif') is-invalid @enderror" placeholder="Masukan Nomor CIF">
                                                    @error('cif')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 align-self-center">
                                                <button wire:click.prevent="getCif" class="btn btn-primary">Cek</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="customerData.name" class="form-label">Nama Nasabah</label>
                                            <input wire:model.defer="customerData.name" type="text" class="form-control @error('customerData.name') is-invalid @enderror" id="loan_id" disabled>
                                        </div>  
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="mb-3">
                                            <label for="customerData.address" class="form-label">Alamat</label>
                                            <input wire:model.defer="customerData.address" type="text" class="form-control @error('customerData.address') is-invalid @enderror" id="loan_id" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="loan_id" class="form-label">No Rekening</label>
                                            <input wire:model.defer="loan_id" type="text" class="form-control @error('loan_id') is-invalid @enderror" id="loan_id">
                                            @error('loan_id')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="plafon" class="form-label">Plafon</label>
                                            <input wire:model.defer="plafon" type="text" class="form-control @error('plafon') is-invalid @enderror" id="plafon">
                                            @error('plafon')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="interest" class="form-label">Suku Bunga Per Tahun</label>
                                            <input wire:model.defer="interest" type="text" class="form-control @error('interest') is-invalid @enderror" id="interest">
                                            @error('interest')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="provision" class="form-label">Provisi (Persen)</label>
                                            <input wire:model.defer="provision" type="text" class="form-control @error('provision') is-invalid @enderror" id="provision">
                                            @error('provision')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="period" class="form-label">Jangka Waktu (Bulan)</label>
                                            <input wire:model.defer="period" type="text" class="form-control @error('period') is-invalid @enderror" id="period">
                                            @error('period')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                                            <input wire:model.defer="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date">
                                            @error('start_date')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="due_date" class="form-label">Tanggal Jatuh Tempo</label>
                                            <input wire:model.defer="due_date" type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date">
                                            @error('due_date')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="loan_count" class="form-label">Pinjaman Ke</label>
                                            <input wire:model.defer="loan_count" type="text" class="form-control @error('loan_count') is-invalid @enderror" id="loan_count">
                                            @error('loan_count')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="loan_arrear" class="form-label">Tunggakan Pokok</label>
                                            <input wire:model.defer="loan_arrear" type="text" class="form-control @error('loan_arrear') is-invalid @enderror" id="loan_arrear">
                                            @error('loan_arrear')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="interest_arrear" class="form-label">Tunggakan Bunga</label>
                                            <input wire:model.defer="interest_arrear" type="text" class="form-control @error('interest_arrear') is-invalid @enderror" id="interest_arrear">
                                            @error('interest_arrear')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="loan_arrear_day" class="form-label">Tunggakan Pokok Hari</label>
                                            <input wire:model.defer="loan_arrear_day" type="text" class="form-control @error('loan_arrear_day') is-invalid @enderror" id="loan_arrear_day">
                                            @error('loan_arrear_day')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="interest_arrear_day" class="form-label">Tunggakan Bunga Hari</label>
                                            <input wire:model.defer="interest_arrear_day" type="text" class="form-control @error('interest_arrear_day') is-invalid @enderror" id="interest_arrear_day">
                                            @error('interest_arrear_day')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="installment_system_code" class="form-label">Sistem Angsuran</label>
                                            <select wire:model="installment_system_code" class="form-control @error('installment_system_code') is-invalid @enderror">
                                                <option selected>-- Pilih Sistem Angsuran --</option>
                                                @foreach($installmentSystems as $installmentSystem)
                                                <option value="{{$installmentSystem->code}}">{{$installmentSystem->code." - ".$installmentSystem->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('installment_system_code')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>                                   
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="interest_system_code" class="form-label">Sistem Bunga</label>
                                            <select wire:model="interest_system_code" class="form-control @error('interest_system_code') is-invalid @enderror">
                                                <option selected>-- Pilih Sistem Bunga --</option>
                                                @foreach($interestSystems as $interestSystem)
                                                <option value="{{$interestSystem->code}}">{{$interestSystem->code." - ".$interestSystem->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('interest_system_code')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="usage_type_code" class="form-label">Jenis Penggunaan</label>
                                            <select wire:model="usage_type_code" class="form-control @error('usage_type_code') is-invalid @enderror">
                                                <option selected>-- Pilih Jenis Penggunaan--</option>
                                                @foreach($usageTypes as $usageType)
                                                <option value="{{$usageType->code}}">{{$usageType->code." - ".$usageType->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('usage_type_code')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="loan_product_code" class="form-label">Skim / Produk Kredit</label>
                                            <select wire:model="loan_product_code" class="form-control @error('loan_product_code') is-invalid @enderror">
                                                <option selected>-- Pilih Sistem Angsuran --</option>
                                                @foreach($loanProducts as $loanProduct)
                                                <option value="{{$loanProduct->code}}">{{$loanProduct->code." - ".$loanProduct->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('loan_product_code')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="quality_id" class="form-label">Kualitas Kredit</label>
                                            <select wire:model="quality_id" class="form-control @error('quality_id') is-invalid @enderror">
                                                <option selected>-- Pilih Kualitas Kredit --</option>
                                                @foreach($loanQualities as $loanQuality)
                                                <option value="{{$loanQuality->id}}">{{$loanQuality->code." - ".$loanQuality->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('quality_id')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="outstanding" class="form-label">Baki Debet</label>
                                            <input wire:model.defer="outstanding" type="text" class="form-control @error('outstanding') is-invalid @enderror" id="outstanding">
                                            @error('outstanding')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="penalty" class="form-label">Denda</label>
                                            <input wire:model.defer="penalty" type="text" class="form-control @error('penalty') is-invalid @enderror" id="penalty">
                                            @error('penalty')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="buttons float-right">
                                    <input type="submit" class="btn btn-primary" name="" id="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('page_specific_js')
    <script>
        let plafon = document.getElementById('plafon');
        let loan_arrear = document.getElementById('loan_arrear');
        let interest_arrear = document.getElementById('interest_arrear');
        let outstanding = document.getElementById('outstanding');
        let penalty = document.getElementById('penalty');

        plafon.addEventListener('keyup',function(){
            plafon.value = rupiahFormat(this.value);
        });

        loan_arrear.addEventListener('keyup',function(){
            loan_arrear.value = rupiahFormat(this.value);
        });
        interest_arrear.addEventListener('keyup',function(){
            interest_arrear.value = rupiahFormat(this.value);
        });
        outstanding.addEventListener('keyup',function(){
            outstanding.value = rupiahFormat(this.value);
        });
        penalty.addEventListener('keyup',function(){
            penalty.value = rupiahFormat(this.value);
        });
    </script>
    <script>
        $(document).ready(function(){
            console.log(@this.officeId);
            $('#officeId').change(function(e){
                var value = $(this).val();
                @this.officeId=value;
                console.log($(this).val());
                sleep(1000);
                console.log(@this.officeId);
            });
        }); 
    </script>
    @endpush
</div>
