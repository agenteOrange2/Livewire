<div>
    <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">
      <x-label>{{__('Extra')}}</x-label>   
      <x-input-error for="extra"/>
      <x-input type="text" wire:model="extra" />


      <div class="flex mt-5 gap-3">
        <x-button type="submit">{{__('Send')}}</x-button>
      
        <x-secondary-button wire:click="back">Atras</x-secondary-button>
        </div>
    </form>
</div>
