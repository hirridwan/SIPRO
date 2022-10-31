 <div>
  @push('page_specific_css')
  <style>
    .banner{
      background-image: url('img/banner.jpg');
    }
  </style>
  @endpush
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
            Selamat Datang di <span class="font-weight-bold"> SIPRO</span>
          </h4>
          <p class="text-muted"></p>
          <form wire:submit.prevent='login'>
            <div class="form-group">
              <label for="email">Username</label>
              <input
                type="text" 
                wire:model.lazy="name"
                class="form-control @error('name') is-invalid @enderror" 
                placeholder="Username"
                tabindex="2"
              />
              @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group">
              <div class="d-block">
                <label for="password" class="control-label"
                  >Kata Sandi</label
                >
              </div>
              <input 
                type="password" 
                wire:model.lazy="password"
                class="form-control @error('password') is-invalid @enderror" 
                placeholder="Password"
                tabindex="2"
              />
              @error('password')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input
                  type="checkbox"
                  name="remember"
                  class="custom-control-input"
                  tabindex="3"
                  id="remember-me"
                />
                <label class="custom-control-label" for="remember-me"
                  >Ingat Saya</label
                >
              </div>
            </div>

            <div class="form-group text-right">
              <a href="lupa-password.html" class="float-left mt-3">
                Lupa Password?
              </a>
              <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Masuk
              </button>
            </div>
          </form>
        </div>
      </div>
      <div
        class="banner col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom">
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