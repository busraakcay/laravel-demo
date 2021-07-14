@extends("layouts.app")
<!-- iceriginin nerede oldugu belirtilir -->
@section("content")
<!-- buradaki kısım "content" isimlendirildi -->
<!-- /**
* ### 2 ###
* tarayicidan router'a istek atildiginda, router parametrelerine gore (view) gecis yapar.
* kullaniciyla iletisime gecen kisimdir.
*/ -->
<div class="wrapper pizza-index relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0 container-sm">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-center pt-8 sm:justify-start">
            <h5 class="title" style="margin-bottom: 15px;">{{trans("text.orders")}}</h5>
        </div>
        <div class="pizza-item">
            @foreach($pizzalar as $pizza)
            <div class="dbDongusu">
                <ul class="list-group">
                    <li class="list-group-item" style="margin-bottom: 8px;">
                        <a href="{{ route('pizzalar.show', $pizza->id) }}" style="text-decoration: none;">{{$pizza->name}} - {{trans("text.detail")}}</a>
                    </li>
                </ul>
            </div>
            @endforeach
        </div>

        {{--<p>{{$ad}}</p>--}}
        {{--<p>{{$type}} - {{$base}} - {{$price . " TL"}}</p> ## /web.php route dan parametre olarak verdigimiz dinamik degisken --}}
        {{--
        @if($price > 15)
            <p>bu pizza pahalı</p>
        @elseif(($price <= 5)) 
            <p>bu pizza ucuz</p>
        @else
        <p>bu pizzanın fiyatı normal</p>
        @endif

        @unless($base == "cheesy crust")
        <p>cheesy crust eklemedin</p>
        @endunless

        @php
            echo("pizzalar");
        @endphp
        --}}

        <!-- @for($i = 0; $i < count($pizzalar); $i++)
            <p>{{$pizzalar[$i]["type"]}}</p>
        @endfor -->

    </div>
</div>
@endsection