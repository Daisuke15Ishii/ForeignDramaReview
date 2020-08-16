@extends('layouts.member')

@section('title',  'フォロー中のユーザー一覧｜' . Auth::user()->penname . 'さんのマイページ')

@section('content')
    @include('layouts.component.followindex', ['member' => Auth::user(), 'follows' => $followings, 'allfollows' => $allfollowings, 'index' => 'フォロー一覧'])
@endsection
