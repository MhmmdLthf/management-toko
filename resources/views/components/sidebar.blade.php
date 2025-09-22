<aside
  :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full lg:w-[290px]'"
  class="sidebar fixed left-0 top-0 z-9999 flex h-screen flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 duration-300 ease-linear lg:static lg:translate-x-0"
  @click.outside="sidebarToggle = false"
>
  <!-- SIDEBAR HEADER -->
  <div
    :class="sidebarToggle ? 'justify-center' : 'justify-between'"
    class="sidebar-header flex items-center gap-2 pb-7 pt-8"
  >
    <a href="/dashboard">
      <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
        <img src="{{ asset('images/logo/logo.svg') }}" alt="Logo" />
      </span>
      <img
        class="logo-icon"
        :class="sidebarToggle ? 'lg:block' : 'hidden'"
        src="{{ asset('images/logo/logo-icon.svg') }}" alt="Logo"
      />
    </a>
  </div>
  <!-- END HEADER -->

  <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
    <!-- Sidebar Menu -->
    <nav x-data="{ page: window.location.pathname, open: '' }">
      <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
        <span :class="sidebarToggle ? 'lg:hidden' : ''">MENU</span>
      </h3>

      <ul class="mb-6 flex flex-col gap-2">
        
        <!-- Dashboard -->
        <li>
          <a
            href="/dashboard"
            class="flex items-center gap-3 rounded-lg px-3 py-2 transition-colors"
            :class="page === '/dashboard' 
              ? 'bg-gray-100 text-blue-600' 
              : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600'">
            <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
            </svg>
            <span x-show="!sidebarToggle" class="whitespace-nowrap">Dashboard</span>
          </a>
        </li>

        <!-- Barang -->
        <li x-data="{ open: page.startsWith('/barang') }">
          <button @click="open = !open"
            class="flex items-center w-full gap-3 rounded-lg px-3 py-2 transition-colors"
            :class="page.startsWith('/product') 
              ? 'bg-gray-100 text-blue-600' 
              : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600'">
            <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path fill="currentColor" d="M9.98189 4.50602c1.24881-.67469 2.78741-.67469 4.03621 0l3.9638 2.14148c.3634.19632.6862.44109.9612.72273l-6.9288 3.60207L5.20654 7.225c.2403-.22108.51215-.41573.81157-.5775l3.96378-2.14148ZM4.16678 8.84364C4.05757 9.18783 4 9.5493 4 9.91844v4.28296c0 1.3494.7693 2.5963 2.01811 3.2709l3.96378 2.1415c.32051.1732.66011.3019 1.00901.3862v-7.4L4.16678 8.84364ZM13.009 20c.3489-.0843.6886-.213 1.0091-.3862l3.9638-2.1415C19.2307 16.7977 20 15.5508 20 14.2014V9.91844c0-.30001-.038-.59496-.1109-.87967L13.009 12.6155V20Z"/>
            </svg>
            <span x-show="!sidebarToggle" class="whitespace-nowrap">Products</span>
            <svg x-show="!sidebarToggle" :class="open ? 'rotate-90' : ''" class="ml-auto w-4 h-4 transition-transform"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
          <ul x-show="open && !sidebarToggle" class="ml-8 mt-1 flex flex-col gap-1 text-sm">
            <li>
              <a href="/product" 
                 class="block rounded px-3 py-1"
                 :class="page === '/product' 
                   ? 'bg-gray-100 text-blue-600' 
                   : 'hover:bg-gray-100 hover:text-blue-600'">
                 List Products
              </a>
            </li>
            <li>
              <a href="/stock-barang" 
                 class="block rounded px-3 py-1"
                 :class="page === '/stock-barang' 
                   ? 'bg-gray-100 text-blue-600' 
                   : 'hover:bg-gray-100 hover:text-blue-600'">
                 Stock Barang
              </a>
            </li>
          </ul>
        </li>

        <!-- Penjualan -->
        
        <li x-data="{ open: page.startsWith('/Penjualan') }">
          <button @click="open = !open"
            class="flex items-center w-full gap-3 rounded-lg px-3 py-2 transition-colors"
            :class="page.startsWith('/OrdersOverviews') 
              ? 'bg-gray-100 text-blue-600' 
              : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600'">
            <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
            </svg>
            <span x-show="!sidebarToggle" class="whitespace-nowrap">Sales</span>
            <svg x-show="!sidebarToggle" :class="open ? 'rotate-90' : ''" class="ml-auto w-4 h-4 transition-transform"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
          <ul x-show="open && !sidebarToggle" class="ml-8 mt-1 flex flex-col gap-1 text-sm">
            <li>
              <a href="/OrdersOverviews" 
                 class="block rounded px-3 py-1"
                 :class="page === '/OrdersOverviews' 
                   ? 'bg-gray-100 text-blue-600' 
                   : 'hover:bg-gray-100 hover:text-blue-600'">
                 Orders
              </a>
            </li>
            <li>
              <a href="/" 
                 class="block rounded px-3 py-1"
                 :class="page === '/' 
                   ? 'bg-gray-100 text-blue-600' 
                   : 'hover:bg-gray-100 hover:text-blue-600'">
                 Buat Pesanan
              </a>
            </li>
            <li>
              <a href="/" 
                 class="block rounded px-3 py-1"
                 :class="page === '/' 
                   ? 'bg-gray-100 text-blue-600' 
                   : 'hover:bg-gray-100 hover:text-blue-600'">
                 Pengembalian Barang
              </a>
            </li>
          </ul>
        </li>

        <!-- Pembelian -->
        <li x-data="{ open: page.startsWith('/pembelian') }">
          <button @click="open = !open"
            class="flex items-center w-full gap-3 rounded-lg px-3 py-2 transition-colors"
            :class="page.startsWith('/pembelian') 
              ? 'bg-gray-100 text-blue-600' 
              : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600'">
            <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M6 14h2m3 0h5M3 7v10a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1Z"/>
            </svg>
            <span x-show="!sidebarToggle" class="whitespace-nowrap">Pembelian</span>
            <svg x-show="!sidebarToggle" :class="open ? 'rotate-90' : ''" class="ml-auto w-4 h-4 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
          <ul x-show="open && !sidebarToggle" class="ml-8 mt-1 flex flex-col gap-1 text-sm">
            <li>
              <a href="/history-pembelian" 
                 class="block rounded px-3 py-1"
                 :class="page === '/history-pembelian' 
                   ? 'bg-gray-100 text-blue-600' 
                   : 'hover:bg-gray-100 hover:text-blue-600'">
                 History Pembelian
              </a>
            </li>
            <li>
              <a href="/buat-pembelian" 
                 class="block rounded px-3 py-1"
                 :class="page === '/buat-pembelian' 
                   ? 'bg-gray-100 text-blue-600' 
                   : 'hover:bg-gray-100 hover:text-blue-600'">
                 Buat Pembelian
              </a>
            </li>
            <li>
              <a href="/pengembalian-barang" 
                 class="block rounded px-3 py-1"
                 :class="page === '/pengembalian-barang' 
                   ? 'bg-gray-100 text-blue-600' 
                   : 'hover:bg-gray-100 hover:text-blue-600'">
                 Pengembalian Barang
              </a>
            </li>
            <li>
              <a href="/cicilan-pembelian" 
                 class="block rounded px-3 py-1"
                 :class="page === '/cicilan-pembelian' 
                   ? 'bg-gray-100 text-blue-600' 
                   : 'hover:bg-gray-100 hover:text-blue-600'">
                 Cicilan Pembelian
              </a>
            </li>
          </ul>
        </li>

        <!-- Laporan -->
        <li>
          <a
            href="/laporan"
            class="flex items-center gap-3 rounded-lg px-3 py-2 transition-colors"
            :class="page === '/laporan' 
              ? 'bg-gray-100 text-blue-600' 
              : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600'">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h12v12H6V6z" />
            </svg>
            <span x-show="!sidebarToggle" class="whitespace-nowrap">Laporan</span>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>
