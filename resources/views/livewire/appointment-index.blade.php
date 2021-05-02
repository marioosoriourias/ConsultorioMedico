<div>
    <div class="container">
        <h1 class="text-3xl text-center pb-8 pt-2">Citas</h1>
         
        @if (session('info'))
            <div class="card">
                <div class="card-body bg-green-600">
                    <p class="text-white">{{session('info')}}</p>
                </div>
            </div>
        @endif

        <x-table-responsive>

           
            <div class="px-6 py-4 flex ">
                <input wire:keydown="limpiar_page" wire:model="search" class="flex-1 form-group h-10 w-full border-gray-300  border-2">
                @if (!$patients->count())
                  
                @else
                    <a href="{{route('appointments.create')}}" class=" btn btn-danger ml-2 ">Agregar nueva cita</a>
                @endif
                
               
            </div>

            @if($appointments->count())    
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Paciente
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Dia
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Hora
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Editar Cita</p>
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Realizar consulta</p>
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Eliminar Cita</p>
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-base font-medium text-gray-900">
                                            {{$appointment->name}}
                                        </div>
                                    </div>
                                    </div>
                                </td>
                     
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$appointment->date}}</div>                   
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                   
                                    <div class="text-sm text-gray-900"> {{substr($appointment->hour,0,5)}}</div>      
                                </td>                                                    


                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{route('appointments.edit', $appointment)}}" class="text-blue-500 hover:text-blue-700 " ><i class="fas fa-calendar-day text-2xl"></i></a>
                                </td> 

                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{route('consultations.consult', $appointment)}}" class="text-green-500 hover:text-green-700 " ><i class="fas fa-clipboard-check text-2xl"></i></a>
                                </td> 
                              
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form action="{{route('appointments.destroy', $appointment)}}"  method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="text-red-500 hover:text-red-700 "  type="submit"><i class="fas fa-calendar-times text-2xl"></i></button>
                                    </form>
                                    <a ></a>
                                </td>
                            </tr>                 
                        @endforeach
                    </tbody>
                </table>

                {{-- <div class="mt-2">
                    {{$patients->links()}}
                </div> --}}
            
            @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente...
            </div>
            @endif
        </x-table-responsive>

        <div class="my-3">
            {{$appointments->links()}}
        </div>
    </div>
</div>
