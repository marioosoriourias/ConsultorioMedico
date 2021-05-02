<div class="mb-4">
    {!! Form::label('weight', 'Peso') !!}
    {!! Form::number('weight', null, ['class' => 'form-input block w-full mt-1', 'step'=>'any', 'min'=>'1', 'max'=>'999', 'maxlength'=>'4']) !!}
    @error('weight')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>

@isset($patient)
    {!! Form::hidden('patient_id', $patient->id) !!}   
@endisset

<div class="mb-4">
    {!! Form::label('height', 'Estatura') !!}
    {!! Form::number('height', null, ['class' => 'form-input block w-full mt-1', 'step'=>'any', 'min'=>'1', 'max'=>'999', 'maxlength'=>'4']) !!}

    @error('height')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>


<div class="mb-4">
    {!! Form::label('blood_type_id', 'Grupo sanguineo') !!}
    {!! Form::select('blood_type_id', $bloodtype, null, ['class' => 'form-input block w-full mt-1']) !!}
    @error('bloodtype')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>
              
<div class="mb-4">
    {!! Form::label('medicaments', 'Medicamento actual') !!}
    {!! Form::textarea('medicaments', null, ['class' => 'form-input block w-full mt-1', 'rows' => '3']) !!}
    @error('medicament')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('diseases', 'Enfermedades') !!}
    {!! Form::textarea('diseases', null, ['class' => 'form-input block w-full mt-1', 'rows' => '3']) !!}
    @error('diseases')
        <span class="text-red-600">{{$message}}</span>
    @enderror
</div>