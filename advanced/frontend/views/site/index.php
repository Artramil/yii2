
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
    <ol class="carousel-indicators">
<?php
/* @var $this yii\web\View */
    $i=0;
    foreach ($model as $value){
        if ($i==0) {
            echo '<li data-target="#carousel-example-generic" data-slide-to="0"></li>';
            $i++;
        } else {
            echo "<li data-target='#carousel-example-generic' data-slide-to=".$i."></li>";
            $i++;
        }
    }
    ?>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  <?php
  $i=0;
    foreach ($model as $value){
        if ($i==0) {
            echo '<div class="item active">';
            $i++;
        } else {
            echo '<div class="item">';
            $i++;
        }
    ?>   
    <!-- <div class="item active"> -->
      <img src="<?=$value->urlImage?>" alt="..." style="position: relative; left:50%; transform: translateX(-50%); height: 400px; width: auto">
      <div class="carousel-caption">
          <?=$value->name?>
      </div>
    </div>
  <?php
    }
?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


        <div class="row">
        <?php
            foreach ($products as $values){?>
            <div class="col-sm-6 col-md-4 cards">
            <div class="thumbnail">
                <img src="<?=$values->imgUrl?>" alt="">
                <div class="caption">
                    <h3 class="product-name"><?=$values->name?></h3>
                    <p><?=$values->description?></p>
                    <p><?=$values->category->name?></p>
                    
                </div>
            </div> 
            </div>
        <?php    
            }
        ?>
            
        </div>
<?php
$this->title = 'My Yii Application';
?>
