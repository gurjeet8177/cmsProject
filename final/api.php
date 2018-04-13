<?php

require_once('header.php');

?>

<?php

require_once('db.php');

$sql = "SELECT * FROM hotels";
$cmd = $conn->prepare($sql);
$cmd->execute();
$hotels = $cmd->fetchAll(PDO::FETCH_ASSOC);

$json_obj = json_encode($hotels);

echo $json_obj;

$conn = null;

?>


<?php
require_once('footer.php');
?>

