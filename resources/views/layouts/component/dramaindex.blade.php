                <div class="row mb-4 p-2 dramaindex-frame">
                    <div class="col-md-3 py-1">
                        <p class="eyecatch" >
                            <a href="{{ route('dramaID_index', ['drama_id' => $drama->id] ) }}">
                            <img src="{{ secure_asset($drama->image_path) }}" alt="{{ $drama->title }}画像" title="{{ $drama->title }}"></a>
                        </p>
                        <small>&copy; {{ $drama->copyright }}</small>
                    </div>
                    <div class="col-md-9 p-0">
                        <div class="row mb-0">
                            <div class="col-sm-12 mx-auto mb-2">
                                <h2><a href="{{ route('dramaID_index', ['drama_id' => $drama->id] ) }}">{{ $drama->title }} シーズン{{ $drama->season }}</a></h2>
                            </div>
                            <div class="col-lg-4 col-md-5 col-12 order-md-2 mb-2">
                                @include('layouts.component.mydrama-set')
                            </div>
                            <div class="col-lg-8 col-md-7 col-12 order-md-1 mb-2">
                                <p class="large-text">
                                    総合評価：
                                    @if($drama->reviews()->count('total_evaluation') !== 0)
                                        {{-- sprintf('%.2f', 変数)は、変数を小数点2桁まで表示する --}}
                                        <span class="total-evaluation font-weight-bold bg-evaluation">{{ sprintf('%.2f', $drama->score()->first()->average_total_evaluation) }}点
                                        @include('layouts.component.evaluation', ['total_evaluation' =>  $drama->score()->first()->average_total_evaluation])</span>
                                    @else
                                        <span class="total-evaluation font-weight-bold bg-evaluation">--点
                                        @include('layouts.component.evaluation', ['total_evaluation' =>  '0'])</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row mx-0">
                            <div class="col-lg-8 mb-1">
                                <p>
                                    総合評価の中央値：<span class="font-weight-bold bg-evaluation">
                                    @if($drama->reviews()->count('total_evaluation') !== 0)
                                        {{ $drama->score()->first()->median_total_evaluation }}点</span>(レビュー評価数：{{ $drama->reviews()->count('total_evaluation') }}人)
                                    @else
                                        </span>(レビュー評価数：0人)
                                    @endif
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <p>総合評価ランキング：<span class="total-evaluation font-weight-bold bg-evaluation">{{ $drama->score()->first()->rank_average_total_evaluation }}位</span></p>
                            </div>
                        </div>
                        <div class="row mx-0">
                            <div class="col-lg-5">
                                <?php $date = $drama->onair; ?>
                                @if($date)
                                    <p>{{ date('放映開始：Y年m月', strtotime($date)) }}
                                @else
                                    <p>放映開始：--年--月
                                @endif
                                @if($drama->number !== null)
                                    /全{{ $drama->number }}話</p>
                                @else
                                    /全--話</p>
                                @endif
                            </div>
                            <div class="col-lg-7">
                                <p class="">ジャンル：
                                    @foreach($drama->janre()->get() as $janre)
                                        {{ $janre->janre }}
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <dl>
                                    <dt>作品概要(引用)</dt>
                                    <dd>
                                        <blockquote class="index-quote" cite="{{ $drama->url }}">
                                            <p>{{ \Str::limit($drama->introduction, 250) }}</p>
                                        </blockquote>
                                        <p>引用元：<cite><a href="{{ $drama->url }}" target="_blank">{{ $drama->title }}</a></cite></p>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-lg-3 text-right">
                                @guest
                                    <button class="btn btn-accent-color mt-2 mr-0 ml-0">
                                        <a href="{{ route('login') }}">レビューを書く</a>
                                    </button>
                                @else
                                    {{-- レビューを既に投稿したか判定 --}}
                                    @if(empty($drama->reviews()->where('user_id',Auth::user()->id)->first()))
                                        <button class="btn btn-accent-color mt-2 mr-0 ml-0">
                                            <a href="{{ route('review_add', ['drama_id' => $drama->id]) }}">レビューを書く</a>
                                        </button>
                                    @else
                                        {{-- edit画面 --}}
                                        <button class="btn btn-accent-color mt-2 mr-0 ml-0">
                                            <a href="{{ route('review_edit', ['drama_id' => $drama->id, 'review_id' => $drama->reviews()->where('user_id',Auth::user()->id)->first()->id]) }}">レビューを編集</a>
                                        </button>
                                    @endif
                                @endguest
                                <button class="btn btn-accent-color mt-2 mr-0 ml-1">
                                    <a href="{{ route('dramaID_index', ['drama_id' => $drama->id] ) }}">作品情報を見る</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
