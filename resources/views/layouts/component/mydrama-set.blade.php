                                {{-- 「ログイン済」かつ「レビュー投稿済(マイページに作品登録済)」の場合、お気に入り登録(or解除)ボタンを表示 --}}
                                {{-- 上記以外(「未ログイン」または「レビュー未投稿(マイページに作品未登録)」)の場合、マイページ作品登録ボタンを表示 --}}
                                @auth
                                    @if(empty($drama->reviews()->where('user_id',Auth::user()->id)->first()))
                                        <form action="{{ route('my_drama_set') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                            <input type="hidden" name="drama_id" value="{{ $drama->id }}">
                                            <input type="hidden" name="score_id" value="{{ $drama->score()->first()->id }}">
                                            <input type="hidden" name="progress" value="0">
                                            <input type="submit" value="マイページ登録">
                                        </form>
                                    @else
                                        <form action="{{ route('my_favorite_set') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                            <input type="hidden" name="drama_id" value="{{ $drama->id }}">
                                            <input type="hidden" name="review_id" value="{{ $drama->reviews->where('user_id', Auth::id())->first()->id }}">
                                            @if($drama->favorites()->where('user_id', Auth::id())->first()->favorite !== 1)
                                                <p class="submit">
                                                    <input type="hidden" name="favorite" value="1">
                                                    <input type="submit" name="submit" id="favorite" value="お気に入り登録" alt="お気に入り登録">
                                                </p>
                                            @else
                                                <p class="submit">
                                                    <input type="hidden" name="favorite" value="0">
                                                    <input type="submit" name="submit" id="favorite" value="お気に入り解除" alt="お気に入り解除">
                                                </p>
                                            @endif
                                        </form>
                                    @endif
                                @else
                                    <form action="{{ route('my_drama_set') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                        <input type="hidden" name="drama_id" value="{{ $drama->id }}">
                                        <input type="hidden" name="score_id" value="{{ $drama->score()->first()->id }}">
                                        <input type="hidden" name="progress" value="0">
                                        <input type="submit" value="マイページ登録">
                                    </form>
                                @endauth
