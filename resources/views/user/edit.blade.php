@extends('layouts.moviehub')

@section('content')

<div class="glass p-8 max-w-xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">

        Edit Role User

    </h1>

    <form
        action="{{ route('users.update',$user) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="mb-6">

            <label class="block mb-2">

                Nama

            </label>

            <input
                type="text"
                value="{{ $user->name }}"
                disabled
                class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3">

        </div>

        <div class="mb-6">

            <label class="block mb-2">

                Role

            </label>

            <select
                name="role"
                class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3">

                <option value="user"
                    @selected($user->role=='user')>

                    User

                </option>

                <option value="admin"
                    @selected($user->role=='admin')>

                    Admin

                </option>

            </select>

        </div>

        <button
            class="btn-red px-6 py-3 rounded-xl">

            Simpan

        </button>

    </form>

</div>

@endsection