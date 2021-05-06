<?php
session_start();
include 'konek.php';
$date = date("Y-m-d");
?>
<?php
$status = "";
if (((null != $_GET['id']) and (null != $_GET['idresep'])) and (null == $_GET['status'])) {


  $sql = "INSERT into pin(id_user,id_resep,date) values('" . $_GET['id'] . "','" . $_GET['idresep'] . "','" . $date . "')";
  if ($stmt = $conn->query($sql)) {
?>
    <script>
      var anu = function() {
        window.location = "resep.php?id=<?= $_GET['idresep'] ?>";
      };
      setTimeout(anu, 1);
    </script>
  <?php
  }
} else if (((null != $_GET['id']) and (null != $_GET['idresep']) and (null != $_GET['status']))) {

  $sql = "DELETE from pin where id_user='" . $_GET['id'] . "' and id_resep='" . $_GET['idresep'] . "'";

  if ($stmt = $conn->query($sql)) {
  ?>
    <script>
      var anu = function() {
        window.location = "resep.php?id=<?= $_GET['idresep'] ?>";
      };
      setTimeout(anu, 100);
    </script>
<?php
  }
} else {
  echo "Something......went wrong";
}






?>