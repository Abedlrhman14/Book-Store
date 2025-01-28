@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Discount ->Create</h1>
@stop

@section('content')
    <form action="{{route('dashboard.discount.store')}}" method="post">
        @csrf
        <div class="row">
            <x-adminlte-input name="code" type="text" label="code" placeholder="ex:****"
                fgroup-class="col-md-4" />

                <x-adminlte-button theme="outline-primary" class="align-self-center" id="generate-code" label="Generate" />

                <x-adminlte-input name="quantity" type="number" label="quantity" placeholder="ex:1 - 100"
                fgroup-class="col-md-6" />

                <x-adminlte-input name="percentage" type="text" label="percentage" placeholder="ex:Max 90"
                fgroup-class="col-md-6" />


                <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="save!"/>

        </div>
            <x-adminlte-input name="expiry_date" type="datetime-local" label="expiry_date" fgroup-class="col-md-12" />


    </form>
@stop

@section('js')
    <script>
        const codeElement=document.querySelector('input[name=code]');
        const generateCodeElement=document.querySelector('#generate-code');
        generateCodeElement.addEventListener('click',insertCode);
        async function insertCode() {
            const code=generateDiscountCode();
            const is_exist = await checkCodeAvilable(checkCodeUrl,code);
            if(!is_exist)
            {
                codeElement.value = code;
            }
        }
        const checkCodeUrl = "{{route('discount.check.code')}}";
        async function checkCodeAvilable(url,code)
        {
            const response = await fetch(url);
            const data = await response.json();
            return data.data.is_exist;
        }

        function generateDiscountCode()
        {
            const prefix = "Discount";
            const caracters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&";
            let code = prefix;

            for(let i = 0; i < 4; i++)
            {
                const randomIndex = Math.floor(Math.random() * caracters.length);
                code += caracters[randomIndex];
            }
            return code ;
        }
    </script>
@endsection
