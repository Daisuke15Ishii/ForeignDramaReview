{{-- component.followindexにて利用 --}}

{{-- 投稿者 --}}
<div class="col-md-6 mx-auto mb-2">
    <div class="row min-height">
        <div class="col-11 mx-auto dramaindex-frame p-1 m-0">
            <div class="row p-0 m-0">
                <div class="col-3 p-0 m-0">
                    @include('layouts.component.imgperson', ['user' => $user, 'class' => 'eyecatch'])
                </div>
                <div class="col-6 p-0">
                    <p class="p-0 m-0"><a href="{{ route('others_home', ['userID' => $user->id]) }}">{{ $user->penname }}</a></p>
                    <p class="p-0 m-0">
                        {{ floor(Carbon\Carbon::parse($user->birth)->age / 10) * 10 }}代
                        @if($user->gender == 'male')
                            ・男性
                        @elseif($user->gender == 'female')
                            ・女性
                        @endif
                    </p>
                    <p class="p-0 m-0">レビュー投稿数：
                        {{ $user->reviews()->wherenotnull('total_evaluation')->count() }}
                    </p>
                    <p class="p-0 m-0">(総合評価平均：{{ sprintf('%.1f', $user->reviews()->avg('total_evaluation')) }}点)</p>
                    <p class="p-0 m-0">
                        いいね取得総数
                        {{ $iike_total = App\Like::whereHas('review', function($q) use($user){
                            $q->where('user_id', '=',  $user->id);
                            })->count()
                        }}
                    </p>
                </div>
                <div class="col-3 p-0">
                    @include('layouts.component.createfollowbutton', ['others' => $user, 'class' => 'btn-small mt-1'])
                </div>
                <div class="col-md-12 p-0">
                    <dl class="p-0 m-0">
                        <dt>プロフィール</dt>
                        <dd class="m-0">
                            @if(!empty($user->profile))
                                {{ \Str::limit($user->profile, 220) }}
                            @else
                                よろしくお願いします。(プロフィール未設定)
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
