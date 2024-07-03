<?php

namespace App\Http\Controllers;

use App\Actions\Venue\VenueDestroyAction;
use App\Actions\Venue\VenueStoreAction;
use App\Actions\Venue\VenueUpdateAction;
use App\DataTables\VenueDataTable;
use App\Http\Requests\VenueRequest;
use App\Models\Venue;

class VenueController extends Controller
{
    public function index(VenueDataTable $dataTable)
    {
        return $dataTable->render('venue.list');
    }

    public function create()
    {
        return view('venue.form', [
            'venue' => null,
        ]);
    }

    public function store(VenueRequest $request, VenueStoreAction $storeAction)
    {
        $storeAction($request);
        return redirect(route('venue.index'));
    }

    public function show(Venue $venue)
    {
        //
    }

    public function edit(Venue $venue)
    {
        return view('venue.form', compact('venue'));
    }

    public function update(VenueRequest $request, Venue $venue, VenueUpdateAction $updateAction)
    {
        $updateAction($venue, $request);
        return redirect(route('venue.index'));
    }

    public function destroy(Venue $venue, VenueDestroyAction $destroyAction)
    {
        $destroyAction($venue);
        return redirect(route('venue.index'));
    }
}
