@extends('layouts.admin')

@include('airplane_models.modal')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-fighter-jet"></i> Airplane Models</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('airplane_models.index') }}">Airplane Models</a></li>
    </ul>
</div>

<div class="container">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">
                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="window.location='{{ route('airplane_models.create') }}'">
                    <i class="fa fa-plus" aria-hidden="true"></i>Add
                </button>
            </h3>
            <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Model Name</th>
                        <th scope="col">Economy class seats</th>
                        <th scope="col">Business class seats</th>
                        <th scope="col">First class seats</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($collection as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <th scope="col">{{ $data->name }}</th>
                        <th scope="col">{{ $data->number_of_economy_class_seats }}</th>
                        <th scope="col">{{ $data->number_of_businessmen_seats }}</th>
                        <th scope="col">{{ $data->number_of_first_class_seats }}</th>
                        <th scope="col">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a
                                        href="{{ route('airplane_models.show', $data->id) }}"
                                        class="btn btn-primary mr-1"
                                        role="button"><i class="fa fa-eye"></i> Show
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a
                                        href="{{ route('airplane_models.edit', $data->id) }}"
                                        class="btn btn-warning mr-1"
                                        role="button"><i class="fa fa-pencil"></i> Edit
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('airplane_models.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </th>
                    </tr>
                @endforeach
                </tbody>
                </table>
                {{ $collection->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

