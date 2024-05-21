<!doctype html>
<html lang="es">
    <head>
        <title>Reporte de Projectos - Adolfo Hernández</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <style>

        </style>
    </head>

    <body>
        <h1>Gobierno de El Salvador</h1>
        <h3>Adolfo Antonio Hernández Membreno</h3>
        {{ \Carbon\Carbon::now() }}
        <table border="1">
                        <thead>
                            <tr>
                                <th>Proyectos</th>
                                <th>Fuentes</th>
                                <th>Monto Planificado</th>
                                <th>Monto Patrocinado</th>
                                <th>Fondos Propios</th>
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
                            </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="5">
                                PRODUCTOS NO ENCONTRADOS
                            </td>
                        </tr>
                        @endforelse

                    </table>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
