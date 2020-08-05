{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')

@section('title', 'お問合せ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="">
                    <h1>お問合せ</h1>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('contact_update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="corporation" class="col-md-4 col-form-label text-md-right">法人名：</label>
                            <div class="col-md-6">
                                <input id="corporation" type="text" class="form-control @error('corporation') is-invalid @enderror" name="corporation" value="{{ old('corporation') }}" autocomplete="corporation" autofocus>

                                @error('corporation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="corporation_kana" class="col-md-4 col-form-label text-md-right">法人名かな：</label>
                            <div class="col-md-6">
                                <input id="corporation_kana" type="text" class="form-control @error('corporation_kana') is-invalid @enderror" name="corporation_kana" value="{{ old('corporation_kana') }}" autocomplete="corporation_kana">

                                @if ($errors->has('corporation_kana'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('corporation_kana') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前(必須)：</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_kana" class="col-md-4 col-form-label text-md-right">名前かな(必須)：</label>
                            <div class="col-md-6">
                                <input id="name_kana" type="text" class="form-control @error('name_kana') is-invalid @enderror" name="name_kana" value="{{ old('name_kana') }}" required autocomplete="name_kana">

                                @if ($errors->has('name_kana'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name_kana') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">電話番号(ハイフン不要)：</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mail" class="col-md-4 col-form-label text-md-right">メールアドレス(必須)：</label>
                            <div class="col-md-6">
                                <input id="mail" type="mail" class="form-control @error('mail') is-invalid @enderror" name="mail" value="{{ old('mail') }}" required autocomplete="mail">

                                @error('mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">問合せ内容(必須)：</label>
                            <div class="col-md-6">
                                <textarea id="comment" name="comment" class="col-md-12" rows="20" value="{{ old('comment') }}">{{ old('comment') }}</textarea>

                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <p>※内容をご確認の上、よろしければ送信ボタンをクリックしてください。</p>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    送信
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
