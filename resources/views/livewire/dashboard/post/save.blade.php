<div>
    <div class="container">
        <x-action-message on="created">
            <div class="box-action-message">
                {{__('Created post success')}}
            </div>
        </x-action-message>

        <x-action-message on="updated">
            <div class="box-action-message">
                {{__('Updated post success')}}
            </div>
        </x-action-message>

        <x-form-section submit="submit">
            <x-slot name="title">
                {{__('Post')}}
            </x-slot>
        </x-form-section>
    </div>
</div>
