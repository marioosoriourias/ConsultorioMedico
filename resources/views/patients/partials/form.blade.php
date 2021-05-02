<div class="mb-4">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1']) !!}
    @error('name')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>

{!! Form::hidden('id') !!}

<div class="mb-4">
    {!! Form::label('age', 'Edad') !!}
    {!! Form::number('age', null, ['class' => 'form-input block w-full mt-1',  'max'=>'999']) !!}
    @error('age')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('gender', 'Sexo') !!}
    {!! Form::select('gender', ['Masculino' ,'Femenimo'], 'null', ['class' => 'form-input block w-full mt-1']) !!}
    @error('gender')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('phone', 'Telefono') !!}
    {!! Form::number('phone', null, ['class' => 'form-input block w-full mt-1']) !!}
    @error('phone')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('email', 'Correo Electronico') !!}
    {!! Form::Email('email', null, ['class' => 'form-input block w-full mt-1']) !!}
    @error('email')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('address', 'Dirección') !!}
    {!! Form::textarea('address', null, ['class' => 'form-input block w-full mt-1', 'rows' => '3']) !!}
    @error('address')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>