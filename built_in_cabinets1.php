<?php include("include/header.php"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<style>
	header,
	.footer-container.footer-one.pt-100.pb-50 {
		display: none;
	}

	/* .container {
    width: var(--containerWidth);
    background: #fff;
    text-align: center;
    border-radius: 5px;
    padding: 50px 35px 10px 35px;
} */
	/* header {
    font-size: 35px;
    font-weight: 600;
    margin: 0 0 30px 0;
} */
	:root {
		--primary: #333;
		--secondary: #333;
		--errorColor: red;
		--stepNumber: 6;
		--containerWidth: 600px;
		--bgColor: #333;
		--inputBorderColor: lightgray;
	}

	.form-outer {
		width: 100%;
		overflow: hidden;
	}

	.form-outer form {
		display: flex;
		width: calc(100% * var(--stepNumber));
	}

	.form-outer form .page {
		width: calc(100% / var(--stepNumber));
		transition: margin-left 0.3s ease-in-out;
		max-height: 525px;
		overflow-y: auto;
	}

	.form-outer form .page .title {
		text-align: left;
		font-size: 25px;
		font-weight: 500;
	}

	.form-outer form .page .field {
		width: 100%;
		height: 45px;
		margin: 45px 0;
		display: flex;
		position: relative;
	}

	form .page .field .label {
		position: absolute;
		top: -30px;
		font-weight: 500;
	}

	form .page .field input {
		box-sizing: border-box;
		height: 100%;
		width: 100%;
		border: 1px solid var(--inputBorderColor);
		border-radius: 5px;
		padding-left: 15px;
		margin: 0 1px;
		font-size: 18px;
		transition: border-color 150ms ease;
	}

	form .page .field input.invalid-input {
		border-color: var(--errorColor);
	}

	form .page .field select {
		width: 100%;
		padding-left: 10px;
		font-size: 17px;
		font-weight: 500;
	}

	form .page .field button {
		width: 100%;
		height: calc(100% + 5px);
		border: none;
		background: var(--secondary);
		margin-top: -20px;
		border-radius: 5px;
		color: #fff;
		cursor: pointer;
		font-size: 18px;
		font-weight: 500;
		letter-spacing: 1px;
		text-transform: uppercase;
		transition: 0.5s ease;
	}

	form .page .field button:hover {
		background: #000;
	}

	form .page .btns button {
		margin-top: -20px !important;
	}

	form .page .btns button.prev {
		margin-right: 3px;
		font-size: 17px;
	}

	form .page .btns button.next {
		margin-left: 3px;
	}

	.progress-bar {
		display: flex;
		/* margin: 40px 0; */
		user-select: none;
		flex-direction: column;
		background: #fff;
		color: #000;
	}

	.progress-bar .step {
		text-align: center;
		width: 100%;
		position: relative;
	}

	.progress-bar .step p {
		font-weight: 500;
		font-size: 18px;
		color: #000;
		margin-bottom: 8px;
	}

	.progress-bar .step .bullet {
		height: 40px;
		width: 40px;
		border: 2px solid #000;
		display: inline-block;
		/* border-radius: 50%; */
		position: relative;
		transition: 0.2s;
		font-weight: 500;
		font-size: 17px;
		line-height: 14px;
	}

	.progress-bar .step .bullet.active {
		border-color: var(--primary);
		background: var(--primary);
	}

	.progress-bar .step .bullet span {
		position: absolute;
		top: 30%;
		left: 50%;
		transform: translateX(-50%);
	}

	.progress-bar .step .bullet.active span {
		display: none;
	}

	/* .progress-bar .step .bullet:before,
	.progress-bar .step .bullet:after {
		position: absolute;
		content: "";
		bottom: 11px;
		right: -51px;
		height: 3px;
		width: 44px;
		background: #262626;
	} */

	.progress-bar .step .bullet.active:after {
		background: var(--primary);
		transform: scaleX(0);
		transform-origin: left;
		animation: animate 0.3s linear forwards;
	}

	@keyframes animate {
		100% {
			transform: scaleX(1);
		}
	}

	.progress-bar .step:last-child .bullet:before,
	.progress-bar .step:last-child .bullet:after {
		display: none;
	}

	.progress-bar .step p.active {
		color: var(--primary);
		transition: 0.2s linear;
	}

	.progress-bar .step .check {
		position: absolute;
		left: 50%;
		top: 45%;
		font-size: 15px;
		transform: translate(-50%, -50%);
		display: none;
	}

	.progress-bar .step .check.active {
		display: block;
		color: #fff;
	}

	@media screen and (max-width: 660px) {
		.progress-bar .step p {
			display: none;
		}

		.progress-bar .step .bullet::after,
		.progress-bar .step .bullet::before {
			display: none;
		}

		.progress-bar .step .bullet {
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.progress-bar .step .check {
			position: absolute;
			left: 50%;
			top: 50%;
			font-size: 15px;
			transform: translate(-50%, -50%);
			display: none;
		}

		.step {
			display: flex;
			align-items: center;
			justify-content: center;
		}
	}

	/* @media screen and (max-width: 490px) {
    :root {
        --containerWidth: 100%;
    }
    .container {
        box-sizing: border-box;
        border-radius: 0;
    }
} */

	/* radio btn with image */
	div.radio-with-Icon {
		display: block;
	}

	div.radio-with-Icon p.radioOption-Item {
		display: inline-block;
		width: 100px;
		/* height: 100px; */
		box-sizing: border-box;
		/* margin: auto 15px; */
		border: none;
	}

	div.radio-with-Icon p.radioOption-Item label {
		display: block;
		height: auto;
		width: auto;
		/* padding: 10px; */
		/* border-radius: 10px; */
		border: 2px solid #de183147;
		color: #de1831;
		cursor: pointer;
		opacity: .8;
		transition: none;
		font-size: 13px;
		/* padding-top: 25px; */
		text-align: center;
		margin: 0 !important;
	}

	div.radio-with-Icon p.radioOption-Item label:hover,
	div.radio-with-Icon p.radioOption-Item label:focus,
	div.radio-with-Icon p.radioOption-Item label:active {
		opacity: .5;
		/* background-color: #de1831; */
		color: #de1831;
		margin: 0 !important;
	}

	div.radio-with-Icon p.radioOption-Item label::after,
	div.radio-with-Icon p.radioOption-Item label:after,
	div.radio-with-Icon p.radioOption-Item label::before,
	div.radio-with-Icon p.radioOption-Item label:before {
		opacity: 0 !important;
		width: 0 !important;
		height: 0 !important;
		margin: 0 !important;
	}

	div.radio-with-Icon p.radioOption-Item label i.fa {
		display: block;
		font-size: 50px;
	}

	div.radio-with-Icon p.radioOption-Item input[type="radio"] {
		opacity: 0 !important;
		width: 0 !important;
		height: 0 !important;
	}

	div.radio-with-Icon p.radioOption-Item input[type="radio"]:active~label {
		opacity: 1;
	}

	div.radio-with-Icon p.radioOption-Item input[type="radio"]:checked~label {
		opacity: 1;
		border: none;
		/* background-color: #de1831; */
		color: #de1831;
		border: 2px solid #de1831;
	}

	div.radio-with-Icon p.radioOption-Item input[type="radio"]:hover,
	div.radio-with-Icon p.radioOption-Item input[type="radio"]:focus,
	div.radio-with-Icon p.radioOption-Item input[type="radio"]:active {
		margin: 0 !important;
	}

	div.radio-with-Icon p.radioOption-Item input[type="radio"]+label:before,
	div.radio-with-Icon p.radioOption-Item input[type="radio"]+label:after {
		margin: 0 !important;
	}

	.radio-with-Icon img {
		width: auto;
		height: 100px;
	}

	/* collapse icon */
	[data-toggle="collapse"] .fa:before {
		content: "\f139";
	}

	[data-toggle="collapse"].collapsed .fa:before {
		content: "\f13a";
	}

	.fr_col {
		display: flex !important;
		gap: 1%;
		flex: 1 1 auto;
		flex-direction: row;
		flex-wrap: wrap;
	}

	.fr_col img {
		width: 94px;
	}

	.img_interior {
		display: flex;
		flex-direction: row;
		justify-content: space-evenly;
	}

	.img_interior p.radioOption-Item {
		width: min-content !important;
	}

	.builder_img {
		background: #e3e3e3;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 500px;
	}

	.btn-green {
		background-color: #00a558 !important;
		border: 1px solid #00a558 !important;
	}

	.para_depth2 {
		border-radius: 5px;
	}

	div.built_in_cabinets p.radioOption-Item {
		display: inline-block;
		width: 30%;
		height: auto;
	}

	.built_in_cabinets img {
		width: 100% !important;
		height: auto !important;
	}

	div.floorPlan1 p.radioOption-Item {
		display: inline-block;
		width: 40%;
		height: auto;
	}

	.floorPlan1 img {
		width: 100% !important;
		height: auto !important;
	}
</style>
<!-- <div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="breadcrumb-title">Cabinets</h1>
				<ul class="breadcrumb-list">
					<li class="breadcrumb-list__item"><a href="index.php">HOME</a></li>
					<li class="breadcrumb-list__item breadcrumb-list__item--active">Cabinets</li>
				</ul>
			</div>
		</div>
	</div>
</div> -->


<div class="section-title-container mb-80 mt-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title section-title--one text-center">
					<h1>WARDROBE CONFIGURATOR</h1>
					<p>At Glide and Slide, we know it can be hard to ask for a quote for something without knowing whether you truly want it or can afford it. That's why we created our wardrobe configurator. The application allows you to put in the measurements, range, a number of doors required, measurement and material of the door you want to be fitted, the colour of the frame, the interior style and any material inside your fitted wardrobe. Once you've done this, the configurator will give you a price estimate, allowing you to make an informed decision regarding whether a bespoke wardrobe is the right move for you.</p>
					<p>Once you have filled in our wardrobe configurator, we will take you to a payment page where you can decide if you want to go forward with the purchase or if you need more time. Please note that our configurator only quotes you for the price of the parts and not the installation process. Filling in our configurator has no hidden obligation to pay, so why not have a go today.</p>
					<hr>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class="product-category-container mb-100 mb-md-90 mb-sm-90">
	<div class="container wide three_ctg">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-category single-category--one wow zoomIn">
					<div class="single-category__image single-category__image--one">
						<img src="assets/img_web/skrina.jpg" class="img-fluid" alt="">
					</div>
					<div class="single-category__content single-category__content--one mt-25 mb-25">
						<div class="title">
							<p>Built-in wardrobe complete</p>
							<a href="javascript:void(0)">Built-in wardrobe complete</a>
						</div>
						<p class="product-count">cabinet</p>
					</div>
					<a href="javascript:void(0)" class="banner-link" id="Built_in"></a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-category single-category--one wow zoomIn">
					<div class="single-category__image single-category__image--one">
						<img src="assets/img_web/posuv.jpg" class="img-fluid" alt="">
					</div>
					<div class="single-category__content single-category__content--one mt-25 mb-25">
						<div class="title">
							<p>Front sliding system separately</p>
							<a href="javascript:void(0)">Front sliding system separately</a>
						</div>

						<p class="product-count">cabinet</p>
					</div>
					<a href="javascript:void(0)" class="banner-link"></a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-category single-category--one wow zoomIn">
					<div class="single-category__image single-category__image--one">
						<img src="assets/img_web/vnutro.jpg" class="img-fluid" alt="">
					</div>
					<div class="single-category__content single-category__content--one mt-25 mb-25">
						<div class="title">
							<p>Front sliding system separately</p>
							<a href="javascript:void(0)">Front sliding system separately</a>
						</div>
						<p class="product-count">cabinet</p>
					</div>
					<a href="javascript:void(0)" class="banner-link"></a>
				</div>
			</div>
		</div>
	</div>

	<div class="container wide four_opt" style="display:none">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6 mb-2">
						<div class="card p-2 single-slider-post">
							<div class="row">
								<div class="col-md-12">
									<div class="single-slider-post__image mb-30">
										<a href="javascript:void(0)" id="plan_type_A">
											<img src="assets/img_web/typ_a.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 mb-2">
						<div class="card p-2 single-slider-post">
							<div class="row">
								<div class="col-md-12">
									<div class="single-slider-post__image mb-30">
										<a href="javascript:void(0)" id="plan_type_A">
											<img src="assets/img_web/typ_b.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 mb-2">
						<div class="card p-2 single-slider-post">
							<div class="row">
								<div class="col-md-12">
									<div class="single-slider-post__image mb-30">
										<a href="javascript:void(0)" id="plan_type_A">
											<img src="assets/img_web/typ_c.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 mb-2">
						<div class="card p-2 single-slider-post">
							<div class="row">
								<div class="col-md-12">
									<div class="single-slider-post__image mb-30">
										<a href="javascript:void(0)" id="plan_type_A">
											<img src="assets/img_web/typ_d.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-3">
				<div class="bg-dark card p-3 text-white">
					<h4 class="text-white">Floor plan type selection</h4>
					<p>In the first step of creating your built-in cabinet, click on the image to select the type of floor plan
						(type A , B , C or D ) according to where your built-in cabinet should be located.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container wide parameter_1" style="display:none">
		<div class="row">
			<div class="col-md-9">
				<h4>STEP 1: ENTER PARAMETERS (widths)</h4>
				<p>Enter the width of the built-in cabinet.</p>
				<div class="account-details-form">
					<form action="#" class="">
						<div class="row">
							<div class="col-md-3 d-flex flex-column justify-content-center">
								<div>
									<label>Left height </label>
									<input type="text" placeholder="" required="" id="" class="mx-1 para_lfh2 w-25"> in cm
								</div>
							</div>
							<div class="col-md-6">
								<img src="assets/img_web/box1.png" class="img-fluid w-100" alt="">
								<div class="depth1 form-inline">
									<label>Depth</label>
									<input type="text" placeholder="" required="" id="" class="border-0 mx-1 para_depth2 w-25"> in cm
								</div>
								<div class="text-center">
									<label>Width</label>
									<input type="text" placeholder="" id="" required="" class="para_width2 w-25"> in cm
								</div>
							</div>
							<div class="col-md-3 d-flex flex-column justify-content-center">
								<div>
									<label>Right height</label>
									<input type="text" placeholder="" required="" id="" class="w-25 para_rfh2 mx-1"> in cm
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<h3>Parameters:</h3>
				<div class="text-right">
					<label>Width</label>
					<input type="text" placeholder="" required="" id="para_width" onchange="parameter_width()" class="w-25 "> in cm
				</div>
				<div class="text-right">
					<label>Depth</label>
					<input type="text" placeholder="" required="" id="para_depth" class="w-25 "> in cm
				</div>
				<div class="text-right">
					<label>Left front height</label>
					<input type="text" placeholder="" required="" id="para_lfh" class="w-25 "> in cm
				</div>
				<div class="text-right">
					<label>Right front height</label>
					<input type="text" placeholder="" required="" id="para_rfh" class="w-25 "> in cm
				</div>
			</div>
		</div>
	</div>
</div> -->


<div class="product-category-container mb-md-90 mb-sm-90 pb-1">
	<div class="container wide">
		<!-- <div class=""> -->
		<!-- <div class="col-lg-6 col-md-6 col-12">
				<div class="builder_img">
					<img src="assets/img_web/image_w.jpg" alt="">
				</div>
			</div> -->
		<!-- <div class=""> -->
		<div class="row">
			<div class="col-md-1">
				<div class="progress-bar">
					<div class="step">
						<!-- <p>Name</p> -->
						<!-- <i class="fas fa-ruler"></i> -->
						<div class="bullet">
							<span>1</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<!-- <p>Name</p> -->
						<!-- <i class="fas fa-ruler"></i> -->
						<div class="bullet">
							<span>2</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<!-- <p>Contact</p> -->
						<div class="bullet">
							<span>3</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<!-- <p>Birth</p> -->
						<div class="bullet">
							<span>4</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<!-- <p>Debt</p> -->
						<div class="bullet">
							<span>5</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<!-- <p>Adress</p> -->
						<div class="bullet">
							<span>6</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<!-- <p>Submit</p> -->
						<div class="bullet">
							<span>7</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<div class="bullet">
							<span>8</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<div class="bullet">
							<span>9</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<div class="bullet">
							<span>10</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<div class="bullet">
							<span>11</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<div class="bullet">
							<span>12</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<div class="bullet">
							<span>13</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
					<div class="step">
						<div class="bullet">
							<span>14</span>
						</div>
						<div class="check fas fa-check"></div>
					</div>
				</div>
			</div>


			<div class="col-md-11">
				<div class="form-outer">
					<form action="#">
						<div class="page slide-page">
							<div class="title">Configurator for built-in cabinets</div>
							<!-- <h4>Select a Range</h4> -->
							<div class="radio-with-Icon built_in_cabinets">
								<p class="radioOption-Item">
									<input type="radio" name="range" id="BannerType11" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="BannerType11">
										<img src="assets/img_web/skrina.jpg" alt="">
										<!-- <i class="fa fa-image"></i> -->
										Built-in cabinet complete
									</label>
								</p>

								<p class="radioOption-Item">
									<input type="radio" name="range" id="BannerType21" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="BannerType21">
										<img src="assets/img_web/posuv.jpg" alt="">
										<!-- <i class="fa fa-image"></i> -->
										Front sliding system separately
									</label>
								</p>

								<p class="radioOption-Item">
									<input type="radio" name="range" id="BannerType31" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="BannerType31">
										<img src="assets/img_web/vnutro.jpg" alt="">
										<!-- <i class="fa fa-image"></i> -->
										The interior of the built-in cabinet separately
									</label>
								</p>
							</div>

							<div class="field btns">
								<button class="prev-1 prev">Previous</button>
								<button class="next-1 next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="title">Floor Plan</div>
							<!-- <h4>Select a Range</h4> -->
							<div class="radio-with-Icon floorPlan1">
								<p class="radioOption-Item">
									<input type="radio" name="floor_plan" id="planfloor1" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="planfloor1">
										<img src="assets/img_web/typ_a.png" alt="">
									</label>
								</p>

								<p class="radioOption-Item">
									<input type="radio" name="floor_plan" id="planfloor2" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="planfloor2">
										<img src="assets/img_web/typ_b.png" alt="">
									</label>
								</p>

								<p class="radioOption-Item">
									<input type="radio" name="floor_plan" id="planfloor3" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="planfloor3">
										<img src="assets/img_web/typ_c.png" alt="">
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="floor_plan" id="planfloor4" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="planfloor4">
										<img src="assets/img_web/typ_d.png" alt="">
									</label>
								</p>
							</div>

							<div class="field btns">
								<button class="prev-1 prev">Previous</button>
								<button class="next-1 next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="row">
								<div class="col-md-9">
									<h4>STEP 1: ENTER PARAMETERS (widths)</h4>
									<p>Enter the width of the built-in cabinet.</p>
									<div class="account-details-form">
										<div class="row">
											<div class="col-md-3 d-flex flex-column justify-content-center">
												<div>
													<label>Left height </label>
													<input type="text" placeholder="" id="" class="mx-1 para_lfh2 w-25"> in cm
												</div>
											</div>
											<div class="col-md-6">
												<img src="assets/img_web/box1.png" class="img-fluid w-100" alt="">
												<div class="depth1 form-inline">
													<label>Depth</label>
													<input type="text" placeholder="" id="" class="border-0 mx-1 para_depth2 w-25"> in cm
												</div>
												<div class="text-center">
													<label>Width</label>
													<input type="text" placeholder="" id="" class="para_width2 w-25"> in cm
												</div>
											</div>
											<div class="col-md-3 d-flex flex-column justify-content-center">
												<div>
													<label>Right height</label>
													<input type="text" placeholder="" id="" class="w-25 para_rfh2 mx-1"> in cm
												</div>
											</div>
										</div>

									</div>
								</div>
								<div class="col-md-3">
									<h3>Parameters:</h3>
									<div class="text-right">
										<label>Width</label>
										<input type="text" placeholder="" required="" id="para_width" onchange="parameter_width()" class="w-25 "> in cm
									</div>
									<div class="text-right">
										<label>Depth</label>
										<input type="text" placeholder="" required="" id="para_depth" class="w-25 "> in cm
									</div>
									<div class="text-right">
										<label>Left front height</label>
										<input type="text" placeholder="" required="" id="para_lfh" class="w-25 "> in cm
									</div>
									<div class="text-right">
										<label>Right front height</label>
										<input type="text" placeholder="" required="" id="para_rfh" class="w-25 "> in cm
									</div>
								</div>

								<div class="field btns">
									<button class="prev-1 prev">Previous</button>
									<button class="next-1 next btn-green">Next</button>
								</div>
							</div>
						</div>

						<div class="page">
							<div class="title">Self Installation Wardrobe Configurator:</div>

							<div class="title">DIMENSIONS</div>
							<p>Take care when measuring up, it is important that your measurements are accurate in order for you to get the perfect fit on your new wardrobe.</p>
							<h3 class="text-danger">ENTER THE REQUIRED SIZES</h3>
							<div class="field">
								<div class="label">WIDTH</div>
								<input type="text" required />
							</div>
							<div class="field">
								<div class="label">HEIGHT</div>
								<input type="text" required />
							</div>

							<h4>DEPTH</h4>
							<p>Our wardrobes have a default depth of 610mm. This is our standard and recommended sizing. If unsuitable and an alternative depth is required, please contact us.</p>

							<div class="field">
								<button class="prev-1 prev">Previous</button>
								<button class="firstNext next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="title">RANGE:</div>
							<br>
							<p>Choose from Trent (Coated Steel), Avon (Aluminium) or Thames (Aluminium) below.</p>
							<p><strong>Trent our entry range</strong>, which is the most cost effective steel frame system. <br>10 steel frame colour choices:<br> Silver / White / Black / Oak / Pearwood / Truffle Avola / Cream / Satin Gold / Stone Grey / Graphite</p>
							<p><strong>The Avon range is the entry point</strong> into Aluminium that is Stylish &amp; sleek.</p>
							<p>7 aluminium frame colour choices:<br> Natural Silver / Polished Silver / White / Graphite / Champagne / Black / Stone Grey</p>
							<p><strong>The Thames range</strong> is the high end Aluminium profiling elegantly featured.<br> 7 aluminium frame colour choices:<br>Natural Silver / Polished Silver / White / Graphite / Champagne / Black / Stone Grey</p>
							<h4>Select a Range</h4>
							<div class="radio-with-Icon">
								<p class="radioOption-Item">
									<input type="radio" name="range" id="BannerType1" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="BannerType1">
										<img src="assets/img_web/Trent-Profile.jpg" alt="">
										<!-- <i class="fa fa-image"></i> -->
										Trent
									</label>
								</p>

								<p class="radioOption-Item">
									<input type="radio" name="range" id="BannerType2" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="BannerType2">
										<img src="assets/img_web/Avon-Profile.jpg" alt="">
										<!-- <i class="fa fa-image"></i> -->
										Avon
									</label>
								</p>

								<p class="radioOption-Item">
									<input type="radio" name="range" id="BannerType3" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="BannerType3">
										<img src="assets/img_web/Thames-Profile.jpg" alt="">
										<!-- <i class="fa fa-image"></i> -->
										Thames
									</label>
								</p>
							</div>
							<div class="col-md-12 mt-3">
								<img src="assets/img_web/Glide-and-Slide-Profiles-PDF-1.jpg" alt="" class="w-100">
							</div>
							<div class="field btns">
								<button class="prev-1 prev">Previous</button>
								<button class="next-1 next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="title">NO. OF DOORS:</div>
							<p>Please select the number of doors you would like for your wardrobe.</p>
							<div class="form-group">
								<label for="numDoors">NUMBER OF DOORS</label>
								<select class="form-control" id="numDoors">
									<option>3 Doors</option>
									<option>4 Doors</option>
								</select>
							</div>
							<div class="field btns">
								<button class="prev-2 prev">Previous</button>
								<button class="next-2 next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="title">DOOR PANEL DESIGN:</div>
							<p>Select your panel design for each door.</p>
							<div class="accordion" id="accordionDoor">
								<div class="border-bottom card mb-2">
									<div class="card-header" id="doorOne" data-toggle="collapse" data-target="#collapseDoor1" aria-expanded="true" aria-controls="collapseDoor1">
										<h4 class="mb-0">Door 1</h4>
									</div>

									<div id="collapseDoor1" class="collapse show" aria-labelledby="doorOne" data-parent="#accordionDoor">
										<div class="card-body">
											<div class="radio-with-Icon">
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_1" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_1">
														<img src="assets/img_web/gsh1.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_2" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_2">
														<img src="assets/img_web/gsh2.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_3" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_3">
														<img src="assets/img_web/gsh3.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_4" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_4">
														<img src="assets/img_web/gsh4.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_5" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_5">
														<img src="assets/img_web/gsh5.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_6" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_6">
														<img src="assets/img_web/gsh8.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_7" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_7">
														<img src="assets/img_web/gsh11.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_8" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_8">
														<img src="assets/img_web/gsh12.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_9" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_9">
														<img src="assets/img_web/gsh14.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_10" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_10">
														<img src="assets/img_web/gsv1.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_11" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_11">
														<img src="assets/img_web/gsv3.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel1" id="door1_12" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door1_12">
														<img src="assets/img_web/gsv4.png" alt="">
													</label>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="border-bottom card mb-2">
									<div class="card-header" id="doorTwo" data-toggle="collapse" data-target="#collapseDoor2" aria-expanded="false" aria-controls="collapseDoor2">
										<h4 class="mb-0">Door 2</h4>
									</div>
									<div id="collapseDoor2" class="collapse" aria-labelledby="doorTwo" data-parent="#accordionDoor">
										<div class="card-body">
											<div class="radio-with-Icon">
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_1" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_1">
														<img src="assets/img_web/gsh1.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_2" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_2">
														<img src="assets/img_web/gsh2.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_3" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_3">
														<img src="assets/img_web/gsh3.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_4" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_4">
														<img src="assets/img_web/gsh4.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_5" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_5">
														<img src="assets/img_web/gsh5.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_6" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_6">
														<img src="assets/img_web/gsh8.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_7" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_7">
														<img src="assets/img_web/gsh11.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_8" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_8">
														<img src="assets/img_web/gsh12.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_9" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_9">
														<img src="assets/img_web/gsh14.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_10" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_10">
														<img src="assets/img_web/gsv1.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_11" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_11">
														<img src="assets/img_web/gsv3.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel2" id="door2_12" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door2_12">
														<img src="assets/img_web/gsv4.png" alt="">
													</label>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="border-bottom card mb-2">
									<div class="card-header" id="doorThree" data-toggle="collapse" data-target="#collapseDoor3" aria-expanded="false" aria-controls="collapseDoor3">
										<h4 class="mb-0">Door 3</h4>
									</div>
									<div id="collapseDoor3" class="collapse" aria-labelledby="doorThree" data-parent="#accordionDoor">
										<div class="card-body">
											<div class="radio-with-Icon">
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_1" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_1">
														<img src="assets/img_web/gsh1.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_2" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_2">
														<img src="assets/img_web/gsh2.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_3" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_3">
														<img src="assets/img_web/gsh3.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_4" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_4">
														<img src="assets/img_web/gsh4.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_5" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_5">
														<img src="assets/img_web/gsh5.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_6" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_6">
														<img src="assets/img_web/gsh8.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_7" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_7">
														<img src="assets/img_web/gsh11.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_8" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_8">
														<img src="assets/img_web/gsh12.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_9" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_9">
														<img src="assets/img_web/gsh14.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_10" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_10">
														<img src="assets/img_web/gsv1.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_11" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_11">
														<img src="assets/img_web/gsv3.png" alt="">
													</label>
												</p>
												<p class="radioOption-Item">
													<input type="radio" name="doorPanel3" id="door3_12" value="false" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
													<label for="door3_12">
														<img src="assets/img_web/gsv4.png" alt="">
													</label>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="field btns">
								<button class="prev-3 prev">Previous</button>
								<button class="next-3 next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="title">DOOR PANEL MATERIAL:</div>
							<p>Select the material/colour for each panel of each door. MFC is a laminated wood product with matching edging to suit colour. Note, all glass is safety backed.</p>
							<h4>DOOR 1</h4>
							<div class="form-group row">
								<label for="panel_door1_1" class="col-sm-4 col-form-label mb-2">Panel 1 finish</label>
								<div class="col-sm-8">
									<select name="door_panels[1][1]" class="form-control mb-2" id="panel_door1_1">
										<optgroup label="Glass">
											<option value="Anthracite">Anthracite</option>
											<option value="Aubergine">Aubergine</option>
											<option value="Blue Shadow">Blue Shadow</option>
											<option value="Bronze Mirror">Bronze Mirror</option>
											<option value="Cashmere">Cashmere</option>
											<option value="Classic Beige">Classic Beige</option>
											<option value="Classic Brown">Classic Brown</option>
											<option value="Classic Grey">Classic Grey</option>
											<option value="Dakar">Dakar</option>
											<option value="Dark Red">Dark Red</option>
											<option value="Fuchsia">Fuchsia</option>
											<option value="Grey Mirror">Grey Mirror</option>
											<option value="Light Beige">Light Beige</option>
											<option value="Light Brown">Light Brown</option>
											<option value="Luminous Red">Luminous Red</option>
											<option value="Metal Blue">Metal Blue</option>
											<option value="Metal Grey">Metal Grey</option>
											<option value="Metal Taupe">Metal Taupe</option>
											<option value="Ocean White">Ocean White</option>
											<option value="Pastel Blue">Pastel Blue</option>
											<option value="Pastel Green">Pastel Green</option>
											<option value="Pearl White">Pearl White</option>
											<option value="Pure White">Pure White</option>
											<option value="Rich Aluminium">Rich Aluminium</option>
											<option value="Silver Crackle">Silver Crackle</option>
											<option value="Silver Mirror" selected="">Silver Mirror</option>
											<option value="Soft White">Soft White</option>
											<option value="Starlight Black">Starlight Black</option>
											<option value="Stone Grey">Stone Grey</option>
										</optgroup>
										<optgroup label="MFC (laminated wood)">
											<option value="Alpine White">Alpine White</option>
											<option value="Bavarian Beech">Bavarian Beech</option>
											<option value="Black">Black</option>
											<option value="Cream">Cream</option>
											<option value="Graphite">Graphite</option>
											<option value="Light Calais Oak">Light Calais Oak</option>
											<option value="Maple">Maple</option>
											<option value="Quartz">Quartz</option>
											<option value="Silver Grey">Silver Grey</option>
											<option value="Tobacco Aida Walnut">Tobacco Aida Walnut</option>
											<option value="White Gloss">White Gloss</option>
										</optgroup>
									</select>
								</div>

								<label for="panel_door1_2" class="col-sm-4 col-form-label mb-2">Panel 2 finish</label>
								<div class="col-sm-8">
									<select name="door_panels[1][1]" class="form-control mb-2" id="panel_door1_2">
										<optgroup label="Glass">
											<option value="Anthracite">Anthracite</option>
											<option value="Aubergine">Aubergine</option>
											<option value="Blue Shadow">Blue Shadow</option>
											<option value="Bronze Mirror">Bronze Mirror</option>
											<option value="Cashmere">Cashmere</option>
											<option value="Classic Beige">Classic Beige</option>
											<option value="Classic Brown">Classic Brown</option>
											<option value="Classic Grey">Classic Grey</option>
											<option value="Dakar">Dakar</option>
											<option value="Dark Red">Dark Red</option>
											<option value="Fuchsia">Fuchsia</option>
											<option value="Grey Mirror">Grey Mirror</option>
											<option value="Light Beige">Light Beige</option>
											<option value="Light Brown">Light Brown</option>
											<option value="Luminous Red">Luminous Red</option>
											<option value="Metal Blue">Metal Blue</option>
											<option value="Metal Grey">Metal Grey</option>
											<option value="Metal Taupe">Metal Taupe</option>
											<option value="Ocean White">Ocean White</option>
											<option value="Pastel Blue">Pastel Blue</option>
											<option value="Pastel Green">Pastel Green</option>
											<option value="Pearl White">Pearl White</option>
											<option value="Pure White">Pure White</option>
											<option value="Rich Aluminium">Rich Aluminium</option>
											<option value="Silver Crackle">Silver Crackle</option>
											<option value="Silver Mirror" selected="">Silver Mirror</option>
											<option value="Soft White">Soft White</option>
											<option value="Starlight Black">Starlight Black</option>
											<option value="Stone Grey">Stone Grey</option>
										</optgroup>
										<optgroup label="MFC (laminated wood)">
											<option value="Alpine White">Alpine White</option>
											<option value="Bavarian Beech">Bavarian Beech</option>
											<option value="Black">Black</option>
											<option value="Cream">Cream</option>
											<option value="Graphite">Graphite</option>
											<option value="Light Calais Oak">Light Calais Oak</option>
											<option value="Maple">Maple</option>
											<option value="Quartz">Quartz</option>
											<option value="Silver Grey">Silver Grey</option>
											<option value="Tobacco Aida Walnut">Tobacco Aida Walnut</option>
											<option value="White Gloss">White Gloss</option>
										</optgroup>
									</select>
								</div>
							</div>

							<h4>DOOR 2</h4>
							<div class="form-group row">
								<label for="panel_door2_1" class="col-sm-4 col-form-label mb-2">Panel 1 finish</label>
								<div class="col-sm-8">
									<select name="door_panels[1][1]" class="form-control mb-2" id="panel_door2_1">
										<optgroup label="Glass">
											<option value="Anthracite">Anthracite</option>
											<option value="Aubergine">Aubergine</option>
											<option value="Blue Shadow">Blue Shadow</option>
											<option value="Bronze Mirror">Bronze Mirror</option>
											<option value="Cashmere">Cashmere</option>
											<option value="Classic Beige">Classic Beige</option>
											<option value="Classic Brown">Classic Brown</option>
											<option value="Classic Grey">Classic Grey</option>
											<option value="Dakar">Dakar</option>
											<option value="Dark Red">Dark Red</option>
											<option value="Fuchsia">Fuchsia</option>
											<option value="Grey Mirror">Grey Mirror</option>
											<option value="Light Beige">Light Beige</option>
											<option value="Light Brown">Light Brown</option>
											<option value="Luminous Red">Luminous Red</option>
											<option value="Metal Blue">Metal Blue</option>
											<option value="Metal Grey">Metal Grey</option>
											<option value="Metal Taupe">Metal Taupe</option>
											<option value="Ocean White">Ocean White</option>
											<option value="Pastel Blue">Pastel Blue</option>
											<option value="Pastel Green">Pastel Green</option>
											<option value="Pearl White">Pearl White</option>
											<option value="Pure White">Pure White</option>
											<option value="Rich Aluminium">Rich Aluminium</option>
											<option value="Silver Crackle">Silver Crackle</option>
											<option value="Silver Mirror" selected="">Silver Mirror</option>
											<option value="Soft White">Soft White</option>
											<option value="Starlight Black">Starlight Black</option>
											<option value="Stone Grey">Stone Grey</option>
										</optgroup>
										<optgroup label="MFC (laminated wood)">
											<option value="Alpine White">Alpine White</option>
											<option value="Bavarian Beech">Bavarian Beech</option>
											<option value="Black">Black</option>
											<option value="Cream">Cream</option>
											<option value="Graphite">Graphite</option>
											<option value="Light Calais Oak">Light Calais Oak</option>
											<option value="Maple">Maple</option>
											<option value="Quartz">Quartz</option>
											<option value="Silver Grey">Silver Grey</option>
											<option value="Tobacco Aida Walnut">Tobacco Aida Walnut</option>
											<option value="White Gloss">White Gloss</option>
										</optgroup>
									</select>
								</div>

								<label for="panel_door2_2" class="col-sm-4 col-form-label mb-2">Panel 2 finish</label>
								<div class="col-sm-8">
									<select name="door_panels[1][1]" class="form-control mb-2" id="panel_door2_2">
										<optgroup label="Glass">
											<option value="Anthracite">Anthracite</option>
											<option value="Aubergine">Aubergine</option>
											<option value="Blue Shadow">Blue Shadow</option>
											<option value="Bronze Mirror">Bronze Mirror</option>
											<option value="Cashmere">Cashmere</option>
											<option value="Classic Beige">Classic Beige</option>
											<option value="Classic Brown">Classic Brown</option>
											<option value="Classic Grey">Classic Grey</option>
											<option value="Dakar">Dakar</option>
											<option value="Dark Red">Dark Red</option>
											<option value="Fuchsia">Fuchsia</option>
											<option value="Grey Mirror">Grey Mirror</option>
											<option value="Light Beige">Light Beige</option>
											<option value="Light Brown">Light Brown</option>
											<option value="Luminous Red">Luminous Red</option>
											<option value="Metal Blue">Metal Blue</option>
											<option value="Metal Grey">Metal Grey</option>
											<option value="Metal Taupe">Metal Taupe</option>
											<option value="Ocean White">Ocean White</option>
											<option value="Pastel Blue">Pastel Blue</option>
											<option value="Pastel Green">Pastel Green</option>
											<option value="Pearl White">Pearl White</option>
											<option value="Pure White">Pure White</option>
											<option value="Rich Aluminium">Rich Aluminium</option>
											<option value="Silver Crackle">Silver Crackle</option>
											<option value="Silver Mirror" selected="">Silver Mirror</option>
											<option value="Soft White">Soft White</option>
											<option value="Starlight Black">Starlight Black</option>
											<option value="Stone Grey">Stone Grey</option>
										</optgroup>
										<optgroup label="MFC (laminated wood)">
											<option value="Alpine White">Alpine White</option>
											<option value="Bavarian Beech">Bavarian Beech</option>
											<option value="Black">Black</option>
											<option value="Cream">Cream</option>
											<option value="Graphite">Graphite</option>
											<option value="Light Calais Oak">Light Calais Oak</option>
											<option value="Maple">Maple</option>
											<option value="Quartz">Quartz</option>
											<option value="Silver Grey">Silver Grey</option>
											<option value="Tobacco Aida Walnut">Tobacco Aida Walnut</option>
											<option value="White Gloss">White Gloss</option>
										</optgroup>
									</select>
								</div>
							</div>

							<h4>DOOR 3</h4>
							<div class="form-group row">
								<label for="panel_door3_1" class="col-sm-4 col-form-label mb-2">Panel 1 finish</label>
								<div class="col-sm-8">
									<select name="door_panels[1][1]" class="form-control mb-2" id="panel_door3_1">
										<optgroup label="Glass">
											<option value="Anthracite">Anthracite</option>
											<option value="Aubergine">Aubergine</option>
											<option value="Blue Shadow">Blue Shadow</option>
											<option value="Bronze Mirror">Bronze Mirror</option>
											<option value="Cashmere">Cashmere</option>
											<option value="Classic Beige">Classic Beige</option>
											<option value="Classic Brown">Classic Brown</option>
											<option value="Classic Grey">Classic Grey</option>
											<option value="Dakar">Dakar</option>
											<option value="Dark Red">Dark Red</option>
											<option value="Fuchsia">Fuchsia</option>
											<option value="Grey Mirror">Grey Mirror</option>
											<option value="Light Beige">Light Beige</option>
											<option value="Light Brown">Light Brown</option>
											<option value="Luminous Red">Luminous Red</option>
											<option value="Metal Blue">Metal Blue</option>
											<option value="Metal Grey">Metal Grey</option>
											<option value="Metal Taupe">Metal Taupe</option>
											<option value="Ocean White">Ocean White</option>
											<option value="Pastel Blue">Pastel Blue</option>
											<option value="Pastel Green">Pastel Green</option>
											<option value="Pearl White">Pearl White</option>
											<option value="Pure White">Pure White</option>
											<option value="Rich Aluminium">Rich Aluminium</option>
											<option value="Silver Crackle">Silver Crackle</option>
											<option value="Silver Mirror" selected="">Silver Mirror</option>
											<option value="Soft White">Soft White</option>
											<option value="Starlight Black">Starlight Black</option>
											<option value="Stone Grey">Stone Grey</option>
										</optgroup>
										<optgroup label="MFC (laminated wood)">
											<option value="Alpine White">Alpine White</option>
											<option value="Bavarian Beech">Bavarian Beech</option>
											<option value="Black">Black</option>
											<option value="Cream">Cream</option>
											<option value="Graphite">Graphite</option>
											<option value="Light Calais Oak">Light Calais Oak</option>
											<option value="Maple">Maple</option>
											<option value="Quartz">Quartz</option>
											<option value="Silver Grey">Silver Grey</option>
											<option value="Tobacco Aida Walnut">Tobacco Aida Walnut</option>
											<option value="White Gloss">White Gloss</option>
										</optgroup>
									</select>
								</div>

								<label for="panel_door3_2" class="col-sm-4 col-form-label mb-2">Panel 2 finish</label>
								<div class="col-sm-8">
									<select name="door_panels[1][1]" class="form-control mb-2" id="panel_door3_2">
										<optgroup label="Glass">
											<option value="Anthracite">Anthracite</option>
											<option value="Aubergine">Aubergine</option>
											<option value="Blue Shadow">Blue Shadow</option>
											<option value="Bronze Mirror">Bronze Mirror</option>
											<option value="Cashmere">Cashmere</option>
											<option value="Classic Beige">Classic Beige</option>
											<option value="Classic Brown">Classic Brown</option>
											<option value="Classic Grey">Classic Grey</option>
											<option value="Dakar">Dakar</option>
											<option value="Dark Red">Dark Red</option>
											<option value="Fuchsia">Fuchsia</option>
											<option value="Grey Mirror">Grey Mirror</option>
											<option value="Light Beige">Light Beige</option>
											<option value="Light Brown">Light Brown</option>
											<option value="Luminous Red">Luminous Red</option>
											<option value="Metal Blue">Metal Blue</option>
											<option value="Metal Grey">Metal Grey</option>
											<option value="Metal Taupe">Metal Taupe</option>
											<option value="Ocean White">Ocean White</option>
											<option value="Pastel Blue">Pastel Blue</option>
											<option value="Pastel Green">Pastel Green</option>
											<option value="Pearl White">Pearl White</option>
											<option value="Pure White">Pure White</option>
											<option value="Rich Aluminium">Rich Aluminium</option>
											<option value="Silver Crackle">Silver Crackle</option>
											<option value="Silver Mirror" selected="">Silver Mirror</option>
											<option value="Soft White">Soft White</option>
											<option value="Starlight Black">Starlight Black</option>
											<option value="Stone Grey">Stone Grey</option>
										</optgroup>
										<optgroup label="MFC (laminated wood)">
											<option value="Alpine White">Alpine White</option>
											<option value="Bavarian Beech">Bavarian Beech</option>
											<option value="Black">Black</option>
											<option value="Cream">Cream</option>
											<option value="Graphite">Graphite</option>
											<option value="Light Calais Oak">Light Calais Oak</option>
											<option value="Maple">Maple</option>
											<option value="Quartz">Quartz</option>
											<option value="Silver Grey">Silver Grey</option>
											<option value="Tobacco Aida Walnut">Tobacco Aida Walnut</option>
											<option value="White Gloss">White Gloss</option>
										</optgroup>
									</select>
								</div>
							</div>

							<div class="field btns">
								<button class="prev-4 prev">Previous</button>
								<button class="next-4 next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="title">FRAME COLOURS:</div>
							<p>Choose a frame colour from the range below.</p>

							<h4>SELECT A FRAME COLOUR</h4>
							<div class="radio-with-Icon fr_col">
								<p class="radioOption-Item">
									<input type="radio" name="frameColour" id="frame_col1" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="frame_col1">
										<img src="assets/img_web/Brushed_Champagne.jpg" alt="">
										Brushed Champagne
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="frameColour" id="frame_col2" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="frame_col2">
										<img src="assets/img_web/Brushed_Silver.jpg" alt="">
										Brushed Silver<br><br>
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="frameColour" id="frame_col3" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="frame_col3">
										<img src="assets/img_web/Champagne.jpg" alt="">
										Champagne<br><br>
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="frameColour" id="frame_col4" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="frame_col4">
										<img src="assets/img_web/Olive.jpg" alt="">
										Olive<br><br>
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="frameColour" id="frame_col5" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="frame_col5">
										<img src="assets/img_web/Polished_Graphite.jpg" alt="">
										Polished Graphite
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="frameColour" id="frame_col6" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="frame_col6">
										<img src="assets/img_web/Polished_Silver.jpg" alt="">
										Polished Silver<br><br>
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="frameColour" id="frame_col7" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="frame_col7">
										<img src="assets/img_web/Silver.jpg" alt="">
										Silver<br><br>
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="frameColour" id="frame_col8" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="frame_col8">
										<img src="assets/img_web/White.jpg" alt="">
										White<br><br>
									</label>
								</p>
							</div>
							<div class="field btns">
								<button class="prev-5 prev">Previous</button>
								<button class="next-5 next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="title">END PANELS:</div>
							<p>End panels are required if you won’t have a wall either side of your wardrobe. The end panel forms a side for your wardrobe where a wall can’t be used. Please select quantity needed below.</p>
							<div class="form-group">
								<label for="endPanels">DO YOU REQUIRE END PANELS?</label>
								<select name="end_panels" class="form-control" id="endPanels">
									<option value="No">No</option>
									<option value="Left only">Yes, left only</option>
									<option value="Right only">Yes, right only</option>
									<option value="Left and Right">Yes, left and right</option>
								</select>
							</div>
							<div class="field btns">
								<button class="prev-6 prev">Previous</button>
								<button class="next-6 next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="title">LINERS:</div>
							<p>Liners are 90mm x 18mm x 2800mm laminated and edged MFC. They are used all around the door set to add strength and a straight edge. They will require trimming to length and may require packing to ensure they are plumb/level against the walls or along the ceiling and floor.</p>
							<div class="form-group">
								<label for="liners">DO YOU REQUIRE DOOR LINER(S)?</label>
								<select name="liners" class="form-control" id="liners">
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								</select>
							</div>
							<div class="field btns">
								<button class="prev-6 prev">Previous</button>
								<button class="next-6 next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="title">INTERIOR LAYOUT:</div>
							<p>If you would like an interior layout, please choose from the selection below.</p>
							<div class="radio-with-Icon img_interior">
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_1" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_1">
										<img src="assets/img_web/interior-01.jpg" alt="">
										Option 1
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_2" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_2">
										<img src="assets/img_web/interior-02.jpg" alt="">
										Option 2
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_3" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_3">
										<img src="assets/img_web/interior-03.jpg" alt="">
										Option 3
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_4" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_4">
										<img src="assets/img_web/interior-04.jpg" alt="">
										Option 4
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_5" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_5">
										<img src="assets/img_web/interior-05.jpg" alt="">
										Option 5
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_6" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_6">
										<img src="assets/img_web/interior-06.jpg" alt="">
										Option 6
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_7" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_7">
										<img src="assets/img_web/interior-07.jpg" alt="">
										Option 7
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_8" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_8">
										<img src="assets/img_web/interior-08.jpg" alt="">
										Option 8
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_9" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_9">
										<img src="assets/img_web/interior-09.jpg" alt="">
										Option 9
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_10" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_10">
										<img src="assets/img_web/interior-10.jpg" alt="">
										Option 10
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_11" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_11">
										<img src="assets/img_web/interior-11.jpg" alt="">
										Option 11
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_12" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_12">
										<img src="assets/img_web/interior-12.jpg" alt="">
										Option 12
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_13" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_13">
										<img src="assets/img_web/interior-13.jpg" alt="">
										Option 13
									</label>
								</p>
								<p class="radioOption-Item">
									<input type="radio" name="interiorLayout" id="interior_lay1_14" value="true" class="ng-valid ng-dirty ng-touched ng-empty" aria-invalid="false" style="">
									<label for="interior_lay1_14">
										<img src="assets/img_web/interior-14.jpg" alt="">
										Option 14
									</label>
								</p>
							</div>
							<div class="field btns">
								<button class="prev-6 prev">Previous</button>
								<button class="next-6 next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="title">STAND-ALONE BEDROOM FURNITURE</div>
							<p>Tower/Unit Specification 18mm MFC, 16mm Drawer Bases and Backs, Metal Drawer Sides, High Quality Soft Close Feature Available on all Drawers.</p>
							<p>Handle Specification Brushed Nickle, Overall Length 154mm, Height 30mm, Width 7mm, Centres 128mm</p>
							<div class="accordion" id="accordionDrawers">
								<div class="border-bottom card mb-2">
									<div class="card-header" id="drawersOne" data-toggle="collapse" data-target="#collapseDrawers1" aria-expanded="true" aria-controls="collapseDrawers1">
										<h4 class="mb-0">2 Drawer Chest of Drawers</h4>
									</div>

									<div id="collapseDrawers1" class="collapse show" aria-labelledby="drawersOne" data-parent="#accordionDrawers">
										<div class="card-body">
											<div class="form-group row">
												<div class="col-md-12">
													<p>Dimensions: 456mm (H) x 490mm (D) x widths as below</p>
													<img src="assets/img_web/2_standalone_500.gif" alt="">
												</div>
												<label for="drawerChest1_1" class="col-sm-4 col-form-label mb-2">Width 400mm</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[400mm]" class="form-control mb-2" id="drawerChest1_1">
														<option value="0" selected="">Not required</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
												</div>

												<label for="drawerChest1_2" class="col-sm-4 col-form-label mb-2">Width 500mm</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[500mm]" class="form-control mb-2" id="drawerChest1_2">
														<option value="0" selected="">Not required</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
												</div>

												<label for="drawerChest1_3" class="col-sm-4 col-form-label mb-2">Width 600mm</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[600mm]" class="form-control mb-2" id="drawerChest1_3">
														<option value="0" selected="">Not required</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
												</div>

												<label for="drawerFinish1_3" class="col-sm-4 col-form-label mb-2">Finish</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[finish]" class="form-control mb-2" id="drawerFinish1_3">
														<option value="Alpine White">Alpine White</option>
														<option value="Bavarian Beech">Bavarian Beech</option>
														<option value="Black">Black</option>
														<option value="Cream">Cream</option>
														<option value="Graphite">Graphite</option>
														<option value="Light Calais Oak">Light Calais Oak</option>
														<option value="Maple">Maple</option>
														<option value="Quartz">Quartz</option>
														<option value="Silver Grey">Silver Grey</option>
														<option value="Tobacco Aida Walnut">Tobacco Aida Walnut</option>
														<option value="White Gloss">White Gloss</option>
													</select>
												</div>

												<label for="drawerSoftClose1_3" class="col-sm-4 col-form-label mb-2">Soft Close Drawers?</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[finish]" class="form-control mb-2" id="drawerSoftClose1_3">
														<option value="No">No</option>
														<option value="Yes">Yes</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="border-bottom card mb-2">
									<div class="card-header" id="drawersTwo" data-toggle="collapse" data-target="#collapseDrawers2" aria-expanded="false" aria-controls="collapseDrawers2">
										<h4 class="mb-0">3 Drawer Chest of Drawers</h4>
									</div>
									<div id="collapseDrawers2" class="collapse" aria-labelledby="drawersTwo" data-parent="#accordionDrawers">
										<div class="card-body">
											<div class="form-group row">
												<div class="col-md-12">
													<p>Dimensions: 621mm (H) x 490mm (D) x widths as below</p>
													<img src="assets/img_web/3_standalone_500.gif" alt="">
												</div>
												<label for="drawerChest2_1" class="col-sm-4 col-form-label mb-2">Width 400mm</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[400mm]" class="form-control mb-2" id="drawerChest2_1">
														<option value="0" selected="">Not required</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
												</div>

												<label for="drawerChest2_2" class="col-sm-4 col-form-label mb-2">Width 500mm</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[500mm]" class="form-control mb-2" id="drawerChest2_2">
														<option value="0" selected="">Not required</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
												</div>

												<label for="drawerChest3_3" class="col-sm-4 col-form-label mb-2">Width 600mm</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[600mm]" class="form-control mb-2" id="drawerChest3_3">
														<option value="0" selected="">Not required</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
												</div>

												<label for="drawerFinish2_3" class="col-sm-4 col-form-label mb-2">Finish</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[finish]" class="form-control mb-2" id="drawerFinish2_3">
														<option value="Alpine White">Alpine White</option>
														<option value="Bavarian Beech">Bavarian Beech</option>
														<option value="Black">Black</option>
														<option value="Cream">Cream</option>
														<option value="Graphite">Graphite</option>
														<option value="Light Calais Oak">Light Calais Oak</option>
														<option value="Maple">Maple</option>
														<option value="Quartz">Quartz</option>
														<option value="Silver Grey">Silver Grey</option>
														<option value="Tobacco Aida Walnut">Tobacco Aida Walnut</option>
														<option value="White Gloss">White Gloss</option>
													</select>
												</div>

												<label for="drawerSoftClose2_3" class="col-sm-4 col-form-label mb-2">Soft Close Drawers?</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[finish]" class="form-control mb-2" id="drawerSoftClose2_3">
														<option value="No">No</option>
														<option value="Yes">Yes</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="border-bottom card mb-2">
									<div class="card-header" id="drawersThree" data-toggle="collapse" data-target="#collapseDrawers3" aria-expanded="false" aria-controls="collapseDrawers3">
										<h4 class="mb-0">4 Drawer Chest of Drawers</h4>
									</div>
									<div id="collapseDrawers3" class="collapse" aria-labelledby="drawersThree" data-parent="#accordionDrawers">
										<div class="card-body">
											<div class="form-group row">
												<div class="col-md-12">
													<p>Dimensions: 786mm (H) x 490mm (D) x widths as below</p>
													<img src="assets/img_web/4_standalone_500.gif" alt="">
												</div>
												<label for="drawerChest1_1" class="col-sm-4 col-form-label mb-2">Width 400mm</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[400mm]" class="form-control mb-2" id="drawerChest1_1">
														<option value="0" selected="">Not required</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
												</div>

												<label for="drawerChest1_2" class="col-sm-4 col-form-label mb-2">Width 500mm</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[500mm]" class="form-control mb-2" id="drawerChest1_2">
														<option value="0" selected="">Not required</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
												</div>

												<label for="drawerChest1_3" class="col-sm-4 col-form-label mb-2">Width 600mm</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[600mm]" class="form-control mb-2" id="drawerChest1_3">
														<option value="0" selected="">Not required</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
												</div>

												<label for="drawerFinish1_3" class="col-sm-4 col-form-label mb-2">Finish</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[finish]" class="form-control mb-2" id="drawerFinish1_3">
														<option value="Alpine White">Alpine White</option>
														<option value="Bavarian Beech">Bavarian Beech</option>
														<option value="Black">Black</option>
														<option value="Cream">Cream</option>
														<option value="Graphite">Graphite</option>
														<option value="Light Calais Oak">Light Calais Oak</option>
														<option value="Maple">Maple</option>
														<option value="Quartz">Quartz</option>
														<option value="Silver Grey">Silver Grey</option>
														<option value="Tobacco Aida Walnut">Tobacco Aida Walnut</option>
														<option value="White Gloss">White Gloss</option>
													</select>
												</div>

												<label for="drawerSoftClose1_3" class="col-sm-4 col-form-label mb-2">Soft Close Drawers?</label>
												<div class="col-sm-8">
													<select name="2_drawer_standalone_unit[finish]" class="form-control mb-2" id="drawerSoftClose1_3">
														<option value="No">No</option>
														<option value="Yes">Yes</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="field btns">
								<button class="prev-3 prev">Previous</button>
								<button class="next-3 next btn-green">Next</button>
							</div>
						</div>

						<div class="page">
							<div class="title">REVIEW YOUR BUILD</div>
							<p>Please now review your build and continue to the payment page when you are happy to proceed.</p>
							<table class="table">
								<tbody>
									<tr>
										<th>Width</th>
										<td>2500mm</td>
									</tr>
									<tr>
										<th>Height</th>
										<td>1200mm</td>
									</tr>
									<tr>
										<th>Range</th>
										<td>Thames</td>
									</tr>
									<tr>
										<th>Track Set</th>
										<td>Included</td>
									</tr>
									<tr>
										<th>Number of Doors</th>
										<td>3</td>
									</tr>
									<tr>
										<th>Door 1 Design</th>
										<td>GSH1</td>
									</tr>
									<tr>
										<th>Door 2 Design</th>
										<td>GSH2</td>
									</tr>
									<tr>
										<th>Door 3 Design</th>
										<td>GSH3</td>
									</tr>
									<tr>
										<th>Door 1 Finish</th>
										<td>Silver Mirror</td>
									</tr>
									<tr>
										<th>Door 2, Panel 1 Finish</th>
										<td>Silver Mirror</td>
									</tr>
									<tr>
										<th>Door 2, Panel 2 Finish</th>
										<td>Silver Mirror</td>
									</tr>
									<tr>
										<th>Door 3, Panel 1 Finish</th>
										<td>Silver Mirror</td>
									</tr>
									<tr>
										<th>Door 3, Panel 2 Finish</th>
										<td>Silver Mirror</td>
									</tr>
									<tr>
										<th>Door 3, Panel 3 Finish</th>
										<td>Silver Mirror</td>
									</tr>
									<tr>
										<th>Frame</th>
										<td>White</td>
									</tr>
									<tr>
										<th>End Panels</th>
										<td>No</td>
									</tr>
									<tr>
										<th>Door Liners</th>
										<td>No</td>
									</tr>
									<tr>
										<th>Interior Layout</th>
										<td>Option 13</td>
									</tr>
									<tr>
										<th>
											<h3>EXTERIOR PRICE</h3>
										</th>
										<td>
											<h3>£684.50</h3>
										</td>
									</tr>
									<tr>
										<th>
											<h3>INTERIOR PRICE</h3>
										</th>
										<td>
											<h3>£478.00</h3>
										</td>
									</tr>
								</tbody>
							</table>
							<button type="button" class="btn btn-primary"><i class="ion-printer"></i> Print</button>
							<p><b>Please note: Prices do not include VAT and DELIVERY at this point.</b></p>
							<!-- <div class="form-group">
										<label for="numDoors">NUMBER OF DOORS</label>
										<select class="form-control" id="numDoors">
											<option>3 Doors</option>
											<option>4 Doors</option>
										</select>
									</div> -->
							<div class="field btns">
								<button class="prev-2 prev">Previous</button>
								<button class="next-2 next btn-primary ">Add to Basket</button>
							</div>
						</div>

					</form>
				</div>
			</div>

		</div>
		<!-- </div> -->

		<!-- </div> -->
	</div>
</div>

<?php include("include/footer.php"); ?>
<script>
	$(document).ready(function() {
		$("#Built_in").click(function() {
			$(".three_ctg").hide();
			$(".four_opt").show();
			$(".parameter_1").hide();
		});
		$("#plan_type_A").click(function() {
			$(".three_ctg").hide();
			$(".four_opt").hide();
			$(".parameter_1").show();
		});
	});
</script>

<script>
	initMultiStepForm();

	function initMultiStepForm() {
		const progressNumber = document.querySelectorAll(".step").length;
		const slidePage = document.querySelector(".slide-page");
		const submitBtn = document.querySelector(".submit");
		const progressText = document.querySelectorAll(".step");
		const progressCheck = document.querySelectorAll(".step .check");
		const bullet = document.querySelectorAll(".step .bullet");
		const pages = document.querySelectorAll(".page");
		const nextButtons = document.querySelectorAll(".next");
		const prevButtons = document.querySelectorAll(".prev");
		const stepsNumber = pages.length;

		if (progressNumber !== stepsNumber) {
			console.warn(
				"Error, number of steps in progress bar do not match number of pages"
			);
		}

		document.documentElement.style.setProperty("--stepNumber", stepsNumber);

		let current = 1;

		for (let i = 0; i < nextButtons.length; i++) {
			nextButtons[i].addEventListener("click", function(event) {
				event.preventDefault();

				inputsValid = validateInputs(this);
				// inputsValid = true;

				if (inputsValid) {
					slidePage.style.marginLeft = `-${
                    (100 / stepsNumber) * current
                }%`;
					bullet[current - 1].classList.add("active");
					progressCheck[current - 1].classList.add("active");
					progressText[current - 1].classList.add("active");
					current += 1;
				}
			});
		}

		for (let i = 0; i < prevButtons.length; i++) {
			prevButtons[i].addEventListener("click", function(event) {
				event.preventDefault();
				slidePage.style.marginLeft = `-${
                (100 / stepsNumber) * (current - 2)
            }%`;
				bullet[current - 2].classList.remove("active");
				progressCheck[current - 2].classList.remove("active");
				progressText[current - 2].classList.remove("active");
				current -= 1;
			});
		}
		// submitBtn.addEventListener("click", function() {
		// 	bullet[current - 1].classList.add("active");
		// 	progressCheck[current - 1].classList.add("active");
		// 	progressText[current - 1].classList.add("active");
		// 	current += 1;
		// 	setTimeout(function() {
		// 		alert("Your Form Successfully Signed up");
		// 		location.reload();
		// 	}, 800);
		// });

		function validateInputs(ths) {
			let inputsValid = true;

			const inputs =
				ths.parentElement.parentElement.querySelectorAll("input");
			for (let i = 0; i < inputs.length; i++) {
				const valid = inputs[i].checkValidity();
				if (!valid) {
					inputsValid = false;
					inputs[i].classList.add("invalid-input");
				} else {
					inputs[i].classList.remove("invalid-input");
				}
			}
			return inputsValid;
		}
	}
</script>

<script>
	function parameter_width() {
		let val_width = document.getElementById('para_width');
		val_width.addEventListener('change', function() {
			alert('you enterd:' + this.value);
		})
	}
</script>