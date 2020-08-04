@extends('layouts.front')

@section('title', $drama->title . 'シーズン' . $drama->season . 'に関する' . $review->user()->first()->penname . 'さんのレビュー')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white">
                <h1>{{ $drama->title }} シーズン{{ $drama->season }}に関する{{ $review->user()->first()->penname }}さんのレビュー</h1>
                <div class="row bg-warning">
                    <div class="col-md-12">
                        <div class="row">
                            <h3>{{ $review->user()->first()->penname }}さんのレビュー</h3>
                        </div>
                        <div class="row">
                            @include('layouts.component.review-one')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
