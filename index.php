<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roam &amp; Rest</title>
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


            <div class="row">
                <div class="col"  style="padding: 30px;">
                <h1>Explore the World, Stay in Comfort.</h1>
                </div>
            </div>


            <div class="row"> 

            <?php
            include('reusables/connection.php');
            ?>

            <?php
            $query = "SELECT * FROM destinations";
            $destinations = mysqli_query($connect,$query);
            
            foreach($destinations as $destination){
                echo '<div class="col-md-6">
                        <div class="card destination-card" >
                        <img src="images/'.$destination['image_url'].'" class="card-img-top" alt="Image of '.$destination['name'].'">
                        <div class="card-body">
                            <h5 class="card-title">' .$destination['name'] . '</h5>
                            <h6 class="card-subtitle mb-2 text-muted">' .$destination['country'] . '</h6>
                            <h6 class="card-subtitle mb-2">Best Season to visit: '. $destination['best_season'] . '</h6>
                            <p class="card-text">' . $destination['description'] .'</p>
                            <p class="card-text p-text">Wanna see best hotels to stay?</p>
                            <form action="hotel.php" method="GET">
                                <input type="hidden" name="destination_id" value="'.$destination['id'].'">
                                <button type="submit" class="btn btn-submit">View Hotels</button>
                            </form>  
                        </div>
                        </div> 
                    </div>';
            };            
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