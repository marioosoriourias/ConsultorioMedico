<x-app-layout>
    <div>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-2xl font-bold text-center">Editar cita</h1>       
                
                    @if (session('info'))
                    <div class="card">
                        <div class="card-body bg-green-600">
                             <p class="text-white">{{session('info')}}</p>
                        </div>
                    </div>
                    @endif


                    <hr class="mt-2 mb-6">
    
                    {!! Form::model($appointment, ['route'=>['appointments.update', $appointment], 'method' => 'put']) !!}
                    <div class="mb-4 relative mx-auto">
                        {!! Form::label('name', 'Nombre') !!}
            
                        {!! Form::text('name', $appointment->patient->name, ['class' => 'form-input block w-full mt-1 ', 'readonly', 'disabled']) !!}
                        {{-- {!! Form::hidden('patient_id', $this->patient_id) !!} --}}
    
                        @error('patient_id')
                            <span class="text-red-600">{{$message}}</span>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        {!! Form::label('date', 'Fecha') !!}
                        {!! Form::date('date', null, ['class' => 'form-input block w-full mt-1', 'min'=>$current_date]) !!}
                        @error('date')
                            <span class="text-red-600">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        {!! Form::label('hour', 'Hora') !!}
                        {!! Form::time('hour',  null, ['class' => 'form-input block w-full mt-1', 'step'=>"600"]) !!}
                        @error('hour')
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
    
                    <div class="flex justify-between">
                        <a href="{{route('appointments.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                        {!! Form::submit('Editar cita', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    </div>
    
                    {!! Form::close() !!}
    
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>