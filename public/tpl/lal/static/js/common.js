(function(e) {
var t = !0,
n, r = {
init: function() {
this.eventManager(),
this.userInit(),
this.search(),
this.userPopUps(),
this.taskRemind()
},
userInit: function() {
var t = this,
n = e("#userLogin1"),
r = e("#userReg1"),
i = e("#userOut");
QHPass.init("pcw_guard_tv"),
QHPass.setConfig("signIn.types", ["quick", "normal", "mobile", "qrcode"]),
t.getUserInfo(),
n.on("click",
function(e) {
e.preventDefault(),
t.signIn()
}),
r.on("click",
function(e) {
e.preventDefault(),
t.signUp()
}),
i.on("click",
function(e) {
e.preventDefault(),
t.signOut()
}),
e(".nav-follow a,.nav-follow-btn").on("click",
function(n) {
n.preventDefault();
var r = e(this).attr("href");
QHPass.getUserInfo(function(e) {
window.location.href = r
},
function(e) {
t.signIn()
})
})
},
getUserInfo: function() {
var e = this,
t = !0,
n, r = 6e5;
Cookie.get("login1PopStatus") === undefined && Cookie.set("login1PopStatus", "1", {
expires: 864e5
}),
QHPass.getUserInfo(function(t) {
e.userLogin(t),
clearInterval(n)
},
function(e) {
Cookie.get("login1PopStatus") === "1" && t && (n = setInterval(function() {
QHPass.signIn(function() {
window.location.href = window.location.href
}),
clearInterval(n),
Cookie.set("login1PopStatus", "0", {
expires: 864e5
}),
t = !1
},
r))
})
},
userrLogin: function(t) {
var r = e(".login1"),
i = e(".login1-box"),
s = e(".user-info"),
o = e(".user-img"),
u = e(".user-name");
t.nickname ? n = t.nickname: n = t.username,
i.hide(),
o.html('<a href="/user"><img src="' + t.img_url + '"/></a>'),
u.html('<a href="/user">' + n + "</a>"),
s.show()
},
signIn: function() {
var e = this;
QHPass.getUserInfo(function(e) {},
function() {
QHPass.signIn(function() {
window.location.href = window.location.href
})
})
},
signUp: function() {
var e = this;
QHPass.signUp(function(e) {
window.location.href = window.location.href
})
},
signOut: function() {
var t = e(".login1"),
n = e(".login1-box"),
r = e(".user-info"),
i = e(".user-img"),
s = e(".user-name");
r.hide(),
n.show(),
i.html(""),
s.html(""),
QHPass.signOut(function() {
window.location.href = window.location.href,
Cookie.set("login1PopStatus", "1", {
expires: 864e5
})
})
},
userPopUps: function() {
var t = this,
r = e(".user-pop-grade"),
i = e(".user-pop-task"),
s = e(".user-pop-loadimg"),
o = !0;
e(".user-info").on("mouseenter",
function() {
var t = e(".user-info").width() - 62,
u = e(".user-pop").width() + 15 - e(".user-info").width();
e(".user-pop").css("left", t),
e(".user-pop-arr").css("left", u),
e(".user-pop").fadeIn(300),
o && e.ajax({
url: "/user/detailInfo",
type: "GET"
}).done(function(e) {
if (e.errno == 0) {
o = !1;
var e = e.data,
t = e.experience,
u = e.tasks,
a = Number(t.current_score / t.upgrade_score * 100).toFixed(2) + "%";
e.is_checkin == 0 ? checkin = '<div class="btn-pop-signin">今日签到</div>': e.is_checkin == 1 && (checkin = '<div class="btn-pop-signin btn-pop-signin-off">已签到</div>');
var f = [],
l = '<div class="user-pop-header"><img src="' + e.head_img + '" alt="">' + "</div><!--end user-pop-header-->" + '<div class="user-pop-detail">' + checkin + '<div class="name">' + "<p>" + n + "</p>" + '<div class="user-pop-level">' + "<i>V</i>" + '<span class="user-current-level">' + t.current_level + "</span>" + "</div>" + "</div><!--end name-->" + "</div><!--end user-pop-detail-->" + '<div class="level">' + '<div class="cur-level">' + '<i class="icon icon-pop-level"></i><span><b class="user-current-level">' + t.current_level + "</b>级</span>" + "</div>" + '<div class="level-bar">' + '<span class="user-bar-width" style="width:' + a + ';"><em><b class="user-current-score">' + t.current_score + '</b>/<b class="user-upgrade-score">' + t.upgrade_score + "</b></em></span>" + "</div>" + '<div class="next-level">' + '<i class="icon icon-pop-level"></i><span><b class="user-upgrade-level">' + t.upgrade_level + "</b>级</span>" + "</div>" + "</div><!--end level-->";
for (var c = 0; c < u.length; c++) {
var h = u[c];
if (h.degree.amount == h.degree.finished && h.degree.received == 0) var p = '<a href="#" data-task="' + h.task + '" data-tasknum="' + h.score + '" class="user-task-btn">领取</a>';
else if (h.degree.amount == h.degree.finished && h.degree.received == 1) var p = '<i class="icon icon-complete"></i><p>已领取</p>';
else if (h.degree.amount != h.degree.finished) var p = '<i class="icon icon-disbale"></i><p>' + h.degree.finished + "/" + h.degree.amount + "</p>";
f.push('<li><div class="pic"><i class="icon"><img src="' + h.icon + '"></i>' + "</div>" + '<div class="info">' + "<p>" + h.name + "</p>" + "<span>(+" + h.score + "个积分)</span>" + "</div>" + '<div class="status task-status-' + h.task + '">' + p + "</div>" + "</li>")
}
r.html(l),
i.find("ul").html(f),
s.hide(),
r.show(),
i.show()
}
})
}),
e(".user-info").on("mouseleave",
function() {
e(".user-pop").fadeOut(300),
clearTimeout(t);
var t = setTimeout(function() {
o = !0
},
1e3)
}),
i.on("click", ".user-task-btn",
function(t) {
t.preventDefault();
var n = e(this),
r = n.data("task"),
i = n.data("tasknum"),
s = e(".user-current-level"),
o = e(".user-upgrade-level"),
u = e(".user-current-score"),
a = e(".user-upgrade-score"),
f = e(".user-bar-width"),
l = '<span style="position:absolute; width:46px; text-align:center; height:25px; line-height:25px; font-size:12px; top:0;left: 50%; margin-left:-23px; color:#ff374c;"></span>';
e.ajax({
url: "/user/dailyReward",
type: "POST",
data: {
task: r
}
}).done(function(t) {
if (t.errno == 0) {
var t = t.data,
c = Number(t.current_score / t.upgrade_score * 100).toFixed(2);
n.append(l),
n.find("span").is(":animated") && n.find("span").stop(!0, !0),
n.find("span").html("+" + i).fadeIn().animate({
top: -25,
"font-size": 14
},
300,
function() {
n.find("span").fadeOut(),
clearTimeout(n.timer),
n.timer = setTimeout(function() {
n.find("span").remove(),
e(".task-status-" + r).html('<i class="icon icon-complete"></i><p>已领取</p>')
},
500)
}),
s.text(t.current_level),
o.text(t.upgrade_level),
u.text(t.current_score),
a.text(t.upgrade_score),
f.css("width", c + "%")
}
})
}),
r.on("click", ".btn-pop-signin",
function(t) {
t.preventDefault();
var n = e(this),
r = e(".task-status-checkin");
n.hasClass("btn-pop-signin-off") || e.ajax({
url: "/user/checkin",
type: "POST"
}).done(function(t) {
t.errno == 0 && (n.addClass("btn-pop-signin-off").text("已签到"), e(".btn-signin").length > 0 && e(".btn-signin").addClass("btn-signin-off").text("已签到"), r.html('<a href="#" data-task="checkin" data-tasknum="20" class="user-task-btn">领取</a>'))
})
})
},
eventManager: function() {
var n = this;
e(".nav-more").hover(function() {
e(this).hasClass("nav-follow") && t && n.navFollow(),
e(this).addClass("nav-more-cur"),
e(this).find(".nav-pop").fadeIn(300)
},
function() {
e(this).removeClass("nav-more-cur"),
e(this).find(".nav-pop").fadeOut(300)
})
},
navFollow: function() {
var n = e(".nav-follow"),
r = n.find(".nav-follow-list"),
i = n.find(".nav-follow-none"),
s = n.find(".nav-follow-login1"),
o = "/user1/myfollows";
e.ajax({
url: o,
type: "GET"
}).done(function(e) {
function l() {
t = !1,
setTimeout(function() {
t = !0
},
5e3)
}
if (e.errno == 0) {
var n = [],
e = e.data.follow,
o = e.length > 3 ? 3 : e.length;
l();
if (e.length > 0) {
for (var u = 0; u < o; u++) {
var a = e[u],
f = a.status == 1 ? '<span class="tag"><i></i>直播中</span>': "";
n.push("<li>" + f + '<div class="nav-host-header">' + '<a href="' + a.clicktk + '" data-url="http://tv.360.cn' + a.clicktk + '"><img src="' + a.head_img + '"></a>' + "</div>" + '<div class="nav-host-concerned">' + "<p>" + a.follow_num + "</p>" + "</div>" + '<div class="nav-host-info">' + '<a href="' + a.clicktk + '" data-url="http://tv.360.cn' + a.clicktk + '">' + '<p class="nav-host-name">' + a.name + "</p>" + "<p>" + a.title + "</p>" + "</a>" + "</div>" + "</li>")
}
r.find("ul").html(n)
} else r.hide(),
i.show()
} else e.errno == 1 && (l(), r.hide(), s.show())
})
},
search: function() {
function v() {
a.hasClass("hotShow") ? a.show() : e.ajax({
url: c,
type: "GET"
}).done(function(e) {
if (e.errno == 0) {
var t = [],
e = e.data;
for (var n = 0; n < e.length; n++) {
var r = n < 3 ? '<em class="hot">' + (n + 1) + "</em>": "<em>" + (n + 1) + "</em>",
i = "/search?kw=" + e[n];
t.push('<a href="' + i + '" class="hd-search-items" data-items="' + e[n] + '">' + r + "<span>" + e[n] + "</span></a>")
}
a.append(t),
a.show(),
a.addClass("hotShow")
}
})
}
function m(t) {
e.ajax({
url: c,
type: "GET",
data: {
kw: t
}
}).done(function(e) {
var t = [],
e = e.data;
if (e.length > 0) {
for (var n = 0; n < e.length; n++) {
var r = "/search?kw=" + e[n];
t.push('<a href="' + r + '" class="hd-search-items" data-items="' + e[n] + '">' + e[n] + "</a>")
}
s.show(),
f.html(t),
f.show(),
a.hide(),
o.hide()
} else s.hide()
})
}
function g(e) {
if (!window.localStorage) return;
if (localStorage.searchHistory) {
str = localStorage.searchHistory;
var t = str.split(",");
for (var n = 0; n < t.length; n++) t[n] == e && t.splice(n, 1);
t.unshift(e),
t.length >= 6 && t.pop(),
localStorage.setItem("searchHistory", t.toString())
} else {
var t = [];
t.push(e),
localStorage.setItem("searchHistory", t.toString())
}
}
function y() {
var e = localStorage.searchHistory;
if (!window.localStorage || e == undefined) {
o.hide();
return
}
if (e.length <= 0) {
localStorage.removeItem("searchHistory");
return
}
var t = e.split(","),
n = [];
if (t.length > 0) {
for (var r = 0; r < t.length; r++) {
var i = /<[^<>]+>/g,
s = t[r].replace(i, ""),
a = "/search?kw=" + s;
n.push('<p><em>x</em><a href="' + a + '" class="hd-search-items" data-items="' + s + '">' + s + "</a></p>")
}
u.html(n),
o.show()
}
}
function b(t) {
e.ajax({
url: "/stat/searchWords",
type: "POST",
data: {
kw: t
}
}).done(function(e) {})
}
var t = this,
n = e(".hd-search-box"),
r = e(".hd-search-input"),
i = e(".hd-search-submit"),
s = e(".hd-search-suggest"),
o = e(".hd-search-history"),
u = e(".hd-search-history-bd"),
a = e(".hd-search-hot"),
f = e(".hd-suggest-common"),
l = e(".hd-search-clear"),
c = "/search/ajaxAutomatedWords",
h = "",
p = location.href;
if (p.indexOf("search") > -1) {
var d = e(".hd-search").data("kw");
d && r.val(d)
}
y(),
r.on("click",
function(e) {
e.stopPropagation();
var t = r.val();
t == "" ? (y(), s.show(), v()) : m(t)
}),
s.on("click",
function(e) {
e.stopPropagation()
}),
e(document).on("click",
function(e) {
s.hide()
}),
r.on("keyup",
function(t) {
t.preventDefault();
var n = e(this).val(),
i = t.which,
o = i >= 37 && 40 >= i || i === 91 || 123 >= i && i >= 112;
i == 13 ? n != "" && (window.open("/search?kw=" + n), g(n), b(n)) : o || (r.val().replace(/(^\s*)|(\s*$)/g, "") == "" ? setTimeout(function() {
y(),
s.show(),
f.hide(),
v()
},
100) : m(n))
}),
i.on("mousedown",
function(e) {
e.preventDefault();
var t = r.val();
t != "" && (window.open("/search?kw=" + t), g(t), b(t), s.hide())
}),
s.on("click", ".hd-search-items",
function() {
var t = e(this).data("items");
r.val(t),
g(t),
s.hide()
}),
u.on("click", "em",
function(t) {
t.preventDefault();
var n = e(this).parent("p"),
r = n.find(".hd-search-items").data("items");
if (localStorage.searchHistory) {
str = localStorage.searchHistory;
var i = str.split(",");
for (var s = 0; s < i.length; s++) i[s] == r && (i.splice(s, 1), n.remove());
u.html() == "" && o.hide(),
localStorage.setItem("searchHistory", i.toString())
}
}),
l.on("click",
function(e) {
e.preventDefault(),
localStorage.removeItem("searchHistory"),
o.hide()
}),
s.on("click", "a",
function() {
var t = e(this).data("items");
t && b(t)
})
},
taskRemind: function() {
function n() {
var n = e(".task-remind"),
r = n.find(".text"),
i = n.find(".close");
e.ajax({
url: "/user/dailyTaskRemind",
type: "POST"
}).done(function(e) {
if (e.errno == 0) {
var e = e.data;
r.find("a").text(e.msg),
r.find("a").attr("href", e.link),
e.code == 1010 ? r.find("a").attr("class", "task-login1") : r.find("a").attr("class", ""),
n.fadeIn()
}
}),
n.on("click", ".task-login1",
function(e) {
e.preventDefault(),
t.signIn(),
n.fadeOut()
}),
n.on("click", "a",
function(e) {
n.fadeOut()
}),
i.on("click",
function(e) {
e.preventDefault(),
n.fadeOut()
})
}
var t = this; (e("#tvHome").length > 0 || e("#tvDetail").length > 0) && setTimeout(function() {
n()
},
5e3)
},
getUrlParam: function(e, t) {
var n = "",
r, i, s; ! t && (t = e, e = location.href),
e.indexOf("#") > -1 && (e = e.split("#")[0]);
if (e.indexOf("?") > -1) {
r = e.split("?")[1].split("&");
for (i = 0; i < r.length; i++) {
s = r[i].split("="),
s[0] = decodeURIComponent(s[0] || "").replace(/^\s+|\s+$/g, "");
if (s[0].toLowerCase() == t.toLowerCase()) {
n = s[1] || "";
break
}
}
}
return n
}
};
r.init()
})(jQuery);