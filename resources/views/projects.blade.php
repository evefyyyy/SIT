@extends('generalTmp')
@section('content')
<div class="row filter-head">
        <div class="col-lg-12">
            <div class="text-center">
                <button class="btn btn-sm" data-toggle="portfilter" data-target="all">
                    All
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="education">
                    education
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="games">
                    games
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="health">
                    health
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="sports">
                    sports
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="travel">
                    travel
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="others">
                    others
                </button>
            </div>
        </div>
    </div>
<div class="row">
	<div class="hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
			<div class="col-xs-18 col-sm-6 col-md-3" data-tag='education'>
	          <div class="thumbnail">
	            <img src="/img/the_secret_life_of_pets.jpg" alt="">
	              <div class="caption">
	                <h6>SIT Portfolio</h6>
	                <p>เว็บไซต์แสดงผลงานนักศึกษาคณะเทคโนโลยีสารสนเทศ</p>
	            </div>
	          </div>
	        </div>
	        <div class="col-xs-18 col-sm-6 col-md-3" data-tag='health'>
	          <div class="thumbnail">
	            <img src="/img/white_bengal_tiger.jpg" alt="">
	              <div class="caption">
	                <h6>Authentic Yoga With Deepak Chopra And Tara Stiles</h6>
	                <p>สำหรับคนที่อยากฝึกโยคะ แต่ไม่อยากไปหาคอร์สเรียนโยคะ ต้องแอพฯ นี้เลย</p>
	            </div>
	          </div>
	        </div>
	        <div class="col-xs-18 col-sm-6 col-md-3" data-tag='games'>
	          <div class="thumbnail">
	            <img src="/img/kung_fu_panda_2.jpg" alt="">
	              <div class="caption">
	                <h6>YaAndYou application</h6>
	                <p>แอพพลิเคชั่นสำหรับสืบค้นและบริการข้อมูลความรู้ด้านยาและสุขภาพ</p>
	            </div>
	          </div>
	        </div>
	        <div class="col-xs-18 col-sm-6 col-md-3" data-tag='education'>
	          <div class="thumbnail">
	            <img src="/img/kitty_12.jpg" alt="">
	              <div class="caption">
	                <h6>CM TOEIC Practice Test</h6>
	                <p>แอพพลิเคชั่นสำหรับผู้เรียนที่ต้องการฝึกฝนภาษาอังกฤษเพื่อเตรียมความพร้อมก่อนสอบ TOEIC หรือผู้ที่ต้องการฝึกภาษาอังกฤษทั่วไป</p>
	            </div>
	          </div>
	        </div>
			<div class="col-xs-18 col-sm-6 col-md-3" data-tag='travel'>
	          <div class="thumbnail">
	            <img src="/img/summertime.jpg" alt="">
	              <div class="caption">
	                <h6>Skyscanner</h6>
	                <p>ผู้ช่วยคนเก่งเพื่อการประหยัดเงินค่าเดินทางสูงสุดของคุณ กับแอพพลิเคชั่นฟรีของ Skyscanner ที่ทำหน้าที่ค้นหาตั๋วเครื่องบิน โรงแรม และรถเช่าที่ดีที่สุดในราคาประหยัดสูงสุดในทุกสถานที่ที่คุณต้องการเดินทางไปถึง</p>
	            </div>
	          </div>
	        </div>
	        <div class="col-xs-18 col-sm-6 col-md-3" data-tag='sports'>
	          <div class="thumbnail">
	            <img src="/img/sexy_red_lips.jpg" alt="">
	              <div class="caption">
	                <h6>Authentic Yoga With Deepak Chopra And Tara Stiles</h6>
	                <p>สำหรับคนที่อยากฝึกโยคะ แต่ไม่อยากไปหาคอร์สเรียนโยคะ ต้องแอพฯ นี้เลย</p>
	            </div>
	          </div>
	        </div>
	        <div class="col-xs-18 col-sm-6 col-md-3" data-tag='sports'>
	          <div class="thumbnail">
	            <img src="http://placehold.it/500x300" alt="">
	              <div class="caption">
	                <h6>PvP Phrasal Verbs</h6>
	                <p>แอพพลิเคชั่นสำหรับการเรียนไวยากรณ์ โดยเฉพาะกริยาวลี ซึ่งมีถึง 400 กว่าคำ มีคำอธิบายพร้อมตัวอย่างประโยค</p>
	            </div>
	          </div>
	        </div>
	        <div class="col-xs-18 col-sm-6 col-md-3" data-tag='others'>
	          <div class="thumbnail">
	            <img src="http://placehold.it/500x300" alt="">
	              <div class="caption">
	                <h6>CM TOEIC Practice Test</h6>
	                <p>แอพฯ สำหรับควบคุมการทำงานหรือการนำเสนองานผ่าน Microsoft Office เหมาะสำหรับนักเรียน นักศึกษา พนักงานบริษัท ที่ต้องการนำเสนองานผ่าน PowerPoint, Excel หรือเอกสาร Microsoft Office อื่นๆ</p>
	            </div>
	          </div>
	        </div>
			<div class="col-xs-18 col-sm-6 col-md-3">
	          <div class="thumbnail">
	            <img src="http://placehold.it/500x300" alt="travel">
	              <div class="caption">
	                <h6>SIT Portfolio</h6>
	                <p>เว็บไซต์แสดงผลงานนักศึกษาคณะเทคโนโลยีสารสนเทศ</p>
	            </div>
	          </div>
	        </div>
	        <div class="col-xs-18 col-sm-6 col-md-3" data-tag='games'>
	          <div class="thumbnail">
	            <img src="http://placehold.it/500x300" alt="">
	              <div class="caption">
	                <h6>Authentic Yoga With Deepak Chopra And Tara Stiles</h6>
	                <p>สำหรับคนที่อยากฝึกโยคะแต่ไม่อยากไปหาคอร์สเรียนโยคะ ต้องแอพฯ นี้เลย</p>
	            </div>
	          </div>
	        </div>
	        <div class="col-xs-18 col-sm-6 col-md-3" data-tag='others'>
	          <div class="thumbnail">
	            <img src="http://placehold.it/500x300" alt="">
	              <div class="caption">
	                <h6>YaAndYou application</h6>
	                <p>แอพพลิเคชั่นสำหรับสืบค้นและบริการข้อมูลความรู้ด้านยาและสุขภาพ</p>
	            </div>
	          </div>
	        </div>
	        <div class="col-xs-18 col-sm-6 col-md-3" data-tag='sports'>
	          <div class="thumbnail">
	            <img src="http://placehold.it/500x300" alt="">
	              <div class="caption">
	                <h6>CM TOEIC Practice Test</h6>
	                <p>แอพพลิเคชั่นสำหรับผู้เรียนที่ต้องการฝึกฝนภาษาอังกฤษเพื่อเตรียมความพร้อมก่อนสอบ TOEIC หรือผู้ที่ต้องการฝึกภาษาอังกฤษทั่วไป</p>
	            </div>
	          </div>
	        </div>
		</div>
	<div class="hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
</div>
	<script>
		$(document).ready(function() {
		    $("div.caption").dotdotdot(
		    {
		        ellipsis : '...',
		        wrap: "word",
		        height: 75,
		    });
		});
	</script>
@stop