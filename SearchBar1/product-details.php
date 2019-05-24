<?php
  
  require_once './Product.class.php';

  $product = new Product($_GET['id']);

?>

<?php include './header.layout.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>
                <?php echo $product->title; ?>
            </h3>
        </div>
        <div class="col-md-8">
            <h3>Description</h3> <br /> <h6><?php echo $product->description; ?></h6>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <h3>Price</h3> <br /> <h6><?php echo $product->price; ?> $ </h6>
        </div>
    </div>
</div>

<?php include './footer.layout.php'; ?>
