<?php

include "connection.php";

$pv = $_GET["pv"];

$district_rs = Database::search("SELECT * FROM `district` WHERE `province_id` = '".$pv."'");
$district_num = $district_rs->num_rows;

for($x=0; $district_num > $x; $x++){
    $district_data = $district_rs->fetch_assoc();
    ?>
    <option value="<?php echo ($district_data["id"]) ?>"><?php echo ($district_data["district_name"]) ?></option>
    <?php
}
 

?>