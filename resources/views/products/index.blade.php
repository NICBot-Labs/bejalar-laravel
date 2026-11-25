@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

{{-- Brandstore Hero Banner --}}
<div class="card border-0 text-white rounded-3 overflow-hidden shadow-sm mb-4 position-relative" style="background: linear-gradient(135deg, rgba(17,17,17,0.92) 0%, rgba(30,41,59,0.85) 100%), url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat; min-height: 260px;">
    <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-center">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge bg-primary text-uppercase mb-2 px-3 py-2 fw-semibold" style="letter-spacing: 1px; font-size: 11px;">
                    Summer Collection 2026
                </span>
                <h1 class="display-6 fw-bold text-white mb-2" style="font-family: 'Montserrat', sans-serif;">
                    Raining Offers For Hot Summer!
                </h1>
                <p class="text-white-50 mb-4 fs-6" style="max-width: 580px;">
                    25% Off On All Products. Temukan koleksi terlengkap dengan manajemen stok & relasi kategori yang terorganisir rapi.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('produk.create') }}" class="btn btn-brand-primary">
                        <i class="fa-solid fa-plus me-1"></i> Tambah Produk Baru
                    </a>
                    <a href="#tabel-produk" class="btn btn-outline-light text-uppercase fw-semibold px-4 py-2" style="font-size: 13px; letter-spacing: 0.8px;">
                        <i class="fa-solid fa-table-list me-1"></i> Lihat Data Tabel
                    </a>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block text-end">
                <div class="p-3 bg-white bg-opacity-10 backdrop-blur rounded-3 text-start border border-white border-opacity-25" style="backdrop-filter: blur(8px);">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="bg-primary text-white p-2 rounded-circle">
                            <i class="fa-solid fa-boxes-stacked fs-5"></i>
                        </div>
                        <div>
                            <div class="small text-white-50">Total Inventori</div>
                            <div class="fs-4 fw-bold text-white">{{ \App\Models\Product::count() }} Produk</div>
                        </div>
                    </div>
                    <div class="small text-white-50 border-top border-white border-opacity-25 pt-2">
                        <i class="fa-solid fa-tags text-warning me-1"></i> {{ \App\Models\Category::count() }} Kategori Aktif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Section: Data Management Table (UTS Requirement) --}}
