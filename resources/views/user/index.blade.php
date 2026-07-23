@extends('layouts.moviehub')

@section('content')

<div class="space-y-6">

    @if(session('success'))
        <div class="glass p-4 text-green-300 border border-green-500">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="glass p-4 text-red-300 border border-red-500">
            {{ session('error') }}
        </div>
    @endif

    <div>

        <h1 class="text-3xl font-bold">
            Manajemen User
        </h1>

        <p class="text-gray-300">
            Kelola seluruh akun pengguna.
        </p>

    </div>

    <div class="glass overflow-hidden">

        <table class="w-full">

            <thead class="bg-white/10">

                <tr>

                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Role</th>
                    <th class="p-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                <tr class="border-t border-white/10">

                    <td class="p-4">{{ $user->name }}</td>

                    <td class="p-4">{{ $user->email }}</td>

                    <td class="p-4">

                        @if($user->role=='admin')

                            <span class="text-green-400 font-semibold">

                                Admin

                            </span>

                        @else

                            <span class="text-yellow-400">

                                User

                            </span>

                        @endif

                    </td>

                    <td class="p-4">

                        <div class="flex justify-center gap-2">

                            <a
                                href="{{ route('users.edit',$user) }}"
                                class="bg-yellow-500 px-3 py-2 rounded-lg">

                                Edit

                            </a>

                            @if(auth()->id()!=$user->id)

                            <form
                                action="{{ route('users.destroy',$user) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Hapus user ini?')"
                                    class="bg-red-600 px-3 py-2 rounded-lg">

                                    Hapus

                                </button>

                            </form>

                            @endif

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4"
                        class="text-center p-5">

                        Tidak ada user.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{ $users->links() }}

</div>

@endsection