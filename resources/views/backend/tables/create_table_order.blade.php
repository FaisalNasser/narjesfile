@extends( 'layouts.app' )
@section( 'content' )
<?php $currency =  setting_by_key("currency");
?>
<link href="{{asset('adminpanel/assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
<link href="{{asset('adminpanel/assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
<script src="{{asset('adminpanel/assets/js/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('adminpanel/assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<div class="wrapper wrapper-content ">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
			<div class="row">
				<div class="col-sm-12">
					<div class="ibox" style="margin-bottom: 0px;">
						<div class="ibox-title">
							<h5>@lang('site.cart_items') <span id="TableNo"> </span></h5>
						</div>
						<div class="ibox-content" id="car_items" style="padding: 5px;">
							<div class="cart-table-wrap">

								<table width="100%" border="0" style="border-spacing: 5px; border-collapse: separate;" class="">

									<tbody id="CartHTML">

									</tbody>

								</table>
							</div>
							<hr>
							<table width="100%" border="0" style="border-spacing: 5px; border-collapse: separate;" class="">

								<tbody>

									<tr>

										<td>

											<h4>@lang('site.Sub_Total')</h4>

										</td>

										<td class="text-right">

											<h4 id="p_subtotal">0.00</h4>

										</td>
									</tr>
									<!--<tr>

										<td>

											<h4>@lang('site.discount')</h4>

										</td>

										<td class="text-right">

											<h4 id="p_discount">0.00</h4>

										</td>
									</tr> -->
									<tr>

										<td>

											<h4>@lang('site.TAX')(<?php echo setting_by_key("vat"); ?>%)</h4>

										</td>

										<td class="text-right">

											<h4 id="p_hst">0.00</h4>

										</td>
									</tr>

									<tr>
										<td colspan=2>
										<select id="OrderType" class="form-control">
											<option value="pos">@lang('site.order_store')</option>
											<option value="order">@lang('site.order_home')</option>
										</select>
										</td>
									</tr>
									<input type="hidden" id="OrderType" value="pos">
									<tr>
										<td> <strong> @lang('site.Include_Vat') </strong></td>
										<td>
										<select id="VatInclude" class="form-control">
											<option value="Yes">@lang('site.Yes')</option>
											<option value="No">@lang('site.No')</option>
										</select>
										</td>
									</tr>


								</tbody>

							</table>

						</div>
						<div class="panel-footer green-bg">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tbody>
									<tr>
										<td>

											<h4><strong>@lang('site.TOTAL')</strong></h4>

										</td>
										<td class="text-right ">

											<h4 class="TotalAmount">0</h4>

										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="ibox-content" style="padding-bottom: 0px;">
						<div class="row">
						<div class="col-sm-6 col-md-12 col-lg-6">
								<div class="form-group">
									<button type="button" id="Checkout" class="btn btn-primary btn-block text-center">@lang('site.checkout')</button>
								</div>
						</div>
							<div class="col-sm-6 col-md-12 col-lg-6">
								<div class="form-group">
									<button type="button" id="ClearCart" class="btn btn-danger btn-block text-center">@lang('site.clear_cart')</button>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6 col-md-12 col-lg-6">
									<div class="form-group">
										<button type="button" id="holdOrder" class="btn btn-success btn-block text-center">@lang('site.SaveOrder')</button>
									</div>
							</div>
								<div class="col-sm-6 col-md-12 col-lg-6">
									<div class="form-group">
										<button type="button" id="changeStatus" class="btn btn-success btn-block text-center">@lang('site.ReservedTable')</button>
									</div>
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<div class="ibox float-e-margins">
				<div class="ibox-title" style="margin-bottom: 10px;">
					<div class="toolbar mb2 mt2">
						<button class="btn fil-cat" href="" data-rel="all">@lang('site.all')</button> @foreach($categories as $category)
						<button class="btn fil-cat" data-rel="{{$category->id}}">@if(!empty($category->translation->name)){{ $category->translation->name }}@else{{ $category->name}}@endif</button> @endforeach

					</div>
				</div>

			<div  >
				<input id="search-products"  placeholder="search" class="form-control">
			</div>

				<div class="row dynamic_row" id="portfolio">

					@foreach($products as $product)

					<div class="col-xs-12 col-sm-4 col-md-6 col-lg-3 {{$product->category_id}} all">
						<div class="widget white-bg text-center product_list h-100">
							@if(file_exists('uploads/products/' . $product->id . '.jpg'))
							<img width="100px" alt="image" class="img-circle" src="{{url('uploads/products/thumb/' . $product->id . '.jpg')}}">
							<h2 class="m-xs heading-size_image">@if(!empty($product->translation->name)){{ $product->translation->name }}@else{{ $product->name}}@endif</h2> @else
							<img width="100px" alt="image" class="img-circle" src="{{url('herbs/noimage.jpg')}}">
							<h2 style="padding-left:5px; text-align:left" class="m-xs heading-size_image">@if(!empty($product->translation->name)){{ $product->translation->name }}@else{{ $product->name}}@endif</h2> @endif
							<?php $prices = json_decode($product->prices); $titles = json_decode($product->titles);?> @foreach($titles as $key=>$t)
							<button data-price="{{$prices[$key]}}" data-id="{{$product->id}}" data-key="{{$key}}" data-size="{{$t}}" data-name="@if(!empty($product->translation->name)){{ $product->translation->name }}@else{{ $product->name}}@endif ({{$t}})" type="button" class="btn btn-sm btn-primary m-r-sm AddToCart tag-margin tag-btn">{{ $t }}</button> @endforeach
							</div>
					</div>
					@endforeach
				</div>			</div>
		</div>
	</div>
