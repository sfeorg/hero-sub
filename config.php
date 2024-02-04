<?php
$config_file = "config.txt";
$configs = file_get_contents($config_file);
$config_lines = explode("\n", $configs);
$config_name = isset($_GET['name']) ? $_GET['name'] : '';
$found = false;
foreach ($config_lines as $line) {
    if (strpos($line, 'vless') === 0 && strpos($line, '#' . $config_name) !== false) {
      header("Content-Type: text/plain");
        echo $line;
        $found = true;
        break;
    }
}
if (!$found) {
    header("HTTP/1.1 404 Not Found");
    echo "Not Found!";
}
?>
