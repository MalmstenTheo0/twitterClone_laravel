@extends('layout.layout')

@section('content')
        <div class="row">
            <div class="col-3">
                {{-- Side Nav Bar --}}
                @include('shared.left-sidebar')
            </div>
            <div class="col-6">
                @include('shared.success-message')
                @include('shared.submit-idea')
                <hr>

                @forelse ($ideas as $idea)
                <div class="mt-3">
                    {{-- CADA IDEA CARD --}}
                    @include('shared.idea-card')
                </div>
                @empty
                    <h2>No results found</h2>
                @endforelse

                <div class="mt-3">
                    {{$ideas->withQueryString()->links()}}
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
