<!DOCTYPE html>
<html>
<head>
	<title>Invoice Details PDF</title>
	<link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-bottom: 20px">
				<table width="100%">
					<tbody>
						<tr>
							<td><strong>Invoice No: # {{$payment['invoice']['invoice_no']}}</strong></td>
							<td style="text-align: center;margin-bottom: 20px;">
								<span style="font-size: 26px; background-color: #ddd; font-weight: bold;">CASH MEMO</span><br><br>
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
							<td width="38%"></td>
							<td>
								<u><strong style="font-size: 16px">Customer Invoice Details</strong></u>
							</td>
							<td width="30%"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table width="100%" style="margin-bottom: 10px">
					<tbody>
						<tr>
							<td colspan="3"><strong>Customer Info</strong></td>
						</tr>
						<tr>
							<td width="30%"><strong>Name : </strong>{{$payment['customer']['name']}}</td>
							<td width="30%"><strong>Mobile : </strong>{{$payment['customer']['mobile_no']}}</td>
							<td width="40%"><strong>Email : </strong>{{$payment['customer']['email']}}</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" style="margin-bottom: 10px">
					<tbody>
						<tr>
							<td width="50%"><p><strong>Address :</strong> {{$payment['customer']['address']}}</p></td>
						</tr>
					</tbody>
				</table>
				<table width="100%" style="margin-bottom: 50px">
					<tbody>
						<tr>
							<td width="50%"><p><strong>Description :</strong> {{$payment['invoice']['description']}}</p></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="text-align: center;">
				<table border="1" width="100%" style="margin-bottom: 30px;">
					<thead>
						<tr class="text-center">
							<th>SL.</th>
							<th>Category</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Unit Price</th>
							<th>Total Price</th>
						</tr>
					</thead>
					<tbody>
						@php
						$total_sum = '0';
						$invoice_details = App\Model\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
						@endphp
						@foreach($invoice_details as $key => $details)
						<tr class="text-center">
							<td style="text-align: center;">{{$key + 1}}</td>
							<td style="text-align: center;">{{$details['category']['name']}}</td>
							<td style="text-align: center;">{{$details['product']['name']}}</td>
							<td style="text-align: center;">{{$details->selling_qty}}</td>
							<td style="text-align: center;">{{$details->unit_price}}</td>
							<td style="text-align: center;">{{$details->selling_price}}</td>
						</tr>
						@php
						$total_sum += $details->selling_price;
						@endphp
						@endforeach
						<tr class="text-center">
							<td colspan="5" style="text-align: center;"><strong>Sub Total :</strong></td>
							<td style="text-align: center;"><strong>{{$total_sum}}</strong></td>
						</tr>
						<tr class="text-center">
							<td colspan="5" style="text-align: center;"><strong>Discount :</strong></td>
							<td style="text-align: center;"><strong>{{$payment->discount_amount}}</strong></td>
						</tr>
						<tr class="text-center">
							<td colspan="5" style="text-align: center;"><strong>Paid Amount :</strong></td>
							<td style="text-align: center;"><strong>{{$payment->paid_amount}}</strong></td>
						</tr>
						<tr class="text-center">
							<td colspan="5" style="text-align: center;"><strong>Due Amount :</strong></td>
							<input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
							<td style="text-align: center;"><strong>{{$payment->due_amount}}</strong></td>
						</tr>
						<tr class="text-center">
							<td colspan="5" style="text-align: center;"><strong>Grand Total :</strong></td>
							<td style="text-align: center;"><strong>{{$payment->total_amount}}</strong></td>
						</tr>
						<tr>
							<td colspan="6" style="text-align: center; font-weight: bold;">Paid Summary</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;"><strong>Date</strong></td>
							<td colspan="2" style="text-align: center;"><strong>Amount</strong></td>
							<td colspan="2" style="text-align: center;"><strong>Received</strong></td>
						</tr>
						@php
						$payment_details = App\Model\PaymentDetail::where('invoice_id',$payment->invoice_id)->get();
						@endphp
						@foreach($payment_details as $detail)
						<tr>
							<td colspan="2" style="text-align: center;">{{date('d-m-Y',strtotime($detail->date))}}</td>
							<td colspan="2" style="text-align: center;">{{$detail->current_paid_amount}}</td>
							<td colspan="2" style="text-align: center;">{{$detail->created_by_name}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
                  @php
                  $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                  @endphp
                  <i>Printing Time : {{$date->format('F j, Y, g:i a')}}</i>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<hr style="margin-bottom: 20px;">
				<table border="0" width="100%" style="margin-top: 30px;">
					<tbody>
						<tr>
							<td style="width: 40%;">
								<p style="text-align: center; margin-left: 20px;">-------------------------------</p>
								<p style="text-align: center; margin-left: 20px;">Customer Signature</p>
							</td>
							<td style="width: 20%"></td>
							<td style="width: 40%; text-align: center;">
								<p style="text-align: center; margin-left: 20px;">-------------------------------</p>
								<p style="text-align: center;">Seller Signature</p>
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