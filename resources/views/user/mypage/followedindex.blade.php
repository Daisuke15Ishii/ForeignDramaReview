@extends('layouts.member')

@section('title',  'フォロワー一覧｜' . Auth::user()->penname . 'さんのマイページ｜')

@section('content')
    @include('layouts.component.followindex', ['member' => Auth::user(), 'follows' => $followers, 'allfollows' => $allfollowers, 'index' => 'フォローワー一覧'])
@endsection
