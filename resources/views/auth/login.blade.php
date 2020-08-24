@extends('layouts.front')

@section('title', '会員ログイン｜')

@section('content')
<div class="col-lg-8 col-12 content-frame">
    <h1 class="content-title">会員ログイン</h1>
    <div class="main-content">
        <p class="text-md-center pb-2">ご登録のメールアドレスとパスワードをご入力ください。</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @if(count($errors) > 0)
                <div class="row p-0">
                    <div class="col-md-6 mx-auto">
                        <ul class="e-message">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス：</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            ログイン情報を記憶する
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    {{-- パスワードリセット保留 --}}
                    @unless(1)
                        <div class="">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('messages.Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    @endunless
                </div>
                <div class="col-md-12 text-md-center">
                    <a class="btn btn-link" href="{{ route('register') }}">
                        アカウント登録がまだお済みでない人はこちら
                    </a>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-accent-color large-tex">
                        ログイン
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
