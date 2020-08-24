@extends('layouts.others')

@section('title',  'フォロー中のユーザー一覧｜' . $others->penname . 'さんのマイページ｜')

@section('content')
    @include('layouts.component.followindex', ['member' => $others, 'follows' => $followings, 'allfollows' => $allfollowings, 'index' => 'フォロー一覧'])
@endsection
