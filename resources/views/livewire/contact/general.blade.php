<div>

    <div class="flex flex-col max-w-sm mx-auto" x-data="{ active: $wire.entangle('step') }">
        <div class="flex mx-auto flex-col sm:flex-row ">
            <div class="step" :class="{ 'active': parseInt(active) == 1 }">
                {{ __('STEP 1') }}
            </div>
            <div class="step" :class="{ 'active': parseInt(active) == 2 }">
                {{ __('STEP 2') }}
            </div>
            <div class="step" :class="{ 'active': parseInt(active) == 3 }">
                {{ __('STEP 3') }}
            </div>

            {{-- 
            Diferentes formas de entrar
            <div x-text="active"></div>
            <div x-text="$wire.step"></div>
            <div x-text="$wire.get('step')"></div>
            {{$step}}
             --}}

        </div>
    </div>

    @if ($step == 1)
        <form wire:submit.prevent="submit">
            <x-label>{{ __('Subject') }}</x-label>
            <x-input-error for="subject" />
            <x-input type="text" wire:model="subject" />

            <x-label>{{ __('Type') }}</x-label>
            <x-input-error for="type" />
            <select wire:model="type">
                <option value=""></option>
                <option value="person">{{ __('Person') }}</option>
                <option value="company">{{ __('Company') }}</option>
            </select>

            <x-label>{{ __('Message') }}</x-label>
            <x-input-error for="message" />
            <textarea wire:model="message"></textarea>

            <x-button type="submit">{{ __('Send') }}</x-button>

        </form>
    @elseif ($step == 2)
        @livewire('contact.company')
    @elseif ($step == 2.5)
        @livewire('contact.person')
    @elseif ($step == 3)
        @livewire('contact.detail')
    @else
        END
    @endif


</div>
