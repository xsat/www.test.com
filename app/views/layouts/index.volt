<!DOCTYPE html>
<html>
	<head>
		{{  partial("partials/head") }}
	</head>
	<body>
		<div class="container main">
			{{  partial("partials/header") }}
			<div class="col-md-3 no_padding">
				{{  partial("partials/menu/front") }}
			</div>
			<div class="col-md-9 no_padding">
				{{ content() }}
			</div>
		</div>
		<div class="footer">
			<div class="container">
				<span class="copy">
					Copyright © {{ date('Y') }} <a href="/">Харків загін</a>. Всі права захищені.
				</span>
			</div>
		</div>
		{{ assets.outputJs() }}
	</body>
</html>