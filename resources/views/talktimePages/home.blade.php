@extends('layouts.tailwind')

@section('content')
    <x-head-nav></x-head-nav>

{{--    Main Banner--}}
    <div class="bg-gray-900 text-center py-32 text-white px-4">
        <div>
            <h2 class="text-4xl md:text-6xl">We Make You <span class="text-org-600 font-bold">FLUENT</span> In </h2>
            <h2 class="text-4xl md:text-6xl">
                <span class="text-org-600 font-bold">
                    ENGLISH</span> Language</h2>
            <p class="my-4 md:text-lg">No matter the age, background or location. Talktime is for everyone</p>
        </div>
        <div class="flex text-center justify-center ">
            <x-button route="{{route('register')}}" class="bg-org-600 text-white hover:bg-org-900">Make me Fluent</x-button>
            <x-button class="bg-transparent border border-org-600 text-org-600 ml-4 hover:text-white hover:bg-org-600">
                Show me
                How?</x-button>
        </div>
    </div>

{{--    How it Works--}}

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h3 class="text-3xl ">How it Works</h3>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div class="bg-gray-100">
                <p>01. Register for Talktime</p>
            </div>
            <div class="bg-gray-100">
                <p>02. Choose your level & timings</p>
            </div>
            <div class="bg-gray-100">
                <p>03. Take Talktime Sessions</p>
            </div>
            <div class="bg-gray-100">
                <p>04. Follow Your Progress</p>
            </div>
        </div>
    </section>

{{--    Pricing--}}


{{--    About Us--}}

{{--    Guide Us--}}

{{--Testimonials--}}

@endsection



