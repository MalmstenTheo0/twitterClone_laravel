@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            {{-- Side Nav Bar --}}
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            <div class="mt-3">
                @include('shared.idea-card')
            </div>
        </div>
        <div class="col-3">
            {{-- SEARCH BAR --}}
            @include('shared.search-bar')
            {{-- FOLLOW BOX --}}
            @include('shared.follow-box')
        </div>
    </div>
    </div>
@endsection
