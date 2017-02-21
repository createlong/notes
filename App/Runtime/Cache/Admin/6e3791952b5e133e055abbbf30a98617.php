<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sing后台管理平台</title>
    <!-- Bootstrap Core CSS -->
    <link href="/PHP/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/PHP/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/PHP/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/PHP/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/PHP/Public/css/sing/common.css" />
    <link rel="stylesheet" href="/PHP/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/PHP/Public/css/party/uploadify.css">

    <!-- jQuery -->
    <script src="/PHP/Public/js/jquery.js"></script>
    <script src="/PHP/Public/js/bootstrap.min.js"></script>
    <script src="/PHP/Public/js/dialog/layer.js"></script>
    <script src="/PHP/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/PHP/Public/js/party/jquery.uploadify.js"></script>

</head>




<body>
<div id="wrapper">

  <?php
 $nav = D('Menu')->getMenuNav(); $index= 'index'; ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" >内容管理平台</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 王尼玛 <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="./admin.php?c=admin&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
       
        <li class="divider"></li>
        <li>
          <a href="./admin.php?c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li>
        <a href="./admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
      </li>
      <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
        <a href="<?php echo (getUrl($vo)); ?>"><i class="fa fa-fw fa-dashboard"></i> <?php echo ($vo["name"]); ?></a>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
  <div id="page-wrapper">

    <div class="container-fluid" >

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">

          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i>  <a href="./admin.php?c=content">文章管理</a>
            </li>
            <li class="active">
              <i class="fa fa-table"></i>文章列表
            </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
      <div >
        <button  id="button-add" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加 </button>
      </div>
      <div class="row">
        <form action="./admin.php" method="get">
          <div class="col-md-3">
            <div class="input-group">
              <span class="input-group-addon">栏目</span>
              <select class="form-control" name="catid">
                <option value='' >全部分类</option>
                <?php if(is_array($menu_select)): foreach($menu_select as $key=>$sitenav): ?><option value="<?php echo ($sitenav["menu_id"]); ?>" <?php if($catid == $sitenav['menu_id']): ?>selected<?php endif; ?> ><?php echo ($sitenav["name"]); ?></option><?php endforeach; endif; ?>
              </select>
            </div>
          </div>
          <input type="hidden" name="c" value="content"/>
          <input type="hidden" name="a" value="index"/>
          <div class="col-md-3">
            <div class="input-group">
              <input class="form-control" name="title" type="text" value="<?php echo ($title); ?>" placeholder="文章标题"/>
                <span class="input-group-btn">
                  <button id="sub_data" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h3></h3>
          <div class="table-responsive">
            <form id="singcms-listorder">
              <table class="table table-bordered table-hover singcms-table">
                <thead>
                <tr>
                  <th width="10"><input type="checkbox" id="singcms-checkbox-all"/></th>
                  <th width="14">排序</th><!--6.7-->
                  <th>id</th>
                  <th>标题</th>
                  <th>栏目</th>
                  <th>来源</th>
                  <th>封面图</th>
                  <th>时间</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody class="pagess">
          <?php if(is_array($ContentRes)): $i = 0; $__LIST__ = $ContentRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i;?><tr>
                  <td><input type="checkbox" name="pushcheck" id="<?php echo ($content["news_id"]); ?>"></td>
                  <td><input size=4 type="text" name="listorder[<?php echo ($content["news_id"]); ?>]" value="<?php echo ($content["listorder"]); ?>"></td>
                  <td><?php echo ($content["news_id"]); ?></td>
                  <td><?php echo ($content["title"]); ?></td>
                  <td><?php echo (getMenu($menu_select,$content["catid"])); ?></td>
                  <td><?php echo ($content["copyfrom"]); ?></td>
                  <td><?php echo (is_hasthumb($content["thumb"])); ?></td>
                  <td><?php echo ($content["create_time"]); ?></td>
                  <td><span  attr-status="<?php if($content['status'] == 1): ?>0<?php else: ?>1<?php endif; ?>"  attr-id="<?php echo ($content["news_id"]); ?>" class="sing_cursor singcms-on-off" id="singcms-on-off" ><?php echo (changeStatus($content["status"])); ?></span></td>
                  <td>修改 删除</td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          <nav>
            <div class="page">
              <?php echo ($contentShow); ?>
            </div>
          </nav>
                </tbody>
              </table>

              <div>
                <button  id="button-listorder" type="button" class="btn btn-primary dropdown-toggle" ><span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"></span>更新排序</button>
              </div>
            </form>


            <div class="input-group">
              <select class="form-control" name="position_id" id="select-push">
                <option value="0">请选择推荐位进行推送</option>
                <?php if(is_array($positions)): foreach($positions as $key=>$position): ?><option value="<?php echo ($position["id"]); ?>"><?php echo ($position["name"]); ?></option><?php endforeach; endif; ?>
              </select>
              <button id="singcms-push" type="button" class="btn btn-primary">推送</button>
            </div>

          </div>
        </div>

      </div>
      <!-- /.row -->



    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script>
  var SCOPE = {
    'edit_url' : './admin.php?c=content&a=edit',
    'add_url' : './admin.php?c=content&a=add',
    'set_status_url' : './admin.php?c=content&a=setStatus',
    'sing_news_view_url' : './index.php?c=view',
    'listorder_url' : './admin.php?c=content&a=listorder',
    'push_url' : './admin.php?c=content&a=push',
  }

</script>
<script src="/PHP/Public/js/admin/common.js"></script>



</body>

</html>