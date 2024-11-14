<div>
    <div class="container mx-auto p-6 bg-gray-100 min-h-screen">
        <!-- Mensaje de Acción: Eliminación Exitosa -->
        <x-action-message on="deleted" class="mb-4">
            <div class="bg-green-100 text-green-700 p-3 rounded-lg shadow-md">
                {{ __('Category deleted successfully!') }}
            </div>
        </x-action-message>

        <!-- Título de la Página -->
        <x-slot name="header">
            {{ __('CRUD Category') }}
        </x-slot>

        <!-- Componente Card para Listado -->
        <x-card class="shadow-lg bg-white rounded-lg overflow-hidden">
            @slot('title')
                {{ __('List') }}
            @endslot

            <!-- Botón para Crear Nueva Categoría -->
            <div class="mb-5">
                <a href="{{ route('d-category-create') }}" class="text-white bg-gray-800 hover:bg-gray-900 font-medium rounded-lg px-5 py-2.5">
                    {{ __('Create Category') }}
                </a>
            </div>

            <!-- Tabla de Categorías -->
            <table class="table w-full">
                <thead class="text-left bg-gray-100">
                    <tr>
                        <th class="p-2">Title</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="border-b">
                            <td class="p-2">{{ $category->title }}</td>
                            <td class="p-2">
                                <a href="{{ route('d-category-edit', $category) }}" class="text-blue-500 hover:underline">Edit</a>
                                <x-danger-button wire:click="selectCategoryToDelete({{ $category }})">Delete</x-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </x-card>

        <!-- Modal de Confirmación para Eliminación -->
        <x-confirmation-modal wire:model="confirmingDeleteCategory">
            @slot('title')
                {{ __('Delete Category') }}
            @endslot
            @slot('content')
                {{ __('Are you sure you want to delete this category?') }}
            @endslot
            @slot('footer')
                <x-secondary-button wire:click="$toggle('confirmingDeleteCategory')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button wire:click="delete">
                    {{ __('Delete Category') }}
                </x-danger-button>
            @endslot
        </x-confirmation-modal>
    </div>
</div>
