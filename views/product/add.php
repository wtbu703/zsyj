<?php
/**
 * Created by PhpStorm.
 * User: liuyao
 * Date: 2016/3/9
 * Time: 12:10
 * update by liluoao
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?><!--生成一个替换字符，表示css和js的引用代码在这里显示-->

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
        <!--公共函数-->
        <script type="text/javascript" src="js/common.js"></script>
        <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        <script type="text/javascript">
            var listdictUrl = "<?=yii::$app->urlManager->createUrl('dict/listdict')?>";
            var checkusernameUrl = "<?=yii::$app->urlManager->createUrl('product/checkusername')?>";
            var insertUrl = "<?=yii::$app->urlManager->createUrl('product/insert')?>";
            var listUrl = "<?=yii::$app->urlManager->createUrl('product/list')?>";
        </script>
        <script type="text/javascript" src="js/admin/product/add.js"></script>
    </head>
    <body>
        <div class="pad-lr-10">
            <form name="myform" action="" method="post" id="myform" target="iframeId">
                <div class="pad_10">
                    <div style='overflow-y:auto;overflow-x:hidden' class='scrolltable'>
                        <table width="100%" cellspacing="0" class="table_form contentWrap">
                            <tr>
                                <th>产品类别：</th>
                                <td><select name="productType" id="productType" style="width:260px;"></td>
                            </tr>
                            <tr>
                                <th width="100">产品名称：</th>
                                <td><input type="text" style="width:250px;" name="productTitle" id="productTitle"  class="input-text"/></td>
                            </tr>
                            <tr>
                                <th>产品单位：</th>
                                <td><select name="productUnit" id="productUnit" style="width:260px;"></td>
                            </tr>
                            <tr>
                                <th>产品规格：</th>
                                <td><input type="text" style="width:250px;" name="productSize" id="productSize" class="input-text"/></td>
                            </tr>
                            <tr>
                                <th>产品价格：</th>
                                <td><input type="text" style="width:250px;" name="productPrice" id="productPrice"  class="input-text"/></td>
                            </tr>
                            <tr>
                                <th>产品折扣：</th>
                                <td><input type="text" style="width:250px;" name="productDiscount" id="productDiscount" class="input-text"/></td>
                            </tr>
                            <tr>
                                <th>产品描述：</th>
                                <td><textarea style="width:370px;height:180px;" id="productDiscri" name="productDiscri"></textarea></td>
                            </tr>
                            <tr>
                                <th>是否首页展示：</th>
                                <td><select name="isIndex" id="isIndex" style="width:260px;"></td>
                            </tr>
                            <tr>
                                <th>产品图片组图：</th>
                                <td>
                                    <input type="text" style="display:none;" name="picUrl" id="picUrl" class="input-text"/>
                                    <iframe frameborder=0 width="100%" height=20px scrolling=no src="<?=yii::$app->urlManager->createUrl('product/upload')?>"></iframe>
                                </td>
                            </tr>
                            <tr>
                                <th>产品细节图：</th>
                                <td>
                                    <input type="text" style="display:none;" name="thumbnailUrl" id="thumbnailUrl" class="input-text"/>
                                    <iframe frameborder=0 width="100%" height=20px scrolling=no src="<?=yii::$app->urlManager->createUrl(['product/upload','detail'=>'detail'])?>"></iframe>
                                </td>
                            </tr>
                            <tr>
                                <th>产品库存：</th>
                                <td><input type="text" style="width:250px;" name="inventory" id="inventory" class="input-text"/></td>
                            </tr>
                        </table>
                    </div>
                    <div class="bk10"></div>
                </div>
            </form>
            <div class="table-list">
                <div class="rightbtn">
                    <input type="button" class="buttonsave" value="增加" name="dosubmit" onclick="add()" />
                    <input type="button" class="buttonclose" value="关闭" name="dosubmit"  onclick="window.top.$.dialog.get('product_add').close();"/>
                </div>
            </div>
        </div>

    </body>
</html>
<?php $this->endPage() ?>