@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}></textarea>