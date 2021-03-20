<?php
namespace template;

TemplateHandle::printTitle("ไม่พบหน้าคำขอ");
TemplateHandle::printTitleTopic('ไม่พบหน้าดังกล่าว', 'กรุณาเช็คใหม่อีกครั้งค่ะ');
?>
<section class="section section-lg pt-0">
	<div class="container mt-n8 mt-lg-n12 z-2">
		<div class="row justify-content-center">
			<div class="col">
				<div class="card border-light p-4 p-lg-5 text-center text-dark d-flex align-items-center justify-content-center">
					<div class="col-12 text-center mb-1">
						<h1 class="mt-4">
							404 <span class="font-weight-bolder text-primary">ไม่พบหน้า</span>
						</h1>
					</div>
					<p class="lead my-4 px-lg-11">ว้าย! รู้สึกคุณจะเข้าผิดลิงค์นะ กรุณาตรวจสอบดี ๆ นะ</p>
					<a class="btn btn-primary animate-hover" href="/"><span
						class="fas fa-chevron-left mr-3 pl-2 animate-left-3"></span>กลับไปหน้าหลัก</a>
				</div>
			</div>
		</div>
	</div>
</section>