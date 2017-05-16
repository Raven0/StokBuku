<div class="form-group {{ $errors->has('penerbit_id') ? 'has-error' : ''}}">
    {!! Form::label('penerbit_id', 'Penerbit Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('penerbit_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('penerbit_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('buku_id') ? 'has-error' : ''}}">
    {!! Form::label('buku_id', 'Buku Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('buku_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('buku_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('masuk_date') ? 'has-error' : ''}}">
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
