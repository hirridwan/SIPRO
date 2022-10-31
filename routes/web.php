<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\App\Login;
use App\Http\Livewire\App\Logout;
use App\Http\Livewire\App\User\Index as UserIndex;
use App\Http\Livewire\App\User\Detail as UserDetail;
use App\Http\Livewire\App\User\Register as UserRegister;
use App\Http\Livewire\App\Dashboard;
use App\Http\Livewire\App\ForgotPassword;
use App\Http\Livewire\App\Permohonan\Restruk\Index as Restruk;
use App\Http\Livewire\App\Permohonan\Restruk\Detail as RestrukDetail;
use App\Http\Livewire\App\Permohonan\Restruk\Register as RestrukRegister;
use App\Http\Livewire\App\Role\Index as RoleIndex;
use App\Http\Livewire\App\Role\Register as RoleRegister;
use App\Http\Livewire\App\Role\Detail as RoleDetail;
use App\Http\Livewire\App\Office\Index as OfficeIndex;
use App\Http\Livewire\App\Office\Register as OfficeRegister;
use App\Http\Livewire\App\Office\Detail as OfficeDetail;
use App\Http\Livewire\App\Menu\Index as MenuIndex;
use App\Http\Livewire\App\Menu\Register as MenuRegister;
use App\Http\Livewire\App\Menu\Detail as MenuDetail;
use App\Http\Livewire\App\Data\Customer\Index as DataCustomerIndex;
use App\Http\Livewire\App\Data\Customer\Register as DataCustomerRegister;
use App\Http\Livewire\App\Data\Customer\Detail as DataCustomerDetail;
use App\Http\Livewire\App\Data\Loan\Index as DataLoanIndex;
use App\Http\Livewire\App\Data\Loan\Register as DataLoanRegister;
use App\Http\Livewire\App\Data\Loan\Detail as DataLoanDetail;
use App\Http\Livewire\App\Data\Collateral\Index as DataCollateralIndex;
use App\Http\Livewire\App\Data\Collateral\Register as DataCollateralRegister;
use App\Http\Livewire\App\Data\Collateral\Detail as DataCollateralDetail;
use App\Http\Livewire\App\Data\FinancialAnalysis\Index as DataFinancialAnalysisIndex;
use App\Http\Livewire\App\Data\FinancialAnalysis\Register as DataFinancialAnalysisRegister;
use App\Http\Livewire\App\Data\FinancialAnalysis\Detail as DataFinancialAnalysisDetail;
use App\Http\Livewire\App\Data\FinancialAnalysis\DataAnalisa as DataFinancialAnalysisDataAnalisa;
use App\Http\Livewire\App\Data\Pegawai\Index as DataPegawaiIndex;
use App\Http\Livewire\App\Data\Pegawai\Register as DataPegawaiRegister;
use App\Http\Livewire\App\Data\Pegawai\Detail as DataPegawaiDetail;
use App\Http\Livewire\App\Notulen\Rapat\Index as NotulenRapatIndex;
use App\Http\Livewire\App\Notulen\Rapat\Register as NotulenRapatRegister;
use App\Http\Livewire\App\Notulen\Rapat\Detail as NotulenRapatDetail;
use App\Http\Livewire\App\Notulen\Rapat\PrintNotulen as NotulenRapatPrintNotulen;
use App\Http\Livewire\App\Notulen\Rapat\IsiNotulen as NotulenRapatIsiNotulen;
use App\Http\Livewire\App\Notulen\Rapat\Info as NotulenRapatInfo;
use App\Http\Livewire\App\Setup\Jabatan\Index as SetupJabatanIndex;
use App\Http\Livewire\App\Setup\Jabatan\Register as SetupJabatanRegister;
use App\Http\Livewire\App\Setup\Jabatan\Detail as SetupJabatanDetail;
use App\Http\Livewire\App\Setup\Bagian\Index as SetupBagianIndex;
use App\Http\Livewire\App\Setup\Bagian\Register as SetupBagianRegister;
use App\Http\Livewire\App\Setup\Bagian\Detail as SetupBagianDetail;
use App\Http\Livewire\App\Dokumen\Verifikasi\Index as DokumenVerifikasiIndex;
use App\Http\Livewire\App\Dokumen\Verifikasi\Info as DokumenVerifikasiInfo;


Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('/login',Login::class)->name('login');
    Route::get('/forgot-password',ForgotPassword::class)->name('forgot-password');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('/logout',function(){
        $this->dispatchBrowserEvent('swal:confirm',[
            'title'=>'Logout?',
            'type'=>'warning',
            'text'=>''
        ]);
    })->name('logout');
    Route::get('/dashboard',Dashboard::class)->name('dashboard');    
    Route::get('/users',UserIndex::class)->name('users');
    Route::get('/user/register',UserRegister::class)->name('user.register');
    Route::get('/user/{id}',UserDetail::class)->name('user.detail');
    Route::get('/setup/roles',RoleIndex::class)->name('setup.roles');
    Route::get('/setup/role/register',RoleRegister::class)->name('setup.role.register');
    Route::get('/setup/role/detail/{id}',RoleDetail::class)->name('setup.role.detail');
    Route::get('/setup/offices',OfficeIndex::class)->name('setup.offices');
    Route::get('/setup/office/register',OfficeRegister::class)->name('setup.office.register');
    Route::get('/setup/office/detail/{id}',OfficeDetail::class)->name('setup.office.detail');
    // route setup menu
    Route::get('/setup/menus',MenuIndex::class)->name('setup.menus');
    Route::get('/setup/menu/register',MenuRegister::class)->name('setup.menu.register');
    Route::get('/setup/menu/detail/{id}',MenuDetail::class)->name('setup.menu.detail');
    //route permohonan restruk
    Route::get('/permohonan',Restruk::class)->name('restruk');
    Route::get('/permohonan/detail/{id}',RestrukDetail::class)->name('restruk.detail');
    Route::get('/permohonan/register',RestrukRegister::class)->name('restruk.register');
    //route data nasabah
    Route::get('/data/nasabah',DataCustomerIndex::class)->name('data.nasabah');
    Route::get('/data/nasabah/register',DataCustomerRegister::class)->name('data.nasabah.register');
    Route::get('/data/nasabah/detail/{id}',DataCustomerDetail::class)->name('data.nasabah.detail');
    //route data kredit
    Route::get('/data/kredit',DataLoanIndex::class)->name('data.kredit');
    Route::get('/data/kredit/register',DataLoanRegister::class)->name('data.kredit.register');
    Route::get('/data/kredit/detail/{id}',DataLoanDetail::class)->name('data.kredit.detail');
    //route data agunan
    Route::get('/data/agunan',DataCollateralIndex::class)->name('data.agunan');
    Route::get('/data/agunan/register',DataCollateralRegister::class)->name('data.agunan.register');
    Route::get('/data/agunan/detail/{id}',DataCollateralDetail::class)->name('data.agunan.detail');
    //route data financial analyst
    Route::get('/data/financial-analysis',DataFinancialAnalysisIndex::class)->name('data.financial-analysis');
    Route::get('/data/financial-analysis/data-analisa/{id}',DataFinancialAnalysisDataAnalisa::class)->name('data.financial-analysis.data-analisa');
    Route::get('/data/financial-analysis/register/{id}',DataFinancialAnalysisRegister::class)->name('data.financial-analysis.register');
    Route::get('/data/financial-analysis/detail/{id}',DataFinancialAnalysisDetail::class)->name('data.financial-analysis.detail');
    Route::get('/data/financial-analysis/detail/{id}',DataFinancialAnalysisDetail::class)->name('data.financial-analysis.detail');
    //route notulen
    Route::get('/notulen/rapat',NotulenRapatIndex::class)->name('notulen.rapat');
    Route::get('/notulen/rapat/register',NotulenRapatRegister::class)->name('notulen.rapat.register');
    Route::get('/notulen/rapat/detail/{id}',NotulenRapatDetail::class)->name('notulen.rapat.detail');
    Route::get('/notulen/rapat/print/{id}',NotulenRapatPrintNotulen::class)->name('notulen.rapat.print');
    Route::get('/notulen/rapat/isi-notulen/{id}',NotulenRapatIsiNotulen::class)->name('notulen.rapat.isi-notulen');
    //route pegawai
    Route::get('/data/pegawai',DataPegawaiIndex::class)->name('data.pegawai');
    Route::get('/data/pegawai/register',DataPegawaiRegister::class)->name('data.pegawai.register');
    Route::get('/data/pegawai/detail/{id}',DataPegawaiDetail::class)->name('data.pegawai.detail');
    //route jabatan
    Route::get('/setup/jabatan',SetupJabatanIndex::class)->name('setup.jabatan');
    Route::get('/setup/jabatan/register',SetupJabatanRegister::class)->name('setup.jabatan.register');
    Route::get('/setup/jabatan/detail/{id}',SetupJabatanDetail::class)->name('setup.jabatan.detail');
    //route bagian
    Route::get('/setup/bagian',SetupBagianIndex::class)->name('setup.bagian');
    Route::get('/setup/bagian/register',SetupBagianRegister::class)->name('setup.bagian.register');
    Route::get('/setup/bagian/detail/{id}',SetupBagianDetail::class)->name('setup.bagian.detail');
    Route::get('/dokumen/verifikasi/{id}',DokumenVerifikasiIndex::class)->name('dokumen.verifikasi');
});

Route::get('/dokumen/verifikasi/info/{id}',DokumenVerifikasiInfo::class)->name('dokumen.verifikasi.info');
Route::get('/dokumen/verifikasi/notulen/info/{id}',NotulenRapatInfo::class)->name('notulen.rapat.info');