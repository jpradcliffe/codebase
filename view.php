<?php
include 'includes/header.php';
include 'includes/navbar.php';
include "classes/Code.php"; // Code Class
include "classes/CodeMapper.php"; // CodeMapper Class
include "classes/CodeRenderer.php"; // RenderCode Class
?>

<div class="container">
  <div class="row">
    <div class="col-md-9">
        <div class="well well-sm">
            <h1>PHP</h1>
        </div>
        <?php include "includes/searchForm.php"; ?>
        <?php
        $search = null;
        $search = trim(filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING));
        if($search) { // If a search has been initialized execute next code block
        $searchArray = explode(" ", $search);
        $render = new CodeRenderer();
        echo $render->render($searchArray);
      } else {
        $render = new CodeRenderer();
        echo $render->render();
        }
        ?>
    </div>
    <div class="col-md-3">
      <div class="list-group">
        <a href="#" class="list-group-item">Vanilla</a>
        <a href="#" class="list-group-item">Laravel</a>
        <a href="#" class="list-group-item">Symfony</a>
      </div>
    </div>
  </div>
</div><!-- /.container -->

<?php include 'includes/footer.php' ?>
