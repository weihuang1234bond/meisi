var swfobject=function(){function e(){if(!H){try{var e=x.getElementsByTagName("body")[0].appendChild(h("span"));e.parentNode.removeChild(e)}catch(a){return}H=!0;for(var t=P.length,n=0;n<t;n++)P[n]()}}function t(e){H?e():P[P.length]=e}function n(e){if(typeof $.addEventListener!=L)$.addEventListener("load",e,!1);else if(typeof x.addEventListener!=L)x.addEventListener("load",e,!1);else if(typeof $.attachEvent!=L)m($,"onload",e);else if("function"==typeof $.onload){var t=$.onload;$.onload=function(){t(),e()}}else $.onload=e}function a(){V?i():r()}function i(){var e=x.getElementsByTagName("body")[0],t=h(k);t.setAttribute("type",B);var n=e.appendChild(t);if(n){var a=0;!function(){if(typeof n.GetVariable!=L){var i=n.GetVariable("$version");i&&(i=i.split(" ")[1].split(","),U.pv=[parseInt(i[0],10),parseInt(i[1],10),parseInt(i[2],10)])}else if(a<10)return a++,void setTimeout(arguments.callee,10);e.removeChild(t),n=null,r()}()}else r()}function r(){var e=R.length;if(e>0)for(var t=0;t<e;t++){var n=R[t].id,a=R[t].callbackFn,i={success:!1,id:n};if(U.pv[0]>0){var r=y(n);if(r)if(!w(R[t].swfVersion)||U.wk&&U.wk<312)if(R[t].expressInstall&&l()){var f={};f.data=R[t].expressInstall,f.width=r.getAttribute("width")||"0",f.height=r.getAttribute("height")||"0",r.getAttribute("class")&&(f.styleclass=r.getAttribute("class")),r.getAttribute("align")&&(f.align=r.getAttribute("align"));for(var d={},u=r.getElementsByTagName("param"),p=u.length,v=0;v<p;v++)"movie"!=u[v].getAttribute("name").toLowerCase()&&(d[u[v].getAttribute("name")]=u[v].getAttribute("value"));s(f,d,n,a)}else c(r),a&&a(i);else b(n,!0),a&&(i.success=!0,i.ref=o(n),a(i))}else if(b(n,!0),a){var h=o(n);h&&typeof h.SetVariable!=L&&(i.success=!0,i.ref=h),a(i)}}}function o(e){var t=null,n=y(e);if(n&&"OBJECT"==n.nodeName)if(typeof n.SetVariable!=L)t=n;else{var a=n.getElementsByTagName(k)[0];a&&(t=a)}return t}function l(){return!G&&w("6.0.65")&&(U.win||U.mac)&&!(U.wk&&U.wk<312)}function s(e,t,n,a){G=!0,A=a||null,N={success:!1,id:n};var i=y(n);if(i){"OBJECT"==i.nodeName?(E=f(i),S=null):(E=i,S=n),e.id=O,(typeof e.width==L||!/%$/.test(e.width)&&parseInt(e.width,10)<310)&&(e.width="310"),(typeof e.height==L||!/%$/.test(e.height)&&parseInt(e.height,10)<137)&&(e.height="137"),x.title=x.title.slice(0,47)+" - Flash Player Installation";var r=U.ie&&U.win?"ActiveX":"PlugIn",o="MMredirectURL="+$.location.toString().replace(/&/g,"%26")+"&MMplayerType="+r+"&MMdoctitle="+x.title;if(typeof t.flashvars!=L?t.flashvars+="&"+o:t.flashvars=o,U.ie&&U.win&&4!=i.readyState){var l=h("div");n+="SWFObjectNew",l.setAttribute("id",n),i.parentNode.insertBefore(l,i),i.style.display="none",function(){4==i.readyState?i.parentNode.removeChild(i):setTimeout(arguments.callee,10)}()}d(e,t,n)}}function c(e){if(U.ie&&U.win&&4!=e.readyState){var t=h("div");e.parentNode.insertBefore(t,e),t.parentNode.replaceChild(f(e),t),e.style.display="none",function(){4==e.readyState?e.parentNode.removeChild(e):setTimeout(arguments.callee,10)}()}else e.parentNode.replaceChild(f(e),e)}function f(e){var t=h("div");if(U.win&&U.ie)t.innerHTML=e.innerHTML;else{var n=e.getElementsByTagName(k)[0];if(n){var a=n.childNodes;if(a)for(var i=a.length,r=0;r<i;r++)1==a[r].nodeType&&"PARAM"==a[r].nodeName||8==a[r].nodeType||t.appendChild(a[r].cloneNode(!0))}}return t}function d(e,t,n){var a,i=y(n);if(U.wk&&U.wk<312)return a;if(i)if(typeof e.id==L&&(e.id=n),U.ie&&U.win){var r="";for(var o in e)e[o]!=Object.prototype[o]&&("data"==o.toLowerCase()?t.movie=e[o]:"styleclass"==o.toLowerCase()?r+=' class="'+e[o]+'"':"classid"!=o.toLowerCase()&&(r+=" "+o+'="'+e[o]+'"'));var l="";for(var s in t)t[s]!=Object.prototype[s]&&(l+='<param name="'+s+'" value="'+t[s]+'" />');i.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'+r+">"+l+"</object>",D[D.length]=e.id,a=y(e.id)}else{var c=h(k);c.setAttribute("type",B);for(var f in e)e[f]!=Object.prototype[f]&&("styleclass"==f.toLowerCase()?c.setAttribute("class",e[f]):"classid"!=f.toLowerCase()&&c.setAttribute(f,e[f]));for(var d in t)t[d]!=Object.prototype[d]&&"movie"!=d.toLowerCase()&&u(c,d,t[d]);i.parentNode.replaceChild(c,i),a=c}return a}function u(e,t,n){var a=h("param");a.setAttribute("name",t),a.setAttribute("value",n),e.appendChild(a)}function p(e){var t=y(e);t&&"OBJECT"==t.nodeName&&(U.ie&&U.win?(t.style.display="none",function(){4==t.readyState?v(e):setTimeout(arguments.callee,10)}()):t.parentNode.removeChild(t))}function v(e){var t=y(e);if(t){for(var n in t)"function"==typeof t[n]&&(t[n]=null);t.parentNode.removeChild(t)}}function y(e){var t=null;try{t=x.getElementById(e)}catch(n){}return t}function h(e){return x.createElement(e)}function m(e,t,n){e.attachEvent(t,n),W[W.length]=[e,t,n]}function w(e){var t=U.pv,n=e.split(".");return n[0]=parseInt(n[0],10),n[1]=parseInt(n[1],10)||0,n[2]=parseInt(n[2],10)||0,t[0]>n[0]||t[0]==n[0]&&t[1]>n[1]||t[0]==n[0]&&t[1]==n[1]&&t[2]>=n[2]}function g(e,t,n,a){if(!U.ie||!U.mac){var i=x.getElementsByTagName("head")[0];if(i){var r=n&&"string"==typeof n?n:"screen";if(a&&(T=null,I=null),!T||I!=r){var o=h("style");o.setAttribute("type","text/css"),o.setAttribute("media",r),T=i.appendChild(o),U.ie&&U.win&&typeof x.styleSheets!=L&&x.styleSheets.length>0&&(T=x.styleSheets[x.styleSheets.length-1]),I=r}U.ie&&U.win?T&&typeof T.addRule==k&&T.addRule(e,t):T&&typeof x.createTextNode!=L&&T.appendChild(x.createTextNode(e+" {"+t+"}"))}}}function b(e,t){if(J){var n=t?"visible":"hidden";H&&y(e)?y(e).style.visibility=n:g("#"+e,"visibility:"+n)}}function C(e){return null!=/[\\\"<>\.;]/.exec(e)&&typeof encodeURIComponent!=L?encodeURIComponent(e):e}var E,S,A,N,T,I,L="undefined",k="object",j="Shockwave Flash",B="application/x-shockwave-flash",O="SWFObjectExprInst",F="onreadystatechange",$=window,x=document,M=navigator,V=!1,P=[a],R=[],D=[],W=[],H=!1,G=!1,J=!0,U=function(){var e=typeof x.getElementById!=L&&typeof x.getElementsByTagName!=L&&typeof x.createElement!=L,t=M.userAgent.toLowerCase(),n=M.platform.toLowerCase(),a=/win/.test(n?n:t),i=/mac/.test(n?n:t),r=!!/webkit/.test(t)&&parseFloat(t.replace(/^.*webkit\/(\d+(\.\d+)?).*$/,"$1")),o=!1,l=[0,0,0],s=null;if(typeof M.plugins!=L&&typeof M.plugins[j]==k)!(s=M.plugins[j].description)||typeof M.mimeTypes!=L&&M.mimeTypes[B]&&!M.mimeTypes[B].enabledPlugin||(V=!0,o=!1,s=s.replace(/^.*\s+(\S+\s+\S+$)/,"$1"),l[0]=parseInt(s.replace(/^(.*)\..*$/,"$1"),10),l[1]=parseInt(s.replace(/^.*\.(.*)\s.*$/,"$1"),10),l[2]=/[a-zA-Z]/.test(s)?parseInt(s.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0);else if(typeof $.ActiveXObject!=L)try{var c=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");c&&(s=c.GetVariable("$version"))&&(o=!0,s=s.split(" ")[1].split(","),l=[parseInt(s[0],10),parseInt(s[1],10),parseInt(s[2],10)])}catch(f){}return{w3:e,pv:l,wk:r,ie:o,win:a,mac:i}}();(function(){U.w3&&((typeof x.readyState!=L&&"complete"==x.readyState||typeof x.readyState==L&&(x.getElementsByTagName("body")[0]||x.body))&&e(),H||(typeof x.addEventListener!=L&&x.addEventListener("DOMContentLoaded",e,!1),U.ie&&U.win&&(x.attachEvent(F,function(){"complete"==x.readyState&&(x.detachEvent(F,arguments.callee),e())}),$==top&&function(){if(!H){try{x.documentElement.doScroll("left")}catch(t){return void setTimeout(arguments.callee,0)}e()}}()),U.wk&&function(){if(!H)/loaded|complete/.test(x.readyState)?e():setTimeout(arguments.callee,0)}(),n(e)))})(),function(){U.ie&&U.win&&window.attachEvent("onunload",function(){for(var e=W.length,t=0;t<e;t++)W[t][0].detachEvent(W[t][1],W[t][2]);for(var n=D.length,a=0;a<n;a++)p(D[a]);for(var i in U)U[i]=null;U=null;for(var r in swfobject)swfobject[r]=null;swfobject=null})}();return{registerObject:function(e,t,n,a){if(U.w3&&e&&t){var i={};i.id=e,i.swfVersion=t,i.expressInstall=n,i.callbackFn=a,R[R.length]=i,b(e,!1)}else a&&a({success:!1,id:e})},getObjectById:function(e){if(U.w3)return o(e)},embedSWF:function(e,n,a,i,r,o,c,f,u,p){var v={success:!1,id:n};U.w3&&!(U.wk&&U.wk<312)&&e&&n&&a&&i&&r?(b(n,!1),t(function(){a+="",i+="";var t={};if(u&&typeof u===k)for(var y in u)t[y]=u[y];t.data=e,t.width=a,t.height=i;var h={};if(f&&typeof f===k)for(var m in f)h[m]=f[m];if(c&&typeof c===k)for(var g in c)typeof h.flashvars!=L?h.flashvars+="&"+g+"="+c[g]:h.flashvars=g+"="+c[g];if(w(r)){var C=d(t,h,n);t.id==n&&b(n,!0),v.success=!0,v.ref=C}else{if(o&&l())return t.data=o,void s(t,h,n,p);b(n,!0)}p&&p(v)})):p&&p(v)},switchOffAutoHideShow:function(){J=!1},ua:U,getFlashPlayerVersion:function(){return{major:U.pv[0],minor:U.pv[1],release:U.pv[2]}},hasFlashPlayerVersion:w,createSWF:function(e,t,n){return U.w3?d(e,t,n):undefined},showExpressInstall:function(e,t,n,a){U.w3&&l()&&s(e,t,n,a)},removeSWF:function(e){U.w3&&p(e)},createCSS:function(e,t,n,a){U.w3&&g(e,t,n,a)},addDomLoadEvent:t,addLoadEvent:n,getQueryParamValue:function(e){var t=x.location.search||x.location.hash;if(t){if(/\?/.test(t)&&(t=t.split("?")[1]),null==e)return C(t);for(var n=t.split("&"),a=0;a<n.length;a++)if(n[a].substring(0,n[a].indexOf("="))==e)return C(n[a].substring(n[a].indexOf("=")+1))}return""},expressInstallCallback:function(){if(G){var e=y(O);e&&E&&(e.parentNode.replaceChild(E,e),S&&(b(S,!0),U.ie&&U.win&&(E.style.display="block")),A&&A(N)),G=!1}}}}();