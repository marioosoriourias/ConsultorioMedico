<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Editar medico</h1>       
                
                @if (session('info'))
                    <div class="card">
                        <div class="card-body bg-green-600">
                             <p class="text-white">{{session('info')}}</p>
                        </div>
                    </div>
                @endif

                <hr class="mt-2 mb-6">
   
                {!! Form::model($medic,['route'=>['medics.update', $medic], 'method' => 'put']) !!}

                    @include('medics.partials.form')

                    <div class="flex justify-between">
                        <a href="{{route('medics.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                        {!! Form::submit('Actualizar medico', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    </div>
                   
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>