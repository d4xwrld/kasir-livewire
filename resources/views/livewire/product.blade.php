<div class="w-full">
    <h1 class="text-2xl font-bold mb-4">Data Product</h1>
    <div class="border-b border-gray-200 mb-4"><div>
    <div class="overflow-x-auto">
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
            @foreach ( $products as $product )
            <tr class="hover">
              <th>{{ $loop->iteration }}</th>
              <td>{{ $product->name }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->stock }}</td>
              <td>
                <div class="flex items-center justify-end gap-4 px-4">
                    <button wire:click="Status('edit')"
                    class="btn btn-outline btn-secondary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</div>
