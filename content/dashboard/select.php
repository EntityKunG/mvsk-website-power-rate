<?php 
namespace content\dashboard;

use template\TemplateHandle;
use lib\FewPHP;

TemplateHandle::printTitle("เลือกระดับชั้นที่ต้องการ");
TemplateHandle::printTitleTopic("เลือกระดับชั้น", "การลงทะเบียนนั้นจะต้องเลือกระดับชั้นก่อนถึงจะสามารถลงทะเบียนวิชาได้");

if (!isset($_SESSION["ID"])) {
    FewPHP::redirectPage("/");
}
?>
<section class="section section-lg pt-0">
	<div class="container mt-n8 mt-lg-n12 z-2">
		<div class="row justify-content-center">
			<div class="col">
				<div class="card border-light p-4 p-lg-5">
					<div class="col-12 text-center mb-2">
                        <h2>— เลือกระดับชั้นที่ต้องการ —</h2>
                    </div>
                    <p class="note note-info">
                      <strong>Note :</strong> ในอนาคตอาจจะรับทีมงานเพิ่ม เพื่อลดทุกข์ในการทำงานและผลงานที่มีประสิทธิภาพสูงสุด =w=
                    </p>
                    <a href="/dashboard/primary" class="btn btn-primary btn-lg btn-block">มัธยมศึกษาตอนต้น</a>
					<a href="/dashboard/secondary" class="btn btn-secondary btn-lg btn-block">มัธยมศึกษาตอนปลาย</a></center>
    	
				</div>
			</div>
		</div>
	</div>
</section>