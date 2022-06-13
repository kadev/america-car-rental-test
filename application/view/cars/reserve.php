
<div class="ui segments">
	<div class="ui segment" style="display: flex; justify-content: space-between">
		<p class="text-bold" style="margin:0;">Auto seleccionado</p>
		<div>
			<a class="ui green label">
				Auto agregado
			</a>
			<button class="ui icon mini red button empty-cart">
				<i class="trash icon"></i>
			</button>
		</div>
	</div>
	<div class="ui secondary segment">
		<div class="ui items">
			<div class="item">
				<div class="car image" style="width: 300px;">
					<img src="<?php echo URL; ?>img/<?php echo $car->img; ?>">
				</div>
				<div class="content">
					<a class="header"><?php echo $car->name; ?></a>
					<div class="meta">
						<span><?php echo $car->category; ?></span>
					</div>
					<div class="car description">
						<div class="feature">
							<div>Equipaje: x<?php echo $car->bags; ?></div>
							<div>Transmisión: <?php echo $car->transmission; ?></div>
						</div>
						<div class="feature">
							<div>Capacidad: <?php echo $car->passengers; ?> Personas</div>
							<div>Aire acondicionado: <?php echo ($car->a_c == true) ? 'Incluido' : 'No incluido'; ?></div>
						</div>
					</div>
					<div class="extra">
						Nota: El vehículo mostrado es solo un ejemplo. Los modelos pueden variar en cuanto a la disponibilidad y características (tales como marca y/o modelo).
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="extras-container" class="ui segments">
	<div class="ui segment">
		<p class="text-bold">EXTRAS - Complementa tu renta</p>
	</div>
	<div class="ui secondary segment">
		<table class="ui celled table">
			<thead class="hidden mobile">
				<tr>
					<th>Producto</th>
					<th class="collapsing">Cantidad</th>
					<th class="collapsing">Precio</th>
					<th class="collapsing">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<tr>
				<td class="extra-product-info">
					<div class="img-container">
						<img class="ui small image" src="<?php echo URL; ?>img/extra-1.jpg" style="width: 50px;">
					</div>
					<p>Asiento para Niño </p>
				</td>
				<td>
					<div class="ui right labeled input qty-container">
						<div class="ui basic label decrease-qty <?php echo (isset($addedProducts['child-seat']) AND $addedProducts['child-seat'] > 0) ? 'disabled':''; ?>" data-product="child-seat">
							<i class="minus icon"></i>
						</div>
						<input readonly type="number" placeholder="Cantidad" name="qty-child-seat" value="<?php echo (isset($addedProducts['child-seat']) AND $addedProducts['child-seat']['qty'] > 0) ? $addedProducts['child-seat']['qty'] : 1; ?>" min="0" max="10" step="1">
						<div class="ui basic label increase-qty <?php echo (isset($addedProducts['child-seat']) AND $addedProducts['child-seat'] > 0) ? 'disabled':''; ?>" data-product="child-seat">
							<i class="plus icon"></i>
						</div>
					</div>
				</td>
				<td>$5</td>
				<td>
					<?php if(isset($addedProducts['child-seat']) AND $addedProducts['child-seat'] > 0): ?>
						<button class="ui compact labeled icon green button add-extra" data-input="qty-child-seat" data-extra="child-seat" data-image="extra-1.jpg" data-price="5" style="display: none;"><i class="plus icon"></i>Agregar</button>
						<button class="ui compact labeled icon red button delete-extra" data-extra="child-seat"><i class="trash icon"></i>Eliminar</button>
					<?php else: ?>
						<button class="ui compact labeled icon green button add-extra" data-input="qty-child-seat" data-extra="child-seat" data-image="extra-1.jpg" data-price="5"><i class="plus icon"></i>Agregar</button>
						<button class="ui compact labeled icon red button delete-extra" data-extra="child-seat" style="display: none;"><i class="trash icon"></i>Eliminar</button>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td class="extra-product-info">
					<div class="img-container">
						<img class="ui small image" src="<?php echo URL; ?>img/extra-2.jpg" style="width: 100px;">
					</div>
					<p>Hielera Coleman</p>
				</td>
				<td>
					<div class="ui right labeled input qty-container">
						<div class="ui basic label decrease-qty <?php echo (isset($addedProducts['cooler']) AND $addedProducts['cooler'] > 0) ? 'disabled':''; ?>" data-product="cooler">
							<i class="minus icon"></i>
						</div>
						<input readonly type="number" placeholder="Cantidad" name="qty-cooler" value="<?php echo (isset($addedProducts['cooler']) AND $addedProducts['cooler']['qty'] > 0) ? $addedProducts['cooler']['qty'] : 1; ?>" min="0" max="10" step="1">
						<div class="ui basic label increase-qty <?php echo (isset($addedProducts['cooler']) AND $addedProducts['cooler'] > 0) ? 'disabled':''; ?>" data-product="cooler">
							<i class="plus icon"></i>
						</div>
					</div>
				</td>
				<td>$10</td>
				<td>
                    <?php if(isset($addedProducts['cooler']) AND $addedProducts['cooler'] > 0): ?>
						<button class="ui compact labeled icon green button add-extra" data-input="qty-cooler" data-extra="cooler" style="display: none;" data-image="extra-2.jpg" data-price="10"><i class="plus icon"></i>Agregar</button>
						<button class="ui compact labeled icon red button delete-extra" data-extra="cooler"><i class="trash icon"></i>Eliminar</button>
					<?php else: ?>
	                    <button class="ui compact labeled icon green button add-extra" data-input="qty-cooler" data-extra="cooler" data-image="extra-2.jpg" data-price="10"><i class="plus icon"></i>Agregar</button>
	                    <button class="ui compact labeled icon red button delete-extra" data-extra="cooler" style="display: none;"><i class="trash icon"></i>Eliminar</button>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td class="extra-product-info">
					<div class="img-container">
						<img class="ui small image" src="<?php echo URL; ?>img/extra-3.jpg" style="width: 120px;">
					</div>
					<p>GPS</p>
				</td>
				<td>
					<div class="ui right labeled input qty-container">
						<div class="ui basic label decrease-qty <?php echo (isset($addedProducts['gps']) AND $addedProducts['gps'] > 0) ? 'disabled':''; ?>" data-product="gps">
							<i class="minus icon"></i>
						</div>
						<input readonly type="number" placeholder="Cantidad" name="qty-gps" value="<?php echo (isset($addedProducts['gps']) AND $addedProducts['gps']['qty'] > 0) ? $addedProducts['gps']['qty'] : 1; ?>" min="0" max="10" step="1">
						<div class="ui basic label increase-qty <?php echo (isset($addedProducts['gps']) AND $addedProducts['gps'] > 0) ? 'disabled':''; ?>" data-product="gps">
							<i class="plus icon"></i>
						</div>
					</div>
				</td>
				<td>$15</td>
				<td>
                    <?php if(isset($addedProducts['gps']) AND $addedProducts['gps'] > 0): ?>
						<button class="ui compact labeled icon green button add-extra" data-input="qty-gps" data-extra="gps" data-image="extra-3.jpg" data-price="15" style="display: none;"><i class="plus icon"></i>Agregar</button>
						<button class="ui compact labeled icon red button delete-extra" data-extra="gps"><i class="trash icon"></i>Eliminar</button>
                    <?php else: ?>
	                    <button class="ui compact labeled icon green button add-extra" data-input="qty-gps" data-extra="gps" data-image="extra-3.jpg" data-price="15"><i class="plus icon"></i>Agregar</button>
	                    <button class="ui compact labeled icon red button delete-extra" data-extra="gps" style="display: none;"><i class="trash icon"></i>Eliminar</button>
                    <?php endif; ?>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>

