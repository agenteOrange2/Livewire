<div>
    <form wire:submit.prevent="submit">
      <x-label>{{__('Extra')}}</x-label>   
      <x-input-error for="extra"/>
      <x-input type="text" wire:model="extra" />

      <x-button type="submit">{{__('Send')}}</x-button>
      
    </form>
</div>
