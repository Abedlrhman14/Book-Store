@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Discount ->Edit</h1>
@stop

@section('content')
    <form action="{{route('dashboard.discount.update',$discount->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <x-adminlte-input name="code" type="text" label="code" value="{{$discount->code}}"
                fgroup-class="col-md-6" />

                {{-- <x-adminlte-button theme="outline-primary" class="align-self-center" id="generate-code" label="Generate" />  --}}

                <x-adminlte-input name="quantity" type="number" label="quantity" value="{{$discount->quantity}}"
                fgroup-class="col-md-6" />

                <x-adminlte-input name="percentage" type="text" label="percentage" value="{{$discount->percentage}}"
                fgroup-class="col-md-6" />

                <x-adminlte-input name="expiry_date" type="datetime-local" label="expiry_date" value="{{$discount->expiry_date}}" fgroup-class="col-md-6" />

                <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="save!"/>

                <x-adminlte-input name="discount_id" type="hidden"  value="{{$discount->id}}" fgroup-class="col-md-6" />
        </div>
    </form>
@stop

