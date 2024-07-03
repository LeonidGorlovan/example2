@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                {{ __('Venue') }}
                            </div>
                            <div class="col">
                                <a href="{{ route('venue.index') }}" class="btn btn-outline-primary btn-sm float-end">Return</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(!empty($venue))
                            <form method="post" action="{{ route('venue.update', ['venue' => $venue->id]) }}">
                                @method('PUT')
                        @else
                            <form method="post" action="{{ route('venue.store') }}">
                        @endif
                            @csrf
                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       id="nameInput" value="{{ old('name', data_get($venue, 'name')) }}">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success" style="width: 100%">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
