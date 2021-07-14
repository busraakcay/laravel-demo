@extends("layouts.app")
<!-- iceriginin nerede oldugu belirtilir -->
@section("content")
<!-- buradaki kısım "content" isimlendirildi -->
<!--
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <span class="title">Pizza Ekle</span>
        </div>
        
    </div>
</div>
-->
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="wrapper create-pizza container-sm">
        <h5 class="title">{{trans("text.newPizza")}}</h5>
        <form action="/pizzalar" method="post">
            @csrf
            <div class="input-group input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">{{trans("text.name")}}</span>
                </div>
                <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="type">{{trans("text.type")}}</label>
                </div>
                <select class="custom-select" name="type" id="type">
                    <option selected>Seçiniz...</option>
                    <option value="{{trans('text.cheddar')}}">{{trans("text.cheddar")}}</option>
                    <option value="{{trans('text.sausage')}}">{{trans("text.sausage")}}</option>
                    <option value="{{trans('text.mushrooms')}}">{{trans("text.mushrooms")}}</option>
                    <option value="{{trans('text.mixed')}}">{{trans("text.mixed")}}</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="base">{{trans("text.base")}}</label>
                </div>
                <select class="custom-select" name="base" id="base">
                    <option selected>Seçiniz...</option>
                    <option value="{{trans('text.cheese')}}">{{trans("text.cheese")}}</option>
                    <option value="{{trans('text.thin')}}">{{trans("text.thin")}}</option>
                    <option value="{{trans('text.crispy')}}">{{trans("text.crispy")}}</option>
                </select>
            </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend" style="display:block;">
                       <label class="input-group-text" style="justify-content: center;">{{trans("text.topping")}}</label>
                        <input type="checkbox" name="toppings[]" value="{{trans('text.crispy')}}"> {{trans("text.crispy")}}
                        <input type="checkbox" name="toppings[]" value="{{trans('text.mayonnaise')}}"> {{trans("text.mayonnaise")}} 
                        <input type="checkbox" name="toppings[]" value="{{trans('text.mustard')}}"> {{trans("text.mustard")}}
                        <input type="checkbox" name="toppings[]" value="{{trans('text.bitterSauce')}}"> {{trans("text.bitterSauce")}}
                    </div>
                </div>
            <input type="submit" class="btn btn-secondary" value="{{trans('text.orderPizza')}}">
        </form>
    </div>
</div>
@endsection