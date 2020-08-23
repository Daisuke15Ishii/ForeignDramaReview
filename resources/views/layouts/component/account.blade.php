<h1 class="content-title">
    @if($page == "register")
        新規アカウント登録
    @elseif($page == "edit")
        設定の変更
    @endif
</h1>
<div class="main-content">
    @if($page == "register")
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @elseif($page == "edit")
        <form method="POST" action="{{ route('setting_update') }}" enctype="multipart/form-data">
    @endif
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
            <label for="name" class="col-md-4 col-form-label text-md-right">名前：</label>
            <div class="col-md-6">
                @if($page == "register")
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @elseif($page == "edit")
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                @endif

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name_kana" class="col-md-4 col-form-label text-md-right">名前(かな)：</label>
            <div class="col-md-6">
                @if($page == "register")
                    <input id="name_kana" type="text" class="form-control @error('') is-invalid @enderror" name="name_kana" value="{{ old('name_kana') }}" required autocomplete="name_kana">
                @elseif($page == "edit")
                    <input id="name_kana" type="text" class="form-control @error('') is-invalid @enderror" name="name_kana" value="{{ Auth::user()->name_kana }}" required autocomplete="name_kana">
                @endif

                @if ($errors->has('name_kana'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name_kana') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label for="penname" class="col-md-4 col-form-label text-md-right">ペンネーム(サイト内の表示名)：</label>
            <div class="col-md-6">
                @if($page == "register")
                    <input id="penname" type="text" class="form-control @error('') is-invalid @enderror" name="penname" value="{{ old('penname') }}" required autocomplete="penname">
                @elseif($page == "edit")
                    <input id="penname" type="text" class="form-control @error('') is-invalid @enderror" name="penname" value="{{ Auth::user()->penname }}" required autocomplete="penname">
                @endif

                @if ($errors->has('penname'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('penname') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label text-md-right">性別：</label>
            <div class="col-md-6">
                <select name="gender" class="original-form-control" id="gender">
                    @if($page == "register")
                        <option value="male" selected>男性</option>
                        <option value="female">女性</option>
                    @elseif($page == "edit")
                        <option value="male" @if(Auth::user()->gender == 'male') selected @endif>男性</option>
                        <option value="female" @if(Auth::user()->gender == 'female') selected @endif>女性</option>
                    @endif
                </select>
                @if ($errors->has('gender'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4 col-form-label text-md-right pr-0">
                生年月日：
            </div>
            <div class="col-md-6">
                <label for="birthyear" class="form-control-label">西暦</label>
                <select name="birthyear" class="original-form-control" id="birthyear">
                    @for($i = Carbon\Carbon::now()->year - 1; $i > Carbon\Carbon::now()->year - 100; $i--)
                        @if($page == "register")
                            <option value="{{ $i }}">{{ $i }}</option>
                        @elseif($page == "edit")
                            <option value="{{ $i }}" @if(date('Y', strtotime(Auth::user()->birth)) == $i) selected @endif>{{ $i }}</option>
                        @endif
                    @endfor
                </select>
                年
                <select name="birthmonth" class="original-form-control" id="birthmonth">
                    @for($j = 1; $j < 13; $j++)
                        @if($page == "register")
                            <option value="{{ $j }}">{{ $j }}</option>
                        @elseif($page == "edit")
                            <option value="{{ $j }}" @if(date('n', strtotime(Auth::user()->birth)) == $j) selected @endif>{{ $j }}</option>
                        @endif
                    @endfor
                </select>
                月
                
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

        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">アイコン画像：</label>
            <div class="col-md-6">
                @if($page == "register")
                    <input type="file" class="form-control-file" id="image" name="image">
                @elseif($page == "edit")
                    <input type="file" class="form-control-file" id="image" name="image">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remove" value="true">設定中画像を削除
                    </label>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス：</label>
            <div class="col-md-6">
                @if($page == "register")
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @elseif($page == "edit")
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                @endif

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">
                @if($page == "register")
                    パスワード：
                @elseif($page == "edit")
                    新しいパスワード：
                @endif
            </label>
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
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                @if($page == "register")
                    パスワード(確認)：
                @elseif($page == "edit")
                    新しいパスワード(確認)：
                @endif
            </label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-accent-color large-tex">
                    @if($page == "register")
                        新規アカウント登録
                    @elseif($page == "edit")
                        設定変更を反映
                    @endif
                </button>
            </div>
        </div>
    </form>
    {{-- メール実装は保留(後日) --}}
    {{-- 登録ボタンを押すと、ご登録のメールアドレスに確認メールが届きます。 --}}
</div>
