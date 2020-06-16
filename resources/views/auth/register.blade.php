@extends('layouts.front')

@section('title', '新規アカウント登録')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Name') }}：</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- 以下のフォームではid未設定(後回し) --}}
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">名前(名)：</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control @error('') is-invalid @enderror" name="" value="{{ old('name') }}" required autocomplete="" autofocus>

                                @error('')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- 以下のフォームではid未設定(後回し) --}}
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">ペンネーム(サイト内の表示名)：</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control @error('') is-invalid @enderror" name="" value="{{ old('name') }}" required autocomplete="" autofocus>

                                @error('')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- 以下のフォームではid未設定 、諸々の詳細設定は後回し。完成イメージ的なもの --}}
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">性別：</label>
                            <div class="col-md-6">
                                <select name="" class="" id="">
                                    <option value="male" selected>男性</option>
                                    <option value="female">女性</option>
                                </select>
                            </div>
                        </div>

                        {{-- 以下のフォームではid未設定 、諸々の詳細設定は後回し。完成イメージ的なもの --}}
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">生年月日：</label>
                            <div class="col-md-6">
                                <label for="">西暦</label>
                                <select name="" class="" id="">
                                    <option value="1920">1920</option>
                                    <option value="2000" selected>2000</option>
                                </select>
                                年
                                <select name="" class="" id="">
                                    <option value="1">1</option>
                                    <option value="12" selected>12</option>
                                </select>
                                月
                            </div>
                        </div>

                        {{-- 以下のフォームについて 、諸々の詳細設定は後回し。完成イメージ的なもの --}}
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">アイコン画像：</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}：</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.Password') }}：</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('messages.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <p>※登録ボタンを押すと、ご登録のメールアドレスに確認メールが届きます。</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
