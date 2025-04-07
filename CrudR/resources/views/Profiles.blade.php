
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @extends('layouts.master')
    @section('title')
        profiles
    @endsection
    @section('main')
    <div class="d-flex gap-3 flex-wrap w-50 mx-auto border mt-5">

        @forelse ($profiles as $profile)
            <div class="card shadow-sm">
                <div>
                    <img src="{{ asset('storage/' . $profile->image) }}" alt="ERROR" width="300" height='200'>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $profile->name }}</p>
                </div>
                <div class="d-flex ">
                    <form  action="{{ route('delete', $profile->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <div>
                            <button type="submit" class="btn btn-danger ">Delete</button>
                        </div>
                    </form>
                    <form class="ms-2" action="{{ route('edit', $profile->id) }}" method="GET">
                        @csrf
                        {{-- @method('delete') --}}
                        <div>
                            <button type="submit" class="btn btn-primary ">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        @empty
            <p>No profiles found.</p>
        @endforelse
        <div>
            {{$profiles->links()}}
        </div>

    </div>
    @endsection
