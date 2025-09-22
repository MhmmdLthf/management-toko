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
                        <a href="{{ route('product.create') }}" class="inline-flex items-center text-gray-500 hover:text-blue-600">
                        <svg class="w-4 h-4 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-700">Create Product</span>
                        </a>
                    </div>
                </li>
            </ol>
        </nav>
        <!-- EndBreadcrumb -->
          
        <div class="p-8 bg-white shadow rounded-2xl overflow-hidden">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Barang</label>
                        <input type="text" name="nama_barang" value="{{ old('nama_barang') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="nama barang" required>
                    </div>

                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Isi per Grosir</label>
                        <input type="number" name="qty_per_grosir" value="{{ old('qty_per_grosir') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="isi per grosir cth: 25" required>
                    </div>

                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900">stok</label>
                        <input type="number" name="stok" value="{{ old('stok') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="stok" required>
                    </div>

                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Harga Ecer</label>
                        <input type="number" step="0.01" name="harga_ecer" id="harga_ecer"
                            value="{{ old('harga_ecer') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="harga ecer" required>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Satuan Ecer</label>
                        <select name="satuan_ecer"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="pcs" >pcs</option>
                            <option value="kg">kg</option>
                            <option value="liter">liter</option>
                            <option value="gr">gr</option>
                        </select>
                    </div>

                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Harga Grosir</label>
                        <input type="number" step="0.01" name="harga_grosir" id="harga_grosir"
                            value="{{ old('harga_grosir') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="harga grosir" required>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Satuan Grosir</label>
                        <select name="satuan_grosir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="dus" >dus</option>
                            <option value="karung">karung</option>
                            <option value="kg">kg</option>
                        </select>
                    </div>

                    <!-- Input Gambar -->
                    <div class="w-full sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Gambar Produk</label>
                        <input type="file" name="gambar" id="gambar" accept="image/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        
                        <!-- Preview -->
                        <div class="mt-4">
                            <img id="preview" src="#" alt="Preview Gambar" class="hidden w-40 h-40 object-cover rounded-lg border border-gray-200">
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium 
                           text-center text-blue-600 border border-blue-600 rounded-lg 
                           hover:bg-blue-700 hover:text-white">
                    Add product
                </button>
            </form>
        </div>
    </div>

    <!-- Script Preview -->
    <script>
        document.getElementById("gambar").addEventListener("change", function(event) {
            let preview = document.getElementById("preview");
            let file = event.target.files[0];
            if(file){
                let reader = new FileReader();
                reader.onload = function(e){
                    preview.src = e.target.result;
                    preview.classList.remove("hidden");
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-layout>
