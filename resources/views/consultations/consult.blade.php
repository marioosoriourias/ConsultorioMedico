<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Realizar consulta</h1>       
                
                {!! Form::open(['route'=>'consultations.store']) !!}
                
                <div class="mb-4">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', $appointment->patient->name, ['class' => 'form-input block w-full mt-1', 'disabled']) !!}
                    {!! Form::hidden('appointment_id', $appointment->id) !!}
                    @error('name')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="mb-4">
                    {!! Form::label('symptoms', 'Sintomas') !!}
                    {!! Form::textarea('symptoms', null, ['class' => 'form-input block w-full mt-1', 'rows' => '3']) !!}
                    @error('symptoms')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('diagnostic', 'Diagnostico') !!}
                    {!! Form::textarea('diagnostic', null, ['class' => 'form-input block w-full mt-1', 'rows' => '3']) !!}
                    @error('diagnostic')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('treatment', 'Tratamiento') !!}
                    {!! Form::textarea('treatment', null, ['class' => 'form-input block w-full mt-1', 'rows' => '3']) !!}
                    @error('treatment')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('observations', 'Observaciones') !!}
                    {!! Form::textarea('observations', null, ['class' => 'form-input block w-full mt-1', 'rows' => '3']) !!}
                    @error('observations')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    {!! Form::submit('Consultar', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}

                <hr class="mt-2 mb-6">
            </div>
        </div>
    </div>
</x-app-layout>