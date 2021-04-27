@extends('layouts.app')
@section('content')
    {{-- Validation error, for invalid incoming data display logic --}}
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                {{-- <p style="color: red">{{ $error }}</p> --}}
            @endforeach
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create post:</div>
                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Town: </label>
                                @error('town')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" name="town" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Capacity: </label>
                                @error('capacity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="tex" name="capacity" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Code: </label>
                                @error('code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" name="code" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
