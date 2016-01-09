<table class="table table-bordered">
    <tr>
        <?php foreach ($fields as $field) { ?>
            <th>
                <?php echo $field; ?>
            </th>
        <?php } ?>
        <th width="100px">
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
                        <a href="<?php echo $this->url->get('phone/' . $item['id']); ?>" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-phone-alt"></span> Телефони
                        </a>
                    </li>
                </ul>
            </td>
        </tr>
    <?php } ?>
</table>