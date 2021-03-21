<?php
namespace content\help;

use template\TemplateHandle;

TemplateHandle::printTitle("หน้าช่วยเหลือ");
TemplateHandle::printTitleTopic("Q & A", "ตอบคำถามเรื่องการใช้งานเว็บไซต์");
?>
<section class="section section-lg pt-0">
	<div class="container mt-n8 mt-lg-n12 z-2">
		<div class="row justify-content-center">
			<div class="col">
				<div class="card border-light p-4 p-lg-5">
					<div class="col-12 text-center mb-2">
                        <h2>— หน้าช่วยเหลือ —</h2>
                    </div>
                    <p class="note note-warning">
                      <strong>Note :</strong> ในอนาคตอาจจะเพิ่มคำถามหรือคำตอบไว้เพิ่มเติม เพราะเว็บนี้พัฒนาโดยคนขยันแห่งชาติและหน้าตาดี (ノ-_-)ノ
                    </p>
                    <?php 
                        TemplateHandle::addQuestion("ทำไมต้องมีเว็บไซต์นี้", "เพราะว่าให้โรงเรียนมหาวชิราวุธ จังหวัดสงขลามีเว็บไซต์สารสนเทศในการจัดการระบบให้ดูทันสมัยมากขึ้น");
                        TemplateHandle::addQuestion("คนทำเว็บไซต์นี้ได้เงินเดือนมั้ย", "ไม่ได้จ้า เพราะว่าเป็นนักเรียนมหาวชิราวุธ แต่คาดว่าคงได้รับนักเรียนดีเด่น เลิศประเสริฐสี มณี 7 ＼(≧▽≦)／");
                        TemplateHandle::addQuestion("ทำไมต้องทำรูปแบบการติ๊กถูก (checkbox)", "เพราะว่าจะได้ป้องกันความผิดพลาดในอนาคต และสะดวกรวดเร็วในการใช้งานเพราะระบบฐานข้อมูลเราเชื่อมได้ทุกที่");
                        TemplateHandle::addQuestion("ทำไมยุ่งยากจังเลย ใช้งานก็ยาก", "ลองเสนอระบบมาสิ เพราะว่าตอนนี้ก็เร่งพัฒนาให้เว็บไซต์ใช้งานอยู่");
                        TemplateHandle::addQuestion("ทำไมก็อบว่างไม่ได้","เว็บไซต์ไม่ได้ออกแบบมาเพื่อก็อบว่างตั้งแต่แรกอยู่แล้ว ออกแบบเพื่อสำหรับ <b><u>one click</u></b> หรือต้องการให้พิมพ์น้อยมากที่สุด");
                        TemplateHandle::addQuestion("คนทำเว็บไซต์นี้หน้าตาดีมั้ย", "หน้าตาดีมาก ๆ หล่อสุด ๆ แบบปังปรุเย้")
                    ?>
					
					
				</div>
			</div>
		</div>
	</div>
</section>
<?php 

?>