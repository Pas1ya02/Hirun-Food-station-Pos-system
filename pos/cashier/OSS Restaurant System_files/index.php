<!DOCTYPE html>
<!-- saved from url=(0058)https://onlinesoftwaresolution.com/restaurant/poin-of-sale -->
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="https://onlinesoftwaresolution.com/restaurant/favicon.ico">
	<title>OSS Restaurant System</title>
	<link rel="stylesheet" href="./OSS Restaurant System_files/cus_css.css">

	<script src="./OSS Restaurant System_files/jquery-3.5.1.js.download"></script>
	<script src="./OSS Restaurant System_files/jquery.dataTables.min.js.download"></script>
	<script src="./OSS Restaurant System_files/dataTables.bootstrap4.min.js.download"></script>
	<link rel="stylesheet" href="./OSS Restaurant System_files/bootstrap.css">
	<link rel="stylesheet" href="./OSS Restaurant System_files/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" href="./OSS Restaurant System_files/sweetalert2.min.css">
	<script src="./OSS Restaurant System_files/sweetalert2.min.js.download"></script>

	<link rel="stylesheet" href="./OSS Restaurant System_files/font-awesome.css">
	<link rel="stylesheet" href="./OSS Restaurant System_files/font-awesome.min.css">
</head>

<body>
	<script>
		window.addEventListener("load", function() {
			var load_screen = document.getElementById('load_screen');
			document.body.removeChild(load_screen);
		});
	</script>







	<table style="width: 100%; height: 100vh;">
		<tbody>
			<tr style="height: 70px;">
				<td colspan="2" style="background-color: black; padding-top: 5px; padding-left: 10px; padding-bottom: 5px;">

					<table style="color: white;">
						<tbody>
							<tr>
								<td>System ID<br><input name="bill_id" type="text" class="form-control form-control-sm" id="bill_id" value="1696863917" readonly=""></td>
								<td class="pl-2">User<br><input type="text" class="form-control form-control-sm" readonly="" value="Guest"></td>
								<td class="pl-2">Start Time<br><input type="text" class="form-control form-control-sm" readonly="" value="08:35:17 PM"></td>
								<td class="pl-2">&nbsp;<br><a href="https://onlinesoftwaresolution.com/restaurant/dashboard" class="btn btn-sm btn-secondary">Exit POS</a></td>
								<td class="pl-2">&nbsp;<br><a href="https://onlinesoftwaresolution.com/restaurant/logout" class="btn btn-sm btn-danger">Logout</a></td>
							</tr>
						</tbody>
					</table>

				</td>
				<td rowspan="2" valign="top" style="width: 25%;">

					<div class="cat-div">
						<div class="cat-sub" onclick="filte_cat(&#39;all&#39;);">All Item's</div>
						<div class="cat-sub" onclick="filte_cat(&#39;1&#39;);">BBQ</div>
						<div class="cat-sub" onclick="filte_cat(&#39;21&#39;);">Beef</div>
						<div class="cat-sub" onclick="filte_cat(&#39;2&#39;);">Bite &amp; Snack</div>
						<div class="cat-sub" onclick="filte_cat(&#39;26&#39;);">Breakfast </div>
						<div class="cat-sub" onclick="filte_cat(&#39;24&#39;);">Cake</div>
						<div class="cat-sub" onclick="filte_cat(&#39;3&#39;);">Chicken</div>
						<div class="cat-sub" onclick="filte_cat(&#39;4&#39;);">Chopsuey Rice / Noodles</div>
						<div class="cat-sub" onclick="filte_cat(&#39;5&#39;);">Cold Beverage</div>
						<div class="cat-sub" onclick="filte_cat(&#39;6&#39;);">Cuttle Fish</div>
						<div class="cat-sub" onclick="filte_cat(&#39;7&#39;);">Desserts</div>
						<div class="cat-sub" onclick="filte_cat(&#39;19&#39;);">Dhal Curry</div>
						<div class="cat-sub" onclick="filte_cat(&#39;23&#39;);">Flower Deco</div>
						<div class="cat-sub" onclick="filte_cat(&#39;8&#39;);">Fresh From The Ocean</div>
						<div class="cat-sub" onclick="filte_cat(&#39;9&#39;);">Fresh Fruit Juice</div>
						<div class="cat-sub" onclick="filte_cat(&#39;10&#39;);">Freshly Made Salads</div>
						<div class="cat-sub" onclick="filte_cat(&#39;11&#39;);">Hot Beverage</div>
						<div class="cat-sub" onclick="filte_cat(&#39;25&#39;);">Ingredianc</div>
						<div class="cat-sub" onclick="filte_cat(&#39;22&#39;);">Liq</div>
						<div class="cat-sub" onclick="filte_cat(&#39;20&#39;);">Lunch Srilankan</div>
						<div class="cat-sub" onclick="filte_cat(&#39;12&#39;);">Medium Prawns</div>
						<div class="cat-sub" onclick="filte_cat(&#39;13&#39;);">Mix Grill</div>
						<div class="cat-sub" onclick="filte_cat(&#39;14&#39;);">Omelets (Eggs 03 Nos)</div>
						<div class="cat-sub" onclick="filte_cat(&#39;15&#39;);">Pork</div>
						<div class="cat-sub" onclick="filte_cat(&#39;16&#39;);">Rice / Noodles</div>
						<div class="cat-sub" onclick="filte_cat(&#39;17&#39;);">Soft Drinks</div>
						<div class="cat-sub" onclick="filte_cat(&#39;18&#39;);">Soup</div>
					</div>


				</td>
			</tr>
			<tr>
				<td valign="top" style="width: 30%; background-color: #EEEEEE;">

					<table style="width: 100%; margin-bottom: 5px; margin-top: 10px;">
						<tbody>

							<tr>
								<th colspan="2">
									<table style="width: 100%; margin-top: 5px;">
										<tbody>
											<tr>
												<td><label class="btn btn-sm btn-light w-100 border-dark text-left"><input name="menu_type" type="radio" required="required" value="1"> Breakfast</label></td>
												<td><label class="btn btn-sm btn-light w-100 border-dark text-left"><input name="menu_type" type="radio" required="required" value="2"> Lunch</label></td>
												<td><label class="btn btn-sm btn-light w-100 border-dark text-left"><input name="menu_type" checked="" type="radio" required="required" value="3"> Tea Time</label></td>
												<td><label class="btn btn-sm btn-light w-100 border-dark text-left"><input name="menu_type" type="radio" required="required" value="4"> Dinner</label></td>
											</tr>
										</tbody>
									</table>

								</th>
							</tr>

							<tr>
								<th scope="col" style="width: 80%;"><input name="product_barcode" type="text" autofocus="autofocus" class="form-control form-control-sm" id="product_barcode" placeholder="Product Code" list="product_list" autocomplete="off" onkeyup="select_qty(event);"></th>
								<th scope="col" style="width: 20%;"><input name="sale_qty" type="tel" class="form-control form-control-sm" id="sale_qty" placeholder="QTY" autocomplete="off" onkeyup="JavaScript:save_list(event,this.value);"></th>
							</tr>

						</tbody>
					</table>

					<iframe src="./OSS Restaurant System_files/sale_list.html" id="sale_list_load" style="width: 100%; height: 80%; overflow: hidden; border: none;"></iframe>

				</td>
				<td valign="top">



					<div class="product-div" id="product_display_div">

						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;100&#39;);" title="Sausages Grilled / Devilled (06 Nos)">
							<div class="product_price">750.00</div>
							<img src="./OSS Restaurant System_files/1686402715download_(3).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Sausages Grilled / Devilled (06 Nos)</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;101&#39;);" title="French Fries">
							<div class="product_price">1,200.00</div>
							<img src="./OSS Restaurant System_files/1686399158download_(2).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">French Fries</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;102&#39;);" title="Cream Caramel">
							<div class="product_price">1,250.00</div>
							<img src="./OSS Restaurant System_files/1686397808download_(3).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Cream Caramel</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;103&#39;);" title="Ella Club">
							<div class="product_price">1,550.00</div>
							<img src="./OSS Restaurant System_files/1686398964Club-Sandwich-Recipe-Card.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Ella Club</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;104&#39;);" title="Vegetable Broth">
							<div class="product_price">600.00</div>
							<img src="./OSS Restaurant System_files/1686652932download_(4).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Vegetable Broth</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;106&#39;);" title="">
							<div class="product_price">800.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Tom Yom Soup (Sea Food)</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;107&#39;);" title="Egg Broth">
							<div class="product_price">500.00</div>
							<img src="./OSS Restaurant System_files/1686398624egg-drop-soup-in-bowl-thumbnail.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Egg Broth</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;108&#39;);" title="">
							<div class="product_price">750.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Ro-yo Green Salad</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;109&#39;);" title="">
							<div class="product_price">750.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Mixed Latus Salad</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;110&#39;);" title="">
							<div class="product_price">900.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Red Cabbage &amp; Mayonnaise Salad</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;112&#39;);" title="Devilled Fish">
							<div class="product_price">1,800.00</div>
							<img src="./OSS Restaurant System_files/1686398334Devilled-Fish_43_1.1.300_326X580.jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Devilled Fish</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;113&#39;);" title="Hot Butter Cuttle fish">
							<div class="product_price">1,800.00</div>
							<img src="./OSS Restaurant System_files/1686399586download_(3).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Hot Butter Cuttle fish</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;114&#39;);" title="Devilled Cuttle fish">
							<div class="product_price">1,400.00</div>
							<img src="./OSS Restaurant System_files/1686398276download_(2).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Devilled Cuttle fish</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;115&#39;);" title="Hot Butter Cuttle fish">
							<div class="product_price">1,400.00</div>
							<img src="./OSS Restaurant System_files/1686399468download_(3).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Hot Butter Cuttle fish</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;117&#39;);" title="">
							<div class="product_price">1,500.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Hot Butter / Hot Garlic Sauce</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;118&#39;);" title="Chicken Grill">
							<div class="product_price">1,300.00</div>
							<img src="./OSS Restaurant System_files/1686397355download_(3).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Chicken Grill</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;119&#39;);" title="Chicken Devilled">
							<div class="product_price">1,300.00</div>
							<img src="./OSS Restaurant System_files/1686397129download_(2).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Chicken Devilled</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;120&#39;);" title="Mix Grill">
							<div class="product_price">3,990.00</div>
							<img src="./OSS Restaurant System_files/1686400250maxresdefault.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Mix Grill</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;121&#39;);" title="Vegetable Chopsuey Rice / Noodles">
							<div class="product_price">1,600.00</div>
							<img src="./OSS Restaurant System_files/1686653413Vegetable-Chopsuey-Rice_43_1.1.13_326X580.jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Vegetable Chopsuey Rice / Noodles</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;122&#39;);" title="Chicken Chopsuey Rice ">
							<div class="product_price">1,990.00</div>
							<img src="./OSS Restaurant System_files/1686396825Chinese-Chop-Suey-1.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Chicken Chopsuey Rice </div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;123&#39;);" title="eafood Chopsuey Rice / Noodles">
							<div class="product_price">2,500.00</div>
							<img src="./OSS Restaurant System_files/1686653609download_(2).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Seafood Chopsuey Rice / Noodles</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;125&#39;);" title="">
							<div class="product_price">1,400.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Vegetable Chopsuey</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;127&#39;);" title="">
							<div class="product_price">2,400.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Seafood Chopsuey</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;128&#39;);" title="Mixed Chopsuey Rice">
							<div class="product_price">2,950.00</div>
							<img src="./OSS Restaurant System_files/1686400357download_(5).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Mixed Chopsuey Rice</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;129&#39;);" title="Chicken Fried Rice ">
							<div class="product_price">1,200.00</div>
							<img src="./OSS Restaurant System_files/1686397256download_(2).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Chicken Fried Rice </div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;130&#39;);" title="Seafood Fried Rice / Noodles">
							<div class="product_price">1,600.00</div>
							<img src="./OSS Restaurant System_files/1686653513download_(2).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Seafood Fried Rice / Noodles</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;131&#39;);" title="Mix Fried Rice ">
							<div class="product_price">1,800.00</div>
							<img src="./OSS Restaurant System_files/1686400161download_(4).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Mix Fried Rice </div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;132&#39;);" title="Egg Fried Rice ">
							<div class="product_price">1,200.00</div>
							<img src="./OSS Restaurant System_files/1686398716images.jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Egg Fried Rice </div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;133&#39;);" title="Vegetable Fried Rice">
							<div class="product_price">900.00</div>
							<img src="./OSS Restaurant System_files/1686653129download_(5).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Vegetable Fried Rice </div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;134&#39;);" title="Omelet">
							<div class="product_price">500.00</div>
							<img src="./OSS Restaurant System_files/16864007040SjpEWURRzKZt1avUq9h_omlet.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Omelet</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;135&#39;);" title="Cheese &amp; Chicken Omelet">
							<div class="product_price">1,250.00</div>
							<img src="./OSS Restaurant System_files/1686332214cheese-omelette-mozarella-omelette.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Cheese &amp; Chicken Omelet</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;136&#39;);" title="Chicken Omelet">
							<div class="product_price">990.00</div>
							<img src="./OSS Restaurant System_files/1686397514quick-chicken-and-tomato-omelette-94529-1.jpeg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Chicken Omelet</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;137&#39;);" title="Fried Egg (01 Nos Egg)">
							<div class="product_price">125.00</div>
							<img src="./OSS Restaurant System_files/1686399271fried-egg-4797045-4-51de6d75d1a04895a109c8054ff820b1.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Fried Egg (01 Nos Egg)</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;138&#39;);" title="Cream Caramel">
							<div class="product_price">300.00</div>
							<img src="./OSS Restaurant System_files/1686397712k_Photo_Recipe_Ramp_Up_2022-01-Creme-Caramel_Creme_Caramel-3.jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Cream Caramel</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;139&#39;);" title="">
							<div class="product_price">350.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Watalappan</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;140&#39;);" title="02 Scoop Ice Cream">
							<div class="product_price">350.00</div>
							<img src="./OSS Restaurant System_files/1686331518icecream-5c258b77c9e77c0001e9fc73_(1).jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">02 Scoop Ice Cream</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;141&#39;);" title="Curt &amp; Honey">
							<div class="product_price">350.00</div>
							<img src="./OSS Restaurant System_files/1686398021download_(4).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Curt &amp; Honey</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;142&#39;);" title="Sprite 1.5ltr">
							<div class="product_price">425.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Sprite 1.5ltr</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;143&#39;);" title="Coca Cola 400ml">
							<div class="product_price">225.00</div>
							<img src="./OSS Restaurant System_files/1686397602download_(2).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Coca Cola 400ml</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;144&#39;);" title="EGB 400ml">
							<div class="product_price">225.00</div>
							<img src="./OSS Restaurant System_files/1686398489download_(5).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">EGB 400ml</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;145&#39;);" title="">
							<div class="product_price">150.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Soda</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;146&#39;);" title="">
							<div class="product_price">300.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Lime Coke / Lime Sprit / Lime Soda</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;147&#39;);" title="Ice Coffee">
							<div class="product_price">350.00</div>
							<img src="./OSS Restaurant System_files/1686399680Iced_Latte.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Ice Coffee</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;149&#39;);" title="Mineral Water 1ltr">
							<div class="product_price">170.00</div>
							<img src="./OSS Restaurant System_files/1686400037download_(3).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Mineral Water 1ltr</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;150&#39;);" title=" Water bottle 500ml">
							<div class="product_price">130.00</div>
							<img src="./OSS Restaurant System_files/1686399989download_(3).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name"> Water bottle 500ml</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;151&#39;);" title="Masala Tea">
							<div class="product_price">300.00</div>
							<img src="./OSS Restaurant System_files/1686399872milk-tea-recipe.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Masala Tea</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;152&#39;);" title="Milk Coffee">
							<div class="product_price">250.00</div>
							<img src="./OSS Restaurant System_files/1686399751download_(2).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Milk Coffee</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;153&#39;);" title="Black Tea">
							<div class="product_price">100.00</div>
							<img src="./OSS Restaurant System_files/1686331801teas-that-can-help-or-harm-your-heart-black-tea-1440x810.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Black Tea</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;154&#39;);" title="Black Coffee">
							<div class="product_price">150.00</div>
							<img src="./OSS Restaurant System_files/1686331714benefits-of-black-coffee1678781587577.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Black Coffee</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;155&#39;);" title="">
							<div class="product_price">250.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Papaya/Watermelon/Pineapple/Banana/Lime</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;156&#39;);" title="Avocado Juice">
							<div class="product_price">350.00</div>
							<img src="./OSS Restaurant System_files/1686331626avocado-1-of-1-3.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Avocado Juice</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;157&#39;);" title="">
							<div class="product_price">550.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Mixed Fruit Juice</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;158&#39;);" title="Chicken 1kg BBQ">
							<div class="product_price">3,500.00</div>
							<img src="./OSS Restaurant System_files/1686332297download_(2).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Chicken 1kg BBQ</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;159&#39;);" title="Pork. BBQ1 kg">
							<div class="product_price">4,500.00</div>
							<img src="./OSS Restaurant System_files/1686653018Char-siu-Chinese-BBQ-pork-14-scaled.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Pork. BBQ1 kg</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;160&#39;);" title="">
							<div class="product_price">1,500.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Sausages 400g</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;161&#39;);" title="">
							<div class="product_price">550.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Mixed stick</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;163&#39;);" title="Chicken Curry">
							<div class="product_price">1,300.00</div>
							<img src="./OSS Restaurant System_files/1686397007Mild-Chicken-Curry.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Chicken Curry</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;164&#39;);" title="Dhal Curry">
							<div class="product_price">350.00</div>
							<img src="./OSS Restaurant System_files/1686398398download_(3).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Dhal Curry</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;166&#39;);" title="Scrambled Eggs">
							<div class="product_price">1,400.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Scrambled Eggs</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;167&#39;);" title="Breakfast ">
							<div class="product_price">1,000.00</div>
							<img src="./OSS Restaurant System_files/1686331934stressfreefullenglis_67721_16x9.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Breakfast </div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;P1&#39;);" title="Passion Juice">
							<div class="product_price">350.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Passion Juice</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;T1&#39;);" title="Milk Tea">
							<div class="product_price">150.00</div>
							<img src="./OSS Restaurant System_files/1686399810milk-tea-recipe.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Milk Tea</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;cho2&#39;);" title="Chicken Chopsuey">
							<div class="product_price">1,800.00</div>
							<img src="./OSS Restaurant System_files/1686332651images.jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Chicken Chopsuey</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;chn1&#39;);" title="Chicken Noodles ">
							<div class="product_price">1,200.00</div>
							<img src="./OSS Restaurant System_files/1686397415download_(4).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Chicken Noodles </div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;F2&#39;);" title="Fried fish">
							<div class="product_price">1,800.00</div>
							<img src="./OSS Restaurant System_files/1686399336extra-crispy-fried-fish-FT-RECIPE0721-2-16321b306d324fbb86a0b1da706b6557.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Fried fish</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;F3&#39;);" title="Fish Stew">
							<div class="product_price">1,800.00</div>
							<img src="./OSS Restaurant System_files/1686399058maxresdefault.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Fish Stew</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;E3&#39;);" title="Egg Noodles">
							<div class="product_price">1,200.00</div>
							<img src="./OSS Restaurant System_files/1686398847images.jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Egg Noodles</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;Mcn1&#39;);" title="Mixed Chopsuey  Noodles">
							<div class="product_price">2,800.00</div>
							<img src="./OSS Restaurant System_files/1686400460download_(2).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Mixed Chopsuey Noodles</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;MN06&#39;);" title="Mixed Noodles">
							<div class="product_price">1,800.00</div>
							<img src="./OSS Restaurant System_files/1686400519maxresdefault.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Mixed Noodles</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;Lu01&#39;);" title=" Rice &amp; Curry">
							<div class="product_price">700.00</div>
							<img src="./OSS Restaurant System_files/1686331024rice-6247160_960_720.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name"> Rice &amp; Curry</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;L2&#39;);" title="Rice &amp; Curry (Lunch)">
							<div class="product_price">950.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Rice &amp; Curry (Lunch)</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;PO1&#39;);" title="Pork Deviled">
							<div class="product_price">1,900.00</div>
							<img src="./OSS Restaurant System_files/1686653710download_(3).jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Pork Deviled</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;po2&#39;);" title="Fried Pork">
							<div class="product_price">1,900.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Fried Pork</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;PO03&#39;);" title="Pork Grill">
							<div class="product_price">1,900.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Pork Grill</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;Po04&#39;);" title="Pork Stew">
							<div class="product_price">1,900.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Pork Stew</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;pa01&#39;);" title="Deviled Prawns">
							<div class="product_price">1,500.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Deviled Prawns</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;pa3&#39;);" title="Hot butter prawns">
							<div class="product_price">1,500.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Hot butter prawns</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;B1&#39;);" title="Beef Deviled ">
							<div class="product_price">1,900.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Beef Deviled </div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;y1&#39;);" title="Yogurt">
							<div class="product_price">80.00</div>
							<img src="./OSS Restaurant System_files/1686403008Turkish_strained_yogurt.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Yogurt</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;v12&#39;);" title="Vegetable Noodles">
							<div class="product_price">900.00</div>
							<img src="./OSS Restaurant System_files/1686653295images.jfif" style="height: 100px; object-fit: cover;">
							<div class="product-name">Vegetable Noodles</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;l003&#39;);" title="Lemon With Spiry">
							<div class="product_price">200.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Lemon With Spiry</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;w1&#39;);" title="W W750ml">
							<div class="product_price">3,950.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">W W 750ml</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;F01&#39;);" title="Flower bouquets ">
							<div class="product_price">1,950.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Flower bouquets </div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;cake1&#39;);" title="Red Cake 1pcs">
							<div class="product_price">590.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Red Cake 1pcs</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;M1&#39;);" title="Milk rice">
							<div class="product_price">700.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Milk rice </div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;flower 2&#39;);" title="Flower bookey with paper">
							<div class="product_price">6,500.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Flower bookey with paper</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;sp 2&#39;);" title="sprite 400ml">
							<div class="product_price">225.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Sprite 400ml</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;Sp4&#39;);" title="sprite 1 ltr">
							<div class="product_price">325.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">Sprite 1ltr</div>
						</div>
						<div class="product-sub" onclick="JavaScript:list_value_send(&#39;L1&#39;);" title="L/L">
							<div class="product_price">1,000.00</div>
							<img src="./OSS Restaurant System_files/no-image.jpg" style="height: 100px; object-fit: cover;">
							<div class="product-name">L/L</div>
						</div>

					</div>

				</td>
			</tr>
			<tr style="height: 100px; height: 100px; border-top: 5px solid #000000; border-bottom: 5px solid #000000;">
				<td align="right" valign="middle" style="background-color: black; color: white; padding-right: 20px;" id="total_amount">
					<h1 style="color: gold; font-weight: bold;">0.00</h1>
					<h5 style="color: white;">0 Item(s)</h5>
				</td>
				<td colspan="2" valign="top">


					<table style="width: 100%; height: 100%;">
						<tbody>
							<tr align="center">


								<td align="center" valign="middle" style="background-color: midnightblue; color: white; width: 12.5%; cursor: pointer;" onclick="window.location=&#39;bill-payment?bill_id=1696863917&amp;order_type=1&#39;;">
									<h4 style="margin: 0; padding: 0;">Takeaway</h4>
									<h6 style="margin: 0; padding: 0;">(F8)</h6>
								</td>
								<td align="center" valign="middle" style="background-color: orangered; color: white; width: 12.5%; cursor: pointer;" onclick="window.location=&#39;table?bill_id=1696863917&amp;order_type=2&#39;;">
									<h4 style="margin: 0; padding: 0;">Table</h4>
									<h6 style="margin: 0; padding: 0;">(F9)</h6>
								</td>
								<td align="center" valign="middle" style="background-color: darkred; color: white; width: 12.5%; cursor: pointer;" onclick="window.location=&#39;room?bill_id=1696863917&amp;order_type=3&#39;;">
									<h4 style="margin: 0; padding: 0;">Room</h4>
									<h6 style="margin: 0; padding: 0;">Send Order</h6>
								</td>
								<td align="center" valign="middle" style="background-color: dodgerblue; color: white; width: 12.5%; cursor: pointer;" onclick="window.location=&#39;pool-booking?pos&#39;">
									<h4 style="margin: 0; padding: 0;">Pool</h4>
								</td>

								<td align="center" valign="middle" style="background-color: darkolivegreen; color: white; width: 16.6%; cursor: pointer;" onclick="window.location=&#39;pending-table&#39;;">
									<h4 style="margin: 0; padding: 0;">Pending <span id="pending_dis"><span style="background-color: white; color: black; padding: 10px; border-radius: 10%; width: 50px; height: 50px;">0</span>
										</span></h4>
								</td>
								<td align="center" valign="middle" style="background-color: lightslategray; color: white; width: 16.6%; cursor: pointer;" onclick="window.location=&#39;day_end_summery&#39;;">
									<h4 style="margin: 0; padding: 0;">Day Summery</h4>
								</td>
								<td align="center" valign="middle" style="background-color: gray; color: white; width: 16.6%; cursor: pointer;" onclick="window.location=&#39;poin-of-sale&#39;;">
									<h4 style="margin: 0; padding: 0;">New Bill</h4>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>




	<input name="update" type="hidden" id="update" value="0">


	<datalist id="product_list">
		<option value="Lu01">Lu01 - Rice &amp; Curry | Rice &amp; Curry</option>
		<option value="150">150 - Water bottle 500ml | Water bottle 500ml</option>
		<option value="140">140 - 02 Scoop Ice Cream | 02 Scoop Ice Cream</option>
		<option value="156">156 - Avocado Juice | Avocado Juice</option>
		<option value="B1">B1 - Beef Deviled | Beef Deviled </option>
		<option value="154">154 - Black Coffee | Black Coffee</option>
		<option value="153">153 - Black Tea | Black Tea</option>
		<option value="167">167 - Breakfast | Breakfast </option>
		<option value="135">135 - Cheese &amp; Chicken Omelet | Cheese &amp; Chicken Omelet</option>
		<option value="in01">in01 - Chicken | chicken</option>
		<option value="158">158 - Chicken 1kg BBQ | Chicken 1kg BBQ</option>
		<option value="cho2">cho2 - Chicken Chopsuey | Chicken Chopsuey</option>
		<option value="122">122 - Chicken Chopsuey Rice | Chicken Chopsuey Rice </option>
		<option value="163">163 - Chicken Curry | Chicken Curry</option>
		<option value="119">119 - Chicken Devilled | Chicken Devilled</option>
		<option value="129">129 - Chicken Fried Rice | Chicken Fried Rice </option>
		<option value="118">118 - Chicken Grill | Chicken Grill</option>
		<option value="chn1">chn1 - Chicken Noodles | Chicken Noodles </option>
		<option value="136">136 - Chicken Omelet | Chicken Omelet</option>
		<option value="143">143 - Coca Cola 400ml | Coca Cola 400ml</option>
		<option value="102">102 - Cream Caramel | Cream Caramel</option>
		<option value="138">138 - Cream Caramel | Cream Caramel</option>
		<option value="141">141 - Curt &amp; Honey | Curt &amp; Honey</option>
		<option value="pa01">pa01 - Deviled Prawns | Deviled Prawns</option>
		<option value="114">114 - Devilled Cuttle fish | Devilled Cuttle fish</option>
		<option value="112">112 - Devilled Fish | Devilled Fish</option>
		<option value="164">164 - Dhal Curry | Dhal Curry</option>
		<option value="144">144 - EGB 400ml | EGB 400ml</option>
		<option value="107">107 - Egg Broth | Egg Broth</option>
		<option value="132">132 - Egg Fried Rice | Egg Fried Rice </option>
		<option value="E3">E3 - Egg Noodles | Egg Noodles</option>
		<option value="103">103 - Ella Club | Ella Club</option>
		<option value="F3">F3 - Fish Stew | Fish Stew</option>
		<option value="flower 2">flower 2 - Flower bookey with paper | Flower bookey with paper</option>
		<option value="F01">F01 - Flower bouquets | Flower bouquets </option>
		<option value="101">101 - French Fries | French Fries</option>
		<option value="137">137 - Fried Egg (01 Nos Egg) | Fried Egg (01 Nos Egg)</option>
		<option value="F2">F2 - Fried fish | Fried fish</option>
		<option value="po2">po2 - Fried Pork | Fried Pork</option>
		<option value="117">117 - Hot Butter / Hot Garlic Sauce | </option>
		<option value="113">113 - Hot Butter Cuttle fish | Hot Butter Cuttle fish</option>
		<option value="115">115 - Hot Butter Cuttle fish | Hot Butter Cuttle fish</option>
		<option value="pa3">pa3 - Hot butter prawns | Hot butter prawns</option>
		<option value="147">147 - Ice Coffee | Ice Coffee</option>
		<option value="L1">L1 - L/L | L/L</option>
		<option value="l003">l003 - Lemon With Spiry | Lemon With Spiry</option>
		<option value="146">146 - Lime Coke / Lime Sprit / Lime Soda | </option>
		<option value="151">151 - Masala Tea | Masala Tea</option>
		<option value="152">152 - Milk Coffee | Milk Coffee</option>
		<option value="M1">M1 - Milk rice | Milk rice</option>
		<option value="T1">T1 - Milk Tea | Milk Tea</option>
		<option value="149">149 - Mineral Water 1ltr | Mineral Water 1ltr</option>
		<option value="131">131 - Mix Fried Rice | Mix Fried Rice </option>
		<option value="120">120 - Mix Grill | Mix Grill</option>
		<option value="Mcn1">Mcn1 - Mixed Chopsuey Noodles | Mixed Chopsuey Noodles</option>
		<option value="128">128 - Mixed Chopsuey Rice | Mixed Chopsuey Rice</option>
		<option value="157">157 - Mixed Fruit Juice | </option>
		<option value="109">109 - Mixed Latus Salad | </option>
		<option value="MN06">MN06 - Mixed Noodles | Mixed Noodles</option>
		<option value="161">161 - Mixed stick | </option>
		<option value="134">134 - Omelet | Omelet</option>
		<option value="155">155 - Papaya/Watermelon/Pineapple/Banana/Lime | </option>
		<option value="P1">P1 - Passion Juice | Passion Juice</option>
		<option value="PO1">PO1 - Pork Deviled | Pork Deviled</option>
		<option value="PO03">PO03 - Pork Grill | Pork Grill</option>
		<option value="Po04">Po04 - Pork Stew | Pork Stew</option>
		<option value="159">159 - Pork. BBQ1 kg | Pork. BBQ1 kg</option>
		<option value="110">110 - Red Cabbage &amp; Mayonnaise Salad | </option>
		<option value="cake1">cake1 - Red Cake 1pcs | Red Cake 1pcs</option>
		<option value="L2">L2 - Rice &amp; Curry (Lunch) | Rice &amp; Curry (Lunch)</option>
		<option value="RK1">RK1 - Rice Kiri samba | Rice Kiri samba</option>
		<option value="108">108 - Ro-yo Green Salad | </option>
		<option value="s01">s01 - salt | salt</option>
		<option value="160">160 - Sausages 400g | </option>
		<option value="100">100 - Sausages Grilled / Devilled (06 Nos) | Sausages Grilled / Devilled (06 Nos)</option>
		<option value="166">166 - Scrambled Eggs | Scrambled Eggs</option>
		<option value="127">127 - Seafood Chopsuey | </option>
		<option value="123">123 - Seafood Chopsuey Rice / Noodles | eafood Chopsuey Rice / Noodles</option>
		<option value="130">130 - Seafood Fried Rice / Noodles | Seafood Fried Rice / Noodles</option>
		<option value="145">145 - Soda | </option>
		<option value="142">142 - Sprite 1.5ltr | Sprite 1.5ltr</option>
		<option value="Sp4">Sp4 - Sprite 1ltr | sprite 1 ltr</option>
		<option value="sp 2">sp 2 - Sprite 400ml | sprite 400ml</option>
		<option value="106">106 - Tom Yom Soup (Sea Food) | </option>
		<option value="104">104 - Vegetable Broth | Vegetable Broth</option>
		<option value="125">125 - Vegetable Chopsuey | </option>
		<option value="121">121 - Vegetable Chopsuey Rice / Noodles | Vegetable Chopsuey Rice / Noodles</option>
		<option value="133">133 - Vegetable Fried Rice | Vegetable Fried Rice</option>
		<option value="v12">v12 - Vegetable Noodles | Vegetable Noodles</option>
		<option value="w1">w1 - W W 750ml | W W750ml</option>
		<option value="139">139 - Watalappan | </option>
		<option value="y1">y1 - Yogurt | Yogurt</option>
	</datalist>

	<script>
		window.addEventListener("keyup", function(event) {
			//console.log(event.keyCode);
			if (event.keyCode == 119) {
				var bill_id = document.getElementById('bill_id').value;
				window.location = "bill-payment?bill_id=" + bill_id + "&order_type=1";
			}

			if (event.keyCode == 120) {
				var bill_id = document.getElementById('bill_id').value;
				window.location = "table?bill_id=" + bill_id + "&order_type=2";
			}
		});

		function select_qty(event) {
			if (event.keyCode == 13) {
				document.getElementById('sale_qty').value = "1";
				document.getElementById('sale_qty').select();
			}
		}

		function save_list(event, sale_qty) {
			var product_barcode = document.getElementById('product_barcode').value;
			var bill_id = document.getElementById('bill_id').value;
			var update = document.getElementById('update').value;

			var menu_type = document.getElementsByName('menu_type');

			for (i = 0; i < menu_type.length; i++) {
				if (menu_type[i].checked)
					var a = menu_type[i].value;
			}

			if (event.keyCode == 13) {


				if (update == 1) {
					document.getElementById('sale_list_load').src = "sale_list.php?product_barcode=" + product_barcode + "&bill_id=" + bill_id + "&sale_qty=" + sale_qty + "&menu_type=" + a + "&update";
				} else {
					document.getElementById('sale_list_load').src = "sale_list.php?product_barcode=" + product_barcode + "&bill_id=" + bill_id + "&sale_qty=" + sale_qty + "&menu_type=" + a;
				}
				document.getElementById('sale_qty').value = "";
				document.getElementById('product_barcode').value = "";
				document.getElementById('product_barcode').select();
			}
		}

		setInterval(function() {

				let bill_id = document.getElementById('bill_id').value;

				const xhttp = new XMLHttpRequest();
				xhttp.onload = function() {
					document.getElementById("total_amount").innerHTML = this.responseText;
				}
				xhttp.open("GET", "ajax_total_cal_pos.php?bill_id=" + bill_id, true);
				xhttp.send();
			},
			1000);

		setInterval(function() {
				const xhttp = new XMLHttpRequest();
				xhttp.onload = function() {
					document.getElementById("pending_dis").innerHTML = this.responseText;
				}
				xhttp.open("GET", "ajax_pending_table.php", true);
				xhttp.send();
			},
			1000);

		function filte_cat(product_category) {
			document.getElementById('product_display_div').innerHTML = "<div class='text-center mt-4 w-100'><img src='image/loading_sm.gif'> Searching product</div>";

			const xhttp = new XMLHttpRequest();
			xhttp.onload = function() {
				document.getElementById("product_display_div").innerHTML = this.responseText;
			}
			xhttp.open("GET", "ajax_product_cat_filter.php?product_category=" + product_category, true);
			xhttp.send();
		}

		function list_value_send(product_barcode) {
			document.getElementById('product_barcode').value = product_barcode;
			document.getElementById('sale_qty').value = "1";
			document.getElementById('sale_qty').select();
		}
	</script>



</body>

</html>