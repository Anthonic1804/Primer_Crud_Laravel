<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">LISTADO DE PROYECTOS</h1>
                        <div class="btn-group" role="group" aria-label="Proyectos">
                            <a href="{{route('projects/pdf')}}" type="button" class="btn btn-secondary">
                                REPORTE PDF
                            </a>
                            <a href="{{route('projects/create')}}" type="button" class="btn btn-primary">
                                NUEVO
                            </a>
                        </div>
                    </div>

                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>NOMBRE DEL PROYECTO</th>
                                <th>FUENTE DE LOS FONDOS</th>
                                <th>MONTO PLANIFICADO</th>
                                <th>MONTO PATROCINADO</th>
                                <th>FONDOS PROPIOS</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>

                        @forelse($projects as $project)
                            <tr>
                                <td class="align-middle">
                                    {{$project->NombreProyecto}}
                                </td>
                                <td class="align-middle">
                                    {{$project->Fuentefondos}}
                                </td>
                                <td class="align-middle">
                                    {{$project->MontoPlanificado}}
                                </td>
                                <td class="align-middle">
                                    {{$project->MontoPatrocinado}}
                                </td>
                                <td class="align-middle">
                                    {{$project->MontoFondosPropios}}
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Proyectos">
                                        <a href="{{ route('projects/edit', ['id'=>$project->id]) }}" type="button" class="btn btn-warning">
                                            Editar
                                        </a>
                                        <a href="{{ route('projects/delete', ['id'=>$project->id]) }}" type="button" class="btn btn-danger">
                                            Eliminar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="5">
                                PRODUCTOS NO ENCONTRADOS
                            </td>
                        </tr>
                        @endforelse

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>