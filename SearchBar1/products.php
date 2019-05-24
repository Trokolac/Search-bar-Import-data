<?php

  require_once './Product.class.php';

  $p = new Product();

  if ( isset($_GET['search']) ) {
    $products = $p->search($_GET['search']);
  } else {
    $products = $p->all();
  }

?>

<?php include './header.layout.php'; ?>
<div class="container">
<div class="row mt-3">

  <?php foreach($products as $product) { ?>
    <div class="col-md-4">
      <div class="card mt-3">
        <img class="card-img-top product-image" src="./img/no-image.png" />
        <div class="card-body">
          <h5 class="card-title"><?php echo $product->title; ?></h5>
          <a href="./product-details.php?id=<?php echo $product->id; ?>" class="btn btn-sm btn-link float-right">Details</a>
        </div>
      </div>
    </div>
  <?php } ?>

</div>
</div>
<?php include './footer.layout.php'; ?>
