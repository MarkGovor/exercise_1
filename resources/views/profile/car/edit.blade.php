@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $car->title }}</div>

                    <div class="card-body">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert-danger alert">{{$error}}</div>
                            @endforeach
                        @endif

                        {!! Form::open(['route' => ['cars.update', $car->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
                            @csrf
                            <div class="form-group">
                                {!! Form::label('title', null, ['class' => 'control-label']) !!}
                                {!! Form::text('title',  $car->title, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group my-2">
                                {!! Form::label('Image', null, ['class' => 'control-label']) !!}
                                {!! Form::file('image') !!}
                                <hr>
                                @if($car->image)
                                    <img src="{{ Storage::url($car->image)}}" alt="{{ $car->title }}" width="100">
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('Начало производства', null, ['class' => 'control-label']) !!}
                                {!! Form::date('from_made', $car->from_made) !!}
                                {!! Form::label('Конец производства', null, ['class' => 'control-label']) !!}
                                {!! Form::date('to_made', $car->to_made) !!}
                            </div>
                            {!! Form::submit('Update') !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
