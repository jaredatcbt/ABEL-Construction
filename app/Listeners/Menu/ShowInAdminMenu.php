<?php

namespace App\Listeners\Menu;

use App\Events\Menu\AdminCreated as Event;
use App\Traits\Modules;
use App\Traits\Permissions;

class ShowInAdminMenu
{
    use Modules, Permissions;

    /**
     * Handle the event.
     *
     * @param  Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        // if (!$this->moduleIsEnabled('fuel')) {
        //     return;
        // }

        $title = trans('fuel_general.name');

        if ($this->canAccessMenuItem($title, 'read-fuel-stock')) {
            // $event->menu->route('dashboard', $title, [], 100, ['icon' => 'local_gas_station', 'search_keywords' => "FuelKey"]);
            $event->menu->dropdown($title, function ($sub) {
                $sub->route('fuel.stock.index', trans('fuel_general.menu.stock'));
                $sub->route('fuel.buy.index', trans('fuel_general.menu.buy'));
                $sub->route('fuel.vehicle.index', trans('fuel_general.menu.vehicle'));
                $sub->route('fuel.generator.index', trans('fuel_general.menu.generator'));
                $sub->route('fuel.usage.index', trans('fuel_general.menu.usage'));
            }, 100, ['icon' => 'local_gas_station']);
        }
    }
}
