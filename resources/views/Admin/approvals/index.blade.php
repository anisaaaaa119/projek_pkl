@extends('layouts.app') {{-- Ganti dengan layout yang kamu pakai --}}

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Daftar Inventaris Barang</h1>

    <a href="{{ route('inventaris.create') }}"
       class="mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
        + Tambah Barang
    </a>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Barang</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($barang as $index => $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->nama_barang }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->kategori }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->jumlah }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->lokasi }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('inventaris.edit', $item->id) }}"
                           class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                        |
                        <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-800 font-semibold"
                                    onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($barang->isEmpty())
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data barang.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
