@props(['route'])
@php
    $classes = Request::routeIs($route)?' border-org-600 text-gray-900':' border-transparent text-gray-500
    hover:border-gray-300 hover:text-gray-700';
@endphp
<a href="{{$route}}" {{$attributes->merge(['class'=>"inline-flex items-center text-base px-1 pt-1 border-b-2  font-medium"
.$classes])}}>
    {{$slot}}
</a>
