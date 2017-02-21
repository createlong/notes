//添加
$("#button-add").on('click',function()
{
    url = SCOPE.add_url;
    //console.log(url);return;
    window.location.href=url;
});
//编辑


//提交数据
$("#singcms-button-submit").on('click',function()
{
    data = {};
    var formData = $("#singcms-form").serializeArray();
    $(formData).each(function(i)
    {
        data[this.name] = this.value;
    });
    url = SCOPE.save_url;
    index = SCOPE.jump_url;
    $.post(url,data,function(msg)
    {
        if(msg.status == 1)
        {
            return dialog.success(msg.message,index);
        }
        if(msg.status == 0)
        {
            return dialog.error(msg.message,msg['data']['jump_url']);
        }
    },'JSON');
});
//修改状态
$(".singcms-table #singcms-on-off").on('click',function()
{
    url = SCOPE.set_status_url;
    id = $(this).attr('attr-id');
    status = $(this).attr('attr-status');
    data ={};
    data['id'] = id;
    data['status'] = status;
    layer.open({
        type : 0,
        title : '确定修改',
        btn: ['确定','取消'],
        icon:3,
        closeBtn:2,
        content: "是否确定修改",
        scrollbar:true,
        yes : function()
        {
            //执行跳转
            todelete(url,data);
        }
    })
})

//排序
$("#button-listorder").on('click',function()
{
    ///获取内容
    var data = $("#singcms-listorder").serializeArray();
    formData = {};
    $(data).each(function(i)
    {
        formData[this.name] = this.value;
    })
    console.log(formData);
    url = SCOPE.listorder_url;
    $.post(url,formData,function(msg)
    {
        if(msg.status == 1)
        {
            return dialog.success(msg.message,msg['data']['jump_url']);
        }
        if(msg.status == 0)
        {
            return dialog.error(msg.message,msg['data']['jump_url']);
        }
    },'JSON')
})
function todelete(url,data)
{
    $.post(
        url,
        data,
        function(s)
        {
            if(s.status == 1)
            {
             return dialog.success(s.message,'');
            }else{
             return dialog.error(s.message);
            }
        }
        ,'JSON'
    )
}

//全选反选
$("#singcms-checkbox-all").on('click',function()
{
    if(this.checked)
    {
       $("input[name='pushcheck']").prop('checked',true);
    }else{
       $("input[name='pushcheck']").prop('checked',false);
    }

})


//ajax分页
//需要获取当前页面的的页码
$(".page a").on('click',function()
{
    var pageObj = this;
    var pageUrl = pageObj.href;
    console.log(pageUrl);
    $.ajax({
        type:'get',
        url:pageUrl,
        success:function(res)
        {
//          console.log(res);return;
            $(".pagess").html('');
            $(".pagess").html(res);
        }
    })
    return false;
})

