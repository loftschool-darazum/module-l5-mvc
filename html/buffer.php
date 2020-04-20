<?php
ob_start();
include 'text.phtml';
$data = ob_get_clean();
header('Content-type: text/plain');

echo $data;