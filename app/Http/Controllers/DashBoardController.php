<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function index()
    {
        $favoriteCategories = Wishlist::select(
                'category_name',
                DB::raw('count(*) as total')
            )
            ->groupBy('category_name')
            ->orderByDesc('total')
            ->get();


        $mostFavoriteProducts = Wishlist::select(
                'product_name',
                DB::raw('count(*) as total')
            )
            ->groupBy('product_name')
            ->orderByDesc('total')
            ->limit(5)
            ->get();


        $averagePrice = Wishlist::avg('product_price');


        $activeUsers = User::whereHas('wishlists')
            ->count();


        return view('dashboard', [
            'stats' => [
                'categories' => $favoriteCategories,
                'products' => $mostFavoriteProducts,
                'averagePrice' => round($averagePrice, 2),
                'activeUsers' => $activeUsers
            ]
        ]);
    }
}
