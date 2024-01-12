<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="php/bd_delegation_table/bd_delegation_table_style.css">
    <title>Zadanie zdalne e-MSI</title>
</head>

<body>
    <?php
    require 'php/db_connection.php';
    
    ?>
    <div class="container-fluid kontener d-flex flex-column justify-content-center align-items-center">
        <h3 class="mt-3">Tabela Delegacji BD</h3>
        <div class="table-responsive-md">
            <table class="m-4">
                <tr>
                    <th>Lp.</th>
                    <th>Imię i Nazwisko</th>
                    <th>Data od:</th>
                    <th>Data do:</th>
                    <th>Miejsce wyjazdu:</th>
                    <th>Miejsce przyjazdu:</th>
                </tr>
                <?php
                $sql = 'SELECT id, full_name, from_date, to_date, departure_place, arrival_place from bd_delegation_table';
                $statement = $dbh->query($sql);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    echo
                        '<tr><th>' . $row['id'] . '</th><td>'
                        . $row['full_name'] . '</td><td>'
                        . $row['from_date'] . '</td><td>'
                        . $row['to_date'] . '</td><td>'
                        . $row['departure_place'] . '</td><td>'
                        . $row['arrival_place'] . '</td></tr>';
                }
                ?>
            </table>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>