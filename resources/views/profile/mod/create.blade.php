@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cars') }}</div>

                    <div class="card-body">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert-danger alert">{{$error}}</div>
                            @endforeach
                        @endif

                        {!! Form::open(['route' => ['modification.store', ['carId' => $carId]], 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
                            @csrf
                            <div class="form-group">
                                {!! Form::label('title', null, ['class' => 'control-label']) !!}
                                {!! Form::text('title', '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('generation', null, ['class' => 'control-label']) !!}
                                {!! Form::number('generation', '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Начало производства', null, ['class' => 'control-label']) !!}
                                {!! Form::date('from_made', \Carbon\Carbon::now()->addYears(-10)) !!}
                                {!! Form::label('Конец производства', null, ['class' => 'control-label']) !!}
                                {!! Form::date('to_made', \Carbon\Carbon::now()->addYears(10)) !!}
                            </div>
                            {!! Form::submit('Create') !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
