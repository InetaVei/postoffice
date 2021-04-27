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
        <table class="table">
            <tr>
                <th>Town</th>
                <th>Capacity</th>
                <th>Code</th>
                <th>Veiksmai</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->town }}</td>
                    <td>{{ $post->capacity }}</td>
                    <td>{{ $post->code }}</td>
                    <td>
                        <form action={{ route('post.destroy', $post->id) }} method="POST">
                            <a class="btn btn-success" href={{ route('post.edit', $post->id) }}>Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('post.create') }}" class="btn btn-success">Add new</a>
        </div>
    </div>
@endsection
