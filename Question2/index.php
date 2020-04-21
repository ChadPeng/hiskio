<?php
header("content-type:text/html;charset=utf-8");
require 'common.php';
session_start();
$sum = 0;
$class = "";

if(!empty($_SESSION['shopcar'])){
    $data = $_SESSION['shopcar'];
    $sum = array_sum(array_column($data, 'count'));

    if($sum > 0){
        $class = "on";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品展示</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<section>
    <div class='top'>
        <a href="spcar.php" rel="external nofollow" >我的購物車</a><span class="<?php echo $class;?>"><?php echo $sum;?></span>
    </div>
    <ul class="list">
        <?php foreach ($arrPro as $key => $value):?>
            <li>
                <div class="figure"></div>
                <h3 class="title">
                    <a href=""><?php echo $value['title'];?></a>
                </h3>
                <p class="price"><span class="num">$<?php echo $value['price'];?></span></p>
                <p class='cart'><a href="action.php?id=<?php echo $key;?>" rel="external nofollow">加入購物車</a></p>
            </li>
        <?php endforeach;?>
    </ul>
</section>
</body>
</html>
