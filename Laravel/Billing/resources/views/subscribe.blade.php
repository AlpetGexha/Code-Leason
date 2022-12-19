<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscribe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <x-alert />
                    <form id="payment-form" class="container mx-auto" action="{{ route('subscribe.post') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-row my-5 w-1/2 ">

                            <div class="my-4">
                                <div class="mt-2">
                                    <input type="radio" name="plan" id="standard"
                                        value="price_1MFhzqFgsgnrNckQZwmazPWn" checked>
                                    <label for="standard">Standard - $9.99 / month</label> <br>
                                </div>

                                <div class="mt-2">
                                    <input type="radio" name="plan" id="premium"
                                        value="price_1MFhzqFgsgnrNckQXhzxahI6" />
                                    <label for="premium">Premium - $19.99 / month </label> <br>
                                </div>

                                <div class="mt-2">
                                    <input type="radio" name="plan" id="megaluks"
                                        value="price_1MFhzqFgsgnrNckQB5ohYuwi" />
                                    <label for="megaluks">MEGA LLUKS - $59.99 / month </label>
                                </div>
                            </div>


                            <div id="card-element" class="my-5">
                                <!-- a Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors -->
                            <div id="card-errors"></div>
                        </div>

                        <div class="w-1/3">
                            <div class="mt-4">
                                <x-jet-label for="coupon" value="{{ __('Coupon') }}" />
                                <x-jet-input id="coupon" class="block mt-1 w-full" type="text" name="coupon" />
                            </div>
                        </div>

                        <x-jet-button class="mt-4 submit" id="button-submit" data-secret="{{ $intent->client_secret }}">
                            {{ __('SUBSCRIBE') }}
                        </x-jet-button>
                    </form>
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
            const card = elements.create('card');
            // Add an instance of the card UI component into the `card-element` <div>
            card.mount('#card-element');
            card.on('change', ({
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
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup(
                    client_secret, {
                        payment_method: {
                            card,
                            // billing_details: {
                            //     name: Alpet
                            // }
                        }
                    }
                );

                if (error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;
                } else {
                    // Send the token to your server
                    // console.log(setupIntent);
                    stripeTokenHandler(setupIntent);
                }



                // stripe.createToken(card).then(function(result) {
                //     if (result.error) {
                //         // Inform the user if there was an error
                //         var errorElement = document.getElementById('card-errors');
                //         errorElement.textContent = result.error.message;
                //     } else {
                //         // Send the token to your server
                //         stripeTokenHandler(result.token);
                //     }
                // });

            });

            function stripeTokenHandler(setupIntent) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'paymentMethod');
                hiddenInput.setAttribute('value', setupIntent.payment_method);
                form.appendChild(hiddenInput);
                form.submit();
            }
        </script>
    @endpush

</x-app-layout>
