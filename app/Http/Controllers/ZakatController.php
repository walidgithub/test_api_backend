<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;

class ZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Zakat::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'membersCount' => 'required',
            'zakatValue' => 'required|max:10',
            'remainValue' => 'required|max:10',
        ]);

        $zakat = Zakat::create($fields);
        return $zakat;
    }

    /**
     * Display the specified resource.
     */
    public function show(Zakat $zakat)
    {
        return $zakat;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zakat $zakat)
    {
        $fields = $request->validate([
            'membersCount' => 'required',
            'zakatValue' => 'required|max:10',
            'remainValue' => 'required|max:10',
        ]);

        $zakat->update($fields);
        return $zakat;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zakat $zakat)
    {
        $zakat->delete();
        return ['message' => 'this zakat is deleted'];
    }
}
