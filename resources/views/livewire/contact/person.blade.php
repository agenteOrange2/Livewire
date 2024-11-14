<div>
    <form wire:submit.prevent="submit">
      <x-label>{{__('name')}}</x-label>   
      <x-input-error for="name"/>
      <x-input type="text" wire:model="name" />

      <x-label>{{__('Surname')}}</x-label>   
      <x-input-error for="surname"/>
      <x-input type="text" wire:model="surname" />

      <x-label>{{__('Choices')}}</x-label>   
      <x-input-error for="choices"/>
      <select wire:model="choices">
        <option value=""></option>
        <option value="advert">{{__('Advert')}}</option>
        <option value="post">{{__('Post')}}</option>
        <option value="course">{{__('Course')}}</option>
        <option value="movie">{{__('Movie')}}</option>
        <option value="other">{{__('Other')}}</option>
      </select>

      <x-label>{{__('Message')}}</x-label>   
      <x-input-error for="message"/>      
      <textarea wire:model="message"></textarea>

      <x-button type="submit">{{__('Send')}}</x-button>
      
    </form>
</div>
