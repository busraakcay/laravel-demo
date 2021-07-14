@extends("layouts.layout")
@extends("layouts.app")
<!-- iceriginin nerede oldugu belirtilir -->
@section("content")
<!-- buradaki kısım "content" isimlendirildi -->
<!-- auth. işlemleri için -> composer require laravel/ui
                          -> php artisan ui vue --auth 
                          -> npm install 
                          -> npm run dev -->
<div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ">
        <img src="img/pizzahouse.png" alt="Pizza Evi Resmi"><br>
        <div class="title"  style="text-align: center;">{{trans("text.title")}}</div>
    </div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" style="text-align: center;">
        <a href="{{ route('pizzalar.create') }}" style="text-decoration: none;">{{trans("text.order")}}</a><br><br><br> <!-- Route'da isimlendirildi href linki -->
        <div>
            @if (session('messageStore'))
            <div class="alert alert-success">
                <p class="message">{{session("messageStore")}}</p>
            </div>
            @endif
        </div>
        <div>
            @if (session('messageDestroy'))
            <div class="alert alert-success">
                <p class="message">{{session("messageDestroy")}}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection