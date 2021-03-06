@extends('layouts.master')

@section('css_header')
<style type="text/css">
    .payslip .table td, .table th {
        padding: 2px;
    }
    
    .payslip .total{
        font-weight: bold; 
        font-size: 16px;
        border-top: 2px solid #eceeef;
    }
</style>
@stop

@section('content')

<!-- ############ PAGE START-->
<div class="row-col">
	<div class="col-lg b-r">
		<div class="row no-gutter">
			<?php $netPay = 0; $consolidatedSalary = 0; $consolidatedAllowance = 0; $grossTotal = 0;  ?>
			@foreach($paycheckSummaries as $paycheckSummary)
			<?php 
			$netPay += $paycheckSummary->net_pay * $paycheckSummary->cycle;
			$consolidatedSalary += $paycheckSummary->consolidated_salary * $paycheckSummary->cycle;
			$consolidatedAllowance += $paycheckSummary->consolidated_allowance * $paycheckSummary->cycle;
			?>
			@endforeach
			
			<div class="col-xs-6 col-sm-3 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa fa-caret-up text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-paper-airplane text-muted"></i></span>
					</div>
					<div class="text-center">
						<h6 class="text-center _600">{{count($paycheckSummaries)}}</h6>
						<p class="text-muted m-b-md"><a href="{{url('/payslip/'.$paychecks[0]->payroll_id)}}">Payslips</a> <a href="{{url('/v2/payslip/'.$paychecks[0]->payroll_id)}}">V2</a></p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-3 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa fa-caret-up text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-pie-graph text-muted"></i></span>
					</div>
					<div class="text-center">
						<h6 class="text-center _600">&#8358;{{number_format($consolidatedSalary, 2)}}</h6>
						<p class="text-muted m-b-md">Consolidated Salary</p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			<?php $sum = 0; ?>
			@foreach($paycheckComponents as $paycheckComponent)
			<?php 
			if($paycheckComponent->component_type != "Earning") continue; 
			$sum += $paycheckComponent->amount * $paycheckComponent->cycle;
			?>
			@endforeach
			<div class="col-xs-6 col-sm-3 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa fa-caret-up text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-pie-graph text-muted"></i></span>
					</div>
					<div class="text-center">
						<h6 class="text-center _600">&#8358;{{number_format($sum, 2)}}</h6>
						<p class="text-muted m-b-md">Total Allowances</p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			<?php $sum = 0; ?>
			@foreach($paycheckComponents as $paycheckComponent)
			<?php 
			if($paycheckComponent->component_type != "Deduction") continue; 
			$sum += $paycheckComponent->amount * $paycheckComponent->cycle;
			?>
			@endforeach
			<div class="col-xs-6 col-sm-3 b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa fa-caret-up text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-pie-graph text-muted"></i></span>
					</div>
					<div class="text-center">
						<h6 class="text-center _600">&#8358;{{number_format($sum, 2)}}</h6>
						<p class="text-muted m-b-md">Total Deductions</p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-3 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa fa-caret-up text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-pie-graph text-muted"></i></span>
					</div>
					<div class="text-center">
						<h6 class="text-center _600">&#8358;{{number_format($netPay, 2)}}</h6>
						<p class="text-muted m-b-md"><a href="/payslip/net_pay/{{$payroll->id}}">Net Pay</a></p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			<?php $edgeDetection = 2; ?>
			@foreach($salaryComponents as $salaryComponent)
			<?php $sum = 0; ?>
			@foreach($paycheckComponents as $paycheckComponent)
			<?php 
			if($paycheckComponent->component_id != $salaryComponent->id) continue; 
			$sum += $paycheckComponent->amount * $paycheckComponent->cycle;
			?>
			@endforeach
			<div class="col-xs-6 col-sm-3 {{$edgeDetection % 4 != 0 ? 'b-r' : ''}} b-b">
			<?php $edgeDetection++; ?>
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa {{$salaryComponent->component_type == "Earning" ? 'fa-caret-up' : 'fa-caret-down'}} text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-document text-muted"></i></span>
					</div>
					<div class="text-center">
						<h6 class="text-center _600">&#8358;{{number_format($sum, 2)}}</h6>
						<p class="text-muted m-b-md"><a href="/payslip/salary_component/{{$payroll->id}}/{{$salaryComponent->id}}">{{$salaryComponent->title}}<!-- ({{$salaryComponent->component_type == "Earning" ? '+' : '-'}}) --></a></p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="padding">
			<div class="row">
		    <!--<div class="col-sm-6">
		        <div class="box">
		            <div class="box-header">
		                <span class="label success pull-right">52</span>
		                <h3>Members</h3>
		            </div>
		            <div class="p-b-sm">
		                <ul class="list no-border m-a-0">
		                    <li class="list-item">
		                        <a href="#" class="list-left">
		                            <span class="w-40 avatar danger">
							                  <span>C</span>
		                            <i class="on b-white bottom"></i>
		                            </span>
		                        </a>
		                        <div class="list-body">
		                            <div><a href="#">Chris Fox</a></div>
		                            <small class="text-muted text-ellipsis">Designer, Blogger</small>
		                        </div>
		                    </li>
		                    <li class="list-item">
		                        <a href="#" class="list-left">
		                            <span class="w-40 avatar purple">
							                  <span>M</span>
		                            <i class="on b-white bottom"></i>
		                            </span>
		                        </a>
		                        <div class="list-body">
		                            <div><a href="#">Mogen Polish</a></div>
		                            <small class="text-muted text-ellipsis">Writter, Mag Editor</small>
		                        </div>
		                    </li>
		                    <li class="list-item">
		                        <a href="#" class="list-left">
		                            <span class="w-40 avatar info">
							                  <span>J</span>
		                            <i class="off b-white bottom"></i>
		                            </span>
		                        </a>
		                        <div class="list-body">
		                            <div><a href="#">Joge Lucky</a></div>
		                            <small class="text-muted text-ellipsis">Art director, Movie Cut</small>
		                        </div>
		                    </li>
		                    <li class="list-item">
		                        <a href="#" class="list-left">
		                            <span class="w-40 avatar warning">
							                  <span>F</span>
		                            <i class="on b-white bottom"></i>
		                            </span>
		                        </a>
		                        <div class="list-body">
		                            <div><a href="#">Folisise Chosielie</a></div>
		                            <small class="text-muted text-ellipsis">Musician, Player</small>
		                        </div>
		                    </li>
		                    <li class="list-item">
		                        <a href="#" class="list-left">
		                            <span class="w-40 avatar success">
							                  <span>P</span>
		                            <i class="away b-white bottom"></i>
		                            </span>
		                        </a>
		                        <div class="list-body">
		                            <div><a href="#">Peter</a></div>
		                            <small class="text-muted text-ellipsis">Musician, Player</small>
		                        </div>
		                    </li>
		                </ul>
		            </div>
		        </div>
		    </div>-->
		    <div class="col-sm-6">
		        <div class="box">
		            <div class="box-header">
		                <span class="label success pull-right">{{count($banks)}}</span>
		                <h3>Banks</h3>
		            </div>
		            <div class="p-b-sm">
		                <div class="list-group no-border no-radius">
		                	@foreach($bankables as $bankCompany => $bankers)
		                	<?php $amountInEntity = 0; ?>
		                		@foreach($bankers as $banker)
				                	<?php $amountInEntity += $banker['net_pay'] * $banker['cycle']; ?>
							    @endforeach
					        <div class="list-group-item">
					            <span class="pull-right text-muted">&#8358;{{number_format($amountInEntity, 2)}}</span>
					            <i class="label label-xs red m-r-sm"></i><a href="/payslip/bank/{{$payroll->id}}/{{$bankers[0]['bank_id']}}">{{$bankCompany}}</a>
					        </div>
					        @endforeach
					    </div>
		            </div>
		        </div>
		    </div>

		    <div class="col-sm-6">
		        <div class="box">
		            <div class="box-header">
		                <span class="label success pull-right">{{count($pensions)}}</span>
		                <h3><a href="/payslip/pension/{{$payroll->id}}">Pension</a></h3>
		            </div>
		            <div class="p-b-sm">
		                <div class="list-group no-border no-radius">
		                	@foreach($pensionables as $pensionCompany => $pensioners)
		                	<?php $amountInEntity = 0; $pension_id; /*dd($pensioners);*/ ?>
		                		@foreach($pensioners as $pensioner)
				                	<?php $amountInEntity += ($pensioner['pension_amount'] + $pensioner['pension_employer_contribution_amount'] + $pensioner['pension_voluntary_contribution_amount']) * $pensioner['cycle']; ?>
				                	<?php $pension_id = $pensioner['pension_id']; ?>
							    @endforeach
					        <div class="list-group-item">
					            <span class="pull-right text-muted">&#8358;{{number_format($amountInEntity, 2)}}</span>
					            <i class="label label-xs red m-r-sm"></i><a href="/payslip/pension/{{$payroll->id}}/{{$pension_id}}">{{$pensionCompany}}</a>
					        </div>
					        @endforeach
					    </div>
		            </div>
		        </div>
		    </div>
		    <div class="col-sm-6">
		    	<div class="row">
		        <!--<div class="box">-->
		        	<!--<div class="box-header">-->
		                <!--<span class="label success pull-right">2</span>-->
		                <h3>Action</h3>
		            <!--</div>-->
		            <!--<div class="box-header">-->
		            	<div class="col-sm-6">
		                	<a id="sendmailslink" href="{{url('/mailpayslips/'. $payroll->id)}}" class="md-btn btn btn-primary"><i class="fa fa-at"></i> MAIL PAYSLIPS</a>
			            </div>
			            <div class="col-sm-6">
			            	 {!! Form::open(array('url' => '/payroll/' . $payroll->id, 'role' => 'form', 'method'=>'DELETE', 'id'=> 'deletePayroll')) !!}
			            <button class="md-btn btn btn-danger"><i class="fa fa-trash"></i> DELETE PAYROLL</button>
			            {!! Form::close() !!}
			            </div>
		            <!--</div>-->
		            
		        <!--</div>-->
		        </div>
		    </div>
		</div>
		</div>
	</div>
	<div class="col-lg w-lg w-auto-md white bg">
		<div>
			<div class="p-a">
				<h6 class="text-muted m-a-0"><a href="/payslip/paycheck_summary/{{$paychecks[0]->payroll_id}}">Salary Payroll {{$paychecks[0]->payroll->paid_at}}</a></h6>
			</div>
			<div class="list inset">
				@foreach($paychecks as $paycheck)
				<a class="list-item" data-toggle="modal" data-target="#employee_{{$paycheck->employee_id}}" data-dismiss="modal">
					<span class="list-left">
						<span class="avatar">
							<i class="on avatar-center no-border"></i>
							<img src="/images/a1.jpg" class="w-20" alt=".">
						</span>
					</span>
					<span class="list-body text-ellipsis">
							{{$paycheck->employee_prefix}} {{$paycheck->employee_surname}} {{$paycheck->employee_othernames}}
					</span>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</div>



