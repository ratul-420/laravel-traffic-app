<?php
namespace App\Http\Controllers;
use App\Models\Extent;
use App\Models\Naming;
use App\Models\Restriction;
use Illuminate\Http\Request;

class RestrictionController extends Controller
{
    private function rules(): array
    {
        return [
            'roadnumber' => 'required|integer|min:1',
            'frompoint'  => 'required|numeric|min:0',
            'topoint'    => 'required|numeric|min:0',
            'settlement' => 'required|string|max:100',
            'fromdate'   => 'required|date',
            'todate'     => 'required|date|after_or_equal:fromdate',
            'namingid'   => 'required|exists:naming,id',
            'extentid'   => 'required|exists:extent,id',
            'speed'      => 'nullable|integer|min:5|max:130',
        ];
    }

    private function form(Restriction $restriction)
    {
        return view('crud.form', [
            'restriction' => $restriction,
            'namings' => Naming::orderBy('nev')->get(),
            'extents' => Extent::orderBy('id')->get(),
        ]);
    }

    public function index()
    {
        $rows = Restriction::with(['naming', 'extent'])
            ->orderBy('id', 'desc')->paginate(20);
        return view('crud.index', compact('rows'));
    }

    public function create()
    {
        return $this->form(new Restriction());
    }

    public function store(Request $request)
    {
        Restriction::create($request->validate($this->rules()));
        return redirect()->route('crud.index')->with('success', 'Restriction created.');
    }

    public function edit(Restriction $restriction)
    {
        return $this->form($restriction);
    }

    public function update(Request $request, Restriction $restriction)
    {
        $restriction->update($request->validate($this->rules()));
        return redirect()->route('crud.index')->with('success', 'Restriction updated.');
    }

    public function destroy(Restriction $restriction)
    {
        $restriction->delete();
        return redirect()->route('crud.index')->with('success', 'Restriction deleted.');
    }
}
