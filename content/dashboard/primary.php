<?php
namespace content\dashboard;

use template\TemplateHandle;
use lib\FewPHP;
use api\DBCon;
use api\Subject;

if (isset($_SESSION["ID"])) {
    FewPHP::HeaderRedirectPage("/");
}
    
TemplateHandle::printTitle("ลงทะเบียนม.ต้น");
TemplateHandle::printTitleTopic("ลงทะเบียนวิชา", "ลงทะเบียนวิชา ระดับชั้นมัธยมศึกษาตอนต้น");

$subject = new Subject();
$dbcon = new DBCon();
$id = $_SESSION["ID"];
if (isset($_POST["submit"])) {
    if (empty($_POST["subject"])) {
        $_SESSION["Error"] = "<u>กรุณาเลือกวิชาด้วย</u> ไม่สามารถลงทะเบียนได้ ｡ﾟ(TヮT)ﾟ｡";
    } else {
        $code = $_POST["subject"];
        $class = array();
        $rroom = array();
        for ($i=0; $i <= 3;$i++) {
            if (isset($_POST["M"][$i])) {
                array_push($class, $_POST["M"][$i]);
            }
        }
        foreach($class as $m) {
            if (isset($_POST["Room$m"])) {
                $room = $_POST["Room$m"];
                array_push($rroom, $room);
            }
        }
        if (count($class) >= 1 && count($rroom) >= 1) {
            $dbcon->query("INSERT INTO `selectedsubject` (`Code`, `IDSubject`, `M1`, `M2`, `M3`, `M4`, `M5`, `M6`) VALUES ('$id', '$code', '', '', '', '', '', '')");
        } else {
            $_SESSION["Error"] = "<u>เลือกระดับชั้นเรียนด้วย</u> ไม่สามารถลงทะเบียนได้ ｡ﾟ(TヮT)ﾟ｡";
        }
        foreach($class as $m) {
            if (isset($_POST["Room$m"])) {
                $room = $_POST["Room$m"];
                $str = implode(" ", $room);
                if (count($room) >= 1) {
                    $dbcon->query("UPDATE selectedsubject SET M".$m."='".$str."' WHERE IDSubject='".$code."';");
                    $_SESSION["Success"] = "ยินดีด้วยคุณได้ลงทะเบียนวิชา ".$subject->getNameByID($code)." (".$code.")";
                } 
            } else {
                $_SESSION["Error"] = "<u>เลือกระดับชั้นห้องด้วย</u> ไม่สามารถลงทะเบียนได้ ｡ﾟ(TヮT)ﾟ｡";
            }
        } 
        
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
                    <?php 
                    if (isset($_SESSION["Success"])) {
                        ?>
                         <p class="note note-success">
                          <strong>Success :</strong> <?php echo $_SESSION["Success"] ?>
                        </p>
                        <?php
                        unset($_SESSION["Success"]);
                    }
                    
                    ?>
                    <p class="note note-info">
                      <strong>Note :</strong> กรุณาเลือกรายวิชาที่ถูกต้อง
                    </p>
                    <label>เลือกรายวิชาที่ต้องการจะสอน</label>
					<form method="POST" action="/dashboard/primary">
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
    					for ($ranked = 1; $ranked <= 3; $ranked++) {
                             ?>
                             <div class="row">
    					    	<div class="col">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="<?php echo $ranked; ?>" name="M[]" id="m<?php echo $ranked; ?>">
										<label class="form-check-label" for="m<?php echo $ranked; ?>">ระดับชั้น <?php echo $ranked; ?></label>
    					    		</div>
    					    	</div>
    					    	<div class="col-1 col-md-3 mb-3">
    					    		<div class="form-check">
    					    			<div class="col">
    										<?php 
    										for ($room = 1; $room <= 10; $room ++) {
    										    $str = "";
    										    if ($room % 2 == 0) {
    										        $str = "even".$ranked;
    										    } else {
    										        $str = "odd".$ranked;
    										    }
    										    ?>
        										    <input class="form-check-input" type="checkbox" value="<?php echo $room; ?>" name="Room<?php echo $ranked; ?>[]" id="<?php echo $room?>" data-room-type="<?php echo $str;?>">
        											<label class="form-check-label" for="<?php echo $room?>">ห้อง <?php echo $room; ?></label>
        											<br>
        										<?php
    										}
    										?>
										</div>
    								</div>
    							</div>
    							<div class="col-1 col-md-3 mb-3">
    					    		<div class="form-check">
    					    			<?php 
    										for ($room = 11; $room <= 15; $room ++) {
    										    $str = "";
    										    if ($room % 2 == 0) {
    										        $str = "even".$ranked;
    										    } else {
    										        $str = "odd".$ranked;
    										    }
    										    ?>
        										    <input class="form-check-input" type="checkbox" value="<?php echo $room; ?>" name="Room<?php echo $ranked; ?>[]" id="<?php echo $room?>" data-room-type="<?php echo $str;?>">
        											<label class="form-check-label" for="<?php echo $room?>">ห้อง <?php echo $room; ?></label>
        											<br>
        										<?php
    										}
    										?>
    									<br />
    									<span class="md-1 text-center">ตัวเลือกเสริม  <a class="material-tooltip-main" data-html="true" data-toggle="tooltip" title="อันนี้คือตัวเลือกเสริม ทำให้ชีวิตดูดีมีระดับยิ่งขึ้น<br>เราสามารถเลือกห้องอย่างรวดเร็วทันใจวัยรุ่นได้ โดยการแค่เลือกประเภทห้องเท่านั้นเอง!"><i class="fas fa-info-circle"></i></a></span><br />
    					    			<input type="button" id="odd<?php echo $ranked; ?>" value="ห้องคี่" />
    					    			<input type="button" id="even<?php echo $ranked; ?>" value="ห้องคู่" />
    					    			<input type="button" id="all<?php echo $ranked; ?>" value="ทั้งหมด" />
    					    		</div>
    					    	</div>
    						</div>
    						<script type="text/javascript">
                        		$(document).ready(function() {
                        			$("#odd1").on('click', function() {
                        				if($('[data-room-type="odd1"]').is(':checked')) {
                        					$('[data-room-type="odd1"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="odd1"]').prop('checked', 'checked');
                        				}
                        			});
                        			$("#even1").on('click', function() {
                        				if($('[data-room-type="even1"]').is(':checked')) {
                        					$('[data-room-type="even1"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="even1"]').prop('checked', 'checked');
                        				}
                        			});
                        			$("#all1").on('click', function() {
                        				if($('[data-room-type="odd1"]').is(':checked')) {
                        					$('[data-room-type="odd1"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="odd1"]').prop('checked', 'checked');
                        				}
                        				if($('[data-room-type="even1"]').is(':checked')) {
                        					$('[data-room-type="even1"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="even1"]').prop('checked', 'checked');
                        				}
                        			});
                        			$("#odd2").on('click', function() {
                        				if($('[data-room-type="odd2"]').is(':checked')) {
                        					$('[data-room-type="odd2"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="odd2"]').prop('checked', 'checked');
                        				}
                        			});
                        			$("#even2").on('click', function() {
                        				if($('[data-room-type="even2"]').is(':checked')) {
                        					$('[data-room-type="even2"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="even2"]').prop('checked', 'checked');
                        				}
                        			});
                        			$("#all2").on('click', function() {
                        				if($('[data-room-type="odd2"]').is(':checked')) {
                        					$('[data-room-type="odd2"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="odd2"]').prop('checked', 'checked');
                        				}
                        				if($('[data-room-type="even2"]').is(':checked')) {
                        					$('[data-room-type="even2"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="even2"]').prop('checked', 'checked');
                        				}
                        			});
                        			$("#odd3").on('click', function() {
                        				if($('[data-room-type="odd3"]').is(':checked')) {
                        					$('[data-room-type="odd3"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="odd3"]').prop('checked', 'checked');
                        				}
                        			});
                        			$("#even3").on('click', function() {
                        				if($('[data-room-type="even3"]').is(':checked')) {
                        					$('[data-room-type="even3"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="even3"]').prop('checked', 'checked');
                        				}
                        			});
                        			$("#all3").on('click', function() {
                        				if($('[data-room-type="odd3"]').is(':checked')) {
                        					$('[data-room-type="odd3"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="odd3"]').prop('checked', 'checked');
                        				}
                        				if($('[data-room-type="even3"]').is(':checked')) {
                        					$('[data-room-type="even3"]').prop('checked', false);
                        				} else {
                        					$('[data-room-type="even3"]').prop('checked', 'checked');
                        				}
                        			});
                        		});
							</script>
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