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
            var deludUrl = "<?=yii::$app->urlManager->createUrl('department/delud')?>";
            var deludsUrl = "<?=yii::$app->urlManager->createUrl('department/deluds')?>";
            var detailUrl = "<?=yii::$app->urlManager->createUrl('user/detail')?>";
            var adduUrl = "<?=yii::$app->urlManager->createUrl('department/addu')?>";
            var addusUrl = "<?=yii::$app->urlManager->createUrl('department/addus')?>";
            var listUrl = "<?=yii::$app->urlManager->createUrl('department/list')?>";
        </script>
        <script language="javascript" type="text/javascript" src="js/page.js" charset="utf-8"></script>
        <script language="javascript" type="text/javascript" src="js/admin/department/listallu.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="subnav" id="display" >
            <div class="content-menu ib-a blue line-x">
                <a class="add fb" href="javascript:openaddus('<?=$departmentId?>','<?=$departmentName?>');"><em>添加员工</em></a>
                <a class="add fb" href="<?=yii::$app->urlManager->createUrl('department/list')?>"><em>返回</em></a>
            </div>
        </div>
        <form name="myform" action="" method="post" id="myform" target="center_frame">
            <table width="100%" cellspacing="0" class="search-form">
                <tbody>
                    <tr>
                        <td>
                            <div class="explain-col">
                                <div>
                                    部门名称：<input type="hidden" id="departmentName" value="<?=$departmentName?>"><?=$departmentName?>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="pad-lr-10">
                <div class="table-list">
                    <table width="100%" cellspacing="0" id="u_list">
                        <thead id="dict_list_head">
                        <tr align="left">
                            <th width="80px"><input type="checkbox" id='check_box' onclick="selectall('id')"/>全选/取消</th><th width="30px" align="center">序号</th><th width="100px" align="center">用户名</th><th width="100px" align="center">真实姓名</th><th width="80px" align="center">性别</th><th width="160px" align="center">所在部门</th><th width="160px" align="center">电话号码</th><th width="80px" align="center">用户状态</th><th align="center">操作</th>
                        </tr>
                        </thead>
                        <tbody id="user_list_body">
                        <?if(!is_null($users)){?>
                        <?php foreach ($users as $index => $val){?>
                            <tr align="left">
                                <td><input type="checkbox" id="id" name="id" value="<?=$val->id?>"/></td>
                                <td align="center"><?=$index+$pages->page*$pages->pageSize+1?></td>
                                <td align="center"><a href="javascript:detail('<?=$val->id?>','<?=$val->username?>')"><?=htmlspecialchars($val->username)?></a></td>
                                <td align="center"><?=htmlspecialchars($val->truename)?></td>
                                <td align="center"><?=$val->sex?></td>
                                <td align="center"><?=htmlspecialchars($departmentName)?></td>
                                <td align="center"><?=htmlspecialchars($val->mobilephone)?></td>
                                <td align="center"><?=$val->userState?></td>
                                <td align="center">
                                    <a href="javascript:deleteud('<?=$val->id?>','<?=$departmentName?>','<?=$departmentId?>')">移出部门</a>
                                </td>
                           </tr>
                        <?}?>
                        <?}?>
                        </tbody>
                    </table>
                    <div class="btn">
                        <label for="check_box"><input type="checkbox" id='check_box' onclick="selectall('id')"/>全选/取消</label>
                        <input type="button" class="buttondel" name="dosubmit" value="移除" onclick="if (confirm('您确定要把这些员工移出部门吗？')) deluds('<?=$departmentName?>','<?=$departmentId?>');"/>
                    </div>
                    <div id="pages">
                        <a><?=$pages->totalCount?>条/<?=$pages->pageCount?>页</a>
                        <input type="hidden" value="<?=$pages->page?>" id="curPage"/><!--当前页-->
                        <input type="hidden" value="<?=$pages->pageCount?>" id="pageCount"/><!--总页数-->
                        <input type="hidden" value="<?=$pages->pageSize?>" id="pageSize"/><!--每页显示数-->
                        <?if($pages->page>0){?>
                            <!-- 判断是否不是第一页 -->
                            <a id="firstPageid" href="javascript:page('1')">首页</a>
                            <a id="supPageId" href="javascript:page('2')">上一页</a>
                        <?}?>
                        <?=$pages->page+1?>
                        <?if($pages->page<$pages->pageCount-1){?>
                            <!-- 判断如果不是最后一页 -->
                            <a id="nextPageid" href="javascript:page('3')">下一页</a>
                            <a id="lastPageid" href="javascript:page('4')" class="a1">尾页</a>
                        <?}?>
                        <input type="text" size="2" class="input-text" value="<?=$pages->page+1?>" id="goPage"/><a href="javascript:page('0')">GO</a>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
<form action="<?=yii::$app->urlManager->createUrl('department/addu')?>" method="get" id="pageForm">
    <input type="hidden" id="page" name="page" value="<?=$pages->page?>"/>
    <input type="hidden"  name="r" value="department/addu"/>
    <input type="hidden" id="pre-page" name="pre-page" value="<?=$pages->pageSize?>"/>
    <input type="hidden" id="id" name="id" value="<?=$para['id']?>"/>
    <input type="hidden" id="departmentName" name="departmentName" value="<?=$para['departmentName']?>"/>
</form>