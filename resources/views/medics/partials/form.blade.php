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

    @isset($medic)
        @php
        if ($medic->gender == "Femenino") {
            $v1 = "Femenino";
            $v2 = "Masculino";
        }
        else{
            $v2 = "Femenino";
            $v1 = "Masculino";
        }
        @endphp
    @else
        @php
            $v1 = "Masculino";
            $v2 = "Femenino";
        @endphp
    @endisset


    <select name="gender" id="gender" class="form-input block w-full mt-1">
        <option value="<?php echo $v1 ?>" > {{$v1}}</option>
        <option value="<?php echo $v2 ?>" > {{$v2}}</option>
    </select>

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