<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roam &amp; Rest | Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
    <header>
        <?php
        include('reusables/nav.php');
        ?>
    </header>

    <main>

    <div class="container-fluid">
        <div class="container">

            <?php  
            $destination_id = $_GET['destination_id'];
            include('reusables/connection.php');
            $query = "SELECT destinations.name FROM hotels INNER JOIN destinations ON hotels.destination_id = destinations.id WHERE `destination_id` = '$destination_id'";
            $destination = mysqli_query($connect,$query);
            $result = mysqli_fetch_assoc($destination); 
            ?>
            <div class="row">
                <div class="col" style="padding: 30px;">
                <?php echo'<h1>Top Hotels in '.$result['name'].'</h1>';?>
                </div>
            </div>


            <?php
            $destination_id = $_GET['destination_id'];
            include('reusables/connection.php');
            $query = "SELECT * FROM hotels WHERE `destination_id` = '$destination_id'";
            $hotels = mysqli_query($connect,$query);
            ?>


            <div class="row">
                <?php 
                foreach($hotels as $hotel) { 
                    echo '<div class="col-md-6 mb-4">
                        <div class="card hotel-card">
                            <div class="card-body">
                                <h5 class="card-title">' .$hotel['name'] .'</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Price Per Night: $'.$hotel['price_per_night'].'</h6>
                                <p class="card-text">'.$hotel['description'].'</p>
                                <span class="badge">'.$hotel['rating'].'&nbsp;<i class="bi bi-star-fill"></i></span>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>

        </div>
    </div>

    </main>

    <?php
    include('reusables/footer.php');
    ?>

</body>
</html>