{{-- レビューを書くボタン --}}
{{-- component.dramaindexにて利用 --}}
{{-- component.dramapointにて利用 --}}

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
        {{-- 削除ボタンは作品詳細画面(及びマイページ)、かつ未分類・未視聴の作品のみ表示させる --}}
        @if($delete == 'on' && $drama->reviews()->where('user_id',Auth::user()->id)->first()->progress == '1' && $drama->reviews()->where('user_id',Auth::user()->id)->first()->progress == '0')
            <button class="btn-register btn-delete-color mt-2 mr-0 ml-1">
                <a href="{{ action('user\mypage\MypageDramaController@delete', ['drama_id' => $drama->id, 'review_id' => $drama->reviews()->where('user_id',Auth::user()->id)->first()->id]) }}">レビューを削除</a>
            </button>
        @endif
    @endif
@endguest
