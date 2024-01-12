<?php
include("../db_connection.php");
$q = $_GET['q'];
echo "<h5>Wprowadzanie zmian w Fakturze Lp. " . $q .'</h5>';
?>
<form action="" method="POST">
    <label for='net_amount'>Kwota netto</label>
    <input name="net_amount" type="number" step="0.01" min="0" />
    <label for="quantity">Ilość</label>
    <input type="number" name="quantity" min="0">
    <label for="VAT">VAT</label>
    <select name="VAT">
        <option value="ZW">ZW</option>
        <option value="NP">NP</option>
        <option value="0">0%</option>
        <option value="3">3%</option>
        <option value="8">8%</option>
        <option value="23">23%</option>
    </select>
    <?php
    echo'<input type="hidden" name="id" value="'.$q.'">';
    ?>
    <input type="submit" value="Zapisz"/>
</form>
