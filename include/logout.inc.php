<?php
session_start();
session_unset();//It deletes only the variables from session and session still exists. Only data is truncated
session_destroy();

header("location: ../index.php?error=none");
exit();

