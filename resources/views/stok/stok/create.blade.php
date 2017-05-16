@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Stok</div>
                    <div class="panel-body">
                        <a href="{{ url('/stok/stok') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/stok/stok', 'class' => 'form-horizontal', 'files' => true]) !!}

                        <div class="form-group {{ $errors->has('penerbit_id') ? 'has-error' : ''}}">
                            {!! Form::label('penerbit_id', 'Penerbit', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                <select class="form-control" name="penerbit_id">
                                    @foreach ($penerbit as $var)
                                        <option value="{{$var->id}}">
                                            {{$var->nama}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('buku_id') ? 'has-error' : ''}}">
                            {!! Form::label('buku_id', 'Buku', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                <select class="form-control" name="buku_id">
                                    @foreach ($buku as $var)
                                        <option value="{{$var->id}}">
                                            {{$var->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('masuk_date') ? 'has-error' : ''}}">
                            {!! Form::label('masuk_date', 'Masuk Date', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::date('masuk_date', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('masuk_date', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div><div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
                            {!! Form::label('jumlah', 'Jumlah', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
