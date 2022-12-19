<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <x-alert />
                    <form id="payment-form" class="container mx-auto" action="{{ route('invoice.post') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-row my-5 w-1/2 ">

                            <div class="my-2">
                                <span>10$ Price</span>
                            </div>

                            <div id="card-element" class="my-5">
                                <!-- a Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors -->
                            <div id="card-errors"></div>
                        </div>

                        <x-jet-button class="mt-4 submit" id="button-submit" data-secret="{{ $intent->client_secret }}">
                            {{ __('PAY with INVOICE') }}
                        </x-jet-button>
                    </form>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
            <div class="bgpy-6 ">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Data
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Price
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($invoices as $invoice)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $invoice->date()->toFormattedDateString() }}
                                                </td>

                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $invoice->total() }}
                                                </td>

                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    <form
                                                        action="{{ route('invoice.download', ['invoice' => $invoice->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit">
                                                            {{ __('Download') }}
                                                        </button>
                                                    </form>

                                                    {{-- <form
                                                        action="{{ route('invoice.refund', ['invoice' => $invoice->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit">
                                                            {{ __('Refunds') }}
                                                        </button>
                                                    </form> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Here is e script -->
    @push('scripts')
        <script src="https://js.stripe.com/v3/"></script>

        <script>
            const cardButton = document.getElementById('button-submit');
            const stripe = Stripe(
                "{{ env('STRIPE_KEY') }}"
            );
            const clientSecret = "{{ env('STRIPE_SECRET') }}";
            const client_secret = cardButton.dataset.secret;
            const elements = stripe.elements();
            const cardElement = elements.create('card');
            // Add an instance of the card UI component into the `card-element` <div>
            cardElement.mount('#card-element');
            cardElement.on('change', ({
                error
            }) => {
                const displayError = document.getElementById('card-errors');
                if (error) {
                    displayError.textContent = error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            var form = document.getElementById('payment-form');

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                const {
                    paymentMethod,
                    error
                } = await stripe.createPaymentMethod(
                    'card', cardElement, {

                    }
                );

                if (error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;
                } else {
                    // Send the token to your server
                    // console.log(setupIntent);
                    stripeTokenHandler(paymentMethod);
                }
            });

            function stripeTokenHandler(paymentMethod) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'paymentMethod');
                hiddenInput.setAttribute('value', paymentMethod.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        </script>
    @endpush

</x-app-layout>
