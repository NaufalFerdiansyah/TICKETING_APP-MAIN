<x-layouts.admin title="Lokasi Terhapus">

    @if (session('success'))
    <div class="toast toast-bottom toast-center z-50">
        <div class="alert alert-success shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>

    <script>
    setTimeout(() => {
        document.querySelector('.toast')?.remove()
    }, 3000)
    </script>
    @endif

    <div class="container mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Icon Badge -->
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                    </div>

                    <!-- Title & Description -->
                    <div>
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Lokasi Terhapus
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">Kelola lokasi yang telah dihapus</p>
                    </div>
                </div>

                <!-- Back Button -->
                <a href="{{ route('admin.locations.index') }}"
                    class="btn bg-gradient-to-r from-orange-500 to-orange-600 text-white border-0 hover:from-orange-600 hover:to-orange-700 shadow-lg hover:shadow-xl transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali ke Lokasi Aktif
                </a>
            </div>

            <!-- Divider dengan gradient -->
            <div class="h-1 bg-gradient-to-r from-red-500 via-red-400 to-red-300 rounded-full mt-6 opacity-20">
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
            <!-- Table Header with gradient -->
            <div class="bg-gradient-to-r from-red-50 to-white px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800">Daftar Lokasi Terhapus</h2>
                <p class="text-sm text-gray-500 mt-1">Total: {{ count($locations) }} lokasi terhapus</p>
            </div>

            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-gray-600 font-semibold">No</th>
                            <th class="text-gray-600 font-semibold">Nama Lokasi</th>
                            <th class="text-gray-600 font-semibold">Kota</th>
                            <th class="text-gray-600 font-semibold">Kapasitas</th>
                            <th class="text-gray-600 font-semibold">Tanggal Diperbarui</th>
                            <th class="text-gray-600 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($locations as $index => $location)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <th class="text-gray-600">{{ $index + 1 }}</th>
                            <td class="font-medium text-gray-800">{{ $location->nama }}</td>
                            <td class="text-gray-600">{{ $location->kota }}</td>
                            <td class="text-gray-600">{{ number_format($location->kapasitas) }} orang</td>
                            <td class="text-gray-600">{{ $location->updated_at->format('d M Y H:i') }}</td>
                            <td>
                                <div class="flex justify-center space-x-2">
                                    <!-- Restore Button -->
                                    <form method="POST" action="{{ route('admin.locations.restore', $location) }}"
                                        style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="btn btn-sm bg-green-500 hover:bg-green-600 text-white border-0 shadow-sm hover:shadow-md transition-all duration-300">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                                </path>
                                            </svg>
                                            Pulihkan
                                        </button>
                                    </form>

                                    <!-- Force Delete Button -->
                                    <form method="POST"
                                        action="{{ route('admin.locations.forceDelete', $location) }}"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus permanen data ini? Data tidak dapat dipulihkan!')"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm bg-red-600 hover:bg-red-700 text-white border-0 shadow-sm hover:shadow-md transition-all duration-300">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Hapus Permanen
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-12">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <p class="text-lg font-medium">Tidak ada lokasi terhapus</p>
                                    <p class="text-sm mt-1">Semua lokasi Anda masih aktif</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
