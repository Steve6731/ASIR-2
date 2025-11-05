<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP背景颜色切换器</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            transition: background-color 0.5s ease;
        }
        
        .color-button {
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            background-color: white;
            color: #333;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .color-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }
        
        .color-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body style="background-color: <?php 
    // 定义颜色数组
    $colors = array(
        '#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', 
        '#FFEAA7', '#DDA0DD', '#98D8C8', '#F7DC6F'
    );
    
    // 获取当前颜色或设置默认值
    if (isset($_POST['current_color']) && isset($_POST['color_index'])) {
        $color_index = intval($_POST['color_index']);
        $current_color = $_POST['current_color'];
        
        // 确保索引在有效范围内
        if ($color_index >= 0 && $color_index < count($colors)) {
            $current_color = $colors[$color_index];
            $color_index = ($color_index + 1) % count($colors);
        } else {
            $color_index = 0;
            $current_color = $colors[0];
        }
    } else {
        $current_color = $colors[0];
        $color_index = 1;
    }
    
    echo $current_color;
?>;">
    <form method="post">
        <input type="hidden" name="current_color" value="<?php echo $current_color; ?>">
        <input type="hidden" name="color_index" value="<?php echo $color_index; ?>">
        <button type="submit" class="color-button">切换背景颜色</button>
    </form>
</body>
</html>