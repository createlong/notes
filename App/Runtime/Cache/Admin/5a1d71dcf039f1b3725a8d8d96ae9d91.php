<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
                        <i class="fa fa-dashboard"></i>  <a href="/admin.php?c=menu">菜单管理</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i><?php echo ($nav); ?>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <form action="./admin.php" method="get">

                <div class="input-group">
                    <span class="input-group-addon">类型</span>
                    <select class="form-control" name="type">
                        <option value=''>请选择类型</option>

                        <option value="1" <?php if($type == 1): ?>selected<?php endif; ?>>后台菜单</option>
                        <option value="2" <?php if($type == 2): ?>selected<?php endif; ?>>前端导航</option>
                    </select>

                <input type="hidden" name="c" value="menu"/>
                <input type="hidden" name="a" value="index"/>
                <span class="input-group-btn">
                  <button id="sub_data" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                </span>
                </div>
            </form>
        </div>
        <div>
          <button  id="button-add" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加 </button>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h3></h3>
                <div class="table-responsive">
                    <form id="singcms-listorder">
                    <table class="table table-bordered table-hover singcms-table">
                        <thead>
                        <tr>
                            <th width="14">排序</th>
                            <th>id</th>
                            <th>菜单名</th>
                            <th>模块名</th>
                            <th>类型</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($menuList)): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><input type="text" name="listorder[<?php echo ($vo["menu_id"]); ?>]" value="<?php echo ($vo["listorder"]); ?>"></td>
                            <td><?php echo ($vo["menu_id"]); ?></td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td><?php echo ($vo["m"]); ?></td>
                            <td><?php echo (getMenuModel($vo["type"])); ?></td>
                            <td><span  attr-status="<?php if($vo['status'] == 1): ?>0<?php else: ?>1<?php endif; ?>"  attr-id="<?php echo ($vo["menu_id"]); ?>" class="sing_cursor singcms-on-off" id="singcms-on-off" ><?php echo (changeStatus($vo["status"])); ?></span></td>
                            <td><span class="glyphicon glyphicon-edit" aria-hidden="true" id="singcms-edit" attr-id="<?php echo ($menu["menu_id"]); ?>"></span>    <a href="javascript:void(0)" attr-id="<?php echo ($menu["menu_id"]); ?>" id="singcms-delete"  attr-a="menu" attr-message="删除"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    </form>
                    <nav>
                        <ul class="pagination">
                            <?php echo ($menuShow); ?>
                        </ul>
                    </nav>
                    <div>
                        <button  id="button-listorder" type="button" class="btn btn-primary dropdown-toggle" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>更新排序 </button>
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
<!-- Morris Charts JavaScript -->
<script>

    var SCOPE = {
        'add_url' : './admin.php?c=menu&a=add',
        'edit_url' : './admin.php?c=menu&a=edit',
        'set_status_url' : './admin.php?c=menu&a=setStatus',
        'listorder_url' : './admin.php?c=menu&a=listorder',

    }
</script>
<script src="/PHP/Public/js/admin/common.js"></script>



</body>

</html>