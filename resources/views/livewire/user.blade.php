<div>
    <div class="w-full">
        <h1 class="text-2xl font-bold mb-4">Data User</h1>
        <div class="border-b border-gray-200 mb-4">
            @if ($status == 'create')
            <button wire:click="Status('index')" class="btn btn-square btn-secondary">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            @else
                <button wire:click="Status('create')" class="btn btn-secondary">Add User</button>
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
                        <th>Email</th>
                        <th>Role</th>
                    </tr>   
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="hover">
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->usertype }}</td>
                        <td>
                            <div class="flex items-center justify-end gap-4 px-4">
                                <button wire:click="status('edit')" class="btn btn-secondary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @elseif ($status == 'create')
            <div>
                <label class="input input-bordered flex items-center gap-2">
                    Nama
                    <input type="text" class="grow" placeholder="Masukkan Nama" wire:model='user.name' />
                    @error('user.name') <span class="text-red-500">isi dulu kocak</span> @enderror
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    Email
                    <input type="text" class="grow" placeholder="daisy@site.com" />
                </label>
                <select class="select select-bordered w-full max-w-xs">
                    <option disabled selected>Role</option>
                    <option>Admin</option>
                    <option>Kasir</option>
                  </select>
                {{-- <label class="input input-bordered flex items-center gap-2">
                    <input type="text" class="grow" placeholder="Search" />
                    <kbd class="kbd kbd-sm">⌘</kbd>
                    <kbd class="kbd kbd-sm">K</kbd>
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    <input type="text" class="grow" placeholder="Search" />
                    <span class="badge badge-info">Optional</span>
                </label> --}}
            </div>
            @endif
        </div>
    </div>
</div>