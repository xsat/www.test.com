<div class="panel panel-success">
    <div class="panel-heading">
        <h1 class="panel-title"><?php echo strip_tags($this->tag->getTitle()); ?></h1>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" enctype="multipart/form-data" method="post">
            <?php echo $form->messages(); ?>
            <?php foreach ($form->getElements() as $name => $item) { ?>
                <div class="form-group">
                    <?php echo $form->label($name, array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-10">
                        <?php echo $form->render($name); ?>
                        <?php echo $form->message($name); ?>
                    </div>
                </div>
            <?php } ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <?php if ($this->router->getActionName() == 'add') { ?>
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-plus"></span> Додати
                        </button>
                    <?php } else { ?>
                        <button type="submit" class="btn btn-warning ">
                            <span class="glyphicon glyphicon-pencil"></span> Оновити
                        </button>
                    <?php } ?>
                    <?php echo $form->additional(); ?>
                </div>
            </div>
        </form>
    </div>
</div>