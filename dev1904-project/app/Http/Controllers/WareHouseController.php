<?php
namespace App\Http\Controllers;

use App\User;
use App\Warehouse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class WareHouseController extends BaseController
{
    public function List(Request $req)
    {
        $limit = 5;
        $page            = $req->query('page');
        $numberOfRecords = warehouse::query()->count();
        $numberOfPage    = $numberOfRecords > 0 ? ceil($numberOfRecords / $limit) : 1;
        $warehouses         = Warehouse::query()
            ->skip(($page - 1) * $limit)
            ->take($limit)
            ->get();
        return view('warehouse/warehouse', [
            'warehouses' => $warehouses,
            'page'         => $page,
            'numberOfPage' => $numberOfPage,
        ]);
    }
}
