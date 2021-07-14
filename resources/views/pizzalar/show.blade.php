@extends("layouts.app")
<!-- iceriginin nerede oldugu belirtilir -->
@section("content")
<!-- buradaki kısım "content" isimlendirildi -->
<div style="margin-top: 100px;">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center container-sm card">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <div class="wrapper pizza-details container-sm">
                <h5 class="title" style="margin-top: 10px; text-align: center;">{{$pizza->name}} - {{trans("text.orderDetail")}}</h5>
                <p class="type">{{trans("text.type")}}: {{$pizza->type}}</p>
                <p class="base">{{trans("text.base")}} : {{$pizza->base}}</p>
                <p class="toppings">{{trans("text.topping")}}:</p>
                <ul>
                    @foreach ($pizza->toppings as $topping)
                    <li>{{$topping}}</li>
                    @endforeach
                </ul>
                <form action="/pizzalar/{{$pizza->id}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-warning" style="margin-bottom: 5px;">{{trans("text.completeOrder")}}</button>
                </form>
            </div>
        </div>
        <div style=" margin-bottom: 10px; margin-top: 5px; margin-left:auto; margin-right: 2px;">
            <a href="/pizzalar" class="btn btn-primary">
            {{trans("text.returnPizzas")}}</a>
        </div>
    </div>
</div>


@endsection