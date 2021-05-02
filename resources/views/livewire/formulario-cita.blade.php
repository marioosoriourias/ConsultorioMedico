<div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Agregar nueva cita</h1>       
               
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>'appointments.store']) !!}

                <div class="mb-4 relative mx-auto">
                    {!! Form::label('name', 'Nombre') !!}
        
                    {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1 ', 'wire:model'=>"search"]) !!}
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
                    {!! Form::select('hour', $avaliable_hours, count($avaliable_hours) > 0 ? array_values($avaliable_hours)[0] : "No hay citas disponibles" , ['class' => 'form-input block w-full mt-1']) !!}

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
                    {!! Form::submit('Agregar nueva cita', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
