<template>
    <div class="-mx-4 mt-5 sm:-mx-0">
        <!-- <x-slot name="header">
            <div class="ml-4 mt-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Variants</h3>
            </div>
        </x-slot> -->
        <div name="content">
            <div class="space-y-6 -mx-4 -mt-6 sm:-mx-6">
                <div x-data class="relative max-h-96 overflow-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="relative">
                                <th class="pl-6 pr-2 py-3 sticky top-0 z-10 border-b bg-gray-50 bg-opacity-75 backdrop-blur backdrop-filter text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Variant
                                </th>
                                <th class="px-2 py-3 sticky top-0 z-10 border-b bg-gray-50 bg-opacity-75 backdrop-blur backdrop-filter text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                                <th class="px-2 py-3 sticky top-0 z-10 border-b bg-gray-50 bg-opacity-75 backdrop-blur backdrop-filter text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Stock
                                </th>
                                <th class="pl-2 pr-6 py-3 sticky top-0 z-10 border-b bg-gray-50 bg-opacity-75 backdrop-blur backdrop-filter text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    SKU
                                </th>
                                <th class="pl-2 pr-6 py-3 sticky top-0 z-10 border-b bg-gray-50 bg-opacity-75 backdrop-blur backdrop-filter text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Barcode
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <!-- <form wire:submit.prevent="save">
                                @foreach($product->skus as $index => $sku)
                                    <tr wire:key="sku-field-{{ $sku->id }}">
                                        <td class="pl-6 pr-2 py-4 border-b border-gray-200 whitespace-nowrap text-sm text-gray-900 font-medium">
                                            <div class="flex">
                                                @foreach($sku->variants as $variant)
                                                    <p @class(['ml-2 pl-2 border-l border-gray-200' => !$loop->first])>
                                                        {{ $variant->optionValue->label ?? $variant->optionValue->value }}
                                                    </p>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-2 py-4 border-b border-gray-200 whitespace-nowrap text-sm text-gray-500">
                                            <x-label for="sku-{{ $index }}-price" value="Price" class="sr-only" />
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500 sm:text-sm">
                                                        {{ config('money.'.config('app.currency').'.symbol') }}
                                                    </span>
                                                </div>
                                                <x-input wire:model.defer="skus.{{ $index }}.price" wire:change.debounce="save" @click="$event.target.select();" @keyup.enter="$event.target.blur();" type="text" id="sku-{{ $index }}-price" class="block w-28 sm:text-sm shadow-none pl-7" />
                                            </div>
                                            <x-input-error for="skus.{{ $index }}.price" class="mt-2" />
                                        </td>
                                        <td class="px-2 py-4 border-b border-gray-200 whitespace-nowrap text-sm text-gray-500">
                                            <x-label for="sku-{{ $index }}-stock" value="Price" class="sr-only" />
                                            <x-input wire:model.defer="skus.{{ $index }}.stock" wire:change.debounce="save" @click="$event.target.select();" @keyup.enter="$event.target.blur();" type="number" id="sku-{{ $index }}-stock" class="block w-28 sm:text-sm shadow-none" />
                                            <x-input-error for="skus.{{ $index }}.stock" class="mt-2" />
                                        </td>
                                        <td class="pl-2 pr-6 py-4 border-b border-gray-200 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <x-label for="sku-{{ $index }}-name" value="Name" class="sr-only" />
                                            <x-input wire:model.defer="skus.{{ $index }}.name" wire:change.debounce="save" @click="$event.target.select();" @keyup.enter="$event.target.blur();" type="text" id="sku-{{ $index }}-name" class="block w-40 sm:text-sm shadow-none" />
                                            <x-input-error for="skus.{{ $index }}.name" class="mt-2" />
                                        </td>
                                        <td class="pl-2 pr-6 py-4 border-b border-gray-200 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <x-label for="sku-{{ $index }}-barcode" value="Barcode" class="sr-only" />
                                            <x-input wire:model.defer="skus.{{ $index }}.barcode" wire:change.debounce="save" @click="$event.target.select();" @keyup.enter="$event.target.blur();" type="text" id="sku-{{ $index }}-barcode" class="block w-40 sm:text-sm shadow-none" />
                                            <x-input-error for="skus.{{ $index }}.barcode" class="mt-2" />
                                        </td>
                                    </tr>
                                @endforeach
                            </form> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>