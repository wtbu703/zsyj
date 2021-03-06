<?php
/**
 * Created by PhpStorm.
 * User: liuyao
 * Date: 2016/3/9
 * Time: 12:10
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?><!--生成一个替换字符，表示css和js的引用代码在这里显示-->

    <!--核心CSS-->
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/system.css" rel="stylesheet" type="text/css">
    <link href="css/public.css" rel="stylesheet" type="text/css">
    <link href="css/table_form.css" rel="stylesheet" type="text/css">
    <!--TAB样式-->
    <link href="css/tabpanel/core.css" rel="stylesheet" type="text/css">
    <link href="css/tabpanel/TabPanel.css" rel="stylesheet" type="text/css">
    <link href="css/tabpanel/Toolbar.css" rel="stylesheet" type="text/css">
    <link href="css/tabpanel/WindowPanel.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!--弹窗-->
    <script type="text/javascript" src="js/dialog/dialog.js"></script>
    <script type="text/javascript" src="js/styleswitch.js"></script>
    <script type="text/javascript" src="js/hotkeys.js"></script>
    <script type="text/javascript" src="js/jquery.sGallery.js"></script>
    <!--表单验证-->
    <script language="javascript" type="text/javascript" src="js/formvalidatorregex.js" charset="utf-8"></script>
    <script language="javascript" type="text/javascript" src="js/formvalidator.js" charset="utf-8"></script>
    <!--TAB JS-->
    <script type="text/javascript" src="js/tabpanel/Fader.js"></script>
    <script type="text/javascript" src="js/tabpanel/TabPanel.js"></script>
    <script type="text/javascript" src="js/tabpanel/Math.uuid.js"></script>
    <script type="text/javascript" src="js/tabpanel/Toolbar.js"></script>
    <script type="text/javascript" src="js/tabpanel/WindowPanel.js"></script>
    <script type="text/javascript" src="js/tabpanel/Drag.js"></script>
    <!--弹出图片-->
    <script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <script>
        var updateUrl = "<?=yii::$app->urlManager->createUrl('product/update')?>";
        var listallUrl = "<?=yii::$app->urlManager->createUrl('product/listall')?>";
        var checkusernameUrl = "<?=yii::$app->urlManager->createUrl('product/checkusername')?>";

    </script>
    <script language="javascript" type="text/javascript" src="js/admin/product/edit.js" charset="utf-8"></script>
</head>
<body id="_body" scroll="no">
    <div class="pad-lr-10">
    <form name="myform" action="" method="post" id="myform" target="center_frame">
        <div class="pad-10">
            <div class="col-tab">
                <ul class="tabBut cu-li">
                    <li id="tab_setting_1" class="on" onclick="">产品信息</li>
                </ul>
                <div id="div_setting_1" class="contentList pad-10">
                    <div style='overflow-y:auto;overflow-x:hidden' class='scrolltable'>
                        <table width="90%" cellspacing="0" class="table_form contentWrap">
                            <tbody>
                            <input type="hidden" id="id" value="<?=htmlspecialchars($product->id)?>" />
                            <tr>
                                <th width="100">产品原名称</th>
                                <td><div id=""><?=htmlspecialchars($product->productTitle)?></div></td>
                                <input type="hidden" id="id" value="<?=$product->id?>" />
                            </tr>
                            <tr>
                                <th width="100">产品名称</th>
                                <td><input type="text" id="productTitle"  class="input-text" style="width:270px;" value="<?=htmlspecialchars($product->productTitle)?>" /></td>
                            </tr>
                            <tr>
                                <th width="100">产品价格</th>
                                <td><input type="text" id="productPrice"  class="input-text" style="width:270px;" value="<?=htmlspecialchars($product->productPrice)?>" /></td>
                            </tr>
                            <tr>
                                <th width="100">产品折扣</th>
                                <td><input type="text" id="productDiscount"  class="input-text" style="width:270px;" value="<?=htmlspecialchars($product->productDiscount)?>" /></td>
                            </tr>
                            <tr>
                                <th width="100">产品库存</th>
                                <td><input type="text" id="inventory"  class="input-text" style="width:270px;" value="<?=htmlspecialchars($product->inventory)?>" /></td>
                            </tr>
                            <tr>
                                <th width="100">产品规格</th>
                                <td><input type="text" id="productSize"  class="input-text" style="width:270px;" value="<?=htmlspecialchars($product->productSize)?>" /></td>
                            </tr>
                            <tr>
                                <th width="100">产品单位</th>
                                <td>
                                    <select style="width:270px;" id="productUnit">
                                        <?foreach($productUnitdict as $key => $val){?>
                                            <?if($val->dictItemCode == $product->productUnit){?>
                                                <option name="productUnit" value="<?=$val->dictItemCode?>" selected><?=$val->dictItemName?></option>
                                            <?}else{?>
                                                <option name="productUnit" value="<?=$val->dictItemCode?>"><?=$val->dictItemName?></option>
                                            <?}?>
                                        <?}?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th width="100">产品类型</th>
                                <td>
                                    <select style="width:270px;" id="productType">
                                        <?foreach($productTypedict as $key => $val){?>
                                            <?if($val->dictItemCode == $product->productType){?>
                                                <option name="productType" value="<?=$val->dictItemCode?>" selected><?=$val->dictItemName?></option>
                                            <?}else{?>
                                                <option name="productType" value="<?=$val->dictItemCode?>"><?=$val->dictItemName?></option>
                                            <?}?>
                                        <?}?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th width="100">产品状态</th>
                                <td>
                                    <select style="width:270px;" id="productState">
                                        <?foreach($productStatedict as $key => $val){?>
                                            <?if($val->dictItemCode == $product->productState){?>
                                                <option name="productState" value="<?=$val->dictItemCode?>" selected><?=$val->dictItemName?></option>
                                            <?}else{?>
                                                <option name="productState" value="<?=$val->dictItemCode?>"><?=$val->dictItemName?></option>
                                            <?}?>
                                        <?}?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th width="100">是否首页展示</th>
                                <td>
                                    <select style="width:270px;" id="isIndex">
                                        <?foreach($isIndexdict as $key => $val){?>
                                            <?if($val->dictItemCode == $product->isIndex){?>
                                                <option name="isIndex" value="<?=$val->dictItemCode?>" selected><?=$val->dictItemName?></option>
                                            <?}else{?>
                                                <option name="isIndex" value="<?=$val->dictItemCode?>"><?=$val->dictItemName?></option>
                                            <?}?>
                                        <?}?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>产品图片组图：</th>
                                <td>
                                    <input type="text" style="display:none;" name="picUrl" id="picUrl" class="input-text"value="<?=htmlspecialchars($product->picUrl)?>"/>
                                    <iframe frameborder=0 width="100%" height=20px scrolling=no src="<?=yii::$app->urlManager->createUrl('product/upload')?>"></iframe>
                                </td>
                            </tr>
                            <tr>
                                <th>产品细节图：</th>
                                <td>
                                    <input type="text" style="display:none;" name="thumbnailUrl" id="thumbnailUrl" class="input-text"value="<?=htmlspecialchars($product->thumbnailUrl)?>"/>
                                    <iframe frameborder=0 width="100%" height=20px scrolling=no src="<?=yii::$app->urlManager->createUrl(['product/upload','detail'=>'detail'])?>"></iframe>
                                </td>
                            </tr>
                            <tr>
                                <th width="100">产品描述</th>
                                <td><input type="text" id="productDiscri"  class="input-text" style="width:270px;height:90px;" value="<?=htmlspecialchars($product->productDiscri)?>" /></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bk10"></div>
                    <div class="rightbtn">
                        <input type="button" class="buttonconfirm" id="dosubmits" name="dosubmits" value="保存" onclick="edit()"/>
                        &nbsp;&nbsp;<input type="button" class="buttondel" name="dosubmit" value="关闭" onclick="window.top.$.dialog.get('product_update').close();"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</body>
</html>