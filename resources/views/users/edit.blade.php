@extends('layouts.main')

@section('content')    
    <div class="container-fluid px-4">
        <h2 class="my-4">Edit User</h2>
        <div class="card mb-4">
            <div class="card-body">
                <form action='{{ route('users.update', $users->id ) }}' method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input value='{{ $users->name }}' type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            {{-- <option selected disabled value="">Choose</option> --}}
                            {{-- melakukan looping pada tiap role yang ada --}}
                            @foreach($roles as $role)
                                {{-- menampilkan nama role dan mengambil nilai dari id role --}}
                                <option value={{ $role->id }}>{{ $role->name }}</option>                            
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input value='{{ $users->password }}' type="password" id="inputPassword" name="password" class="form-control" aria-labelledby="passwordHelpBlock" placeholder="Password" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input value='{{ $users->email }}' type="email" class="form-control" id="email" name="email" placeholder="Name@example.com" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Telp</label>
                        <input value='{{ $users->phone }}' type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="col-12 mt-4 d-flex justify-content-between">
                        <input class="btn btn-primary" type="submit" value="Simpan"></input>
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection