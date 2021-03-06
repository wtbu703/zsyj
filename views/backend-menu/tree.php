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
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?><!--生成一个替换字符，表示css和js的引用代码在这里显示-->

        <!--核心CSS-->
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/system.css" rel="stylesheet" type="text/css">
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

        <link rel="stylesheet" href="css/jquery.treeview.css" type="text/css" />
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/jquery.treeview.js"></script>
        <style type="text/css">
            .filetree *{white-space:nowrap;}
            .filetree span.folder, .filetree span.file{display:auto;padding:1px 0 1px 16px;}
        </style>
        <script type="text/javascript">

            $(function(){
                $("#menu_tree").treeview({
                    control: "#treecontrol",
                    persist: "cookie",
                    cookieId: "treeview-black"
                });
            })
            function editOne(targetUrl){
                parent.document.getElementById('rightMain').src = targetUrl;
            }
            //打开添加页面
            function openadd(menuUpid,menuLevel,menuName){
                var _menuLevel = Number(menuLevel)+1;
                var redirect = "<?=Yii::$app->urlManager->createUrl('backend-menu/findone')?>&uplevelMenu="+menuUpid+"&menuLevel="+_menuLevel+"&menuName="+encodeURIComponent(menuName);
                $.dialog({id:'menu_add'}).close();
                $.dialog.open(redirect, {
                    title: '添加菜单',
                    width: 650,
                    height:400,
                    lock: true,
                    border: false,
                    id: 'menu_add',
                    drag:true
                });
            }
        </script>
    </head>
    <body>
        <div class="bk10">

        </div>
        <div id="treecontrol">
            <span style="display:none">
                <a href="#"></a>
                <a href="#"></a>
            </span>
            <a href="#">
                <img src="images/minus.gif" />
                <img src="images/application_side_expand.png" />
                展开/收缩
            </a>
        </div>
        <ul class="filetree  treeview">
            <li class="collapsable">
                <div class="hitarea collapsable-hitarea"></div>
                <span>
                    <img src="images/icon/box-exclaim.gif" width="15" height="14"/>&nbsp;
                    <a href="javascript:openadd('','0','')">
                        添加一级菜单
                    </a>
                </span>
            </li>
        </ul>
        <ul id="menu_tree"  class="filetree" style="width:300px">
            <?php foreach ($this->context->backendMenus as $key => $value){
                if(!strcasecmp($value->menuLevel,"1")){?>
                    <li>
                        <div>
                            <span class="folder">&nbsp;</span>
                            <span>
                                <a href="javascript:openadd('<?=$value->id ?>','<?=$value->menuLevel ?>','<?=$value->menuName ?>')">
                                    <img src="images/add_content.gif" title="添加下级">
                                </a>
                                <a href="javascript:editOne('<?= Yii::$app->urlManager->createUrl('backend-menu/edit') ?>&menuId=<?= $value->id ?>')">
                                    <?=$value->menuName ?>
                                </a>
                            </span>
                        </div>

                    <?php foreach ($this->context->backendMenus as $index => $val){
                        if(!strcasecmp($value->id,$val->uplevelMenu)){
                    ?>
                            <ul>
                                <li>
                                    <div>
                                        <span class="file">&nbsp;</span>
                                            <span>
                                                <a href="javascript:openadd('<?= $val->id ?>','<?= $val->menuLevel ?>','<?= $val->menuName ?>')">
                                                    <img src="images/add_content.gif" title="添加下级">
                                                </a>
                                                <a href="javascript:editOne('<?= Yii::$app->urlManager->createUrl('backend-menu/edit') ?>&menuId=<?= $val->id ?>')">
                                                    <?= $val->menuName ?>
                                                </a>
                                            </span>
                                    </div>

                            <?php foreach ($this->context->backendMenus as $third => $thirdMenu){
                                if (!strcasecmp($val->id, $thirdMenu->uplevelMenu)){
                                ?>
                                    <ul>
                                        <li>
                                            <div>
                                                <span class="file">&nbsp;</span>
                                                <span>
                                                    <a href="javascript:editOne('<?= Yii::$app->urlManager->createUrl('backend-menu/edit') ?>&menuId=<?= $thirdMenu->id ?>')">
                                                        <?= $thirdMenu->menuName ?>
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
        <?php
                                }
                            };?>
                                    </li>
                                </ul>
       <?php                 }
                    };?>
                        </li>
      <?php          }
            };
        ?>
        </ul>
    </body>
</html>
<?php $this->endPage() ?>

