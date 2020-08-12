@extends('layouts.others')

@section('title',  'いいねしたレビュー一覧｜' . $others->penname . 'さんのマイページ')

@section('content')
    @include('layouts.component.likeindex', ['users' => $others])
@endsection
