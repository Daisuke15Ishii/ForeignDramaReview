{{-- user.mypage.drama.indexにて利用 --}}
{{-- user.userID.drama.indexにて利用 --}}
{{-- user.mypage.drama.favorite.indexにて利用 --}}
{{-- user.userID.drama.favorite.indexにて利用 --}}

@csrf
<div class="order-group row">
    <div class="col-sm-12 text-right">
        <label>
            <input type="checkbox" name="sorts[]" value="not_review_total_evaluation" @if(in_array('not_review_total_evaluation' ,$sorts)) checked @endif>未評価のみ
        </label>
        @if($favor == 'no')
            <label>
                <input type="checkbox" name="sorts[]" value="review_total_evaluation" @if(in_array('review_total_evaluation' ,$sorts)) checked @endif>評価済のみ
            </label>
        @endif
        <label>
            <input type="checkbox" name="sorts[]" value="not_review_comment" @if(in_array('not_review_comment' ,$sorts)) checked @endif>未コメントのみ
        </label>
        @if($favor == 'no')
            <label>
                <input type="checkbox" name="sorts[]" value="review_comment" @if(in_array('review_comment' ,$sorts)) checked @endif>コメント済のみ
            </label>
            <label>
                <input type="checkbox" name="sorts[]" value="favorite" @if(in_array('favorite' ,$sorts)) checked @endif>お気に入り以外
            </label>
        @endif
    </div>
    <div class="col-sm-12 text-right">
        <select name="sortby" class="order-select" id="sortby">
            <option value="update_desc" @if($sortby=='update_desc') selected @endif>投稿日が新しい順</option>
            <option value="update_asc" @if($sortby=='update_asc') selected @endif>投稿日時が古い順</option>
            <option value="title_asc" @if($sortby=='title_asc') selected @endif>タイトル昇順(準備中)</option>
            <option value="title_desc" @if($sortby=='title_desc') selected @endif>タイトル降順(準備中)</option>
            <option value="total_evaluation_desc" @if($sortby=='total_evaluation_desc') selected @endif>総合評価が高い順</option>
            <option value="total_evaluation_asc" @if($sortby=='total_evaluation_asc') selected @endif>総合評価が低い順</option>
            <option value="like_desc" @if($sortby=='like_desc') selected @endif>いいねが多い順</option>
            <option value="like_asc" @if($sortby=='like_asc') selected @endif>いいねが少ない順</option>
        </select>
        <button type="submit" class="btn btn-accent-color">ソート</button>
    </div>
</div>
