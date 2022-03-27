<div>
    <!-- component -->
    <h1 class="text-4xl text-center mt-10">Información del médico</h1>
    <div class="py-4 px-20 bg-white shadow-lg rounded-lg m-10">
        <div class="flex justify-center md:justify-end -mt-16">
        <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
        </div>
        <div>
            <h2 class="text-gray-800 text-3xl font-semibold">{{$medic->name}}</h2>
            <p class="text-lg mt-2 text-gray-600"><strong>Edad: </strong> {{$medic->age}}</p>
            <p class="text-lg mt-2 text-gray-600"><strong>Sexo: </strong> {{$medic->gender}}</p>
            <p class="text-lg mt-2 text-gray-600"><strong>Telefono: </strong> {{$medic->phone}}</p>
            <p class="text-lg mt-2 text-gray-600"><strong>Correo: </strong>{{$medic->email}}</p>
            <p class="text-lg mt-2 text-gray-600"><strong>Direccion: </strong>{{$medic->address}}</p>
        </div>
    </div>

    <div class="container grid grid-cols-3 gap-4 py-4 px-20 bg-white shadow-lg rounded-lg m-10">
        <div>
            <h2 class="text-gray-800 text-3xl font-semibold"><a href="{{route('medic.appointments', $medic)}}"><img class="w-14  h-14 inline-block" src="{{ asset('/img/calender.png') }}" alt="">Citas</a></h2>
        </div>
        <div>
            <h2 class="text-gray-800 text-3xl font-semibold"><a href="{{route('medic.consultations', $medic)}}"><img class="w-12 h-12 inline-block" src="{{ asset('/img/consultation.png') }}" alt="">Consultas</a></h2>
        </div>
    </div>

    </div>
