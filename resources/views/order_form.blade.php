<x-guest-layout>
    <div class="container mx-auto">
        <div class="text-center">
            <h1 class="text-6xl font-normal leading-normal mt-0 mb-2 text-gray-800">{{ __('Create Order for: ') . $product->name }}</h1>
        </div>
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <x-jet-validation-errors class="mb-4"/>
                <form method="POST" action="{{ route('order.store', ['product_id' => $product->id]) }}">
                    @method('PUT')
                    @csrf
                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}"/>
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                     :value="old('email')" required autofocus/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="phone_number" value="{{ __('Phone number') }}"/>
                        <x-jet-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                                     :value="old('phone_number')" required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="shipping_address_1" value="{{ __('Shipping address 1') }}"/>
                        <x-jet-input id="shipping_address_1" class="block mt-1 w-full" type="text"
                                     name="shipping_address_1" :value="old('shipping_address_1')" required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="shipping_address_2" value="{{ __('Shipping address 2') }}"/>
                        <x-jet-input id="shipping_address_2" class="block mt-1 w-full" type="text"
                                     name="shipping_address_2" :value="old('shipping_address_2')" required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="shipping_address_3" value="{{ __('Shipping address 3') }}"/>
                        <x-jet-input id="shipping_address_3" class="block mt-1 w-full" type="text"
                                     name="shipping_address_3" :value="old('shipping_address_3')" required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="city" value="{{ __('City') }}"/>
                        <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                                     required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="country_code" value="{{ __('Country code') }}"/>
                        <x-jet-input id="country_code" class="block mt-1 w-full" type="text" name="country_code"
                                     :value="old('country_code')" required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="zip_postal_code" value="{{ __('Zip postal code') }}"/>
                        <x-jet-input id="zip_postal_code" class="block mt-1 w-full" type="text" name="zip_postal_code"
                                     :value="old('zip_postal_code')" required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="quantity" value="{{ __('Quantity') }}"/>
                        <x-jet-input id="quantity" class="block mt-1 w-full" type="number" name="quantity"
                                     :value="old('quantity', 1)" min="1" step="1" required/>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Create') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
