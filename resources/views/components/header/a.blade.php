<a {{ $attributes->class([
    'text-sm font-semibold text-gray-400 hover:text-gray-800',
    $href == url()->current() ? 'text-gray-800' : 'text-gray-400'
    ]) }}>{{ $slot }}</a>
