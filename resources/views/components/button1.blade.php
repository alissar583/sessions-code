<div>
    <button
        {{ $attributes->merge([
            'class' => 'btn',
            'style' => 'color:blue;',
        ]) }}>{{ $slot }}</button>
</div>
