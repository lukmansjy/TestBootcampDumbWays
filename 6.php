<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "count";
 
$koneksi = mysqli_connect($host, $user, $pass, $db) or die("Koneski ke database gagal");

$query = "SELECT * FROM tb_caleg";
$data_caleg = mysqli_query($koneksi, $query);

if(isset($_POST['id'])){
    $id = $_POST['id'];

    // ambil data earned vote sebelumnya
    $query = "SELECT earned_vote FROM tb_caleg WHERE id = $id";
    $data_vote = mysqli_query($koneksi, $query);    
    $row = mysqli_fetch_assoc($data_vote);
    $earned_vote = $row['earned_vote'] + 1;

    // query update data (tambah pemilih)
    $query = "UPDATE tb_caleg SET earned_vote=$earned_vote WHERE id = $id";
    if(mysqli_query($koneksi, $query)){
        echo true;
    }else{
        echo false;
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    h2{
        margin-top: 20px;
    }
    .detail{
        border: 1px rgb(209, 209, 209) solid;
        border-radius: 10px;
        margin: 20px;
        padding: 20px;
        background-color: rgb(190, 235, 236);
        box-shadow: 2px 3px 10px rgb(196, 192, 192);
    }
    .namaPartai{
        font-weight: bold;
        color: rgb(68, 68, 68);
        font-size: 20px;
    }
    .suara{
        font-weight: bold;
        font-size: 30px;
        display: block;
    }
    .btn{
        margin-top: 10px;
    }
    </style>

    <title>Quick Count</title>
  </head>
  <body>
    <div class="container">
        <h2 class="text-center">Quick Count Pemilihan</h2>

        <?php while($row = mysqli_fetch_assoc($data_caleg)){ ?>
        <div class="detail">
            <div class="row text-center">
                <div class="col-sm-12">
                    <span class="namaPartai"><?php echo $row['name']; ?></span>
                    <hr>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-6">
                    <span>Perolehan Suara</span>
                    <span class="suara"><?php echo $row['earned_vote']; ?><span>
                </div>
                <div class="col-sm-6">
                    <form method="POST" action="6.php">
                        <button type="submit" name="submit" id="<?php echo $row['id']; ?>" class="btn btn-success">Tambah Suara</button>
                    </from>
                </div>
            </div>
        </div>
        <?php } ?>

    <div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
    $(document).on('click', '.btn', function(eve){
    var id = $(this).attr("id");
    $.ajax('http://localhost/TestBootcampDumbWays/6.php',{
        dataType:'json',
        type: 'POST',
        data: {
        id: id
        }
    });
});
    </script>
  </body>
</html>