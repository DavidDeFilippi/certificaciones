<?php
for ($i = 0; $i < count($script_custom); $i++) {
    echo "<script type='text/javascript' src='" . $script_custom[$i]['src'] . "'></script>";
}
?>
</html>