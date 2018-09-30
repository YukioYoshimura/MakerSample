<?php
$p_code = "";
if (isset($_POST["code"])) {
    $p_code = $_POST["code"];
    $r = hexdec(substr(md5($p_code), 0, 2));
    $g = hexdec(substr(md5($p_code), 2, 2));
    $b = hexdec(substr(md5($p_code), 4, 2));
    $img = imagecreatefrompng('okada.png');
    imagefilter($img, IMG_FILTER_COLORIZE, $r, $g, $b);
    imagepng($img, 'okada2.png');
    imagedestroy($img);
}
?>
<html>
<head>
    <title>Maker</title>
</head>
<body>
    <h1>Maker</h1>
<?php if ($p_code === "") { ?>
    <form method="post">
        <img src="okada.png" alt="default" width="300">
        <p><input type="text" name="code" placeholder="color code"></p>
        <p><input type="submit"></p>
    </form>
<?php } else { ?>
    <img src="okada2.png" alt="<?php echo $p_code; ?>" width="300">
    <p>change color by word '<?php echo $p_code; ?>'</p>
    <p><a href="index.php">Back</a></p>
<?php } ?>
</body>
</html>
<?php
?>