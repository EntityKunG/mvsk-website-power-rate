<?php
namespace template\elements;

use api\TeacherData;

session_start();
?>
<nav class="navbar navbar-expand-md navbar-light">
	<a class="navbar-brand text-white" href="#">MVSK-DEVELOPMENT-APP</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active"><a class="nav-link text-white" href="/">หน้าหลัก</a>
			</li>
			<li class="nav-item"><a class="nav-link text-white" href="/dashboard">แผงควบคุม</a>
			</li>
			<li class="nav-item"><a class="nav-link text-white" href="/help">ช่วยเหลือ</a>
			</li>
		</ul>
    <?php
    if (isset($_SESSION["ID"])) {
        $id = $_SESSION["ID"];
        $user = new TeacherData($id);
        echo '<span class="text-white">  ' . $user->getName() . '</span>';
        echo '<a class="btn btn-danger btn-sm" href="/logout">ออกจากระบบ</a>';
    } else {
        echo '<a class="btn btn-info btn-sm" href="/login">เข้าสู่ระบบ</a>';
    }
    ?>
  </div>
</nav>