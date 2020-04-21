<?php
header('Content-type: text/html; charset=utf-8');

session_start();

function sumArray($v){
    return $v['price'] * $v['count'];
}

if(!empty($_SESSION['shopcar'])){
    $data = $_SESSION['shopcar'];

    $sum = array_sum(array_map('sumArray' , $data));
    $count = array_sum(array_column($data, 'count'));
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>我的購物車</title>

    <link href="css/spcar.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="right_main">
    <div class="product">
        <div class="product_b_body">
            <a href="index.php">回首頁</a>
            <form id="myform" action="" method="post" onsubmit="">
                <div class="shopping">
                    <div class="shopping_body">
                        <table width="100%" border="0" cellpadding="6" cellspacing="0" id="mytable">
                            <tr>
                                <td width="30%" class="shopping_w1">商品名稱</td>
                                <td width="25%" class="shopping_w1">目前數量</td>
                                <td width="25%" class="shopping_w1">價格</td>
                                <td width="10%" style="border-bottom: 1px solid #d2d2d2;">添加只會加一個</td>
                                <td width="10%" style="border-bottom: 1px solid #d2d2d2;">刪除只會刪一個</td>
                            </tr>
                            <?php

                            $checkcount = 0;
                            if (count($data))
                            {
                                foreach ($data as $key => $Myitem)
                                {
                                    $checkcount ++;
                                    $background  = $checkcount%2==1?"bgcolor=\"#e7e7e7\"":"";
                                    ?>
                                    <tr id="item_<?php echo $key;?>">
                                        <td <?php echo $background;?>>
                                            <input type="hidden" name="item<?php echo $key;?>" value="<?php echo $key;?>"/>
                                            <?php echo $Myitem['title']; ?>
                                        </td>
                                        <td <?php echo $background;?>><?php echo $Myitem['count']; ?>個</td>
                                        <td <?php echo $background;?>><?php echo $Myitem['price']; ?>元</td>
                                        <td <?php echo $background;?>>
                                            <table width="96" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="70%" align="center" valign="middle">
                                                        <input
                                                            name="button<?php echo $key; ?>" type="button"
                                                            class="shopping_bt" style="cursor: pointer;"
                                                            value="添加" onclick="location.href='add.php?id=<?php echo $key;?>'" />
                                                    </td>
                                                    <td width="30%" align="center" valign="middle"></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td <?php echo $background;?>>
                                            <table width="96" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="70%" align="center" valign="middle">
                                                        <input
                                                            name="button<?php echo $key; ?>" type="button"
                                                            class="shopping_bt" style="cursor: pointer;"
                                                            value="刪除" onclick="location.href='delete.php?id=<?php echo $key;?>'" />
                                                    </td>
                                                    <td width="30%" align="center" valign="middle"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                <tr>
                                    <td bgcolor="#e7e7e7" colspan="4">目前無任何購物資料</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>

                    </div>
                </div>
                <table  border="0" cellpadding="5" cellspacing="0"
                        style="margin-top: 10px;">
                    <tr>
                        <td colspan="2" align="right">總數量：<span class="shopping_w2" id="amount"><?php echo $count; ?></span>個</td>
                        <td colspan="2" align="right">總金額：<span class="shopping_w2" id="amount"><?php echo $sum; ?></span>元</td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>
