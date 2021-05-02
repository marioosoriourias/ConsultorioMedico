<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Editar paciente</h1>       
                
                @if (session('info'))
                    <div class="card">
                        <div class="card-body bg-green-600">
                             <p class="text-white">{{session('info')}}</p>
                        </div>
                    </div>
                @endif

                <hr class="mt-2 mb-6">
   
                {!! Form::model($patient,['route'=>['patients.update', $patient], 'method' => 'put']) !!}

                    @include('patients.partials.form')

                    <div class="flex justify-between">
                        <a href="{{route('patients.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                        {!! Form::submit('Actualizar paciente', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    </div>
                   
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>