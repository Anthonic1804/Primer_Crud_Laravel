<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leadin-tight">
            {{__('Crear Projecto')}}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="mb-0">Agregar Proyecto</h1>
                <hr/>

                @if (session()->has('error'))
                <div>
                    {{session('error')}}
                </div>
                @endif

                <p>
                    <a href="{{route('projects')}}" class="btn btn-danger">Cancelar</a>

                    <form action="{{ route('projects/save') }}" method="post" enctype="multipart/form-data">
                        @csrf 
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="NombreProyecto" class="form-control" placeholder="NOMBRE DEL PROYECTO">
                                @error('NombreProyecto')
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="Fuentefondos" class="form-control" placeholder="FUENTE DE FONDOS">
                                @error('Fuentefondos')
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="number" name="MontoPlanificado" class="form-control" placeholder="MONTO PLANIFICADO">
                                @error('MontoPlanificado')
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="number" name="MontoPatrocinado" class="form-control" placeholder="MONTO PATROCINADO">
                                @error('MontoPatrocinado')
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="number" name="MontoFondosPropios" class="form-control" placeholder="FONDOS PROPIOS">
                                @error('MontoFondosPropios')
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </p>
            </div>
        </div>
    </div>
</div>

</x-app-layout>