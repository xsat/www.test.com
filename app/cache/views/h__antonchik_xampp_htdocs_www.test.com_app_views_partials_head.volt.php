<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo $this->tag->getTitle(); ?>
<link rel="shortcut icon" href="/img/icon.png" />
<?php echo $this->assets->outputCss(); ?>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<?php echo $this->tag->javascriptInclude('js/html5shiv.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/respond.min.js'); ?>
<![endif]-->