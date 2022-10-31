@section('content')
<div id="app">
  <section class="section">
    <div class="d-flex flex-wrap align-items-stretch">
      <div
        class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white"
      >
        <div class="p-4 m-3">
          <img
            src="../assets/img/SIPRO.png"
            alt="logo"
            width="80"
            class="shadow-light mb-5 mt-2"
          />
          <h4 class="text-dark font-weight-normal">
            Ubah<span class="font-weight-bold"> Kata Sandi</span>
          </h4>
          <p class="text-muted"></p>
          <form
            method="POST"
            action="#"
            class="needs-validation"
            novalidate=""
          >
            <div class="form-group">
              <label for="email">Kata Sandi Baru</label>
              <input
                id="email"
                type="email"
                class="form-control"
                name="email"
                tabindex="1"
                required
                autofocus
              />
              <div class="invalid-feedback">Masukkan Kata Sandi Baru</div>
            </div>

            <div class="form-group">
              <div class="d-block">
                <label for="password" class="control-label"
                  >Ulangi Kata Sandi Baru</label
                >
              </div>
              <input
                id="password"
                type="password"
                class="form-control"
                name="password"
                tabindex="2"
                required
              />
              <div class="invalid-feedback">Masukkan Kata Sandi Baru</div>
            </div>

            <div class="form-group text-right">
              <button
                type="submit"
                class="btn btn-primary btn-lg btn-icon icon-right"
                tabindex="4"
                id="reset-kata-sandi"
              >
                Reset Kata Sandi
              </button>
              <script>
                $("#reset-kata-sandi").fireModal({
                  title: "My Modal",
                  content: "Hello!",
                });
              </script>
            </div>
          </form>
        </div>
      </div>
      <div
        class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
        data-background="../assets/img/unsplash/login-bg.jpg"
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
</div>
@endsection