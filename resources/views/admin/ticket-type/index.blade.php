<x-layouts.admin title="Manajemen Tipe Tiket">

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
                        class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                            </path>
                        </svg>
                    </div>

                    <!-- Title & Description -->
                    <div>
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Manajemen Tipe Tiket
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">Kelola tipe tiket untuk event Anda</p>
                    </div>
                </div>

                <!-- Add Button -->
                <button
                    class="btn bg-gradient-to-r from-indigo-500 to-indigo-600 text-white border-0 hover:from-indigo-600 hover:to-indigo-700 shadow-lg hover:shadow-xl transition-all duration-300"
                    onclick="add_modal.showModal()">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Tipe Tiket
                </button>
            </div>

            <!-- Divider dengan gradient -->
            <div class="h-1 bg-gradient-to-r from-indigo-500 via-indigo-400 to-indigo-300 rounded-full mt-6 opacity-20">
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
            <!-- Table Header with gradient -->
            <div class="bg-gradient-to-r from-indigo-50 to-white px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800">Daftar Tipe Tiket</h2>
                <p class="text-sm text-gray-500 mt-1">Total: {{ count($ticketTypes) }} tipe tiket</p>
            </div>

            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-gray-600 font-semibold">No</th>
                            <th class="text-gray-600 font-semibold">Nama Tipe</th>
                            <th class="text-gray-600 font-semibold w-1/2">Deskripsi</th>
                            <th class="text-gray-600 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ticketTypes as $index => $ticketType)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <th class="text-gray-600">{{ $index + 1 }}</th>
                            <td class="font-medium text-gray-800">{{ $ticketType->nama }}</td>
                            <td class="text-gray-600">{{ $ticketType->deskripsi ?? '-' }}</td>
                            <td>
                                <div class="flex justify-center space-x-2">
                                    <button
                                        class="btn btn-sm bg-blue-500 hover:bg-blue-600 text-white border-0 shadow-sm hover:shadow-md transition-all duration-300"
                                        onclick="openEditModal(this)" data-id="{{ $ticketType->id }}"
                                        data-nama="{{ $ticketType->nama }}"
                                        data-deskripsi="{{ $ticketType->deskripsi }}">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        Edit
                                    </button>
                                    <button
                                        class="btn btn-sm bg-red-500 hover:bg-red-600 text-white border-0 shadow-sm hover:shadow-md transition-all duration-300"
                                        onclick="openDeleteModal(this)" data-id="{{ $ticketType->id }}">
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
                            <td colspan="4" class="text-center py-12">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                                        </path>
                                    </svg>
                                    <p class="text-lg font-medium">Tidak ada tipe tiket tersedia</p>
                                    <p class="text-sm mt-1">Klik tombol "Tambah Tipe Tiket" untuk membuat tipe tiket baru
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

    <!-- Add Ticket Type Modal -->
    <dialog id="add_modal" class="modal">
        <div class="modal-box max-w-md rounded-2xl">
            <form method="POST" action="{{ route('admin.ticket-types.store') }}">
                @csrf
                <!-- Modal Header -->
                <div class="flex items-center space-x-3 mb-6">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Tambah Tipe Tiket</h3>
                </div>

                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text font-medium text-gray-700">Nama Tipe Tiket</span>
                    </label>
                    <input type="text" placeholder="Contoh: VIP, VVIP, Reguler"
                        class="input input-bordered w-full focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all"
                        name="nama" required />
                </div>

                <div class="form-control w-full mb-6">
                    <label class="label">
                        <span class="label-text font-medium text-gray-700">Deskripsi</span>
                    </label>
                    <textarea placeholder="Masukkan deskripsi tipe tiket"
                        class="textarea textarea-bordered w-full focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all"
                        name="deskripsi" rows="3"></textarea>
                </div>

                <div class="modal-action">
                    <button
                        class="btn bg-gradient-to-r from-indigo-500 to-indigo-600 text-white border-0 hover:from-indigo-600 hover:to-indigo-700"
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

    <!-- Edit Ticket Type Modal -->
    <dialog id="edit_modal" class="modal">
        <div class="modal-box max-w-md rounded-2xl">
            <form method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="ticket_type_id" id="edit_ticket_type_id">

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
                    <h3 class="text-xl font-bold text-gray-800">Edit Tipe Tiket</h3>
                </div>

                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text font-medium text-gray-700">Nama Tipe Tiket</span>
                    </label>
                    <input type="text" placeholder="Masukkan nama tipe tiket"
                        class="input input-bordered w-full focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                        id="edit_ticket_type_name" name="nama" />
                </div>

                <div class="form-control w-full mb-6">
                    <label class="label">
                        <span class="label-text font-medium text-gray-700">Deskripsi</span>
                    </label>
                    <textarea placeholder="Masukkan deskripsi tipe tiket"
                        class="textarea textarea-bordered w-full focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                        id="edit_ticket_type_description" name="deskripsi" rows="3"></textarea>
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

                <input type="hidden" name="ticket_type_id" id="delete_ticket_type_id">

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
                    <h3 class="text-xl font-bold text-gray-800">Hapus Tipe Tiket</h3>
                </div>

                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus tipe tiket ini? Tindakan ini tidak dapat
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
        const form = document.querySelector('#edit_modal form');

        document.getElementById("edit_ticket_type_name").value = name;
        document.getElementById("edit_ticket_type_description").value = description !== 'null' ? description : '';
        document.getElementById("edit_ticket_type_id").value = id;

        // Set action dengan parameter ID
        form.action = `/admin/ticket-types/${id}`

        edit_modal.showModal();
    }

    function openDeleteModal(button) {
        const id = button.dataset.id;
        const form = document.querySelector('#delete_modal form');
        document.getElementById("delete_ticket_type_id").value = id;

        // Set action dengan parameter ID
        form.action = `/admin/ticket-types/${id}`

        delete_modal.showModal();
    }
    </script>

</x-layouts.admin>
