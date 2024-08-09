<x-layouts.admin>

    @push('stylesheet')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" type="text/css">
    @endpush

    <x-slot name="title">
        {{ trans($module.'.name') }}
    </x-slot>

    <x-slot name="favorite"
        title="{{ trans($module.'.name') }}"
        icon="description"
        route="{{ $module_index }}"
    ></x-slot>

    <x-slot name="content">
        <x-show.container>
            <x-show.content class="flex flex-col-reverse lg:flex-row mt-5 sm:mt-12 gap-y-4" override="class">
                <div class="lg:w-8/12 lg:pr-12 mb-4 sm:mb-0">
                    <x-form id="purchase.fuel" method="POST" route="fuel.buy.store">
                        <x-form.section>
                            <x-slot name="head">
                                <x-form.section.head title="{{ trans('fuel_buy.create.title') }}" description="{{ trans('fuel_buy.create.description') }}" />
                            </x-slot>

                            <x-slot name="body">
                                <x-form.group.text name="select_vendor" label="{{ trans('fuel_buy.create.select_vendor') }}" form-group-class="sm:col-span-6" />

                                <x-form.group.text name="quantity" label="{{ trans('fuel_buy.create.quantity') }}" form-group-class="sm:col-span-6" not-required />

                                <x-form.group.text name="unit_price" label="{{ trans('fuel_buy.create.unit_price') }}" form-group-class="sm:col-span-6" not-required />

                                <div class="flatpickr relative sm:col-span-6">
                                    <input type="text" name="issue_at_date" id="issue_at_date" class="datepicker w-full text-sm px-3 py-2.5 mt-1 rounded-lg border border-light-gray text-black placeholder-light-gray bg-white disabled:bg-gray-200 focus:outline-none focus:ring-transparent focus:border-purple form-control input active" readonly="readonly" data-input> <!-- input is mandatory -->

                                </div>

                            </x-slot>

                            <x-slot name="foot">
                                <div class="flex items-center justify-end sm:col-span-6">
                                    <a class="px-6 py-1.5 hover:bg-gray-200 rounded-lg ltr:mr-2 rtl:ml-2" href="{{ route('fuel.buy.index') }}">
                                        Cancel
                                    </a>

                                    <button type="submit"
                                        class="relative flex items-center justify-center bg-green hover:bg-green-700 text-white px-6 py-1.5 text-base rounded-lg disabled:bg-green-100">
                                        <i class="animate-submit hidden delay-[0.28s] absolute w-2 h-2 rounded-full left-0 right-0 -top-3.5 m-auto before:absolute before:w-2 before:h-2 before:rounded-full before:animate-submit before:delay-[0.14s] after:absolute after:w-2 after:h-2 after:rounded-full after:animate-submit before:-left-3.5 after:-right-3.5 after:delay-[0.42s]">
                                        </i>

                                        <span>
                                            Save
                                        </span>
                                    </button>
                                </div>
                            </x-slot>
                        </x-form.section>
                    </x-form>
                </div>
            </x-show.content>
        </x-show.container>
    </x-slot>

    @push('scripts_start')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($){
                $(".flatpickr").flatpickr(
                    {
                        dateFormat: "{{ company_date_format() }}",
                        label: "{{ trans('abc') }}",
                        wrap: true
                    }
                );
            });
        </script>

    @endpush

</x-layouts.admin>
