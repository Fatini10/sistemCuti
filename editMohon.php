<!----------------------------->
<!-- tak jadi tp saje simpan -->
<!----------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Kemas Kini Buku</title>
</head>
<body>

<?php
include('header.php');
?>
<div class="container my-5">
    <header class="d-flex justify-content-between my-4">
        <h1>Kemaskini Permohonan</h1>
        <div>
            <a href="pelajar.php" class="btn btn-primary">Kembali</a>
        </div>
    </header>
    
    <form action="editMohon.php" method="post">
        <?php

        if (isset($_GET['id'])){
            include("db.php");
            $id = $_GET['id'];
            $sql = "SELECT * FROM permohonan WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            ?>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="nama" placeholder="nama anda" value="<?php echo $row["nama"]; ?>">
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="ndp" placeholder="NDP anda" value="<?php echo $row["ndp"]; ?>">
            </div>

            <div class="form-element my-4">
                <select name="course" id="" class="form-control">
                    <option selected disabled>Choose Your Course</option>
                    <option value="TPP" <?php if($row ["course"]=="TPP"){echo "selected";}?>>TPP></option>
                    <option value="TPM" <?php if ($row["course"]== "TPM"){echo "selected";} ?>>TPM </option>
                    
                    <option value="TKR" <?php if ($row["course"]== "TKR"){echo "selected";} ?>>TKR</option>
                    <option value="CADD" <?php if ($row["course"]== "CADD"){echo "selected";} ?>>CADD</option>
                </select>
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="sebab" placeholder="sebab" value="<?php echo $row["sebab"]; ?>">
            </div>

            <div class="form-element my-4">
                <input type="file" class="form-control" name="bukti" placeholder="bukti" value="<?php echo $row["bukti"]; ?>">
            </div>

            <div class="form-element my-4">
                <input type="date" class="form-control" name="tarikh_mula"  value="<?php echo $row["tarikh_mula"]; ?>">
            </div>

            <div class="form-element my-4">
                <input type="date" class="form-control" name="tarikh_tamat" value="<?php echo $row["tarikh_tamat"]; ?>">
            </div>

                    <!-- <input type="hidden" value="<?php echo $id; ?>"name="id"> -->
                    <!-- <div class="form-elemnt my-4">
                        <input type="submit" name="edit" value="kemas kini buka"
                        class="btn btn-primary">
                    </div> -->

                    <div class="d-grid">
                        <button type="submit" name="edit" class="btn btn-primary">Kemaskini Permohonan</button>
                    </div>
                    <?php
            }
            
            else{
                echo "<h3>data tak wujud<h3>";
            }
            ?>
        </form> 
        
</div> 
</body>
</html>