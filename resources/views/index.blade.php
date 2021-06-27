@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">Просто вывод машин</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Машина</th>
                                <th>Фото</th>
                                <th>Дата производства</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cars as $car)
                                <tr>
                                    <td><a href="{{route('carView', ['carId' => $car->id])}}">{{$car->title}}</a></td>
                                    <td><img src="{{ Storage::url($car->image)}}" alt="{{ $car->title }}" width="100"></td>
                                    <td> {{$car->from_made}} - {{$car->to_made}}</td>
                                </tr>

                                @foreach($car->modifications as $mod)
                                    <tr class="sub-current">
                                        <td colspan="3">
                                            <table class="table-equipment">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <p class="client">{{ $mod->title }}</p>
                                                        <ul>
                                                            <li>Дата производства: {{$mod->from_made}} - {{$mod->to_made}}</li>
                                                            <li>Поколение: {{$mod->generation}}</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="2">Пустота..</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">последние поколения</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Модификация</th>
                                <th>Родительская машина</th>
                                <th>Фото</th>
                                <th>Поколение</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($mods as $mod)
                                <tr>
                                    <td>{{$mod->title}}</td>
                                    <td>{{$mod->car->title}}</td>
                                    <td> {{$mod->from_made}} - {{$mod->to_made}}</td>
                                    <td>{{$mod->generation}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Пустота..</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
