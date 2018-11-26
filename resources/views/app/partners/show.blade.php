@extends('app.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Show Partner
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fas fa-cogs"></i> Home</a></li>
            <li><a href="{{ route('partners.index') }}"><i class="fas fa-arrow-right"></i> Partners</a></li>
            <li class="active">Show</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-lg-12">

                <div class="box">
                    <h3>{{ $partner->name }}</h3>
                    <small> Point: {{ $partner->point }}</small>
                </div>
                <!-- ./box -->

                <div class="box">
                    <h3>Properties</h3>
                    <ul>
                        @foreach( $partner->properties as $property )
                            <li>
                                <b>{{ $property->name }}</b> - <small>Created: {{ $property->pivot->created_at }}</small> <br />
                                <b>Type:</b> - <small> {{ $property->type }} </small><br />
                                @if( $property->type == 'TEXT')
                                    {{ $property->text_value }}
                                @elseif( $property->type == 'NUMBER')
                                    {{ $property->number_value }}
                                @else
                                    @if( $property->boolean_value === 1 ) TRUE @else FALSE @endif
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- ./box -->

            </div>
        </div>
    </section>
@endsection