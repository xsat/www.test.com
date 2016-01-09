<div class="panel-heading">
    <div class="row">
        <div class="col-sm-6">
            <form action="<?php echo $this->url->get($this->router->getControllerName() . '/search'); ?>"  method="get">
                <div class="input-group input-group-sm">
                    <?php echo $form->render('s'); ?>
                    <span class="input-group-btn">
                        <a href="<?php echo $this->url->get($this->router->getControllerName()); ?>" class="btn btn-default">
                            <span class="glyphicon glyphicon-refresh"></span>
                        </a>
                        <button id="search" class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-sm-6 text-right">
            
    <?php if ($id) { ?>
        <a href="<?php echo $this->url->get($this->router->getControllerName() . '/add/' . $id); ?>" class="btn btn-success btn-sm">
            <span class="glyphicon glyphicon-plus"></span> Додати
        </a>
    <?php } ?>

        </div>
    </div>
</div>