@extends('layouts.moviehub')

@section('content')

<div class="glass p-8 max-w-4xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">

        Tambah Film

    </h1>

    <form action="{{ route('film.store') }}"
      method="POST"
      enctype="multipart/form-data">

        @csrf

        @include('film.form')

    </form>

</div>

@endsection