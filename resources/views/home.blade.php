@extends('layouts.main')
@section('container')
<div class="row">
    <div class="col-12 mb-3">
        <img src="{{ URL::asset('img/maxresdefault.jpg') }}" class="rounded-5 d-block shadow"  height="600" width="100%" alt="">
    </div>

    <div class="col-12">
        <article>
            <h1 class="fw-bold mb-2">Layanan Aspirasi Siswa</h1>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum neque reiciendis a consequuntur asperiores dolore facilis quibusdam minus rem iusto!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem aliquam iure mollitia alias obcaecati dolores dolorem numquam officia, laudantium deserunt!</p>
        </article>
    </div>
    <div class="col-12">
        <a href="/aspirasi" class="btn btn-primary fw-bold">Yukk Ajukan Aspirasi</a>
    </div>

</div>

@endsection
