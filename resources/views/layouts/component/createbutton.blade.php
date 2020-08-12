{{-- レビューを書くボタン --}}
{{-- component.dramaindexにて利用 --}}
{{-- component.dramapointにて利用 --}}
{{-- component.mypagedramaindexにて利用 --}}

@guest
    <a href="{{ route('login') }}">
        <button class="btn btn-accent-color mt-2 mr-0 ml-0">レビューを書く</button>
    </a>
@else
    {{-- レビューを既に投稿したか判定 --}}
    @if(empty($drama->reviews()->where('user_id',Auth::user()->id)->first()))
        <a href="{{ route('review_add', ['drama_id' => $drama->id]) }}">
            <button class="btn btn-accent-color mt-2 mr-0 ml-0">レビューを書く</button>
        </a>
    @else
        {{-- edit画面 --}}
        <a href="{{ route('review_edit', ['drama_id' => $drama->id, 'review_id' => $drama->reviews()->where('user_id',Auth::user()->id)->first()->id]) }}">
            <button class="btn btn-accent-color mt-2 mr-0 ml-0">レビューを編集</button>
        </a>
        {{-- 削除ボタンは作品詳細画面(及びマイページ)、かつ未分類・未視聴の作品のみ表示させる --}}
        @if($delete == 'on' && ( $drama->reviews()->where('user_id',Auth::user()->id)->first()->progress == '1' || $drama->reviews()->where('user_id',Auth::user()->id)->first()->progress == '0') )
            <a href="{{ route('review_delete', ['drama_id' => $drama->id, 'review_id' => $drama->reviews()->where('user_id',Auth::user()->id)->first()->id]) }}">
                <button class="btn-register btn-delete-color mt-2 mr-0 ml-1">レビューを削除</button>
            </a>
        @endif
    @endif
@endguest
