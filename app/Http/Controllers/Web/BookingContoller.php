<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class BookingContoller extends Controller
{
    public function dashboard(Request $request)
    {
        return Inertia::render('Dashboard');
    }

    public function createBooking(Request $request)
    {
        return Inertia::render('Create');
    }
}
