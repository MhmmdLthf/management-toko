<x-layout>
    <div class="p-6">
        <!-- Breadcrumb -->
        <nav class="flex mb-6 text-sm text-gray-600" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <svg class="w-6 h-6 mr-1 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M9.98189 4.50602c1.24881-.67469 2.78741-.67469 4.03621 0l3.9638 2.14148c.3634.19632.6862.44109.9612.72273l-6.9288 3.60207L5.20654 7.225c.2403-.22108.51215-.41573.81157-.5775l3.96378-2.14148ZM4.16678 8.84364C4.05757 9.18783 4 9.5493 4 9.91844v4.28296c0 1.3494.7693 2.5963 2.01811 3.2709l3.96378 2.1415c.32051.1732.66011.3019 1.00901.3862v-7.4L4.16678 8.84364ZM13.009 20c.3489-.0843.6886-.213 1.0091-.3862l3.9638-2.1415C19.2307 16.7977 20 15.5508 20 14.2014V9.91844c0-.30001-.038-.59496-.1109-.87967L13.009 12.6155V20Z"/>
                    </svg>
                    Products
                </li>
                <li>
                    <div class="flex items-center">
                        <a href="{{ route('product.index') }}" class="inline-flex items-center text-gray-500 hover:text-blue-600">
                            <svg class="w-4 h-4 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-gray-700">List Products</span>
                        </a>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Tombol Tambah Produk -->
        <div class="mb-4">
            <a href="{{ route('product.create') }}" 
               class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                + Tambahkan Produk
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white shadow rounded-2xl overflow-hidden">
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Gambar</th>
                            <th class="px-6 py-3">Nama Barang</th>
                            <th class="px-6 py-3">Stok</th>
                            <th class="px-6 py-3">Harga Ecer</th>
                            <th class="px-6 py-3">Satuan Ecer</th>
                            <th class="px-6 py-3">Harga Grosir</th>
                            <th class="px-6 py-3">Satuan Grosir</th>
                            <th class="px-6 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                   <tbody>
@foreach ($products as $product)
    <tr class="border-b border-gray-200 hover:bg-gray-50">
        <!-- Gambar -->
        <td class="px-6 py-4">
            @if($product->gambar)
                <img src="{{ asset($product->gambar) }}" alt="{{ $product->nama_barang }}" class="w-16 h-16 object-cover rounded">
            @else
                <span class="text-gray-400">Tidak ada gambar</span>
            @endif
        </td>

        <!-- Nama Barang -->
        <td class="px-6 py-4 font-medium text-gray-900">
            {{ $product->nama_barang }}
        </td>

        <!-- Stok -->
        <td class="px-6 py-4">
            {{ $product->display_stock }}
        </td>

        <!-- Harga Ecer -->
        <td class="px-6 py-4">
            @if($product->retails)
                Rp {{ number_format($product->retails->harga_ecer, 0, ',', '.') }}
            @else
                <span class="text-gray-400">-</span>
            @endif
        </td>

        <!-- Satuan Ecer -->
        <td class="px-6 py-4">
            {{ $product->retails->satuan ?? '-' }}
        </td>

        <!-- Harga Grosir -->
        <td class="px-6 py-4">
            @if($product->wholesales)
                Rp {{ number_format($product->wholesales->harga_grosir, 0, ',', '.') }}
            @else
                <span class="text-gray-400">-</span>
            @endif
        </td>

        <!-- Satuan Grosir -->
        <td class="px-6 py-4">
            {{ $product->wholesales->satuan ?? '-' }}
        </td>

        <!-- Action -->
        <td class="px-6 py-4 text-right">
            <div class="flex items-center space-x-2">
                <a href="{{ route('product.edit', $product->id) }}" 
                   class="px-4 py-2 text-sm font-medium text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-700 hover:text-white">
                    Update
                </a>
                <a href="{{ route('product.show', $product->id) }}" 
                   class="px-4 py-2 text-sm font-medium text-green-600 border border-green-600 rounded-lg hover:bg-green-700 hover:text-white">
                    Detail
                </a>
            </div>
        </td>
    </tr>
@endforeach
</tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-layout>
