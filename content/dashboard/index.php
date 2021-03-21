<?php
namespace content\dashboard;
use template\TemplateHandle;
use api\TeacherData;
use api\DBCon;
use api\Subject;
use lib\FewPHP;

if (!isset($_SESSION["ID"])) {
    FewPHP::redirectPage("/login");
} else {
    $id = $_SESSION["ID"];
    $teacher = new TeacherData($id);
    $dbcon = new DBCon();
    $subject = new Subject();
    TemplateHandle::printTitle('ยินดีตอนรับ');
    TemplateHandle::printTitleTopic('ยินดีตอนรับ', $teacher->getName()." รบกวนอย่าซนระบบ");
?>
<section class="section section-lg pt-0">
	<div class="container mt-n8 mt-lg-n12 z-2">
		<div class="row justify-content-center">
			<div class="col">
				<div class="card border-light p-4 p-lg-5">
					<div class="col-12 text-center mb-2">
                        <h2>— แผงควบคุม —</h2>
                    </div>
                    <div class="col-12 text-center mb-2">
                    	<a class="btn btn-success btn-sm" href="/dashboard/select">เพิ่มรายวิชา</a>
                    	<a class="btn btn-info btn-sm">Export เป็น Excel</a>
                    	<a class="btn btn-danger btn-sm" href="/logout">ออกจากระบบ</a>
                    </div>
                    <p class="note note-info">
                      <strong>Note :</strong> ตอนนี้กำลังปรับแก้ไขอยู่ รบกวนอย่าซนทำระบบพังนะ ขี้เกียจแก้แล้ว (= _ =;)
                    </p>
                    <table class="table-responsive">
                      <thead class="table-dark text-center">
                      	<tr>
                          	<th width="5%">ลำดับ</th>
            				<th width="13%">รายชื่อวิชา</th>
            				<th width="5%">รหัสวิชา</th>
            				<th width="13%">กลุ่มสาระ</th>
            				<th width="5%">หน่วยกิต</th>
            				<th width="5%">ชั่วโมง</th>
            				<th width="7%">ระดับชั้น</th>
            				<th width="7%">แก้ไข</th>
            				<th width="6%">ลบ</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php 
                			$result = $dbcon->query("SELECT IDSubject FROM selectedsubject WHERE Code='".$id."';");
                			$i = 0;
                			while ($num = mysqli_fetch_array($result))  {
                			    $i++;
                			    $name = $num['IDSubject'];
                			    $enName = base64_encode($name);
                			    echo "<tbody>";
                			    echo"<td class=\"text-center\">$i</td>";
                			    echo "<td>".$subject->getNameByID($name);".</td>";
                			    echo "<td>".$name;".</td>";
                			    echo "<td>".$subject->getTypeByID($name)."</td>";
                			    echo "<td>".$subject->getCreditByID($name)."</td>";
                			    echo "<td>".$subject->getHoursByID($name)."</td>";
                			    echo "<td>".$subject->getLevelByID($name)."</td>";
                			    ?>
                			    <td>
                    			    <a class="btn btn-warning btn-sm" href="/edit/?subject=<?php echo $enName; ?>">
                    			    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    			    	  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              							  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    			    </svg>
                    			    แก้ไข
                    			    </a>
                			    </td>
                			    <td>
                    			    <a class="btn btn-danger btn-sm" href="/delete/?del=<?php echo $enName; ?>">
                    			    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                    			    ลบ
                    			    </a>
                			    </td>
                			    <?php 
                			}
            			?>
                      </tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
}
?>