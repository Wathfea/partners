@extends('app.layouts.master')

@section('content')
    <h1> Properties </h1>

    @include('app.layouts.messages')

    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Value</th>
            <th scope="col">Actions</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($properties as $property)
            <tr>
                <th scope="row">{{ $property->id }}</th>
                <td>{{ $property->name }}</td>
                <td>{{ $property->type }}</td>
                <td>
                    @if( $property->type == 'TEXT')
                        {{ $property->text_value }}
                    @elseif( $property->type == 'NUMBER')
                        {{ $property->number_value }}
                    @else
                        @if( $property->boolean_value === 1 ) TRUE @else FALSE @endif
                    @endif
                </td>
                <td>
                    <a href="{{ route('properties.show', $property->id) }}"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('properties.edit', $property->id) }}"><i class="fas fa-edit"></i></a>
                </td>
                <td>
                    <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $properties->links() }}
@endsection