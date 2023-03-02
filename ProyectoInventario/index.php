<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Bodega</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
</head>

<body>
    <main>
        <div class="container py-4 text-center">
            <h1 class="text-light bg-dark">INVENTARIO</h1>
        </div>
        <br>
        <div class="row g-4">


            <div class="col-auto">
                <label for="num_registro" class="col-form-label">Mostrar: </label>
            </div>
            <div class="col-auto">
                <select name="num_registro" id="num_registro" class="form-select">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

            <div class="col-auto">
                <label for="num_registro" class="col-form-label">Registros: </label>
            </div>

            <div class="col-5"></div>

            <div class="col-auto">
                <label for="campo" class="col-form-label">Buscar: </label>
            </div>
            <div class="col-auto">
                <input type="text" name="campo" id="campo" class="form-control">
            </div>
        </div>

        <br>
        <p></p>
        <br>

        <div class="row py-4">
            <div class="col">
                <table class="table table-striped table-dark">
                    <thead>
                        <th class="sort asc">Unidad</th>
                        <th class="sort asc">Original</th>
                        <th class="sort asc">Tipo Unidad</th>
                        <th class="sort asc">Tipo</th>
                        <th class="sort asc">Destino</th>
                        <th class="sort asc">Nota</th>
                        <th class="sort asc">Cliente</th>
                        <th class="sort asc">Deposito</th>
                        <th class="sort asc">Estado</th>
                        <th class="sort asc">Para Venta</th>
                        <th class="sort asc">Nota Estado</th>
                        <th class="sort asc">Fecha fabric.</th>
                        <th class="sort asc">N Tramite</th>
                        <th class="sort asc">Fecha Limite</th>
                        <th class="sort asc">Fecha Compra</th>
                        <th class="sort asc">Proovedor</th>
                        <th class="sort asc">Fact Compra</th>
                        <th class="sort asc">Moneda Compra</th>
                        <th class="sort asc">Valor Compra</th>
                        <th class="sort asc">Valor Fab</th>
                        <th class="sort asc">Marca Maquina</th>
                        <th class="sort asc">Modelo Maquina</th>
                        <th class="sort asc">Familia</th>
                        <th class="sort asc">Categoria</th>
                        <th class="sort asc">Deposito Agrupado</th>
                        <th class="sort asc"></th>
                        <th class="sort asc"></th>
                    </thead>

                    <tbody id="content"></tbody>
                </table>
            </div>
        </div>


    </main>
    <script>
        /*Llamand la funcion getData */
        getData()

        /*Escucha un evento keyup en el campo de entrada y luego llama a la funcion getData */
        document.getElementById("campo").addEventListener("keyup", getData)

        document.getElementById("num_registro").addEventListener("change", getData)


        /*Peticion AJAX */
        function getData() {
            let input = document.getElementById("campo").value
            let num_registros = document.getElementById("num_registro").value

            let content = document.getElementById("content")
            let url = "load.php"
            let formaData = new FormData()
            formaData.append('campo', input)
            formaData.append('registros', num_registros)

            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
        }
    </script>
</body>

</html>