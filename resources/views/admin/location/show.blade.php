<x-layouts.admin title="Detail Lokasi">
    <div class="container mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Icon Badge -->
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>

                    <!-- Title & Description -->
                    <div>
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Detail Lokasi
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">Informasi lengkap lokasi event</p>
                    </div>
                </div>

                <!-- Back Button -->
                <a href="{{ route('admin.locations.index') }}"
                    class="btn bg-gradient-to-r from-gray-500 to-gray-600 text-white border-0 hover:from-gray-600 hover:to-gray-700 shadow-lg hover:shadow-xl transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali
                </a>
            </div>

            <!-- Divider dengan gradient -->
            <div class="h-1 bg-gradient-to-r from-orange-500 via-orange-400 to-orange-300 rounded-full mt-6 opacity-20">
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Location Card -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-orange-50 to-white px-8 py-6 border-b border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $location->nama }}</h2>
                        <p class="text-sm text-gray-500 mt-2">ID: #{{ $location->id }}</p>
                    </div>

                    <!-- Card Body -->
                    <div class="p-8">
                        <!-- Alamat -->
                        <div class="mb-8">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Alamat</h3>
                                    <p class="text-lg text-gray-800 mt-2 leading-relaxed">{{ $location->alamat }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Kota -->
                        <div class="mb-8">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Kota</h3>
                                    <p class="text-lg text-gray-800 mt-2">{{ $location->kota }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Kapasitas -->
                        <div class="mb-8">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 12H9m6 0H9m6 0a7 7 0 11-14 0 7 7 0 0114 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Kapasitas
                                    </h3>
                                    <p class="text-lg text-gray-800 mt-2"><span
                                            class="text-2xl font-bold text-orange-600">{{ number_format($location->kapasitas) }}</span>
                                        orang</p>
                                </div>
                            </div>
                        </div>

                        <!-- Timestamps -->
                        <div class="border-t border-gray-200 pt-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Dibuat Pada
                                    </p>
                                    <p class="text-sm text-gray-800 mt-1">
                                        {{ $location->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Diperbarui
                                    </p>
                                    <p class="text-sm text-gray-800 mt-1">
                                        {{ $location->updated_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar - Action Card -->
            <div>
                <!-- Actions Card -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-orange-50 to-white px-6 py-4 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800">Aksi</h3>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 space-y-3">
                        <!-- Edit Button -->
                        <a href="{{ route('admin.locations.edit', $location) }}"
                            class="btn btn-block bg-gradient-to-r from-blue-500 to-blue-600 text-white border-0 hover:from-blue-600 hover:to-blue-700 shadow-md hover:shadow-lg transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit
                        </a>

                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('admin.locations.destroy', $location) }}"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-block bg-gradient-to-r from-red-500 to-red-600 text-white border-0 hover:from-red-600 hover:to-red-700 shadow-md hover:shadow-lg transition-all duration-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Status Card -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden mt-6">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-orange-50 to-white px-6 py-4 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800">Status</h3>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <div class="flex items-center justify-center">
                            <div class="text-center">
                                <div
                                    class="inline-block px-4 py-2 bg-gradient-to-r from-green-100 to-emerald-100 rounded-full">
                                    <span
                                        class="text-sm font-semibold text-green-700">✓ Aktif</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-3">Lokasi dapat digunakan untuk event</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
