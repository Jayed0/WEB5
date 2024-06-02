<!DOCTYPE html>
<html>
<head>
	<title>Daily Invoice Report PDF</title>
	<link rel="stylesheet" href="<?php echo e(asset('public/backend')); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
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
								<u><strong style="font-size: 16px">Daily Invoice Report (<?php echo e(date('d-m-Y',strtotime($start_date))); ?> - <?php echo e(date('d-m-Y',strtotime($end_date))); ?>)</strong></u>
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
                      <th>Customer Info</th>
                      <th>Invoice No</th>
                      <th>Date</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Received</th>
                      <th>Buy Qty</th>
                      <th>Buy Unit Price</th>
                      <th>Buying Price</th>
                      <th>Sell Qty</th>
                      <th>Sell Unit Price</th>
                      <th>Selling Price</th>
                      <th>Total Price</th>
                      <th>Discount</th>
                      <th>Grand Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
                  	$total = '0';
                  	$discount_sum = '0';
                  	$total_sum = '0';
                  	?>
                    <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="text-align: center;">
                      <td style="text-align: center;"><?php echo e($key+1); ?></td>
                      <td style="text-align: center;">
                      <?php echo e($invoice['payment']['customer']['name']); ?>

                      (<?php echo e($invoice['payment']['customer']['mobile_no']); ?> - <?php echo e($invoice['payment']['customer']['email']); ?> - <?php echo e($invoice['payment']['customer']['address']); ?>)
                      </td>
                      <td style="text-align: center;">Invoice No #<?php echo e($invoice->invoice_no); ?></td>
                      <td style="text-align: center;"><?php echo e(date('d-m-Y',strtotime($invoice->date))); ?></td>
                      <td style="text-align: center;">
                      	<?php $__currentLoopData = $invoice['invoice_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      	<?php echo e($details['product']['name']); ?>

                      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </td>
                      <td style="text-align: center;"><?php echo e($invoice->description); ?></td>
                      <td style="text-align: center;"><?php echo e($invoice->approved_by_name); ?></td>
                      <td style="text-align: center;">
                      	<?php $__currentLoopData = $invoice['invoice_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      	<?php echo e($details['purchases']['buying_qty']); ?>

                      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </td>
                      <td style="text-align: center;">
                      	<?php $__currentLoopData = $invoice['invoice_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      	<?php echo e($details['purchases']['unit_price']); ?>

                      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </td>
                      <td style="text-align: center;">
                      	<?php
                      	$total_selling_price = '0';
                      	?>
                      	<?php $__currentLoopData = $invoice['invoice_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      	<?php echo e($details['purchases']['buying_price']); ?><br>
                      	<?php
                      	$total_selling_price += $details->selling_price;
                      	?>
                      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </td>
                      <td style="text-align: center;">
                      	<?php $__currentLoopData = $invoice['invoice_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      	<?php echo e($details->selling_qty); ?><br>
                      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </td>
                      <td style="text-align: center;">
                      	<?php $__currentLoopData = $invoice['invoice_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      	<?php echo e($details->unit_price); ?><br>
                      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </td>
                      <td style="text-align: center;">
                      	<?php
                      	$total_selling_price = '0';
                      	?>
                      	<?php $__currentLoopData = $invoice['invoice_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      	<?php echo e($details->selling_price); ?><br>
                      	<?php
                      	$total_selling_price += $details->selling_price;
                      	?>
                      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </td>
                      <td style="text-align: center;"><?php echo e($total_selling_price); ?></td>
                      <td style="text-align: center;"><?php echo e($invoice['payment']['discount_amount']); ?></td>
                      <td style="text-align: center;"><?php echo e($invoice['payment']['total_amount']); ?></td>
                      <?php
                      $discount_sum += $invoice['payment']['discount_amount'];
                      $total_sum += $invoice['payment']['total_amount'];
                      $total = $total_sum + $discount_sum;
                      ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    	<td colspan="13" style="text-align: center;">Grand Total: </td>
                    	<td style="text-align: center;"><?php echo e($total); ?></td>
                    	<td style="text-align: center;"><?php echo e($discount_sum); ?></td>
                    	<td style="text-align: center;"><?php echo e($total_sum); ?></td>
                    </tr>
                  </tbody>
                </table><br>
                <?php
                $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                ?>
                <i>Printing Time : <?php echo e($date->format('F j, Y, g:i a')); ?></i><br>
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
</html><?php /**PATH E:\xampp\htdocs\pos\resources\views/backend/pdf/daily-invoice-report-pdf.blade.php ENDPATH**/ ?>