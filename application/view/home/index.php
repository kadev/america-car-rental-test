
<div class="ui grid">
		<div class="sixteen column wide">
			<h1 class="ui header">
				Autos disponibles para ti
			</h1>
			<p class="ui subtitle">Encuentra el auto perfecto al mejor precio del mercado</p>

			<div id="available-cars" class="ui stackable grid">
				<?php if(isset($cars) AND !empty($cars)): ?>
					<div class="three column row">
						<?php foreach ($cars as $car): ?>
							<div class="column">
						<div class="ui card">
							<a class="image" href="#">
								<img src="<?php echo URL; ?>img/<?php echo $car->img; ?>">
							</a>
							<div class="content">
								<a class="header" href="#"><?php echo $car->name; ?></a>
								<div class="meta">
									<p class="data"><?php echo $car->category; ?> <span>ECMR</span></p>
									<p class="data">
										<?php if($car->a_c): ?>
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M475.6 384.1C469.7 394.3 458.9 400 447.9 400c-5.488 0-11.04-1.406-16.13-4.375l-25.09-14.64l5.379 20.29c3.393 12.81-4.256 25.97-17.08 29.34c-2.064 .5625-4.129 .8125-6.164 .8125c-10.63 0-20.36-7.094-23.21-17.84l-17.74-66.92L288 311.7l.0002 70.5l48.38 48.88c9.338 9.438 9.244 24.62-.1875 33.94C331.5 469.7 325.4 472 319.3 472c-6.193 0-12.39-2.375-17.08-7.125l-14.22-14.37L288 480c0 17.69-14.34 32-32.03 32s-32.03-14.31-32.03-32l-.0002-29.5l-14.22 14.37c-9.322 9.438-24.53 9.5-33.97 .1875c-9.432-9.312-9.525-24.5-.1875-33.94l48.38-48.88L223.1 311.7l-59.87 34.93l-17.74 66.92c-2.848 10.75-12.58 17.84-23.21 17.84c-2.035 0-4.1-.25-6.164-.8125c-12.82-3.375-20.47-16.53-17.08-29.34l5.379-20.29l-25.09 14.64C75.11 398.6 69.56 400 64.07 400c-11.01 0-21.74-5.688-27.69-15.88c-8.932-15.25-3.785-34.84 11.5-43.75l25.96-15.15l-20.33-5.508C40.7 316.3 33.15 303.1 36.62 290.3S53.23 270 66.09 273.4L132 291.3L192.5 256L132 220.7L66.09 238.6c-2.111 .5625-4.225 .8438-6.305 .8438c-10.57 0-20.27-7.031-23.16-17.72C33.15 208.9 40.7 195.8 53.51 192.3l20.33-5.508L47.88 171.6c-15.28-8.906-20.43-28.5-11.5-43.75c8.885-15.28 28.5-20.44 43.81-11.5l25.09 14.64L99.9 110.7C96.51 97.91 104.2 84.75 116.1 81.38C129.9 77.91 142.1 85.63 146.4 98.41l17.74 66.92L223.1 200.3l-.0002-70.5L175.6 80.88C166.3 71.44 166.3 56.25 175.8 46.94C185.2 37.59 200.4 37.72 209.8 47.13l14.22 14.37L223.1 32c0-17.69 14.34-32 32.03-32s32.03 14.31 32.03 32l.0002 29.5l14.22-14.37c9.307-9.406 24.51-9.531 33.97-.1875c9.432 9.312 9.525 24.5 .1875 33.94l-48.38 48.88L288 200.3l59.87-34.93l17.74-66.92c3.395-12.78 16.56-20.5 29.38-17.03c12.82 3.375 20.47 16.53 17.08 29.34l-5.379 20.29l25.09-14.64c15.28-8.906 34.91-3.75 43.81 11.5c8.932 15.25 3.785 34.84-11.5 43.75l-25.96 15.15l20.33 5.508c12.81 3.469 20.37 16.66 16.89 29.44c-2.895 10.69-12.59 17.72-23.16 17.72c-2.08 0-4.193-.2813-6.305-.8438L379.1 220.7L319.5 256l60.46 35.28l65.95-17.87C458.8 270 471.9 277.5 475.4 290.3c3.473 12.78-4.082 25.97-16.89 29.44l-20.33 5.508l25.96 15.15C479.4 349.3 484.5 368.9 475.6 384.1z"/></svg>
												A/C
											</span>
										<?php endif; ?>
										<span>
											<img width="20" src="<?php echo URL ?>img/suitcase.png">
											x<?php echo $car->bags; ?>
										</span>
									</p>
									<p class="data">
										<span>
											<img width="15" src="<?php echo URL ?>img/gearbox.png">
											<?php echo $car->transmission; ?>
										</span>
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M272 304h-96C78.8 304 0 382.8 0 480c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32C448 382.8 369.2 304 272 304zM48.99 464C56.89 400.9 110.8 352 176 352h96c65.16 0 119.1 48.95 127 112H48.99zM224 256c70.69 0 128-57.31 128-128c0-70.69-57.31-128-128-128S96 57.31 96 128C96 198.7 153.3 256 224 256zM224 48c44.11 0 80 35.89 80 80c0 44.11-35.89 80-80 80S144 172.1 144 128C144 83.89 179.9 48 224 48z"/></svg>
											x<?php echo $car->passengers; ?>
										</span>
									</p>
								</div>
								<div class="price"><span>$<?php echo $car->price; ?> USD</span></div>
							</div>
							<div class="extra content">
								<button data-car="<?php echo $car->slug; ?>" class="ui button add-car" data-image="<?php echo $car->img; ?>" data-price="<?php echo $car->price; ?>">RESERVAR AUTO</button>
							</div>
						</div>
					</div>
						<?php endforeach; ?>

						<div class="dots">
							<span class="active"></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
				</div>
				<?php else: ?>
					<div class="ui negative message">
						<div class="header">
							Ooops!
						</div>
						<p>Al parecer no hay autos disponibles por el momento, intente más tarde.</p>
					</div>
				<?php endif; ?>
			</div>
		</div>

	</div>