@extends('layouts.front')

@section('title', $drama->title . 'シーズン' . $drama->season . 'に関する' . Auth::user()->penname . 'さんのレビュー')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white">
                <h1>{{ $drama->title }} シーズン{{ $drama->season }}に関する{{ Auth::user()->penname }}さんのレビュー</h1>
                <div class="row bg-warning">
                    <div class="col-md-12">
                        <div class="row">
                            <h3>{{ Auth::user()->penname }}さんのレビュー</h3>
                        </div>
                        <div class="row">
                            @include('layouts.component.review')
                            {{-- 後でどこかにフォローボタン置いた方が良いかも --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
