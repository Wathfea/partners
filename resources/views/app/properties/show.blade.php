@extends('app.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Show Property
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fas fa-cogs"></i> Home</a></li>
            <li><a href="{{ route('properties.index') }}"><i class="fas fa-arrow-right"></i> Properties</a></li>
            <li class="active">Show</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-lg-12">

                <div class="box">
                    <b>{{ $property->name }}</b> -
                    <small>Created: {{ $property->created_at }}</small>
                    <br/>
                    <b>Type:</b> -
                    <small> {{ $property->type }} </small>
                    <br/>
                    @if( $property->type == 'TEXT')
                        {{ $property->text_value }}
                    @elseif( $property->type == 'NUMBER')
                        {{ $property->number_value }}
                    @else
                        @if( $property->boolean_value === 1 ) TRUE @else FALSE @endif
                    @endif
                </div>
                <!-- ./box -->

            </div>
        </div>
    </section>
@endsection