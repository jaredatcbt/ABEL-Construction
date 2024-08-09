<x-layouts.admin>

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
                    <x-form id="purchase.fuel" method="POST" route="fuel.vehicle.store">
                        <x-form.section>
                            <x-slot name="head">
                                <x-form.section.head title="{{ trans('fuel_vehicle.create.title') }}" description="{{ trans('fuel_vehicle.create.description') }}" />
                            </x-slot>

                            <x-slot name="body">
                                <x-form.group.text
                                    name="name"
                                    label="{{ trans('fuel_vehicle.create.name_field') }}"
                                    form-group-class="sm:col-span-6"
                                    required="required"
                                />

                                <x-form.group.text name="model" label="{{ trans('fuel_vehicle.create.model_field') }}" form-group-class="sm:col-span-6" required="required" />
                            </x-slot>

                            <x-slot name="foot">
                                <div class="flex items-center justify-end sm:col-span-6">
                                    @if ($errors)
                                    @endif
                                    @if (isset($attributes))
                                        <span>{{ $attributes }}</span>
                                    @endif
                                    <a class="px-6 py-1.5 hover:bg-gray-200 rounded-lg ltr:mr-2 rtl:ml-2" href="{{ route('fuel.vehicle.index') }}">
                                        Cancel
                                    </a>
                                    <button type="submit" class="relative flex items-center justify-center bg-green hover:bg-green-700 text-white px-6 py-1.5 text-base rounded-lg disabled:bg-green-100">
                                        <i class="absolute w-2 h-2 rounded-full left-0 right-0 -top-3.5 m-auto "></i>
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

</x-layouts.admin>
