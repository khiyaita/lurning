@props(['type'])
<div id="{{ $type }}Alert" class="alert alert-{{ $type }}" role="alert">
    {{ $slot }}
</div>
