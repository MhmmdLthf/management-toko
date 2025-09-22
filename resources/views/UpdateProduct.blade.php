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

                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('product.edit', $product->id) }}" class="inline-flex items-center text-gray-500 hover:text-blue-600">
                            <svg class="w-4 h-4 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-gray-700">Update Product</span>
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>
    <!-- EndBreadcrumb -->
          
        <div class="p-8 bg-white shadow rounded-2xl overflow-hidden">
    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- ini penting untuk update -->

        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="sm:col-span-2">
                <label class="block mb-2 text-sm font-medium text-gray-900">Nama Barang</label>
                <input type="text" 
                       name="nama_barang"  
                       value="{{ old('nama_barang', $product->nama_barang) }}" 
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
                       placeholder="nama barang" required>
            </div>

            <div class="w-full">
                <label class="block mb-2 text-sm font-medium text-gray-900">isi per grosir</label>
                <input type="number" 
                       name="qty_per_grosir" 
                       value="{{ old('qty_per_grosir', $product->retails->qty_per_grosir) }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
                       placeholder="isi per grosir" required>
            </div>

            <div class="w-full">
                <label class="block mb-2 text-sm font-medium text-gray-900">Stok</label>
                <input type="number" 
                       name="stok" 
                       value="{{ old('stok', $product->stok) }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
                       placeholder="stok" required>
            </div>

            <div class="w-full">
                <label class="block mb-2 text-sm font-medium text-gray-900">Harga Ecer</label>
                <input type="number" step="0.01" 
                       name="harga_ecer" 
                       value="{{ old('harga_ecer', $product->retails->harga_ecer) }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
                       placeholder="harga ecer" required>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Satuan Ecer</label>
                <select name="satuan_ecer" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option value="pcs" {{ $product->retails->satuan == 'pcs' ? 'selected' : '' }}>pcs</option>
                    <option value="kg" {{ $product->retails->satuan == 'kg' ? 'selected' : '' }}>kg</option>
                    <option value="liter" {{ $product->retails->satuan == 'liter' ? 'selected' : '' }}>liter</option>
                    <option value="gr" {{ $product->retails->satuan == 'gr' ? 'selected' : '' }}>gr</option>
                </select>
            </div>

            <div class="w-full">
                <label class="block mb-2 text-sm font-medium text-gray-900">Harga Grosir</label>
                <input type="number" step="0.01" 
                       name="harga_grosir" 
                       value="{{ old('harga_grosir', $product->wholesales->harga_grosir) }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
                       placeholder="harga grosir" required>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Satuan Grosir</label>
                <select name="satuan_grosir" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option value="dus" {{ $product->wholesales->satuan == 'dus' ? 'selected' : '' }}>dus</option>
                    <option value="karung" {{ $product->satuan == 'karung' ? 'selected' : '' }}>karung</option>
                    <option value="kg" {{ $product->satuan == 'kg' ? 'selected' : '' }}>kg</option>
                </select>
            </div>
        </div>

        <!-- Tombol Update & Delete berdampingan -->
        <div class="flex items-center space-x-2 mt-4 sm:mt-6">
            <button type="submit" 
                class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-700 hover:text-white">
                Update product
            </button>
    </form>

            <form action="{{ route('product.destroy', $product->id) }}" method="POST" 
                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="px-4 py-2 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-600 hover:text-white">
                    Delete
                </button>
            </form>
        </div>
</div>

</div>
</x-layout>
