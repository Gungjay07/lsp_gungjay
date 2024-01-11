
<nav class="navbar navbar-expand-lg shadow m-3 rounded-3" style="background-color: 	rgb(190,190,190);">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold fs-3" href="#">Layanan Pengaduan Sekolah</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <form action="/logout" method="POST">
        @csrf
        <button class="btn btn-sm btn-danger">Logout</button>
      </form>
    </div>
  </div>
</nav>