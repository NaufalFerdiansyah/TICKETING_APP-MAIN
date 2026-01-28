<x-layouts.admin title="Manajemen Tipe Pembayaran">

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
                        class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>

                    <!-- Title & Description -->
                    <div>
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Manajemen Tipe Pembayaran
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">Kelola metode pembayaran yang tersedia</p>
                    </div>
                </div>

                <!-- Add Button -->
                <button
                    class="btn bg-gradient-to-r from-purple-500 to-purple-600 text-white border-0 hover:from-purple-600 hover:to-purple-700 shadow-lg hover:shadow-xl transition-all duration-300"
                    onclick="add_modal.showModal()">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Tipe Pembayaran
                </button>
            </div>

            <!-- Divider dengan gradient -->
            <div class="h-1 bg-gradient-to-r from-purple-500 via-purple-400 to-purple-300 rounded-full mt-6 opacity-20">
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
            <!-- Table Header with gradient -->
            <div class="bg-gradient-to-r from-purple-50 to-white px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800">Daftar Tipe Pembayaran</h2>
                <p class="text-sm text-gray-500 mt-1">Total: {{ count($paymentTypes) }} tipe pembayaran</p>
            </div>

            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-gray-600 font-semibold">No</th>
                            <th class="text-gray-600 font-semibold">Nama Tipe</th>
                            <th class="text-gray-600 font-semibold">Deskripsi</th>
                            <th class="text-gray-600 font-semibold">Status</th>
                            <th class="text-gray-600 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($paymentTypes as $index => $paymentType)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <th class="text-gray-600">{{ $index + 1 }}</th>
                            <td class="font-medium text-gray-800">{{ $paymentType->nama }}</td>
                            <td class="text-gray-600">{{ $paymentType->deskripsi ?? '-' }}</td>
                            <td>
                                @if($paymentType->is_active)
                                <span class="badge badge-success text-white">Aktif</span>
                                @else
                                <span class="badge badge-error text-white">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-center space-x-2">
                                    <button
                                        class="btn btn-sm bg-blue-500 hover:bg-blue-600 text-white border-0 shadow-sm hover:shadow-md transition-all duration-300"
                                        onclick="openEditModal(this)" data-id="{{ $paymentType->id }}"
                                        data-nama="{{ $paymentType->nama }}"
                                        data-deskripsi="{{ $paymentType->deskripsi }}"
                                        data-is_active="{{ $paymentType->is_active }}">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        Edit
                                    </button>
                                    <button
                                        class="btn btn-sm bg-red-500 hover:bg-red-600 text-white border-0 shadow-sm hover:shadow-md transition-all duration-300"
                                        onclick="openDeleteModal(this)" data-id="{{ $paymentType->id }}">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-12">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                        </path>
                                    </svg>
                                    <p class="text-lg font-medium">Tidak ada tipe pembayaran tersedia</p>
                                    <p class="text-sm mt-1">Klik tombol "Tambah Tipe Pembayaran" untuk membuat tipe pembayaran baru
                                    </p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Payment Type Modal -->
    <dialog id="add_modal" class="modal">
        <div class="modal-box max-w-md rounded-2xl">
            <form method="POST" action="{{ route('admin.payment-types.store') }}">
                @csrf
                <!-- Modal Header -->
                <div class="flex items-center space-x-3 mb-6">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Tambah Tipe Pembayaran</h3>
                </div>

                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text font-medium text-gray-700">Nama Tipe Pembayaran</span>
                    </label>
                    <input type="text" placeholder="Contoh: Transfer Bank, Cash"
                        class="input input-bordered w-full focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                        name="nama" required />
                </div>

                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text font-medium text-gray-700">Deskripsi</span>
                    </label>
                    <textarea placeholder="Masukkan deskripsi tipe pembayaran"
                        class="textarea textarea-bordered w-full focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                        name="deskripsi" rows="3"></textarea>
                </div>

                <div class="form-control w-full mb-6">
                    <label class="label cursor-pointer justify-start space-x-3">
                        <input type="checkbox" name="is_active" value="1" checked class="checkbox checkbox-purple" />
                        <span class="label-text font-medium text-gray-700">Aktif</span>
                    </label>
                </div>

                <div class="modal-action">
                    <button
                        class="btn bg-gradient-to-r from-purple-500 to-purple-600 text-white border-0 hover:from-purple-600 hover:to-purple-700"
                        type="submit">
                        Simpan
                    </button>
                    <button class="btn btn-ghost" onclick="add_modal.close()" type="button">Batal</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <!-- Edit Payment Type Modal -->
    <dialog id="edit_modal" class="modal">
        <div class="modal-box max-w-md rounded-2xl">
            <form method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="payment_type_id" id="edit_payment_type_id">

                <!-- Modal Header -->
                <div class="flex items-center space-x-3 mb-6">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Edit Tipe Pembayaran</h3>
                </div>

                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text font-medium text-gray-700">Nama Tipe Pembayaran</span>
                    </label>
                    <input type="text" placeholder="Masukkan nama tipe pembayaran"
                        class="input input-bordered w-full focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                        id="edit_payment_type_name" name="nama" />
                </div>

                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text font-medium text-gray-700">Deskripsi</span>
                    </label>
                    <textarea placeholder="Masukkan deskripsi tipe pembayaran"
                        class="textarea textarea-bordered w-full focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                        id="edit_payment_type_description" name="deskripsi" rows="3"></textarea>
                </div>

                <div class="form-control w-full mb-6">
                    <label class="label cursor-pointer justify-start space-x-3">
                        <input type="checkbox" name="is_active" value="1" id="edit_payment_type_active" class="checkbox checkbox-blue" />
                        <span class="label-text font-medium text-gray-700">Aktif</span>
                    </label>
                </div>

                <div class="modal-action">
                    <button
                        class="btn bg-gradient-to-r from-blue-500 to-blue-600 text-white border-0 hover:from-blue-600 hover:to-blue-700"
                        type="submit">
                        Simpan Perubahan
                    </button>
                    <button class="btn btn-ghost" onclick="edit_modal.close()" type="button">Batal</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <!-- Delete Modal -->
    <dialog id="delete_modal" class="modal">
        <div class="modal-box max-w-md rounded-2xl">
            <form method="POST">
                @csrf
                @method('DELETE')

                <input type="hidden" name="payment_type_id" id="delete_payment_type_id">

                <!-- Modal Header -->
                <div class="flex items-center space-x-3 mb-6">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Hapus Tipe Pembayaran</h3>
                </div>

                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus tipe pembayaran ini? Tindakan ini tidak dapat
                    dibatalkan.</p>

                <div class="modal-action">
                    <button
                        class="btn bg-gradient-to-r from-red-500 to-red-600 text-white border-0 hover:from-red-600 hover:to-red-700"
                        type="submit">
                        Ya, Hapus
                    </button>
                    <button class="btn btn-ghost" onclick="delete_modal.close()" type="button">Batal</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <script>
    function openEditModal(button) {
        const name = button.dataset.nama;
        const id = button.dataset.id;
        const description = button.dataset.deskripsi;
        const isActive = button.dataset.is_active;
        const form = document.querySelector('#edit_modal form');

        document.getElementById("edit_payment_type_name").value = name;
        document.getElementById("edit_payment_type_description").value = description !== 'null' ? description : '';
        document.getElementById("edit_payment_type_active").checked = isActive == 1;
        document.getElementById("edit_payment_type_id").value = id;

        // Set action dengan parameter ID
        form.action = `/admin/payment-types/${id}`

        edit_modal.showModal();
    }

    function openDeleteModal(button) {
        const id = button.dataset.id;
        const form = document.querySelector('#delete_modal form');
        document.getElementById("delete_payment_type_id").value = id;

        // Set action dengan parameter ID
        form.action = `/admin/payment-types/${id}`

        delete_modal.showModal();
    }
    </script>

</x-layouts.admin>
