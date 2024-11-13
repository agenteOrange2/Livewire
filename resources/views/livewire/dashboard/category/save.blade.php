<div class="p-5">


    <x-action-message on="created">
        {{ __('Created Category Success') }}
    </x-action-message>

    <x-action-message on="updated">
        {{ __('Updated Category Success') }}
    </x-action-message>



    <x-form-section submit='submit' wire:submit.prevent="submit">

        <x-slot name="title">
            {{ __('Category') }}
        </x-slot>

        <x-slot name="description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi aliquid tenetur dolor cupiditate temporibus?
            Ut tempore accusantium doloribus ipsa saepe repellat ex mollitia harum. Repudiandae, non deleniti. Sed,
            nesciunt laboriosam.
        </x-slot>


        @slot('form')
            <div class="col-span-6 sm:col-span-6">
                @error('title')
                    {{ $message }}
                @enderror
                <x-label for="">Title</x-label>
                <x-input class="mt-1 block w-full" type="text" wire:model.live="title" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                @error('text')
                    {{ $message }}
                @enderror
                <x-label for="">Text</x-label>
                <x-input class="mt-1 block w-full" type="text" wire:model="text" />
            </div>


            <div class="col-span-6 sm:col-span-6">
                @error('image')
                    {{ $message }}
                @enderror

                @if ($category && $category->image)
                    <img class="w-40 my-3" src="{{ $category->getImageURL() }}" alt="{{ $category->title }}">
                @endif
                <x-label for="">Image</x-label>
                <x-input class="mt-1 block w-full" type="file" wire:model="image" />
            </div>


        @endslot

        @slot('actions')
            <x-button type="submit">Enviar</x-button>
        @endslot
    </x-form-section>
</div>
