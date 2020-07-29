@extends('layouts.member')

@section('title', 'プロフィール変更')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 mx-auto bg-warning">
                    <h1>プロフィールの変更</h1>
                    <form method="POST" action="{{ route('profile_update') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-11 mx-auto">
                                {{-- postでアクセスするとcontrollerで$updateに値が代入される --}}
                                @isset($update)
                                    <p>下記の内容でプロフィールの変更が完了しました。</p>
                                @else
                                    <p>{{ Auth::user()->penname }}さんのプロフィールを自由に入力してください。</p>
                                @endisset
                                @if(isset(Auth::user()->profile) )
                                    <textarea name="profile" class="col-md-12 bg-white" rows=15 id="profile" placeholder="自由にプロフィールを書いてみよう！">{{ Auth::user()->profile }}</textarea>
                                @else
                                    <textarea name="profile" class="col-md-12 bg-white" rows=15 id="profile" placeholder="自由にプロフィールを書いてみよう！">{{ old(Auth::user()->profile) }}</textarea>
                                @endif
                            </div>
                            <input type="submit" value="変更内容を保存" class="mx-auto my-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
@endsection
