
    @extends    ('layouts.master')
    @section('title')
        create
    @endsection
    @section('main')
    <form method="POST" action="{{ route('create.signup') }}" class="w-50 mx-auto my-5" enctype="multipart/form-data">
        @csrf
        <div class="card shadow p-4">
            <h4 class="text-center mb-3">Register</h4>

            <div clas   s="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}" >
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" name="password" placeholder="Enter password" >
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password confirmation</label>
                <input type="password" name="password" class="form-control" id="password" name="password_confirmation" placeholder="Enter password" >
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
                @error('image')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
    </form>
    @endsection

