@extends('adminTmp')
@section('content')
	<script type="text/javascript">
    		function DataTo(value, id) {
    			
    			document.getElementById('btn'+id).setAttribute("onclick","window.location.href = 'pending/approve/"+id+"/"+value+"'");
    			//alert("window.location.href = 'pending/approve/'"+id+"/"+value);
    		}

    		</script>
		<table class="table" id="projectTB">
		<thead>
			<tr>
				<th>
					{{$countProject}} Pending Projects
				<span class="allpro"><a href="/project">all projects</a></span>
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
			    	<input id="proid{{$pj->groupProject->id}}" onblur="DataTo(this.value, {{$pj->groupProject->id}});" type="text" class="form-control" placeholder="project ID" />
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
			    <td><a href="#" download><div class="glyphicon glyphicon-download"></div> download proposal</a></td>
			  </tr>
			  <tr>
			    <th rowspan="3">Team member<span>:</span></th>
			    <?php $teams = App\ProjectStudent::where('project_pkid', $pj->project_pkid)->get(); ?>
			    <td>
			    @foreach($teams as $team)
			    	{{$team->student->student_id}}<br>
			    @endforeach
			    </td>
			    <td colspan="2">
			    @foreach($teams as $team)
			    	{{ $team->student->student_fname." ".$team->student->student_lname }}<br>
			    @endforeach
			    </td>
			    <?php $advisors = App\ProjectAdvisor::where('project_pkid', $pj->project_pkid)->get(); ?>
			    <th>Advisor<span>:</span></th>
			    <td>
			     @foreach($advisors as $key => $advisor)
			    	{{ $advisor->advisor->advisor_fname." ".$advisor->advisor->advisor_lname }}@if($key < 1)<label id="main">Main</label>@endif<br>
			    @endforeach
			    </td>
			  </tr>
	        </table>
	      </tr>
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
    	<script src="{!! URL::asset('js/approve.js') !!}"></script>
	      @endif
	      @endforeach
	      @endif
		    </tbody>
			</table>
		
		

@stop
