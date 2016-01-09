<li <?php if (isset($place->id) && $placeItem->id == $place->id) { ?>class="active"<?php } ?>>
    <a href="<?php echo $this->url->get($placeItem->id); ?>">
        <?php echo $placeItem->name; ?>
    </a>
    <?php if ($this->length($placeItem->places)) { ?>
        <ul>
            <?php $v10086638921iterator = $placeItem->places; $v10086638921incr = 0; $v10086638921loop = new stdClass(); $v10086638921loop->length = count($v10086638921iterator); $v10086638921loop->index = 1; $v10086638921loop->index0 = 1; $v10086638921loop->revindex = $v10086638921loop->length; $v10086638921loop->revindex0 = $v10086638921loop->length - 1; ?><?php foreach ($v10086638921iterator as $placeItem) { ?><?php $v10086638921loop->first = ($v10086638921incr == 0); $v10086638921loop->index = $v10086638921incr + 1; $v10086638921loop->index0 = $v10086638921incr; $v10086638921loop->revindex = $v10086638921loop->length - $v10086638921incr; $v10086638921loop->revindex0 = $v10086638921loop->length - ($v10086638921incr + 1); $v10086638921loop->last = ($v10086638921incr == ($v10086638921loop->length - 1)); ?>
                <?php echo $this->partial('partials/menu/item'); ?>
            <?php $v10086638921incr++; } ?>
        </ul>
    <?php } ?>
</li>