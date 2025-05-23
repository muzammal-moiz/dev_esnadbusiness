@props(['label' => null,  'model', 'type' => 'radio])

<div>

    {{-- Label --}}
    @if ($label)
        <label for="text-input-component-id-{{ $model }}" class="block text-sm font-medium tracking-wide {{ $errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-gray-600 dark:text-white' }}">{{ htmlspecialchars_decode($label) }}</label>
    @endif
    
    {{-- Form --}}
    <div class="{{ $label ? 'mt-2.5' : '' }} relative">

        {{-- Input --}}
        <input 
            wire:model.defer="{{ $model }}" 
            id="text-input-component-id-{{ $model }}" 
          
           
            class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent {{ $errors->first($model) ? 'focus:!ring-red-600 focus:!border-red-600 border-red-500' : 'focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500' }}" 
            {{ $attributes }} />

      

    </div>

 

    {{-- Error --}}
    @error($model)
        <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first($model) }}</p>
    @enderror

</div>