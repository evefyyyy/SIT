@extends('adminTmp')
@section('content')
<h2><img height="45" src="/img/exam.png">score record</h2>
<div class="row">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-6 col-md-5 col-lg-5" style="padding-top:5px">
		<a class="toggle-vis" data-column="2">round 1</a><span class="lol">/</span>
		<a class="toggle-vis" data-column="3">round 2</a><span class="lol">/</span>
		<a class="toggle-vis" data-column="4">round 3</a><span class="lol">/</span>
		<a class="toggle-vis" data-column="5">round 4</a>
	</div>
	<div class="col-xs-6 col-md-5 col-lg-5">
       <input id="searchInput" name="search" class="pjsearch form-control" placeholder="Search here"/>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10" id="scoreTB">
		<table id="example" class="table table-bordered" style="width:100%">
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
<script src="{!! URL::asset('js/jquery.dataTables.min.js') !!}"></script>
<script>
$('table').filterForTable();
$('#searchInput').on( 'keyup', function () {
    table.search( this.value ).draw();
} );
$(document).ready(function() {
    var table = $('#example').DataTable( {
    	paging: false,
    	searching: false
    } );
 
    $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );


    } );
} );
</script>
@stop