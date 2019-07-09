/**
 * 视频播放参数初始化
 * @author      dreamer
 * @updateTime  2017/12/11 16:59
 * @特别说明
 *              1. 使用前必须申明playRequestUrl变量(播放视频请求api地址)
 *              2. 本方法依赖layer弹出层框架
 * @returns {boolean}
 */
function videoPlayInit(videoId){
    $.post(playRequestUrl,{id:videoId},function(resp){
        //console.log(resp);
        if(resp.resultCode==0){
            switch(resp.data.rs){
                case 1://正常播放
                    //layer.msg('正常播放');
                    createPlayer(resp.data);
                    break;
                case 2://可扣费播放
                    if((resp.data.freeType==1 && resp.data.freeNum>0)||resp.data.freeType==2) {
                        //可试看
                        if(resp.data.freeType==1 && resp.data.freeNum>0) addStr='剩余试看<span class="important">'+resp.data.freeNum+'</span>部。';
                        if(resp.data.freeType==2) addStr='可试看<span class="important">'+resp.data.freeNum+'</span>秒。';
                        layer.confirm('此视频需支付<span class="important">' + resp.data.videoInfo.gold + '</span>金币,确定支付吗？您剩余<span class="important">'+resp.data.memberInfo.money+'</span>金币，'+addStr,{
                                time: 2000000,
                                title:'温馨提示',
                                btn: ['扣费观看', '试看'],
                                shade: 0.4,
                                closeBtn: 0,
                                area: ['350px', '180px'],
                            }, function (index) {
                                //扣费观看
                                createPlayer(resp.data);
                            }
                            , function (index) {
                                //试看
                                createPlayer(resp.data,true);
                            });
                    }else{
                        //试看次数用完
                        layer.confirm('此视频需支付<span class="important">' + resp.data.videoInfo.gold + '</span>金币，确定支付吗？您剩余<span class="important">'+resp.data.memberInfo.money+'</span>金币。',
                            {
                                time: 2000000,
                                title:'温馨提示',
                                btn: ['扣费观看'],
                                shade: 0.4,
                                closeBtn: 0,
                                area: ['350px', '170px'],
                            }, function () {
                                //扣费观看
                                createPlayer(resp.data);
                            });
                    }
                    break;
                case 3://金币不足扣费
                    if((resp.data.freeType==1 && resp.data.freeNum>0)||resp.data.freeType==2) {
                        //可试看
                       layer.confirm('此视频为收费视频，试看次数已用完，请您登陆后观看。', {
                            time: 2000000,
                            title: '温馨提示',
                            btn: ['登陆', '关闭'],
                            shade: 0.4,
                            closeBtn: 0,
                            area: ['350px', '200px'],
                        }, function () {
                            $("#login-modal").modal();
                        }, function () {
                            layer.closeAll();
                        }); 
                           
                    }else{
                        //试看次数用完
                        layer.confirm('此视频需支付<span class="important">' + resp.data.videoInfo.gold + '</span>金币，您金币不足，且试看用完，请充值后观看。剩余金币<span class="important">'+resp.data.memberInfo.money+'</span>个，剩余试看<span class="important">'+resp.data.freeNum+'</span>部。', {
                            time: 2000000,
                            title:'温馨提示',
                            btn: ['充值'],
                            shade: 0.4,
                            closeBtn: 0,
                            area: ['350px', '180px'],
                        }, function (index) {
                            //充值
                            location.href="/system_pay/recharge";
                        });
                    }
                    break;
                case 4:
                    if((resp.data.freeType==1 && resp.data.freeNum>0)||resp.data.freeType==2) {
                        if(resp.data.freeType==1 && resp.data.freeNum>0) addStr='剩余试看<span class="important">'+resp.data.freeNum+'</span>部。';
                        if(resp.data.freeType==2) addStr='可试看<span class="important">'+resp.data.freeNum+'秒</span>。';
                        layer.confirm('此视频为收费视频，游客'+addStr, {
                            time: 2000000,
                            title: '温馨提示',
                            btn: ['登陆', '试看'],
                            shade: 0.4,
                            closeBtn: 0,
                            area: ['350px', '200px'],
                        }, function () {
                             $("#login-modal").modal();
							 layer.closeAll();
                        }, function () {
                            createPlayer(resp.data,true);
                            //layer.msg('祝您试看愉快',{icon:1,time:700});
                        });
                    }else{
                        layer.confirm('此视频为收费视频，试看次数已用完，请您登陆后观看。', {
                            time: 2000000,
                            title: '温馨提示',
                            btn: ['登陆', '关闭'],
                            shade: 0.4,
                            closeBtn: 0,
                            area: ['350px', '200px'],
                        }, function () {
                            $("#login-modal").modal();
                        }, function () {
                            layer.closeAll();
                        });
                    }
                    break;
            }
        }else{
            layer('请求播放数据失败,请稍候重试',{icon:2,time:2000});
        }
    },'JSON');
    return true;
}
