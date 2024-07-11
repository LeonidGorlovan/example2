<?php

namespace App\Http\Controllers;

use App\Actions\Venue\VenueDestroyAction;
use App\Actions\Venue\VenueStoreAction;
use App\Actions\Venue\VenueUpdateAction;
use App\DataTables\VenueDataTable;
use App\Http\Requests\VenueRequest;
use App\Models\Venue;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class VenueController extends Controller
{
    public function index(VenueDataTable $dataTable): VenueDataTable
    {
        return $dataTable->render('venue.list');
    }

    public function create(): View
    {
        return view('venue.form', [
            'venue' => null,
        ]);
    }

    public function store(VenueRequest $request, VenueStoreAction $storeAction): RedirectResponse
    {
        $storeAction($request);
        return redirect(route('venue.index'));
    }

    public function edit(Venue $venue): View
    {
        return view('venue.form', compact('venue'));
    }

    public function update(VenueRequest $request, Venue $venue, VenueUpdateAction $updateAction): RedirectResponse
    {
        $updateAction($venue, $request);
        return redirect(route('venue.index'));
    }

    public function destroy(Venue $venue, VenueDestroyAction $destroyAction): RedirectResponse
    {
        $destroyAction($venue);
        return redirect(route('venue.index'));
    }
}
