@extends('./layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                @role('master')
                I am an administrator!
                @endrole

                @role('member')
                    I am a member!
                @endrole

                @role('shop')
                    I am a shop!
                @endrole
                <p>sadsad</p>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div> --}}
    <div class="container-fluid py-4">

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaInputReward">
            Tambah Data Penukaran Hadiah
        </button>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row main-content">

            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Histori Penukaran Hadiah</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                            Tenant</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Date</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Lokasi Penukaran</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Total Poin</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($result as $item)
                                  <tr>
                                      <td>
                                          <div class="d-flex px-2 py-1">

                                              <div class="d-flex flex-column justify-content-center">
                                                  <h6 class="mb-0 text-sm">{{$item->nama_user}}</h6>

                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <p class="text-xs font-weight-bold mb-0">{{$item->date_time}}</p>
                                      </td>
                                      <td class="align-middle text-center text-sm">
                                          <span class="badge badge-sm bg-gradient-success">{{$item->admin_eksekutor}}</span>
                                      </td>
                                      <td class="align-middle text-center">
                                          <span class="text-secondary text-xs font-weight-bold">{{$item->total_poin}}</span>
                                      </td>
                                      <td class="align-middle">
                                          <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                              data-toggle="tooltip" data-original-title="Edit user">
                                              Edit
                                          </a>
                                      </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                    Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
