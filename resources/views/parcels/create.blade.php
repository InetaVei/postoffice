@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create parcel:</div>
                    <div class="card-body">
                        <form action="{{ route('parcels.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Recipient: </label>
                                @error('recipient')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <input type="text" name="recipient" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">weight: </label>
                                @error('weight')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <input type="text" name="weight" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">phone: </label>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <input type="number" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Info: </label>
                                @error('info')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                {{-- @error('info')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                                <textarea id="mce" name="info" rows=3 cols=3 class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Parcel: </label>
                                @error('parcel')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <select name="post_id" id="" class="form-control">
                                    <option value="" selected disabled>Choose post</option>
                                    @foreach ($posts as $post)
                                        <option value="{{ $post->id }}">{{ $post->town }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