</div>
<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">

	<div class="modal-dialog">

		<div class="modal-content animated bounceInRight confirm-modal">

			<div class="modal-header">
				<h4 style="float:left; color:red" id="TableNoCart"></h4>
				<h4 class="modal-title" id="total_amount_model">0.00</h4>
			</div>

			<div class="modal-body clearfix">

				<input type="hidden" id="cashier_id" class="form-control" value="{{Auth::user()->id}}">
				<input type="hidden" id="vat" class="form-control" value="0.00">
				<input type="hidden" id="delivery_cost" class="form-control" value="0">
				<input type="hidden" id="total_amount" class="form-control" value="0">
				<input type="hidden" id="customer_id" class="form-control" value="">
				<input type="hidden" id="payment_type" class="form-control" value="Cash">


				<div class="col-sm-12">

					<p class="text-center">@lang('site.how_would_you_pay')</p>

				</div>

				<div class="col-sm-2">
				<span style="font-size:20px; font-weight:bold"> @lang('site.CASH') </span>
				</div>
				<div class="col-sm-2">

					<div class="form-group text-center">
						<div data-id="Cash" class="payment-option-icon text-success">
							<i class="fa fa-money fa-4x"></i>

						</div>


					</div>

				</div>

				<div class="col-sm-2 ">
					<span style="font-size:20px; font-weight:bold"> @lang('site.CARD')  </span>
				</div>

				<div class="col-sm-2">

					<div class="form-group text-center">

						<div data-id="Card" class="payment-option-icon">

							<i class="fa fa-credit-card fa-4x"></i>

						</div>

					</div>

				</div>

				<div class="col-sm-2 ">
					<span style="font-size:20px; font-weight:bold" class="payment-option">  @lang('site.Bank') </span>
				</div>

				<div class="col-sm-2">

					<div class="form-group text-center">

						<div data-id="bank" class="payment-option-icon">

							<i class="fa fa-bank fa-4x"></i>

						</div>

					</div>

				</div>

				<div class="clearfix"></div>

				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" id="total_given" placeholder="@lang('site.total_paid')" class="form-control numberPad">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" id="change" value="-1" readonly placeholder="@lang('site.change')" class="form-control">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					    <input type="hidden" id="table_id" value ="<?php echo $table_id; ?>" />

					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<textarea id="comments" placeholder="@lang('site.Comment')" class="form-control"></textarea>
					</div>
				</div>

				<div class="col-sm-12 text-right">
					<button type="button" style="float:left" class="btn btn-info"  id="freeOrder" >@lang('site.Free_Order')</button>
					<!--<button type="button" style="float:left; padding-left:3px;" class="btn btn-warning"  id="debitOrder" >@lang('site.Debit_Order')</button>-->
					<!--<button type="button" class="btn btn-warning"  id="holdOrder" >@lang('site.hold_order')</button>-->
					<button type="button" class="btn btn-white" data-dismiss="modal">@lang('site.Close')</button>
		    		<input type="hidden" value="" id="id" />
		    		<button type="button" id="completeOrder" class="btn btn-primary">@lang('site.complete_order')</button>
				</div>

			</div>

		</div>

	</div>

</div>




<script type="text/javascript">


		$( "body" ).on( "click", "#holdOrder", function () {
			var form_data = {
				id:'<?php  if(!empty($orders->id)) echo $orders->id; ?>',
				table_id:'<?php echo $table_id; ?>',
				comment:$("#comments").val(),
				cart:cart,
			};
			console.log(form_data)
		if ( cart.length < 1 ) {

						$.ajax( {
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				url: '<?php echo url("tables/set_table_empty"); ?>',
				data: { id:'<?php echo $table_id; ?>'},
				success: function ( msg ) {
				 window.location.href="/tables_orders"
				}
			});

		}
		else
		{
		    			$.ajax( {
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				url: '<?php echo url("sale/hold_order"); ?>',
				data: form_data,
				success: function ( msg ) {
				window.location.href="/tables_orders"
				}
			});

		}
		});
		$( "body" ).on( "click", "#changeStatus", function () {
			var form_data = {
				id:'<?php echo $table_id; ?>',

			};
			$.ajax( {
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				url: '<?php echo url("tables/change_status"); ?>',
				data: form_data,
				success: function ( msg ) {
				window.location.href="/tables_orders"
				}
			});
		});
		$("body").on("click","#Checkout", function() {
	var OrderType = $("#OrderType").val();
	if(OrderType == "order") {
		$("#myModalHome").modal("show");
	} else {
		$("#myModal").modal("show");
	}
});
        $("body").on("keyup" , "#mobile_number", function(e) {
	var phone = $("#mobile_number").val();
	if(phone.length < 7) {
		return false;
	}

  $.getJSON("findcustomer?phone=" + $("#mobile_number").val(),
        function(data) {
            console.log(data)
			if(data) {
				$("#full_name").val(data['name']);
				//$("#phone").val(data['mobile_number']);
				$("#address_c").val(data['address']);
				$("#neighborhood").val(data['neighborhood']);
				$("#comments_c").val(data['comments']);
				$("#id").val(data['id']);
				$("#Client").html("@lang('site.is_former_client')");
			} else {
				$("#Client").html("@lang('site.is_new_client')");
				$("#id").val("");
			}

        });
});


