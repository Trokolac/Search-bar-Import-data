<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Products</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="./CSS/search.products.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-3">
                <a href="./index.php"><button class="btn btn-outline-success">Home</button></a>
            </div>
            <div class="col-md-6 mt-3">
                <form action="./products.php" method="get" class="form-inline my-2 my-lg-0">
                    <div class="input-group bar">

                        <input type="text" name="search" class="form-control" placeholder="Search for products..."
                            value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>" />

                        <div class="input-group-append">
                            <button class="btn btn-success">Search</button>
                        </div>

                    </div>
                </form>

            </div>
            <div class="col-md-3 mt-3"></div>
        </div>
    </div>

    <hr>