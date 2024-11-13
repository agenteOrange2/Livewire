<div>
    
    <x-action-message on="deleted">
        {{__('Deleted Category Success')}}
    </x-action-message>
    
    <x-card>
        @slot('title')
        List            
        @endslot
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>    
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->title}} </td>
                        <td>
                            <a href="{{route('d-category-edit', $category)}}">Edit</a>
    
                            <x-danger-button onclick="confirm('Are you sure you want to delete the selected record?') || event.stopImmediatePropagation()" wire:click='delete({{ $category }})'>Delete</x-danger-button>                        
                        </td>
                    </tr>
                @endforeach 
                
                <br>
                {{$categories->links()}}                
            </tbody>                    
        </table>
    </x-card>

</div>
