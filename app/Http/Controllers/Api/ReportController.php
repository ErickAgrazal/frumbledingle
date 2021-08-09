<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // We need to verify if there is a price query parameter.
        if (!$request->price) {
            return response()->json();
        }

        // After we know that the price is ready.
        $price = $request->price;

        // Custom query
        $report = DB::table('items as items');
        $report->selectRaw('locations.name as location, parents.name as parent_category, categories.name as category, count(*) as count')
            ->join('locations', 'items.location_id', '=', 'locations.id')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->leftjoin('categories as parents', 'categories.parent_id', '=', 'parents.id')  // Left join necessary to get null parents without raising errors.
            ->where('items.price', '>=', $price)
            ->groupBy(DB::raw('location, parent_category, category'));
        return response()->json($report->get());
    }
}
