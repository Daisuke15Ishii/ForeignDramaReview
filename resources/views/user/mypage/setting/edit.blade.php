@extends('layouts.member')

@section('title', '設定の変更')

@section('content')
    <div class="row">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">設定の変更</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('setting_update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Name') }}：</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- 以下のフォームではerror処理未設定(後回し) --}}
                        <div class="form-group row">
                            <label for="name_kana" class="col-md-4 col-form-label text-md-right">名前(かな)：</label>
                            <div class="col-md-6">
                                <input id="name_kana" type="text" class="form-control @error('') is-invalid @enderror" name="name_kana" value="{{ Auth::user()->name_kana }}" required autocomplete="name_kana">

                                @if ($errors->has('name_kana'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name_kana') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        {{-- 以下のフォームではerror処理未設定(後回し) --}}
                        <div class="form-group row">
                            <label for="penname" class="col-md-4 col-form-label text-md-right">ペンネーム(サイト内の表示名)：</label>
                            <div class="col-md-6">
                                <input id="penname" type="text" class="form-control @error('') is-invalid @enderror" name="penname" value="{{ Auth::user()->penname }}" required autocomplete="penname">

                                @if ($errors->has('penname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('penname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- 以下のフォームではclass処理未設定(後回し) --}}
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">性別：</label>
                            <div class="col-md-6">
                                <select name="gender" class="" id="gender">
                                    <option value="male" @if(Auth::user()->gender == 'male') selected @endif>男性</option>
                                    <option value="female" @if(Auth::user()->gender == 'female') selected @endif>女性</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- 以下のフォームではerror処理未設定(後回し) --}}
                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">生年月日：
                            </div>
                            <div class="col-md-6">
                                <label for="birthyear" class="col-form-label">西暦
                                    <select name="birthyear" class="" id="birthyear">
                                        @for($i = Carbon\Carbon::now()->year - 1; $i > Carbon\Carbon::now()->year - 100; $i--)
                                            <option value="{{ $i }}" @if(date('Y', strtotime(Auth::user()->birth)) == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                    年
                                </label>
                                <label for="birthmonth" class="col-form-label">
                                    <select name="birthmonth" class="" id="birthmonth">
                                        @for($j = 1; $j < 13; $j++)
                                            <option value="{{ $j }}" @if(date('n', strtotime(Auth::user()->birth)) == $j) selected @endif>{{ $j }}</option>
                                        @endfor
                                    </select>
                                    月
                                </label>
                                @if ($errors->has('birthyear'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('birthyear') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('birthmonth'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('birthmonth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- 以下のフォームでは諸々未設定(後回し) --}}
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">アイコン画像：</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" id="image" name="image">
                                <div class="form-text text-info">
                                    設定中: {{ Auth::user()->image }}
                                </div>
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}：</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

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
                                    修正内容を反映
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- 登録ボタンを押すと、ご登録のメールアドレスに確認メールが届きます。 --}}
                </div>
            </div>
            
            
        </div>
        <div class="col-md-4">
        </div>
    </div>
@endsection
