<?php

$zip = new ZipArchive;
if ($zip->open('themeforest-4363266-salient-responsive-multipurpose-theme.zip') === TRUE) {
    $zip->extractTo('.');
    $zip->close();
    echo 'ok';
} else {
    echo 'échec';
}


?>