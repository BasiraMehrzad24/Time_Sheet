@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-light text-sm text-green']) }}>
    {{ $value ?? $slot }}
</label>
