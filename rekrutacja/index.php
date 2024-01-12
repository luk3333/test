<!DOCTYPE html>
<html lang="pl">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zadanie zdalne e-MSI</title>
</head>

<body>
  <div class="container-fluid intro">
    <div class="row p-3">
      <div class="col-12 text-center">
        <h1>Zadanie zdalne e-MSI</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div id="Lewy" class="col-3 p-0" style="border:1px solid black;">
        <ul class="menu">
          <a href="?misc_html_controls">
            <li>Różne kontrolki HTML</li>
          </a>
          <a href="?part=workers_table">
            <li>Tabela Pracowników</li>
          </a>
          <a href="?part=vat_invoice_table">
            <li>Tabela Faktur VAT</li>
          </a>
          <a href=" ?part=bd_delegation_table">
            <li>Tabela Delegacji BD</li>
          </a>
          <a href="#">
            <li>Dane Kontrahentów</li>
          </a>
        </ul>
      </div>
      <div id="Prawy" class="col-9" style="border:1px solid black;">
        <?php
        if (isset($_GET['part'])) {
          switch ($_GET['part']) {
            case 'workers_table':
              include 'php/workers_table/workers_table.php';
              break;
            case 'bd_delegation_table':
              include 'php/bd_delegation_table/bd_delegation_table.php';
              break;
            case 'vat_invoice_table':
              include 'php/vat_invoice_table/vat_invoice_table.php';
              break;
            case 'misc_html_controls':
              include 'php/misc_html_controls/misc_html_controls.php';
              break;
          }
        }
        ?>
      </div>
    </div>
  </div>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>