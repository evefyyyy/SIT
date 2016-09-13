@extends('adminTmp')
@section('content')
<script type="text/javascript">
function DataTo(value, id) {

	document.getElementById('btn'+id).setAttribute("onclick","window.location.href = 'pending/approve/"+id+"/"+value+"'");
    			//alert("window.location.href = 'pending/approve/'"+id+"/"+value);
    		}

    		</script>
    	<div class="row">
    		<div id="projectTB">
    			<table class="table">
    				<thead>
    					<tr>
    						<th colspan="4">
    							{{$countProject}} Pending Projects
    						<span class="approveall">
    							<a href="#">approve all</a><i>|</i><a class="back" href="/project">back to approved projects</a>
    						</span>
    						</th>
    					</tr>
    				</thead>
    				<tbody>
    					@if($countProject===0)
    					<tr>
    						<td colspan="4" class="no-project">no pending project</td>
    					</tr>
    					@else
    					@foreach($project as $pj)
    					@if($pj->groupProject->group_project_approve===0)
    					<tr>
    						<table class="table pending">
    							<tr>
    								<th rowspan="2" style="width:15%">Project name<span>:</span></th>
    								<td colspan="3" rowspan="2" style="width:55%" id="name">
    									{{$pj->groupProject->group_project_eng_name}}
    									<br>{{$pj->groupProject->group_project_th_name}}
    								</td>
    								<td rowspan="2" colspan="3" style="width:30%" id="proid">
    									<button id="delpj" class="rejectbt cd-popup-trigger" value="{{$pj->groupProject->id}}">reject</button>
    									<button id="btn{{$pj->groupProject->id}}" class="delete approvebt">approve</button>
    									<label id="proid{{$pj->groupProject->id}}" onblur="DataTo(this.value, {{$pj->groupProject->id}});">IT56-bu01</label>
    								</td>
    							</tr>
    							<tr>
    							</tr>
    							<tr>
    								<th>Type<span>:</span></th>
    								<td style="width:15%">{{$pj->groupProject->type->type_name}}</td>
    								<th style="width:15%">Category<span>:</span></th>
    								<td style="width:15%">{{$pj->groupProject->category->category_name}}</td>
    								<td></td>
    								<td><a href="/proposalFile/{{$pj->groupProject->proposal[0]->proposal_path_name}}" download><div class="glyphicon glyphicon-download"></div> download proposal</a></td>
    							</tr>
    							<tr>
    								<th rowspan="2">Team member<span>:</span></th>
    								<?php $teams = App\ProjectStudent::where('project_pkid', $pj->project_pkid)->get(); ?>
    								<td rowspan="2">
    									@foreach($teams as $team)
    									{{$team->student->student_id}}<br>
    									@endforeach
    								</td>
    								<td rowspan="2" colspan="2">
    									@foreach($teams as $team)
    									{{ $team->student->student_name }}<br>
    									@endforeach
    								</td>
    								<?php $advisors = App\ProjectAdvisor::where('project_pkid', $pj->project_pkid)->get(); ?>
    								<th style="border:0">main advisor<span>:</span></th>
    								<td style="border:0">
    									{{ $advisors[0]->advisor->advisor_name}}
    								</td>
    							</tr>
    							<tr><th>co-advisor<span>:<span></th>
    								<td>
										{{ $advisors[1]->advisor->advisor_name}}
    								</td>
    							</tr>
    						</table>
    					</tr>

    					<script src="{!! URL::asset('js/approve.js') !!}"></script>
    					@endif
    					@endforeach
    					@endif
    				</tbody>
    			</table>
    		</div>
    	</div>
    			<div class="cd-popup" role="alert">
    				<div class="cd-popup-container">
    					<p>Are you sure you want to reject this project?</p>
    					<ul class="cd-buttons">
    						<li><a class="cd-delete">Yes</a></li>
    						<li><a class="cd-close">No</a></li>
    					</ul>
    					<a class="cd-popup-close cd-close img-replace"></a>
    				</div> <!-- cd-popup-container -->
    			</div> <!-- cd-popup -->



    			@stop
