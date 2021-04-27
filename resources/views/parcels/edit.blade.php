@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create parcel:</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('parcels.update', $parcel->id) }}">
                            @csrf @method("PUT")
                            <div class="form-group">
                                <label for="">Recipient: </label>
                                <input type="text" name="recipient" class="form-control" value="{{ $parcel->recipient }}">
                            </div>
                            <div class="form-group">
                                <label for="">weight: </label>
                                <input type="decimal" name="weight" class="form-control" value="{{ $parcel->weight }}">
                            </div>
                            <div class="form-group">
                                <label for="">phone: </label>
                                <input type="number" name="phone" class="form-control" value="{{ $parcel->phone }}">
                            </div>
                            <div class="form-group">
                                <label>Info: </label>
                                {{-- @error('info')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                                <textarea id="mce" name="info" rows=3 cols=3 class="form-control" value="{{ $parcel->info }}"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Parcel: </label>
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