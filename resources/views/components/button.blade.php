@props(['type'=>'link'])
@if($type =='button')
    <button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border
border-transparent
 text-md font-medium rounded-md shadow-sm text-white  focus:outline-none
 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) }} >
        {{$slot}}
    </button>
@else
    <a href="{{route('register')}}" {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border
border-transparent
 text-md font-medium rounded-md shadow-sm text-white  focus:outline-none
 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) }} >
        {{$slot}}
    </a>
@endif
