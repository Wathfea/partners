@extends('app.layouts.master')

@section('content')
    <h1> Partners </h1>

    @include('app.layouts.messages')

    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Point</th>
            <th scope="col">Actions</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($partners as $partner)
            <tr>
                <th scope="row">{{ $partner->id }}</th>
                <td>{{ $partner->name }}</td>
                <td>{{ $partner->point }}</td>
                <td>
                    <a href="{{ route('partners.show', $partner->id) }}"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('partners.edit', $partner->id) }}"><i class="fas fa-edit"></i></a>
                </td>
                <td>
                    <form action="{{ route('partners.destroy', $partner->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $partners->links() }}
@endsection