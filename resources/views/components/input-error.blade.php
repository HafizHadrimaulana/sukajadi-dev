@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'fs-sm list-unstyled mb-0 mt-2 text-danger']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
