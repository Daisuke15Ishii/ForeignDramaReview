@extends('layouts.front')

@section('title', 'おすすめドラマ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto bg-white">
                <h1>おすすめドラマ(総合評価ランキング)</h1>
                <div class="row">
                    <div class="col-md-4 float-right">
                        {{ $scores->appends(request()->input())->links() }}
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 mx-auto">
                        @foreach($scores as $score )
                            @include('layouts.component.rankingindex')
                        @endforeach
                        
                        <p class="float-right">
                            {{ $scores->appends(request()->input())->links() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
