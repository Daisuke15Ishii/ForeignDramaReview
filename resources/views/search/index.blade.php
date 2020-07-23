@extends('layouts.front')

@section('title', '作品条件検索')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">作品の条件検索</div>

                <div class="card-body">
                    <form method="GET" action="{{ action('search\SearchController@detailresult') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="cond_title" class="col-md-4 col-form-label text-md-right">作品名：</label>
                            <div class="col-md-6">
                                <input id="cond_title" type="text" class="form-control" name="cond_title" value=""  autocomplete="cond_title" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cast" class="col-md-4 col-form-label text-md-right">主な出演者：</label>
                            <div class="col-md-6">
                                <input id="cast" type="text" class="form-control @error('cast') is-invalid @enderror" name="cast" value="{{ old('cast') }}" autocomplete="cast">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">国：</label>
                            <div class="col-md-6">
                                <select name="country" class="" id="country">
                                    <option value="">全て</option>
                                    <option value="アメリカ">アメリカ</option>
                                    <option value="イギリス">イギリス</option>
                                    <option value="フランス">フランス</option>
                                    <option value="ドイツ">ドイツ</option>
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
                                    <option value="" selected>--</option>
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
                            <p class="col-md-4 col-form-label text-md-right">ジャンル：</p>
                            <div class="col-md-6">
                                @foreach($janre as $janre)
                                    <label>
                                        <input type="checkbox" name="janre[]" value="{{ $janre->janre }}">{{ $janre->janre }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_evaluation" class="col-md-4 col-form-label text-md-right">総合評価：</label>
                            <div class="col-md-6">
                                <select id="total_evaluation" name="total_evaluation">
                                    <option value="">--</option>
                                    @for($i = 100; $i > 0; $i--)
                                        <option value="{{ $i }}" @if(old('total_evaluation')=='$i') selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="story_evaluation" class="col-md-4 col-form-label text-md-right">シナリオ：</label>
                            <div class="col-md-6">
                                <select name="story_evaluation" class="" id="story_evaluation">
                                    <option value="">--</option>
                                    @for($i = 10; $i > 0; $i--)
                                        <option value="{{ $i/2 }}" @if(old('story_evaluation')=='$i/2') selected @endif>{{ $i/2 }}</option>
                                    @endfor
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="world_evaluation" class="col-md-4 col-form-label text-md-right">世界観：</label>
                            <div class="col-md-6">
                                <select name="world_evaluation" class="" id="world_evaluation">
                                    <option value="">--</option>
                                    @for($i = 10; $i > 0; $i--)
                                        <option value="{{ $i/2 }}" @if(old('world_evaluation')=='$i/2') selected @endif>{{ $i/2 }}</option>
                                    @endfor
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cast_evaluation" class="col-md-4 col-form-label text-md-right">演者：</label>
                            <div class="col-md-6">
                                <select name="cast_evaluation" class="" id="cast_evaluation">
                                    <option value="">--</option>
                                    @for($i = 10; $i > 0; $i--)
                                        <option value="{{ $i/2 }}" @if(old('cast_evaluation')=='$i/2') selected @endif>{{ $i/2 }}</option>
                                    @endfor
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="char_evaluation" class="col-md-4 col-form-label text-md-right">キャラ：</label>
                            <div class="col-md-6">
                                <select name="char_evaluation" class="" id="char_evaluation">
                                    <option value="">--</option>
                                    @for($i = 10; $i > 0; $i--)
                                        <option value="{{ $i/2 }}" @if(old('char_evaluation')=='$i/2') selected @endif>{{ $i/2 }}</option>
                                    @endfor
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="visual_evaluation" class="col-md-4 col-form-label text-md-right">映像美：</label>
                            <div class="col-md-6">
                                <select name="visual_evaluation" class="" id="visual_evaluation">
                                    <option value="">--</option>
                                    @for($i = 10; $i > 0; $i--)
                                        <option value="{{ $i/2 }}" @if(old('visual_evaluation')=='$i/2') selected @endif>{{ $i/2 }}</option>
                                    @endfor
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="music_evaluation" class="col-md-4 col-form-label text-md-right">音楽：</label>
                            <div class="col-md-6">
                                <select name="music_evaluation" class="" id="music_evaluation">
                                    <option value="">--</option>
                                    @for($i = 10; $i > 0; $i--)
                                        <option value="{{ $i/2 }}" @if(old('music_evaluation')=='$i/2') selected @endif>{{ $i/2 }}</option>
                                    @endfor
                                </select>点以上
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="review_comment" class="col-md-4 col-form-label text-md-right">キーワード検索：</label>
                            <div class="col-md-6">
                                <input id="review_comment" type="text" class="form-control @error('review_comment') is-invalid @enderror" name="review_comment" value="{{ old('review_comment') }}" autocomplete="review_comment">
                                <p>※レビュー内に含まれるキーワード</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <span class="col-md-4 text-md-right">前作視聴(未実装)：</span>
                            <div class="col-md-2">
                                <label><input type="checkbox" name="previous" value="2">必須</label>
                            </div>
                            <div class="col-md-2">
                                <label><input type="checkbox" name="previous" value="1">観た方が楽しめる</label>
                            </div>
                            <div class="col-md-2">
                                <label><input type="checkbox" name="previous" value="0">不要</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="season1" class="col-md-4 col-form-label text-md-right">シーズン1のみ検索：</label>
                            <div class="col-md-6">
                                <input type="checkbox" name="season1" value="1" @if(old('season1') == '1') checked @endif>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary mx-auto">
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
