@props(['type' => 'text'])

<div class="{{ $styles }} mb-2 px-1">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 font-monserrat">
        {{ $label }} <span class="text-red-700">{{ $required ? '*' : '' }}</span>
    </label>
    <div class="flex">
        <span 
            class="inline-flex items-center px-3 text-sm text-gray-900 border rounded-e-0 border-e-0 rounded-s-md bg-gray-200 
            {{ $errors?->first($name) ? 'border-red-400' : 'border-gray-300' }}"
        >
            <i class="fa-solid {{ $icon }} {{ $errors?->first($name) ? 'text-red-600':'text-gray-500'}}"></i>
        </span>
        <input 
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            class="font-monserrat font-medium placeholder:font-monserrat placeholder:font-normal placeholder:text-gray-400 rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 {{ $errors?->first($name) ? 'border-red-400' : 'border-gray-300' }}"
            placeholder="{{ $placeholder }}"
            value="{{ old($name) ? old($name) : $value }}"
            onblur="{{ $onBlur ?? '' }}"
        >
    </div>
    @if ($errors?->has($name))
        <p class="mt-2 text-sm text-red-600">
            {{ $errors->first($name) }}
        </p>
    @endif
</div>
