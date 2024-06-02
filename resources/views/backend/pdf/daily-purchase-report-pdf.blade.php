<!DOCTYPE html>
<html>
<head>
	<title>Daily Purchase Report PDF</title>
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
							<td width="25%"></td>
							<td>
								<u><strong style="font-size: 16px">Daily Purchase Report ({{date('d-m-Y',strtotime($start_date))}} - {{date('d-m-Y',strtotime($end_date))}})</strong></u>
							</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="text-align: center;">
				<table width="100%" border="1" style="text-align: center;">
                  <thead>
                    <tr style="text-align: center;">
                      <th>SL.</th>
                      <th>Purchase No</th>
                      <th>Date</th>
                      <th>Supplier Name</th>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Approved</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $total_sum = '0';
                    @endphp
                    @foreach($allData as $key => $purchase)
                    <tr>
                      <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{$purchase->purchase_no}}</td>
                      <td style="text-align: center;">{{date('d-m-Y',strtotime($purchase->date))}}</td>
                      <td style="text-align: center;">{{$purchase['supplier']['name']}}</td>
                      <td style="text-align: center;">{{$purchase['category']['name']}}</td>
                      <td style="text-align: center;">{{$purchase['product']['name']}}</td>
                      <td style="text-align: center;">{{$purchase->description}}</td>
                      <td style="text-align: center;">{{$purchase->updated_by_name}}</td>
                      <td style="text-align: center;">
                        {{$purchase->buying_qty}}
                        {{$purchase['product']['unit']['name']}}
                      </td>
                      <td style="text-align: center;">{{$purchase->unit_price}}</td>
                      <td style="text-align: center;">{{$purchase->buying_price}}</td>
                    </tr>
                    @php
                    $total_sum += $purchase->buying_price;
                    @endphp
                    @endforeach
                    <tr>
                      <td colspan="10" style="text-align: center;"><strong>Grand Total: </strong></td>
                      <td style="text-align: center;">{{$total_sum}}</td>
                    </tr>
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