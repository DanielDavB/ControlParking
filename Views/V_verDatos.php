<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista De Registros</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables CSS CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Registro de Vehículos</h1>
        
        <form action="./Controller/C_guardarDatos.php" method="POST">
            <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" placeholder="Ingrese el número de placa" required>
            </div>
            <div class="form-group">
                <label for="entrada">Entrada</label>
                <input type="datetime-local" class="form-control" id="entrada" name="entrada" required>
            </div>
            <div class="form-group">
                <label for="salida">Salida</label>
                <input type="datetime-local" class="form-control" id="salida" name="salida" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo">
                    <option value="residente">Residente</option>
                    <option value="no residente">No Residente</option>
                    <option value="oficial">Oficial</option>
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="monto">Monto</label>
                <input type="text" class="form-control" id="monto" name="monto" placeholder="Aquí se desplegará el monto total" disabled>
            </div> -->
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        
        <table id="registroTable" class="table table-striped mt-5" >
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Tiempo de Estacionado (min)</th>
                    <th>Tipo</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($agenda as $reg) {
                        echo "<tr>";
                        echo "<td>". $reg['num_placa'] ."</td>";
                        echo "<td>". $reg['entrada'] ."</td>";
                        echo "<td>". $reg['salida'] ."</td>";
                        echo "<td>". $reg['tiempo'] ."</td>";
                        echo "<td>". $reg['tipo'] ."</td>";
                        echo "<td>". $reg['monto'] ."</td>";
                        echo "<td><a href='./Controller/C_consultarDatos.php?placa=".$reg['num_placa']."' class='btn btn-warning'>Editar</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS CDN -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
					
    <script>
        $(document).ready(function() {
            const tipoSelect = $('#tipo');
            const montoInput = $('#monto');
            
            tipoSelect.on('change', function() {
                if (tipoSelect.val() === 'oficial') {
                    montoInput.val('0'); // Set the value to 0
                } else {
                    montoInput.val('');
                    montoInput.prop('disabled', false);
                }
            });

            $('#registroTable').DataTable({
                dom: 'frtipB', //Order of the elements (filer, element, table, table info, pagination, buttons)
                buttons: [
                    'copy', 'excel', 'pdf' //Which buttons we want to use
                ],
                "order": [[1, "desc"]],
                "columnDefs": [
                    {
                        "targets": [1, 2],
                        "render": function(data, type, row) {
                            if (type === 'display' || type === 'filter') {
                                const date = new Date(data);
                                return date.toLocaleDateString() + ' ' + date.toLocaleTimeString();
                            }
                            return data;
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>
