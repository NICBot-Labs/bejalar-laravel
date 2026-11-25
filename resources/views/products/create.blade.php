@extends('layouts.app')

@section('title', 'Tambah Produk Baru')

@section('content')

{{-- Breadcrumb Navigation --}}
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb small">
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}" class="text-decoration-none text-muted">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}" class="text-decoration-none text-muted">Katalog</a></li>
        <li class="breadcrumb-item active fw-semibold text-dark" aria-current="page">Tambah Produk</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white">
            <div class="card-header bg-white py-3 px-4 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2 py-1"><i class="fa-solid fa-plus"></i></span>
                    <h4 class="mb-0 fw-bold brand-font">Tambah Produk Baru</h4>
                </div>
                <a href="{{ route('produk.index') }}" class="btn btn-sm btn-outline-secondary px-3">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
                </a>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('produk.store') }}" method="POST">
                    @csrf

                    <div class="row g-4">
                        {{-- Left Column: General Info --}}
                        <div class="col-lg-7">
                            <h6 class="fw-bold brand-font text-uppercase small text-muted mb-3" style="letter-spacing: 1px;">
                                <i class="fa-solid fa-circle-info text-primary me-1"></i> Informasi Produk
                            </h6>

                            {{-- Nama Produk --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label fw-semibold text-dark small">
                                    Nama Produk <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted border-end-0">
                                        <i class="fa-solid fa-tag"></i>
                                    </span>
                                    <input type="text" name="nama" id="nama"
                                           class="form-control border-start-0 @error('nama') is-invalid @enderror"
                                           placeholder="Contoh: Kemeja Pria Casual Slim Fit"
                                           value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Kategori (Dropdown) --}}
                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-semibold text-dark small">
                                    Kategori Produk <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted border-end-0">
                                        <i class="fa-solid fa-layer-group"></i>
                                    </span>
                                    <select name="category_id" id="category_id"
                                            class="form-select border-start-0 @error('category_id') is-invalid @enderror" required>
                                        <option value="">-- Pilih Kategori Produk --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label fw-semibold text-dark small">
                                    Deskripsi Produk <span class="text-muted fw-normal">(Opsional)</span>
                                </label>
                                <textarea name="deskripsi" id="deskripsi" rows="4"
                                          class="form-control @error('deskripsi') is-invalid @enderror"
                                          placeholder="Tuliskan spesifikasi, bahan, atau rincian produk...">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Right Column: Pricing & Inventory --}}
                        <div class="col-lg-5">
                            <div class="bg-light p-4 rounded-3 border h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <h6 class="fw-bold brand-font text-uppercase small text-muted mb-3" style="letter-spacing: 1px;">
                                        <i class="fa-solid fa-coins text-warning me-1"></i> Harga & Stok
                                    </h6>

                                    {{-- Harga --}}
                                    <div class="mb-3">
                                        <label for="harga" class="form-label fw-semibold text-dark small">
                                            Harga Satuan (Rp) <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white fw-bold text-muted">Rp</span>
                                            <input type="number" name="harga" id="harga"
                                                   class="form-control @error('harga') is-invalid @enderror"
                                                   placeholder="0"
                                                   value="{{ old('harga') }}" min="0" required>
                                            @error('harga')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-text small text-muted">Masukkan nominal angka bulat tanpa titik/koma.</div>
                                    </div>

                                    {{-- Stok --}}
                                    <div class="mb-3">
                                        <label for="stok" class="form-label fw-semibold text-dark small">
                                            Jumlah Stok Awal <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white text-muted">
                                                <i class="fa-solid fa-boxes-stacked"></i>
                                            </span>
                                            <input type="number" name="stok" id="stok"
                                                   class="form-control @error('stok') is-invalid @enderror"
                                                   placeholder="0"
                                                   value="{{ old('stok', 0) }}" min="0" required>
                                            @error('stok')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="alert alert-info py-2 px-3 small border-0 mb-0 d-flex align-items-center gap-2">
                                        <i class="fa-solid fa-info-circle"></i>
                                        <span>Data tersimpan otomatis terhubung dengan relasi kategori secara aman.</span>
                                    </div>
                                </div>

                                {{-- Buttons --}}
                                <div class="mt-4 pt-3 border-top d-flex gap-2">
                                    <button type="submit" class="btn btn-brand-primary flex-grow-1">
                                        <i class="fa-solid fa-check me-1"></i> Simpan Produk
                                    </button>
                                    <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary px-3">
                                        Batal
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
