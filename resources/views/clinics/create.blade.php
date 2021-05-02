<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Agregar cuadro clinico</h1> 
                
                <h2 class="text-xl font-bold">{{$patient->name}}</h2>
                
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>'clinics.guardar']) !!}
 
                    @include('clinics.partials.form')

                    <div class="flex justify-between">
                        <a href="{{route('patients.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                        {!! Form::submit('Agregar Cuadro Clinico', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>