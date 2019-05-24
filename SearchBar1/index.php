<?php
require_once './Product.class.php';
require_once './Helper.class.php';


if( isset($_POST['add']) ) {
  $p = new Product();
  $p->title = $_POST['title'];
  $p->price = $_POST['price'];
  $p->description = $_POST['description'];
  if( $p->insert() ) {
    Helper::addMessage("Product added successfully.");
  }
}
?>

<?php include './header.layout.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                <?php require_once './Helper.class.php'; ?>

                <?php if(Helper::ifError()) { ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo Helper::getError(); ?>
                </div>
                <?php } ?>

                <?php if(Helper::ifMessage()) { ?>
                <div class="alert alert-info">
                    <strong>Success!</strong> <?php echo Helper::getMessage(); ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">

            <h1 class="mb-5" align="center">Insert product</h1>

            <form action="./index.php" method="post" class="clearfix" enctype="multipart/form-data">

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputTitle">Title</label>
                        <input type="text" name="title" class="form-control" id="inputTitle"
                            placeholder="Product title">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPrice">Price</label>
                        <input type="number" name="price" id="inputPrice" class="form-control" value="0"/>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="inputDescription">Description</label>
                        <textarea name="description" class="form-control" id="inputDescription" rows="3"></textarea>
                    </div>

                </div>
                <div class="form-row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <button name="add" class="btn btn-outline-success float-right">Add product</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<?php include './footer.layout.php' ?>