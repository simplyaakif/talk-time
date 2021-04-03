@props(['package'])
<div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Last Unpaid Invoice
        </h3>
        <div class="mt-5">
            <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between md:items-center">
                <h4 class="sr-only">
                </h4>
                <div class="sm:flex sm:items-center ">
                    <div>
                    <span class="text-4xl font-bold
                    text-org-600">{{$package->due_date_price}}</span>
                        <div>
                            Pkr
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            Invoice Number ( {{$package->connect_pay_id}} )
                        </div>
                        <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                            <div class="text-red-600 font-bold">
                                Due Date ( {{Carbon\Carbon::createFromFormat('Y-m-d', $package->due_date)->format
                                ('D d-m-Y')}} )
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
                    <a href="{{$package->click_to_pay}}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm font-medium
                            rounded-md text-white bg-org-600  hover:bg-org-900 focus:outline-none focus:ring-2
                            focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                        Click to Pay
                    </a>
                </div>
            </div>
        </div>
        <p class="text-gray-600 text-sm mt-4">Incase you would like to apply for another package, Kindly cancel this
            invoice by
            <a href="" class="underline">clicking here</a>.</p>
    </div>
</div>
