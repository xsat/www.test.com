<?php if (isset($user)) { ?>
    <a class="admin" href="<?php echo $this->url->get('user'); ?>">
        Адмін панель
    </a>
<?php } ?>

<div class="row header">
    <div class="col-md-12">
        <a class="logo" href="/">
            <?php echo $this->tag->image(array('img/logo.png')); ?>
        </a>
        <form class="search" action="<?php echo $this->url->get('search'); ?>"  method="get">
            <input placeholder="Пошук..." name="s" type="text">
            <input id="search" value="Пошук" type="submit">
        </form>
        <ul class="list-inline header-menu">
            <li>
                <a href="#">
                    Катег 1
                </a>
            </li>
            <li>
                <a href="#">
                    Катег 1
                </a>
            </li>
            <li>
                <?php if (isset($user)) { ?>
                    <a class="active" href="<?php echo $this->url->get('logout'); ?>">
                        Вийти
                    </a>
                <?php } else { ?>
                    <a class="active" href="<?php echo $this->url->get('login'); ?>">
                        Зайти
                    </a>
                <?php } ?>
            </li>
        </ul>
    </div>
</div>