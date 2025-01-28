@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>category ->Create</h1>
@stop

@section('content')
    <form action="{{route('dashboard.category.store')}}" method="post">
        @csrf
        <div class="row">

            <x-adminlte-input name="name" type="text" label="name" placeholder="ex:****"  fgroup-class="col-md-6" />

             <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="save!"/>
        </div>
    </form>
@stop

