  @extends('adminTmp')
        @section('content')
        <div class="row">
          <div class="hidden-xs col-md-1 col-lg-1"></div>
          <div class="col-xs-12 col-md-10 col-lg-10" id="projectTB">
             <table class="table">
                <thead>
                   <tr>
                      <th colspan="4">
                         {{$countProject}} Pending Projects
                         <span class="approveall">
                             <a class="tblink" href="/project/pending/approveallproject">approve all</a><i>|</i><a class="back" href="/project">back to approved projects</a>
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
                           <button id="delpj" class="rejectbt" data-toggle="confirmation" value="{{$pj->groupProject->id}}">reject</button>
                           <button id="btn" class="approvebt" value="{{$pj->groupProject->id}}">approve</button>
                           <?php
                               $pj_number = ++$project_number;
                               $current_year = $pj->groupProject->year->year_create;
                               if($pj->groupProject->type_id===1){
                                    $typeAbb = 'BU';
                               } else if($pj->groupProject->type_id===2){
                                    $typeAbb = 'SO';
                               } else {
                                    $typeAbb = 'RE';
                               }
                           ?>
                           @if($pj_number<10)
                           <label id="groupid" >IT{{$current_year}}-{{$typeAbb}}0{{$pj_number}}</label>
                           @else
                           <label id="groupid" >IT{{$current_year}}-{{$typeAbb.$pj_number}}
                           @endif
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
                    <td><a class="tblink" href="/proposalFile/{{$pj->groupProject->proposal[0]->proposal_path_name}}" download><div class="glyphicon glyphicon-download"></div> download proposal</a></td>
                </tr>
                <tr>
                    <th rowspan="3">Team member<span>:</span></th>
                    <?php $teams = App\ProjectStudent::where('project_pkid', $pj->project_pkid)->get(); ?>

                    <td rowspan="3">
                       @foreach($teams as $team)
                       {{$team->student->student_id}}<br>
                       @endforeach
                   </td>
                   <td rowspan="3" colspan="2">
                       @foreach($teams as $team)
                       {{ $team->student->student_name}}<br>
                       @endforeach
                   </td>
                   <?php $advisors = App\ProjectAdvisor::where('project_pkid', $pj->project_pkid)->get();
                        $advisorsNo1 = $advisors[0]->advisor->advisor_name;
                        $advisorsNo2 = $advisors[1]->advisor->advisor_name;
                   ?>
                   <th style="border:0; width:15%;">main advisor<span>:</span></th>
                   <td style="border:0; width:25%;">
                       {{ $advisorsNo1 }}
                   </td>
               </tr>
               <tr rowspan="2"><th>co-advisor<span>:<span></th>
                <td>
                        {{ $advisorsNo2}}
               </td>
           </tr>
       </table>
   </tr>
   @endif
   @endforeach
   @endif
</tbody>
</table>
</div>
<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>

<script src="{!! URL::asset('js/approve.js') !!}"></script>
<script>
// jQuery(document).ready(function($){
//   //close popup and delete row
//   $('.cd-popup').on('click', function(event){
//     if( $(event.target).is('.cd-delete') ) {
//       event.preventDefault();
//       var pjid = document.getElementById("delpj").value;
//       window.location="/project/pending/delete/"+pjid;
//       $(this).removeClass('is-visible');
//     }
//   });
// });
$(document).ready(function(){
 $(".approvebt").on('click',function(){
    var projectid = document.getElementById("btn").value;
    var gpjid = document.getElementById("groupid").innerText;
    window.location="/project/pending/approve/"+projectid+"/"+gpjid;
       $(this).parent().parent().parent().fadeOut(400);
     });
});
$('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        onConfirm: function() {
          var pjid = document.getElementById("delpj").value;
          window.location="/project/pending/delete/"+pjid;
        }
      });
</script>
@stop
