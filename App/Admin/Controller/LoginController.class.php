<?php
/**
 * @message 登陆
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class LoginController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function checkLogin()
    {
        $jump_url = './admin.php';
        if(IS_POST && IS_AJAX)
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $code = $_POST['code'];

            if(!checkVerify($code))
            {
                return show(0,'验证码错误');
            }
            $arr = array(
                'username'=>$username,
                'password'=>md5($password),
            );
            $user = D('User');
                try{
                    $findUserRes = $user->checkMessage($arr);
                    if(!$findUserRes)
                    {
                        return show(0,'账号或密码错误');
                    }
                        $_SESSION['user'] = array(
                          'name'=>$arr['username'],
                        );
                        return show(1,'登陆成功',array('jump_url'=>$jump_url));
                }catch(Exception $e)
                {
                    return show(0,$e->getMessage());
                }
        }
        exit();
    }
    public function verify()
    {
        $config = array(
            'fontSize'=>14, //字体大小
            'length'=>4, //验证码位数
            'useNoise'=>false, //关闭验证码咋点
        );
        $code = new \Think\Verify($config);
        $code->entry();
    }
}