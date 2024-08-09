<x-layouts.admin>

    <x-slot name="title">
        {{ trans($module.'.name') }}
    </x-slot>

    <x-slot name="favorite"
        title="{{ trans($module.'.name') }}"
        icon="description"
        route="{{ $module_index }}"
    ></x-slot>

    <x-slot name="buttons">
        <div data-page-title-second="" class="w-full flex flex-wrap flex-col sm:flex-row sm:items-center justify-end sm:space-x-2 sm:rtl:space-x-reverse suggestion-buttons">
            <a class="px-3 py-1.5 mb-3 sm:mb-0 rounded-xl text-sm font-medium leading-6 bg-green hover:bg-green-700 text-white disabled:bg-green-100" href="{{ route('fuel.buy.create') }}" id="index-more-actions-new-stock">
                {{ trans($module.'.add') }}
            </a>
        </div>
    </x-slot>

    <x-slot name="content">

        <x-form.section.head title="{{ trans('fuel_buy.nav_title') }}" description="{{ trans('fuel_buy.nav_description') }}" />

        <x-table>
            <x-table.thead>
                <x-table.tr class="flex items-center px-1">
                    <x-table.th class="w-3/12 sm:w-3/12">
                        {{ trans('fuel_buy.vendor_name') }}
                    </x-table.th>

                    <x-table.th class="w-3/12 sm:w-3/12">
                        {{ trans('fuel_buy.quantity') }}
                    </x-table.th>

                    <x-table.th class="w-2/12 sm:w-2/12">
                        {{ trans('fuel_buy.price') }}
                    </x-table.th>

                    <x-table.th class="w-2/12 sm:w-2/12">
                        {{ trans('fuel_buy.date') }}
                    </x-table.th>

                    <x-table.th class="w-2/12 sm:w-2/12">
                        {{ trans('fuel_buy.actions') }}
                    </x-table.th>
                </x-table.tr>
            </x-table.thead>

            <x-table.tbody>
                @foreach($latestPurchases as $item)
                    <x-table.tr>
                        <x-table.th class="w-3/12 sm:w-3/12">
                            @if ($item->vendor)
                                {{ $item->vendor->name }}
                            @else
                                <x-empty-data />
                            @endif
                        </x-table.th>

                        <x-table.th class="w-3/12 sm:w-3/12 text-green-important">
                            @if ($item->quantity)
                                {{ 'ℓ'.$item->quantity }}
                            @else
                                <x-empty-data />
                            @endif
                        </x-table.th>

                        <x-table.th class="w-2/12 sm:w-2/12">
                            @if ($item->unit_price)
                                <x-money :amount="$item->unit_price" :currency="default_currency()" convert />
                            @else
                                <x-empty-data />
                            @endif
                        </x-table.th>

                        <x-table.th class="w-2/12 sm:w-2/12">
                            @if ($item->purchase_date)
                                {{ $item->purchase_date }}
                            @else
                                <x-empty-data />
                            @endif
                        </x-table.th>

                        <x-table.th class="w-2/12 sm:w-2/12">
                            <div class="ltr:right-8 rtl:left-8 flex items-center">
                                @can('update-offline-payments-settings')
                                    <x-button
                                        type="button"
                                        id="edit-{{ $item->id }}"
                                        data-code="{{ $item->transaction_type }}"
                                        class="relative bg-white hover:bg-gray-100 border py-0.5 px-1 cursor-pointer index-actions group"
                                        override="class"
                                        @click="onEdit('{{ $item->id }}', '{{ $item->transaction_type }}')">
                                        <span class="material-icons-outlined text-purple text-lg">edit</span>
                                        <div class="inline-block absolute invisible z-20 py-1 px-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 tooltip-content -top-10 -left-2" data-tooltip-placement="top">
                                            <span>{{ trans('general.edit') }}</span>
                                            <div class="absolute w-2 h-2 -bottom-1 before:content-[' '] before:absolute before:w-2 before:h-2 before:bg-white before:border-gray-200 before:transform before:rotate-45 before:border before:border-t-0 before:border-l-0" data-popper-arrow></div>
                                        </div>
                                    </x-button>
                                @endcan

                                @can('delete-offline-payments-settings')
                                    <x-button
                                        type="button"
                                        class="relative bg-white hover:bg-gray-100 border py-0.5 px-1 cursor-pointer index-actions"
                                        override="class"
                                        id="delete-{{ $item->id }}"
                                        data-code="{{ $item->transaction_type }}"
                                        v-bind:disabled="update_code === '{{ $item->transaction_type }}'"
                                        @click="confirmDelete('{{ $item->id }}', '{{ $item->transaction_type }}', '{{ trans('general.delete') }}', '{{ trans('general.delete_confirm', ['name' => '<strong>' . $item->transaction_type . '</strong>', 'type' => mb_strtolower(trans('offline-payments::general.name'))]) }}', '{{ trans('general.cancel') }}', '{{ trans('general.delete') }}')">
                                        <span class="material-icons-outlined text-purple text-lg">delete</span>
                                        <div class="inline-block absolute invisible z-20 py-1 px-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 tooltip-content -top-10 -left-2" data-tooltip-placement="top">
                                            <span>{{ trans('general.delete') }}</span>
                                            <div class="absolute w-2 h-2 -bottom-1 before:content-[' '] before:absolute before:w-2 before:h-2 before:bg-white before:border-gray-200 before:transform before:rotate-45 before:border before:border-t-0 before:border-l-0" data-popper-arrow></div>
                                        </div>
                                    </x-button>
                                @endcan
                            </div>
                        </x-table.th>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </x-slot>
</x-layouts.admin>
