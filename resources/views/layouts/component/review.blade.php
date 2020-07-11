                            <div class="col-md-11 mx-auto bg-light" style="border:dotted 1px">
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <img src="" alt="user画像">
                                        <p><a href="#">{{ $review->user()->first()->name }}</a>さん(仮で本名表示)</p>
                                        <p>20代・男性</p>
                                        <p>投稿日：{{ date('Y年m月d日H時i分', strtotime($review->updated_at))  }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        {{-- countメソッドでレビューに対するいいね数を取得 --}}
                                        <h4>{{ \Str::limit($review->review_title, 100) }}</h4><span class="">({{ $review->likes()->get()->count() }}いいね！)</span>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <span class="bg-secondary">総合評価{{ $review->total_evaluation }}点<img src="#" alt="★評価"></span>
                                                シナリオ:{{ sprintf('%.1f', $review->story_evaluation) }}
                                                世界観:{{ sprintf('%.1f', $review->world_evaluation) }}
                                                演者:{{ sprintf('%.1f', $review->cast_evaluation) }}
                                                キャラ:{{ sprintf('%.1f', $review->char_evaluation) }}
                                                映像美:{{ sprintf('%.1f', $review->visual_evaluation) }}
                                                音楽:{{ sprintf('%.1f', $review->music_evaluation) }}
                                            </div>
                                            <div class="col-md-2">
                                                <p>状態：{{ $review->progress }}</p>
                                                <p>言語：{{ $review->subtitles }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mx-auto bg-white" style="border:solid 1px">
                                                {{ \Str::limit($review->review_comment, 1000) }}
                                            </div>
                                        </div>
                                        {{-- formではない気がするけど取り合えず仮置き --}}
                                        このレビューいいね！<form id="" name="" action=""{{ url('/drama/dramaID/index') }}"" method="POST">@csrf<input type="submit" value="❤"></form>
                                        <form id="" name="" action=""{{ url('/drama/dramaID/index') }}"" method="POST">@csrf<input type="submit" value="違反を報告"></form>
                                    </div>
                                </div>
                            </div>
