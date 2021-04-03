<div
    class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
    <div class="flex-shrink-0">
        {{$img}}
    </div>
    <div class="flex-1 min-w-0">
        <div class="focus:outline-none">
            <span class="absolute inset-0" aria-hidden="true"></span>
            <p class="text-2xl font-bold text-gray-900">
                {{$title}}
            </p>
            <p class="  truncate">
                {{$info}}
            </p>
            <p class="text-sm text-gray-500 truncate">
                {{$short}}
            </p>
        </div>
    </div>
</div>