<div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white mb-4" id="tabel-produk">
    <div class="card-header bg-white py-3 px-4 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div>
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary px-2 py-1"><i class="fa-solid fa-list-check"></i></span>
                <h4 class="mb-0 fw-bold brand-font">Daftar Produk</h4>
            </div>
            <p class="text-muted small mb-0 mt-1">
                Kelola data produk, relasi kategori, stok, dan harga secara real-time.
            </p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('produk.create') }}" class="btn btn-brand-primary">
                <i class="fa-solid fa-plus me-1"></i> + Tambah Produk
            </a>
        </div>
    </div>

    {{-- Form Pencarian & Filter Produk --}}
    <div class="p-3 bg-light border-bottom">
        <form action="{{ route('produk.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-lg-6 col-md-5 col-12">
                <div class="input-group">
                    <span class="input-group-text bg-white text-muted border-end-0">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="text" name="search" class="form-control border-start-0"
                        placeholder="Cari nama atau deskripsi produk..."
                        value="{{ request('search') }}">
                    @if(request('search'))
                    <a href="{{ route('produk.index', request()->except('search')) }}" class="btn btn-outline-secondary" title="Hapus teks pencarian">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                    @endif
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <select name="category_id" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-12 d-flex gap-2">
                <button type="submit" class="btn btn-brand-primary flex-grow-1">
                    <i class="fa-solid fa-magnifying-glass me-1"></i> Cari
                </button>
                @if(request()->filled('search') || request()->filled('category_id'))
                <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary px-3" title="Reset semua filter">
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
                @endif
            </div>
        </form>

        {{-- Indikator Filter Aktif --}}
        @if(request()->filled('search') || request()->filled('category_id'))
        <div class="mt-2 pt-2 border-top d-flex flex-wrap align-items-center gap-2 small text-muted">
            <span><i class="fa-solid fa-filter text-primary"></i> Filter aktif:</span>
            @if(request()->filled('search'))
            <span class="badge bg-primary text-white py-1 px-2 fw-normal">
                Kata kunci: "<strong>{{ request('search') }}</strong>"
            </span>
            @endif
            @if(request()->filled('category_id'))
            @php $selectedCat = $categories->firstWhere('id', request('category_id')); @endphp
            @if($selectedCat)
            <span class="badge bg-secondary text-white py-1 px-2 fw-normal">
                Kategori: <strong>{{ $selectedCat->nama }}</strong>
            </span>
            @endif
            @endif
            <a href="{{ route('produk.index') }}" class="text-danger small text-decoration-none ms-1 fw-semibold">
                <i class="fa-solid fa-circle-xmark"></i> Reset Filter
            </a>
        </div>
        @endif
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background-color: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                    <tr>
                        <th class="py-3 px-4 text-secondary text-uppercase small fw-bold" style="letter-spacing: 0.5px;">No</th>
                        <th class="py-3 px-4 text-secondary text-uppercase small fw-bold" style="letter-spacing: 0.5px;">Nama</th>
                        <th class="py-3 px-4 text-secondary text-uppercase small fw-bold" style="letter-spacing: 0.5px;">Kategori</th>
                        <th class="py-3 px-4 text-secondary text-uppercase small fw-bold" style="letter-spacing: 0.5px;">Harga</th>
                        <th class="py-3 px-4 text-secondary text-uppercase small fw-bold text-center" style="letter-spacing: 0.5px;">Stok</th>
                        <th class="py-3 px-4 text-secondary text-uppercase small fw-bold text-end" style="letter-spacing: 0.5px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td class="py-3 px-4 fw-semibold text-muted">
                            {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}
                        </td>
                        <td class="py-3 px-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-light rounded-2 d-flex align-items-center justify-content-center text-primary fw-bold" style="width: 38px; height: 38px; border: 1px solid #e2e8f0;">
                                    <i class="fa-solid fa-box-open"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark brand-font">{{ $product->nama }}</div>
                                    @if($product->deskripsi)
                                    <small class="text-muted d-block text-truncate" style="max-width: 250px;">
                                        {{ $product->deskripsi }}
                                    </small>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <span class="badge-brand-cat">
                                <i class="fa-solid fa-tag me-1" style="font-size: 10px;"></i>
                                {{ $product->category->nama ?? '-' }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="fw-bold text-dark">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            @if($product->stok > 10)
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-1 fw-semibold">
                                {{ $product->stok }} unit
                            </span>
                            @elseif($product->stok > 0)
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1 rounded-1 fw-semibold">
                                {{ $product->stok }} (Terbatas)
                            </span>
                            @else
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 rounded-1 fw-semibold">
                                Habis
                            </span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-end">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('produk.edit', $product) }}" class="btn btn-sm btn-outline-primary px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1" style="font-size: 12px; border-radius: 3px;">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>

                                {{-- Tombol hapus dengan konfirmasi (form DELETE) --}}
                                <form action="{{ route('produk.destroy', $product) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1" style="font-size: 12px; border-radius: 3px;">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-box-open display-4 d-block mb-3 text-secondary opacity-50"></i>
                            @if(request()->filled('search') || request()->filled('category_id'))
                            <p class="mb-2">Tidak ada produk yang cocok dengan kriteria pencarian Anda.</p>
                            <a href="{{ route('produk.index') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-rotate-left me-1"></i> Tampilkan Semua Produk
                            </a>
                            @else
                            Belum ada produk. Silakan tambahkan produk baru.
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination Footer --}}
    <div class="card-footer bg-white py-3 px-4 border-top">
        {{ $products->links() }}
    </div>
</div>

@endsection