<div id="shoppint-cart-modal" class="ui modal">
	<div class="header" style="display: flex; justify-content: space-between;">Carrito de compras <button class="ui negative basic button empty-cart">Vaciar</button></div>
	<div class="content">
		<div class="image">
			<img src="<?php echo URL; ?>img/shopping-cart-img.jpg">
		</div>
		<div class="products-info">
			<h3>Productos agregados</h3><br>

			<div id="products-list" class="ui middle aligned divided list" <?php echo (isset($addedProducts) AND count($addedProducts) > 0) ? '':'style="display: none"' ; ?>>
				<?php foreach ($addedProducts as $product): ?>
					<?php include(APP.'view/_templates/item-shopping-cart.php'); ?>
				<?php endforeach; ?>
			</div>

			<div class="ui negative message" <?php echo (isset($addedProducts) AND count($addedProducts) > 0) ? 'style="display:none"':'' ; ?>>
				<div class="header">
					El carrito de compras está vacío.
				</div>
			</div>

			<div class="cart-totals" <?php echo (isset($addedProducts) AND count($addedProducts) > 0) ? '':'style="display:none"' ; ?>>
				<p class="text-bold">TOTAL: <span id="total-cart">$<?php echo isset($_SESSION['total']) ? $_SESSION['total'] : 0; ?></span></p>
			</div>
		</div>
	</div>

	<div class="actions">
		<div class="ui cancel button">Cancelar</div>
		<div class="ui approve green button">Pagar</div>
	</div>
</div>