<?php

namespace App\Http\Controllers;

use App\Models\Distribution;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'report_id' => ['required', 'integer'],
            'destination_id' => ['required', 'integer']
        ]);

        $distribution = Distribution::create($request->only([
            'report_id',
            'destination_id'
        ]));

        return redirect()->back()->with([
            'message' => 'Berhasil menambahkan distribusi.',
            'data' => $distribution,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribution $distribution)
    {
        $distribution->delete();

        return redirect()->back()->with([
            'message' => 'Berhasil',
        ]);
    }
}
