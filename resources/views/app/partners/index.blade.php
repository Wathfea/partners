@extends('app.layouts.master')

@section('content')
    <h1> Partners </h1>

    @if( isset($error))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Point</th>
        </tr>
        </thead>
        <tbody>
        @foreach($partners as $partner)
            <tr>
                <th scope="row">{{ $partner->id }}</th>
                <td>{{ $partner->name }}</td>
                <td>{{ $partner->point }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $partners->links() }}
@endsection