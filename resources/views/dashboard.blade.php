<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('createcar') }}" class="btn btn-primary m-4">AddNew</a>
                <div class="p-6 text-gray-900">
                    <h1 class="font-bold text-center "><b>Data Dealership</b></h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Brand</th>
                                <th>Type</th>
                                <th>Price</th>
                                <td>Image</td>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                
                            <tr>
                                <th scope="row">{{ $item->id }} </th>
                                <td>{{ $item->brand }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->price }} USD</td>
                                <td>
                                  <img src="{{asset($item->image)}}" alt="">
                                </td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('editcar', $item->id) }}" class="btn btn-link">Edit</a>
                                        <a href="{{ route('deletecar', $item->id) }}" class="btn btn-link" onclick="return confirm('Are you sure to delete {{ $item->type }}')" >Delete</a>
                                    </div>

                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
