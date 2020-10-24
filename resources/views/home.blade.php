<x-guest-layout>
    <div class="container mx-auto">
        <div class="text-center">
            <h1 class="text-6xl font-normal leading-normal mt-0 mb-2 text-gray-800">Products</h1>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Name') }}
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Image') }}
                                </th>
                                <th class="px-6 py-3 bg-gray-50"></th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">
                                                    {{ $product->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <img class="h-10 w-10 rounded-full" src="{{ $product->image_url }}" alt="">
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                        <a href="{{ url('home') }}"
                                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">{{ __('Order') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $products->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
