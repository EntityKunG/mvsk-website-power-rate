<?php
namespace content\dashboard;

use template\TemplateHandle;
use lib\FewPHP;
use api\DBCon;

if (isset($_SESSION["ID"])) {
    FewPHP::HeaderRedirectPage("/");
}
    
TemplateHandle::printTitle("ลงทะเบียนม.ต้น");
TemplateHandle::printTitleTopic("ลงทะเบียนวิชา", "ลงทะเบียนวิชา ระดับชั้นมัธยมศึกษาตอนต้น");

$dbcon = new DBCon();
if (isset($_POST["submit"])) {
    if (strcmp($_POST["subject"], "none") == 0) {
        $_SESSION["Error"] = "<i>กรุณาเลือกวิชาด้วย</i> ไม่สามารถลงทะเบียนได้";
    }
}
?>
<section class="section section-lg pt-0">
	<div class="container mt-n8 mt-lg-n12 z-2">
		<div class="row justify-content-center">
			<div class="col">
				<div class="card border-light p-4 p-lg-5">
					<div class="col-12 text-center mb-2">
                        <h2>— ลงทะเบียนวิชาระดับชั้นมัธยมศึกษาตอนต้น —</h2>
                    </div>
                    <?php 
                    if (isset($_SESSION["Error"])) {
                        ?>
                         <p class="note note-danger">
                          <strong>Error :</strong> <?php echo $_SESSION["Error"] ?>
                        </p>
                        <?php
                        unset($_SESSION["Error"]);
                    }
                    
                    ?>
                    <p class="note note-info">
                      <strong>Note :</strong> กรุณาเลือกรายวิชาที่ถูกต้อง
                    </p>
                    <label>เลือกรายวิชาที่ต้องการจะสอน</label>
                    <form action="/dashboard/primary" method="POST">
                    <select class="mdb-select" searchable="กรุณาใส่ข้อมูล..." name="subject">
                         <option value="" disabled selected>กรุณาเลือกวิชา</option>
                            <?php 
                                $result = $dbcon->query("SELECT * FROM subjectdata");
                                while ($num = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    $id = $num["IDSubject"];
                                    echo '<option value='.$id.'>'.$num["Name"].' ('.$id.')</option>';
                                }
                            ?>
                     </select> 
                     <?php 
    					for ($rank = 1; $rank <= 3; $rank++) {
    					    ?>
    					    <div class="row">
    					    	<div class="col">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="<?php echo $rank; ?>" name="M[]" id="<?php echo $rank;?>">
										<label class="form-check-label" for="<?php echo $rank; ?>">ระดับชั้น <?php echo $rank; ?></label>
    					    		</div>
    					    	</div>
    					    	<div class="col-1 col-md-3 mb-3">
    					    		<div class="form-check">
    					    			<div class="col">
    										<?php 
    										for ($room = 1; $room <= 10; $room ++) {
    										    ?>
        										    <input class="form-check-input" type="checkbox" value="<?php echo $room; ?>" name="Room<?php echo $rank; ?>[]" id="<?php echo $room;?>">
        											<label class="form-check-label" for="<?php echo $room; ?>">ห้อง <?php echo $room; ?></label>
        											<br>
        										<?php
    										}
    										?>
										</div>
    								</div>
    							</div>
    							<div class="col-1 col-md-3 mb-3">
    					    		<div class="form-check">
    					    			<div class="col">
    										<?php 
    										for ($room = 11; $room <= 15; $room ++) {
    										    ?>
        										    <input class="form-check-input" type="checkbox" value="<?php echo $room; ?>" name="Room<?php echo $rank; ?>[]" id="<?php echo $room;?>">
        											<label class="form-check-label" for="<?php echo $room; ?>">ห้อง <?php echo $room; ?></label>
        											<br>
        										<?php
    										}
    										?>
										</div>
										<p></p>
										<p align="center">Options</p>
										<div class="mb-2">
        									<input class="form-check-input" type="checkbox" value="all" name="Room<?php echo $rank; ?>[]" id="checkall<?php echo $rank; ?>">
    										<label class="form-check-label" for="checkall<?php echo $rank; ?>">ทุกห้อง</label><br />
    										<input class="form-check-input" type="checkbox" value="odd" name="Room<?php echo $rank; ?>[]" id="odd<?php echo $rank; ?>">
    										<label class="form-check-label" for="odd<?php echo $rank; ?>">ห้องคี่</label><br />
    										<input class="form-check-input" type="checkbox" value="even" name="Room<?php echo $rank; ?>[]" id="even<?php echo $rank; ?>">
    										<label class="form-check-label" for="even<?php echo $rank;?>">ห้องคู่</label>
										</div>
    								</div>
    							</div>
    						</div>
    					    <?php 
    					}
    					?>
    					<input type="submit" class="btn btn-success btn-sm" name="submit" value="ยืนยันการเลือกวิชา" />	
					</form>
				</div>
			</div>
		</div>
	</div>
	
</section>