<?php $counter = 0; ?>
@foreach($payslips as $paycheck)
<div class="modal fade inactive payslip" id="employee_{{$paycheck[0]->employee_id}}" data-backdrop="false">
    <div class="modal-right w-xxl dark-white b-l" style="overflow">
        <div class="row-col">
            <a data-dismiss="modal" class="pull-right text-muted text-lg p-a-sm m-r-sm">&times;</a>
            <div class="p-a b-b">
                <span class="h5"><a href="{{ url('/v2/payslip/employee/'.$payroll->id.'/'.$paycheck[0]->employee_id)}}"><i class="fa fa-eye"></i> Payslip</a> | <a href="{{ url('/v2/payslip/employee/'.$payroll->id.'/'.$paycheck[0]->employee_id) . '?view_type=print'}}" class="md-btn btn btn-primary"><i class="fa fa-print"></i> PRINT</a> | <a href="{{url('/mailpayslip/'. $payroll->id . '/' . $paycheck[0]->employee_id)}}" class="md-btn btn btn-info sendmaillink"><i class="fa fa-at"></i> MAIL</a></span>
            </div>
            <div style="overflow: auto;">
            <div class="row-row light">
				<!--<div class="col-md-12">-->
				    <div class="box">
				    	<!--
				        <div class="box-header">
				            <h2>{{$AppConfig->company_title}}</h2><small>{{$payroll->title}} {{$payroll->paid_at}}</small></div>
				        <div class="box-divider m-a-0"></div>
				        -->
				        <div class="box-body">
				            <div><h3>{{$paycheck[0]->employee_prefix}} {{$paycheck[0]->employee_surname}} {{$paycheck[0]->employee_othernames}}</h3><small><i>Staff No: {{$paycheck[0]->employee_number}}</i></small></div>
				            <?php $grossTotal = 0; ?>
				            <table class="table">
				                <tr>
				                    <td>Consolidated Salary</td>
				                    <td align="right">&#8358;{{number_format(($paycheck[0]->consolidated_salary / 12) * $paycheck[0]->cycle, 2)}}</td>
				                </tr>
				            <?php $grossTotal += (($paycheck[0]->consolidated_salary / 12) * $paycheck[0]->cycle) + ($paycheck[0]->consolidated_allowance * $paycheck[0]->cycle); ?>
				            </table>
				            <div><h5>Allowances</h5><small><i>Earnings</i></small></div>
		                    <table class="table">
		                        <?php $subTotal = 0; ?>
		                        @foreach($paycheck as $paycheckComponent)
		                        <?php if($paycheckComponent->component_type=="Deduction") continue; ?>
		                        <tr>
		                            <td>{{$paycheckComponent->component_title}}</td>
		                            <?php $subTotal += $paycheckComponent->amount * $paycheckComponent->cycle; ?>
		                            <td align="right">&#8358;{{number_format($paycheckComponent->amount * $paycheckComponent->cycle, 2)}}</td>
		                        </tr>
		                        @endforeach
		                        
		                        <tr class="total">
		                            <td>Total Allowances</td>
		                            <td align="right">&#8358;{{number_format($subTotal, 2)}}</td>
		                        </tr>
		                        
		                    </table>
		                    <?php $grossTotal += $subTotal; ?>
		                    <table class="table">
		                        <tr>
		                            <td><h5><b>Gross Total</b></h5></td>
		                            <td align="right"><h5><b>&#8358;{{number_format($grossTotal, 2)}}</b></h5></td>
		                        </tr>
		                    </table>
				            <div><h5>Deductions</h5><small><i>Deductions</i></small></div>
		                    <table class="table">
		                        <?php $subTotal = 0; ?>
		                        @foreach($paycheck as $paycheckComponent)
		                        <?php if($paycheckComponent->component_type=="Earning") continue; ?>
		                        <tr>
		                            <td>{{$paycheckComponent->component_title}}</td>
		                            <?php $subTotal += $paycheckComponent->amount * $paycheckComponent->cycle; ?>
		                            <td align="right">&#8358;{{number_format($paycheckComponent->amount * $paycheckComponent->cycle, 2)}}</td>
		                        </tr>
		                        @if($paycheckComponent->component_permanent_title == 'pension' && 
		                        	$paycheckComponent->pension_voluntary_contribution_amount > 0)
		                        <tr>
		                            <td>Pension: Voluntary Contribution</td>
		                            <?php $subTotal += $paycheckComponent->pension_voluntary_contribution_amount * $paycheckComponent->cycle; ?>
		                            <td align="right">&#8358;{{number_format($paycheckComponent->pension_voluntary_contribution_amount * $paycheckComponent->cycle, 2)}}</td>
		                        </tr>
		                        @endif
		                        @endforeach
		                        
		                        <tr class="total">
		                            <td>Total Deductions</td>
		                            <td align="right">&#8358;{{number_format($subTotal, 2)}}</td>
		                        </tr>
		                    </table>
		                    <table class="table">
		                        <tr class="total">
		                            <td><h5><b>Net Pay</h5></b></td>
		                            <td align="right"><h5><b>&#8358;{{number_format($paycheck[0]->net_pay * $paycheck[0]->cycle, 2)}}</h5></b></td>
		                        </tr>
		                    </table>
				            <div class="container" style="margin-top: 30px; margin-bottom: 40px;">
                        		<div>Authorized Signature_________________________</div>
                    		</div>
                    		<!--
                    		<div class="container">
                        		<center><button class="md-btn md-fab m-b-sm blue print_slip">
                        			<i class="fa fa-print"></i></button></center>
                    		</div>
                    		-->
				        </div>
				    </div>
				<!--</div>-->
			</div>
			</div>
		</div>
    </div>
