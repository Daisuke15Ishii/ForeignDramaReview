@extends('layouts.front')

@section('title', $drama->title . 'シーズン' . $drama->season . 'に関する' . $review->user()->first()->penname . 'さんのレビュー')

@section('content')
<div class="col-12 mx-auto content-frame">
    <h1 class="content-title">{{ $drama->title }} シーズン{{ $drama->season }}のレビュー({{ $review->user()->first()->penname }}さん)</h1>
    <div class="row main-content m-0">
        <div class="col-md-11 mx-auto mb-2">
            <div class="row mb-4 p-2">
                <div class="col-12 mx-auto dramaindex-frame mb-2 pt-2">
                    <h2>{{ $drama->title }} シーズン{{ $drama->season }}のレビュー</h2>
                    <div class="row main-content m-0">
                        @include('layouts.component.review', ['only_page' => 'yes'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
