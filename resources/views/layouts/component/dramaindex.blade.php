<div class="row mb-4 p-2 dramaindex-frame">
    <div class="col-md-3 py-1">
        <p class="eyecatch">
            <a href="{{ route('dramaID_index', ['drama_id' => $drama->id] ) }}">
            <img src="{{ secure_asset($drama->image_path) }}" alt="{{ $drama->title }}画像" title="{{ $drama->title }}"></a>
        </p>
        <small>&copy; {{ $drama->copyright }}</small>
    </div>
    <div class="col-md-9 p-0">
        <div class="row mb-0">
            <div class="col-12 mx-auto mb-2">
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
                        @include('layouts.component.totalevaluation', ['total_evaluation' =>  $drama->score()->first()->average_total_evaluation, 'size' => ''])</span>
                    @else
                        <span class="total-evaluation font-weight-bold bg-evaluation">--点
                        @include('layouts.component.totalevaluation', ['total_evaluation' =>  '0', 'size' => ''])</span>
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
                        --点</span>(レビュー評価数：0人)
                    @endif
                </p>
            </div>
            <div class="col-lg-4">
                <p>総合評価ランキング：<span class="total-evaluation font-weight-bold bg-evaluation">{{ $drama->score()->first()->rank_average_total_evaluation }}位</span></p>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-lg-5">
                @if($drama->onair !== null)
                    <p>{{ date('放映開始：Y年m月', strtotime($drama->onair)) }}
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
                <p>ジャンル：
                    @foreach($drama->janre()->get() as $janre)
                        {{ $janre->janre }}
                    @endforeach
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <dl>
                    <dt>あらすじ(引用)</dt>
                    <dd>
                        <blockquote class="index-quote" cite="{{ $drama->url }}">
                            <p>{{ \Str::limit($drama->introduction, 250) }}</p>
                        </blockquote>
                        <p>引用元：<cite><a href="{{ $drama->url }}" target="_blank">{{ $drama->title }}</a></cite></p>
                    </dd>
                </dl>
            </div>
            <div class="col-lg-3 text-right">
                @include('layouts.component.createbutton', ['delete' => 'off'])
                <a href="{{ route('dramaID_index', ['drama_id' => $drama->id] ) }}">
                    <button class="btn btn-accent-color mt-2 mr-0 ml-1">作品情報を見る</button>
                </a>
            </div>
        </div>
    </div>
</div>
