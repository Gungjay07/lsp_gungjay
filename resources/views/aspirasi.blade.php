@extends('layouts.main')
@section('container')
    <section id="input" class="height: 100vh;">
        <div class="row d-flex justify-content-center">
            <div class="row-sm-12 col-md-8 col-lg-6 ">
                @if (request('id') != null)
                    <div class="alert mt-3 alert-warning alert-dismissible fade show" role="alert"">
                        <strong>Terimakasih Telah Melakukan Pengaduan <br>
                            Nomot Pengaduan : {{ request('id') }}
                        </strong><br>
                        <small class="">Silahkan Di Ingat Nomor pengaduannya!!</small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (request('nik') != null)
                    <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
                        <strong> NIK Anda Belum Terdaftar!! </strong><br>
                        <small>Silahkan Isi Datanya Kembali Dengan Benar</small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body p-5">
                        <form action="/aspirasi/store" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">ID Siswa</label>
                                <input type="text" name="id" value="{{ $no }}"
                                    class="form-control bg-primary text-light ">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Nomor Induk Siswa</label>
                                <input type="number" name="nik" value="{{ old('nik') }}"
                                    class="form-control bg-warning text-light @error('nik') is-invalid @enderror">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Kategori</label>
                                <div class=" container row d-flex justify-content-center">
                                    <div class="col-12 bg-primary rounded-4 p-3">
                                        <div class="row ">
                                            @foreach ($kategori as $kat)
                                                <div class="col-sm-12 col-lg-4 col-md-12 ">
                                                    <input class="form-check-input" value="{{ $kat->id }}"
                                                        type="radio" name="kategori_id" id="id_kategori1">
                                                    <label class="form-check-label" for="id_kategori1">
                                                        {{ $kat->ket_kategori }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Lokasi</label>
                                <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                                    class="form-control bg-warning text-light @error('lokasi') is-invalid @enderror">
                                @error('lokasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Keterangan</label>
                                <textarea name="ket" id="" values="{{ old('ket') }}"
                                    class="form-control bg-primary text-light  @error('ket') is-invalid @enderror"></textarea>
                                @error('ket')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Gambar</label>
                                <input type="file" name="gambar" id="" values=""
                                    class="form-control bg-primary text-light"></input>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="py-4 justify-content-center" style="height: 100vh;">
        <div class="row justify-content-center">
            <div class="col-12 mb-3">
                <nav class="navbar navbar-expand-lg bg-light rounded shadow">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold" href="#">Lihat Pengaduan</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            </ul>
                            <div class="d-flex" role="search">
                                {{-- <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="bi bi-box-arrow-right-circle"></i> Login
                            </button> --}}

                                <div class="collapse navbar-collapse justify-content-center-end" id="">

                                </div>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-6 mt-4">
                <div class="card shadow p-5">
                    <div class="row">
                        <div class="col-12 pb-3 border-botoom">
                            <form action="/aspirasi/search" method="POST">
                                @csrf
                                <label class="form-label fw-bold m-2" for="">Nomor Pengaduan</label>
                                <div class="input-group">
                                    <input type="text" required name="search" value="{{ request('search') }}"
                                        class="form-control" placeholder="Masukan Nomor Pengaduan"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                            class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>
                        @if (request('search') !== null)
                            <div class="col-12 px-4 py-3">

                                <div class="d-flex">
                                    <p class="fw-bold p-0 m-0 me-2">Nomor Pengaduan Siswa :</p>
                                    <p class="p-0 m-0">{{ $aspirasi[0]->id }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="fw-bold p-0 m-0 me-2">Status :</p>
                                    <p class="p-0 m-0">{{ $aspirasi[0]->status }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="fw-bold p-0 m-0 me-2">Kategori :</p>
                                    <p class="p-0 m-0">{{ $aspirasi[0]->kategori->ket_kategori }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="fw-bold p-0 m-0 me-2">Alamat :</p>
                                    <p class="p-0 m-0">{{ $aspirasi[0]->input_aspirasi->lokasi }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="fw-bold p-0 m-0 me-2">Keterangan :</p>
                                    <p class="p-0 m-0">{{ $aspirasi[0]->input_aspirasi->ket }}</p>
                                </div>
                                <div class="d-flex">
                                    <p class="fw-bold p-0 m-0 me-2">Gambar :</p>
                                    <img src="{{ url('gambarlsp/'.$aspirasi[0]->input_aspirasi->gambar) }}" width="100" height="70">
                                </div>
                                
                                @if ($aspirasi[0]['status'] == 'Selesai' and $aspirasi[0]['feedback'] == null)
                                    <form action="/aspirasi/feedback" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_aspirasi" value="{{ $aspirasi[0]->id }}">
                                        <div class="btn btn-dark">
                                            <input type="radio" name="feedback" value="1">

                                            <label for="" class="form-check-label">1</label>
                                        </div>
                                        <div class="btn btn-danger">
                                            <input type="radio" name="feedback" value="2">

                                            <label for="" class="form-check-label">2</label>
                                        </div>
                                        <div class="btn btn-warning">
                                            <input type="radio" name="feedback" value="3">

                                            <label for="" class="form-check-label">3</label>
                                        </div>
                                        <div class="btn btn-success">
                                            <input type="radio" name="feedback" value="4">

                                            <label for="" class="form-check-label">4</label>
                                        </div>
                                        <div class="btn btn-primary">
                                            <input type="radio" name="feedback" value="5">

                                            <label for="" class="form-check-label">5</label>
                                        </div>
                                        <button class="btn btn-secondary text-light" type="submit"><i
                                                class="bi bi-send-fill"></i></button>
                                    </form>
                                @endif
                            </div>
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
