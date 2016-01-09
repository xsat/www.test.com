<!DOCTYPE html>
<html>
<head>
    <?php echo $this->partial('partials/head'); ?>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
        </div>
    </div>
    <div class="col-md-3">
        <?php echo $this->partial('partials/menu/admin'); ?>
    </div>
    <div class="col-md-9">
        <?php echo $this->getContent(); ?>
    </div>
</div>
<?php echo $this->assets->outputJs(); ?>
</body>
</html>