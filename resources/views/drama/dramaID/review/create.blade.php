@extends('layouts.member')

@section('title', 'レビュー投稿｜'.$drama->title . "シーズン" . $drama->season)

@section('content')
<div class="row justify-content-center p-0 m-0">
    <div class="col-12 content-frame">
        <h1 class="content-title"><a href="{{ route('dramaID_index', ['drama_id' => $drama->id] ) }}">{{ $drama->title }} シーズン{{ $drama->season }}</a>のレビュー投稿</h1>
        <div class="main-content">
            <form action="{{ action('drama\dramaID\review\DramaIDReviewController@create', ['drama_id' => $drama->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="drama_id" value="{{ $drama->id }}">
                <input type="hidden" name="score_id" value="{{ $drama->score()->first()->id }}">
                <div class="row mx-0">
                    @if(count($errors) > 0)
                        <div class="col-11">
                            <ul class="e-message">
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-3">
                        <p class="eyecatch">
                            <a href="{{ route('dramaID_index', ['drama_id' => $drama->id] ) }}">
                                <img src="{{ secure_asset($drama->image_path) }}" alt="{{ $drama->title }}画像" title="{{ $drama->title }}">
                            </a>
                        </p>
                        <small>&copy; {{ $drama->copyright }}</small>
                    </div>
                    <div class="col-md-9 dramaindex-frame mb-2">
                        @if(count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="form-group row mb-2">
                            <div class="col-sm-7 col-md-8 col-form-label">
                                <label for="total_evaluation" class="form-control-label large-text bg-evaluation">総合評価
                                    <select name="total_evaluation" class="original-form-control" id="total_evaluation">
                                        <option value="">点数選択</option>
                                        @for($i = 100; $i > 0; $i--)
                                            <option value="{{ $i }}" @if(old('total_evaluation')==$i) selected @endif>{{ $i }}点</option>
                                        @endfor
                                    </select>
                                </label>
                            </div>
                            <div class="col-sm-5 col-md-4 parent-checkbox">
                                <label for="favorite" class="bg-evaluation mr-2">
                                    <input type="checkbox" id="favorite" name="favorite" value="1" @if(old('favorite')=="1") checked @endif>お気に入り登録
                                </label>
                            </div>
                        </div>
                        
                        <div class="row form-inline">
                            <div class="form-group col-sm-6 mb-2">
                                <label for="progress" class="control-label bg-evaluation">現在の進捗
                                    <select class="original-form-control" id="progress" name="progress">
                                        <option value="0" @if(old('progress')== "0") selected @endif>未分類</option>
                                        <option value="4" @if(old('progress')== "4") selected @endif>視聴済</option>
                                        <option value="3" @if(old('progress')== "3") selected @endif>視聴中</option>
                                        <option value="2" @if(old('progress')== "2") selected @endif>リタイア</option>
                                        <option value="1" @if(old('progress')== "1") selected @endif>観たい</option>
                                    </select>
                                </label>
                            </div>
                            <div class="form-group col-sm-6 mb-2">
                                <label for="subtitles" class="control-label bg-evaluation">字幕・吹替
                                    <select class="original-form-control" id="subtitles" name="subtitles">
                                        <option value="0" @if(old('subtitles')== "0") selected @endif>吹替</option>
                                        <option value="1" @if(old('subtitles')== "1") selected @endif>字幕</option>
                                    </select>
                                </label>
                            </div>
                        </div>
    
                        <div class="row form-inline">
                            @include('layouts.component.evaluationcreate', ['evaluation' =>  'story_evaluation', 'item' => 'シナリオ', 'order' => 'order-1'])
                            @include('layouts.component.evaluationcreate', ['evaluation' =>  'world_evaluation', 'item' => '世界観', 'order' => 'order-3'])
                            @include('layouts.component.evaluationcreate', ['evaluation' =>  'cast_evaluation', 'item' => '演者', 'order' => 'order-5'])
                            @include('layouts.component.evaluationcreate', ['evaluation' =>  'char_evaluation', 'item' => 'キャラ', 'order' => 'order-2'])
                            @include('layouts.component.evaluationcreate', ['evaluation' =>  'visual_evaluation', 'item' => '映像美', 'order' => 'order-4'])
                            @include('layouts.component.evaluationcreate', ['evaluation' =>  'music_evaluation', 'item' => '音楽', 'order' => 'order-6'])
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn-register btn-accent-color">
                            コメントなしで保存する
                        </button>
                    </div>
                </div>
                <hr>
                <div class="row mx-0">
                    <div class="col-12 mx-auto dramaindex-frame mb-2 pt-2">
                        <div class="row">
                            <div class="col-12 mx-auto mb-2">
                                <h2>レビュータイトル</h2>
                                <input type="text" class="review-title-create" value="{{ old('review_title') }}" name="review_title" maxlength="80" placeholder="最も伝えたいポイントは何ですか？" size="80">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mx-auto mb-2">
                                <h3>レビュー内容</h3>
                                <textarea name="review_comment" class="review-title-create px-1" rows="20" placeholder="感想を自由に書きましょう！">{{ old('review_comment') }}</textarea>
                            </div>
                            <div class="col-12 mx-auto">
                                <label class="mr-2">
                                    <span class="bg-evaluation">ネタバレコメントあり</span><input type="radio" name="spoiler_alert" value="1" checked>
                                </label>
                                <label class="mr-2">
                                    <span class="bg-evaluation">ネタバレコメントなし</span><input type="radio" name="spoiler_alert" value="0">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mx-auto mb-2">
                                <h3>前作視聴</h3>
                                <label class="mr-2">
                                    <span class="bg-evaluation">必須</span><input type="radio" name="previous" value="2">
                                </label>
                                <label class="mr-2">
                                    <span class="bg-evaluation">観た方が楽しめる</span><input type="radio" name="previous" value="1" checked>
                                </label>
                                <label class="mr-2">
                                    <span class="bg-evaluation">不要</span><input type="radio" name="previous" value="0">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn-register btn-accent-color">
                            レビューを保存する
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
