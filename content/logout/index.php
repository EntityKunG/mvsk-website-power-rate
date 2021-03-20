<?php 

namespace content\logout;

use lib\FewPHP;

session_destroy();
FewPHP::redirectPage("/");

?>