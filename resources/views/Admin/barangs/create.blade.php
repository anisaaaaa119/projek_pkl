@extends('main')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<div class="max-w-4xl mt-10 mx-auto">
    <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-2xl p-12 my-10 animate__animated animate__fadeIn">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <i class="fas fa-box-open text-5xl text-green-600 mb-4"></i>
            <h1 class="text-4xl font-extrabold text-gray-800">Tambah Data Barang</h1>
            <p class="text-gray-600 mt-2">Silakan isi form di bawah ini dengan lengkap</p>
        </div>

        @if ($errors->any())
        <div class="mb-8 p-4 bg-red-100 border-l-4 border-red-500 rounded-lg">
            <ul class="list-disc list-inside text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('barangs.store') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Form Container -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Nama Barang Field -->
                <div class="space-y-3">
                    <label class="block text-lg font-semibold text-gray-700">
                        <i class="fas fa-tag mr-2 text-green-600"></i>Nama Barang
                    </label>
                    <div class="relative">
                        <input type="text" 
                               name="nama_barang" 
                               id="nama_barang"
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="Masukkan nama barang"
                               value="{{ old('nama_barang') }}"
                               required>
                        <i class="fas fa-box absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    @error('nama_barang')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nomor Urut Field -->
                <div class="space-y-3">
                    <label class="block text-lg font-semibold text-gray-700">
                        <i class="fas fa-sort-numeric-up mr-2 text-green-600"></i>Nomor Urut
                    </label>
                    <div class="relative">
                        <input type="number" 
                               name="nomor_urut" 
                               id="nomor_urut"
                               class="w-full border-2 border-gray-300 rounded-xl p-4 pl-12 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 placeholder-gray-400"
                               placeholder="0-999"
                               value="{{ old('nomor_urut') }}"
                               min="0"
                               max="999"
                               required>
                        <i class="fas fa-hashtag absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    @error('nomor_urut')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <small class="text-gray-500">Nomor urut akan menjadi bagian dari kode barang</small>
                </div>

                <!-- Kondisi Barang Field -->
                <div class="space-y-3 md:col-span-2">
                    <label class="block text-lg font-semibold text-gray-700">
                        <i class="fas fa-clipboard-check mr-2 text-green-600"></i>Kondisi Barang
                    </label>
                    <select name="kondisi_barang" id="kondisi_barang" 
                            class="w-full border-2 border-gray-300 rounded-xl p-4 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" required>
                        <option value="">-- Pilih Kondisi --</option>
                        <option value="Baik" {{ old('kondisi_barang') == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Rusak" {{ old('kondisi_barang') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                    </select>
                    @error('kondisi_barang')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Code Preview Section -->
            <div id="code-preview-section" class="hidden">
                <div class="bg-gradient-to-r from-green-50 to-blue-50 border-2 border-green-200 rounded-xl p-6">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fas fa-qrcode text-2xl text-green-600"></i>
                        <div class="text-center">
                            <p class="text-sm text-gray-600 mb-1">Preview Kode Barang:</p>
                            <p id="code-preview" class="text-2xl font-bold text-green-700 bg-white px-4 py-2 rounded-lg border border-green-300"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Text -->
            <div class="text-center">
                <p id="info-text" class="text-sm text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Kode barang akan dibuat otomatis: 3 huruf nama + nomor urut (contoh: lem-001)
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-center space-x-4 mt-12">
                <a href="{{ route('barangs.index') }}" 
                   class="px-8 py-4 text-lg text-green-600 bg-white border-2 border-green-600 rounded-xl hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <button type="submit" 
                        class="px-8 py-4 text-lg text-white bg-green-600 rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300">
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
