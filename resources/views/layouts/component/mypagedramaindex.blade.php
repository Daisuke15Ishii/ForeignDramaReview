                    <div class="col-md-6 mx-auto">
                        <div class="row">
                            <div class="col-md-11 mx-auto bg-warning border p-0 m-0">
                                <div class="row">
                                    <div class="col-md-2 border-right p-0 m-0">
                                        {{-- 後で考える。灰色の星のボタンを押すとお気に入り登録される。既に登録されている場合は星の画像が光ってる --}}
                                        <label for="">
                                            <img src="#" alt="星">
                                        </label>
                                        <p>お気に入り</p>
                                    </div>
                                    <div class="col-md-2 p-0 m-0">
                                        <a href="{{ url('/drama/dramaID') }}"><img src="{{ secure_asset('images/1.png') }}" height="auto" width="60" alt="作品画像"></a>
                                    </div>
                                    <div class="col-md-8 p-0 m-0">
                                        <p class="p-0 m-0"><a href="{{ url('/drama/dramaID') }}">ブレイキング・バッド　シーズン5</a></p>
                                        <p class="p-0 m-0">総合評価：99点<img src="#" alt="評価の星マーク"></p>
                                        {{-- if文により、既に投稿済みなら編集ボタン、未投稿ならば新規投稿ボタンを表示 --}}
                                        <p class="p-0 m-0">
                                            <a href="{{ url('/drama/dramaID/review/reviewID') }}">レビュータイトル</a>
                                            <button>
                                                <a href="{{ url('/drama/dramaID/review/reviewID/edit') }}">レビュー編集</a>
                                            </button>
                                        </p>
                                        <p class="p-0 m-0">更新日：2020/5/20　いいね数表示</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
