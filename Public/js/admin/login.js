/**
 *@message 登陆
 **/
var login = {
    check:function()
    {
        //登陆页面获取用户名和密码
        var username = $("input[name='username']").val();
        var password = $("input[name='password']").val();
        var code     = $("input[name='code']").val();
        if(!username)
        {
            return dialog.error('用户名还没填写');
        }
        if(!password)
        {
            return dialog.error('密码还没有填写');
        }
        if(!code)
        {
            return dialog.error('验证码还没有填写');
        }
        //组成数组
        var data = {'username':username,'password':password,'code':code};
        var url = './admin.php?c=login&a=checkLogin';
        //$.post形式发送数据
        $.post(url,data,function(msg)
        {
            if(msg.status == 1)
            {
                return dialog.success(msg.message,msg['data']['jump_url']);
            }
            if(msg.status == 0)
            {
                return dialog.error(msg.message);
            }
        },'JSON')
    }
}