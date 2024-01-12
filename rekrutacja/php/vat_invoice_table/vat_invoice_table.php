<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="php/vat_invoice_table/vat_invoice_table_style.css">
    <title>Zadanie zdalne e-MSI</title>
</head>

<body>
    <?php
    require 'php/db_connection.php';
    ?>
    <div class="container-fluid kontener d-flex flex-column justify-content-center align-items-center">
        <h3 class="mt-3">Tabela Faktur VAT</h3>
        <div class="table-responsive-md">
            <table class="m-4">
                <tr>
                    <th>Lp.</th>
                    <th>Opis</th>
                    <th>MPK</th>
                    <th>Kwota Netto</th>
                    <th>Ilość</th>
                    <th>VAT[%]</th>
                    <th>Kwota Brutto</th>
                    <th>Wartość Netto</th>
                    <th>Wartość Brutto</th>
                </tr>
                <?php
                $sql = 'SELECT * from vat_invoice_table';
                $statement = $dbh->query($sql);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    echo
                        '<tr><th>' . $row['id'] . '</th><td>'
                        . $row['description'] . '</td><td>'
                        . $row['MPK'] . '</td><td class="net_amount">'
                        . $row['net_amount'] . '</td><td>'
                        . $row['quantity'] . '</td><td>'
                        . $row['VAT'] . '</td><td>'
                        . $row['gross_amount'] . '</td><td>'
                        . $row['net_value'] . '</td><td>'
                        . $row['gross_value'] . '</td>'
                        . '<td><a href="#" onclick="editRow(' . $row['id'] . ')">Edytuj</a></td></tr>';
                }
                ?>
            </table>
        </div>
        <button class="mb-3" onclick="aboveNetValue()">Powyżej 1000,00 zł Netto</button>
        <div id="rowEdit">
                <?php
                if (isset($_POST['net_amount']) && isset($_POST['quantity']) && isset($_POST['VAT']) && isset($_POST['id'])) {
                    $sql = 'UPDATE vat_invoice_table set net_amount=' . $_POST['net_amount'] 
                    . ', quantity=' . $_POST['quantity'] 
                    . ', VAT="' . $_POST['VAT'] 
                    . '" where id=' . $_POST['id'];
                    $statement = $dbh->query($sql);
                }
                ?>
            </div>
    </div>

    <script>
        function aboveNetValue(){
            document.querySelectorAll('.net_amount').forEach( td => {
                if(td.innerHTML>1000){
                    td.parentElement.style.backgroundColor='green';
                }
                ;
            })
        }

        function editRow(str) {
            var xhttp;
            if (str == "") {
                document.getElementById("rowEdit").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("rowEdit").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "php/vat_invoice_table/vat_invoice_table_edit.php?q=" + str, true);
            xhttp.send();
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