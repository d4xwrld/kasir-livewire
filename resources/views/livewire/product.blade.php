<div>
    <div class="w-full py-4">
        <div class="border-b border-gray-200 mb-4">
            @if ($status == 'create' || $status == 'edit')
                <button wire:click="Status('index')" class="btn btn-square btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            @else
                <h1 class="text-2xl font-bold mb-4">Data Product</h1>
                <button wire:click="Status('create')" class="btn btn-secondary">Add Product</button>
            @endif
            <button wire:loading class="btn btn-square">
                <span class="loading loading-spinner"></span>
                loading
            </button>
            <div class="overflow-x-auto">
                @if ($status == 'index')
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="hover">
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <div class="flex items-center justify-end gap-4 px-4">
                                            <button wire:click="preEdit({{ $product->id }})"
                                                class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg></button>
                                            <button wire:click="preDelete({{ $product->id }})" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Confirmation Modal -->
                    <dialog id="my_modal_2" class="modal shadow-lg rounded-md p-4" {{ $showModal ? 'open' : '' }}>
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Beneran Hapus nih?</h3>
                            <p class="py-4">Data bakal ilang permanen, gabisa dibalikin
                                lagi
                            </p>
                        </div>
                        <form method="dialog" class="modal-backdrop flex justify-end gap-2">
                            <button class="btn btn-secondary" wire:click="delete">Iya</button>
                            <button class="btn btn-danger" wire:click="$set('showModal', false)">Ntar dulu</button>
                        </form>
                    </dialog>
                @elseif ($status == 'create')
                    <div>
                        <h1 class="text-2xl font-bold mb-4">Form Data Produk</h1>
                        <form wire:submit.prevent="store">
                            <label class="font-semibold input input-bordered flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                                <input type="text" class="grow" placeholder="Masukkan Nama" wire:model='name' />
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </label>
                            <div class="mt-4">
                                <label class="input input-bordered flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                    <input type="number" min="1" class="grow" placeholder="Harga"
                                        wire:model='price' />
                                    @error('stock')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="mt-4">
                                <label class="input input-bordered flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                                    </svg>

                                    <input type="number" min="0" class="grow" placeholder="Masukkan Stock"
                                        wire:model='stock' />
                                    @error('stock')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <button type="submit" class="mt-4 btn btn-secondary">Buat</button>
                        </form>
                    </div>
                @elseif ($status == 'edit')
                    <div>
                        <h1 class="text-2xl font-bold mb-4">Edit Data Akun</h1>
                        <form wire:submit.prevent="storeEdit">
                            <label class="font-semibold input input-bordered flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                                <input type="text" class="grow" placeholder="Masukkan Nama"
                                    wire:model='name' />
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </label>
                            <div class="mt-4">
                                <label class="input input-bordered flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                    <input type="number" min="1" class="grow" placeholder="Harga"
                                        wire:model='price' />
                                    @error('stock')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="mt-4">
                                <label class="input input-bordered flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                                    </svg>

                                    <input type="number" min="0" class="grow" placeholder="Masukkan Stock"
                                        wire:model='stock' />
                                    @error('stock')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <button type="submit" class="mt-4 btn btn-secondary">Buat</button>
                        </form>
                    </div>
                    <!-- Confirmation Modal -->
                    <dialog id="my_modal_2" class="modal shadow-lg rounded-md p-4" {{ $showModal ? 'open' : '' }}>
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Beneran Hapus nih?</h3>
                            <p class="py-4">Data bakal ilang permanen, gabisa dibalikin
                                lagi
                            </p>
                        </div>
                        <form method="dialog" class="modal-backdrop flex justify-end gap-2">
                            <button class="btn btn-secondary" wire:click="delete">Iya</button>
                            <button class="btn btn-danger" wire:click="$set('showModal', false)">Ntar dulu</button>
                        </form>
                    </dialog>
                @endif
            </div>
        </div>
    </div>
</div>