</script>

<div class="modal inmodal" id="myModalHome" tabindex="-1" role="dialog" aria-hidden="true">

	<div class="modal-dialog">

		<div class="modal-content animated bounceInRight confirm-modal">

			<div class="modal-header">
				<h4 class="modal-title" id="total_amount_model">@lang('site.customer_information')</h4>
			</div>

			<div class="modal-body clearfix">

				<div class="col-sm-12">
					<div class="form-group">
						<input type="text" id="mobile_number" placeholder="@lang('site.mobile_number')" class="form-control numberPad">
					</div>

				</div>

				<div class="col-sm-12">
					<div class="form-group">
						<h3 id="Client" style="text-align:center">@lang('site.Is_a_new_client')</h3>
					</div>
				</div>


				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" id="full_name" placeholder="@lang('site.full_name')" class="form-control ">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" id="address_c" placeholder="@lang('site.address')" class="form-control">
					</div>
				</div>

				<div class="col-sm-12">
					<div class="form-group">
						<input type="text" id="comments_c" placeholder="@lang('site.Comment')" class="form-control">
					</div>
				</div>



	             <div class="col-sm-12 ">
					<span id="errorMessage" style="color:red"> </span>
				</div>

				<div class="col-sm-12 text-right">
					<button type="button" id="ClearForm" class="btn btn-white" >@lang('site.Close')</button>

					<button type="button" id="CustomerNext" class="btn btn-primary " >@lang('site.Next')</button>
					<button type="button" id="DebitNext" class="btn btn-primary" style="display:none;"> اكمال الطلب بالدين  </button>

					<span id="errorMessage" style="color:red"> </span>
				</div>



			</div>

		</div>

	</div>

</div>

<script type="text/javascript">
$("body").on("click","#ClearForm", function() {
	$("#full_name").val("");
	$("#neighborhood").val("");
	$("#address_c").val("");
	$("#comments_c").val("");
	$("#id").val("");
	$("#mobile_number").val("");
	$("#carnumber").val(""),
    $("#carcolur").val(""),
	$("#myModalHome").modal("hide");
});
$("body").on("click","#CustomerNext", function() {
	var form_data = {
		name:$("#full_name").val(),
		phone:$("#mobile_number").val(),
		neighborhood:$("#neighborhood").val(),
		address:$("#address_c").val(),
		comments:$("#comments_c").val(),
		id:$("#id").val()
	}

	if($("#mobile_number").val() == "" || $("#full_name").val() == "") {
		$("#errorMessage").html("@lang('site.required')");
		return false;
	}


	$.ajax({
						type: 'POST',
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url: '<?php echo url("sales/store_customer"); ?>',
						data: form_data,
						success: function (msg) {
						    console.log(msg)
							var obj = $.parseJSON(msg);
							if(obj['message'] == "OK") {
								$("#myModalHome").modal("hide");
								$("#myModal").modal("show");
								$("#customer_id").val(obj['id']);
								 console.log(obj['id'])
							} else {

							}
						}
					});



});
$("body").on("click","#DebitNext", function() {
    console.log("clicked")
	var form_data = {
		name:$("#full_name").val(),
		phone:$("#mobile_number").val(),
		neighborhood:$("#neighborhood").val(),
		address:$("#address_c").val(),
		comments:$("#comments_c").val(),
		id:$("#id").val()
	}

	if($("#mobile_number").val() == "" || $("#full_name").val() == "") {
		$("#errorMessage").html("@lang('site.required')");
		return false;
	}


	$.ajax({
						type: 'POST',
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url: '<?php echo url("sales/store_customer"); ?>',
						data: form_data,
						success: function (msg) {
							 console.log(msg)
							var obj = $.parseJSON(msg);
							if(obj['message'] == "OK") {
								$("#myModalHome").modal("hide");
								$("#myModal").modal("show");
								$("#customer_id").val(obj['id']);
								console.log($("#customer_id").val())
                                var form_data = {
id:<?php  if(!empty($_GET["debit_id"])) {echo $_GET["debit_id"];} else{ echo 0;} ?>,
table_id:$("#table_id").val(),
comment:$("#comments").val(),
customer_id:obj['id'],
type: $( "#OrderType" ).val(),
total_given: $( "#total_given" ).val(),
amount : $( "#total_amount" ).val(),
change: $( "#change" ).val(),
cart:cart,
};
                                $.ajax( {
type: 'POST',
headers: {
'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
},
url: '<?php echo url("sale/debit_order"); ?>',
data: form_data,
success: function ( msg ) {
console.log(msg);

			   		          	$.ajax( {
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				url: '<?php echo url("tables/set_table_empty"); ?>',
				data: {
				    id:'<?php echo $table_id; ?>'
				},
				success: function ( msg ) {
				    console.log(msg)
				window.location.href="/tables_orders"
				}
			});


}
});


							} else {

							}
						}
					});
// 							var form_data = {
// 				id:<?php  if(!empty($_GET["debit_id"])) {echo $_GET["debit_id"];} else{ echo 0;} ?>,
// 				table_id:$("#table_id").val(),
// 				comment:$("#comments").val(),
// 				customer_id:$("#customer_id").val(),
// 				type: $( "#OrderType" ).val(),
// 			    total_given: $( "#total_given" ).val(),
//             	amount : $( "#total_amount" ).val(),
// 		     	change: $( "#change" ).val(),
// 				cart:cart,
// 			};
			console.log(form_data);
			$.ajax( {
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				url: '<?php echo url("sale/debit_order"); ?>',
				data: form_data,
				success: function ( msg ) {
				    			console.log(msg);

				// 	location.reload();
				// 	$.each( cart, function( key, value ) {
				// 		deleteItemFromCart(value);

				// 	});
						location.reload();
					show_cart();
					$("#myModal").modal("hide");
				}
			});



});
</script>



