<?php
/**
 * Created by PhpStorm.
 * User: liluoao
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
            var saveUrl = "<?=yii::$app->urlManager->createUrl('inform/savechoose')?>";
            var addUrl = "<?=yii::$app->urlManager->createUrl('inform/add')?>";
        </script>
        <script type="text/javascript" src="js/admin/inform/choose.js"></script>
        <style>
            *{margin:0;border:0;padding:0;}
            ul{list-style:none;}
            a{text-align:none;}
            a{text-decoration:none;outline:none;}
            a,img{border:0;}
            .expand{background:#fff;border:1px solid #03F;cursor:pointer;float:right;margin-right:30px;}
            .status{border:1px solid #FF0;width:200px;height:auto;float:left;display:none;margin-top:65px;padding:5px 5px;}
            .status a{padding:0px 17px;}
            .close{background:#fff;border:1px solid #03F;cursor:pointer;float:right;margin-top:40px;}
            .clear{clear:both}
            .big{width:500px;height:auto;margin:0 auto;}
            table.department {border-collapse:collapse;border-spacing: 0;border: 0;text-align: center;width:200px;margin:0 auto;margin-top:25px;float:left;}
            thead tr{border: 1px solid #bd9fbd;}
            th{background: #f4f4f4;width:50px;height:40px;font-size:14px;color:#996699;text-align:center;}
            td{padding: 10px;text-align:center;}
            tbody tr{border: 1px solid #999999;}
            tbody tr{height:50px;}
        </style>
    </head>
    <body>
    <div class="big">
        <table class="department">
            <thead>
            <tr>
                <th>部门</th>
            </tr>
            </thead>
            <tbody>
            <?if(!is_null($department)){?>
                <?foreach ($department as $index => $val){?>
                    <tr>
                        <td><input name="Pre_<?=$val->id?>" value="<?=$val->id?>" type="checkbox" class="check" /><a href="#"><?=$val->departmentName?></a><button value="<?=$val->id?>" class="expand">展开</button></td>
                    </tr>
                <?}?>
            <?}?>
            </tbody>
        </table>
        <?if(!is_null($department)){?>
            <?foreach ($department as $index => $val){?>
                <?if(!is_null($user)){?>
                <div class="status" id="<?=$val->id?>">
                    <?foreach($user as $key => $data){?>
                        <?if($data->departmentId == $val->id){?>
                            <input value="Pre_<?=$val->id?>" name="<?=$val->id?>" type="checkbox" class="check" />
                            <a href="#"><?=$data->truename?></a>
                        <?}?>
                    <?}?>
                    <button  class="close">确定</button>
                </div>
                <?}?>
            <?}?>
        <?}?>
        <div class="table-list">
            <div class="rightbtn">
                <input type="button" value="确定" class="button" onclick="choose('<?=$id?>')"/>
                <input type="button" value="返回" class="button" onclick="back()"/>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    </body>
</html>
<?php $this->endPage() ?>