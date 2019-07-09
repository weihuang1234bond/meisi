<?php

namespace app\controller;

use think\Controller;
use think\Db;
use think\Request;
use wechatShare\wxShare;

class BaseController extends Controller
{

    public function __construct(Request $request = null)
    {
        $request->action();
        if(!file_exists(APP_PATH.'db/install.lock')){
            $this->redirect('install/index');
            $this->themeBasename='default';
        }else{
            if($testTheme=strtolower($request->get('t/s'))){
                //theme view
                $havaThemeList=array_map('basename',glob('./tpl/*',GLOB_ONLYDIR));
                if(in_array($testTheme,$havaThemeList)){
                    $this->themeBasename=$testTheme;
                    session('testThemeBasename',$this->themeBasename);
                }else{
                    $this->themeBasename='default';
                }
            }else{
                if(session('testThemeBasename')){
                    $this->themeBasename=session('testThemeBasename');
                }else{
                    $this->themeBasename=get_config('theme_basename')?get_config('theme_basename'):'default';
                }
            }
        }
        $this->checkSiteStatus();

        //获取seo信息及相应的cname处理
        $seoInfo=get_seo_info_plus();
        $wechatCode='';
        if($request->isMobile()){
           config('template.view_path','./tpl/'.$this->themeBasename.'/mobile/');
           config('dispatch_success_tmpl','./tpl/'.$this->themeBasename.'/mobile/systemMsg/message.html');
           config('dispatch_error_tmpl','./tpl/'.$this->themeBasename.'/mobile/systemMsg/message.html');
            if(is_wechat()){
                $wechatshve=new wxShare();
                $wechatCode=$wechatshve->register_jssdk();
            }
        }else{
            config('template.view_path','./tpl/'.$this->themeBasename.'/');
            config('dispatch_success_tmpl','./tpl/'.$this->themeBasename.'/systemMsg/message.html');
            config('dispatch_error_tmpl','./tpl/'.$this->themeBasename.'/systemMsg/message.html');
        }
        parent::__construct($request);
        //$this->checkSiteStatus();
    //判断用户是否登录然后是否已经填写用户名用于第三方登录 whs 20180306
        if($request->action()!="binding_third"){

        if(!empty(session('member_id'))){
            $user=Db::name('member')->where(['id'=>session('member_id')])->find();
          if(empty($user['username'])){
                $this->redirect('member/binding_third');
            }
        } }
        $this->assign('wechatCode',$wechatCode);
        $this->assign('seo',$seoInfo);
        if($request->action()=='recharge'&&$seoInfo['close_pay']==0){
            $this->error('该站点支付已经关闭，请使用卡密充值', url('member/card_pwd'), null, 3);
            //$this->redirect('member/card_pwd');
        }

        $this->assign('controller',lcfirst(request()->controller()));

        if($this->request->isAjax()){
            config('exception_tmpl', THINK_PATH . 'tpl' . DS . 'think_exception.tpl');
        }

    }

    public function _empty(){
        $this->redirect('/');
    }

    private function checkSiteStatus()
    {
        $request=Request::instance();

        $baseConfig=get_config_by_group('base');

        if(isset($baseConfig['site_status']) && $baseConfig['site_status']==0 && !$request->isMobile()){
            header("location:/error/index.html");
            exit('siteClosed');
        }

        if(isset($baseConfig['wap_site_status']) && $baseConfig['wap_site_status']==0 && $request->isMobile()){
            header("location:/error/m.html");
            exit('wapClosed');
        }
    }
}