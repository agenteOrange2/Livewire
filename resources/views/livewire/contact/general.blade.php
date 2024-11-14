<div>
    <form wire:submit.prevent="submit">
      <x-label>{{__('Subject')}}</x-label>   
      <x-input-error for="subject"/>
      <x-input type="text" wire:model="subject" />

      <x-label>{{__('Type')}}</x-label>   
      <x-input-error for="type"/>
      <select wire:model="type">
        <option value=""></option>
        <option value="person">{{__('Person')}}</option>
        <option value="company">{{__('Company')}}</option>
      </select>

      <x-label>{{__('Message')}}</x-label>   
      <x-input-error for="message"/>      
      <textarea wire:model="message"></textarea>

      <x-button type="submit">{{__('Send')}}</x-button>
      
    </form>
</div>
