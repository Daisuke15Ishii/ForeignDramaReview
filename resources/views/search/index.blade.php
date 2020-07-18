@extends('layouts.front')

@section('title', '作品条件検索')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">作品の条件検索</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/search/result') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">作品名：</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autocomplete="title" autofocus>
                            </div>
                        </div>

                        {{-- cast検索はデータベース設計を見直さないと難しい --}}
                        <div class="form-group row">
                            <label for="cast_1" class="col-md-4 col-form-label text-md-right">主な出演者：</label>
                            <div class="col-md-6">
                                <input id="cast_1" type="text" class="form-control @error('cast_1') is-invalid @enderror" name="cast_1" value="{{ old('cast_1') }}" autocomplete="cast_1">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">国：</label>
                            <div class="col-md-6">
                                <select name="country" class="" id="country">
                                    <option value="">国を選択</option>
                                    <option value="America">アメリカ</option>
                                    <option value="England">イギリス</option>
                                    <option value="France">フランス</option>
                                    <option value="Germany">ドイツ</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">
                                放映開始日：
                            </div>
                            <div class="col-md-6">
                                <label for="onair">西暦</label>
                                <select name="onair1" class="" id="onair1">
                                    <option value="" selected>選択</option>
                                    @for($i = Carbon\Carbon::now()->year; $i > 1950; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                年
                                <select name="onair2" class="" id="onair2">
                                    <option value="after" selected>以降</option>
                                    <option value="before">以前</option>
                                    <option value="just">のみ</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="janre1" class="col-md-4 col-form-label text-md-right">ジャンル：</label>
                            <div class="col-md-6">
                                <select name="janre1" class="" id="janre1">
                                    <option value="">1つ選択</option>
                                    @foreach($janre as $janre)
                                        <option value="{{ $janre }}">{{ $janre->janre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <select name="" class="" id="">
                                    <option value="">2つ目を選択</option>
                                    <option value="">犯罪</option>
                                    <option value="">家族</option>
                                    <option value="">恋愛</option>
                                    <option value="">サスペンス</option>
                                </select>
                            </div>
                            <label for="" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <select name="" class="" id="">
                                    <option value="">3つ目を選択</option>
                                    <option value="">犯罪</option>
                                    <option value="">家族</option>
                                    <option value="">恋愛</option>
                                    <option value="">サスペンス</option>
                                </select>
                            </div>
                        </div>

                        {{-- 以下のフォームではid未設定 、諸々の詳細設定は後回し。完成イメージ的なもの --}}
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">総合評価：</label>
                            <div class="col-md-6">
                                <select name="" class="" id="">
                                    <option value=""></option>
                                    <option value="0" selected>0</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">シナリオ：</label>
                            <div class="col-md-6">
                                <select name="" class="" id="">
                                    <option value=""></option>
                                    <option value="0" selected>0</option>
                                    <option value="1.0">1.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3.0">3.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="5.0">5.0</option>
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">世界観：</label>
                            <div class="col-md-6">
                                <select name="" class="" id="">
                                    <option value=""></option>
                                    <option value="0" selected>0</option>
                                    <option value="1.0">1.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3.0">3.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="5.0">5.0</option>
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">演者：</label>
                            <div class="col-md-6">
                                <select name="" class="" id="">
                                    <option value=""></option>
                                    <option value="0" selected>0</option>
                                    <option value="1.0">1.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3.0">3.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="5.0">5.0</option>
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">キャラ：</label>
                            <div class="col-md-6">
                                <select name="" class="" id="">
                                    <option value=""></option>
                                    <option value="0" selected>0</option>
                                    <option value="1.0">1.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3.0">3.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="5.0">5.0</option>
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">映像美：</label>
                            <div class="col-md-6">
                                <select name="" class="" id="">
                                    <option value=""></option>
                                    <option value="0" selected>0</option>
                                    <option value="1.0">1.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3.0">3.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="5.0">5.0</option>
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">音楽：</label>
                            <div class="col-md-6">
                                <select name="" class="" id="">
                                    <option value=""></option>
                                    <option value="0" selected>0</option>
                                    <option value="1.0">1.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3.0">3.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="5.0">5.0</option>
                                </select>点以上
                            </div>
                        </div>

                        {{-- 以下のフォームではid未設定 、諸々の詳細設定は後回し。完成イメージ的なもの --}}
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">キーワード検索：</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control @error('') is-invalid @enderror" name="" value="{{ old('name') }}" autocomplete="" autofocus>
                                <p>※レビュー内に含まれるキーワード</p>
                            </div>
                        </div>

                        {{-- 以下のフォームではid未設定 、諸々の詳細設定は後回し。完成イメージ的なもの --}}
                        <div class="form-group row">
                            <span class="col-md-4 text-md-right">前作視聴：</span>
                            <div class="col-md-2">
                                <label><input type="checkbox" name="zensaku" value="0">必須</label>
                            </div>
                            <div class="col-md-2">
                                <label><input type="checkbox" name="zensaku" value="0">観た方が楽しめる</label>
                            </div>
                            <div class="col-md-2">
                                <label><input type="checkbox" name="zensaku" value="0">不要</label>
                            </div>
                        </div>


                        {{-- 以下のフォームではid未設定 、諸々の詳細設定は後回し。完成イメージ的なもの --}}
                        <div class="form-group row">
                            <label for="season1" class="col-md-4 col-form-label text-md-right">シーズン1のみ検索：</label>
                            <div class="col-md-6">
                                <input type="checkbox" name="season1" value="season1">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    検索開始
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
