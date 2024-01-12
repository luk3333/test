<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="php/workers_table/workers_table_style.css">
    <title>Zadanie zdalne e-MSI</title>
</head>

<body>
    <?php
    require 'php/db_connection.php';
    $sql = 'SELECT id, first_name, last_name, position, employment_date, number_days_off from workers_table';
    $statement = $dbh->query($sql);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container-fluid kontener d-flex flex-column justify-content-center align-items-center">
        <h3 class="mt-3">Tabela Pracowników</h3>
        <div class="table-responsive-md">
            <table class="m-4">
                <tr>
                    <th>Lp.</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Stanowisko</th>
                    <th>Data zatrudnienia</th>
                    <th>Ilość dni urlopowych</th>
                </tr>
                <?php
                foreach ($result as $row) {
                    echo
                        '<tr><th>' . $row['id'] . '</th><td>'
                        . $row['first_name'] . '</td><td>'
                        . $row['last_name'] . '</td><td>'
                        . $row['position'] . '</td><td>'
                        . $row['employment_date'] . '</td><td>'
                        . $row['number_days_off'] . '</td></tr>';
                }
                ?>
            </table>
        </div>
        <div>
            <div class="color_picker pb-4">
                <div>
                    <input type="color" id="first_row" name="first_row" value="#e66465" />
                    <label for="first_row">Wybierz kolor 1-szego wiersza</label>
                </div>
                <div>
                    <input type="color" id="second_row" name="second_row" value="#e66465" />
                    <label for="first_row">Wybierz kolor 2-giego wiersza</label>
                </div>
            </div>
        </div>
    </div>

    <script>

        let colorPicker_firstrow;
        let colorPicker_secondrow;
        const defaultColor = "#000000";
        window.addEventListener("load", startup, false);

        function startup() {
            colorPicker_firstrow = document.querySelector("#first_row");
            colorPicker_secondrow = document.querySelector("#second_row");
            colorPicker_firstrow.value = defaultColor;
            colorPicker_secondrow.value = defaultColor;
            colorPicker_firstrow.addEventListener("input", updateFirstfirst_row, false);
            colorPicker_secondrow.addEventListener("input", updateFirstsecond_row, false);
            colorPicker_firstrow.addEventListener("change", updateAllfirst_row, false);
            colorPicker_secondrow.addEventListener("change", updateAllsecond_row, false);
            colorPicker_firstrow.select();
            colorPicker_secondrow.select();
        }

        function updateFirstfirst_row(event) {
            const tr = document.querySelector("tr:nth-child(odd)");
            if (tr) {
                tr.style.background = event.target.value;
            }
        }
        function updateAllfirst_row(event) {
            document.querySelectorAll("tr:nth-child(odd)").forEach((tr) => {
                tr.style.background = event.target.value;
            });
        }
        function updateFirstsecond_row(event) {
            const tr = document.querySelector("tr:nth-child(even)");
            if (tr) {
                tr.style.background = event.target.value;
            }
        }
        function updateAllsecond_row(event) {
            document.querySelectorAll("tr:nth-child(even)").forEach((tr) => {
                tr.style.background = event.target.value;
            });
        }

    </script>



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