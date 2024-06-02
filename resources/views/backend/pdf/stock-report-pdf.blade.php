<!DOCTYPE html>
<html>
<head>
	<title>Stock Report PDF</title>
	<link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-bottom: 20px">
				<table width="100%">
					<tbody>
						<tr>
							<td width="25%"></td>
							<td style="text-align: center;margin-bottom: 20px;">
								<span style="font-size: 24px; background-color: #ddd; text-align: center; font-weight: bold;">Rajbita Telecom</span><br>
								<span style="font-size: 16px;">Authorised Brand Shop</span><br><br>
								<span style="font-size: 14px;">E-mail : rajbitatelecom@gmail.com</span>
							</td>
							<td style="text-align: center;">
								<span style="font-size: 16px; background-color: #ddd; font-weight: bold;">VIVO</span><br>
								<span style="font-size: 12px;">Authorised Brand Shop</span><br>
								<span style="font-size: 14px; background-color: #ddd; font-weight: bold;">Shop - 632</span><br>
								<span style="font-size: 12px;">Level - 6</span><br>
								<span style="font-size: 12px;">Tokyo Square,</span><br>
								<span style="font-size: 12px;">Japan Garden City,</span><br>
								<span style="font-size: 12px;">Mohammadpur,</span><br>
								<span style="font-size: 12px;">Dhaka-1207</span><br>
								<span style="font-size: 14px; font-weight: bold;">Cell - 01822192411</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-bottom: 20px">
				<hr style="margin-bottom: 0px;">
				<table>
					<tbody>
						<tr>
							<td width="70%"></td>
							<td>
								<u><strong style="font-size: 16px">Stock Report</strong></u>
							</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="text-align: center;">
				 <table border="1" width="100%">
                  <thead>
                    <tr style="text-align: center;">
                      <th>SL.</th>
                      <th>Supplier Name</th>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>In Quantity</th>
                      <th>In Unit Price</th>
                      <th>In Buying Price</th>
                      <th>Out Quantity</th>
                      <th>Out Unit Price</th>
                      <th>Out Selling Price</th>
                      <th>Stock</th>
                      <th>Unit Name</th>
                      <th>Create</th>
                      <th>Update</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $product)
                    @php
                    $buying_total_qty = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                    $buying_total_unit_price = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('unit_price');
                    $buying_total_buying_price = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_price');
                    $selling_total_qty = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                    $selling_total_unit_price = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('unit_price');
                    $selling_total_selling_price = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_price');
                    @endphp
                    <tr>
                      <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{$product['supplier']['name']}}</td>
                      <td style="text-align: center;">{{$product['category']['name']}}</td>
                      <td style="text-align: center;">{{$product->name}}</td>
                      <td style="text-align: center;">{{$buying_total_qty}}</td>
                      <td style="text-align: center;">{{$buying_total_unit_price}}</td>
                      <td style="text-align: center;">{{$buying_total_buying_price}}</td>
                      <td style="text-align: center;">{{$selling_total_qty}}</td>
                      <td style="text-align: center;">{{$selling_total_unit_price}}</td>
                      <td style="text-align: center;">{{$selling_total_selling_price}}</td>
                      <td style="text-align: center;">{{$product->quantity}}</td>
                      <td style="text-align: center;">{{$product['unit']['name']}}</td>
                      <td style="text-align: center;">{{$product->created_by_name}}</td>
                      <td style="text-align: center;">{{$product->updated_by_name}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table><br>
                @php
                $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                @endphp
                <i>Printing Time : {{$date->format('F j, Y, g:i a')}}</i><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<hr style="margin-bottom: 20px;">
				<table border="0" width="100%" style="margin-top: 30px;">
					<tbody>
						<tr>
							<td style="width: 40%;">
							</td>
							<td style="width: 20%"></td>
							<td style="width: 40%; text-align: center;">
								<p style="text-align: center; margin-left: 20px;">-------------------------------</p>
								<p style="text-align: center;">Owner Signature</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<hr style="margin-bottom: 10px;">
				<table border="0" width="100%" style="margin-top: 10px;">
					<tbody>
						<tr>
							<td style="text-align: center;margin-bottom: 20px;">
								<span style="font-size: 16px;"><strong> Software made by MD. Nazim Ahmed </strong></span><br>
								<span style="font-size: 14px;"><strong> Mobile : +8801679632572 </strong></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>