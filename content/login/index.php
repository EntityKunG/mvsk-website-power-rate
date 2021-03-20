<?php
namespace content\login;

use lib\FewPHP;
use template\TemplateHandle;
use api\TeacherData;

TemplateHandle::printTitle('เข้าสู่ระบบ');
TemplateHandle::printTitleTopic('เข้าสู่ระบบ', 'เข้าสู่ระบบเพื่อเริ่มต้นใช้งานเว็บไซต์');

if (isset($_POST["submit"])) {
    $code = $_POST["idStudent"];
    if (TeacherData::checkUserByID($code)) {
        $_SESSION["ID"] = $code;
        FewPHP::headerRedirectPage("/dashboard");
    } else {
        $prefix = array("อุ้ย", "ว้าย", "อย่าหาทำ", "แหม่ๆ", "ทำอะไรอ่ะ", "โนๆจ่ะ", "ห๊ะ");
        $_SESSION["Error"] = "<b>".$prefix[array_rand($prefix)]."</b> ไม่พบรหัสครูในฐานข้อมูล กรุณาลองใหม่ในภายภาคหน้า";
    }
}
if (isset($_SESSION["ID"])) {
    FewPHP::redirectPage("/");
}
?>
<section class="section section-lg pt-0">
	<div class="container mt-n8 mt-lg-n12 z-2">
		<div class="row justify-content-center">
			<div class="col">
				<div class="card border-light p-4 p-lg-5">
					<div class="col-12 text-center mb-2">
                        <h2>— เข้าสู่ระบบ —</h2>
                    </div>
                    <?php 
                    if (isset($_SESSION["Error"])) {
                    ?>
                        <p class="note note-danger">
                        	<?php echo $_SESSION["Error"]; ?>
                        </p>
                    <?php
                        unset($_SESSION["Error"]);
                    } else if (isset($_SESSION["ID"])) {
                        ?>
                        <p class="note note-success">
                        	<?php 
                        	$code = $_SESSION["ID"];
                        	$user = new TeacherData($code);
                        	echo "ยินดีตอนรับ <b>".$user->getName()."</b> <br />ระบบกำลังพาท่านไปยังแผงควบคุมภายใน 5 วินาที (~ ¯▽¯) ~";
                        	?>
                        </p>
                         <meta http-equiv="Refresh" content="5; url=/dashboard">
                        <?php 
                    }
                    ?>
                    
                    <p class="note note-warning">
                      <strong>Note :</strong> ตอนนี้เว็บไซต์อยู่ในการปรับปรุงพัฒนาให้ดีขึ้น ถ้าพบบัคโปรดแจ้งด้วยจ้า 
                    </p>
					<form method="POST" action="/login">
                      <div class="form-outline mb-4">
                     	<label class="form-label" for="form1Example1">รหัสประจำตัวครูผู้สอน</label>
                        <input type="number" placeholder="Example: 000" name="idStudent" class="form-control" />
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary btn-block btn-sm">เข้าสู่ระบบ</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</section>