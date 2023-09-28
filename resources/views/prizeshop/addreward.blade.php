@extends('./layouts.app')

@section('content')
    
    <div class="container-fluid py-4">
        <div class="row main-content">
            <h3>Form Penukaran Hadiah</h3>
            <form action="{{ route('tukar.hadiah.store') }}" method="POST">
                @csrf
                <div class="form-group col-md-4">
                    <label for="id_user">User QR</label>
                    <input type="text" name="id_user" class="form-control" value="{{$profile['email']}}" required disabled>
                    @error('id_user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="nama">Nama</label>
                            <input type="hidden" name="id_user" class="form-control" value="{{$profile['id']}}" required readonly>
                            <input type="text" name="nama" class="form-control" value="{{$profile['name']}}" required disabled>
                        </div>
                        <div class="col-md-5">
                            <label for="poinawal">Poin Awal</label>
                            <input type="text" name="poinawal" class="form-control" value="{{$profile['poin']}}" required readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nohp">No Hp</label>
                            <input type="text" name="nohp" class="form-control" value="{{$profile['noTelp']}}" required disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <input type="text" name="jenisKelamin" class="form-control" value="{{$profile['jenisKelamin']}}" required disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="akunig">Instagram</label>
                            <input type="text" name="akunig" class="form-control" value="{{$profile['ig']}}" required disabled>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="date_time">Date and Time</label>
                    <input type="datetime-local" name="date_time" class="form-control" required>
                    @error('date_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_belanja">Rincian Hadiah</label>
                    <textarea type="text" name="rincian_hadiah" class="form-control" id="rincian_hadiah"></textarea>
                    @error('rincian_hadiah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_poin">Total Poin Ditukarkan</label>
                    <input type="text" name="total_poin" class="form-control" id="total-poin" required>
                    @error('total_poin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="admin_aksekutor">Admin Eksekutor</label>
                    <input type="text" name="admin_aksekutor" class="form-control" value="{{ $active['dataUser']->name }} "readonly>
                    @error('admin_eksekutor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
