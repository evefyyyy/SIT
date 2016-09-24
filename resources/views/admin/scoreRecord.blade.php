@extends('adminTmp')
@section('content')
<h2><img height="45" src="/img/exam.png">score record</h2>
<div class="row">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-6 col-md-5 col-lg-5"></div>
	<div class="col-xs-6 col-md-5 col-lg-5 table-bar">
		<div class="button-group">
        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></button>
			<ul class="dropdown-menu dropdown-menu-right">
				  <li>
				    <a href="#" class="small toggle-vis" data-value="option1" tabIndex="-1" data-column="2">
				      <input type="checkbox" checked/>&nbsp;Round 1
				    </a>
				  </li>
				  <li>
				    <a href="#" class="small toggle-vis" data-value="option2" tabIndex="-1" data-column="3">
				      <input type="checkbox" checked/>&nbsp;Round 2
				    </a>
				  </li>
				  <li>
				    <a href="#" class="small toggle-vis" data-value="option3" tabIndex="-1" data-column="4">
				       <input type="checkbox" checked/>&nbsp;Round 3
				    </a>
				  </li>
				  <li>
				     <a href="#" class="small toggle-vis" data-value="option4" tabIndex="-1" data-column="5">
				       <input type="checkbox" checked/>&nbsp;Round 4
				     </a>
				  </li>
			</ul>
       <input id="searchInput" name="search" class="pjsearch form-control" placeholder="Search here"/>
       </div>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10" id="scoreTB">
		<table id="pjtable" class="table table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>project id</th>
					<th>project name</th>
					<th>round 1</th>
					<th>round 2</th>
					<th>round 3</th>
					<th>round 4</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>IT56-BU21</td>
					<td>ระบบจัดการศูนย์ข้อมูล</td>
					<td>92</td>
					<td>90</td>
					<td>95</td>
					<td></td>
				</tr>
				<tr>
					<td>IT56-SO02</td>
					<td>ระบบควบคุมพลังงานไฟฟ้าภายในอาคาร</td>
					<td>80</td>
					<td>95</td>
					<td>92</td>
					<td></td>
				</tr>
				<tr>
					<td>IT56-RE11</td>
					<td>เทคนิคการระบุตัวตนระหว่างเครือข่ายสังคมออนไลน์</td>
					<td>82</td>
					<td>69</td>
					<td>86</td>
					<td></td>
				</tr>
				<tr>
					<td>IT56-BU01</td>
					<td>ระบบดูแลสุขภาพอัจฉริยะ</td>
					<td>72</td>
					<td>64</td>
					<td>88</td>
					<td></td>
				</tr>
				<tr>
					<td>IT56-RE20</td>
					<td>อุปกรณ์ติดตามพฤติกรรมสุนัข</td>
					<td>77</td>
					<td>74</td>
					<td>63</td>
					<td></td>
				</tr>
				<tr>
					<td>IT56-BU08</td>
					<td>ระบบการเรียนอัจฉริยะ</td>
					<td>77</td>
					<td>55</td>
					<td>65</td>
					<td></td>
				</tr>
				<tr>
					<td>IT56-SO21</td>
					<td>เว็บไซต์แสดงผลงานนักศึกษาคณะเทคโนโลยีสารสนเทศ</td>
					<td>89</td>
					<td>73</td>
					<td>65</td>
					<td></td>
				</tr>
				<tr>
					<td>IT56-SO22</td>
					<td>เว็บแอปพบิเคชั่นสำหรับจัดการค่าย</td>
					<td>69</td>
					<td>59</td>
					<td>65</td>
					<td></td>
				</tr>
				<tr>
					<td>IT56-SO05</td>
					<td>เว็บไซส์ศูนย์รวมสำหรับผู้สูงอายุ</td>
					<td>90</td>
					<td>59</td>
					<td>82</td>
					<td></td>
				</tr>
			</tbody>
    	</table>
	</div>
<div class="hidden-xs col-md-1 col-lg-1"></div>
<script src="{!! URL::asset('js/search.js') !!}"></script>
<script>
$('table').filterForTable();
$('#searchInput').on( 'keyup', function () {
    table.search( this.value ).draw();
} );
$(document).ready(function() {
    var table = $('#pjtable').DataTable( {
    	 "searching": false
    } );
 
    $('a.toggle-vis').on( 'click', function (e) {
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );


    } );
} );
</script>
@stop