@extends('layouts.member')

@section('title',  'いいねしたレビュー一覧｜' . Auth::user()->penname . 'さんのマイページ｜')

@section('content')
    @include('layouts.component.likeindex', ['users' =>''])
@endsection
