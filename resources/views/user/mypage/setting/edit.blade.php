@extends('layouts.member')

@section('title', '設定の変更')

@section('content')
<div class="row justify-content-center p-0 m-0">
    <div class="col-12 content-frame mb-2">
        @include('layouts.component.account', ['page' => 'edit'])
    </div>
</div>
@endsection
