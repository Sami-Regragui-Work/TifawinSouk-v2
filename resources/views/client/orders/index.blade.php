<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 dark:text-gray-400 leading-tight">
            My Commandes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($orders->count())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{ $orders->total() }} order{{ $orders->total() > 1 ? 's' : '' }} found
                        </h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr class="[&_th]:px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <th>N°</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($orders as $index => $order)
                                    <tr class="hover:bg-gray-50 [&_td]:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <td>
                                            #{{ $index }}
                                        </td>
                                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ number_format($order->total(), 2) }} DH</td>
                                        <td>
                                            <a href="{{ route('client.orders.show', $order) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">See Details →</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4 bg-gray-50">
                        {!! $orders->appends(request()->query())->links() !!}
                    </div>
                </div>
            @else
                <div class="text-center py-20">
                    <h3 class="text-white">No orders yet!</h3>
                    <a href="{{-- route('client.products.index') --}}" class="bg-blue-500 text-white px-4 py-2 rounded">Shop Now</a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
