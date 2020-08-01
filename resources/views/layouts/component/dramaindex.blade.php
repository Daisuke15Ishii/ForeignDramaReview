                <div class="row my-4" style="border:dotted 1px">
                    <div class="col-md-3">
                        <div class="">
                            <a href="{{ route('dramaID_index', ['drama_id' => $drama->id] ) }}">
                                <p class="eyecatch" width="190" height="260"><img src="{{ secure_asset($drama->image_path) }}" alt="{{ $drama->title }}画像" title="{{ $drama->title }}"></p>
                            </a>
                        </div>
                        <small>&copy; {{ $drama->copyright }}</small>
                    </div>
                    <div class="col-md-9 bg-warning">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <h2><a href="{{ route('dramaID_index', ['drama_id' => $drama->id] ) }}">{{ $drama->title }} シーズン{{ $drama->season }}</a></h2>
                            </div>
                            <div class="col-md-8">
                                <h3 style="display:inline">総合評価：</h3>
                                @if($drama->reviews()->count('total_evaluation') !== 0)
                                    {{-- sprintf('%.2f', 変数)は、変数を小数点2桁まで表示する --}}
                                    <span class="bg-secondary">{{ sprintf('%.2f', $drama->score()->first()->average_total_evaluation) }}点<img src="#" alt="★評価"></span>
                                @else
                                    <span class="bg-secondary">--点<img src="#" alt="★評価"></span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                @include('layouts.component.mydrama-set')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                @if($drama->reviews()->count('total_evaluation') !== 0)
                                    総合評価の中央値：<span class="bg-secondary">{{ $drama->score()->first()->median_total_evaluation }}点</span>(レビュー評価数：{{ $drama->reviews()->count('total_evaluation') }}人)
                                @else
                                    総合評価の中央値：<span class="bg-secondary">--点</span>(レビュー評価数：0人)
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p>総合評価ランキング：<span class="bg-secondary">●●位</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <?php $date = $drama->onair; ?>
                                @if($date)
                                    <p>{{ date('放映開始：Y年m月', strtotime($date)) }}
                                @else
                                    <p>放映開始： 年 月
                                @endif
                                @if($drama->number !== null)
                                    /全{{ $drama->number }}話</p>
                                @else
                                    /全--話</p>
                                @endif
                            </div>
                            <div class="col-md-7">
                                <p class="">ジャンル：
                                    @foreach($drama->janre()->get() as $janre)
                                        {{ $janre->janre }}
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <dl>
                                    <dt>作品概要</dt>
                                    <dd>
                                        <blockquote cite="{{ $drama->url }}">
                                            <p>{{ \Str::limit($drama->introduction, 250) }}</p>
                                            引用元：<cite><a href="{{ $drama->url }}">{{ $drama->title }}</a></cite>
                                        </blockquote>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('dramaID_index', ['drama_id' => $drama->id] ) }}"><button>作品情報を見る</button></a>
                                @guest
                                    <a href="{{ route('login') }}"><button>レビューを書く！</button></a>
                                @else
                                    {{-- レビューを既に投稿したか判定 --}}
                                    @if(empty($drama->reviews()->where('user_id',Auth::user()->id)->first()))
                                        <a href="{{ route('review_add', ['drama_id' => $drama->id]) }}"><button>レビューを書く！</button></a>
                                    @else
                                        {{-- edit画面に飛ばす予定 --}}
                                        <a href="{{ route('review_edit', ['drama_id' => $drama->id, 'review_id' => $drama->reviews()->where('user_id',Auth::user()->id)->first()->id]) }}"><button>レビューを編集する！</button></a>
                                    @endif
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
