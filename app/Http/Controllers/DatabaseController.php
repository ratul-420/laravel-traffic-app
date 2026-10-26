<?php
namespace App\Http\Controllers;
use App\Models\Restriction;

class DatabaseController extends Controller
{
    public function index()
    {
        $rows = Restriction::with(['naming', 'extent'])
            ->orderBy('roadnumber')->orderBy('frompoint')
            ->paginate(25);
        return view('database', compact('rows'));
    }
}