<link rel="stylesheet" href="{{asset('adminpanel/assets/numpad/jquery.numpad.css')}}">

<script src="{{asset('adminpanel/assets/js/lodash.min.js')}}"></script>

<script src="{{asset('adminpanel/assets/numpad/jquery.numpad.js')}}"></script>

<style type="text/css">

	.nmpd-grid {

		border: none;

		padding: 20px;

	}



	.nmpd-grid>tbody>tr>td {

		border: none;

	}

	/* Some custom styling for Bootstrap */



	.qtyInput {

		display: block;

		width: 100%;

		padding: 6px 12px;

		color: #555;

		background-color: white;

		border: 1px solid #ccc;

		border-radius: 4px;

		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);

		box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);

		-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;

		-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;

		transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;

	}

</style>
<script>
$("body").on("click",".payment-option-icon", function() {
		$(".payment-option-icon").removeClass("text-success");
		$(this).addClass("text-success");
		$("#payment_type").val($(this).attr("data-id"));
	});
    
	// $( function () {
	// 	$( ".navbar-minimalize" ).click();

	// } );

	$.fn.numpad.defaults.gridTpl = '<table class="table modal-content"></table>';

	$.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';

	$.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control" />';

	$.fn.numpad.defaults.buttonNumberTpl = '<button type="button" class="btn btn-default"></button>';

	$.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn" style="width: 100%;"></button>';

	$.fn.numpad.defaults.onKeypadCreate = function () {

		$( this ).find( '.done' ).addClass( 'btn-primary' );

	};
	$( document ).ready( function () {
		$( '.numberPadkk' ).numpad();
	} );

	$( "body" ).on( "keyup", "#total_given", function () {
		var total_amount = $( "#total_amount" ).val();
		var total_given = $( this ).val();
		var change = Number( total_given ) - Number( total_amount );
		$( "#change" ).val( change.toFixed( 2 ) );
	} );
	toastr.options = {
		"closeButton": true,
		"debug": false,
		"progressBar": true,
		"preventDuplicates": false,
		"positionClass": "toast-top-right",
		"onclick": null,
		"showDuration": "400",
		"hideDuration": "1000",
		"timeOut": "2000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}

	var products = new Array();
// 	$( "#change" ).val( $( "#total_amount" ).val());
	var count_items = 0;
	var cart = new Array();
	var cartDebit = new Array();


			var msg = '<?php  if(!empty($orders->cart)) echo $orders->cart; ?>';
			console.log(msg)
			if(msg!="")
			{
	    	 cartDebit = JSON.parse(msg);
			 cart = JSON.parse(msg);
			}
	    	$("#holdOrderID").val(<?php  if(!empty($orders->id)) echo $orders->id; ?>);
			var qty = 0;
			var total = 0;
			var cart_html = "";
			var obj = cartDebit;
			$.each( obj, function ( key, value ) {
				cart_html += '<tr>';
				cart_html += '<td width="10" valign="top"><a href="javascript:void(0)" class="text-danger DeleteItem" data-id=' + value.id + '><i class="fa fa-trash"></i></a></td>';
				cart_html += '<td><h4 style="margin:0px;">' + value.name + '  ' + value.size + '</h4></td>';
				cart_html += '<td width="80"><span class="btn btn-primary btn-sm text-center IncreaseToCart" data-id=' + value.id + '>+</span> ' + value.quantity + ' <span  class="btn btn-primary btn-sm DecreaseToCart" data-id=' + value.id + '>-</span> </td>';
				cart_html += '<td width="15%" class="text-right"><h4 style="margin:0px;"> <?php echo $currency; ?>' + value.price + '</h4> </td>';
				cart_html += '</tr>';
				qty = Number( value.quantity );
				total = Number( total ) + Number( value.price * qty );
			} );

			var VatInclude = $("#VatInclude").val();
			var vat = 0;

			$( "#p_subtotal" ).html( "<?php echo $currency; ?>" + total.toFixed( 2 ) );
			$( "#p_hst" ).html( "<?php echo $currency; ?>" + vat.toFixed( 2 ) );
			var total_amount = Number( total ) + vat;
			$( "#total_amount" ).val( total_amount );
// 			$("#change").val(total_amount);
			$( "#total_amount_model" ).html("<?php echo $currency; ?>" + total_amount.toFixed( 2 ) );
			$( "#vat" ).val( vat );
			$( ".TotalAmount" ).html( "<?php echo $currency; ?>" + total_amount.toFixed( 2 ) );
// 		  $( "#total_given" ).val(<?php if(!empty($debit_order->total_given)) echo $debit_order->total_given; ?>);
             $("#change").val(total_amount);
// 			 $( "#change" ).val(<?php  if(!empty($debit_order->changing)) echo $debit_order->changing;  ?>);
			$( "#CartHTML" ).html( "" );
			$( "#CartHTML" ).html( cart_html );





	// $( "body" ).on( "click", ".AddToCart", function () {

	// 	count_items++;

	// 	var ids = _.map( cart, 'id' );

	// 	var item = {
	// 		id: $( this ).attr( "data-id" ) + $( this ).attr( "data-key" ),
	// 		product_id: $( this ).attr( "data-id" ),
	// 		price: $( this ).attr( "data-price" ),
	// 		size: $( this ).attr( "data-size" ),
	// 		name: $( this ).attr( "data-name" )
	// 	};

	// 	if ( !_.includes( ids, item.id ) ) {
	// 		item.quantity = 1;
	// 		item.p_qty = 1;
	// 		cart.push( item );
	// 	} else {
	// 		var index = _.findIndex( cart, item );
	// 		cart[ index ].quantity = cart[ index ].quantity + 1
	// 	}

	// 	toastr.success( 'Successfully Added to Cart' )
	// 	show_cart();
	// 	});

		$( "body" ).on( "click", "#ClearCart", function ()
		{

			$('tr').each(function(i, el) {
				var query = $(el).children('td').text();
				deleteItemFromCart(query);
			});

			$("#TableNo").text("");
			$("#TableNoCart").text("");
			var cart = [];
			$( ".TotalAmount" ).html( 0 );

				$( "#CartHTML" ).html( "" );

				$( "#p_subtotal" ).html( "0.00" );

				$( "#p_hst" ).html( "0.00" );

				$( "#p_discount" ).html( "0.00" );
		} );
	$( "body" ).on( "click", ".DecreaseToCart", function () {
		var item = {
			id: $( this ).attr( "data-id" )
		};
		var index = _.findIndex( cart, item );

		if ( cart[ index ].quantity == 1 ) {
			deleteItemFromCart( item );
		} else {
			cart[ index ].quantity = cart[ index ].quantity - 1;
		}
		show_cart();

	} );

	$( "body" ).on( "click", ".IncreaseToCart", function () {
		var item = {
			id: $( this ).attr( "data-id" )
		};
		var index = _.findIndex( cart, item );
		cart[ index ].quantity = cart[ index ].quantity + 1;
		show_cart();

	} );

	$( "body" ).on( "click", ".DeleteItem", function () {
		var item = {
			id: $( this ).attr( "data-id" )
		};

		deleteItemFromCart( item );
	} );

	$( "body" ).on( "click", ".DiscountItem", function () {

	} );

	function deleteItemFromCart( item ) {
		var index = _.findIndex( cart, item );
		cart.splice( index, 1 );
		show_cart();
	}

	$( "body" ).on( "click", "#completeOrder", function () {
		if ( cart.length < 1 ) {

			$( "#myModal" ).modal( "hide" );

			swal( "", "Cart is Empty", "error" );

			return false;
		}
		if(cartDebit.length > 0) {
			cart = cartDebit;
		}


    	if(	$( "#change" ).val()< 0)
		{

		if($( "#customer_id" ).val() !="")
	    {
	        		var form_data = {
				id:<?php  if(!empty($_GET["debit_id"])) {echo $_GET["debit_id"];} else{ echo 0;} ?>,
				table_id:$("#table_id").val(),
				comment:$("#comments").val(),
				customer_id: $( "#customer_id" ).val(),
				type: $( "#OrderType" ).val(),
			    total_given: $( "#total_given" ).val(),
            	amount : $( "#total_amount" ).val(),
		     	change: $( "#change" ).val(),
				cart:cart,
			};
			console.log(form_data);
			$.ajax( {
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				url: '<?php echo url("sale/debit_order"); ?>',
				data: form_data,
				success: function ( msg ) {
					console.log(msg);
				$.ajax( {
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				url: '<?php echo url("tables/set_table_empty"); ?>',
				data: { id:'<?php echo $table_id; ?>'},
				success: function ( msg ) {
				 window.location.href="/tables_orders"
				}
			});

				}
			});

	    }
	    else
	    {
       var OrderType = $("#OrderType").val();
       if(OrderType == "pos")
       {
           	$("#DebitNext").show();
		$("#CustomerNext").hide();
		$("#myModalHome").modal("show");
		$("#myModal").modal("hide");

        }
        else
        {
		$("#myModal").modal("show");
        	}
	    }
		}
		else
		{
		$("#TableNo").text("");
		var status = 1;
		var form_data = {
			comments: $( "#comments" ).val(),
			customer_id: $( "#customer_id" ).val(),
			discount: $( "#discount" ).val(),
			cashier_id: $( "#cashier_id" ).val(),
			payment_with: $( "#payment_type" ).val(),
			type: $( "#OrderType" ).val(),
			status:status,
			total_given: $( "#total_given" ).val(),
        	debit_id: $( "#debit_id" ).val(),
			change: $( "#change" ).val(),
			vat: $( "#vat" ).val(),
			delivery_cost: $( "#delivery_cost" ).val(),
			customer_id: $( "#customer_id" ).val(),
			items: _.map( cart, function ( cart ) {
				return {
					product_id: cart.product_id,
					size: cart.size,
					quantity: cart.quantity,
					price: cart.price
				}
			} )
		};
		var total_amount = Number( localStorage.getItem( "total_amount" ) );
		_.map( cart, function ( cart ) {
			localStorage.setItem( "total_amount", total_amount + ( cart.quantity * cart.price ) );
		} );
		    		$( "#completeOrder" ).html( '<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>' );
		$( "#completeOrder" ).prop( "disabled", true );

		$.ajax( {
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
			},
			url: '<?php echo url("sales/complete_sale"); ?>',
			data: form_data,
			success: function ( msg ) {
				$( "#myModal" ).modal( "hide" );
				cart = [];
				$( "#total_given" ).val( "" );
				$( "#change" ).val( "" );
				$( "#comments" ).val( "" );
				$( "#total_amount_model" ).html( "0.00" );
				$( "#completeOrder" ).html( 'Checkout' );
				$( "#completeOrder" ).prop( "disabled", false );

				$("#full_name").val("");
				$("#address_c").val("");
				$("#neighborhood").val("");
				$("#comments_c").val("");
				$("#id").val("");

				var form_dataa = {
					did:$("#holdOrderID").val()
				}

				$("#holdOrderID").val("");
				$.ajax( {
					type: 'POST',
					headers: {
						'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
					},
					url: '<?php echo url("sale/hold_order_remove"); ?>',
					data: form_dataa,
					success: function ( msg ) {

					}
				});

				var form_dataa = {
					id:<?php  if(!empty($_GET["debit_id"])) {echo $_GET["debit_id"];} else{ echo 0;} ?>
				}

				$("#debit_order").val("");
				$.ajax( {
					type: 'POST',
					headers: {
						'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
					},
					url: '<?php echo url("sale/debit_order_remove"); ?>',
					data: form_dataa,
					success: function ( msg ) {

					}
				});
						   			$.ajax( {
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				url: '<?php echo url("tables/set_table_empty"); ?>',
				data: { id:'<?php echo $table_id; ?>'},
				success: function ( msg ) {
				//  window.location.href="/tables_orders"
				}
			});
				swal( {
					title: '@lang("pos.order_complete")',
					type: 'success',
					text: ''
				} ).then( function () {

					window.open( msg, "_blank" );

				} )
				$( "#p_subtotal" ).html( "0.00" );

				$( "#p_hst" ).html( "0.00" );

				$( "#p_discount" ).html( "0.00" );
				show_cart();
			}
		} );


		}

	} );
	$( "body" ).on( "click", "#freeOrder", function () {
		if ( cart.length < 1 ) {

			$( "#myModal" ).modal( "hide" );

			swal( "", "Cart is Empty", "error" );

			return false;
		}
		$("#TableNo").text("");

		var status = 1;
		// if($("#OrderType").val() == "order") {
		// status = 2;
		// }
		var form_data = {
			orderamount: "free",
			comments: $( "#comments" ).val(),
			customer_id: $( "#customer_id" ).val(),
			discount: $( "#discount" ).val(),
			cashier_id: $( "#cashier_id" ).val(),
			payment_with: $( "#payment_type" ).val(),
			type: $( "#OrderType" ).val(),
			status:status,
			total_given: $( "#total_given" ).val(),

			change: $( "#change" ).val(),
			vat: $( "#vat" ).val(),
			delivery_cost: $( "#delivery_cost" ).val(),
			customer_id: $( "#customer_id" ).val(),
			items: _.map( cart, function ( cart ) {
				return {
					product_id: cart.product_id,
					size: cart.size,
					quantity: cart.quantity,
					price: cart.price
				}
			} )
		};
		var total_amount = Number( localStorage.getItem( "total_amount" ) );
		_.map( cart, function ( cart ) {
			localStorage.setItem( "total_amount", total_amount + ( cart.quantity * cart.price ) );
		} );

		$( "#freeOrder" ).html( '<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>' );
		$( "#freeOrder" ).prop( "disabled", true );

		$.ajax( {
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
			},
			url: '<?php echo url("sales/complete_sale"); ?>',
			data: form_data,
			success: function ( msg ) {
				$( "#myModal" ).modal( "hide" );
				cart = [];
				$( "#total_given" ).val( "" );
				$( "#change" ).val( "" );
				$( "#comments" ).val( "" );
				$( "#total_amount_model" ).html( "0.00" );
				$( "#freeOrder" ).html( 'Checkout' );
				$( "#freeOrder" ).prop( "disabled", false );

				$("#full_name").val("");
				$("#address_c").val("");
				$("#neighborhood").val("");
				$("#comments_c").val("");
				$("#id").val("");

				var form_dataa = {
					did:$("#holdOrderID").val()
				}

				$("#holdOrderID").val("");
				$.ajax( {
					type: 'POST',
					headers: {
						'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
					},
					url: '<?php echo url("sale/hold_order_remove"); ?>',
					data: form_dataa,
					success: function ( msg ) {

					}
				});
					var form_dataa = {
					id:<?php  if(!empty($_GET["debit_id"])) {echo $_GET["debit_id"];} else{ echo 0;} ?>
				}


				$.ajax( {
					type: 'POST',
					headers: {
						'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
					},
					url: '<?php echo url("sale/debit_order_remove"); ?>',
					data: form_dataa,
					success: function ( msg ) {

					}
				});
				swal( {
					title: '@lang("pos.order_complete")',
					type: 'success',
					text: ''
				} ).then( function () {

					window.open( msg, "_blank" );


				} )
				$( "#p_subtotal" ).html( "0.00" );

				$( "#p_hst" ).html( "0.00" );

				$( "#p_discount" ).html( "0.00" );
				show_cart();
			}
		} );
	} );

	$("body").on("change" , "#VatInclude" , function() {
		show_cart();
	});
	function show_cart() {
		if ( cart.length > 0 ) {
			var qty = 0;
			var total = 0;
			var cart_html = "";
			var obj = cart;
			$.each( obj, function ( key, value ) {
				cart_html += '<tr>';
				cart_html += '<td width="10" valign="top"><a href="javascript:void(0)" class="text-danger DeleteItem" data-id=' + value.id + '><i class="fa fa-trash"></i></a></td>';
				cart_html += '<td><h4 style="margin:0px;">' + value.name +'-'+ value.size + '</h4></td>';
				cart_html += '<td width="80"><span class="btn btn-primary btn-sm text-center IncreaseToCart" data-id=' + value.id + '>+</span> ' + value.quantity + ' <span  class="btn btn-primary btn-sm DecreaseToCart" data-id=' + value.id + '>-</span> </td>';
				cart_html += '<td width="15%" class="text-right"><h4 style="margin:0px;"> <?php echo $currency; ?>' + value.price + '</h4> </td>';
				cart_html += '</tr>';
				qty = Number( value.quantity );
				total = Number( total ) + Number( value.price * qty );
			} );
        // 	$( "#change" ).val( "-"+ Number( total ) );

			var VatInclude = $("#VatInclude").val();
			var vat = 0;
			if(VatInclude == "Yes") {
				vat = ( Number( total ) * <?php echo setting_by_key("vat"); ?> ) / 100;
			}


			$( "#p_subtotal" ).html( "<?php echo $currency; ?>" + total.toFixed( 2 ) );

			$( "#p_hst" ).html( "<?php echo $currency; ?>" + vat.toFixed( 2 ) );
			var total_amount = Number( total ) + vat;
			        	$( "#change" ).val( "-"+Number(total_amount)  );

			$( "#total_amount" ).val( total_amount );
			$( "#total_amount_model" ).html("<?php echo $currency; ?>" + total_amount.toFixed( 2 ) );
			$( "#vat" ).val( vat );

			$( ".TotalAmount" ).html( "<?php echo $currency; ?>" + total_amount.toFixed( 2 ) );
			$( "#CartHTML" ).html( "" );
			$( "#CartHTML" ).html( cart_html );
		} else {
				$( ".TotalAmount" ).html( 0 );
				$( "#p_subtotal" ).html( "0.00" );
				$( "#total_amount_model" ).html( "0.00" );
				$( "#p_hst" ).html( "0.00" );
				$( "#CartHTML" ).html( "" );
		}



	}

