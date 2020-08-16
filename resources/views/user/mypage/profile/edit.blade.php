@extends('layouts.member')

@section('title', 'プロフィール変更')

@section('content')
<div class="row justify-content-center p-0 m-0">
    <div class="col-12 content-frame mb-2">
        <h1 class="content-title">
            @if($update == 'complete')
                プロフィール変更完了
            @else
                プロフィール変更完了
            @endif
        </h1>
        <form method="POST" action="{{ route('profile_update') }}" class="text-center">
            @csrf
            <div class="row">
                <div class="col-md-11 mx-auto">
                    {{-- postでアクセスするとcontrollerで$updateに値が代入される --}}
                    @if($update == 'complete')
                        <p class="text-left">下記の内容でプロフィールの変更が完了しました。</p>
                    @else
                        <p class="text-left">{{ Auth::user()->penname }}さんのプロフィールを自由に入力してください。</p>
                    @endif
                    @if(Auth::user()->profile !== null )
                        <textarea name="profile" class="review-title-create" rows=15 id="profile" placeholder="自由にプロフィールを書いてみよう！">{{ Auth::user()->profile }}</textarea>
                    @else
                        <textarea name="profile" class="review-title-create" rows=15 id="profile" placeholder="自由にプロフィールを書いてみよう！"></textarea>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn-register btn-accent-color m-0 my-2">
                変更内容を保存
            </button>
        </form>
    </div>
</div>
@endsection
