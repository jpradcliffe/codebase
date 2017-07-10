<?php include "includes/header.php" ?>

<?php include "includes/navbar.php" ?>

<?php
include "classes/Code.php"; // Code Class
include "classes/CodeMapper.php"; // CodeMapper Class
include "classes/CodeRenderer.php"; // RenderCode Class
?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <?php include "includes/searchForm.php" ?>
            <?php
            $search = null;
            $search = strtolower(trim(filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING)));
            if($search) { // If a search has been initialized execute next code block
            $searchArray = explode(" ", $search);
            $render = new CodeRenderer();
            echo $render->render($searchArray);
            }
            ?>
          <div class="panel panel-success">
            <div class="panel-heading">
              <h4>Found great code? Add it to <b>CodeBase</b>!</h4>
            </div>
            <div class="panel-body">
            <?php include "includes/codeForm.php" ?>
            </div>
          </div>
        </div>
          <div class="col-md-9">
          </div>
      </div>
    </div><!-- /.container -->

<?php include 'includes/footer.php' ?>
