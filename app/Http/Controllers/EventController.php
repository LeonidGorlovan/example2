<?php

namespace App\Http\Controllers;

use App\Actions\DestroyImageAction;
use App\Actions\Event\EventDestroyAction;
use App\Actions\Event\EventStoreAction;
use App\Actions\Event\EventUpdateAction;
use App\Actions\UploadImageAction;
use App\Actions\Venue\VenueGetAllAction;
use App\DataTables\EventDataTable;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    public function index(EventDataTable $dataTable): EventDataTable
    {
        return $dataTable->render('event.list');
    }

    public function create(VenueGetAllAction $venueAll): View
    {
        return view('event.form', [
            'event' => null,
            'venues' => $venueAll(),
        ]);
    }

    public function store(EventStoreRequest $request, EventStoreAction $action, UploadImageAction $uploadImage): RedirectResponse
    {
        $action($request, $uploadImage);
        return redirect(route('event.index'));
    }

    public function edit(Event $event, VenueGetAllAction $venueAll): View
    {
        return view('event.form', [
            'event' => $event,
            'venues' => $venueAll(),
        ]);
    }

    public function update(EventUpdateRequest $request, Event $event, EventUpdateAction $eventUpdate, UploadImageAction $uploadImage): RedirectResponse
    {
        $eventUpdate($request, $event, $uploadImage);
        return redirect(route('event.index'));
    }

    public function destroy(Event $event, EventDestroyAction $eventDestroy, DestroyImageAction $destroyImage): RedirectResponse
    {
        $eventDestroy($event, $destroyImage);
        return redirect(route('event.index'));
    }
}
