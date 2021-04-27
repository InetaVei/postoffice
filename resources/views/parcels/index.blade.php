@extends('layouts.app')
@section('content')

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                {{-- <p style="color: rgb(255, 30, 30)">{{ $error }}</p> --}}
            @endforeach
        </div>
    @endif

    @if (session('status_success'))
        <p style="color:green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red)"><b>{{ session('status_error') }}</b></p>
    @endif

    <div class="card-body">
        <form class="form-inline" action="{{ route('parcels.index') }}" method="GET">
            <select name="post_id" id="" class="form-control">
                <option value="" selected disabled>Choose post for filtering:</option>
                @foreach ($posts as $post)
                    <option value="{{ $post->id }}" @if ($post->id == app('request')->input('post_id')) selected="selected" @endif>{{ $post->code }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success" href={{ route('parcels.index') }}>Show all</a>
        </form>
    </div>


    <div class="card-body">
        <table class="table">
            <tr>
                <th>Recipient</th>
                <th>weight</th>
                <th>phone</th>
                <th>info</th>
                <th>Parcel town</th>
                <th>Actions</th>
            </tr>
            @foreach ($parcels as $parcel)
                <tr>
                    <td>{{ $parcel->recipient }}</td>
                    <td>{{ $parcel->weigth }}</td>
                    <td>{{ $parcel->phone }}</td>
                    <td>{!! $parcel->info !!}</td>
                    <td>{{ $parcel->post->town }}</td>
                    <td>
                        <form action={{ route('parcels.destroy', $parcel->id) }} method="POST">
                            <a class="btn btn-success" href={{ route('parcels.edit', $parcel->id) }}>Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('parcels.create') }}" class="btn btn-success">Add new</a>
        </div>
    </div>
@endsection
