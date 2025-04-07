
    @extends('layouts.master')
    @section('title')
        edit
    @endsection
    @section('main')
    <form method="POST" action="{{ route('update', $profile->id) }}" class="w-50 mx-auto mt-5">
        @csrf
        @method('PUT')
        <div class="card shadow p-4">
            <h4 class="text-center mb-3">Update</h4>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ old('name',$profile->name) }}" >
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email', $profile->email) }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">UPDATE</button>
        </div>
    </form>
    @endsection
</body>