</script>

<style>

	.cart-item {

		max-height: 160px;

		overflow-y: scroll;

	}



	.scale-anm {

		transform: scale(1);

	}



	.tile {

		-webkit-transform: scale(0);

		transform: scale(0);

		-webkit-transition: all 350ms ease;

		transition: all 350ms ease;

	}



	.tile:hover {}



	.product_list {

		min-height: 240px !important;

		margin-top: 0px;

	}

	.product_list h2 {

		padding: 2px 8px;

		margin-bottom: 8px !important;

		text-align: left;
	}

</style>

<script>

	$( "body" ).on( "click", ".close", function () {
		alert( "close" );
	} );
	$( function () {
		var selectedClass = "";
		$( ".fil-cat" ).click( function () {
			selectedClass = $( this ).attr( "data-rel" );

        $.ajax({
               method:'Get',
                url:'<?php echo url("/menu/"); ?>',
                dataType : 'json' ,
                data:{
                    id:selectedClass
                },
                success :function(res)
                {

                    var tableRow ='';
                    var ctableRow ='';
                    var xtableRow ='';
                    $('.dynamic_row').html('');
                    var k = 0;
                    var  titles2 = [];
                    var name ="";
                    $.each(res.products, function(index,value){
                    console.log(value)
                   if(value.translation!=null)
                    {
                        name = value.translation.name;

                    }
                    else
                    {
                         name = value.name;

                    }
                    $.each(value.titles, function(indexx,valuex){
                          titles2[valuex] = value.prices[indexx]
                           console.log(valuex)
                           console.log(titles2[valuex])
                        ctableRow +='<button data-price="'+titles2[valuex]+'" data-id="'+value.id+'" data-key="'+k+'" data-size="'+valuex+'" data-name="'+name+'" type="button" class="btn btn-sm btn-primary m-r-sm AddToCart tag-margin tag-btn">'+valuex+'</button> '
                        k++;
                      });
                    var imgsrc = 'https://postest.qualitey.com/uploads/products/thumb/'+value.id+'.jpg';
                    tableRow ='<div class="col-xs-12 col-sm-4 col-md-6 col-lg-3 all"><div class="widget white-bg text-center product_list h-100"><img width="100px" alt="image" class="img-circle" src="'+imgsrc+'"><h2 class="m-xs heading-size_image">'+name+'</h2>'

                    xtableRow = tableRow + ctableRow +'</div>';
                    ctableRow='';
                    k=0;
                       $('.dynamic_row').append(xtableRow);
                    });


//end success
                      }


            //end ajax

        });
// 			$( "#portfolio" ).fadeTo( 100, 0.1 );
// 			$( "#portfolio > div" ).not( "." + selectedClass ).fadeOut().removeClass( 'scale-anm' );
// 			setTimeout( function () {
// 				$( "." + selectedClass ).fadeIn().addClass( 'scale-anm' );
// 				$( "#portfolio" ).fadeTo( 300, 1 );
// 			}, 300 );

		} );
	} );


	/// Debit Orders



