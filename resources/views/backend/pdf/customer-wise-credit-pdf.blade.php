<!DOCTYPE html>
<html>
<head>
	<title>Customer Wise Credit Report PDF</title>
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
							<td width="50%"></td>
							<td>
								<u><strong style="font-size: 16px">Customer Wise Credit Report</strong></u>
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
                      <th>Customer Name</th>
                      <th>Invoice No</th>
                      <th>Date</th>
                      <th>Product Name</th>
                      <th>Approved</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $total_due = '0';
                    @endphp
                    @foreach($allData as $key => $payment)
                    <tr>
                      <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{$payment['customer']['name']}}
                        ({{$payment['customer']['mobile_no']}} - {{$payment['customer']['email']}} - {{$payment['customer']['address']}})
                      </td>
                      <td style="text-align: center;">Invoice no #{{$payment['invoice']['invoice_no']}}</td>
                      <td style="text-align: center;">{{date('d-m-Y',strtotime($payment['invoice']['date']))}}</td>
                      <td style="text-align: center;">
                        @foreach($payment['invoice']['invoice_details'] as $key => $details)
                        {{$details['product']['name']}}
                        @endforeach
                      </td>
                      <td style="text-align: center;">{{$payment['invoice']['approved_by_name']}}</td>
                      <td style="text-align: center;">{{$payment->due_amount}} TK</td>
                    </tr>
                    @php
                    $total_due += $payment->due_amount;
                    @endphp
                    @endforeach
                    <tr>
                      <td colspan="6" style="text-align: center; font-weight: bold;"><strong> Grand Total: </strong></td>
                      <td style="text-align: center; font-weight: bold;">{{$total_due}} TK</td>
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