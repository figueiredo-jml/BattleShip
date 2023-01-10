<?php
$link = mysqli_connect("localhost", "Jose", "qwerty", "battlechips");
if($link) {
$query = mysqli_query($link, "SELECT * FROM accounts");
while($array = mysqli_fetch_array($query)) {
echo $array['data']."<br />";
} }
else {
echo "MySQL error :".mysqli_error();
}
?>
