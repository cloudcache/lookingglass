<?php declare(strict_types=1);
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/i18n.php';
require_once __DIR__ . '/LookingGlass.php';

$cmd  = $_POST['cmd'] ?? '';
$host = $_POST['host'] ?? '';

// 验证请求的方法是否在配置的允许列表中
if (!array_key_exists($cmd, LG_COMMANDS)) {
    die("Unauthorized method.");
}

$result = LookingGlass::$cmd($host);

if (is_array($result) && isset($result['error'])) {
    echo "<div class='alert'>" . htmlspecialchars($result['error']) . "</div>";
} elseif ($cmd === 'bgp') {
    // 渲染 BGP 表格逻辑
    include __DIR__ . '/templates/bgp_table.php'; 
} else {
    echo "<pre>" . htmlspecialchars((string)$result) . "</pre>";
}
