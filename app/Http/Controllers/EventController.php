<?php

namespace App\Http\Controllers;

use App\Actions\Venue\VenueGetAllAction;
use App\DataTables\EventDataTable;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use App\Services\EventService;
use App\Services\ImageRequestService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    private EventService $eventService;
    private ImageRequestService $imageRequestService;

    public function __construct(EventService $eventService, ImageRequestService $imageRequestService)
    {
        $this->eventService = $eventService;
        $this->imageRequestService = $imageRequestService;
    }

    public function index(EventDataTable $dataTable)
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

    public function store(EventStoreRequest $request): RedirectResponse
    {
        $nameImg = $this->imageRequestService->upload($request->image);
        $this->eventService->store($request->validated(), $nameImg);
        return redirect(route('event.index'));
    }

    public function edit(Event $event, VenueGetAllAction $venueAll): View
    {
        return view('event.form', [
            'event' => $event,
            'venues' => $venueAll(),
        ]);
    }

    public function update(EventUpdateRequest $request, int $id): RedirectResponse
    {
        $nameImg = $this->imageRequestService->upload($request->image);
        $this->eventService->update($request->validated(), $id, $nameImg);
        return redirect(route('event.index'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $event = $this->eventService->one($id);
        $this->imageRequestService->delete($event->image);
        $this->eventService->destroy($id);
        return redirect(route('event.index'));
    }
}
