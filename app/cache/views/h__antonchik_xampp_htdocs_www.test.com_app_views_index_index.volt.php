<?php echo $this->partial('partials/breadcrumbs'); ?>

<?php if (isset($place->name)) { ?>
    <h1>
        <?php echo $place->name; ?>
    </h1>
<?php } ?>

<?php if (isset($place->positions)) { ?>
    <?php foreach ($place->positions as $position) { ?>
        <div class="item-list row">
            <div class="col-md-10 row">
                <div class="col-md-6">
                    <strong><?php echo $position->rank; ?></strong>
                </div>
                <div class="col-md-6">
                    <?php echo $position->name; ?>
                </div>
            </div>
            <?php if ($position->person) { ?>
                <?php if ($position->person->isPhoto()) { ?>
                    <div class="col-md-2 photo-item">
                        <img class="photo" style="height: 200px;" src="<?php echo $position->person->getPhoto(); ?>">
                    </div>
                <?php } ?>
                <div class="col-md-10 row">
                    <div class="col-md-6">
                        <strong><?php echo $position->person->rank; ?></strong>
                    </div>
                    <div class="col-md-6">
                        <?php echo $position->person->name; ?> (<?php echo $position->person->getYears(); ?>)
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
<?php } ?>