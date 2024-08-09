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
            <a class="px-3 py-1.5 mb-3 sm:mb-0 rounded-xl text-sm font-medium leading-6 bg-green hover:bg-green-700 text-white disabled:bg-green-100" href="{{ route('fuel.vehicle.create') }}" id="index-more-actions-new-stock">
                {{ trans($module.'.add') }}
            </a>
        </div>
    </x-slot>

    <x-slot name="content">

        @php
            $items = [
                0 => [
                    'text_color' => '',
                    'tooltip' => trans($module.'.vehicle_tooltip'),
                    'href' => '',
                    'amount' => $vehicles->count(),
                    'title' => 'Number of Vehicles',
                ],
                1 => [
                    'text_color' => '',
                    'tooltip' => trans($module.'.fuelconsumed_tooltip'),
                    'href' => '',
                    'amount' => $totalFuelUsed.'ℓ',
                    'title' => 'Total Fuel Consumed',
                ]
            ];
        @endphp

        <div class="flex items-center justify-center text-black mt-10 mb-10">
            @if (! empty($items))
                @foreach ($items as $item)
                    <div @class(['w-1/2 sm:w-1/3 text-center'])>
                        @php
                            $text_color = (! empty($item['text_color'])) ? $item['text_color'] : 'text-purple group-hover:text-purple-700';
                        @endphp

                        @if (! empty($item['tooltip']))
                            <x-tooltip id="tooltip-summary-{{ $loop->index }}" placement="top" message="{!! $item['tooltip'] !!}">
                                @if (! empty($item['href']))
                                    <x-link href="{{ $item['href'] }}" class="group" override="class">
                                        <div @class(['relative text-xl sm:text-6xl', $text_color, 'mb-2'])>
                                            {!! $item['amount'] !!}
                                            <span class="w-8 absolute left-0 right-0 m-auto -bottom-1 bg-gray-200 transition-all group-hover:bg-gray-900" style="height: 1px;"></span>
                                        </div>

                                        <span class="font-light mt-3">
                                            {!! $item['title'] !!}
                                        </span>
                                    </x-link>
                                @else
                                    <div @class(['relative text-xl sm:text-6xl', $text_color, 'mb-2'])>
                                        {!! $item['amount'] !!}
                                        <span class="w-8 absolute left-0 right-0 m-auto -bottom-1 bg-gray-200 transition-all group-hover:bg-gray-900" style="height: 1px;"></span>
                                    </div>

                                    <span class="font-light mt-3">
                                        {!! $item['title'] !!}
                                    </span>
                                @endif
                            </x-tooltip>
                        @else
                            @if (! empty($item['href']))
                                <x-link href="{{ $item['href'] }}" class="group" override="class">
                                    <div @class(['relative text-xl sm:text-6xl', $text_color, 'mb-2'])>
                                        {!! $item['amount'] !!}
                                        <span class="w-8 absolute left-0 right-0 m-auto -bottom-1 bg-gray-200 transition-all group-hover:bg-gray-900" style="height: 1px;"></span>
                                    </div>

                                    <span class="font-light mt-3">
                                        {!! $item['title'] !!}
                                    </span>
                                </x-link>
                            @else
                                <div @class(['relative text-xl sm:text-6xl', $text_color, 'mb-2'])>
                                    {!! $item['amount'] !!}
                                    <span class="w-8 absolute left-0 right-0 m-auto -bottom-1 bg-gray-200 transition-all group-hover:bg-gray-900" style="height: 1px;"></span>
                                </div>

                                <span class="font-light mt-3">
                                    {!! $item['title'] !!}
                                </span>
                            @endif
                        @endif
                    </div>
                @endforeach
            @endif
        </div>

        {{-- ___________________________________________ --}}

        <x-form.section.head title="{{ trans($module.'.nav_title') }}" description="{{ trans($module.'.nav_description') }}" />

        <x-table>
            <x-table.thead>
                <x-table.tr class="flex items-center px-1">
                    <x-table.th class="w-3/12 sm:w-3/12">
                        {{ trans($module.'.company_name') }}
                    </x-table.th>

                    <x-table.th class="w-3/12 sm:w-3/12">
                        {{ trans($module.'.model') }}
                    </x-table.th>

                    <x-table.th class="w-2/12 sm:w-2/12">
                        {{ trans($module.'.created_at') }}
                    </x-table.th>

                    <x-table.th class="w-2/12 sm:w-2/12">
                        {{ trans($module.'.total_fuel_consumed') }}
                    </x-table.th>

                    <x-table.th class="w-2/12 sm:w-2/12">
                        {{ trans($module.'.actions') }}
                    </x-table.th>
                </x-table.tr>
            </x-table.thead>

            <x-table.tbody>
                @foreach($vehicles as $item)
                    <x-table.tr>

                        <x-table.th class="w-3/12 sm:w-3/12">
                            {{ $item->name }}
                        </x-table.th>

                        <x-table.th class="w-3/12 sm:w-3/12">
                            {{ $item->model }}
                        </x-table.th>

                        <x-table.th class="w-2/12 sm:w-2/12">
                            {{ Carbon\Carbon::parse($item->created_at)->format(company_date_format()) }}
                        </x-table.th>

                        <x-table.th class="w-2/12 sm:w-2/12">
                            @if ($item->fuelUsed && $item->fuelUsed->sum('quantity') > 0)
                                {{ $item->fuelUsed->sum('quantity').'ℓ' }}
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
                                        data-code="{{ $item->model }}"
                                        class="relative bg-white hover:bg-gray-100 border py-0.5 px-1 cursor-pointer index-actions group"
                                        override="class"
                                        @click="editVehicle('{{ $item->id }}')">
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
                                        data-code="{{ $item->model }}"
                                        v-bind:disabled="update_code === '{{ $item->model }}'"
                                        @click="confirmDelete('{{ $item->id }}', '{{ $item->transaction_type }}', '{{ trans('general.delete') }}', '{{ trans('general.delete_confirm', ['name' => '<strong>' . $item->model . '</strong>', 'type' => mb_strtolower(trans('offline-payments::general.name'))]) }}', '{{ trans('general.cancel') }}', '{{ trans('general.delete') }}')">
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
