<!DOCTYPE html>
<html><head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Shopping Cart - America Car Rental Test</title>


	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>semantic/semantic.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/style.css">

    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="<?php echo URL; ?>semantic/semantic.min.js"></script>
	<script src="<?php echo URL; ?>plugins/blockui/jquery.blockUI.min.js"></script>
	<script src="<?php echo URL; ?>js/scripts.js"></script>

	<script>
        var appURL = '<?php echo URL; ?>';
	</script>
</head>
<body>
<div class="overlay"></div>
<nav id="sidebar" class="">
	<div class="sidebar-header position-relative">
		<a href="<?php echo URL; ?>"><img class="logo img-fluid" src="<?php echo URL; ?>img/logo-acr.png"></a>
		<a id="close-sidebar" href="javascript:void(0);">
			<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
				<path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
			</svg>
		</a>
	</div>

	<ul class="list-unstyled components">
		<li class="active"><a href="#">Inicio</a></li>
		<li><a href="#">Vehiculos</a></li>
		<li><a href="#">Ofertas</a></li>
		<li><a href="#">Sucursales</a></li>
		<li><a href="#">Politicas</a></li>
		<li><a href="#">Contacto</a></li>
	</ul>
</nav>

<div class="ui fixed inverted menu">
	<div class="ui container">
		<a href="<?php echo URL; ?>" class="header item">
			<img class="logo" src="<?php echo URL; ?>img/logo-acr.png">
		</a>
		<div id="nav-menu" class="right item">
			<a href="#" class="item active">Inicio</a>
			<a href="#" class="item">Vehiculos</a>
			<a href="#" class="item">Ofertas</a>
			<a href="#" class="item">Sucursales</a>
			<a href="#" class="item">Políticas</a>
			<a href="#" class="item">Contacto</a>
			<?php if($active_page == "reserve-car"): ?>
				<a id="cart" href="#">
					<i class="shopping cart icon"></i>
					<span class="qty-products"><?php echo (isset($addedProducts)) ? count($addedProducts) : 0; ?></span>
				</a>
			<?php endif; ?>
			<a id="mb-menu" class="item">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"/></svg>
			</a>
		</div>
	</div>
</div>
<div id="content" class="ui container">
