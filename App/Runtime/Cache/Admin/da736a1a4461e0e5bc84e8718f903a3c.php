<?php if (!defined('THINK_PATH')) exit();?>
<?php if(is_array($ContentRes)): $i = 0; $__LIST__ = $ContentRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i;?><tr>
        <td><input type="checkbox" name="pushcheck" id="<?php echo ($content["news_id"]); ?>"></td>
        <td><input size=4 type="text" name="listorder[<?php echo ($content["news_id"]); ?>]" value="<?php echo ($content["listorder"]); ?>"></td>
        <td><?php echo ($content["news_id"]); ?></td>
        <td><?php echo ($content["title"]); ?></td>
        <td><?php echo (getMenu($menu_select,$content["catid"])); ?></td>
        <td><?php echo ($content["copyfrom"]); ?></td>
        <td><?php echo (is_hasthumb($content["thumb"])); ?></td>
        <td><?php echo ($content["create_time"]); ?></td>
        <td><?php echo ($content["status"]); ?></td>
        <td>修改 删除</td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
<nav>
    <div class="page">
        <?php echo ($contentShow); ?>
    </div>
</nav>