</div>

<!-- .modal -->
<div id="mailAjaxNotifier" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title">Alert</h5>
      </div>
      <div class="modal-body text-center p-lg">
        <p id="mailAjaxNotifierMessage">Your message will be sent if your internet is good or the employee has a valid email address</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn primary p-x-md" data-dismiss="modal">Ok</button>
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
<!-- / .modal -->


@endforeach

<script type="text/javascript">
    $('#deletePayroll').submit(function(evt){
        evt.preventDefault();
        if(confirm("Are you sure you want to delete this record?")){
            console.log("goodluck deleting.");
            this.submit()
        }
    });
    
    var lock = 0;
    $('#sendmailslink').on("click", function(evt){
		evt.preventDefault();
		if(lock != 0) return
    	lock++;
		$.ajax({
            url: $(this).attr('href'), 
            method: 'GET',
        }).done(function( data ) {
            if(data && data.status){
            	if(data.message){
                	$('#mailAjaxNotifierMessage').html(data.message);
            	}
            }else{
               $('#mailAjaxNotifierMessage').html("Error occured while sending, please try again");
            }
            $('#mailAjaxNotifier').modal({show: true});
            lock = 0;
        });
	});
    
	$('.sendmaillink').on("click", function(evt){
		evt.preventDefault();
		if(lock != 0) return
    	lock++;
		$.ajax({
            url: $(this).attr('href'), 
            method: 'GET',
        }).done(function( data ) {
            if(data && data.status){
            	if(data.message){
                	$('#mailAjaxNotifierMessage').html(data.message);
            	}
            }else{
               $('#mailAjaxNotifierMessage').html("Error occured while sending, please try again");
            }
            $('#mailAjaxNotifier').modal({show: true});
            lock = 0;
        });
	});
</script>


<!-- ############ PAGE END-->
@stop