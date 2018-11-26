@extends('app.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Property
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-cogs"></i> Home</a></li>
            <li><a href="{{ route('properties.index') }}"><i class="fas fa-arrow-right"></i> Properties</a></li>
            <li class="active">Edit #ID: {{ $property->id }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-lg-12">

                <div class="box">
                    <form method="POST" action="{{ route('properties.update', $property->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            @include('app.properties._form', $property)
                        </div>
                        <!-- ./box-body -->

                        <div class="box-footer">
                            <div class="form-group">
                                <a href="{{ route('properties.index') }}" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </div>
                        <!-- box-footer -->

                    </form>
                </div>
                <!-- ./box -->
            </div>
        </div>
    </section>
@endsection