</script>

<script>
        $('body').on('keyup','#search-products',function(){
            var searchQuery = $(this).val();
            console.log(searchQuery);
            $.ajax({
                method:'Post',
                url:'<?php echo url("product/search"); ?>' ,
                dataType : 'json' ,
                data : {
                    '_token' : '{{ csrf_token() }}',
                    searchQuery :searchQuery
                } ,
                success :function(res){
                    console.log(res);
                    var tableRow ='';
                    var ctableRow ='';
                    var xtableRow ='';
                    $('.dynamic_row').html('');
                    var k = 0;
                    $.each(res, function(index,value){

                        console.log(value)
                        var imgsrc = '/uploads/products/thumb/'+value.product_id+'.jpg';
                        tableRow ='<div class="col-xs-12 col-sm-4 col-md-6 col-lg-3 all"><div class="widget white-bg text-center product_list h-100"><img width="100px" alt="image" class="img-circle" src="'+imgsrc+'"><h2 class="m-xs heading-size_image">'+value.name+'</h2>'
                        $.each(value.titles2, function(indexx,valuex){
                       console.log(indexx);
                       console.log(valuex)
                        ctableRow +='<button data-price="'+valuex+'" data-id="'+value.product_id+'" data-key="'+k+'" data-size="'+indexx+'" data-name="'+value.name+'('+indexx+')" type="button" class="btn btn-sm btn-primary m-r-sm AddToCart tag-margin tag-btn">'+indexx+'</button> '
                        k++;
                    });
                    xtableRow = tableRow + ctableRow +'</div>';
                    ctableRow='';
                    k=0;
                       $('.dynamic_row').append(xtableRow);
                    });
                }
            });
        });
    </script>
@endsection
