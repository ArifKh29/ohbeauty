@extends('./layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row main-content">
            <h3>My Account</h3>
            
                <div class="form-group col-md-12">
                    <label for="id_user">Custom ID</label>
                    <input type="text" name="id_user" class="form-control" value="{{ $profile['email'] }}" required disabled>
                    @error('id_user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="nama">Nama</label>
                    {{-- <input type="hidden" name="id_user" class="form-control" value="{{$profile['id']}}" required readonly> --}}
                    <input type="text" name="nama" class="form-control" value="{{ $profile['name'] }}" required
                        disabled>
                </div>

                <div class="form-group col-md-12">
                    <label for="nohp">No Hp</label>
                    <input type="text" name="nohp" class="form-control" value="{{ $profile['noTelp'] }}" required
                        disabled>
                </div>
                <div class="form-group col-md-12">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <input type="text" name="jenisKelamin" class="form-control" value="{{ $profile['jenisKelamin'] }}"
                        required disabled>
                </div>
                <div class="form-group col-md-12">
                    <label for="akunig">Instagram</label>
                    <input type="text" name="akunig" class="form-control" value="{{ $profile['ig'] }}" required
                        disabled>
                </div>
                <form action="{{ route('myaccount.verify-password') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-12">
                        <!-- Input password untuk verifikasi -->
                        <label for="password">Password Verifikasi</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Verifikasi Password</button>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    // Tombol "Verifikasi Password" diklik
    document.querySelector('form[action="{{ route('myaccount.verify-password') }}"]').addEventListener('submit', function (e) {
        e.preventDefault();

        // Lakukan permintaan AJAX atau validasi kata sandi di sini sesuai kebutuhan Anda

        // Jika verifikasi kata sandi berhasil, tampilkan formulir pembaruan profil
        document.querySelector('form[action="{{ route('myaccount.update') }}"]').style.display = 'block';
    });
});
    </script>
@endsection
