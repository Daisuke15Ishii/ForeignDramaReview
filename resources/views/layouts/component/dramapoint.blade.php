{{-- drama.dramaID.indexにて利用 --}}

<div class="row mb-4 p-2">
    <div class="col-md-3 py-1">
        <p class="eyecatch">
            <a href="{{ route('dramaID_index', ['drama_id' => $drama->id] ) }}">
                <img src="{{ secure_asset($drama->image_path) }}" alt="{{ $drama->title }}画像" title="{{ $drama->title }}">
            </a>
        </p>
        <small>&copy; {{ $drama->copyright }}</small>
        <p>タイトル：<cite>{{ $drama->title }} シーズン{{ $drama->season }}({{ $drama->title_en }})</cite></p>
    </div>
    <div class="col-md-9 dramaindex-frame">
        <div class="row mb-0">
            <div class="col-12 mx-auto mb-2 pt-2">
                <h2>レビュー統計</h2>
            </div>
            {{-- ここから下はほぼsearch.result.indexと同様なのでパーツ化検討 --}}
            <div class="col-lg-4 col-md-5 col-12 order-md-2 mb-2">
                @include('layouts.component.mydrama-set')
            </div>
            <div class="col-lg-8 col-md-7 col-12 order-md-1 mb-2">
                <p class="large-text">
                    総合評価：
                    {{-- sprintf('%.2f', 変数)は、変数を小数点2桁まで表示する --}}
                    @if($drama->reviews()->count('total_evaluation') !== 0)
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
        
        <div class="row mx-0 mb-2">
            {{-- 下記の各項目評価の表示は、点数によって星アイコンが増減 --}}
            @include('layouts.component.evaluationdisplay', ['evaluation' =>  $drama->reviews()->avg('story_evaluation'), 'item' => 'シナリオ', 'order' => 'order-md-1'])
            @include('layouts.component.evaluationdisplay', ['evaluation' =>  $drama->reviews()->avg('world_evaluation'), 'item' => '世界観', 'order' => 'order-md-3'])
            @include('layouts.component.evaluationdisplay', ['evaluation' =>  $drama->reviews()->avg('cast_evaluation'), 'item' => '演者', 'order' => 'order-md-5'])
            @include('layouts.component.evaluationdisplay', ['evaluation' =>  $drama->reviews()->avg('char_evaluation'), 'item' => 'キャラ', 'order' => 'order-md-2'])
            @include('layouts.component.evaluationdisplay', ['evaluation' =>  $drama->reviews()->avg('visual_evaluation'), 'item' => '映像美', 'order' => 'order-md-4'])
            @include('layouts.component.evaluationdisplay', ['evaluation' =>  $drama->reviews()->avg('music_evaluation'), 'item' => '音楽', 'order' => 'order-md-6'])
            <div class="col-lg-6 mb-1 order-md-7">
                <p>作品登録者数：<span class="total-evaluation font-weight-bold bg-evaluation">{{ $drama->favorites()->count() }}人</span></p>
            </div>
            <div class="col-lg-6 mb-1 order-md-8">
                <p>お気に入り登録者数：<span class="total-evaluation font-weight-bold bg-evaluation">{{ $drama->favorites()->where('favorite',1)->count() }}人</span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="large-text mb-2">前作視聴</p>
                <ul class="list-horizontal">
                    @if($previous_require = $drama->reviews()->where('previous',2)->count() !== 0)
                        <li class="list-horizontal-item">必須：<span class="font-weight-bold bg-evaluation">{{ sprintf('%.1f', $previous_require = $drama->reviews()->where('previous',2)->count() * 100 / $drama->reviews()->whereIn('previous',[0,1,2])->count()) }}%</span></li>
                    @else
                        <li class="list-horizontal-item">必須：<span class="font-weight-bold bg-evaluation">0%</span></li>
                    @endif
                    @if($previous_require = $drama->reviews()->where('previous',1)->count() !== 0)
                        <li class="list-horizontal-item">観た方が良い：<span class="font-weight-bold bg-evaluation">{{ sprintf('%.1f', $previous_better = $drama->reviews()->where('previous',1)->count() * 100 / $drama->reviews()->whereIn('previous',[0,1,2])->count()) }}%</span></li>
                    @else
                        <li class="list-horizontal-item">観た方が良い：<span class="font-weight-bold bg-evaluation">0%</span></li>
                    @endif
                    @if($previous_require = $drama->reviews()->where('previous',0)->count() !== 0)
                        <li class="list-horizontal-item">不要：<span class="font-weight-bold bg-evaluation">{{ sprintf('%.1f', $previous_no = $drama->reviews()->where('previous',0)->count() * 100 / $drama->reviews()->whereIn('previous',[0,1,2])->count()) }}%</span></li>
                    @else
                        <li class="list-horizontal-item">不要：<span class="font-weight-bold bg-evaluation">0%</span></li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 text-right">
                @include('layouts.component.createbutton', ['delete' => 'on'])
            </div>
        </div>
    </div>
</div>
