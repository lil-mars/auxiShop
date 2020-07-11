<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\SaleDetail;
use App\Models\Spare;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $spare_count = Spare::count();
        $client_count = Client::count();
        $user_count = User::count();

        $spares = DB::table('sale_details')
            ->select(
                DB::raw('sum(sale_details.quantity) as SumQuantities, sale_details.spare_id,spares.description')
            )
            ->join('spares', 'sale_details.spare_id', '=', 'spares.id')
            ->groupBy('sale_details.spare_id')
            ->orderBy('SumQuantities', 'desc')->get();
        $list = array_slice($spares->all(), 0, 5);
        return view('admin.home', compact(['spare_count', 'client_count', 'user_count', 'list']));
    }
}
