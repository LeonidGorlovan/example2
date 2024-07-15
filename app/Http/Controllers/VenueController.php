<?php

namespace App\Http\Controllers;

use App\DataTables\VenueDataTable;
use App\Http\Requests\VenueRequest;
use App\Services\VenueService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class VenueController extends Controller
{
    private VenueService $venueService;

    public function __construct(VenueService $venueService)
    {
        $this->venueService = $venueService;
    }

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

    public function store(VenueRequest $request): RedirectResponse
    {
        $this->venueService->store($request->validated());
        return redirect(route('venue.index'));
    }

    public function edit(int $id): View
    {
        $venue = $this->venueService->one($id);
        return view('venue.form', compact('venue'));
    }

    public function update(VenueRequest $request, int $id): RedirectResponse
    {
        $this->venueService->update($request->validated(), $id);
        return redirect(route('venue.index'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->venueService->destroy($id);
        return redirect(route('venue.index'));
    }
}
