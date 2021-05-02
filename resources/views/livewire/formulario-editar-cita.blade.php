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
    
                {{substr($appointment->hour,0,5)}}
                <hr class="mt-2 mb-6">

                {!! Form::model($appointment, ['route'=>['appointments.update', $appointment], 'method' => 'put']) !!}

                <div class="mb-4 relative mx-auto">
                    {!! Form::label('name', 'Nombre') !!}
        
                    {!! Form::text('name', $appointment->patient->name, ['class' => 'form-input block w-full mt-1 ', 'disabled']) !!}
                    {!! Form::hidden('patient_id', $this->patient_id) !!}
                   
                    @if ($search)
                    <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden">
                        @forelse ($this->results as $result)
                            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                                @if ($result->name == $this->search )
                                
                                @else
                                    <p class="cursor-pointer"  wire:click="patient('{{$result->name}}', '{{$result->id}}')">{{$result->name}}</p>
                                @endif
                               
                            </li>
                        @empty
                            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                                No hay ninguna coincidencia :(
                            </li>
                        @endforelse
                    </ul>
                    @endif

                    @error('patient_id')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('date', 'Fecha') !!}

                    {!! Form::date('date', $this->selected_date, ['class' => 'form-input block w-full mt-1', 'min'=>$this->current_date, 'wire:model'=>"selected_date"]) !!}
                    
                    
                    @error('date')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="mb-4">
                    {!! Form::label('hour', 'Hora') !!}
                    {{-- {!! Form::time('hour',  '09:00', ['class' => 'form-input block w-full mt-1', 'step'=>"900", 'min'=>"09:00", 'max'=>"19:00"]) !!} --}}
                    {!! Form::select('hour', $avaliable_hours, substr($appointment->hour, 0, 5), ['class' => 'form-input block w-full mt-1']) !!}

                    {{-- {!!Form::select('size',$avaliable_hours , null, ['class' => 'form-input block w-full mt-1', 'placeholder' => 'Seleccione una hora']) !!} --}}
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
                    {!! Form::submit('Editar Cita', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
