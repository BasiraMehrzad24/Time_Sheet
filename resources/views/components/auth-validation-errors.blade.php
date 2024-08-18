@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        @foreach ($errors->all() as $error)
            <p class="mt-2 list-disc list-inside text-sm text-red">
                {{ $error }}
            </p>
        @endforeach
    </div>
@endif
