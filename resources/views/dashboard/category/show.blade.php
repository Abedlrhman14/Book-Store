@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>category ->{{$category->name}}</h1>
@stop

@section('content')
    <h1>{{$category->name}}</h1>
    <form action="{{route('dashboard.category.add.discount',$category->id)}}" method="POST">
        @csrf
        <select class="js-example-placeholder-single col-md-3 js-states form-control discount_select2" name="discount_id">
            <option></option>
          </select>
          <a href=""> <button type="submit">Save</button></a>
    </form>
        @stop

    @section('js')
    <script>
        console.log("{{route('discount.search')}}");
            $('.discount_select2').select2({
                //  minimumInputLength: 2, // only start searching when the user has input 3 or more characters
                 placeholder: "select discount",
                 ajax: {
                    url: "{{route('discount.search')}}",
                    datatype:'json',
                    processResults: function(data){
                        return {

                              results: data.data.discounts.map(item => ({
                                 id: item.id,
                                text: item.code+ '-'+item.percentage }))
                             };
                    }
                 }
            });
    </script>
    @stop
