@extends('layouts.moviehub')
@section('content')

<div class="glass p-8 max-w-4xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">

        Edit Film

    </h1>

    <form action="{{ route('film.update',$film) }}"
      method="POST"
      enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('film.form')

    </form>

</div>

@endsection