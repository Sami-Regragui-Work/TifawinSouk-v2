<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\User;

class AdminDashboard extends Widget
{
    protected string $view = 'filament.widgets.admin-dashboard';

    public function getViewData():array {
        return [
            'users' => User::all(),
        ];
    }
}
