@extends('./layouts.app')

@section('content')
    
    <div class="container-fluid py-4">
        <div class="row main-content">
            <h3>Tambahkan data baru</h3>
            <form action="{{ route('insert.data.store') }}" method="POST">
                @csrf
                <div class="form-group col-md-4">
                    <label for="id_user">User QR</label>
                    <input type="text" name="id_user" class="form-control" value="{{$profile['custom_id']}}" required disabled>
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
                            <input type="text" name="poinawal" class="form-control" value="{{$profile['poin']}}" required disabled>
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
                    <label for="total_poin">Poin Bonus Social Media</label>
                    
                    <div class="row">
                        {{-- {{$remarks[0]->}} --}}
                        <div class="col-md-2 form-check">
                            <input class="form-check-input" id="feed" type="checkbox" value="feed" name="feed" 
                            @foreach ($remarks as $item) {
                                @if ($item->post == 'feed' ) {
                                    {{ 'checked disabled' }}
                                }
                                @endif
                                
                            }
                            @endforeach
                            id="feed" >
                            <label class="form-check-label" for="feed">
                              Post Feed
                            </label>
                          </div>
                        <div class="col-md-2 form-check">
                            <input class="form-check-input" type="checkbox" value="story1" name="story1"
                            @foreach ($remarks as $item) {
                                @if ($item->post == 'story1' ) {
                                    {{ 'checked disabled' }}
                                }
                                @endif
                                
                            }
                            @endforeach
                            id="story1">
                            <label class="form-check-label" for="story1">
                              Post Story 1
                            </label>
                          </div>
                        <div class="col-md-2 form-check">
                            <input class="form-check-input" type="checkbox" value="story2" name="story2" 
                            @foreach ($remarks as $item) {
                                @if ($item->post == 'story2' ) {
                                    {{ 'checked disabled' }}
                                }
                                @endif
                                
                            }
                            @endforeach
                            id="story2">
                            <label class="form-check-label" for="story2">
                                Post Story 2
                            </label>
                          </div>
                        <div class="col-md-2 form-check">
                            <input class="form-check-input" type="checkbox" value="story3" name="story3"  
                            @foreach ($remarks as $item) {
                                @if ($item->post == 'story3' ) {
                                    {{ 'checked disabled' }}
                                }
                                @endif
                                
                            }
                            @endforeach
                            id="story3">
                            <label class="form-check-label" for="story3">
                                Post Story 3
                            </label>
                          </div>
                        <div class="col-md-2 form-check">
                            <input class="form-check-input" type="checkbox" value="story4" name="story4" 
                            @foreach ($remarks as $item) {
                                @if ($item->post == 'story4' ) {
                                    {{ 'checked disabled' }}
                                }
                                @endif
                                
                            }
                            @endforeach
                            id="story4">
                            <label class="form-check-label" for="story4">
                                Post Story 4
                            </label>
                          </div>
                        <div class="col-md-2 form-check">
                            <input class="form-check-input" type="checkbox" value="story5" name="story5" 
                            @foreach ($remarks as $item) {
                                @if ($item->post == 'story5' ) {
                                    {{ 'checked disabled' }}
                                }
                                @endif
                                
                            }
                            @endforeach
                            id="story5">
                            <label class="form-check-label" for="story5">
                                Post Story 5
                            </label>
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
                    <label for="total_belanja">Total Belanja</label>
                    <input type="text" name="total_belanja" class="form-control" id="total-belanja">
                    @error('total_belanja')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_poin">Total Poin</label>
                    <input type="text" name="total_poin" class="form-control" id="total-poin" readonly>
                    @error('total_poin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="admin_aksekutor">Admin Aksekutor</label>
                    <input type="text" name="admin_aksekutor" class="form-control" value="{{ $active['dataUser']->name }}">
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
    <script>
        const inputValue = document.getElementById('total-belanja');
        const pointsInput = document.getElementById('total-poin');

        inputValue.addEventListener('input', calculatePoints);

        function calculatePoints() {
            const value = parseFloat(inputValue.value) || 0;
            let points = 0;

            if (value >= 500000) {
                points = Math.floor(value / 500000) * 50;
            }

            // // Special case: If value is between 600,000 and 700,000, still apply 50 points
            // if (value >= 600000 && value <= 700000) {
            //     points = 50;
            // }

            pointsInput.value = points;
        }
    </script>
    <script>
        // Ambil referensi elemen-elemen yang akan digunakan
        const checkbox = document.getElementById('feed');
        const textInput = document.getElementById('total-poin');
        
        // Tambahkan event listener untuk checkbox
        checkbox.addEventListener('change', function() {
            // Jika checkbox dicentang, isi input teks dengan data yang Anda inginkan
            if (this.checked) {
                textInput.value += 15;
            } else {
                // Jika checkbox tidak dicentang, kosongkan input teks
                textInput.value = '';
            }
        });
    </script>
@endsection
