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
use yii\widgets\LinkPager;

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
        <script type="text/javascript" src="js/common.js"></script>
        <!--弹出图片-->
        <script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        <script type="text/javascript">

            var pageUrl = "<?=yii::$app->urlManager->createUrl('dict/listall')?>";
            var getdictdetailUrl = "<?=yii::$app->urlManager->createUrl('dict/getdictdetail')?>";
            var editUrl = "<?=yii::$app->urlManager->createUrl('role/edit')?>";
            var deleteUrl = "<?=yii::$app->urlManager->createUrl('role/delete')?>"
            var deleteallUrl = "<?=yii::$app->urlManager->createUrl('role/deleteall')?>"
            var detailUrl = "<?=yii::$app->urlManager->createUrl('role/detail')?>"
            var addrUrl = "<?=yii::$app->urlManager->createUrl('role/addr')?>";
            var roleaddUrl = "<?=yii::$app->urlManager->createUrl('role/roleadd')?>";
            var listallUrl  = "<?=yii::$app->urlManager->createUrl('role/listall')?>";

        </script>
        <script language="javascript" type="text/javascript" src="js/admin/role/listall.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="pad-lr-10">
            <div class="table-list">
                <table width="100%" cellspacing="0" id="role_list">
                    <thead id="dict_list_head">
                    <tr align="left">
                        <th width="80px"><input type="checkbox" id='check_box' onclick="selectall('id')"/>全选/取消</th><th width="160px">姓名</th><th width="80px" align="center">状态</th><th align="center">操作</th>
                    </tr>
                    </thead>
                    <tbody id="role_list_body">
                    <?if(!is_null($roles)){?>
                    <?php foreach ($roles as $index => $val){?>
                        <tr align="left">
                                <td><input type="checkbox" id="id" name="id" value="<?=htmlspecialchars($val->id)?>"/></td>
                                <td><a href="javascript:detail('<?=$val->id?>','<?=$val->name?>')"><?=htmlspecialchars($val->name)?></a></td>
                                <td align="center"><?=htmlspecialchars($val->state)?></td>
                                <td align="center">
                                    <a href="javascript:openedit('<?=$val->id?>','<?=$val->name?>')">修改</a>&nbsp;&nbsp;
                                    |&nbsp;&nbsp;<a href="javascript:deleteUser('<?=$val->id?>')">删除</a>&nbsp;&nbsp;
                                    |&nbsp;&nbsp;<a href="javascript:openaddr('<?=$val->id?>')">分配权限</a>&nbsp;&nbsp;
                                    |&nbsp;&nbsp;<a href="javascript:roleopenaddu('<?=$val['id']?>','<?=$val['name']?>')">分配用户</a>
                                </td>
                       </tr>
                    <?}?>
                    <?}?>
                    </tbody>
                </table>
                <div class="btn">
                    <label for="check_box"><input type="checkbox" id='check_box' onclick="selectall('id')"/>全选/取消</label>
                    <input type="button" class="buttondel" name="dosubmit" value="删除" onclick="if (confirm('您确定要删除吗？')) delopt();"/>
                </div>

            </div>
        </div>
    </body>
</html>

