@extends('layouts.main-admin')
@section('container')
<section class="justify-content-center py-4" style="height: 100vh">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/admin/" class="nav-link active">Aspirasi</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/history" class="nav-link">History</a>
                        </li>
                    </ul>
                    <div class="row my-2 mt-4 justify-content-center">
                        <div class="col-8">
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary w-100 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Kategori
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            @foreach ($kategori as $kat)
                                            <li><a class="dropdown-item" href="/admin?kategori={{ $kat->id }}">{{ $kat->ket_kategori }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <form action="/admin" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" value="{{ request('waktu') }}" name="waktu" aria-describedby="button-addon2">
                                            <button type="submit" class="btn btn-outline-primary" id="button-addon2"><i class="bi bi-search"></i></button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-3">
                                <form action="/admin" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" placeholder="Nomor Aspirasi Anda" class="form-control">
                                        <button type="submit" class="btn btn-outline-success"><i class="bi bi-search"></i></button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="tab-content ">
        <div role="tabpanel" id="aspirasi" class="tab-pane active">
            <div class="row">

                <div class="col-12 ">
                    @if ($type == 'Dashboard')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($aspirasi as $as)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $as->input_aspirasi->siswa->nama }}</td>
                                <td>{{ $as->kategori->ket_kategori }}</td>
                                <td>{{ $as->input_aspirasi->lokasi }}</td>
                                <td>{{ $as->input_aspirasi->ket }}</td>
                                <td><img src="{{ url('gambarlsp/'.$as->input_aspirasi->gambar) }}" width="100" height="70"></td>
                                <td>{{ $as->created_at }}</td>
                                <td>
                                    @if ($as['status'] == 'Menunggu')
                                    <form action="/admin/status" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="Proses">
                                        <input type="hidden" name="id_aspirasi" value="{{ $as->id_aspirasi }}">
                                        <button type="submit" class="btn btn-primary btn-sm mb-3 w-100">Menunggu</button>
                                    </form>
                                    @elseif($as->status == 'Proses')
                                    <form action="/admin/status" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="Selesai">
                                        <input type="hidden" name="id_aspirasi" value="{{ $as->id_aspirasi }}">
                                        <button type="submit" class="btn btn-success btn-sm mb-3 w-100">Proses</button>
                                    </form>
                                    @else
                                    <button type="submit" class="btn btn-secondary btn-sm mb-3 w-100" disabled>Selesai</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @endif

                    @if ($type == 'History')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">FeedBack</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($selesai as $as)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $as->input_aspirasi->siswa->nama }}</td>
                                <td>{{ $as->kategori->ket_kategori }}</td>
                                <td>{{ $as->input_aspirasi->lokasi }}</td>
                                <td>{{ $as->input_aspirasi->ket }}</td>
                                <td><img src="{{ url('gambarlsp/'.$as->input_aspirasi->gambar) }}" width="100" height="70"></td>
                                <td>{{ $as->created_at }}</td>
                                <td>{{ $as->feedback }}</td>
                                <td>
                                    @if ($as['status'] == 'Menunggu')
                                    <form action="/admin/status" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="Proses">
                                        <input type="hidden" name="id_aspirasi" value="{{ $as->id_aspirasi }}">
                                        <button type="submit" class="btn btn-primary btn-sm mb-3 w-100">Proses</button>
                                    </form>

                                    <form action="/admin/status" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="Selesai">
                                        <input type="hidden" name="id_aspirasi" value="{{ $as->id_aspirasi }}">
                                        <button type="submit" class="btn btn-success btn-sm mb-3 w-100">Selesai</button>
                                    </form>
                                    @else
                                    @endif
                                </td>
                                <td>
                                    <form action="/admin/hapus" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="Selesai">
                                        <input type="hidden" name="id_aspirasi" value="{{ $as->id_aspirasi }}">
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @endif
                    @if ($aspirasi->count())
                    @else
                    <p class="text-center fs-4 mt-5">Tidak ada Aspirasi Masyarakat. </p>
                    @endif
                    <div class="d-flex justify-content-end">
                        {{ $aspirasi->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" id="history" class="tab-pane ">
            <div class="row ">
                <div class="col-12 ">
                    <table class="table border-top">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">kita</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Ratting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($selesai as $s)
                            <tr>
                                <th scope="row">{{ $s->id }}</th>
                                <td>{{ $s->input_aspirasi->siswa->nama }}</td>
                                <td>{{ $s->kategori->ket_kategori }}</td>
                                <td>{{ $s->input_aspirasi->lokasi }}</td>
                                <td>{{ $s->input_aspirasi->ket }}</td>
                                <td>{{ $s->created_at }}</td>
                                <td>
                                    <div class=" text-center fw-bold">
                                        {{ $s->feedback }}
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($selesai->count())
                    @else
                    <p class="text-center fs-4 mt-5">Tidak ada Aspirasi Masyarakat. </p>
                    @endif
                    <div class="d-flex justify-content-end">
                        {{ $selesai->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>


    </div>
</section>
@endsection
