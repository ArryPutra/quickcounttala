@extends('layouts.layout', ['title' => $title])

@section('content')
    @include('layouts.admin.header')
    <div class="h-24 sm:h-44"></div>
    <main class="sm:px-8 max-sm:px-4">
        <h1>Halo, <b>{{ Auth::user()->nama }}</b></h1>
    </main>
@endsection
