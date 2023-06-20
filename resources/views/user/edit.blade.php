@extends('layouts.main')

@section('content')    
    <div class="container-fluid px-4">
        <h2 class="my-4">Edit User</h2>
        <div class="card mb-4">
            <div class="card-body">
                <form action='{{ route('user.update', $users->id ) }}' method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    {{-- inputan nama --}}
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $users->name }}" placeholder="Name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- inputan role --}}
                    <div class="col-md-6">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select @error('email') is-invalid @enderror" id="role" name="role">
                            <option selected disabled value="">Choose</option>
                            {{-- melakukan looping pada tiap role yang ada --}}
                            @foreach($roles as $role)
                                {{-- menampilkan nama role dan mengambil nilai dari id role --}}
                                <option value='{{ $role->id }}'>{{ $role->name }}</option>                            
                            @endforeach
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- inputan email --}}
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $users->email }}" placeholder="Name@example.com">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    

                    {{-- inputan password --}}
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" aria-labelledby="passwordHelpBlock" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- inputan phone --}}
                    <div class="col-md-12">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $users->phone }}" placeholder="081234567890">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4 d-flex justify-content-between">
                        <button class="btn btn-success" type="submit" value="Simpan">Save</button>
                        <a href="{{ route('user.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection