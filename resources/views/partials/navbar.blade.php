
<nav class="navbar navbar-expand-lg shadow m-3 rounded-3" style="background-color: 	rgb(190,190,190);">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-3" href="#">Layanan Pengaduan Sekolah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <div class="d-flex" role="search">

                <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-bookmark-star-fill"></i>
                </button>

            </div>
        </div>
    </div>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hi Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/login" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                        @error('username')
                        <div class="invalid-fedback">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                        <div class="invalid-fedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
