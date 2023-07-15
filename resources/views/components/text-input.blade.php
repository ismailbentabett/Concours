@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-bittersweet-500 focus:ring-bittersweet-500 rounded-md shadow-sm']) !!}>
