@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-white dark:text-gray-900 focus:border-bittersweet-500 dark:focus:border-bittersweet-600 focus:ring-bittersweet-500 dark:focus:ring-bittersweet-600 rounded-md shadow-sm']) !!}>
