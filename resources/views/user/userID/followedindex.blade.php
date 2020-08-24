@extends('layouts.others')

@section('title',  'フォロワー一覧｜' . $others->penname . 'さんのマイページ｜')

@section('content')
    @include('layouts.component.followindex', ['member' => $others, 'follows' => $followers, 'allfollows' => $allfollowers, 'index' => 'フォローワー一覧'])
@endsection
