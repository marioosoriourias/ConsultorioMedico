<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Actualizar consulta</h1>  
                
                                
                @if (session('info'))
                    <div class="card">
                        <div class="card-body bg-green-600">
                             <p class="text-white">{{session('info')}}</p>
                        </div>
                    </div>
                @endif

                
                {!! Form::model($consultation,['route'=> ['consultations.update', $consultation], 'method'=>'put']) !!}
                <div class="mb-4">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', $consultation->appointment->patient->name, ['class' => 'form-input block w-full mt-1', 'disabled']) !!}

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
                    {!! Form::submit('Actualizar consulta', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}

                <hr class="mt-2 mb-6">
            </div>
        </div>
    </div>
</x-app-layout>