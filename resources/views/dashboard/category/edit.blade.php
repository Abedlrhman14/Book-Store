@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>category ->Edit</h1>
@stop

@section('content')
    <form action="{{route('dashboard.category.update',$category->id)}}" method="Post">
        @csrf
        @method('PUT')
        <div class="row">
            <x-adminlte-input name="name" type="text" label="name" value="{{$category->name}}"
                fgroup-class="col-md-6" />

                <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="save!"/>

        </div>
    </form>
@stop

