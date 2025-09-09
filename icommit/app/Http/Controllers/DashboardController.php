<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Units;
use App\Models\Leads;

class DashboardController extends Controller
{
    public function master()
    {
        return view('template.master');
    }

      public function viewdata()
    {
        $totalUnits = Units::count();
        $tersediaUnits = Units::where('status', 'tersedia')->count();
        $bookingUnits = Units::where('status', 'booking')->count();
        $terjualUnits = Units::where('status', 'terjual')->count();

        return view('dashboard', compact('totalUnits', 'tersediaUnits', 'bookingUnits', 'terjualUnits'));
    }
}
