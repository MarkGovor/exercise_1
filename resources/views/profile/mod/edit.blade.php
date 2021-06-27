@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $carModification->title }}</div>

                    <div class="card-body">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert-danger alert">{{$error}}</div>
                            @endforeach
                        @endif

                        {!! Form::open(['route' => ['modification.update', ['modification' => $carModification->id, 'carId' => 12]], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
                           @csrf
                            <div class="form-group">
                                {!! Form::label('title', null, ['class' => 'control-label']) !!}
                                {!! Form::text('title',  $carModification->title, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('generation', null, ['class' => 'control-label']) !!}
                                {!! Form::number('generation', $carModification->generation, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Начало производства', null, ['class' => 'control-label']) !!}
                                {!! Form::date('from_made', $carModification->from_made) !!}
                                {!! Form::label('Конец производства', null, ['class' => 'control-label']) !!}
                                {!! Form::date('to_made', $carModification->to_made) !!}
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
