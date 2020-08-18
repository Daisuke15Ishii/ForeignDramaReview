@extends('layouts.front')

@section('title', '新規アカウント登録')

@section('content')
<div class="col-lg-8 col-12 content-frame">
    @include('layouts.component.account', ['page' => 'register'])
</div>
@endsection
