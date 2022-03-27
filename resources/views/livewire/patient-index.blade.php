<div>
    <div class="container">
        <h1 class="text-3xl text-center pb-8 pt-2">Pacientes</h1>
         
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
                <a href="{{route('patients.create')}}" class="btn btn-danger ml-2">Agregar nuevo paciente</a>
            </div>

            @if($patients->count())    
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p class="cursor-pointer" wire:click="cambiarValor('name')">Nombre</p> 
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p class="cursor-pointer" wire:click="cambiarValor('age')">Edad</p> 
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p class="cursor-pointer" wire:click="cambiarValor('gender')">Genero</p> 
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p class="cursor-pointer" wire:click="cambiarValor('email')">Email</p> 
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Cuadro clinico</p>
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Historial medico</p>
                        </th>
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Editar Paciente</p>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Eliminar paciente</p>
                        </th>
                    </tr>
                    </thead>
                   
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($patients as $patient)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-base font-medium text-gray-900">
                                            {{$patient->name}}

                                        </div>
                                    </div>
                                    </div>
                                </td>
                              

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$patient->age}}</div>                   
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$patient->gender}}</div>                   
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{$patient->email}}</div>      
                                </td>                                                    

                                @if ($patient->clinic)
                                    <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{route('clinics.editar', $patient)}}" class="text-blue-500 hover:text-blue-700 " ><i class="fas fa-notes-medical text-2xl"></i></a>
                                    </td> 
                                @else
                                    <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{route('clinics.crear', $patient)}}" class="text-green-500 hover:text-green-700 " ><i class="fas fa-notes-medical text-2xl"></i></a>
                                    </td> 
                                @endif
                                
                                @if ($patient->consultations->count() > 0)
                                    <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{route('medicalhistory', $patient)}}" class="text-green-500 hover:text-green-700 " ><i class="fas fa-book-medical text-2xl"></i></a>
                                    </td>                                   
                                @else
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a class="text-gray-500 cursor-pointer" ><i class="fas fa-book-medical text-2xl"></i></a>
                                </td>
                                @endif
                                

                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{route('patients.edit', $patient)}}" class="text-blue-500 hover:text-blue-700 " ><i class="fas fa-user-edit text-2xl"></i></a>
                                </td>

                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form action="{{route('patients.destroy', $patient)}}"  method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="text-red-500 hover:text-red-700 "  type="submit"><i class="fas fa-user-times text-2xl"></i></button>
                                    </form>
                                    <a ></a>
                                </td>
                            </tr>                 
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-2">
                    {{$patients->links()}}
                </div>
            
            @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente...
            </div>
            @endif
        </x-table-responsive>
    </div>
</div>
