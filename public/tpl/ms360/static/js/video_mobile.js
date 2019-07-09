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
    $.ajax({
        url:playRequestUrl,
        data:{id:videoId},
        dataType: 'json',
        method: 'POST',
        success:function(resp){
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
                        
                        layer.open({
                            content:'此视频需支付<span class="important">' + resp.data.videoInfo.gold + '</span>金币,确定支付吗？您剩余<span class="important">'+resp.data.memberInfo.money+'</span>金币，'+addStr,
                            btn: ['扣费观看', '试看'],
                            yes:function () {
                                //扣费观看
                                createPlayer(resp.data);
                            },
                            no:function () {
                                //试看
                                createPlayer(resp.data,true);
                            }
                        });

                    }else{
                        //试看次数用完
                        layer.open({
                            content:'此视频需支付<span class="important">' + resp.data.videoInfo.gold + '</span>金币，确定支付吗？您剩余<span class="important">'+resp.data.memberInfo.money+'</span>金币。',
                            btn: ['扣费观看'],
                            yes:function () {
                                //扣费观看
                                createPlayer(resp.data);
                            }
                        });
                    }
                    break;
                case 3://金币不足扣费
                    if((resp.data.freeType==1 && resp.data.freeNum>0)||resp.data.freeType==2) {
                        //可试看
                        if(resp.data.freeType==1 && resp.data.freeNum>0) addStr='剩余试看<span class="important">'+resp.data.freeNum+'</span>部';
                        if(resp.data.freeType==2) addStr=resp.data.freeNum+'秒';

                        layer.open({
                            content:'此视频需支付<span class="important">' + resp.data.videoInfo.gold + '</span>金币，您金币不足，请充值后观看或先试看('+addStr+')。剩余金币<span class="important">'+resp.data.memberInfo.money+'</span>个。',
                            btn:['充值','试看'],
                            yes:function () {
                                //充值
                                location.href="/system_pay";
                            },
                            no:function () {
                                //试看
                                createPlayer(resp.data,true);
                            }
                        });
                    }else{
                        //试看次数用完
                        layer.open({
                            content:'此视频需支付<span class="important">' + resp.data.videoInfo.gold + '</span>金币，您金币不足，且试看用完，请充值后观看。剩余金币<span class="important">'+resp.data.memberInfo.money+'</span>个，剩余试看<span class="important">'+resp.data.freeNum+'</span>部。',
                            btn: ['充值'],
                            yes:function () {
                                //充值
                                location.href="/system_pay";
                            }
                        });
                    }
                    break;
                case 4:
                    if((resp.data.freeType==1 && resp.data.freeNum>0)||resp.data.freeType==2) {
                        if(resp.data.freeType==1 && resp.data.freeNum>0) addStr='剩余试看<span class="important">'+resp.data.freeNum+'</span>部。';
                        if(resp.data.freeType==2) addStr='可试看<span class="important">'+resp.data.freeNum+'秒</span>。';

                        layer.open({
                            content:'此视频为收费视频，游客'+addStr,
                            btn: ['登陆', '试看'],
                            yes:function () {
                                location.href=loginPageUrl;
                            },
                            no:function () {
                                createPlayer(resp.data,true);
                                //layer.msg('祝您试看愉快',{icon:1,time:700});
                            }
                        });
                    }else{
                        layer.open({
                            content:'此视频为收费视频，试看次数已用完，请您登陆后观看。',
                            btn: ['登陆', '关闭'],
                            shade: 0.4,
                            anim:'up',
                            yes: function(index){
                                location.href=loginPageUrl;
                            },
                            no:function(index){
                                layer.closeAll();
                            }
                        });
                    }
                    break;
            }
        }else{
            layer('请求播放数据失败,请稍候重试',{icon:2,time:2000});
        }
    },
    error:function(){
        alert('请求异常，请稍候重试！');
    }
    });
    return true;
}
