@extends('layouts.front')

@section('title', '作品条件検索')

@section('content')
<div class="col-lg-8 col-12 content-frame">
    <h1 class="content-title">作品の条件検索</h1>
    <div class="main-content">
        <form method="GET" action="{{ action('search\SearchController@detailresult') }}">
            @csrf
            <div class="form-group row">
                <label for="cond_title" class="col-sm-3 col-form-label text-sm-right">作品名：</label>
                <div class="col-sm-7">
                    <input id="cond_title" type="text" class="form-control" name="cond_title" value="{{ old('cond_title') }}"  autocomplete="cond_title" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="cast" class="col-sm-3 col-form-label text-sm-right">主な出演者：</label>
                <div class="col-sm-7">
                    <input id="cast" type="text" class="form-control" name="cast" value="{{ old('cast') }}" autocomplete="cast">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="country" class="col-sm-3 col-form-label text-sm-right">国：</label>
                <div class="col-sm-7">
                    <select name="country" class="form-control" id="country">
                        <option value="">全て</option>
                        <option value="アメリカ">アメリカ</option>
                        <option value="イギリス">イギリス</option>
                        <option value="フランス">フランス</option>
                        <option value="ドイツ">ドイツ</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right">
                    放映開始日：
                </div>
                <div class="col-sm-7">
                    <label for="onair" class="form-control-label">西暦</label>
                    <select name="onair1" class="original-form-control" id="onair1">
                        <option value="" selected>--</option>
                        @for($i = Carbon\Carbon::now()->year; $i > 1950; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    年
                    <select name="onair2" class="original-form-control" id="onair2">
                        <option value="after" selected>以降</option>
                        <option value="before">以前</option>
                        <option value="just">のみ</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-3 col-form-label text-sm-right">ジャンル：</p>
                <div class="col-sm-7">
                    @foreach($janre as $janre)
                        <label class="janre-check">
                            <input type="checkbox" name="janre[]" value="{{ $janre->janre }}">{{ $janre->janre }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group row">
                <label for="total_evaluation" class="col-sm-3 col-form-label text-sm-right">総合評価：</label>
                <div class="col-sm-7">
                    <select name="total_evaluation" class="original-form-control" id="total_evaluation">
                        <option value="">--</option>
                        @for($i = 100; $i > 0; $i--)
                            <option value="{{ $i }}" @if(old('total_evaluation')=='$i') selected @endif>{{ $i }}</option>
                        @endfor
                    </select>点以上
                </div>
            </div>

            <div class="form-group row">
                <label for="story_evaluation" class="col-sm-3 col-form-label text-sm-right">シナリオ：</label>
                <div class="col-sm-3">
                    <select name="story_evaluation" class="original-form-control" id="story_evaluation">
                        <option value="">--</option>
                        @for($i = 10; $i > 0; $i--)
                            <option value="{{ $i/2 }}" @if(old('story_evaluation')=='$i/2') selected @endif>{{ sprintf('%.1f', $i/2) }}</option>
                        @endfor
                    </select>点以上
                </div>

                <label for="world_evaluation" class="col-sm-3 col-lg-2 col-form-label text-sm-right">世界観：</label>
                <div class="col-sm-3">
                    <select name="world_evaluation" class="original-form-control" id="world_evaluation">
                        <option value="">--</option>
                        @for($i = 10; $i > 0; $i--)
                            <option value="{{ $i/2 }}" @if(old('world_evaluation')=='$i/2') selected @endif>{{ sprintf('%.1f', $i/2) }}</option>
                        @endfor
                    </select>点以上
                </div>
            </div>

            <div class="form-group row">
                <label for="cast_evaluation" class="col-sm-3 col-form-label text-sm-right">演者：</label>
                <div class="col-sm-3">
                    <select name="cast_evaluation" class="original-form-control" id="cast_evaluation">
                        <option value="">--</option>
                        @for($i = 10; $i > 0; $i--)
                            <option value="{{ $i/2 }}" @if(old('cast_evaluation')=='$i/2') selected @endif>{{ sprintf('%.1f', $i/2) }}</option>
                        @endfor
                    </select>点以上
                </div>

                <label for="char_evaluation" class="col-sm-3 col-lg-2 col-form-label text-sm-right">キャラ：</label>
                <div class="col-sm-3">
                    <select name="char_evaluation" class="original-form-control" id="char_evaluation">
                        <option value="">--</option>
                        @for($i = 10; $i > 0; $i--)
                            <option value="{{ $i/2 }}" @if(old('char_evaluation')=='$i/2') selected @endif>{{ sprintf('%.1f', $i/2) }}</option>
                        @endfor
                    </select>点以上
                </div>
            </div>

            <div class="form-group row">
                <label for="visual_evaluation" class="col-sm-3 col-form-label text-sm-right">映像美：</label>
                <div class="col-sm-3">
                    <select name="visual_evaluation" class="original-form-control" id="visual_evaluation">
                        <option value="">--</option>
                        @for($i = 10; $i > 0; $i--)
                            <option value="{{ $i/2 }}" @if(old('visual_evaluation')=='$i/2') selected @endif>{{ sprintf('%.1f', $i/2) }}</option>
                        @endfor
                    </select>点以上
                </div>

                <label for="music_evaluation" class="col-sm-3 col-lg-2 col-form-label text-sm-right">音楽：</label>
                <div class="col-sm-3">
                    <select name="music_evaluation" class="original-form-control" id="music_evaluation">
                        <option value="">--</option>
                        @for($i = 10; $i > 0; $i--)
                            <option value="{{ $i/2 }}" @if(old('music_evaluation')=='$i/2') selected @endif>{{ sprintf('%.1f', $i/2) }}</option>
                        @endfor
                    </select>点以上
                </div>
            </div>

            <div class="form-group row">
                <label for="review_comment" class="col-sm-3 col-form-label text-sm-right">キーワード検索：</label>
                <div class="col-sm-7">
                    <input id="review_comment" type="text" class="form-control @error('review_comment') is-invalid @enderror" name="review_comment" value="{{ old('review_comment') }}" autocomplete="review_comment">
                    <p>※レビュー内に含まれるキーワード</p>
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-3 text-sm-right">前作視聴(準備中)：</p>
                <div class="col-sm-7">
                    <label class="janre-check"><input type="checkbox" name="previous[]" value="2">必須</label>
                    <label class="janre-check"><input type="checkbox" name="previous[]" value="1">観た方が楽しめる</label>
                    <label class="janre-check"><input type="checkbox" name="previous[]" value="0">不要</label>
                </div>
            </div>

            <div class="form-group row">
                <label for="season1" class="col-sm-3 col-form-label text-sm-right">シーズン1のみ：</label>
                <div class="col-sm-7 d-flex align-items-center">{{-- d-flex align-items-centerでinputの上下中央寄せ --}}
                    <input type="checkbox" class="season" name="season1" value="1" @if(old('season1') == '1') checked @endif>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-accent-color large-tex">
                        検索開始
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
