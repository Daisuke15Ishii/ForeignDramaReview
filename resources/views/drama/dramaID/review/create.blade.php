@extends('layouts.member')

@section('title', 'レビュー投稿｜'.$drama->title . "シーズン" . $drama->season)

{{-- データベース作成後に諸々修正予定(とりあえず文章を手入力) --}}
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white">
            <h1>{{ $drama->title }} シーズン{{ $drama->season }}のレビュー投稿</h1>
            {{-- フォーム保存方法については後回し --}}
            <form action="{{ action('drama\dramaID\review\DramaIDReviewController@create') }}" method="POST">
                @csrf
                {{-- 保留、仮入力。hiddenにid等を記述するのは辞めた方が良いかも--}}
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="drama_id" value="{{ $drama->id }}">
                <div class="row">
                    <div class="col-md-3">
                        <div class="">
                            <p class="eyecatch overflow-hidden col-md-12"><img src="{{ secure_asset($drama->image_path) }}" alt="{{ $drama->title }}画像" title="{{ $drama->title }}"></p>
                        </div>
                        <small>&copy; {{ $drama->copyright }}</small>
                    </div>
                    <div class="col-md-9 bg-warning">
                        @if(count($errors) > 0)
                            <ull>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ull>
                        @endif
                        
                        <div class="row">
                            <div class="form-group col-md-9">
                                <label for="total_evaluation" class="bg-secondary">総合評価</label>
                                    <select id="total_evaluation" name="total_evaluation">
                                        <option value="">点数選択</option>
                                        @for($i = 100; $i > 0; $i--)
                                            <option value="{{ $i }}">{{ $i }}点</option>
                                        @endfor
                                    </select>
                                <label for="total_evaluation" class="bg-secondary">★★★★★</label>
                            </div>
                            <div class="checkbox col-md-3">
                                <input type="checkbox" id="favorite" name="favorite"  value="1">
                                <label for="favorite" class="bg-secondary">お気に入り登録</label>
                            </div>
                        </div>
                        
                        <div class="row form-inline">
                            <div class="form-group col-md-6">
                                <label for="progress" class="control-label bg-secondary">現在の進捗</label>
                                <select class="form-control" id="progress" name="progress">
                                    <option value="uncategorized" selected>未分類</option>
                                    <option value="watched">視聴済</option>
                                    <option value="watching">視聴中</option>
                                    <option value="stop">視聴断念</option>
                                    <option value="want">未視聴</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subtitles" class="control-label bg-secondary">字幕・吹替</label>
                                <select class="form-control" id="subtitles" name="subtitles">
                                    <option value="0" selected>吹替</option>
                                    <option value="1">字幕</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-inline">
                            <div class="form-group col-md-6">
                                <label for="story_evaluation" class="control-label bg-secondary">シナリオの評価</label>
                                <select class="form-control" id="story_evaluation" name="story_evaluation">
                                    <option value="5.0">5.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0" selected>3.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">1.0</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="char_evaluation" class="control-label bg-secondary">キャラの評価</label>
                                <select class="form-control" id="char_evaluation" name="char_evaluation">
                                    <option value="5.0">5.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0" selected>3.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">1.0</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-inline">
                            <div class="form-group col-md-6">
                                <label for="world_evaluation" class="control-label bg-secondary">世界観の評価</label>
                                <select class="form-control" id="world_evaluation" name="world_evaluation">
                                    <option value="5.0">5.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0" selected>3.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">1.0</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="visual_evaluation" class="control-label bg-secondary">映像美の評価</label>
                                <select class="form-control" id="visual_evaluation" name="visual_evaluation">
                                    <option value="5.0">5.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0" selected>3.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">1.0</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-inline">
                            <div class="form-group col-md-6">
                                <label for="cast_evaluation" class="control-label bg-secondary">演者の評価</label>
                                <select class="form-control" id="cast_evaluation" name="cast_evaluation">
                                    <option value="5.0">5.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0" selected>3.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">1.0</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="music_evaluation" class="control-label bg-secondary">音楽の評価</label>
                                <select class="form-control" id="music_evaluation" name="music_evaluation">
                                    <option value="5.0">5.0</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">4.0</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0" selected>3.0</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">2.0</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">1.0</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- ここにdiv="col-md-12"を記述した方が良いかもしれない--}}
                    <input type="submit" value="点数評価のみを保存する" class="mx-auto">
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-11 mx-auto bg-warning">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <h2>レビュータイトル</h2>
                                <input type="text" name="review_title" maxlength="80" placeholder="最も伝えたいポイントは何ですか？" size="80">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <h3>レビュー内容</h3>
                                <textarea name="review_comment" class="col-md-12" col="20" placeholder="感想を自由に書きましょう！"></textarea>
                            </div>
                            <div class="col-md-12 mx-auto">
                                <label>
                                    <span class="bg-secondary">レビューにネタバレあり</span><input type="radio" name="spoiler_alert" value="1" checked>
                                </label>
                                <label>
                                    <span class="bg-secondary">レビューにネタバレなし</span><input type="radio" name="spoiler_alert" value="0">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <h3>作品成分分類</h3>
                                <h4>前作視聴</h4>
                                <label>
                                    <span class="bg-secondary">必須</span><input type="radio" name="previous" value="2">
                                </label>
                                <label>
                                    <span class="bg-secondary">観た方が楽しめる</span><input type="radio" name="previous" value="1" checked>
                                </label>
                                <label>
                                    <span class="bg-secondary">不要</span><input type="radio" name="previous" value="0">
                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- ここにdiv="col-md-12"を記述した方が良いかもしれない--}}
                    <input type="submit" value="レビューを保存して公開" class="mx-auto">
                </div>
            </form>
        </div>
    </div>
@endsection
