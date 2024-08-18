@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md text-sm shadow-sm border-gray-400 focus:border-green focus:ring focus:ring-green focus:ring-opacity-50']) !!}>
