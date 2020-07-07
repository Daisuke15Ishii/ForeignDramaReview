@extends('layouts.member')

{{-- データベース作成後にタイトル修正予定 --}}
@section('title', 'レビュー投稿｜ブレイキング・バッド　シーズン1｜洋ドラ会議(仮)')

{{-- データベース作成後に諸々修正予定(とりあえず文章を手入力) --}}
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto bg-white">
            <h1>ブレイキング・バッド　シーズン１のレビュー投稿</h1>
            {{-- フォーム保存方法については後回し --}}
            <form method="POST" action="{{ url('/drama/dramaID/review') }}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="">
                            <img src="#" width="190" height="260" alt="作品画像" title="作品タイトル">
                        </div>
                        <small>&copy; 2008-2013 Sony Pictures Television Inc.</small>
                    </div>
                    <div class="col-md-9 bg-warning">
                        <div class="row">
                            <div class="form-group col-md-9">
                                <label for="totalpoint" class="bg-secondary">総合評価</label>
                                    <select  id="totalpoint" name="" class="">
                                        <option value="100">100点</option>
                                        <option value="99">99点</option>
                                        <option value="2">2点</option>
                                        <option value="1">1点</option>
                                    </select>
                                <label for="totalpoint" class="bg-secondary">★★★★★</label>
                            </div>
                            <div class="checkbox col-md-3">
                                <input type="checkbox" id="favorite" name="favorite">
                                <label for="favorite" class="bg-secondary">お気に入り登録</label>
                            </div>
                        </div>
                        
                        <div class="row form-inline">
                            <div class="form-group col-md-6">
                                <label for="status" class="control-label bg-secondary">現在の進捗</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="watched" selected>視聴済</option>
                                    <option value="watching">視聴中</option>
                                    <option value="wantto">視聴断念</option>
                                    <option value="not">未視聴</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="voice" class="control-label bg-secondary">字幕・吹替</label>
                                <select class="form-control" id="voice" name="voice">
                                    <option value="dub" selected>吹替</option>
                                    <option value="sub">字幕</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-inline">
                            <div class="form-group col-md-6">
                                <label for="story" class="control-label bg-secondary">シナリオの評価</label>
                                <select class="form-control" id="story" name="story">
                                    <option value="5" selected>★★★★★</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">★★★★</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0">★★★</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">★★</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">★</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="character" class="control-label bg-secondary">キャラの評価</label>
                                <select class="form-control" id="character" name="character">
                                    <option value="5" selected>★★★★★</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">★★★★</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0">★★★</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">★★</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">★</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-inline">
                            <div class="form-group col-md-6">
                                <label for="world" class="control-label bg-secondary">世界観の評価</label>
                                <select class="form-control" id="world" name="world">
                                    <option value="5" selected>★★★★★</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">★★★★</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0">★★★</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">★★</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">★</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="visual" class="control-label bg-secondary">映像美の評価</label>
                                <select class="form-control" id="visual" name="visual">
                                    <option value="5" selected>★★★★★</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">★★★★</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0">★★★</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">★★</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">★</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-inline">
                            <div class="form-group col-md-6">
                                <label for="actor" class="control-label bg-secondary">演者の評価</label>
                                <select class="form-control" id="actor" name="actor">
                                    <option value="5" selected>★★★★★</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">★★★★</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0">★★★</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">★★</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">★</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="music" class="control-label bg-secondary">音楽の評価</label>
                                <select class="form-control" id="music" name="music">
                                    <option value="5" selected>★★★★★</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.0">★★★★</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.0">★★★</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.0">★★</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.0">★</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- ここにdiv="col-md-12"を記述した方が良いかもしれない--}}
                    <input type="submit" value="点数評価のみを保存する" class="mx-auto">
                </div>
            </form>
            <hr>

            <form method="POST" action="{{ url('/drama/dramaID/review') }}">
                @csrf
                <div class="row">
                    <div class="col-md-11 mx-auto bg-warning">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <h2>レビュータイトル</h2>
                                <input type="text" value="" maxlength="80" name="" placeholder="最も伝えたいポイントは何ですか？" size="80">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <h3>レビュー内容</h3>
                                <textarea name="" class="col-md-12" col="20" id="" placeholder="感想を自由に書きましょう！"></textarea>
                            </div>
                            <div class="col-md-12 mx-auto">
                                <label>
                                    <span class="bg-secondary">レビューにネタバレあり</span><input type="radio" name="netabare" value="exist" checked>
                                </label>
                                <label>
                                    <span class="bg-secondary">レビューにネタバレなし</span><input type="radio" name="netabare" value="exist">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <h3>作品成分分類</h3>
                                <h4>前作視聴</h4>
                                <label>
                                    <span class="bg-secondary">必須</span><input type="radio" name="zentaku" value="necessary">
                                </label>
                                <label>
                                    <span class="bg-secondary">観た方が楽しめる</span><input type="radio" name="zentaku" value="better" checked>
                                </label>
                                <label>
                                    <span class="bg-secondary">不要</span><input type="radio" name="zentaku" value="unnecessary">
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
