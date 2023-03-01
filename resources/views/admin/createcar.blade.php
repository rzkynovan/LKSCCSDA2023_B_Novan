<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-6xl font-bold text-center ">Create Car</h1>

                    <form action="{{ route('storecar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="number" name="id" id="id" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" name="brand" id="brand" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" name="type" id="type" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control" min="1">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" min="1">
                        </div>
                        <button type="submit" class="btn btn-success bg-success w-full" >Create!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
