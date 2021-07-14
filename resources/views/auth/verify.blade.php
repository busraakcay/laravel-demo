@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('E-Mail Adresini Doğrula') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Doğrulama linki e-mail adresinize gönderilmiştir.') }}
                        </div>
                    @endif

                    {{ __('Şifreninizi kontrol ediniz') }}
                    {{ __('E-Mail taradınıza ulaşmadıysa') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Başka bir e-mail almak için tıklayınız.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
