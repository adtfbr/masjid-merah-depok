@extends('layouts.admin')

@section('title', 'Tambah Target Program')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Target Program</h1>
        <a href="{{ route('target-program.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('target-program.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="bidang_id">Bidang <span class="text-danger">*</span></label>
                    <select name="bidang_id" id="bidang_id" 
                            class="form-control @error('bidang_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Bidang --</option>
                        @foreach($bidangs as $bidang)
                            <option value="{{ $bidang->id }}" {{ old('bidang_id') == $bidang->id ? 'selected' : '' }}>
                                {{ $bidang->nama_bidang }}
                            </option>
                        @endforeach
                    </select>
                    @error('bidang_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nomor_urut">Nomor Urut <span class="text-danger">*</span></label>
                    <input type="number" name="nomor_urut" id="nomor_urut" 
                           class="form-control @error('nomor_urut') is-invalid @enderror" 
                           value="{{ old('nomor_urut', 1) }}" 
                           min="1" required>
                    <small class="form-text text-muted">Nomor urut tampilan (1, 2, 3, ...)</small>
                    @error('nomor_urut')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="judul">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" 
                           class="form-control @error('judul') is-invalid @enderror" 
                           value="{{ old('judul') }}" required>
                    <small class="form-text text-muted">Contoh: "Meningkatkan Partisipasi Jamaah"</small>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="5"
                              class="form-control @error('deskripsi') is-invalid @enderror" 
                              required>{{ old('deskripsi') }}</textarea>
                    <small class="form-text text-muted">Penjelasan detail tentang target program</small>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('target-program.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Auto-increment nomor urut berdasarkan bidang yang dipilih
document.getElementById('bidang_id').addEventListener('change', function() {
    const bidangId = this.value;
    if (bidangId) {
        // Get next nomor urut via AJAX
        fetch(`{{ route('target-program.index') }}?bidang_id=${bidangId}&get_next_urut=1`)
            .then(response => response.json())
            .then(data => {
                if (data.next_urut) {
                    document.getElementById('nomor_urut').value = data.next_urut;
                }
            })
            .catch(error => console.error('Error:', error));
    }
});
</script>
@endpush
@endsection
