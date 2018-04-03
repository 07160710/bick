<?php
if (! empty($_POST)) {
    $data = $_POST;
    print json_encode($data);
}
?>