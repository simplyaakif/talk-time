<div>
    <div class=" mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
        @foreach($packages as $k =>$package)
            <div wire:click="packageClick({{$package->id}})">
                <x-price-item>
                    <x-slot name="img">
                        <span class="font-bold text-5xl text-org-600">{{$package->price}}</span>
                        <div>Pkr</div>
                    </x-slot>
                    <x-slot name="title">{{$package->title}}</x-slot>
                    <x-slot name="info">{{$package->time}}</x-slot>
                    <x-slot name="short">30 Min Session</x-slot>
                </x-price-item>
            </div>
        @endforeach
        @if($modalOpen)
            <x-modal>
                <x-slot name="title">Generate invoice for the {{$currentPackage->title}}</x-slot>
                <x-slot name="info">By clicking continue you agree to generate invoice of amount
                    {{$currentPackage->price}} Rs
                </x-slot>
                <x-slot name="footer">
                    <x-button type="button" class="bg-gray-600 ml-2 hover:bg-gray-900"
                              wire:click="$set('modalOpen',false)">Cancel
                    </x-button>
                    <x-button type="button" class="bg-org-600 hover:bg-org-900" wire:click="generateInvoice()">Continue
                    </x-button>
                </x-slot>
            </x-modal>
        @endif

        @if($confirmModal)
        <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                 aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <!--
                      Background overlay, show/hide based on modal state.

                      Entering: "ease-out duration-300"
                        From: "opacity-0"
                        To: "opacity-100"
                      Leaving: "ease-in duration-200"
                        From: "opacity-100"
                        To: "opacity-0"
                    -->
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <!--
                      Modal panel, show/hide based on modal state.

                      Entering: "ease-out duration-300"
                        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        To: "opacity-100 translate-y-0 sm:scale-100"
                      Leaving: "ease-in duration-200"
                        From: "opacity-100 translate-y-0 sm:scale-100"
                        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    -->
                    <div
                        class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                        <div>
                            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                                <!-- Heroicon name: outline/check -->
                                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-5">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Invoice Generated
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Invoice for the selected package generated successfully. Kindly pay the dues
                                        at their earliest.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6">
                            <a href="{{route('frontend.home')}}" type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                Go back to dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif;

    </div>
</div>
