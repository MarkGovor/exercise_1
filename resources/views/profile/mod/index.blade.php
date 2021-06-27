@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifications') }}</div>

                <div class="card-body">
                    <div class="pb-3">
                        <a href="{{route('modification.create', ['carId' => $carId])}}" class="btn btn-success">Create</a>
                        <a href="{{route('cars.index')}}" class="btn btn-success">Back to cars</a>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th width="80px">@sortablelink('id')</th>
                            <th>@sortablelink('title')</th>
                            <th>@sortablelink('from_made')</th>
                            <th>@sortablelink('to_made')</th>
                            <th>@sortablelink('generation')</th>
                            <th></th>
                        </tr>
                        @forelse($mods as $mod)
                            <tr>
                                <td>{{ $mod->id }}</td>
                                <td>{{ $mod->title }}</td>
                                <td>{{ $mod->from_made }}</td>
                                <td>{{ $mod->to_made }}</td>
                                <td>{{ $mod->generation }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('modification.edit', ['modification' => $mod->id, 'carId' => $mod->car_id]) }}"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline-block" action="{{ route('modification.destroy', ['modification' => $mod->id, 'carId' => $mod->car_id]) }}" method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button class="btn p-0" type="submit"><a href=""><i class="fas fa-trash"></i></a></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6">Пусто</td>
                        @endforelse
                    </table>
                    {!! $mods->links("pagination::bootstrap-4") !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
