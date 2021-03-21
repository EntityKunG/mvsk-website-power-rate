<?php 

namespace content\logout;

use lib\FewPHP;
use template\TemplateHandle;

TemplateHandle::printTitle("ล้อกเอ้าห์");
TemplateHandle::printTitleTopic("ล้อกเอ้าห์", "ตอนนี้เข้าได้ออกจากระบบไปแล้ว");
session_destroy();
FewPHP::redirectPage("/", 5);

?>
<section class="section section-lg pt-0">
	<div class="container mt-n8 mt-lg-n12 z-2">
		<div class="row justify-content-center">
			<div class="col">
				<div class="card border-light p-4 p-lg-5">
					<div class="col-12 text-center mb-2">
                        <h2>— ออกจากระบบ —</h2>
                    </div>
                    <p class="note note-danger">
                      <strong>Note :</strong> หากต้องการเพิ่มระบบสามารถไปได้ที่ลิงค์นี้ได้เลย <a href="peeranat.xyz/help"> peeranat.xyz/help</a>
                    </p>
                    <span>ตอนนี้คุณกำลังออกจากระบบ กรุณา 5 วินาที ระบบจะพาคุณไปหน้าหลัก</span>
				</div>
			</div>
		</div>
	</div>
</section>