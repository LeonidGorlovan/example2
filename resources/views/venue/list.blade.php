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
                                <a href="{{ route('venue.create') }}" class="btn btn-outline-primary btn-sm float-end">Create</a>
                            </div>
                        </div>


                    </div>

                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@pushOnce('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpushOnce
