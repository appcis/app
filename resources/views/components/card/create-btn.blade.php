@props(['href'])

<a href="{{ $href }}" class="border border-primary-600 bg-primary-600 shadow px-6 py-2 block rounded hover:bg-indigo-700 text-gray-100">{{ $slot }}</a>
