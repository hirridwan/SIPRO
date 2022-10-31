@section('content')
<div id="app">
    <section class="section">
    <div class="d-flex flex-wrap align-items-stretch">
        <div
        class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white"
        >
        <div class="p-4 m-3">
            <img
            src="{{asset('img/sipro.png')}}"
            alt="logo"
            width="80"
            class="shadow-light mb-5 mt-2"
            />
            <h4 class="text-dark font-weight-normal">
            Lupa <span class="font-weight-bold"> Kata Sandi?</span>
            </h4>
            <p class="text-muted">
            Kami akan mengirimkan tautan ke email anda untuk mengatur ulang
            kata sandi. Silahkan reset dengan cepat
            </p>
            <form
            method="POST"
            action="#"
            class="needs-validation"
            novalidate=""
            >
            <div class="form-group">
                <input
                id="email"
                type="email"
                class="form-control"
                name="email"
                tabindex="1"
                required
                autofocus
                />
                <div class="invalid-feedback">Masukkan Alamat Email</div>
            </div>

            <div class="form-group text-right">
                <button
                type="submit"
                class="btn btn-primary btn-lg btn-icon icon-right"
                tabindex="4"
                >
                Kembali
                </button>
                <button
                type="submit"
                class="btn btn-primary btn-lg btn-icon icon-right"
                tabindex="4"
                data-toogle="modal"
                data-target="#exampleModal"
                >
                Kirim Permintaan
                </button>
            </div>
            </form>
        </div>
        </div>
        <div
        class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
        data-background="{{(asset('img/banner.jpg')}}"
        >
        <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
            <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">
                SISTEM INFORMASI PENGAJUAN RESTRUKTURISASI ONLINE
                </h1>
            </div>
            <a class="text-light bb">MADE WITH LOVE TEAM IT BANK CIJ</a>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!--Modal-->
</div>
@endsection