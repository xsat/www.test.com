<table class="table table-bordered">
    <tr>
        <?php foreach ($fields as $field) { ?>
            <th>
                <?php echo $field; ?>
            </th>
        <?php } ?>
        <th width="100px"<?php if (isset($id)) { ?> colspan="2"<?php } ?>>
            Дії
        </th>
    </tr>
    <?php foreach ($items as $item) { ?>
        <tr>
            <?php foreach ($fields as $key => $title) { ?>
                <td>
                    <?php echo $item[$key]; ?>
                </td>
            <?php } ?>
            <td width="100px">
                <ul class="list-unstyled buttons">
                    <li>
                        <a href="<?php echo $this->url->get($this->router->getControllerName() . '/edit/' . $item['id']); ?>" class="btn btn-warning btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span> Редагувати
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url->get($this->router->getControllerName() . '/delete/' . $item['id']); ?>" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash"></span> Видалилти
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url->get($this->router->getControllerName() . '/copy/' . $item['id']); ?>" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-floppy-disk"></span> Копіювати
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url->get('person/' . $item['id']); ?>" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-user"></span> Особа
                        </a>
                    </li>
                </ul>
            </td>
            <?php if (isset($id)) { ?>
                <td width="50px">
                    <ul class="list-unstyled buttons">
                        <li>
                            <a href="javascript:void(0);" class="btn btn-info btn-xs" data-order="up" data-name="<?php echo $this->router->getControllerName(); ?>" data-id="<?php echo $item['id']; ?>">
                                <span class="glyphicon glyphicon-arrow-up"></span> Вверх
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn btn-info btn-xs" data-order="down" data-name="<?php echo $this->router->getControllerName(); ?>" data-id="<?php echo $item['id']; ?>">
                                <span class="glyphicon glyphicon-arrow-down"></span> Вниз
                            </a>
                        </li>
                    </ul>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>