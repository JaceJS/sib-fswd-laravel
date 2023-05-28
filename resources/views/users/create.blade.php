@extends('layouts.main')

@section('content')    
    <div class="container-fluid px-4">
        <h1>Tambah Pengguna</h1>
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="valid-feedback">
                            Bagus.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option selected disabled value="">Choose</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                        </select>
                        <div class="invalid-feedback">
                            Pilih Role.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="inputPassword" name="password" class="form-control" aria-labelledby="passwordHelpBlock" placeholder="Password" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Name@example.com" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Telp</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="col-md-12">
                        <label for="address" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="formFile" class="form-label">Unggah foto</label>
                        <input class="form-control" type="file" id="formFile" name="avatar" required>
                    </div>
                    <div class="col-12 mt-4 d-flex justify-content-between">
                        <input class="btn btn-primary" type="submit" value="Simpan"></input>
                        <a href="{{ route('category.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection