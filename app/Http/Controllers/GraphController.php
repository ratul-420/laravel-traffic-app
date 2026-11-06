<?php
namespace App\Http\Controllers;
use App\Models\Naming;

class GraphController extends Controller
{
    public function index()
    {
        $data = Naming::withCount('restrictions')->orderBy('id')->get();
        $labels = $data->pluck('nev');
        $counts = $data->pluck('restrictions_count');
        return view('graph', compact('labels', 'counts'));
    }
}