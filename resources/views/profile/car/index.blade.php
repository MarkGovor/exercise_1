@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cars') }}</div>

                <div class="card-body">
                    <div class="pb-3">
                        <a href="{{route('cars.create')}}" class="btn btn-success">Create</a>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th width="80px">@sortablelink('id')</th>
                            <th>Image</th>
                            <th>@sortablelink('title')</th>
                            <th>@sortablelink('from_made')</th>
                            <th>@sortablelink('to_made')</th>
                            <th></th>
                        </tr>
                        @forelse($cars as $key => $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td><img src="{{ Storage::url($car->image)}}" alt="{{ $car->title }}" width="100"></td>
                                <td>{{ $car->title }}</td>
                                <td>{{ $car->from_made }}</td>
                                <td>{{ $car->to_made }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('modification.index', ['carId' => $car->id]) }}"><i class="fas fa-car"></i></a>
                                        <a href="{{ route('cars.edit', $car->id) }}"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline-block" action="{{ route('cars.destroy', $car->id) }}" method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button class="btn p-0" type="submit"><a href=""><i class="fas fa-trash"></i></a> </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6">Пусто</td>
                        @endforelse
                    </table>
                    {!! $cars->links("pagination::bootstrap-4") !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
