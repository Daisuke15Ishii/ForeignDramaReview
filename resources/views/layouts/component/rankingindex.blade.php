                <div class="row my-4" style="border:dotted 1px">
                    <div class="col-md-3">
                        <div class="">
                            <a href="{{ route('dramaID_index', ['drama_id' => $score->drama()->first()->id] ) }}">
                                <p class="eyecatch" width="190" height="260"><img src="{{ secure_asset($score->drama()->first()->image_path) }}" alt="{{ $score->drama()->first()->title }}画像" title="{{ $score->drama()->first()->title }}"></p>
                            </a>
                        </div>
                        <small>&copy; {{ $score->drama()->first()->copyright }}</small>
                    </div>
                    <div class="col-md-9 bg-warning">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <h2><a href="{{ route('dramaID_index', ['drama_id' => $score->drama()->first()->id] ) }}">{{ $score->drama()->first()->title }} シーズン{{ $score->drama()->first()->season }}</a></h2>
                            </div>
                            <div class="col-md-8">
                                <h3 style="display:inline">総合評価：</h3>
                                @if($score->reviews()->count('total_evaluation') !== 0)
                                    {{-- sprintf('%.2f', 変数)は、変数を小数点2桁まで表示する --}}
                                    <span class="bg-secondary">{{ sprintf('%.2f', $score->average_total_evaluation) }}点<img src="#" alt="★評価"></span>
                                @else
                                    <span class="bg-secondary">--点<img src="#" alt="★評価"></span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                @include('layouts.component.ranking-mydrama-set')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                @if($score->reviews()->count('total_evaluation') !== 0)
                                    総合評価の中央値：<span class="bg-secondary">{{ $score->median_total_evaluation }}点</span>(レビュー評価数：{{ $score->reviews()->count('total_evaluation') }}人)
                                @else
                                    総合評価の中央値：<span class="bg-secondary">--点</span>(レビュー評価数：0人)
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p>総合評価ランキング：<span class="bg-secondary">{{ $score->rank_average_total_evaluation }}位</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <?php $date = $score->drama()->first()->onair; ?>
                                @if($date)
                                    <p>{{ date('放映開始：Y年m月', strtotime($date)) }}
                                @else
                                    <p>放映開始： 年 月
                                @endif
                                @if($score->drama()->first()->number !== null)
                                    /全{{ $score->drama()->first()->number }}話</p>
                                @else
                                    /全--話</p>
                                @endif
                            </div>
                            <div class="col-md-7">
                                <p class="">ジャンル：
                                    @foreach($score->drama()->first()->janre()->get() as $janre)
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
                                        <blockquote cite="{{ $score->drama()->first()->url }}">
                                            <p>{{ \Str::limit($score->drama()->first()->introduction, 250) }}</p>
                                            引用元：<cite><a href="{{ $score->drama()->first()->url }}">{{ $score->drama()->first()->title }}</a></cite>
                                        </blockquote>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('dramaID_index', ['drama_id' => $score->drama()->first()->id] ) }}"><button>作品情報を見る</button></a>
                                @guest
                                    <a href="{{ route('login') }}"><button>レビューを書く！</button></a>
                                @else
                                    {{-- レビューを既に投稿したか判定 --}}
                                    @if(empty($score->reviews()->where('user_id',Auth::user()->id)->first()))
                                        <a href="{{ route('review_add', ['drama_id' => $score->drama()->first()->id]) }}"><button>レビューを書く！</button></a>
                                    @else
                                        {{-- edit画面に飛ばす予定 --}}
                                        <a href="{{ route('review_edit', ['drama_id' => $score->drama()->first()->id, 'review_id' => $score->reviews()->where('user_id',Auth::user()->id)->first()->id]) }}"><button>レビューを編集する！</button></a>
                                    @endif
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
