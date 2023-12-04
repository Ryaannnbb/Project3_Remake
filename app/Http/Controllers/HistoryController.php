<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index() {
        $histories = Pesanan::where('status', 'completed')->orWhere('status', 'rejected')->get();

        return view('histori.index', compact('histories'));
    }
}
