<div class="list-group">
    <a href="<?php echo $this->url->get(''); ?>" class="list-group-item list-group-item-success">
        <span class="glyphicon glyphicon-home"></span> Головна сторінка
    </a>
</div>
<div class="list-group">
    <a href="<?php echo $this->url->get('user'); ?>" class="list-group-item list-group-item-success<?php if ($this->router->getControllerName() == 'user') { ?> active<?php } ?>">
        <span class="glyphicon glyphicon-lock"></span> Користувачі
    </a>
    <a href="<?php echo $this->url->get('place'); ?>" class="list-group-item list-group-item-success<?php if ($this->router->getControllerName() == 'place') { ?> active<?php } ?>">
        <span class="glyphicon glyphicon-globe"></span> Місця
    </a>
    <a href="<?php echo $this->url->get('position'); ?>" class="list-group-item list-group-item-success<?php if ($this->router->getControllerName() == 'position') { ?> active<?php } ?>">
        <span class="glyphicon glyphicon-briefcase"></span> Посади
    </a>
    <a href="<?php echo $this->url->get('person'); ?>" class="list-group-item list-group-item-success<?php if ($this->router->getControllerName() == 'person') { ?> active<?php } ?>">
        <span class="glyphicon glyphicon-user"></span> Особи
    </a>
    <a href="<?php echo $this->url->get('phone'); ?>" class="list-group-item list-group-item-success<?php if ($this->router->getControllerName() == 'phone') { ?> active<?php } ?>">
        <span class="glyphicon glyphicon-phone-alt"></span> Телефони
    </a>
</div>