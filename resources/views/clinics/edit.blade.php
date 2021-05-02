<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Editar cuadro clinico</h1> 

                @if (session('info'))
                    <div class="card">
                        <div class="card-body bg-green-600">
                             <p class="text-white">{{session('info')}}</p>
                        </div>
                    </div>
                @endif
                
                <h2 class="text-xl font-bold">{{$clinic->patient->name}}</h2>

                <hr class="mt-2 mb-6">
                

                {!! Form::model($clinic,['route'=>['clinics.actualizar', $clinic],'method' => 'put']) !!}
 
                    @include('clinics.partials.form')

                    <div class="flex justify-between">
                        <a href="{{route('patients.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                        {!! Form::submit('Editar Cuadro Clinico', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>