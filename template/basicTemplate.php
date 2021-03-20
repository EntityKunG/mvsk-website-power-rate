<?php
namespace template;
?>
<!DOCTYPE html>
<html lang="th">
<head>
	<?php include("template/elements/headTemplate.php")?>
</head>
<body>
	<?php include("template/elements/headerTemplate.php")?>
	<?php TemplateHandle::applyContentZone()?>
	
	<footer class="bg-light"><?php include("template/elements/footerTemplate.php")?></footer>
	<?php include("template/elements/scriptsTemplate.php")?>
	
</body>
</html>