@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Change post info</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('post.update', $post->id) }}">
                            @csrf @method("PUT")
                            <div class="form-group">
                                <label for="">Town</label>
                                <input type="text" name="town" class="form-control" value="{{ $post->town }}">
                            </div>
                            <div class="form-group">
                                <label for="">Capacity</label>
                                <input type="number" name="capacity" class="form-control" value="{{ $post->capacity }}">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="text" name="code" class="form-control" value="{{ $post->code }}">
                                </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
