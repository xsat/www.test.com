<!DOCTYPE html>
<html>
<head>
    {{  partial("partials/head") }}
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {# { image("img/") }#}
        </div>
    </div>
    <div class="col-md-3">
        {{  partial("partials/menu/admin") }}
    </div>
    <div class="col-md-9">
        {{ content() }}
    </div>
</div>
{{ assets.outputJs() }}
</body>
</html>