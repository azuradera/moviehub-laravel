@if ($errors->any())

    <div class="mb-5 rounded-xl bg-red-600/20 border border-red-500 p-4">

        <ul class="list-disc list-inside text-red-300">

            @foreach ($errors->all() as $error)

                <li class="text-sm">{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<div class="space-y-5">

    <!-- Judul Film -->
    <div>
        <label class="block mb-2 font-semibold text-gray-300">Judul Film</label>
        <input
            type="text"
            name="title"
            placeholder="Masukkan judul film"
            value="{{ old('title', $film->title ?? '') }}"
            class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3 text-white focus:border-blue-500 focus:outline-none">
    </div>

    <!-- Genre -->
    <div>
        <label class="block mb-2 font-semibold text-gray-300">Genre</label>
        <input
            type="text"
            name="genre"
            placeholder="Contoh: Action, Drama, Sci-Fi"
            value="{{ old('genre', $film->genre ?? '') }}"
            class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3 text-white focus:border-blue-500 focus:outline-none">
    </div>

    <!-- Sutradara -->
    <div>
        <label class="block mb-2 font-semibold text-gray-300">Sutradara</label>
        <input
            type="text"
            name="director"
            placeholder="Nama sutradara"
            value="{{ old('director', $film->director ?? '') }}"
            class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3 text-white focus:border-blue-500 focus:outline-none">
    </div>

    <!-- Tahun, Durasi, Rating -->
    <div class="grid md:grid-cols-3 gap-4">

        <div>
            <label class="block mb-2 font-semibold text-gray-300">Tahun Rilis</label>
            <input
                type="number"
                name="release_year"
                placeholder="2024"
                value="{{ old('release_year', $film->release_year ?? '') }}"
                class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3 text-white focus:border-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-300">Durasi (Menit)</label>
            <input
                type="number"
                name="duration"
                placeholder="120"
                value="{{ old('duration', $film->duration ?? '') }}"
                class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3 text-white focus:border-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-300">Rating</label>
            <input
                type="number"
                step="0.1"
                min="0"
                max="10"
                name="rating"
                placeholder="8.5"
                value="{{ old('rating', $film->rating ?? '') }}"
                class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3 text-white focus:border-blue-500 focus:outline-none">
        </div>

    </div>

    <!-- Sinopsis -->
    <div>
        <label class="block mb-2 font-semibold text-gray-300">Sinopsis</label>
        <textarea
            rows="5"
            name="synopsis"
            placeholder="Ceritakan tentang film ini..."
            class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3 text-white focus:border-blue-500 focus:outline-none resize-none">{{ old('synopsis', $film->synopsis ?? '') }}</textarea>
    </div>

    <!-- Poster -->
    <div>
        <label class="block mb-2 font-semibold text-gray-300">Poster Film</label>
        
        <div class="mb-4">
            <input
                type="file"
                name="poster"
                id="poster"
                accept="image/*"
                class="w-full rounded-xl border-2 border-dashed border-slate-600 p-4 bg-slate-800 text-gray-400 cursor-pointer hover:border-blue-500 transition">
            <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG, GIF | Maksimal 2MB</p>
        </div>

        <!-- Preview Poster -->
        @if(isset($film) && $film->poster)
            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-300">Poster Saat Ini</label>
                <img
                    src="{{ asset('storage/'.$film->poster) }}"
                    class="rounded-xl shadow-lg max-w-xs object-cover">
            </div>
        @endif

        <img
            id="preview"
            class="rounded-xl shadow-lg max-w-xs object-cover hidden mb-4">
    </div>

    <!-- Tombol Submit -->
    <div class="flex gap-3 pt-4">
        <button
            type="submit"
            class="btn-red px-6 py-3 rounded-xl text-white font-semibold hover:opacity-90 transition">
            Simpan
        </button>

        <a
            href="{{ route('film.index') }}"
            class="px-6 py-3 rounded-xl bg-slate-700 text-white font-semibold hover:bg-slate-600 transition">
            Batal
        </a>
    </div>

</div>

<!-- Script Preview Poster -->
<script>
document.getElementById('poster').addEventListener('change', function(e){
    const file = e.target.files[0];
    
    if(file){
        // Validasi ukuran file (2MB)
        if(file.size > 2 * 1024 * 1024){
            alert('Ukuran file terlalu besar. Maksimal 2MB.');
            this.value = '';
            return;
        }

        const reader = new FileReader();

        reader.onload = function(event){
            const preview = document.getElementById('preview');
            preview.src = event.target.result;
            preview.classList.remove('hidden');
        }

        reader.readAsDataURL(file);
    }
});
</script>