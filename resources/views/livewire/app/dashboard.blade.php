@section('title','Dashboard')
@section('section-header','Dashboard')
@section('content')
    
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="far fa-user"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Pengajuan Restrukturisasi</h4>
        </div>
        <div class="card-body">10</div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="far fa-newspaper"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total On Progres Restrukturisasi</h4>
        </div>
        <div class="card-body">42</div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="far fa-file"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Berhasil Restrukturasi</h4>
        </div>
        <div class="card-body">1,201</div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Kantor Cabang</h4>
      </div>
      <div class="card-body">
        <canvas id="myChart" height="182"></canvas>
        <div class="statistic-details mt-sm-4">
          <div class="statistic-details-item">
            <span class="text-muted"
              ><span class="text-primary"
                ><i class="fas fa-caret-up"></i
              ></span>
              7%</span
            >
            <div class="detail-value">$243</div>
            <div class="detail-name">Today's Sales</div>
          </div>
          <div class="statistic-details-item">
            <span class="text-muted"
              ><span class="text-danger"
                ><i class="fas fa-caret-down"></i
              ></span>
              23%</span
            >
            <div class="detail-value">$2,902</div>
            <div class="detail-name">This Week's Sales</div>
          </div>
          <div class="statistic-details-item">
            <span class="text-muted"
              ><span class="text-primary"
                ><i class="fas fa-caret-up"></i></span
              >9%</span
            >
            <div class="detail-value">$12,821</div>
            <div class="detail-name">This Month's Sales</div>
          </div>
          <div class="statistic-details-item">
            <span class="text-muted"
              ><span class="text-primary"
                ><i class="fas fa-caret-up"></i
              ></span>
              19%</span
            >
            <div class="detail-value">$92,142</div>
            <div class="detail-name">This Year's Sales</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Riwayat Aktivitas</h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled list-unstyled-border">
          <li class="media">
            <img
              class="mr-3 rounded-circle"
              width="50"
              src="{{asset('img/avatar-1.png')}}"
              alt="avatar"
            />
            <div class="media-body">
              <div class="float-right text-primary">Now</div>
              <div class="media-title">Iman Dermawan</div>
              <span class="text-small text-muted"
                >Permohonan Restrukturasi.</span
              >
            </div>
          </li>
          <li class="media">
            <img
              class="mr-3 rounded-circle"
              width="50"
              src="{{asset('img/avatar-1.png')}}"
              alt="avatar"
            />
            <div class="media-body">
              <div class="float-right">12m</div>
              <div class="media-title">Acep Yoga Agustina</div>
              <span class="text-small text-muted"
                >Cras sit amet nibh libero, in gravida nulla. Nulla
                vel metus scelerisque ante sollicitudin.</span
              >
            </div>
          </li>
          <li class="media">
            <img
              class="mr-3 rounded-circle"
              width="50"
              src="{{asset('img/avatar-1.png')}}"
              alt="avatar"
            />
            <div class="media-body">
              <div class="float-right">17m</div>
              <div class="media-title">Dian Subakti</div>
              <span class="text-small text-muted"
                >Cras sit amet nibh libero, in gravida nulla. Nulla
                vel metus scelerisque ante sollicitudin.</span
              >
            </div>
          </li>
          <li class="media">
            <img
              class="mr-3 rounded-circle"
              width="50"
              src="{{asset('img/avatar-1.png')}}"
              alt="avatar"
            />
            <div class="media-body">
              <div class="float-right">21m</div>
              <div class="media-title">Erik Herikandi</div>
              <span class="text-small text-muted"
                >Cras sit amet nibh libero, in gravida nulla. Nulla
                vel metus scelerisque ante sollicitudin.</span
              >
            </div>
          </li>
        </ul>
        <div class="text-center pt-1 pb-1">
          <a href="#" class="btn btn-primary btn-lg btn-round">
            View All
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Jatuh Tempo</h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled list-unstyled-border">
          <li class="media">
            <img
              class="mr-3 rounded-circle"
              width="50"
              src="{{asset('img/avatar-1.png')}}"
              alt="avatar"
            />
            <div class="media-body">
              <div class="float-right text-primary">Now</div>
              <div class="media-title">Iman Dermawan</div>
              <span class="text-small text-muted"
                >Permohonan Restrukturasi.</span
              >
            </div>
          </li>
          <li class="media">
            <img
              class="mr-3 rounded-circle"
              width="50"
              src="{{asset('img/avatar-1.png')}}"
              alt="avatar"
            />
            <div class="media-body">
              <div class="float-right">12m</div>
              <div class="media-title">Acep Yoga Agustina</div>
              <span class="text-small text-muted"
                >Cras sit amet nibh libero, in gravida nulla. Nulla
                vel metus scelerisque ante sollicitudin.</span
              >
            </div>
          </li>
          <li class="media">
            <img
              class="mr-3 rounded-circle"
              width="50"
              src="{{asset('img/avatar-1.png')}}"
              alt="avatar"
            />
            <div class="media-body">
              <div class="float-right">17m</div>
              <div class="media-title">Dian Subakti</div>
              <span class="text-small text-muted"
                >Cras sit amet nibh libero, in gravida nulla. Nulla
                vel metus scelerisque ante sollicitudin.</span
              >
            </div>
          </li>
          <li class="media">
            <img
              class="mr-3 rounded-circle"
              width="50"
              src="{{asset('img/avatar-1.png')}}"
              alt="avatar"
            />
            <div class="media-body">
              <div class="float-right">21m</div>
              <div class="media-title">Erik Herikandi</div>
              <span class="text-small text-muted"
                >Cras sit amet nibh libero, in gravida nulla. Nulla
                vel metus scelerisque ante sollicitudin.</span
              >
            </div>
          </li>
        </ul>
        <div class="text-center pt-1 pb-1">
          <a href="#" class="btn btn-primary btn-lg btn-round">
            View All
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection