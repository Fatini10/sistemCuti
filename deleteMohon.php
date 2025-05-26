<!----------------------------->
<!-- tak jadi tp saje simpan -->
<!----------------------------->

<?php 
if (isset($_GET['id'])) {
include("db.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM permohonan WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "Permohonan berjaya dibuang!";
    header("Location:Pelajar.php");
}else{
    die("Terdapat masalah!");
}
}else{
    echo "Permohonan tidak wujud";
}
?>
