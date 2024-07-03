@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                {{ __('Event') }}
                            </div>
                            <div class="col">
                                <a href="{{ route('event.index') }}" class="btn btn-outline-primary btn-sm float-end">Return</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(!empty($event))
                            <form method="post" action="{{ route('event.update', ['event' => $event->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                        @else
                            <form method="post" action="{{ route('event.store') }}" enctype="multipart/form-data">
                        @endif
                            @csrf
                            <div class="mb-3">
                                <label for="venueSelect" class="form-label">Venue</label>
                                <select name="venue" class="form-select" aria-label="venueSelect" id="venueSelect">
                                    @foreach($venues as $venue)
                                        @if($venue->id ===  old('venue', data_get($event, 'venue_id')))
                                            <option selected value="{{ $venue->id }}">
                                        @else
                                            <option value="{{ $venue->id }}">
                                        @endif

                                        {{ $venue->name }}</option>
                                    @endforeach
                                </select>

                                @error('venue')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       id="nameInput" value="{{ old('name', data_get($event, 'name')) }}">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="posterInput" class="form-label">Poster</label>
                                <input type="text" name="poster" class="form-control @error('poster') is-invalid @enderror"
                                       id="posterInput" value="{{ old('poster', data_get($event, 'poster')) }}">
                                @error('poster')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="eventDateInput" class="form-label">Event Date</label>
                                <input type="text" name="event_date" class="form-control @error('event_date') is-invalid @enderror"
                                       id="eventDateInput" value="{{ old('event_date', data_get($event, 'event_date')) }}">
                                @error('event_date')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control"
                                       id="formFile">
                                @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <img src="{{ asset('images/' . data_get($event, 'image')) }}"
                                     alt="Image of {{ data_get($event, 'name') }}"
                                     style="width: 300px; height: auto">
                            </div>
                            <button type="submit" class="btn btn-success" style="width: 100%">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@pushOnce('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
        $('#eventDateInput').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'yyyy-mm-dd'
        });
    </script>
@endpushOnce
