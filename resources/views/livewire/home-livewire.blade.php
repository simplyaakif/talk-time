<div class="bg-gray-50 pb-4">
    <div class="bg-gray-800 text-white mb-6">
        <div class="container  mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-10 ">
                <h4 class="text-center">Welcome Back</h4>
                <h2 class="text-center text-4xl ">
                    <span class="text-org-600 font-bold uppercase"> {{Auth::user()->name}}</span>
                </h2>

                @isset($packageStatus)
                    <p class="text-center">You may proceed now</p>
                @else
                    <p class="text-center">Seems like you have not selected any package as of yet. Kindly select one of
                        the packages from below.</p>
                @endisset
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        @isset($packageStatus)
            @if($packageStatus->paid_status == "UNPAID")
                <div class="pb-5 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Kindly clear your outstanding dues to go further for Talk time.
                    </h3>
                </div>
            <div class="max-w-3xl my-5 mx-auto">
                <x-pending-payment-action-panel :package="$packageStatus">
                </x-pending-payment-action-panel>
            </div>
            @else
                Order Paid
            @endif
        @else
            <div class="pb-5 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Available Packages
                </h3>
            </div>
            <livewire:talent-package></livewire:talent-package>
        @endisset

    </div>
</div>
