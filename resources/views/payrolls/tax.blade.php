@extends($view_type ? 'layouts.print' : 'layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">{{$tax->title}}</h2>
		<h5 class="m-b-md">Schedule of Payment "{{$tax->title}}" {{$payroll->paid_at}}</h5>
		@if(!$view_type)
		<a href="/payslip/tax/{{$payroll->id}}?view_type=print" class="btn rounded btn-outline b-info text-info p-x-md m-y">Print</a>
		<a href="/payroll/{{$payroll->id}}" class="btn blue rounded btn-outline b-default text-default p-x-md m-y">{{$payroll->title}}</a>
		@endif
	</div>
	</div>
</div>
 
@if(count($paycheckComponents) > 0)
<div class="padding">
	<div class="row">
	<div class="col-md-12">
	<!--<div class="col-md-8 offset-sm-2">-->
		<div class="box">
		<div class="box-header">
			<h2 style="text-transform: uppercase;">{{$AppConfig->company_title}} - STAFF TAX SCHEDULE</h2><small><!---{{$tax->title}}--></small></div>
		<div class="box-divider m-a-0"></div>
		<div class="box-body">
			<div class="app-body">
			<!--<div class="padding">-->
				<div class="table-responsive" id="xdatatable">
					<table id="payrolls" class="table table-striped b-t b-b"  data-ui-jp="xdataTable">
					<thead>
						<tr style="text-transform: uppercase;">
							<th>S/N</th>
							<th>DETAIL</th>
							<th>PSN. NO</th>
							<!--<th>Rank</th>-->
							<th>TAX</th>
							<!--<th>Created At</th>-->
						</tr>
					</thead>
					<tbody>
						<?php $counter = 0; $total = 0; ?>
						@foreach($paycheckSummaries as $paycheckSummary)
						<?php if(!$paycheckSummary->taxable) continue; ?>
						<tr>
						<td>{{ ++$counter }}</td>
						<td>{{$paycheckSummary->employee_surname}} {{$paycheckSummary->employee_othernames}}</td>
						<td>{{$paycheckSummary->employee_number}}</td>
						<!--<td>{{$paycheckSummary->rank ? $paycheckSummary->rank : ''}}</td>-->
						<?php
						$amount = $paycheckSummary->cycle * $paycheckSummary->tax_amount;
						?>
						<td>{{number_format($amount, 2)}}</td>
						<!--<td>{{$paycheckSummary->created_at}}</td>-->
						</tr>
						<?php $total += $paycheckSummary->cycle * $paycheckSummary->tax_amount; ?>
						@endforeach
						<tr>
						<th colspan="3"><b>Total</b></th>
						<td><b>&#8358;{{number_format($total, 2)}}</b></td>
						</tr>
					</tbody>
					</table>
				</div>
				<!--</div>-->
				<div class="container" style="margin-top: 30px; margin-bottom: 40px;">
		    		<div>Authorized Signature_________________________</div>
				</div>
			</div>
			</div>
		</div>
	<!--</div>-->
	</div>
	</div>
</div>
@endif
<!-- ############ PAGE END-->
@stop