!
function(e) {
function t(i) {
if (n[i]) return n[i].exports;
var r = n[i] = {
exports: {},
id: i,
loaded: !1
};
return e[i].call(r.exports, r, r.exports, t),
r.loaded = !0,
r.exports
}
var n = {};
t.m = e,
t.c = n,
t.p = "",
t(0)
} ([function(e, t, n) { (function(e) {
n(84),
n(88),
n(89),
n(90),
n(91),
n(92),
n(93),
n(94),
n(95),
n(96),
n(98),
n(99),
n(100),
n(101),
n(102),
n(103),
n(104),
n(105),
n(106),
n(107),
n(108),
n(109),
n(110),
n(111),
n(112),
n(113),
n(114),
n(115),
n(116),
n(117),
n(118),
n(119),
n(120),
n(121),
n(122),
n(123),
n(124),
n(125),
n(126),
n(127),
n(128),
n(125),
n(126),
n(129),
n(130),
n(131),
n(132),
n(133),
n(134),
n(135),
n(136),
n(137),
n(138),
function() {
var t = n(139);
e.isString(t) && $("head").append("<style>" + t + "</style>")
} ()
}).call(t, n(1))
},
function(e, t, n) {
e.exports = n(2)
},
function(e, t, n) { (function(t) {
function t(e) {
return this instanceof t ? (this.__value = e, void(this.__chain = !1)) : new t(e)
}
var i = n(3);
e.exports = i.extend(t, i),
n(5),
n(6),
n(7),
n(8),
n(9),
n(11),
n(12),
t.mixin(t, t)
}).call(t, n(1))
},
function(e, t, n) {
function i(e) {
if (null != e) return e.length
}
function r(e, t) {
var n = i(e);
if (n && f.fn(t)) for (var r = 0; r < n && !1 !== t(e[r], r, e); r++);
return e
}
function o(e, t) {
var n = -1;
return r(e,
function(e, i, r) {
if (t(e, i, r)) return n = i,
!1
}),
n
}
function a(e) {
var t = [];
return r(e,
function(e) {
t.push(e)
}),
t
}
function c(e) {
if (e) {
r(h.call(arguments, 1),
function(t) {
p(t,
function(t, n) {
f.undef(t) || (e[n] = t)
})
})
}
return e
}
function s(e) {
return function() {
return ! e.apply(this, arguments)
}
}
function u(e, t) {
return f.string(e) ? e.indexOf(t) : o(e,
function(e) {
return t === e
})
}
function l(e, t, n) {
return r(e,
function(i, r) {
n = t(n, i, r, e)
}),
n
}
function p(e, t) {
if (e) for (var n in e) if (f.owns(e, n) && !1 === t(e[n], n, e)) break;
return e
}
function d(e) {
var t = [];
return p(e,
function(e, n) {
t.push(n)
}),
t
}
var f = n(4),
h = [].slice,
m = t;
m.is = f,
m.extend = m.assign = c,
m.each = r,
m.map = function(e, t) {
var n = [];
return r(e,
function(e, i, r) {
n[i] = t(e, i, r)
}),
n
},
m.filter = function(e, t) {
var n = [];
return r(e,
function(e, i, r) {
t(e, i, r) && n.push(e)
}),
n
},
m.some = function(e, t) {
return - 1 != o(e, t)
},
m.every = function(e, t) {
return - 1 == o(e, s(t))
},
m.reduce = l,
m.findIndex = o,
m.find = function(e, t) {
var n = m.findIndex(e, t);
if ( - 1 != n) return e[n]
},
m.indexOf = u,
m.includes = function(e, t) {
return - 1 != u(e, t)
},
m.toArray = a,
m.slice = function(e, t, n) {
var r = [],
o = i(e);
return o >= 0 && (t = t || 0, 0 !== n && (n = n || o), f.fn(e.slice) || (e = a(e)), r = e.slice(t, n)),
r
},
m.negate = s,
m.forIn = p,
m.keys = d;
var g = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
m.trim = function(e) {
return null == e ? "": ("" + e).replace(g, "")
},
m.noop = function() {},
m.len = i
},
function(e, t) { (function(e) {
function n(e) {
var t = a.toString.call(e);
return t.substring(8, t.length - 1).toLowerCase()
}
function i(e) {
return typeof e
}
function r(e, t) {
return a.hasOwnProperty.call(e, t)
}
var o = t,
a = Object.prototype,
c = e.navigator;
o.browser = function() {
return ! (o.wechatApp() || !c || e.window != e)
},
o.h5 = function() {
return ! (!o.browser() || !c.geolocation)
},
o.mobile = function() {
return ! (!o.browser() || !/mobile/i.test(c.userAgent))
},
o.wechatApp = function() {
return ! ("object" != typeof wx || !wx || !o.fn(wx.createVideoContext))
},
o._class = n,
o._type = i,
o.owns = r,
o.nan = function(e) {
return e !== e
},
o.bool = function(e) {
return "boolean" == n(e)
},
o.infinite = function(e) {
return e == 1 / 0 || e == -1 / 0
},
o.number = function(e) {
return ! isNaN(e) && "number" == n(e)
},
o.iod = function(e) {
return ! (!o.number(e) || o.infinite(e))
},
o.decimal = function(e) {
return !! o.iod(e) && 0 != e % 1
},
o.integer = function(e) {
return !! o.iod(e) && 0 == e % 1
},
o.oof = function(e) {
if (e) {
var t = i(e);
return "object" == t || "function" == t
}
return ! 1
},
o.object = function(e) {
return o.oof(e) && "function" != n(e)
},
o.hash = o.plainObject = function(e) {
return ! (!e || "object" != n(e) || e.nodeType || e.setInterval)
},
o.undef = function(e) {
return "undefined" == i(e)
},
o.fn = function(e) {
return "function" == n(e)
},
o.string = function(e) {
return "string" == n(e)
},
o.nos = function(e) {
return o.iod(e) || o.string(e)
},
o.array = function(e) {
return "array" == n(e)
},
o.arraylike = function(e) {
if (!o.window(e) && o.object(e)) {
var t = e.length;
if (o.integer(t) && t >= 0) return ! 0
}
return ! 1
},
o.window = function(e) {
return ! (!e || e.window != e)
},
o.empty = function(e) {
if (o.string(e) || o.arraylike(e)) return 0 === e.length;
if (o.hash(e)) for (var t in e) if (r(e, t)) return ! 1;
return ! 0
},
o.element = function(e) {
return ! (!e || 1 !== e.nodeType)
},
o.regexp = function(e) {
return "regexp" == n(e)
}
}).call(t,
function() {
return this
} ())
},
function(e, t, n) {
var i = e.exports = n(2),
r = i.is;
i.isString = r.string,
i.isArray = r.array,
i.isArrayLike = r.arraylike,
i.isBoolean = r.bool,
i.isElement = r.element,
i.isEmpty = r.empty,
i.isFunction = r.fn,
i.isInteger = r.integer,
i.isNaN = r.nan,
i.isNumber = r.number,
i.isObject = r.object,
i.isPlainObject = r.plainObject,
i.isRegExp = r.regexp,
i.isString = r.string,
i.isUndefined = r.undef
},
function(e, t, n) {
var i = e.exports = n(2),
r = i.is;
i.now = function() {
return + new Date
},
i.constant = function(e) {
return function() {
return e
}
},
i.identity = function(e) {
return e
},
i.random = function(e, t) {
return e + Math.floor(Math.random() * (t - e + 1))
},
i.mixin = function(e, t, n) {
var o = i.functions(t);
if (e) if (r.fn(e)) {
n = n || {};
var a = (n.chain, e.prototype);
i.each(o,
function(e) {
var n = t[e];
a[e] = function() {
var e = this,
t = [e.__value];
t.push.apply(t, arguments);
var i = n.apply(e, t);
return e.__chain ? (e.__value = i, e) : i
}
})
} else i.each(o,
function(n) {
e[n] = t[n]
});
return e
},
i.chain = function(e) {
var t = i(e);
return t.__chain = !0,
t
},
i.value = function() {
return this.__chain = !1,
this.__value
}
},
function(e, t, n) {
function i(e, t) {
var n = [],
i = r.len(t);
if (i) for (t = t.sort(function(e, t) {
return e - t
}); i--;) {
var o = t[i];
n.push(s.splice.call(e, o, 1)[0])
}
return n.reverse(),
n
}
var r = e.exports = n(2),
o = r.forEach = r.each,
a = r.includes,
c = r.is,
s = Array.prototype;
r.reject = function(e, t) {
return r.filter(e,
function(e, n, i) {
return ! t(e, n, i)
})
},
r.without = function(e) {
var t = r.slice(arguments, 1);
return r.difference(e, t)
},
r.difference = function(e, t) {
var n = [];
return r.each(e,
function(e) {
a(t, e) || n.push(e)
}),
n
},
r.pluck = function(e, t) {
return r.map(e,
function(e) {
if (e) return e[t]
})
},
r.nth = function(e, t) {
t = t || 0;
return r.isString(e) ? e.charAt(t) : e[t]
},
r.first = function(e) {
if (e) return r.nth(e, 0)
},
r.last = function(e) {
var t = r.len(e);
if (t) return r.nth(e, t - 1)
},
r.asyncMap = function(e, t, n) {
var i, r, a = [],
c = 0;
o(e,
function(o, s) {
r = !0,
t(o,
function(t, r) {
if (!i) {
if (c++, t) return i = !0,
n(t);
a[s] = r,
c == e.length && (i = !0, n(null, a))
}
})
}),
r || n(null)
},
r.uniq = function(e) {
return r.uniqBy(e)
},
r.uniqBy = function(e, t) {
var n = [],
i = [];
return c.fn(t) || (t = null),
o(e,
function(e) {
var r = e;
t && (r = t(e)),
a(i, r) || (i.push(r), n.push(e))
}),
n
},
r.flatten = function(e) {
var t = [];
return o(e,
function(e) {
c.arraylike(e) ? o(e,
function(e) {
t.push(e)
}) : t.push(e)
}),
t
},
r.union = function() {
return r.uniq(r.flatten(arguments))
},
r.sample = function(e, t) {
for (var n = r.toArray(e), i = n.length, o = Math.min(t || 1, i), a = 0; a < i; a++) {
var c = r.random(a, i - 1),
s = n[c];
n[c] = n[a],
n[a] = s
}
return n.length = o,
null == t ? n[0] : n
},
r.shuffle = function(e) {
return r.sample(e, 1 / 0)
},
r.compact = function(e) {
return r.filter(e, r.identity)
},
r.rest = function(e) {
return r.slice(e, 1)
},
r.invoke = function() {
var e = arguments,
t = e[0],
n = e[1],
i = c.fn(n);
return e = r.slice(e, 2),
r.map(t,
function(t) {
if (i) return n.apply(t, e);
if (null != t) {
var r = t[n];
if (c.fn(r)) return r.apply(t, e)
}
})
},
r.partition = function(e, t) {
var n = r.groupBy(e,
function(e, n, i) {
return t(e, n, i) ? 1 : 2
});
return [n[1] || [], n[2] || []]
},
r.groupBy = function(e, t) {
var n = {};
return r.each(e,
function(e, i, r) {
var o = t(e, i, r);
n[o] = n[o] || [],
n[o].push(e)
}),
n
},
r.range = function() {
var e = arguments;
if (e.length < 2) return r.range(e[1], e[0]);
var t = e[0] || 0,
n = e[1] || 0,
i = e[2];
c.number(i) || (i = 1);
var o = n - t;
0 != i && (o /= i);
for (var a = [], s = t, u = 0; u < o; u++) a.push(s),
s += i;
return a
},
r.pullAt = function(e) {
return i(e, r.slice(arguments, 1))
},
r.remove = function(e, t) {
for (var n = r.len(e) || 0, o = []; n--;) t(e[n], n, e) && o.push(n);
return i(e, o)
},
r.fill = function(e, t, n) {},
r.size = function(e) {
var t = 0;
if (e) {
var n = e.length;
r.isInteger(n) && n >= 0 ? t = n: r.isObject(e) && (t = r.keys(e).length)
}
return t
}
},
function(e, t, n) {
function i(e) {
if (o.array(e)) return e;
var t = [];
return r.toString(e).replace(c,
function(e, n, i, r) {
var o = n || e;
i && (o = r.replace(s, "$1")),
t.push(o)
}),
t
}
var r = e.exports = n(2),
o = r.is,
a = (r.each, r.forIn);
r.only = function(e, t) {
return e = e || {},
o.string(t) && (t = t.split(/ +/)),
r.reduce(t,
function(t, n) {
return null != e[n] && (t[n] = e[n]),
t
},
{})
},
r.values = function(e) {
return r.map(r.keys(e),
function(t) {
return e[t]
})
},
r.pick = function(e, t) {
if (!o.fn(t)) return r.pick(e,
function(e, n) {
return n == t
});
var n = {};
return a(e,
function(e, i, r) {
t(e, i, r) && (n[i] = e)
}),
n
},
r.functions = function(e) {
return r.keys(r.pick(e,
function(e) {
return o.fn(e)
}))
},
r.mapKeys = function(e, t) {
var n = {};
return a(e,
function(e, i, r) {
var o = t(e, i, r);
n[o] = e
}),
n
},
r.mapObject = r.mapValues = function(e, t) {
var n = {};
return a(e,
function(e, i, r) {
n[i] = t(e, i, r)
}),
n
},
r.get = function(e, t) {
if (t = i(t), t.length) {
if (r.every(t,
function(t) {
if (null != e) return e = e[t],
!0
})) return e
}
},
r.has = function(e, t) {
if (t = i(t), t.length) {
if (r.every(t,
function(t) {
if (null != e && o.owns(e, t)) return e = e[t],
!0
})) return ! 0
}
return ! 1
},
r.set = function(e, t, n) {
t = i(t);
var a = e;
return r.every(t,
function(e, i) {
if (o.oof(a)) {
if (i + 1 != t.length) {
var r = a[e];
if (null == r) {
var r = {};~~e == e && (r = [])
}
return a = a[e] = r,
!0
}
a[e] = n
}
}),
e
},
r.create = function() {
function e() {}
return function(t, n) {
return "object" != typeof t && (t = null),
e.prototype = t,
r.extend(new e, n)
}
} (),
r.defaults = function() {
var e = arguments,
t = e[0],
n = r.slice(e, 1);
return t && r.each(n,
function(e) {
r.mapObject(e,
function(e, n) {
o.undef(t[n]) && (t[n] = e)
})
}),
t
},
r.isMatch = function(e, t) {
var n = !0;
return e = e || {},
a(t,
function(t, i) {
if (t !== e[i]) return n = !1,
!1
}),
n
},
r.toPlainObject = function(e) {
var t = {};
return a(e,
function(e, n) {
t[n] = e
}),
t
},
r.invert = function(e) {
var t = {};
return a(e,
function(e, n) {
t[e] = n
}),
t
};
var c = /[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\n\\]|\\.)*?)\2)\]/g,
s = /\\(\\)?/g
},
function(e, t, n) {
function i(e) {
function t() {
var t = arguments,
i = t[0];
if (!n.has(i)) {
var r = e.apply(this, t);
n.set(i, r)
}
return n.get(i)
}
var n = new i.Cache;
return t.cache = n,
t
}
var r = e.exports = n(2),
o = r.is,
a = r.slice;
r.bind = function(e, t) {
if (o.string(t)) {
var n = e;
e = n[t],
t = n
}
if (!o.fn(e)) return e;
var i = a(arguments, 2);
return t = t || this,
function() {
return e.apply(t, r.flatten([i, arguments]))
}
},
r.inherits = function(e, t) {
e.super_ = t,
e.prototype = r.create(t.prototype, {
constructor: e
})
},
r.delay = function(e, t) {
var n = r.slice(arguments, 2);
return setTimeout(function() {
e.apply(this, n)
},
t)
},
r.before = function(e, t) {
return function() {
if (e > 1) return e--,
t.apply(this, arguments)
}
},
r.once = function(e) {
return r.before(2, e)
},
r.after = function(e, t) {
return function() {
return e > 1 ? void e--:t.apply(this, arguments)
}
},
r.throttle = function(e, t, n) {
return t = t || 0,
n = r.extend({
leading: !0,
trailing: !0,
maxWait: t
},
n),
r.debounce(e, t, n)
},
r.debounce = function(e, t, n) {
function i() {
return ! (d - l > t || u && d - p > u)
}
function o(e, t, n) {
return l = r.now(),
e.apply(t, n)
}
function a() {
s && (clearTimeout(s), s = null)
}
function c() {
d = r.now();
var c = i();
p = d;
var u = this,
l = arguments;
a(),
c ? n.trailing && (s = r.delay(function() {
o(e, u, l)
},
t)) : o(e, u, l)
}
t = t || 0,
n = r.extend({
leading: !1,
trailing: !0
},
n);
var s, u = n.maxWait,
l = 0,
p = 0,
d = r.now();
return n.leading || (l = d),
c.cancel = a,
c
},
i.Cache = n(10),
r.memoize = i,
r.wrap = function(e, t) {
return function() {
var n = [e];
return n.push.apply(n, arguments),
t.apply(this, n)
}
},
r.curry = function(e) {
function t(i) {
return function() {
var o = i.concat(r.slice(arguments));
return o.length >= n ? (o.length = n, e.apply(this, o)) : t(o)
}
}
var n = e.length;
return t([])
}
},
function(e, t, n) {
function i() {
this.data = {}
}
var r = n(2),
o = r.is;
e.exports = i;
var a = i.prototype;
a.has = function(e) {
return o.owns(this.data, e)
},
a.get = function(e) {
return this.data[e]
},
a.set = function(e, t) {
this.data[e] = t
},
a["delete"] = function(e) {
delete this.data[e]
}
},
function(e, t, n) {
function i(e, t) {
e = r(e) || " ";
var n = Math.floor(t / e.length) + 1;
return o.repeat(e, n).slice(0, t)
}
function r(e) {
return e || 0 == e ? e + "": ""
}
var o = e.exports = n(2);
o.tostr = o.toString = r;
var a = o.indexOf;
o.split = function(e, t, n) {
return e = r(e),
e.split(t, n)
},
o.capitalize = function(e) {
return e = r(e),
e.charAt(0).toUpperCase() + e.substr(1)
},
o.decapitalize = function(e) {
return e = r(e),
e.charAt(0).toLowerCase() + e.substr(1)
},
o.camelCase = function(e) {
e = r(e);
var t = e.split(/[^\w]|_+/);
return t = o.map(t,
function(e) {
return o.capitalize(e)
}),
o.decapitalize(t.join(""))
},
o.startsWith = function(e, t) {
return 0 == a(e, t)
},
o.endsWith = function(e, t) {
return (t += "") == o.slice(e, o.len(e) - o.len(t))
},
o.lower = function(e) {
return r(e).toLowerCase()
},
o.upper = function(e) {
return r(e).toUpperCase()
},
o.repeat = function(e, t) {
return o.map(o.range(t),
function() {
return e
}).join("")
},
o.padStart = function(e, t, n) {
return e = r(e),
t = t || 0,
i(n, t - e.length) + e
},
o.padEnd = function(e, t, n) {
return e = r(e),
t = t || 0,
e + i(n, t - e.length)
};
var c = {
"&": "&amp",
"<": "&lt",
">": "&gt",
'"': "&quot",
"'": "&#39"
};
o.escape = function(e) {
return r(e).replace(/[&<>"']/g,
function(e) {
return c[e] || e
})
},
o.template = function(e) {
function t(e) {
var t = o.first(e);
if ("=" === t || "-" === t) {
var n = o.slice(e, 1);
"-" === t && (n = "_.escape(" + n + ")"),
i.push("ret += " + n)
} else i.push(e)
}
function n(e) {
i.push('ret += "' + e.replace(/('|"|\\)/g, "\\$1").replace(/\r/g, "\\r").replace(/\n/g, "\\n") + '"')
}
var i = ['with(data) {var ret = ""'];
o.each(o.split(e, "<%"),
function(e, i) {
var r = e.split("%>");
return r[1] ? (t(o.trim(r[0])), n(r[1])) : void n(r[0])
}),
i.push("return ret}");
var r = new Function("data", i.join("\n")),
a = {
_: o
};
return function(e) {
return r(o.extend({},
a, e))
}
}
},
function(e, t, n) {
var i = e.exports = n(2);
i.sum = function(e) {
return i.reduce(e,
function(e, t) {
return e + t
},
0)
},
i.max = function(e, t) {
var n = -1,
r = -1 / 0;
return t = t || i.identity,
i.each(e,
function(e, i) { (e = t(e)) > r && (r = e, n = i)
}),
n > -1 ? e[n] : r
},
i.min = function(e, t) {
var n = -1,
r = 1 / 0;
return t = t || i.identity,
i.each(e,
function(e, i) { (e = t(e)) < r && (r = e, n = i)
}),
n > -1 ? e[n] : r
}
},
function(e, t, n) {
var i = n(14);
e.exports = i.getLogger()
},
function(e, t, n) {
function i(e) {
var t = this;
a.string(e) && (e = {
name: e
}),
e = e || {};
var n = e.name || "default";
t.name = n,
t.Level = c,
t.sdk = p,
t.enabled = p.isNameEnabled(n),
t.color = e.color || t.sdk.getRandomColor(n),
t.util = u,
t._ = o,
t.qs = l
}
function r(e) {
var t = p.loggers,
n = t[e];
return n || (n = t[e] = new i(e)),
n
}
var o = n(15),
a = o.is,
c = n(24),
s = n(25),
u = n(33),
l = n(34),
p = new s;
e.exports = i;
var d = o.map(o.keys(c),
function(e) {
return o.lower(e)
}),
f = i.prototype;
f.getLogger = i.getLogger = r,
f.output = function(e, t) {
var n = this,
i = {
level: e,
name: n.name,
enabled: n.enabled,
timestamp: o.now(),
data: t,
color: n.color
};
p.output(i)
},
o.each(d,
function(e) {
var t = c.toCode(e);
f[e] = function() {
this.output(t, arguments)
};
var n = "is" + o.capitalize(e) + "Enabled";
f[n] = function() {
return this.sdk.isLevelEnabled(t)
}
});
var h = "setOptions setOutputer setName setLevel setHistorySize getHistory disableHistory clear save".split(" ");
o.each(h,
function(e) {
f[e] = function() {
return this.sdk[e].apply(this.sdk, arguments)
}
}),
f.getLevelFunction = function(e) {
var t = this,
n = c.toCode(e) || c.DEBUG;
return function() {
t.output(n, arguments)
}
}
},
function(e, t, n) {
e.exports = n(16)
},
function(e, t, n) { (function(t) {
function t(e) {
return this instanceof t ? (this.__value = e, void(this.__chain = !1)) : new t(e)
}
var i = n(3);
e.exports = i.extend(t, i),
n(17),
n(18),
n(19),
n(21),
n(22),
n(23),
t.mixin(t, t)
}).call(t, n(1))
},
function(e, t, n) {
function i(e, t) {
var n = [],
i = r.len(t);
if (i) for (t = t.sort(function(e, t) {
return e - t
}); i--;) {
var o = t[i];
n.push(s.splice.call(e, o, 1)[0])
}
return n.reverse(),
n
}
var r = e.exports = n(16),
o = r.each,
a = r.includes,
c = r.is,
s = Array.prototype;
r.reject = function(e, t) {
return r.filter(e,
function(e, n, i) {
return ! t(e, n, i)
})
},
r.without = function(e) {
var t = r.slice(arguments, 1);
return r.difference(e, t)
},
r.difference = function(e, t) {
var n = [];
return r.each(e,
function(e) {
a(t, e) || n.push(e)
}),
n
},
r.pluck = function(e, t) {
return r.map(e,
function(e) {
if (e) return e[t]
})
},
r.size = function(e) {
var t = r.len(e);
return null == t && (t = r.keys(e).length),
t
},
r.first = function(e) {
if (e) return e[0]
},
r.last = function(e) {
var t = r.len(e);
if (t) return e[t - 1]
},
r.asyncMap = function(e, t, n) {
var i, r, a = [],
c = 0;
o(e,
function(o, s) {
r = !0,
t(o,
function(t, r) {
if (!i) {
if (c++, t) return i = !0,
n(t);
a[s] = r,
c == e.length && (i = !0, n(null, a))
}
})
}),
r || n(null)
},
r.uniq = function(e) {
return r.uniqBy(e)
},
r.uniqBy = function(e, t) {
var n = [],
i = [];
return c.fn(t) || (t = null),
o(e,
function(e) {
var r = e;
t && (r = t(e)),
a(i, r) || (i.push(r), n.push(e))
}),
n
},
r.flatten = function(e) {
var t = [];
return o(e,
function(e) {
c.arraylike(e) ? o(e,
function(e) {
t.push(e)
}) : t.push(e)
}),
t
},
r.union = function() {
return r.uniq(r.flatten(arguments))
},
r.sample = function(e, t) {
for (var n = r.toArray(e), i = n.length, o = Math.min(t || 1, i), a = 0; a < i; a++) {
var c = r.random(a, i - 1),
s = n[c];
n[c] = n[a],
n[a] = s
}
return n.length = o,
null == t ? n[0] : n
},
r.shuffle = function(e) {
return r.sample(e, 1 / 0)
},
r.compact = function(e) {
return r.filter(e, r.identity)
},
r.rest = function(e) {
return r.slice(e, 1)
},
r.invoke = function() {
var e = arguments,
t = e[0],
n = e[1],
i = c.fn(n);
return e = r.slice(e, 2),
r.map(t,
function(t) {
if (i) return n.apply(t, e);
if (null != t) {
var r = t[n];
if (c.fn(r)) return r.apply(t, e)
}
})
},
r.partition = function(e, t) {
var n = r.groupBy(e,
function(e, n, i) {
return t(e, n, i) ? 1 : 2
});
return [n[1] || [], n[2] || []]
},
r.groupBy = function(e, t) {
var n = {};
return r.each(e,
function(e, i, r) {
var o = t(e, i, r);
n[o] = n[o] || [],
n[o].push(e)
}),
n
},
r.range = function() {
var e = arguments;
if (e.length < 2) return r.range(e[1], e[0]);
var t = e[0] || 0,
n = e[1] || 0,
i = e[2];
c.number(i) || (i = 1);
var o = n - t;
0 != i && (o /= i);
for (var a = [], s = t, u = 0; u < o; u++) a.push(s),
s += i;
return a
},
r.pullAt = function(e) {
return i(e, r.slice(arguments, 1))
},
r.remove = function(e, t) {
for (var n = r.len(e) || 0, o = []; n--;) t(e[n], n, e) && o.push(n);
return i(e, o)
},
r.fill = function(e, t, n) {}
},
function(e, t, n) {
function i(e) {
if (o.array(e)) return e;
var t = [];
return r.tostr(e).replace(c,
function(e, n, i, r) {
var o = n || e;
i && (o = r.replace(s, "$1")),
t.push(o)
}),
t
}
var r = e.exports = n(16),
o = r.is,
a = (r.each, r.forIn);
r.only = function(e, t) {
return e = e || {},
o.string(t) && (t = t.split(/ +/)),
r.reduce(t,
function(t, n) {
return null != e[n] && (t[n] = e[n]),
t
},
{})
},
r.values = function(e) {
return r.map(r.keys(e),
function(t) {
return e[t]
})
},
r.pick = function(e, t) {
if (!o.fn(t)) return r.pick(e,
function(e, n) {
return n == t
});
var n = {};
return a(e,
function(e, i, r) {
t(e, i, r) && (n[i] = e)
}),
n
},
r.functions = function(e) {
return r.keys(r.pick(e,
function(e) {
return o.fn(e)
}))
},
r.mapKeys = function(e, t) {
var n = {};
return a(e,
function(e, i, r) {
var o = t(e, i, r);
n[o] = e
}),
n
},
r.mapObject = r.mapValues = function(e, t) {
var n = {};
return a(e,
function(e, i, r) {
n[i] = t(e, i, r)
}),
n
},
r.get = function(e, t) {
if (t = i(t), t.length) {
if (r.every(t,
function(t) {
if (null != e) return e = e[t],
!0
})) return e
}
},
r.has = function(e, t) {
if (t = i(t), t.length) {
if (r.every(t,
function(t) {
if (null != e && o.owns(e, t)) return e = e[t],
!0
})) return ! 0
}
return ! 1
},
r.set = function(e, t, n) {
t = i(t);
var a = e;
return r.every(t,
function(e, i) {
if (o.oof(a)) {
if (i + 1 != t.length) {
var r = a[e];
if (null == r) {
var r = {};~~e == e && (r = [])
}
return a = a[e] = r,
!0
}
a[e] = n
}
}),
e
},
r.create = function() {
function e() {}
return function(t, n) {
return "object" != typeof t && (t = null),
e.prototype = t,
r.extend(new e, n)
}
} (),
r.defaults = function() {
var e = arguments,
t = e[0],
n = r.slice(e, 1);
return t && r.each(n,
function(e) {
r.mapObject(e,
function(e, n) {
o.undef(t[n]) && (t[n] = e)
})
}),
t
},
r.isMatch = function(e, t) {
var n = !0;
return e = e || {},
a(t,
function(t, i) {
if (t !== e[i]) return n = !1,
!1
}),
n
},
r.toPlainObject = function(e) {
var t = {};
return a(e,
function(e, n) {
t[n] = e
}),
t
},
r.invert = function(e) {
var t = {};
return a(e,
function(e, n) {
t[e] = n
}),
t
};
var c = /[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\n\\]|\\.)*?)\2)\]/g,
s = /\\(\\)?/g
},
function(e, t, n) {
function i(e) {
function t() {
var t = arguments,
i = t[0];
if (!n.has(i)) {
var r = e.apply(this, t);
n.set(i, r)
}
return n.get(i)
}
var n = new i.Cache;
return t.cache = n,
t
}
var r = e.exports = n(16),
o = r.is,
a = r.slice;
r.bind = function(e, t) {
if (o.string(t)) {
var n = e;
e = n[t],
t = n
}
if (!o.fn(e)) return e;
var i = a(arguments, 2);
return t = t || this,
function() {
return e.apply(t, r.flatten([i, arguments]))
}
},
r.inherits = function(e, t) {
e.super_ = t,
e.prototype = r.create(t.prototype, {
constructor: e
})
},
r.delay = function(e, t) {
var n = r.slice(arguments, 2);
return setTimeout(function() {
e.apply(this, n)
},
t)
},
r.before = function(e, t) {
return function() {
if (e > 1) return e--,
t.apply(this, arguments)
}
},
r.once = function(e) {
return r.before(2, e)
},
r.after = function(e, t) {
return function() {
return e > 1 ? void e--:t.apply(this, arguments)
}
},
r.throttle = function(e, t, n) {
return t = t || 0,
n = r.extend({
leading: !0,
trailing: !0,
maxWait: t
},
n),
r.debounce(e, t, n)
},
r.debounce = function(e, t, n) {
function i() {
return ! (d - l > t || u && d - p > u)
}
function o(e, t, n) {
return l = r.now(),
e.apply(t, n)
}
function a() {
s && (clearTimeout(s), s = null)
}
function c() {
d = r.now();
var c = i();
p = d;
var u = this,
l = arguments;
a(),
c ? n.trailing && (s = r.delay(function() {
o(e, u, l)
},
t)) : o(e, u, l)
}
t = t || 0,
n = r.extend({
leading: !1,
trailing: !0
},
n);
var s, u = n.maxWait,
l = 0,
p = 0,
d = r.now();
return n.leading || (l = d),
c.cancel = a,
c
},
i.Cache = n(20),
r.memoize = i,
r.wrap = function(e, t) {
return function() {
var n = [e];
return n.push.apply(n, arguments),
t.apply(this, n)
}
},
r.curry = function(e) {
function t(i) {
return function() {
var o = i.concat(r.slice(arguments));
return o.length >= n ? (o.length = n, e.apply(this, o)) : t(o)
}
}
var n = e.length;
return t([])
}
},
function(e, t, n) {
function i() {
this.data = {}
}
var r = n(16),
o = r.is;
e.exports = i;
var a = i.prototype;
a.has = function(e) {
return o.owns(this.data, e)
},
a.get = function(e) {
return this.data[e]
},
a.set = function(e, t) {
this.data[e] = t
},
a["delete"] = function(e) {
delete this.data[e]
}
},
function(e, t, n) {
var i = e.exports = n(16),
r = i.is;
i.now = function() {
return + new Date
},
i.constant = function(e) {
return function() {
return e
}
},
i.identity = function(e) {
return e
},
i.random = function(e, t) {
return e + Math.floor(Math.random() * (t - e + 1))
},
i.mixin = function(e, t, n) {
var o = i.functions(t);
if (e) if (r.fn(e)) {
n = n || {};
var a = (n.chain, e.prototype);
i.each(o,
function(e) {
var n = t[e];
a[e] = function() {
var e = this,
t = [e.__value];
t.push.apply(t, arguments);
var i = n.apply(e, t);
return e.__chain ? (e.__value = i, e) : i
}
})
} else i.each(o,
function(n) {
e[n] = t[n]
});
return e
},
i.chain = function(e) {
var t = i(e);
return t.__chain = !0,
t
},
i.value = function() {
return this.__chain = !1,
this.__value
}
},
function(e, t, n) {
function i(e, t) {
e = o.tostr(e) || " ";
var n = Math.floor(t / e.length) + 1;
return o.repeat(e, n).slice(0, t)
}
function r(e) {
return e || 0 == e ? e + "": ""
}
var o = e.exports = n(16);
o.tostr = r;
var a = o.indexOf;
o.split = function(e, t, n) {
return e = r(e),
e.split(t, n)
},
o.capitalize = function(e) {
return e = r(e),
e.charAt(0).toUpperCase() + e.substr(1)
},
o.decapitalize = function(e) {
return e = r(e),
e.charAt(0).toLowerCase() + e.substr(1)
},
o.camelCase = function(e) {
e = r(e);
var t = e.split(/[^\w]|_+/);
return t = o.map(t,
function(e) {
return o.capitalize(e)
}),
o.decapitalize(t.join(""))
},
o.startsWith = function(e, t) {
return 0 == a(e, t)
},
o.endsWith = function(e, t) {
return (t += "") == o.slice(e, o.len(e) - o.len(t))
},
o.lower = function(e) {
return r(e).toLowerCase()
},
o.upper = function(e) {
return r(e).toUpperCase()
},
o.repeat = function(e, t) {
return o.map(o.range(t),
function() {
return e
}).join("")
},
o.padStart = function(e, t, n) {
return e = o.tostr(e),
t = t || 0,
i(n, t - e.length) + e
},
o.padEnd = function(e, t, n) {
return e = o.tostr(e),
t = t || 0,
e + i(n, t - e.length)
}
},
function(e, t, n) {
var i = e.exports = n(16);
i.sum = function(e) {
return i.reduce(e,
function(e, t) {
return e + t
},
0)
},
i.max = function(e, t) {
var n = -1,
r = -1 / 0;
return t = t || i.identity,
i.each(e,
function(e, i) { (e = t(e)) > r && (r = e, n = i)
}),
n > -1 ? e[n] : r
},
i.min = function(e, t) {
var n = -1,
r = 1 / 0;
return t = t || i.identity,
i.each(e,
function(e, i) { (e = t(e)) < r && (r = e, n = i)
}),
n > -1 ? e[n] : r
}
},
function(e, t, n) {
var i = n(15),
r = "verbose debug log info warn error fatal off".split(" ");
i.each(r,
function(e, n) {
t[i.upper(e)] = n + 1
}),
t.toCode = function(e) {
return t[i.upper(e)] || e
},
t.toName = function(e) {
return i.find(r,
function(n) {
return t[i.upper(n)] === e
})
}
},
function(e, t, n) {
function i() {
var e = this;
e.history = [],
e.Level = o,
e.loggers = {},
e.level = null,
e.prefix = "",
e.pattern = {},
e.lastItem = null,
e.outputers = a,
e.colorMap = {},
e.colors = "lightseagreen forestgreen goldenrod dodgerblue darkorchid crimson".split(" "),
e.colorIndex = 0,
e.historySize = 3e3,
e.setOutputer(u.noop),
e.autoInit()
}
function r(e) {
var t = [],
n = [];
return e && l.string(e) && u.each(e.split(/[\s,]+/),
function(e) {
e = e.replace(/\*/g, ".*?"),
"-" === e.charAt(0) ? t.push(new RegExp("^" + u.slice(e, 1) + "$")) : n.push(new RegExp("^" + e + "$"))
}),
{
skips: t,
names: n
}
}
var o = n(24),
a = n(26),
c = n(28),
s = n(33),
u = n(15),
l = u.is;
e.exports = i;
var p = i.prototype;
p.autoInit = function() {
var e = this,
t = e.getDefaultOptions(),
n = e.getUserOptions(),
i = u.extend({},
t, n);
e.setOptions(i)
},
p.setOptions = function(e) {
var t = this;
t.setName(e.name),
t.setLevel(e.level),
t.setOutputer(e.outputer)
},
p.getDefaultOptions = function() {
var e = this;
return {
level: o.INFO,
outputer: e.autoChooseOutputer(),
name: "*"
}
},
p.getUserOptions = function() {
var e = s.getUserOptions("log_name log_level log_outputer".split(" "));
return {
name: e.log_name,
level: e.log_level,
outputer: e.log_outputer
}
},
p.autoChooseOutputer = function() {
var e = u.noop;
return c.hasConsole() && (e = s.supportBrowserColor() ? "browser_console": "node_console"),
e
},
p.setOutputer = function(e) {
var t = this,
n = null;
l.string(e) ? n = t.outputers[e] : l.fn(e) && (n = {
handler: e
}),
n && (t.outputer = n, l.fn(n.init) && n.init(t))
},
p.output = function(e) {
var t = this;
e.enabled && t.isLevelEnabled(e.level) && (t.outputer.handler(e, t), t.lastItem = e),
t.appendHistory(e)
},
p.isLevelEnabled = function(e) {
return e >= this.level
},
p.getRandomColor = function(e) {
var t = this,
n = t.colorMap[e];
if (!n) {
var i = t.colors;
n = t.colorMap[e] = i[t.colorIndex++%i.length]
}
return n
},
p.setName = function(e) {
return this.setNamePattern(e)
},
p.setNamePattern = function(e) {
var t = this;
t.pattern = r(e),
u.forIn(t.loggers,
function(e) {
e.enabled = t.isNameEnabled(e.name)
})
},
p.isNameEnabled = function(e) {
function t(t) {
return t.test(e)
}
var n = this,
i = n.pattern;
return ! u.some(i.skips, t) && !!u.some(i.names, t)
},
p.setLevel = function(e) {
this.level = o.toCode(e)
},
p.appendHistory = function(e) {
var t = this;
t.history.push(e),
t.history.length > t.historySize && t.history.shift()
},
p.setHistorySize = function(e) {
this.historySize = e
},
p.getHistory = function() {
return this.history
},
p.disableHistory = function() {
this.setHistorySize(0)
},
p.clear = function() {
this.history.length = 0
},
p.save = function() {
var e = this;
return u.map(e.history,
function(e) {
return u.map(e.data,
function(e) {
return s.safeStringify(e)
}).join(" ")
}).join("\r\n")
}
},
function(e, t, n) {
t.console = n(27),
t.browser_console = n(29),
t.node_console = n(30),
t.file = n(31),
t.browser_html = n(32),
t.vconsole = n(35)
},
function(e, t, n) {
var i = n(24),
r = n(28);
t.handler = function(e) {
var t = e.level;
t < i.DEBUG ? t = i.DEBUG: t > i.ERROR && (t = i.ERROR);
var n = i.toName(t);
r.console(n, e.data)
}
},
function(e, t) { (function(e) {
t.hasConsole = function() {
return !! e.console
},
t.console = function(e, t) { (Function.prototype.apply || console[e].apply).call(console[e], console, t)
}
}).call(t,
function() {
return this
} ())
},
function(e, t, n) {
var i = n(15),
r = n(28);
t.handler = function(e, t) {
var n = t.lastItem || {},
o = n.timestamp || e.timestamp,
a = e.timestamp - o,
c = "color:" + e.color,
s = t.prefix + e.name,
u = "%c" + s + "%c",
l = [null, c, "color:inherit"];
i.each(e.data,
function(e) {
l.push(e),
u += " %o"
}),
l.push(c),
u += "%c +" + a + "ms",
l[0] = u,
r.console("log", l)
}
},
function(e, t, n) {
var i = n(28);
t.handler = function(e) {
i.console("log", e.data)
}
},
function(e, t) {},
function(e, t, n) { (function(t) {
function i() {
this.inited = !1,
this.box = null
}
var r = n(15),
o = n(33),
a = i.prototype;
a.init = function(e) {
if (!this.inited) {
this.inited = !0;
var n = t.document;
if (n) {
this.box = n.createElement("div"),
this.box.style.cssText = "z-index:999;padding:16px;height:300px;overflow:auto;line-height:1.4;background:#242424;color:#fff;font:16px Consolas;border:none;text-align:left";
var i = n.body || n.documentElement;
i.insertBefore(this.box, i.firstChild)
}
}
},
a.handler = function(e, n) {
if (t.document) {
var i = n.lastItem || {},
a = i.timestamp || e.timestamp,
c = e.timestamp - a,
s = n.prefix + e.name,
u = [s];
r.each(e.data,
function(e) {
u.push(o.safeStringify(e))
}),
u.push("+" + c + "ms");
var l = document.createElement("div");
o.text(l, u.join(" ")),
l.style.color = e.color,
this.box.appendChild(l)
}
},
e.exports = new i
}).call(t,
function() {
return this
} ())
},
function(e, t, n) { (function(e) {
function i() {
return ! (!l.browser() || !/Trident/i.test(navigator.userAgent))
}
function r() {
return !! l.wechatApp() || !i() && !!l.browser()
}
function o(e, t) {
var n = "textContent";
l.owns(e, n) || (n = "innerText"),
e[n] = t
}
function a(e) {
try {
e = JSON.stringify(e, 0, 4)
} catch(t) {
e += ""
}
return e
}
function c(t) {
var n = [];
if (e.location) {
var i = p.parse(u.slice(location.search, 1));
n.push(i)
}
e.localStorage && n.push(localStorage);
var r = u.get(e, ["process", "env"]);
return r && n.push(r),
u.find(n,
function(e) {
var n;
try {
n = s(e, t)
} catch(i) {
n = null
}
if (n) return n
}) || {}
}
function s(e, t) {
var n = {},
i = !1;
if (u.each(t,
function(t) {
l.owns(e, t) && (i = !0, n[t] = e[t])
}), i) return n
}
var u = n(15),
l = u.is,
p = n(34);
t.isIE = i,
t.supportBrowserColor = r,
t.safeStringify = a,
t.text = o,
t.getUserOptions = c
}).call(t,
function() {
return this
} ())
},
function(e, t, n) {
function i(e, t, n) {
return n = r.find(arguments,
function(e) {
return o.object(e)
}),
e = o.nos(e) ? e: void 0,
t = o.nos(t) ? t: void 0,
n = r.extend({},
a, n, {
sep: e,
eq: t
})
}
var r = n(1),
o = r.is,
a = {
sep: "&",
eq: "=",
encode: encodeURIComponent,
decode: decodeURIComponent,
keepRaw: !1,
sort: null,
ignoreValues: [void 0]
};
t.parse = function(e, t, n, o) {
e += "",
o = i(t, n, o);
var a = o.decode;
return e = e.split(o.sep),
r.reduce(e,
function(e, t) {
if (t = t.split(o.eq), 2 == t.length) {
var n = t[0],
i = t[1];
if (!o.keepRaw) try {
n = a(n),
i = a(i)
} catch(r) {}
e[n] = i
}
return e
},
{})
},
t.stringify = function(e, t, n, a) {
a = i(t, n, a);
var c = r.keys(e),
s = a.sort;
s && (o.fn(s) ? c.sort(s) : c.sort());
var u = a.encode,
l = [];
return r.each(c,
function(t) {
var n = e[t];
r.includes(a.ignoreValues, n) || ((o.nan(n) || null == n) && (n = ""), a.keepRaw || (t = u(t), n = u(n)), l.push(t + a.eq + n))
}),
l.join(a.sep)
}
},
function(e, t, n) {
function i() {
this.inited = !1
}
function r(e, t) {
var n, i, r;
i = !1,
n = document.createElement("script"),
n.type = "text/javascript",
n.src = e,
n.onload = n.onreadystatechange = function() {
i || this.readyState && "complete" != this.readyState || (i = !0, t())
},
r = document.getElementsByTagName("script")[0],
r.parentNode.insertBefore(n, r)
}
var o = n(27),
a = i.prototype;
a.init = function() {
if (!this.inited) {
this.inited = !0;
r("//s.url.cn/qqun/qun/qqweb/m/qun/confession/js/vconsole.min.js",
function() {
try {
vConsole.show()
} catch(e) {}
window.addEventListener("load",
function() {
vConsole.show()
})
})
}
},
a.handler = o.handler,
e.exports = new i
},
function(e, t, n) {
function i(e, t) {
var n = "";
return e = e.replace(t,
function(e) {
return n = e,
""
}),
[n, e]
}
function r(e, t) {
var n = [],
i = c.indexOf(e, t);
return - 1 == i ? n[0] = e: (n[0] = e.slice(0, i), n[1] = e.slice(i + t.length)),
n
}
function o(e) {
var t = r(e, "@"),
n = t[0],
i = t[1];
return i || (i = t[0], n = null),
[n, i]
}
var a = n(34),
c = n(1);
t.parse = function(e, t) {
if ("string" != typeof e) return e;
var n, s, u = {};
u.href = e,
n = r(e, "#"),
s = n[0],
n[1] && (u.hash = "#" + n[1]),
n = i(s, /^[a-zA-Z][a-zA-Z0-9+-.]*:/),
s = n[1],
u.protocol = n[0].toLowerCase(),
n = r(s, "?"),
s = n[0];
var l = n[1];
if (t && (l = a.parse(l)), u.query = l, "/" != s.charAt(0) && u.schema) return u.opaque = s,
u;
if (c.startsWith(s, "//")) {
s = s.slice(2),
n = r(s, "/"),
u.pathname = "/" + unescape(n[1] || ""),
n = o(n[0]),
u.auth = n[0];
n = r(n[1], ":"),
u.hostname = n[0],
u.port = ~~n[1]
}
return u
};
var s = "http https ftp gopher file".split(" ");
t.format = function(e) {
if (!e || "object" != typeof e) return e;
var t = e.protocol,
n = [t];
t && !c.includes(s, t.slice(0, t.length - 1)) || n.push("//"),
e.auth && n.push(e.auth, "@"),
n.push(e.hostname),
e.port && n.push(":", e.port),
n.push(e.pathname);
var i = e.query;
i && ("string" != typeof i && (i = a.stringify(i)), i && n.push("?", i)),
n.push(e.hash);
for (var r = [], o = 0; o < n.length; o++) n[o] && r.push(n[o]);
return r.join("")
},
t.appendQuery = function(e, t) {
var n = r(e, "#");
e = n[0];
var i = n[1];
return c.isObject(t) && (t = a.stringify(t)),
c.includes(e, "?") ? c.endsWith(e, "&") || c.endsWith(e, "?") || (t = "&" + t) : t = "?" + t,
e += t,
i && (e += "#" + i),
e
}
},
function(e, t, n) {
var i = n(1),
r = n(38);
r.resolve = n(40),
r.reject = n(41),
r.prototype["catch"] = r.prototype.caught = function(e) {
return this.then(null, e)
},
r.prototype.delay = function(e) {
var t;
return this.then(function(n) {
return t = n,
r.delay(e)
}).then(function() {
return t
})
},
r.delay = function(e) {
return new r(function(t) {
setTimeout(t, e)
})
},
r.all = function(e) {
var t = [],
n = i.size(e),
o = 0;
return new r(function(a, c) {
0 === n && a(t),
i.each(e,
function(e, i) {
r.resolve(e).then(function(e) {
t[i] = e,
++o === n && a(t)
},
function(e) {
c(e)
})
})
})
},
r.race = function(e) {
return new r(function(t, n) {
i.each(e,
function(e) {
r.resolve(e).then(function(e) {
t(e)
},
function(e) {
n(e)
})
})
})
},
e.exports = r
},
function(e, t, n) { (function(t, i, r) {
function t(e) {
var t = this;
t.handlers = {},
t.children = [],
t.state = u,
t.spread = !1;
var n = f(t, l),
i = m(t, p);
if (!s.fn(e)) throw new TypeError("expecting a function");
try {
e(function(e) {
n(e)
},
function(e) {
i(e)
})
} catch(r) {
i(r)
}
}
function o(e, t, n) {
a(function() {
var i = e.handlers[t];
if (s.fn(i)) {
var r;
try {
r = e.spread ? i.apply(null, n) : i(n)
} catch(o) {
return h(e, p, o)
}
d(e, l, r)
} else d(e, t, n)
})
}
function a(e) {
i.process && r.nextTick ? r.nextTick(e) : setTimeout(e)
}
var c = n(1),
s = c.is,
u = 0,
l = 1,
p = -1;
e.exports = t,
t.prototype.then = function(e, n) {
var i = this,
r = new t(c.noop);
r.spread = this.spread;
var a = r.handlers;
return a[l] = e,
a[p] = n,
u == i.state ? i.children.push(r) : o(r, i.state, i.result),
r
};
var d = function(e, t, n) {
if (e === n) return d(e, p, new TypeError("circle promise"));
var i;
if (s.oof(n)) try {
i = n.then
} catch(r) {
return h(e, p, r)
}
if (s.fn(i)) {
var o = c.once(function(t, n) {
t == p ? h(e, t, n) : d(e, t, n)
});
try {
i.call(n,
function(e) {
o(l, e)
},
function(e) {
o(p, e)
})
} catch(a) {
o(p, a)
}
} else h(e, t, n)
},
f = c.curry(d),
h = function(e, t, n) {
e.state == u && (e.state = t, e.result = n, c.each(e.children,
function(e) {
o(e, t, n)
}))
},
m = c.curry(h)
}).call(t, n(37),
function() {
return this
} (), n(39))
},
function(e, t) {
function n() {
throw new Error("setTimeout has not been defined")
}
function i() {
throw new Error("clearTimeout has not been defined")
}
function r(e) {
if (l === setTimeout) return setTimeout(e, 0);
if ((l === n || !l) && setTimeout) return l = setTimeout,
setTimeout(e, 0);
try {
return l(e, 0)
} catch(t) {
try {
return l.call(null, e, 0)
} catch(t) {
return l.call(this, e, 0)
}
}
}
function o(e) {
if (p === clearTimeout) return clearTimeout(e);
if ((p === i || !p) && clearTimeout) return p = clearTimeout,
clearTimeout(e);
try {
return p(e)
} catch(t) {
try {
return p.call(null, e)
} catch(t) {
return p.call(this, e)
}
}
}
function a() {
m && f && (m = !1, f.length ? h = f.concat(h) : g = -1, h.length && c())
}
function c() {
if (!m) {
var e = r(a);
m = !0;
for (var t = h.length; t;) {
for (f = h, h = []; ++g < t;) f && f[g].run();
g = -1,
t = h.length
}
f = null,
m = !1,
o(e)
}
}
function s(e, t) {
this.fun = e,
this.array = t
}
function u() {}
var l, p, d = e.exports = {}; !
function() {
try {
l = "function" == typeof setTimeout ? setTimeout: n
} catch(e) {
l = n
}
try {
p = "function" == typeof clearTimeout ? clearTimeout: i
} catch(e) {
p = i
}
} ();
var f, h = [],
m = !1,
g = -1;
d.nextTick = function(e) {
var t = new Array(arguments.length - 1);
if (arguments.length > 1) for (var n = 1; n < arguments.length; n++) t[n - 1] = arguments[n];
h.push(new s(e, t)),
1 !== h.length || m || r(c)
},
s.prototype.run = function() {
this.fun.apply(null, this.array)
},
d.title = "browser",
d.browser = !0,
d.env = {},
d.argv = [],
d.version = "",
d.versions = {},
d.on = u,
d.addListener = u,
d.once = u,
d.off = u,
d.removeListener = u,
d.removeAllListeners = u,
d.emit = u,
d.prependListener = u,
d.prependOnceListener = u,
d.listeners = function(e) {
return []
},
d.binding = function(e) {
throw new Error("process.binding is not supported")
},
d.cwd = function() {
return "/"
},
d.chdir = function(e) {
throw new Error("process.chdir is not supported")
},
d.umask = function() {
return 0
}
},
function(e, t, n) {
var i = n(38);
e.exports = function(e) {
return new i(function(t, n) {
t(e)
})
}
},
function(e, t, n) {
var i = n(38);
e.exports = function(e) {
return new i(function(t, n) {
n(e)
})
}
},
, , , , , , ,
function(e, t, n) {
function i() {
var e = this;
e.resources = {},
e.resource = {};
var t = [];
"object" == typeof navigator && (t = navigator.languages || [navigator.language]),
e.setLocales(t)
}
var r = n(1),
o = i.prototype;
o.is = function(e) {
return r.includes(r.lower(this.locale), r.lower(e))
},
o.setResource = function(e, t) {
this.resources[e] = t
},
o.setResources = function(e) {
r.extend(this.resources, e)
},
o.setLocale = function(e) {
var t = this;
if (e) {
t.locale = e;
var n = i.matchLocale(r.keys(t.resources), e);
return t.resource = t.resources[n] || {},
n
}
},
o.setLocales = function(e) {
this.locales = e,
this.setLocale(r.first(e))
},
o.translate = function(e) {
return this.resource[e] || e
},
o.t = o.translate,
i.matchLocale = function(e, t) {
return e = r.map(e,
function(e) {
return {
raw: e,
score: i.getSimilar(e, t)
}
}).sort(function(e, t) {
return e.score - t.score
}),
(r.last(e) || {}).raw
},
i.getSimilar = function(e, t) {
var n = 0;
return e = i.parseLocale(r.lower(e)),
t = i.parseLocale(r.lower(t)),
e.language && e.language == t.language && (n += 50),
e.country && e.country == t.country && (n += 40),
e.language && e.language == t.country && (n += 20),
t.language && t.language == e.country && (n += 20),
n
},
i.parseLocale = function(e) {
var t = e.split(/[^a-zA-Z]+/);
return {
language: t[0],
country: t[1]
}
};
var a = new i;
e.exports = a
},
function(e, t, n) { (function(e) {
function i(t) {
e.isString(t) && o("head").append("<style>" + t + "</style>")
}
function r() {
var e;
try {
window.top.document && window.top.QHPass && (e = window.top)
} catch(t) {
e = null
}
return e = e || window
}
var o = n(51);
t.addStyle = i,
t.getTopWindow = r
}).call(t, n(1))
},
function(e, t, n) { (function(t) {
var i = n(52),
r = t.jQuery || i;
e.exports = r
}).call(t,
function() {
return this
} ())
},
function(e, t, n) { (function(i) {
function r(e, t) {
if (u.fn(e)) return r(s).ready(e);
if (! (this instanceof r)) return new r(e, t);
if (this.length = 0, e) {
u.string(e) && (e = -1 == e.indexOf("<") ? c(e, t) : a.html(e)),
u.arraylike(e) || (e = [e]);
for (var n = e.length,
i = 0; i < n; i++) this[i] = e[i];
this.length = n
}
}
var o = n(1),
a = n(53),
c = n(54);
n(55).prefix = "minJQ-";
var s = i.document,
u = o.is;
e.exports = t = r;
var l = r.fn = r.prototype;
r.extend = l.extend = function() {
var e = arguments;
return 1 == e.length ? o.extend(this, e[0]) : o.extend.apply(o, e)
},
l.extend({
jquery: !0
}),
n(56)
}).call(t,
function() {
return this
} ())
},
function(e, t, n) { (function(e) {
function i(e) {
e = r.trim(e + "");
var t, n, i = e.replace(c,
function(e, i, r, o) {
return n && i && (t = 0),
(t = 0) ? e: (n = r || i, t += !o - !r, "")
});
if (i = r.trim(i)) throw new Error("Invalid JSON: " + e);
return Function("return " + e)()
}
var r = n(1),
o = r.is;
t.html = function(e, t) {
if (o.str(e)) {
t = t || document;
var n = t.createElement("div");
return n.innerHTML = e + "",
n.childNodes
}
return []
},
t.xml = function(t, n) {
t += "";
var i, r;
try {
if (e.DOMParser) {
i = (new DOMParser).parseFromString(t, "text/xml")
} else i = new ActiveXObject("Microsoft.XMLDOM"),
i.async = "false",
i.loadXML(t)
} catch(c) {
r = c
}
if (!r) if (i) if (i.documentElement) {
var a = i.getElementsByTagName("parsererror")[0];
if (a) {
var s = a.textContent;
r = new Error(s)
}
} else {
var u = i.parseError;
u && (r = new Error("line " + u.line + ": " + u.reason))
} else r = new Error("parse error");
return o.fn(n) && n(r, i),
i
};
var a = e.JSON || {};
t.json = a.parse || i;
var c = /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g
}).call(t,
function() {
return this
} ())
},
function(e, t) { (function(n) {
function i(e, n) {
n = n || a;
var i, c = [];
if (e && n.getElementsByTagName) {
if (e += "", o.test(e)) i = n.getElementsByTagName(e);
else {
var s = e.substr(1);
if (a == n && "#" == e.charAt(0) && o.test(s)) {
var u = a.getElementById(s);
if (u) return [u]
} else {
var l = t.custom || r;
try {
i = l(e, n)
} catch(f) {}
}
}
if (i) for (var p = i.length || 0,
d = 0; d < p; d++) c.push(i[d])
}
return c
}
function r(e, t) {
return t.querySelectorAll(e)
}
e.exports = t = i;
var o = /^[-\w]+$/,
a = n.document
}).call(t,
function() {
return this
} ())
},
function(e, t) {
function n(e) {
e = e || 7;
var n = Math.random().toString(35).substr(2, e);
return t.prefix + n
}
e.exports = t = n,
t.prefix = ""
},
function(e, t, n) {
n(57),
n(58),
n(59),
n(61),
n(62),
n(64),
n(65),
n(66),
n(67),
n(68),
n(69)
},
function(e, t, n) { (function(e) {
var t = n(52),
i = n(1),
r = n(53),
o = i.is,
a = "boolean number string function array date regexp object error".split(" ");
t.extend({
noop: i.noop,
toArray: function(e, n) {
return t.merge(n, e)
},
each: function(e, t) {
return i.each(e,
function(n, i) {
return t.call(n, i, n, e)
}),
e
},
grep: i.filter,
inArray: i.includes,
isArray: o.arr,
isEmptyObject: o.empty,
isFunction: o.fn,
isNumeric: o.num,
isPlainObject: o.hash,
isWindow: function(t) {
return t == e
},
makeArray: i.slice,
map: i.map,
merge: function(e, t) {
e = e || [];
var n = e.length || 0;
return i.each(t,
function(t, i) {
e.length++,
e[n + i] = t
}),
e
},
now: i.now,
parseHTML: r.html,
parseJSON: r.json,
parseXML: r.xml,
proxy: i.bind,
trim: i.trim,
type: function(e) {
var t = o._class(e);
return i.includes(a, t) || (t = "object"),
t
}
})
}).call(t,
function() {
return this
} ())
},
function(e, t, n) {
function i(e, t, n) {
e.addEventListener ? e.addEventListener(t, n, !1) : e.attachEvent && e.attachEvent("on" + t, n)
}
function r(e, t, n) {
e.removeEventListener ? e.removeEventListener(t, n, !1) : e.detachEvent && e.detachEvent("on" + t, n)
}
var o = n(52),
a = n(1),
c = a.is,
s = "events";
o.Event = function(e, t) {
return this instanceof o.Event ? (e = e || {},
"string" == typeof e && (e = {
type: e
}), this.originalEvent = e, this.type = e.type, this.target = e.target || e.srcElement, void(t && o.extend(this, t))) : new o.Event(e, t)
},
o.extend({
one: function(e, t, n, i, r) {
if (c.fn(n)) {
var s = a.once(function() {
o.off(e, t, s),
s = null,
n.apply(this, arguments)
});
return o.on(e, t, s, i, r)
}
},
on: function(e, t, n, r, a) {
var c = o._data(e, s),
u = t.split(".");
t = u[0];
var l = u[1];
c || (c = {},
o._data(e, s, c));
var p = o._data(e, "handler");
p || (p = function(t) {
o.trigger(e, o.Event(t))
},
o._data(e, "handler", p)),
c[t] || (c[t] = [], i(e, t, p));
var d = c[t],
f = {
handler: n,
namespace: l,
selector: a,
type: t
};
d.push(f)
},
trigger: function(e, t) {
var n = o._data(e, s);
"string" == typeof t && (t = o.Event(t, {
target: e
}));
var i = n[t.type];
if (i) {
i = i.slice();
for (var r = i.length,
a = 0; a < r; a++) { ! 1 === i[a].handler.call(e, t) && (t = t.originalEvent || t, t.preventDefault ? t.preventDefault() : t.returnValue = !1, t.stopPropagation && t.stopPropagation(), t.cancelBubble = !0)
}
}
},
off: function(e, t, n) {
var i = o._data(e, s);
if (i) if ((t = t || "") && "." != t.charAt(0)) {
var a = t.split("."),
c = a[0],
u = a[1],
l = i[c];
if (l) {
for (var p = l.length - 1; p >= 0; p--) {
var d = l[p],
f = !0;
u && u != d.namespace && (f = !1),
n && n != d.handler && (f = !1),
f && l.splice(p, 1)
}
i[c].length || (r(e, c, o._data(e, "handler")), i[c] = null)
}
} else for (var h in i) o.off(e, h + t, n)
}
}),
o.fn.extend({
eventHandler: function(e, t, n) {
return e ? (e = e.split(" "), this.each(function() {
for (var i = 0; i < e.length; i++) n(this, e[i], t)
})) : this.each(function() {
n(this)
})
},
on: function(e, t) {
return this.eventHandler(e, t, o.on)
},
one: function(e, t) {
return this.eventHandler(e, t, o.one)
},
off: function(e, t) {
return this.eventHandler(e, t, o.off)
},
trigger: function(e, t) {
return this.eventHandler(e, t, o.trigger)
}
})
},
function(e, t, n) { (function(e) {
function t() {
return s && "complete" == s.readyState ? (o.ctx = r, o.open()) : (r(s).on(a, i), void r(e).on(c, i))
}
function i() {
r(e).off(a, i),
r(s).off(c, i),
o.ctx = r,
o.open()
}
var r = n(52),
o = n(60)(),
a = "DOMContentLoaded",
c = "load",
s = e.document;
r.fn.extend({
ready: function(e) {
return o.queue(e),
this
}
}),
setTimeout(t)
}).call(t,
function() {
return this
} ())
},
function(e, t, n) { (function(t) {
function i(e) {
var t = this;
return t instanceof i ? (t.queueList = e || [], void t.close()) : new i(e)
}
var r = n(1),
o = r.is;
e.exports = i;
var a = i.prototype;
a.queue = function() {
var e = this,
t = arguments;
e.isOpen ? e.exec(t) : e.queueList.push(t)
},
a.close = function() {
this.isOpen = !1
},
a.open = function() {
this.isOpen = !0,
this.execAll()
},
a.execAll = function() {
var e = this,
t = e.queueList;
r.each(t,
function(t) {
e.exec(t)
}),
t.length = 0
},
a.exec = function(e) {
var t, n = r.first(e),
i = this.ctx;
if (t = o.fn(n) ? n: r.get(i, n), o.fn(t)) try {
t.apply(i, r.slice(e, 1))
} catch(a) {}
},
a.overwriteQueue = function(e) {
var n = this;
t[e] = function() {
n.queue.apply(n, arguments)
}
}
}).call(t,
function() {
return this
} ())
},
function(e, t, n) {
var i = n(52),
r = n(1),
o = r.is;
i.fn.extend({
toArray: function() {
return i.toArray(this)
},
pushStack: function(e) {
var t = i(e);
return t.prevObject = this,
t.context = this.context,
t
},
get: function(e) {
return o.num(e) ? e > 0 ? this[e] : this.get(e + this.length) : this.toArray()
},
each: function(e) {
return r.each(this,
function(t, n) {
return e.call(t, n, t, this)
}),
this
},
map: function(e) {
var t = r.map(this,
function(t, n) {
return e.call(t, n, t, this)
});
return this.pushStack(t)
},
filter: function(e) {
var t = r.filter(this,
function(t, n) {
return e.call(t, n, t, this)
});
return this.pushStack(t)
},
end: function() {
return this.prevObject || i()
},
eq: function(e) {
return e < 0 ? this.eq(e + this.length) : this.pushStack([this[e]])
},
first: function() {
return this.eq(0)
},
last: function() {
return this.eq( - 1)
},
slice: function(e, t) {
var n = r.slice(this, e, t);
return this.pushStack(n)
},
find: function(e) {
var t = r.map(this,
function(t) {
return i(e, t)
});
return this.pushStack(r.union.apply(r, t))
}
})
},
function(e, t, n) { (function(e) {
var t = n(1),
i = n(52),
r = n(63),
o = (n(55), t.is, new r),
a = new r,
c = e.getComputedStyle ||
function(e) {
return e && e.currentStyle ? e.currentStyle: {}
};
i.extend({
expando: a.expando,
access: function(e, t, n, r, o) {
var a = 0;
if (n && "object" == typeof n) for (a in n) i.access(e, t, a, n[a], !0);
else if (void 0 === r) {
var c;
if (e[0] && (c = t(e[0], n)), !o) return c
} else for (a = 0; a < e.length; a++) t(e[a], n, r);
return e
},
attr: function(e, t, n) {
return void 0 === n ? e.getAttribute(t) : null === n ? e.removeAttribute(t) : void e.setAttribute(t, "" + n)
},
text: function(e, t, n) {
if (void 0 !== n) return e.textContent = "" + n;
var r = e.nodeType;
if (3 == r || 4 == r) return e.nodeValue;
if ("string" == typeof e.textContent) return e.textContent;
var o = "";
for (e = e.firstChild; e; e = e.nextSibling) o += i.text(e);
return o
},
html: function(e, t, n) {
return void 0 === n ? e.innerHTML: void(e.innerHTML = "" + n)
},
prop: function(e, t, n) {
return void 0 === n ? e[t] : void(e[t] = n)
},
css: function(e, t, n) {
var i = e.style || {};
if (void 0 === n) {
var r = i[t];
return r || c(e, null)[t]
}
i[t] = n
},
data: function(e, t, n) {
if (void 0 !== n) o.set(e, t, n);
else {
if (!t || "object" != typeof t) return t ? o.get(e, t) : o.getData(e, !0);
for (var r in t) i.data(e, r, t[r])
}
},
_data: function(e, t, n) {
if (void 0 !== n) a.set(e, t, n);
else {
if (!t || "object" != typeof t) return a.get(e, t);
for (var r in t) i._data(e, r, t[r])
}
},
removeData: function(e, t) {
o.remove(e, t)
}
}),
i.fn.extend({
text: function(e) {
return i.access(this, i.text, null, e)
},
html: function(e) {
return i.access(this, i.html, null, e)
},
attr: function(e, t) {
return i.access(this, i.attr, e, t)
},
prop: function(e, t) {
return i.access(this, i.prop, e, t)
},
css: function(e, t) {
return i.access(this, i.css, e, t)
},
data: function(e, t) {
return i.access(this, i.data, e, t)
},
_data: function(e, t) {
return i.access(this, i.data, e, t)
},
removeData: function(e) {
return i.access(this, i.removeData, e, void 0, !0)
}
})
}).call(t,
function() {
return this
} ())
},
function(e, t, n) {
function i() {
this.expando = r(),
this.cache = [null]
}
var r = n(55);
e.exports = i;
var o = i.prototype;
o.get = function(e, t) {
var n = this.getData(e);
return null == t ? n: n[t]
},
o.set = function(e, t, n) {
return this.getData(e, !0)[t] = n,
e
},
o.remove = function(e, t) {
if (void 0 === t) this.discard(e);
else {
delete this.getData(e)[t]
}
return e
},
o.getData = function(e, t) {
var n = {};
if (e) {
var i = e[this.expando],
r = this.cache;
if (i) return r[i];
t && (e[this.expando] = r.length, r.push(n))
}
return n
},
o.discard = function(e) {
e && e[this.expando] && (e[this.expando] = void 0)
}
},
function(e, t, n) {
var i = (n(1), n(52));
i.buildFragment = function(e, t) {
t = t || document;
for (var n, r = t.createDocumentFragment(), o = 0; n = e[o++];) {
var a = [];
if ("string" == typeof n) if ( - 1 == n.indexOf("<")) a.push(t.createTextNode(n));
else {
var c = document.createElement("div");
c.innerHTML = n,
i.toArray(c.childNodes, a)
} else "object" == typeof n && (n.nodeType ? a.push(n) : i.toArray(n, a))
}
for (var s, o = 0; s = a[o++];) r.appendChild(s);
return r
},
i.fn.extend({
domManip: function(e, t) {
return this.each(function() {
var n = i.buildFragment(e);
t.call(this, n)
})
},
remove: function() {
return this.domManip(arguments,
function() {
this.parentNode && this.parentNode.removeChild(this)
})
},
before: function() {
return this.domManip(arguments,
function(e) {
e.parentNode && e.parentNode.insertBefore(e, this)
})
},
after: function() {
return this.domManip(arguments,
function(e) {
e.parentNode && e.parentNode.insertBefore(e, this.nextSibling)
})
},
append: function() {
return this.domManip(arguments,
function(e) {
this.appendChild(e)
})
}
})
},
function(e, t, n) {
var i = n(52),
r = n(1),
o = "display";
r.each("show hide toggle".split(" "),
function(e) {
i.fn[e] = function() {
return this.each(function(t, n) {
var r = e,
a = i.css(n, o),
c = "none" == a;
if ("toggle" == e && (r = "hide", c && (r = "show")), "show" == r && c) {
var s = i._data(n, o) || "";
i.css(n, o, s)
} else "hide" != r || c || (i._data(n, o, a), i.css(n, o, "none"))
})
}
})
},
function(e, t, n) { (function(e) {
function t(e, t, n) {
function i(e) {
if (a) {
if (n) {
var t = {
status: 200
};
e && (t = {
status: 0
}),
n(e, t)
}
a.onload = a.onerror = a.onreadystatechange = null,
o.removeChild(a),
a = null
}
}
function r() {
a.async = !0,
a.src = e,
a.onload = a.onerror = a.onreadystatechange = function(e) {
var t = a.readyState;
e && "error" == e.type ? i("error") : t && !/loaded|complete/.test(t) || i(null)
},
o.appendChild(a)
}
var o = c("head")[0],
a = document.createElement("script");
return {
abort: function() {
n = null,
i()
},
send: r
}
}
function i(n, i, a) {
"function" == typeof i && (a = i, i = {});
var s, u = !1,
p = function(e, t, n) {
u || (a = a || c.noop, u = !0, a(e, t, n))
},
d = i.dataType || "text",
f = !1;
if ("jsonp" == d) {
f = !0;
var h = i.jsonp || l.jsonp,
m = i.jsonpCallback || [c.expando, c.now(), Math.random()].join("_");
m = m.replace(/[^\w|$]/g, "");
var g = h + "=?",
v = c.extend({},
i.data); - 1 != n.indexOf(g) ? n.replace(g, h + "=" + m) : v[h] = m,
i.cache || (v._ = c.now()),
n = o(n, v),
d = "script",
e[m] = function(t) {
p(null, {
status: 200
},
t),
e[m] = null
}
}
"script" == d ? s = t(n, i, f ? null: p) : /html|text/.test(d) && (s = r(n, i, p)),
s.send(),
i.timeout && setTimeout(function() {
s.abort(),
p("timeout", {
status: 0,
readyState: 0,
statusText: "timeout"
}),
f && (window[m] = c.noop)
},
i.timeout)
}
function r(e, t, n) {
function i() {
if (a) {
var i = t.type || "GET";
e = o(e, t.data),
a.open(i, e, !n.async),
s in a && (u.cors = !0, a[s] = !0);
var r = t.headers;
if (r) for (var c in r) a.setRequestHeader(c, r[c]);
a.send(t.data || null);
var l = function() {
l && 4 === a.readyState && (l = void 0, n && n(null, a, a.responseText))
}; ! 1 === t.async ? l() : 4 === a.readyState ? setTimeout(l) : a.onreadystatechange = l
}
}
function r() {
a && (n = null, a.abort())
}
var a = l.xhr();
return {
send: i,
abort: r
}
}
function o(e, t) {
if (t = a.stringify(t)) { - 1 == e.indexOf("?") && (e += "?");
var n = e.charAt(e.length - 1);
"&" != n && "?" != n && (e += "&"),
e += t
}
return e
}
var a = n(34),
c = n(52),
s = (n(55), "withCredentials"),
u = {};
c.support = u;
var l = {
xhr: function() {
try {
return window.XMLHttpRequest ? new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP")
} catch(e) {}
},
jsonp: "callback"
};
c.ajaxSetting = l,
c.ajax = function(e) {
var t = {};
return e = e || {},
i(e.url, e,
function(n, i, r) {
i = i || {};
var o = {
status: i.status,
statusText: i.statusText,
readyState: i.readyState
};
c.extend(t, o);
var a = "success";
n || 200 != t.status ? (a = "error", "timeout" == n && (a = "timeout"), e.error && e.error(t, a, i.statusText)) : e.success && e.success(r || i.responseText, a, t),
e.complete && e.complete(t, a)
}),
t
},
c.each(["get", "post"],
function(e, t) {
c[t] = function(e, n, i, r) {
"function" == typeof n && (r = i, i = n, n = void 0),
c.ajax({
url: e,
type: t,
dataType: r,
data: n,
success: i
})
}
})
}).call(t,
function() {
return this
} ())
},
function(e, t, n) {
var i = n(52),
r = n(1);
r.each("width height".split(" "),
function(e) {
r.each(["inner", "outer", ""],
function(t) {
var n = e,
r = e.charAt(0).toUpperCase() + e.substr(1);
t && (n = t + r),
i.fn[n] = function() {
var e = this[0];
if (e) {
var t = 0;
return t = e["offset" + r],
parseFloat(t) || 0
}
}
})
}),
i.fn.offset = function() {
var e = this[0];
if (e) {
var t = e.getBoundingClientRect();
return r.only(t, "left top")
}
}
},
function(e, t, n) {
function i(e) {}
function r(e) {
return o.trim(e.className).split(/\s+/)
}
var o = n(1),
a = n(52),
c = i.prototype;
o.extend(c, {
add: function() {
var e = r(this);
this.className = o.union(e, arguments).join(" ")
},
remove: function() {
var e = r(this);
this.className = o.difference(e, arguments).join(" ")
},
contains: function(e) {
return o.includes(r(this), e)
},
toggle: function(e, t) {
var n = c.contains.call(this, e),
i = "add";
1 != t && (n || 0 == t) && (i = "remove"),
c[i].call(this, e)
}
}),
o.each("add remove toggle".split(" "),
function(e) {
a.fn[e + "Class"] = function() {
var t = arguments;
return this.each(function() {
c[e].apply(this, t)
})
}
}),
a.fn.hasClass = function(e) {
return o.every(this,
function(t) {
return c.contains.call(t, e)
})
}
},
function(e, t, n) {
function i(e) {
return r.union.apply(null, e)
}
var r = n(1),
o = n(52),
a = {
children: function(e) {
for (var t = [], n = e.firstChild; n; n = n.nextSibling) 1 == n.nodeType && t.push(n);
return t
},
parent: function(e) {
return e.parentNode
}
};
r.each("children parent".split(" "),
function(e) {
o.fn[e] = function() {
return i(r.map(this,
function(t) {
return a[e].apply(null, arguments)
}))
}
})
},
, , , , , , , , , , ,
function(e, t, n) {
function i() {
window._smConf = {
organization: "BsHKz7OMBibZYAoy3ZCA",
staticHost: "report.passport.msvodx.com",
apiHost: "report.passport.msvodx.com",
apiPath: ""
};
var e = function() {
var e = _smConf.staticHost + "/static2",
t = "https:" === document.location.protocol,
n = t ? "https://": "http://",
i = "/fpv2.js",
r = n + _smConf.staticHost + i,
o = navigator.userAgent.toLowerCase(),
a = /windows\s(?:nt\s5.1)|(?:xp)/.test(o),
c = /msie\s[678]\.0/.test(o);
return t && a && c && (r = n + e + i),
r
} (),
t = document.createElement("script"),
n = document.getElementsByTagName("script")[0];
t.src = e,
n.parentNode.insertBefore(t, n)
}
var r = n(13).getLogger("shumei"),
o = !1;
t.load = function() {
o || (o = !0, r.debug("load"), i())
},
t.getShumeiDeviceId = function() {
var e;
try {
e = SMSdk.getDeviceId()
} catch(t) {
e = ""
}
return e
}
},
, ,
function(e, t, n) { (function(e) { !
function() {
function t() {
i() < 8 || setTimeout(function() {
r.debug("addStatisticsForSafe");
var e = document.createElement("iframe"),
t = document.getElementsByTagName("body")[0];
e.width = 0,
e.height = 0,
e.style.display = "none",
e.id = "",
e.src = location.protocol + "",
t.appendChild(e)
},
3e3)
}
function i(e) {
return new RegExp("MSIE (\\d+\\.\\d+)").test(e || navigator.userAgent),
parseFloat(RegExp.$1)
}
var r = n(13).getLogger("core"),
o = n(85);
r.sdk.prefix = "quc:jssdk:";
var a = window.QHPass = {
VERSION: "5.2.2",
RELEASE: "",
$: jQuery,
utils: {},
plugin: {},
ui: {},
tool: o,
log: r.getLogger("qhpass")
};
a.version = [a.VERSION, a.RELEASE].join("."),
r.debug("version", a.version),
a.isI360 = function() {
return "i.msvodx.com" == location.hostname
},
a.DEBUG = !1;
var c = n(87);
e.includes(["i.msvodx.com", "e.msvodx.com"], location.host) && c.init({
id: 360,
uin: "crash",
random: 1,
repeat: 2,
url: "//i.msvodx.com/clogo.gif",
offlineLog: !1
}),
window.QUC = window.QUC || {},
QUC.t6 = +new Date,
a.init = function(e) {
window.QUC = window.QUC || {},
QUC.t7 = +new Date,
r.debug("init", e);
var n = a.$;
"string" == typeof e && (e = {
src: e
}),
n.isPlainObject(e) && a.setConfig(e),
a._isInit || (t(), a._isInit = !0, a.events.trigger("init.core"), a.events.on("afterShow.* DOMUpdated.*",
function(e, t) {
setTimeout(function() {
a.utils.initPlaceholder(n(t).find("[placeholder]")),
r.debug("try add placeholder")
},
0)
}))
}
} ()
}).call(t, n(1))
},
function(e, t, n) { (function(e, i) {
var r = n(13).getLogger("tool"),
o = n(49),
a = n(36),
c = t;
c.gotoPage = function(e) {
r.debug("change location", e),
location.href = e
},
c.tryHandleAbnormalPassword = function(t, i) {
return new e(function(e, a) {
if (t) {
var c = t.weakInfo;
if (c) {
if (i = c.password || i) {
var s = QHPass.validate.checkPasswordFrontendSync({
password: i
});
c.checkResult = s,
c.password = i,
s.reason && (c.isWeak = !0)
}
r.debug("weak info", c);
var u = c.isLeak && c.noticeWhenLeak,
l = c.isWeak && c.noticeWhenWeak;
if (c.ignoreWeak && (l = !1), u || l) {
var p, d = {
onconfirm: function() {
r.debug("confirm"),
p.hide(!0),
e({
shouldChangePassword: !0
})
},
oncancel: function() {
r.debug("cancel"),
p.hide(!0),
u ? c.limitWhenLeak ? a(new Error("user reject change password and not login")) : e() : l && (c.limitWhenWeak ? a(new Error("user reject change password and not login1")) : e())
},
confirmButtonText: o.t("\u4fee\u6539\u5bc6\u7801"),
cancelButtonText: o.t("\u53d6\u6d88"),
title: o.t("\u5e10\u53f7\u5f02\u5e38"),
content: o.t("weak password warning")
};
u && (d.content = o.t("leak password warning"));
var f = n(86);
p = new QHPass.utils.Panel({
title: d.title,
content: f
});
var h = p.$el;
return h.addClass("quc-confirm").addClass("quc-panel-sad"),
h.find(".quc-panel-message").html('<i class="quc-icon quc-icon-sad"></i>' + d.content),
h.find(".quc-panel-close").on("click", d.oncancel),
h.find(".quc-button-cancel").text(d.cancelButtonText).on("click", d.oncancel),
h.find(".quc-button-confirm").text(d.confirmButtonText).on("click", d.onconfirm),
void p.show()
}
}
}
e()
})
},
c.checkBindMobile = function(t) {
return e.resolve(QHPass.sync.bindMobileCheck(t)).then(function(t) {
return r.debug("bind mobile check result", t),
t = t || {},
new e(function(e, i) {
function r() {
s.hide(!0),
i(new Error("user reject override mobile"))
}
if (0 == t.errno) {
var a = t.status;
if (2 == a) {
var c = n(86),
s = new QHPass.utils.Panel({
title: " ",
content: c
}),
u = s.$el;
u.addClass("quc-confirm").addClass("quc-panel-sad"),
u.find(".quc-panel-message").html(o.t("override phone warning")),
u.find(".quc-panel-title").html(o.t("\u64cd\u4f5c\u63d0\u9192")),
u.find(".quc-panel-close").on("click", r),
u.find(".quc-button-cancel").text("\u53d6\u6d88").on("click", r),
u.find(".quc-button-confirm").text("\u7ee7\u7eed\u7ed1\u5b9a").on("click",
function() {
s.hide(!0),
e({
condition: 0
})
}),
s.show()
} else 0 != a && 1 != a || e({
condition: 2
})
}
})
})
},
c.appendSearchParams = function(e) {
var t = i.slice(location.search, 1);
return a.appendQuery(e, t)
},
c.gotoPageWithSearchParams = function(e) {
return e = c.appendSearchParams(e),
c.gotoPage(e)
}
}).call(t, n(37), n(1))
},
function(e, t) {
e.exports = '<div class="quc-panel-main">\n  <div class="quc-panel-message">\n  </div>\n  <div class="quc-panel-btns">\n    <button class="quc-new-button quc-button-default quc-button-cancel"></button>\n    <button class="quc-new-button quc-button-primary quc-button-confirm"></button>\n  </div>\n</div>\n'
},
function(e, t, n) {
var i = function(e) {
if (e.BJ_REPORT) return e.BJ_REPORT;
var t = [],
n = {},
r = {
id: 0,
uin: 0,
url: "",
offline_url: "",
offline_auto_url: "",
ext: null,
level: 4,
ignore: [],
random: 1,
delay: 1e3,
submit: null,
repeat: 5,
offlineLog: !1,
offlineLogExp: 5,
offlineLogAuto: !1
},
o = {
db: null,
ready: function(e) {
var t = this;
if (!window.indexedDB || !r.offlineLog) return r.offlineLog = !1,
e();
if (this.db) return void setTimeout(function() {
e(null, t)
},
0);
var n = window.indexedDB.open("badjs", 1);
return n ? (n.onerror = function(t) {
return e(t),
r.offlineLog = !1,
console.log("indexdb request error"),
!0
},
n.onsuccess = function(n) {
t.db = n.target.result,
setTimeout(function() {
e(null, t)
},
500)
},
void(n.onupgradeneeded = function(e) {
var t = e.target.result;
t.objectStoreNames.contains("logs") || t.createObjectStore("logs", {
autoIncrement: !0
})
})) : (r.offlineLog = !1, e())
},
insertToDB: function(e) {
this.getStore().add(e)
},
addLog: function(e) {
this.db && this.insertToDB(e)
},
addLogs: function(e) {
if (this.db) for (var t = 0; t < e.length; t++) this.addLog(e[t])
},
getLogs: function(e, t) {
if (this.db) {
var n = this.getStore(),
i = n.openCursor(),
r = [];
i.onsuccess = function(n) {
var i = n.target.result;
i ? (i.value.time >= e.start && i.value.time <= e.end && i.value.id == e.id && i.value.uin == e.uin && r.push(i.value), i["continue"]()) : t(null, r)
},
i.onerror = function(e) {
return t(e),
!0
}
}
},
clearDB: function(e) {
if (this.db) {
var t = this.getStore();
if (!e) return void t.clear();
var n = Date.now() - 24 * (e || 2) * 3600 * 1e3;
t.openCursor().onsuccess = function(e) {
var i = e.target.result;
i && (i.value.time < n || !i.value.time) && (t["delete"](i.primaryKey), i["continue"]())
}
}
},
getStore: function() {
return this.db.transaction("logs", "readwrite").objectStore("logs")
}
},
a = {
isOBJByType: function(e, t) {
return Object.prototype.toString.call(e) === "[object " + (t || "Object") + "]"
},
isOBJ: function(e) {
return "object" == typeof e && !!e
},
isEmpty: function(e) {
return null === e || !a.isOBJByType(e, "Number") && !e
},
extend: function(e, t) {
for (var n in t) e[n] = t[n];
return e
},
processError: function(e) {
try {
if (e.stack) {
var t = e.stack.match("https?://[^\n]+");
t = t ? t[0] : "";
var n = t.match(":(\\d+):(\\d+)");
n || (n = [0, 0, 0]);
return {
msg: a.processStackMsg(e),
rowNum: n[1],
colNum: n[2],
target: t.replace(n[0], ""),
_orgMsg: e.toString()
}
}
return e.name && e.message && e.description ? {
msg: JSON.stringify(e)
}: e
} catch(r) {
return e
}
},
processStackMsg: function(e) {
var t = e.stack.replace(/\n/gi, "").split(/\bat\b/).slice(0, 9).join("@").replace(/\?[^:]+/gi, ""),
n = e.toString();
return t.indexOf(n) < 0 && (t = n + "@" + t),
t
},
isRepeat: function(e) {
if (!a.isOBJ(e)) return ! 0;
var t = e.msg;
return (n[t] = (parseInt(n[t], 10) || 0) + 1) > r.repeat
}
},
c = e.onerror;
e.onerror = function(t, n, i, r, o) {
var s = t;
o && o.stack && (s = a.processStackMsg(o)),
a.isOBJByType(s, "Event") && (s += s.type ? "--" + s.type + "--" + (s.target ? s.target.tagName + "::" + s.target.src: "") : ""),
g.push({
msg: s,
target: n,
rowNum: i,
colNum: r,
_orgMsg: t
}),
m(),
c && c.apply(e, arguments)
};
var s = function(e, t) {
var n = [],
i = [],
o = [];
if (a.isOBJ(e)) {
e.level = e.level || r.level;
for (var c in e) {
var s = e[c];
if (!a.isEmpty(s)) {
if (a.isOBJ(s)) try {
s = JSON.stringify(s)
} catch(u) {
s = "[BJ_REPORT detect value stringify error] " + u.toString()
}
o.push(c + ":" + s),
n.push(c + "=" + encodeURIComponent(s)),
i.push(c + "[" + t + "]=" + encodeURIComponent(s))
}
}
}
return [i.join("&"), o.join(","), n.join("&")]
},
u = [],
l = function(e, t) {
return t = a.extend({
id: r.id,
uin: r.uin,
time: new Date - 0
},
t),
o.db ? void o.addLog(t) : (o.db || u.length || o.ready(function(e, t) {
t && u.length && (t.addLogs(u), u = [])
}), void u.push(t))
},
p = function() {
var e = document.createElement("script");
e.src = r.offline_auto_url || r.url.replace(/badjs$/, "offlineAuto") + "?id=" + r.id + "&uin=" + r.uin,
window._badjsOfflineAuto = function(e) {
e && i.reportOfflineLog()
},
document.head.appendChild(e)
},
d = [],
f = 0,
h = function() {
if (clearTimeout(f), d.length) {
var e = r._reportUrl + d.join("&") + "&count=" + d.length + "&_t=" + +new Date;
if (r.submit) r.submit(e);
else { (new Image).src = e
}
f = 0,
d = []
}
},
m = function(e) {
if (r._reportUrl) {
for (var n = Math.random() >= r.random; t.length;) {
var i = !1,
o = t.shift();
if (o.msg = (o.msg + "" || "").substr(0, 500), !a.isRepeat(o)) {
var c = s(o, d.length);
if (a.isOBJByType(r.ignore, "Array")) for (var u = 0,
p = r.ignore.length; u < p; u++) {
var m = r.ignore[u];
if (a.isOBJByType(m, "RegExp") && m.test(c[1]) || a.isOBJByType(m, "Function") && m(o, c[1])) {
i = !0;
break
}
}
i || (r.offlineLog && l((r.id, r.uin), o), n || 20 == o.level || (d.push(c[0]), r.onReport && r.onReport(r.id, o)))
}
}
e ? h() : f || (f = setTimeout(h, r.delay))
}
},
g = e.BJ_REPORT = {
push: function(e) {
var n = a.isOBJ(e) ? a.processError(e) : {
msg: e
};
if (r.ext && !n.ext && (n.ext = r.ext), n.from || (n.from = location.href), n._orgMsg) {
var i = n._orgMsg;
delete n._orgMsg,
n.level = 2;
var o = a.extend({},
n);
o.level = 4,
o.msg = i,
t.push(n),
t.push(o)
} else t.push(n);
return m(),
g
},
report: function(e, t) {
return e && g.push(e),
t && m(!0),
g
},
info: function(e) {
return e ? (a.isOBJ(e) ? e.level = 2 : e = {
msg: e,
level: 2
},
g.push(e), g) : g
},
debug: function(e) {
return e ? (a.isOBJ(e) ? e.level = 1 : e = {
msg: e,
level: 1
},
g.push(e), g) : g
},
reportOfflineLog: function() {
return window.indexedDB ? void o.ready(function(e, t) {
if (t) {
var n = new Date - 0 - 24 * r.offlineLogExp * 3600 * 1e3,
i = new Date - 0;
t.getLogs({
start: n,
end: i,
id: r.id,
uin: r.uin
},
function(e, t) {
var o = document.createElement("iframe");
o.name = "badjs_offline_" + (new Date - 0),
o.frameborder = 0,
o.height = 0,
o.width = 0,
o.src = "javascript:false;",
o.onload = function() {
var e = document.createElement("form");
e.style.display = "none",
e.target = o.name,
e.method = "POST",
e.action = r.offline_url || r.url.replace(/badjs$/, "offlineLog"),
e.enctype.method = "multipart/form-data";
var a = document.createElement("input");
a.style.display = "none",
a.type = "hidden",
a.name = "offline_log",
a.value = JSON.stringify({
logs: t,
userAgent: navigator.userAgent,
startDate: n,
endDate: i,
id: r.id,
uin: r.uin
}),
o.contentDocument.body.appendChild(e),
e.appendChild(a),
e.submit(),
setTimeout(function() {
document.body.removeChild(o)
},
1e4),
o.onload = null
},
document.body.appendChild(o)
})
}
}) : void i.info("unsupport offlineLog")
},
offlineLog: function(e) {
return e ? (a.isOBJ(e) ? e.level = 20 : e = {
msg: e,
level: 20
},
g.push(e), g) : g
},
init: function(e) {
if (a.isOBJ(e)) for (var n in e) r[n] = e[n];
var i = parseInt(r.id, 10);
return i && (/qq\.com$/gi.test(location.hostname) && (r.url || (r.url = "//badjs2.qq.com/badjs"), r.uin || (r.uin = parseInt((document.cookie.match(/\buin=\D+(\d+)/) || [])[1], 10))), r._reportUrl = (r.url || "/badjs") + "?id=" + i + "&uin=" + r.uin + "&"),
t.length && m(),
o._initing || (o._initing = !0, o.ready(function(e, t) {
t && setTimeout(function() {
t.clearDB(r.offlineLogExp),
setTimeout(function() {
r.offlineLogAuto && p()
},
5e3)
},
1e3)
})),
g
},
__onerror__: e.onerror
};
return "undefined" != typeof console && console.error && setTimeout(function() {
var e = ((location.hash || "").match(/([#&])BJ_ERROR=([^&$]+)/) || [])[2];
e && console.error("BJ_ERROR", decodeURIComponent(e).replace(/(:\d+:\d+)\s*/g, "$1\n"))
},
0),
g
} (window);
e.exports = i
},
function(e, t, n) { (function(e) {
var t = n(81); !
function(i) {
function r(t) {
var n = e.get(t, "data") || {};
return n.o + "." + n.m
}
function o(e) {
return d.each(e,
function(t, n) {
"boolean" == d.type(n) && (e[t] = n ? 1 : 0)
}),
e
}
function a(e, t) {
t.url && (t.action = t.url, delete t.url),
t.method = "post";
var n = d("<form>").attr(t).hide();
return d.each(e,
function(e, t) {
d("<input>").attr({
type: "hidden",
name: e,
value: t
}).appendTo(n)
}),
n[0]
}
function c(e) {
return e && 32 != e.length ? i.utils.md5(e) : e
}
function s(e) {
return function(t) {
var n = d.Deferred();
return "Array" == Object.prototype.toString.call(t).replace(/\[object (\w+)\]$/, "$1") && (t = {
errno: 0,
data: t
}),
-1 == t.errno.toString().indexOf("login1_captcha") ? t.errno = parseInt(t.errno, 10) : t.errno = i.ERROR.CAPTCHA_INVALID.errno,
t.errno === e ? n.resolve(t) : (t.errmsg = i.utils.getErrorMsg(t.errno, t.errmsg || t.msg || ""), n.reject(t)),
n.promise()
}
}
function u(e, t) {
d.each(t,
function(t, n) {
void 0 !== e[t] && (e[n] = e[t], delete e[t])
})
}
function l() {
g = null
}
var p = n(13).getLogger("request"),
d = i.$,
f = !1,
h = ["msvodx.com", "360pay.cn", "so.com", "qiku.com", "360shouji.com"],
m = function(e, t, n) {
n = n || "https" == i.getConfig("protocol").toLowerCase();
var r = this.protocol = n && !f ? "https": "http",
a = {
src: i.getConfig("src"),
from: i.getConfig("src"),
charset: i.getConfig("charset"),
requestScema: r
},
c = {
url: r + "://login.msvodx.com",
type: "GET",
dataType: "jsonp",
timeout: 2e4
};
e = e || {},
t = t || {},
this.protocol = r,
this.param = d.extend(a, o(e)),
this.ajaxOpt = d.extend({
data: this.param
},
c, t),
this.I360 = r + "://i.msvodx.com"
};
d.extend(m.prototype, {
get: function(e) {
var t = this,
n = d.ajax(e, this.ajaxOpt),
i = this.ajaxOpt.data.m,
o = QHPass.getConfig("mainDomain", []),
a = e ? e.replace(/(http|https):\/\/login1./gi, "") : "";
return n.done(function(e) {
p.debug("get", r(t.ajaxOpt), t.ajaxOpt, e)
}),
n.then(this.done,
function(n) {
if ("setcookie" == i && -1 == d.inArray(a, o)) {
var r = {
errno: 0,
errmsg: "",
domain: "not mainDomain"
};
return t.done(r)
}
return t.fail({
method: "get",
url: e,
status: n
})
})
},
post: function(e) {
var t = this,
n = d.Deferred(),
o = null,
c = i.utils.getGuid(),
s = "QiUserJsonp" + c,
u = "QucI360Form" + c,
l = "QucI360Iframe" + c,
f = d('<iframe name="' + l + '">').hide(),
h = d.extend({},
this.param, {
proxy: i.getConfig("proxy"),
callback: s,
func: s
}),
m = a(h, {
name: u,
target: l,
url: e || this.ajaxOpt.url
});
return window[s] = function(e) {
clearTimeout(o);
var i;
for (var a in e) e.hasOwnProperty(a) && (i = decodeURIComponent(e[a]), i.match(/^(\{.*\})|(\[.*\])$/) && (i = d.parseJSON(i)), e[a] = i);
n.resolve(e),
p.debug("post", r(t.ajaxOpt), t.ajaxOpt, e)
},
o = setTimeout(function() {
n.reject({
method: "post",
url: e,
status: {
status: 0,
statusText: "post \u8bf7\u6c42\u8d85\u65f6"
}
})
},
this.ajaxOpt.timeout),
n.always(function(e) {
try {
delete window[s]
} catch(t) {
window[s] = null
}
}),
d(document.body).append(f).append(m),
d(m).submit(),
n.then(this.done, i.utils.bind(this.fail, this))
},
done: s(0),
fail: function(e) {
if ("https" == this.protocol && "http:" == location.protocol && i.getConfig("retryWithHttp", !0)) return "sso" == this.ajaxOpt.data.o && "getToken" == this.ajaxOpt.data.m && (f = !0),
this.retryHttp(e);
var t = d.Deferred();
return t.reject({
errno: 999999,
errmsg: "string" == d.type(e) ? e: "\u7f51\u7edc\u9519\u8bef"
}),
i.events.trigger("error.sync", e.url || this.ajaxOpt.url),
t.promise()
},
getDomainApi: function(e) {
return e = e || location.hostname.replace(/^(?:.+\.)?(\w+\.\w+)$/, "$1"),
this.protocol + "://login1." + e
},
retryHttp: function(e) {
this.protocol = "http",
this.ajaxOpt.url = this.ajaxOpt.url.replace(/^https/, "http"),
this.I360 = "http://i.msvodx.com";
var t = e.url && e.url.replace(/^https/, "http");
return i.events.trigger("retryHttp.sync", t || this.ajaxOpt.url),
this[e.method](t)
}
});
var g = null;
i.getUserInfoCache = function() {
return g
},
i.sync = {
getRd: function() {
var e = new m({
o: "sso",
m: "getRd"
});
return e.done = function(e) {
var t = d.Deferred();
return e.rd ? t.resolve(e) : t.reject({
errno: "999999",
errmsg: "\u8bf7\u767b\u5f55\u5e10\u53f7"
}),
t.promise()
},
e.get()
},
getToken: function(e) {
return new m({
o: "sso",
m: "getToken",
userName: e
},
{
jsonp: "func"
},
!0).get()
},
actualGetUserInfo: function(t) {
t = e.extend({
o: "sso",
m: "info"
},
t);
var n = new m(t);
return n.done = function(e) {
return d.Deferred().resolve(e)
},
n.get()
},
getUserInfo: function(e, t) {
var n = i.getConfig("headSize", "100_100"),
r = i.getConfig("currentDomain", ""),
o = {
"20_20": "a",
"48_48": "s",
"50_50": "e",
"64_64": "m",
"70_70": "i",
"100_100": "b",
"150_150": "q"
};
if (void 0 === e ? e = !0 : "boolean" != d.type(e) && (t = e, e = !1), e && g && void 0 === t) return d.Deferred().resolve(g).promise();
var a = new m({
o: "sso",
m: "info",
show_name_flag: "1",
head_type: o[n]
});
return a.done = function(e) {
var n = d.Deferred();
return e.qid ? (void 0 === t && (g = e), n.resolve(e)) : n.reject({
errno: "999999",
errmsg: "\u65e0\u6cd5\u83b7\u53d6\u767b\u5f55\u72b6\u6001"
}),
n.promise()
},
i.getConfig("ignoreCookie") ? a.get() : r && i.utils.getCookie("Q") ? a.get(a.getDomainApi(r)) : i.utils.getCookie("Q") ? a.get(a.getDomainApi(t)) : d.Deferred().reject(i.ERROR.NOT_SIGNED_IN).promise()
},
getUserSecInfo: function(e) {
var t = new m({
crumb: e
});
return t.get(t.I360 + "/security/getUserSecInfo")
},
getIdentifyMethod: function(e, t) {
return new m({
o: "User",
m: "getSecWays",
crumb: e,
sensop: t
}).post()
},
checkWeakPwd: function(e) {
var t = new m({
password: c(e)
});
return t.get(t.I360 + "/reg/checkWeakPwd")
},
modifyPassword: function(e, t) {
return new m({
o: "user",
m: "modifyPwd",
newPwd: c(t),
rePwd: c(t),
crumb: e
},
{},
!0).post()
},
getCaptchaUrl: function(e) {
var t = i.getConfig("captchaAppId", "i360"),
n = new m({
captchaScene: e,
captchaApp: t
});
return n.get(n.I360 + "/QuCapt/getQuCaptUrl")
},
checkEmailExist: function(e) {
var t = new m({
o: "User",
m: "checkemail",
loginEmail: e
});
return t.done = s(202),
t.get()
},
checkUsernameExist: function(e) {
var t = new m({
o: "User",
m: "checkuser",
userName: e
});
return t.done = s(1e4),
t.get()
},
checkNicknameExist: function(e) {
var t = new m({
o: "User",
m: "checknickname",
nickName: e
});
return t.done = s(259),
t.get()
},
checkMobileNumberExist: function(e, t, n) {
return e = t ? t + e: e,
n = n || "",
new m({
o: "User",
m: "checkmobile",
mobile: e,
type: n
}).get()
},
checkEmailStatus: function(e) {
var t = new m({
crumb: e
});
return t.get(t.I360 + "/active/checkLogin1EmailStatus")
},
getMobileState: function() {
return new m({
o: "user",
m: "getStateList",
quc_lang: ""
}).get()
},
checkMobileLogin: function(e) {
return new m({
o: "user",
m: "checkLoginMethod",
acctype: 2,
lm: 1,
account: e
}).get()
},
checkSignUpCaptchaRequired: function() {
var e = new m({
captchaApp: i.getConfig("captchaAppId", "i360")
});
return e.get(e.I360 + "/reg/checkcap")
},
checkSignInCaptchaRequired: function(e) {
var t = {
o: "sso",
m: "checkNeedCaptcha",
account: e,
captchaApp: i.getConfig("captchaAppId", "i360")
};
return new m(t).get()
},
identify: function(e, t, n, i, r) {
var o = {
o: "User",
m: "checkSecWay",
crumb: e,
vtype: n,
sensop: t
};
return "pwd" == n && (i = c(i), o.captcha = r),
o.vc = i,
new m(o, {},
!0).post()
},
setUsername: function(e, t) {
return new m({
o: "User",
m: "modifyUserName",
userName: t,
crumb: e
},
{},
!0).post().done(function() {
l()
})
},
setNickname: function(e, t) {
return new m({
o: "User",
m: "modifyNickName",
nickName: t,
crumb: e
},
{},
!0).post().done(function() {
l()
})
},
setEmail: function(e, t) {
var n = new m({
crumb: e,
loginEmail: t
},
{},
!0);
return n.post(n.I360 + "/active/doSetLoginEmail").done(function() {
l()
})
},
setSecEmail: function(e, t) {
var n = new m({
crumb: e,
secemail: t
},
{},
!0);
return n.post(n.I360 + "/profile/dosetsecemail").done(function() {
l()
})
},
setLoginMethod: function(e, t) {
return new m({
o: "user",
m: "modifyLoginMethod",
loginMethod: 1,
crumb: e,
toValue: t
},
{},
!0).post().done(function() {
l()
})
},
setCookie: function(e, t) {
p.debug("set cookie", e, t);
var n = i.getConfig("supportHttps", h),
r = "https" == i.getConfig("protocol", null).toLowerCase();
e = decodeURIComponent(e),
void 0 === t ? t = i.getConfig("domainList", []) : d.isArray(t) || (t = [t]);
var o, a = [];
return d.each(t,
function(t, i) {
d.inArray(i, n) > -1 ? (o = new m({
o: "sso",
m: "setcookie",
s: e
},
{
jsonp: "func"
},
!0), a.push(o.get(o.getDomainApi(i)))) : r || (o = new m({
o: "sso",
m: "setcookie",
s: e
},
{
jsonp: "func"
}), a.push(o.get(o.getDomainApi(i))))
}),
d.when.apply(d, a)
},
sendSmsTokenNeedPhrase: function(e, t, n, r, o, a) {
var c = "";
"boolean" == typeof e && (n = t, t = e, r = n, o = r, e = null),
"login1" == a ? c = 0 : "reg1" == a && (c = 2);
var s = t ? 1 : 2,
u = {
condition: s,
account: n,
crumb: e,
sms_scene: c,
captcha: r,
vt: o
};
return i.sync.sendSmsCodeNew(u)
},
sendSmsCodeNew: function(t) {
return t = e.extend({
o: "User",
m: "sendSmsCodeNew"
},
t),
new m(t).post()
},
bindMobileCheck: function(e) {
return new m({
o: "User",
mobile: e,
m: "bindMobileCheck"
}).get()
},
sendSmsToken: function(t, n, i, r) {
var o = "";
"boolean" == typeof t && (i = n, n = t, t = null),
"object" == typeof i && (i = i.areaCode + i.mobileNumber),
"findpwd" == r && (o = 1);
var a;
return a = e.isNumber(n) ? n: n ? 1 : 2,
new m({
o: "User",
m: "sendSmsCode",
condition: a,
account: i,
crumb: t,
sms_scene: o
}).post()
},
sendEmailToken: function(e, t) {
return new m({
o: "User",
m: "sendEmsCode",
condition: 1,
crumb: e,
vtype: t
}).post()
},
sendActivationEmail: function(e) {
var t = new m({
crumb: e
});
return t.post(t.I360 + "/active/doSendActiveEmail")
},
sendSecActivationEmail: function(e) {
var t = new m({
crumb: e
});
return t.post(t.I360 + "/profile/resendSecurityEmail")
},
sendSignUpActivationEmail: function(e) {
return (new m).get(e)
},
bindMobile: function(e, t, n) {
return t = t.areaCode + t.mobileNumber,
new m({
o: "user",
m: "bindMobile",
crumb: e,
mobile: t,
smscode: n
},
{},
!0).post().done(function() {
l()
})
},
bindMobileNew: function(e, t, n, i) {
return t = t.areaCode + t.mobileNumber,
new m({
o: "user",
m: "bindMobileNew",
crumb: e,
mobile: t,
smscode: n,
force_bind: i ? 1 : 0
},
{},
!0).post().done(function() {
l()
})
},
signUp: function(e) {
var n = {
captchaFlag: !0,
captchaApp: i.getConfig("captchaAppId", "i360"),
smDeviceId: t.getShumeiDeviceId()
};
e = d.extend(n, e),
e.password = c(e.password),
e.passwordAgain = c(e.passwordAgain) || e.password,
u(e, {
emailActiveFlag: "login1EmailActiveFlag",
passwordAgain: "rePassword",
smsToken: "smscode",
nickname: "nickName",
username: "userName",
agreeLicence: "is_agree"
});
var r = new m(e, {},
!0);
return r.post(r.I360 + "/reg/doregAccount").done(function() {
l()
})
},
signIn: function(e) {
var n = {
o: "sso",
m: "login1",
lm: "mobile" == e.type ? 1 : 0,
captFlag: 1,
rtype: "data",
validatelm: i.getConfig("signIn.mobile.isMustUseMobileSignIn", !1) ? 1 : 0,
isKeepAlive: !1,
captchaApp: i.getConfig("captchaAppId", "i360"),
userName: e.account,
smDeviceId: t.getShumeiDeviceId()
};
return "mobile" == e.type ? e.acctype = 2 : e.password = c(e.password),
d.when().then(function() {
return e.token || i.sync.getToken(e.account).done(function(t) {
e.token = t.token
})
}).then(function() {
return new m(d.extend(n, e), {},
!0).post().done(function() {
l()
})
})
},
signOut: function(e) {
var t = i.getConfig("supportHttps", h),
n = "https" == i.getConfig("protocol", null).toLowerCase();
void 0 === e || !0 === e ? e = i.getConfig("domainList", []) : d.isArray(e) || (e = [e]);
var r, o = [];
return d.each(e,
function(e, i) {
d.inArray(i, t) > -1 ? (r = new m({
o: "sso",
m: "logout"
},
{
jsonp: "func"
},
!0), o.push(r.get(r.getDomainApi(i)))) : n || (r = new m({
o: "sso",
m: "logout"
},
{
jsonp: "func"
}), o.push(r.get(r.getDomainApi(i))))
}),
l(),
d.when.apply(d, o)
},
fillProfile: function(e, t, n, i, r) {
return i = i || n,
new m({
o: "User",
m: "perfectInfo",
crumb: e,
userName: t,
captcha: r,
password: c(n),
rePassword: c(i)
},
{},
!0).post().done(function() {
l()
})
},
perfectMobile: function(e, t, n, i, r) {
return new m({
o: "user",
m: "perfectMobile",
crumb: e,
mobile: t,
password: c(n),
rePassword: c(n),
smscode: i,
force_bind: r ? 1 : 0
},
{}).post()
},
checkQrCodeSignInStatus: function() {
var e = i.getConfig("currentDomain", ""),
t = new m({
o: "sso",
m: "qrLogin1"
},
{
jsonp: "func"
});
return t.get(t.getDomainApi(e))
},
getAuthenticationStatus: function(e) {
return new m({
o: "User",
m: "getShiMingStatus",
crumb: e
}).get()
},
submitAuthenMobile: function(e, t, n) {
return new m({
o: "User",
m: "verifyShiMingCaptcha",
mobile: e,
captcha: t,
crumb: n
},
{},
!0).post()
},
fillAuthenInfo: function(e, t, n) {
return new m({
o: "User",
m: "verifyShiMingSmsCode",
vt: e,
vc: t,
crumb: n
},
{},
!0).post()
},
authSendSmsToken: function(e, t) {
return new m({
o: "User",
m: "sendShiMingSmsCode",
crumb: e,
vt: t
},
{},
!0).post()
}
};
var v = {};
d.each(i.sync,
function(e, t) {
var n = function() {
var n = arguments[0],
r = e + (d.isPlainObject(n) ? i.utils.JSON.stringify(n) : [].join.apply(arguments)),
o = v[r];
return o ? v[r] : (o = v[r] = t.apply(i.sync, arguments), o.always(function() {
delete v[r]
}), o)
};
n.funcName = t.funcName = "sync." + e,
i.sync[e] = n
})
} (QHPass)
}).call(t, n(1))
},
function(e, t, n) { !
function(e) {
var t = n(13).getLogger("config"),
i = e.$,
r = {
charset: document.charset || document.defaultCharset || document.characterSet || "UTF-8",
domainList: ["360pay.cn", "so.com", "haosou.com", "msvodx.com", "360.com", "qiku.com", "360shouji.com"],
protocol: location.protocol.replace(":", ""),
proxy: location.protocol + "//" + location.host + "/psp_jump.html",
ignoreCookie: !1
};
e.getConfig = function(e, n) {
n = void 0 !== n ? n: null;
for (var o, a = r,
c = e.split("."); c.length > 0;) if (o = c.shift(), 0 != o.length) {
if (void 0 === a[o] || c.length > 0 && !i.isPlainObject(a[o])) return n;
a = a[o]
}
var s = i.isPlainObject(a) ? i.extend({},
a) : a;
return t.verbose("get config", {
key: e,
value: s
}),
s
},
e.setConfig = function(t, n) {
if (!t) return e.events.trigger("warn.config", "setConfig parameter key is null or undefined"),
e;
if (i.isPlainObject(t)) return o(!0, r, t),
e;
for (var a, c, s = r,
u = t.split("."), l = !1; u.length > 0;) {
if (c = u.shift(), void 0 === s[c] && (s[c] = {}), !i.isPlainObject(s[c]) && u.length > 0) {
l = !0;
break
}
a = s,
s = s[c]
}
return l ? e.events.trigger("warn.config", "setConfig cannot be set on " + t) : a[c] = n,
e
};
var o = function() {
var e, t, n, r, a, c = arguments[0] || {},
s = 1,
u = arguments.length,
l = !1;
for ("boolean" == typeof c && (l = c, c = arguments[1] || {},
s = 2), "object" == typeof c || i.isFunction(c) || (c = {}); s < u; s++) if (null != (r = arguments[s])) for (n in r) e = c[n],
t = r[n],
c !== t && (l && t && i.isPlainObject(t) ? (a = e && i.isPlainObject(e) ? e: {},
c[n] = o(l, a, t)) : void 0 !== t && (c[n] = t));
return c
}
} (QHPass)
},
function(e, t, n) { !
function(e) {
var t = n(13).getLogger("events"),
i = e.$,
r = i({});
e.events = {
trigger: function(e, n) {
t.debug("trigger", e),
e = e.toLowerCase(),
r.triggerHandler(e, n);
var i = e.match(/^([^.]+)\.(.*)$/);
i && (e = i[1] + ".\\*", n = {
namespace: i[2],
data: n
},
r.triggerHandler(e, n))
},
getHandler: function(e) {
e = e.toLowerCase(e + "");
var t = e.split("."),
n = t[0];
return i._data(r[0]).events[n]
}
},
i.each(["on", "off", "one"],
function(t, n) {
e.events[n] = function() {
var t, o, a = [].slice.apply(arguments);
a[0] = a[0].toLowerCase(),
a[0].match(/\.\*$/) && (o = a.pop(), t = function(e, t) {
e.namespace = e.namespace.replace(/\\\*/, t.namespace),
e.isWildcard = !0,
o.call(this, e, t.data)
},
t.guid = o.guid || (o.guid = e.utils.getGuid()), a.push(t)),
i.fn[n].apply(r, a)
}
})
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = e.utils,
i = parseInt((new Date).getTime().toString().substr(4), 10);
n.isExisted = function(e) {
return e.length > 0
},
n.getGuid = function() {
return i++
};
var r = "quc-ie-placeholder";
if (n.initPlaceholder = function(e) {
t(e).placeholder({
customClass: r
})
},
n.resetPlaceholder = function(e) {
t(e).each(function() {
var e = t(this);
e.hasClass(r) && (e.removeData("placeholderEnabled"), e.val(""), e.removeClass(r), e.data("placeholder-password") && e.remove())
})
},
n.parseCallback = function(e) {
return "function" == t.type(e) ? e: !0 === e ?
function() {
location.reload()
}: "string" == t.type(e) && 0 === e.indexOf("http") ?
function() {
location.href = e
}: function() {}
},
n.setCookie = function(e, t, n) {
var i = new Date;
n = void 0 !== n ? n: 2,
i.setTime(i.getTime() + 864e5 * n),
document.cookie = e + "=" + encodeURIComponent(t) + ";expires=" + i.toGMTString() + ";path=/"
},
n.getCookie = function(e) {
var t = null,
n = new RegExp("(^| )" + e + "=([^;]*)(;|$)"),
i = document.cookie.match(n);
return i && (t = decodeURIComponent(i[2])),
t
},
n.throttle = function(e, t, n, i) {
var r, o, a, c = +new Date,
s = 0,
u = 0,
l = null,
p = function() {
u = c,
e.apply(o, a)
};
return function() {
c = +new Date,
o = this,
a = arguments,
r = c - (i ? s: u) - t,
clearTimeout(l),
i ? n ? l = setTimeout(p, t) : r >= 0 && p() : r >= 0 ? p() : n && (l = setTimeout(p, -r)),
s = c
}
},
n.debounce = function(e, t, i) {
return n.throttle(e, t, i, !0)
},
n.bind = function(e, n) {
if (e.bind && e.bind === Function.prototype.bind) return e.bind(n);
if (!t.isFunction(e)) throw new TypeError;
var i = [].slice.call(arguments, 2),
r = function() {
var t = [].slice.apply(arguments);
if (! (this instanceof r)) return e.apply(n, i.concat(t));
var o = function() {};
o.prototype = e.prototype;
var a = new o;
o.prototype = null;
var c = e.apply(a, i.concat(t));
return Object(c) === c ? c: a
};
return r
},
n.initInputId = function(e) {
t(e).find(".quc-input:not([id])").each(function(e, i) {
var r = t(i),
o = r.parent();
if (o = "LABEL" == o[0].tagName ? o: o.siblings("label"), o.length) {
var a = "quc_" + r.attr("name") + "_" + n.getGuid();
r.attr("id", a),
o.attr("for", a)
}
})
},
n.selectText = function(e, n, i) {
var r = t(e),
o = r.val().length;
for (n = parseInt(n) || 0, i = parseInt(i) || o; n < 0;) n += o;
r.each(function(e, t) {
if (t.createTextRange) {
var r = t.createTextRange();
r.collapse(!0),
r.moveStart("character", n),
r.moveEnd("character", i),
r.select()
} else if (t.setSelectionRange) t.setSelectionRange(n, i);
else {
if (!t.selectionStart) return ! 1;
t.selectionStart = n,
t.selectionEnd = i
}
}),
r.focus()
},
n.JSON = {
parse: t.parseJSON,
stringify: window.JSON && JSON.stringify ? JSON.stringify: function(e) {
var n = function(e) {
var i = typeof e,
r = t.isArray(e);
if ("string" == i) return '"' + e.replace(/"/g, '"') + '"';
if ("number" == i || "boolean" == i) return e;
if (r || t.isPlainObject(e)) {
var o = t.map(e,
function(e, t) {
return r ? n(e) : '"' + t.toString().replace(/"/g, '"') + '":' + n(e)
}).join();
return r ? "[" + o + "]": "{" + o + "}"
}
return null
},
i = n(e);
return i && i.toString()
}
},
n.support = t.extend({
fixed: !1
},
t.support), t(function() {
try {
var e = t(document.body),
i = t("<div>").height(3e3),
r = t("<div>").css({
position: "fixed",
top: 100
}).html("x").appendTo(i),
o = e.scrollTop();
i.appendTo(e);
var a = t(document.documentElement).position().top;
a = a > 0 ? a: 0,
e.scrollTop(500);
var c = r[0].offsetTop;
n.support.fixed = c - a == 100,
i.remove(),
e.scrollTop(o)
} catch(s) {}
}), n.browser = function() {
var e = window.navigator,
t = e.userAgent.toLowerCase(),
n = /(msie|webkit|gecko|presto|opera|safari|firefox|chrome|maxthon|android|ipad|iphone|webos|hpwos|trident)[ \/os]*([\d_.]+)/gi,
i = {
platform: e.platform
};
if (t.replace(n,
function(e, t, n) {
i[t] || (i[t] = n)
}), i.opera && t.replace(/opera.*version\/([\d.]+)/,
function(e, t) {
i.opera = t
}), !i.msie && i.trident && t.replace(/trident\/[0-9].*rv[ :]([0-9.]+)/gi,
function(e, t) {
i.msie = t
}), i.msie) {
i.ie = i.msie;
var r = parseInt(i.msie, 10);
i["ie" + r] = !0
}
return i
} (), n.browser.ie && n.browser.ie6) try {
document.execCommand("BackgroundImageCache", !1, !0)
} catch(o) {}
e.events.on("afterShow.* DOMUpdated.*",
function(e, t) {
n.initInputId(t)
})
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = window.document,
i = {
set: function(e, t) {
localStorage.setItem(e, t)
},
get: function(e, t) {
var n = localStorage.getItem(e);
return null !== n ? n: t
},
remove: function(e) {
localStorage.removeItem(e)
}
},
r = {
set: function(e, t) {
sessionStorage.setItem(e, t)
},
get: function(e, t) {
var n = sessionStorage.getItem(e);
return null !== n ? n: t
},
remove: function(e) {
sessionStorage.removeItem(e)
}
},
o = {
set: function(e, t, i) {
i = i || {};
var r = i.expires;
"number" == typeof r && (r = new Date, r.setTime(r.getTime() + i.expires));
try {
return n.cookie = e + "=" + escape(t) + (r ? ";expires=" + r.toGMTString() : "") + (i.path ? ";path=" + i.path: "") + (i.domain ? "; domain=" + i.domain: ""),
!0
} catch(o) {
return ! 1
}
},
get: function(e, t) {
try {
var i = new RegExp("(^| )" + e + "=([^;]*)(;|$)"),
r = n.cookie.match(i);
if (r) return unescape(r[2])
} catch(o) {}
return t
},
remove: function(e) {
this.set(e, null, -100)
}
},
a = e.utils.isCookieEnabled = function() {
if (!n.cookie && !navigator.cookieEnabled) return ! 1;
var e = "test_cookie_enable",
t = "test" + Math.random();
if (!o.set(e, t)) return ! 1;
var i = o.get(e);
return o.remove(e),
t == i
},
c = {
storeName: "qucUserDataStore",
init: function() {
var i = this;
if (!i.isInit) {
i.isInit = !0;
var r = i.object = t.extend(!0, {},
s);
r.init(),
t(function() {
var o = "QhpassUserData",
a = e.getConfig("proxy") + "?fun=" + o,
c = t("<iframe>").attr("src", a).hide();
t(n.body).append(c),
window[o] = function() {
clearTimeout(s),
delete i.object;
var e = c[0].contentWindow,
n = e.document,
o = i.store = n.createElement("input");
setTimeout(function() {
o.addBehavior("#default#userData"),
n.body.appendChild(o),
o.load(i.storeName),
t.each(r.data,
function(e, t) {
o.setAttribute(e, t)
}),
o.save(i.storeName)
},
30)
};
var s = setTimeout(function() {
c.remove()
},
2e4)
})
}
},
set: function(e, t) {
this.object ? this.object.set(e, t) : (this.store.load(this.storeName), this.store.setAttribute(e, t), this.store.save(this.storeName))
},
get: function(e, t) {
if (this.object) return this.object.get(e, t);
this.store.load(this.storeName);
var n = this.store.getAttribute(e);
return null !== n ? n: t
},
remove: function(e) {
this.object ? this.object.remove(e) : this.store.removeAttribute(e)
}
},
s = {
init: function() {
this.data = this.data || {}
},
set: function(e, t) {
this.data[e] = t
},
get: function(e, t) {
var n = this.data[e];
return void 0 !== n ? n: t
},
remove: function(e) {
delete this.data[e]
}
},
u = navigator.userAgent.toLowerCase(),
l = u.match(/msie ([\d.]+)/),
p = l && l[1],
d = 6 == p || 7 == p;
e.utils.storage = function(e) {
var t;
switch (e) {
default:
case "local":
try {
t = window.localStorage ? i: d ? c: s
} catch(n) {
t = s
}
break;
case "session":
try {
t = window.sessionStorage ? r: s
} catch(n) {
t = s
}
break;
case "cookie":
t = a() ? o: s;
break;
case "page":
t = s
}
return t.init && t.init(),
t
},
d && c.init()
} (QHPass)
},
function(e, t, n) { (function(e) { !
function(t) {
var n = t.$ || window.$,
i = '<a class="quc-link quc-link-login1" href="http://i.msvodx.com/login" target="_blank">\u7acb\u5373\u767b\u5f55</a>',
r = {
REALNAME_EMPTY: {
errno: 204,
errmsg: "\u8bf7\u8f93\u5165\u60a8\u7684\u771f\u5b9e\u59d3\u540d",
errmsg_en: "Please enter actual name"
},
REALNAME_INVALID: {
errno: 227,
errmsg: "\u8bf7\u786e\u8ba4\u60a8\u8f93\u5165\u7684\u771f\u5b9e\u59d3\u540d\u662f\u5426\u6709\u8bef",
errmsg_en: "Actual name error"
},
ACCOUNT_EMPTY: {
errno: 1030,
errmsg: "\u8bf7\u8f93\u5165360\u5e10\u53f7",
errmsg_en: "Please enter your account"
},
ACCOUNT_INVALID: {
errno: 1035,
errmsg: "\u8bf7\u786e\u8ba4\u60a8\u7684\u5e10\u53f7\u8f93\u5165\u662f\u5426\u6709\u8bef",
errmsg_en: "Account error"
},
ACCOUNT_DUPLICATE: {
errno: 1037,
errmsg: "\u8be5\u5e10\u53f7\u5df2\u7ecf\u6ce8\u518c\uff0c" + i,
errmsg_en: "Account occupied"
},
USERNAME_DUPLICATE: {
errno: 213,
errmsg: "\u7528\u6237\u540d\u5df2\u7ecf\u88ab\u4f7f\u7528\uff0c" + i,
errmsg_en: "Username occupied"
},
USERNAME_EMPTY: {
errno: 215,
errmsg: "\u8bf7\u8f93\u5165\u7528\u6237\u540d",
errmsg_en: "Please enter username"
},
USERNAME_INAPPROPRIATE: {
errno: 225,
errmsg: "\u7528\u6237\u540d\u5305\u542b\u4e0d\u9002\u5f53\u5185\u5bb9",
errmsg_en: ""
},
USERNAME_INVALID: {
errno: 199,
errmsg: '\u7528\u6237\u540d\u5e94\u4e3a2-14\u4e2a\u5b57\u7b26,\u652f\u6301\u4e2d\u82f1\u6587\u3001\u6570\u5b57\u6216"_"',
errmsg_en: "Username error"
},
USERNAME_NUMBER: {
errno: 200,
errmsg: "\u7528\u6237\u540d\u4e0d\u80fd\u5168\u4e3a\u6570\u5b57",
errmsg_en: ""
},
NICKNAME_EMPTY: {
errno: 205,
errmsg: "\u8bf7\u8f93\u5165\u6635\u79f0",
errmsg_en: "Please enter nickname"
},
NICKNAME_DUPLICATE: {
errno: 260,
errmsg: "\u6635\u79f0\u5df2\u7ecf\u88ab\u4f7f\u7528",
errmsg_en: "Nickname occupied"
},
NICKNAME_INAPPROPRIATE: {
errno: 226,
errmsg: "\u6635\u79f0\u5305\u542b\u4e0d\u9002\u5f53\u5185\u5bb9",
errmsg_en: ""
},
NICKNAME_NUMBER: {
errno: 262,
errmsg: "\u6635\u79f0\u4e0d\u80fd\u5168\u90e8\u662f\u6570\u5b57",
errmsg_en: ""
},
NICKNAME_INVALID: {
errno: 15e3,
errmsg: '\u6635\u79f0\u5e94\u4e3a2-14\u4e2a\u5b57\u7b26,\u652f\u6301\u4e2d\u82f1\u6587\u3001\u6570\u5b57\u3001"_"\u6216"."',
errmsg_en: ""
},
EMAIL_EMPTY: {
errno: 203,
errmsg: "\u8bf7\u8f93\u5165\u90ae\u7bb1",
errmsg_en: "Please enter mail address"
},
EMAIL_INVALID: {
errno: 1532,
errmsg: "\u90ae\u7bb1\u683c\u5f0f\u6709\u8bef",
errmsg_en: "E-mail format error"
},
EMAIL_NOT_ACTIVATED: {
errno: 2e4
},
MOBILE_EMPTY: {
errno: 1107,
errmsg: "\u8bf7\u8f93\u5165\u624b\u673a\u53f7",
errmsg_en: "Please enter phone number"
},
MOBILE_INVALID: {
errno: 1100,
errmsg: "\u624b\u673a\u53f7\u683c\u5f0f\u6709\u8bef",
errmsg_en: "Phone number error"
},
MOBILE_DUPLICATE: {
errno: 1106,
errmsg: "\u8be5\u624b\u673a\u53f7\u5df2\u7ecf\u6ce8\u518c\uff0c" + i,
errmsg_en: "Phone number occupied"
},
CAPTCHA_INVALID: {
errno: 78e3,
errmsg: "\u9a8c\u8bc1\u7801\u9519\u8bef\u8bf7\u91cd\u65b0\u8f93\u5165",
errmsg_en: "Please enter the verification code"
},
CAPTCHA_INVALID_OLD: {
errno: 1670,
errmsg: "\u9a8c\u8bc1\u7801\u9519\u8bef\u8bf7\u91cd\u65b0\u8f93\u5165",
errmsg_en: "Please enter the verification code"
},
CAPTCHA_EMPTY: {
errno: 78002,
errmsg: "\u8bf7\u8f93\u5165\u9a8c\u8bc1\u7801",
errmsg_en: "Please enter the verification code"
},
CAPTCHA_APPID_INVALID: {
errno: 1300,
errmsg: "\u9a8c\u8bc1\u7801\u683c\u5f0f\u6709\u8bef",
errmsg_en: "Incorrect Verification Code"
},
SMS_TOKEN_EMPTY: {
errno: 1350,
errmsg: "\u8bf7\u8f93\u5165\u6821\u9a8c\u7801",
errmsg_en: "Please enter the verification code"
},
SMS_TOKEN_INCORRECT: {
errno: 1351,
errmsg: "\u6821\u9a8c\u7801\u8f93\u5165\u6709\u8bef",
errmsg_en: "Verification Code Error"
},
PASSWORD_TOO_SHORT: {
errno: 51066,
errmsg: "\u5bc6\u7801\u4e0d\u80fd\u5c11\u4e8e8\u4f4d\u5b57\u7b26\uff0c\u8bf7\u91cd\u65b0\u8f93\u5165",
errmsg_en: "The password can't be less than 8 characters, please reenter"
},
PASSWORD_TOO_LONG: {
errno: 51067,
errmsg: "\u5bc6\u7801\u6700\u5927\u957f\u5ea6\u4e3a20\u4f4d\uff0c\u8bf7\u91cd\u65b0\u8f93\u5165",
errmsg_en: "The password maximum length is 20 characters, please reenter"
},
PASSWORD_TOO_SIMPLE: {
errno: 51068,
errmsg: "\u81f3\u5c11\u5305\u542b\u6570\u5b57/\u5b57\u6bcd/\u5b57\u7b26\u4e24\u79cd\u7ec4\u5408\uff0c\u8bf7\u91cd\u65b0\u8f93\u5165",
errmsg_en: "Contain at least two combinations of number/letter/character, please reenter"
},
PASSWORD_HAS_EMPTY: {
errno: 51069,
errmsg: "\u5bc6\u7801\u4e0d\u5141\u8bb8\u6709\u7a7a\u683c\uff0c\u8bf7\u91cd\u65b0\u8f93\u5165",
errmsg_en: "The password isn't allowed to have Spaces, please reenter"
},
PASSWORD_CHAR_INVALID: {
errno: 51070,
errmsg: "\u4e0d\u80fd\u542b\u6709\u975e\u6cd5\u5b57\u7b26\uff0c\u8bf7\u91cd\u65b0\u8f93\u5165",
errmsg_en: "Can't contain illegal characters, please reenter"
},
PASSWORD_ACCOUNT_INCLUDES: {
errno: 51071,
errmsg: "\u60a8\u7684\u5bc6\u7801\u4e0e\u7528\u6237\u540d\u8fc7\u4e8e\u76f8\u4f3c\uff0c\u8bf7\u91cd\u65b0\u8f93\u5165",
errmsg_en: "Your password is too similar to the user name, please reenter"
},
PASSWORD_EMPTY: {
errno: 211,
errmsg: "\u8bf7\u8f93\u5165\u5bc6\u7801",
errmsg_en: "You can't leave password empty"
},
PASSWORD_INVALID: {
errno: 1065,
errmsg: "\u5bc6\u7801\u957f\u5ea6\u5e94\u4e3a8-20\u4e2a\u5b57\u7b26",
errmsg_en: "Use at least 8 characters"
},
PASSWORD_LEVEL_LOW: {
errno: 54999,
errmsg: "\u5bc6\u7801\u5b89\u5168\u7ea7\u522b\u8fc7\u4f4e",
errmsg_en: "These passwords are easy to guess"
},
PASSWORD_WEAK: {
errno: 54999,
errmsg: "\u5bc6\u7801\u5f31\uff0c\u6709\u98ce\u9669\uff0c\u8bf7\u91cd\u65b0\u8f93\u5165",
errmsg_en: "These passwords are easy to guess"
},
PASSWORD_ORDERED: {
errno: 54999,
errmsg: "\u5bc6\u7801\u4e0d\u80fd\u4e3a\u8fde\u7eed\u5b57\u7b26",
errmsg_en: "These passwords are easy to guess"
},
PASSWORD_CHAR_REPEAT: {
errno: 54999,
errmsg: "\u5bc6\u7801\u4e0d\u80fd\u5168\u4e3a\u76f8\u540c\u5b57\u7b26",
errmsg_en: "These passwords are easy to guess"
},
PASSWORD_WRONG: {
errno: 220,
errmsg: "\u767b\u5f55\u5bc6\u7801\u9519\u8bef\uff0c\u8bf7\u91cd\u65b0\u8f93\u5165",
errmsg_en: "These passwords don't match"
},
PASSWORD_NOT_MATCH: {
errno: 1091,
errmsg: "\u4e24\u6b21\u5bc6\u7801\u8f93\u5165\u4e0d\u4e00\u81f4",
errmsg_en: "These passwords don't match"
},
PASSWORD_FULL_SHARP: {
errno: 54e3,
errmsg: "\u5bc6\u7801\u4e0d\u80fd\u5305\u542b\u4e2d\u6587\u5b57\u7b26\uff0c\u8bf7\u91cd\u65b0\u8bbe\u7f6e",
errmsg_en: "Please use only letters (a-z), numbers, and periods."
},
IDENTIFY_EXPIRE: {
errno: 153e3
},
NOT_SIGNED_IN: {
errno: 1501,
errmsg: "\u7528\u6237\u672a\u767b\u9646",
errmsg_en: ""
},
UNKNOWN_ERROR: {
errno: 999999,
errmsg: "\u672a\u77e5\u9519\u8bef",
errmsg_en: ""
},
SUCCESS: {
errno: 0,
errmsg: "\u64cd\u4f5c\u6210\u529f",
errmsg_en: ""
},
TIME_OUT: {
errno: 1,
errmsg: "\u7f51\u7edc\u8d85\u65f6",
errmsg_en: ""
}
},
o = "errmsg",
a = window.i18n;
a && a.is("en") && (o = "errmsg_en");
var c = t.ERROR = e.forIn(r,
function(e, t) {
e.errmsg = e[o] || e.errmsg
}),
s = t.utils = t.utils || {},
u = {
1105 : "\u8be5\u624b\u673a\u53f7\u672a\u6ce8\u518c360\u5e10\u53f7",
1402 : "\u624b\u673a\u53f7\u5f53\u5929\u53d1\u9001\u77ed\u4fe1\u6b21\u6570\u8d85\u9650",
201 : "\u8be5\u90ae\u7bb1\u5df2\u7ecf\u6ce8\u518c\uff0c" + i,
3e4: "\u8be5\u624b\u673a\u53f7\u5df2\u7ecf\u6ce8\u518c\uff0c\u8bf7\u76f4\u63a5\u7528\u624b\u673a\u53f7\u767b\u5f55",
30007 : "\u8be5\u624b\u673a\u53f7\u5df2\u7ecf\u6ce8\u518c\uff0c\u8bf7\u76f4\u63a5\u7528\u624b\u673a\u53f7\u767b\u5f55",
65002 : '\u8be5\u5e10\u53f7\u672a\u5f00\u542f\u77ed\u4fe1\u767b\u5f55\u529f\u80fd\uff0c<a class="quc-link" href="http://i.msvodx.com/security/setloginmethod" target="_blank">\u7acb\u5373\u5f00\u542f</a>',
65001 : '\u8be5\u5e10\u53f7\u53ea\u80fd\u901a\u8fc7\u77ed\u4fe1\u767b\u5f55\uff0c<a class="quc-link quc-link-login" href="http://i.msvodx.com/security/setloginmethod" target="_blank">\u5173\u95ed\u6b64\u529f\u80fd</a>',
221 : '\u5e10\u53f7\u88ab\u5c01\u7981\uff0c<a class="quc-link quc-link-login" href="http://i.msvodx.com/complaint" target="_blank">\u70b9\u6b64\u8054\u7cfb\u5ba2\u670d</a>',
78001 : "\u63d0\u4ea4\u8fc7\u4e8e\u9891\u7e41\uff0c\u8bf7\u7a0d\u540e\u91cd\u8bd5"
};
n.each(c,
function(e, t) {
t.errmsg && t.errmsg.length > 0 && (u[t.errno] = t.errmsg)
}),
s.isSameError = function(e, t) {
return void 0 !== e.errno && void 0 !== t.errno && e.errno === t.errno
},
s.defineError = function(e, t) {
var n;
for (var i in c) c.hasOwnProperty(i) && c[i].errno == e && (n = c[i], n.errmsg = t);
u[e] = t
},
s.getErrorMsg = function(e, t) {
return n.isPlainObject(e) && (t = e.errmsg, e = e.errno),
u[e] || t.replace(/\+/g, " ").replace(/class=(['"]).+?\1/, 'class="quc-link"')
},
s.getErrorType = function(e) {
switch (e = e.errno || e) {
case c.MOBILE_EMPTY.errno:
case c.MOBILE_INVALID.errno:
case c.MOBILE_DUPLICATE.errno:
return "mobile";
case c.EMAIL_EMPTY.errno:
case c.EMAIL_INVALID.errno:
return "email";
case c.USERNAME_EMPTY.errno:
case c.USERNAME_INVALID.errno:
case c.USERNAME_DUPLICATE.errno:
case c.USERNAME_NUMBER.errno:
case c.USERNAME_INAPPROPRIATE.errno:
return "username";
case c.NICKNAME_EMPTY.errno:
case c.NICKNAME_INVALID.errno:
case c.NICKNAME_DUPLICATE.errno:
case c.NICKNAME_INAPPROPRIATE.errno:
case c.NICKNAME_NUMBER.errno:
return "nickname";
case c.ACCOUNT_EMPTY.errno:
case c.ACCOUNT_INVALID.errno:
case c.ACCOUNT_DUPLICATE.errno:
return "account";
case c.PASSWORD_INVALID.errno:
case c.PASSWORD_EMPTY.errno:
case c.PASSWORD_CHAR_REPEAT.errno:
case c.PASSWORD_ORDERED.errno:
case c.PASSWORD_WEAK.errno:
case c.PASSWORD_WRONG.errno:
case c.PASSWORD_LEVEL_LOW.errno:
return "password";
case c.PASSWORD_NOT_MATCH.errno:
return "password-again";
case c.CAPTCHA_INVALID.errno:
case c.CAPTCHA_EMPTY.errno:
case c.CAPTCHA_APPID_INVALID.errno:
case c.CAPTCHA_INVALID_OLD.errno:
return "captcha";
case c.SMS_TOKEN_EMPTY.errno:
case c.SMS_TOKEN_INCORRECT.errno:
return "sms-token"
}
return e -= e > 9e5 ? 9e5: 0,
e >= 1e4 && e < 15e3 ? "username": e >= 15e3 && e < 2e4 ? "nickname": e >= 2e4 && e < 3e4 ? "email": e >= 3e4 && e < 45e3 ? "mobile": e >= 5e4 && e < 55e3 || 1070 == e ? "password": e >= 55e3 && e < 6e4 ? "sec-email": e >= 65e3 && e < 75e3 ? "account": e >= 78e3 && e < 79e3 ? "captcha": "other"
}
} (QHPass)
}).call(t, n(1))
},
function(e, t) { !
function(e) {
function t(e, t) {
var n = (65535 & e) + (65535 & t);
return (e >> 16) + (t >> 16) + (n >> 16) << 16 | 65535 & n
}
function n(e, t) {
return e << t | e >>> 32 - t
}
function i(e, i, r, o, a, c) {
return t(n(t(t(i, e), t(o, c)), a), r)
}
function r(e, t, n, r, o, a, c) {
return i(t & n | ~t & r, e, t, o, a, c)
}
function o(e, t, n, r, o, a, c) {
return i(t & r | n & ~r, e, t, o, a, c)
}
function a(e, t, n, r, o, a, c) {
return i(t ^ n ^ r, e, t, o, a, c)
}
function c(e, t, n, r, o, a, c) {
return i(n ^ (t | ~r), e, t, o, a, c)
}
function s(e, n) {
e[n >> 5] |= 128 << n % 32,
e[14 + (n + 64 >>> 9 << 4)] = n;
var i, s, u, l, p, d = 1732584193,
f = -271733879,
h = -1732584194,
m = 271733878;
for (i = 0; i < e.length; i += 16) s = d,
u = f,
l = h,
p = m,
d = r(d, f, h, m, e[i], 7, -680876936),
m = r(m, d, f, h, e[i + 1], 12, -389564586),
h = r(h, m, d, f, e[i + 2], 17, 606105819),
f = r(f, h, m, d, e[i + 3], 22, -1044525330),
d = r(d, f, h, m, e[i + 4], 7, -176418897),
m = r(m, d, f, h, e[i + 5], 12, 1200080426),
h = r(h, m, d, f, e[i + 6], 17, -1473231341),
f = r(f, h, m, d, e[i + 7], 22, -45705983),
d = r(d, f, h, m, e[i + 8], 7, 1770035416),
m = r(m, d, f, h, e[i + 9], 12, -1958414417),
h = r(h, m, d, f, e[i + 10], 17, -42063),
f = r(f, h, m, d, e[i + 11], 22, -1990404162),
d = r(d, f, h, m, e[i + 12], 7, 1804603682),
m = r(m, d, f, h, e[i + 13], 12, -40341101),
h = r(h, m, d, f, e[i + 14], 17, -1502002290),
f = r(f, h, m, d, e[i + 15], 22, 1236535329),
d = o(d, f, h, m, e[i + 1], 5, -165796510),
m = o(m, d, f, h, e[i + 6], 9, -1069501632),
h = o(h, m, d, f, e[i + 11], 14, 643717713),
f = o(f, h, m, d, e[i], 20, -373897302),
d = o(d, f, h, m, e[i + 5], 5, -701558691),
m = o(m, d, f, h, e[i + 10], 9, 38016083),
h = o(h, m, d, f, e[i + 15], 14, -660478335),
f = o(f, h, m, d, e[i + 4], 20, -405537848),
d = o(d, f, h, m, e[i + 9], 5, 568446438),
m = o(m, d, f, h, e[i + 14], 9, -1019803690),
h = o(h, m, d, f, e[i + 3], 14, -187363961),
f = o(f, h, m, d, e[i + 8], 20, 1163531501),
d = o(d, f, h, m, e[i + 13], 5, -1444681467),
m = o(m, d, f, h, e[i + 2], 9, -51403784),
h = o(h, m, d, f, e[i + 7], 14, 1735328473),
f = o(f, h, m, d, e[i + 12], 20, -1926607734),
d = a(d, f, h, m, e[i + 5], 4, -378558),
m = a(m, d, f, h, e[i + 8], 11, -2022574463),
h = a(h, m, d, f, e[i + 11], 16, 1839030562),
f = a(f, h, m, d, e[i + 14], 23, -35309556),
d = a(d, f, h, m, e[i + 1], 4, -1530992060),
m = a(m, d, f, h, e[i + 4], 11, 1272893353),
h = a(h, m, d, f, e[i + 7], 16, -155497632),
f = a(f, h, m, d, e[i + 10], 23, -1094730640),
d = a(d, f, h, m, e[i + 13], 4, 681279174),
m = a(m, d, f, h, e[i], 11, -358537222),
h = a(h, m, d, f, e[i + 3], 16, -722521979),
f = a(f, h, m, d, e[i + 6], 23, 76029189),
d = a(d, f, h, m, e[i + 9], 4, -640364487),
m = a(m, d, f, h, e[i + 12], 11, -421815835),
h = a(h, m, d, f, e[i + 15], 16, 530742520),
f = a(f, h, m, d, e[i + 2], 23, -995338651),
d = c(d, f, h, m, e[i], 6, -198630844),
m = c(m, d, f, h, e[i + 7], 10, 1126891415),
h = c(h, m, d, f, e[i + 14], 15, -1416354905),
f = c(f, h, m, d, e[i + 5], 21, -57434055),
d = c(d, f, h, m, e[i + 12], 6, 1700485571),
m = c(m, d, f, h, e[i + 3], 10, -1894986606),
h = c(h, m, d, f, e[i + 10], 15, -1051523),
f = c(f, h, m, d, e[i + 1], 21, -2054922799),
d = c(d, f, h, m, e[i + 8], 6, 1873313359),
m = c(m, d, f, h, e[i + 15], 10, -30611744),
h = c(h, m, d, f, e[i + 6], 15, -1560198380),
f = c(f, h, m, d, e[i + 13], 21, 1309151649),
d = c(d, f, h, m, e[i + 4], 6, -145523070),
m = c(m, d, f, h, e[i + 11], 10, -1120210379),
h = c(h, m, d, f, e[i + 2], 15, 718787259),
f = c(f, h, m, d, e[i + 9], 21, -343485551),
d = t(d, s),
f = t(f, u),
h = t(h, l),
m = t(m, p);
return [d, f, h, m]
}
function u(e) {
var t, n = "";
for (t = 0; t < 32 * e.length; t += 8) n += String.fromCharCode(e[t >> 5] >>> t % 32 & 255);
return n
}
function l(e) {
var t, n = [];
for (n[(e.length >> 2) - 1] = void 0, t = 0; t < n.length; t += 1) n[t] = 0;
for (t = 0; t < 8 * e.length; t += 8) n[t >> 5] |= (255 & e.charCodeAt(t / 8)) << t % 32;
return n
}
function p(e) {
return u(s(l(e), 8 * e.length))
}
function d(e, t) {
var n, i, r = l(e),
o = [],
a = [];
for (o[15] = a[15] = void 0, r.length > 16 && (r = s(r, 8 * e.length)), n = 0; n < 16; n += 1) o[n] = 909522486 ^ r[n],
a[n] = 1549556828 ^ r[n];
return i = s(o.concat(l(t)), 512 + 8 * t.length),
u(s(a.concat(i), 640))
}
function f(e) {
var t, n, i = "0123456789abcdef",
r = "";
for (n = 0; n < e.length; n += 1) t = e.charCodeAt(n),
r += i.charAt(t >>> 4 & 15) + i.charAt(15 & t);
return r
}
function h(e) {
return unescape(encodeURIComponent(e))
}
function m(e) {
return p(h(e))
}
function g(e) {
return f(m(e))
}
function v(e, t) {
return d(h(e), h(t))
}
function q(e, t) {
return f(v(e, t))
}
e.utils.md5 = function(e, t) {
return t ? q(t, e) : g(e)
}
} (QHPass)
},
function(e, t, n) { (function(e) { !
function(t) {
function i(e) {
return String(e).replace(/[^\x00-\xff]/g, "--").length
}
function r(e, t, n) {
var r = i(e);
return t <= r && r <= n
}
function o(e) {
return e = void 0 === e ? "": e,
0 == e.length
}
function a(e) {
e = String(e);
for (var t, n = e.length,
i = null,
r = 1; r < n; r++) {
if (t = e.charCodeAt(r) - e.charCodeAt(r - 1), null !== i && i !== t || Math.abs(t) > 1) return ! 1;
i = t
}
return ! 0
}
function c(e) {
e = String(e);
var t, n = e.length,
i = e.split(""),
r = l.unique(i);
if (n >= 21 || n <= 5) return - 1;
if (1 == r.length) return - 2;
if (a(e)) return - 3;
if (d.join("#").indexOf("#" + e + "#") > -1) return - 4;
var o = {
d: 0,
c: 0,
o: 0
};
return l.each(r,
function(e, t) { / \d / .test(t) ? o.d = 1 : /[a-zA-Z]/.test(t) ? o.c = 1 : o.o = 1
}),
t = o.d + o.c + o.o + (n > 9 ? 2 : 1),
t = Math.max(3, t)
}
var s = window.logger || n(13),
u = s.getLogger("validate"),
l = t.$ || window.$,
p = t.ERROR,
d = ["", "abcabc", "abc123", "a1b2c3", "aaa111", "123abc", "123456abc", "abc123456", "qwerty", "qwertyuiop", "qweasd", "123qwe", "1qaz2wsx", "1q2w3e4r", "1q2w3e4r5t", "asdasd", "asdfgh", "asdfghjkl", "zxcvbn", "qazwsxedc", "qq123456", "admin", "password", "p@ssword", "passwd", "Password", "Passwd", "Iloveyou", "Woaini", "iloveyou", "Wodemima", "Woaiwojia", "tamade", "nimade", "123789", "1234560", "123465", "123321", "102030", "100200", "4655321", "987654", "123123", "123123123", "121212", "111222", "12301230", "168168", "456456", "321321", "521521", "5201314", "520520", "201314", "211314", "7758258", "7758521", "1314520", "1314521", "147258369", "147852369", "159357", "741852", "741852963", "654321", "852963", "963852741", "115415", "123000", ""],
f = QHPass.validate = {
checkRealName: function(e) {
return e = l.trim(e),
o(e) ? p.REALNAME_EMPTY: !/^[\u4e00-\u9fa5]{2,5}$/.test(e) && p.REALNAME_INVALID
},
checkUsername: function(e) {
return e = l.trim(e),
o(e) ? p.USERNAME_EMPTY: !/^[\w\u4e00-\u9fa5\.]{2,14}$/.test(e) && p.USERNAME_INVALID
},
checkNickname: function(e) {
return e = l.trim(e),
o(e) ? p.NICKNAME_EMPTY: r(e, 2, 14) ? !/^[\w\u4e00-\u9fa5\.]{2,14}$/.test(e) && p.NICKNAME_INVALID: p.NICKNAME_TOO_SHORT
},
checkEmail: function(e) {
var t = /^[a-z0-9](?:[\w.\-+]*[a-z0-9])?@[a-z0-9][\w.-]*\.[a-z]{2,8}$/i;
return e = l.trim(e),
o(e) ? p.EMAIL_EMPTY: !t.test(e) && p.EMAIL_INVALID
},
checkMobile: function(e, t) {
var n, i, r;
return t ? (n = l.trim(e.mobileNumber), i = e.regExp || "^1\\d{10}$", r = new RegExp(i)) : (n = l.trim(e), r = /^0?1[3456789]\d{9}$/),
o(n) ? p.MOBILE_EMPTY: !r.test(n) && p.MOBILE_INVALID
},
checkAccount: function(e) {
return 0 == e.length ? p.ACCOUNT_EMPTY: !!(this.checkUsername(e) && this.checkEmail(e) && this.checkMobile(e)) && p.ACCOUNT_INVALID
},
checkCaptcha: function(e) {
return e = l.trim(e),
o(e) ? p.CAPTCHA_EMPTY: !/^([a-z0-9]{4,7}|\d{1,3}|[\u4E00-\u9FA5]{1,5})$/i.test(e) && p.CAPTCHA_INVALID
},
checkSmsToken: function(e) {
return e = l.trim(e),
o(e) ? p.SMS_TOKEN_EMPTY: !(6 == e.length && !isNaN(e)) && p.SMS_TOKEN_INCORRECT
},
isInWeakPasswordPool: function(t) {
return e.includes(d, t)
},
checkPasswordFrontend: function(t, n) {
e.isString(t) && (t = {
password: t
}),
t = t || {};
var i = t.password;
f.checkWeakPasswordRule(t,
function(r, o) {
o.isInWeakPool = f.isInWeakPasswordPool(i),
o.isInWeakPool && (r || (o.level = -4, r = o.reason = e.extend({
detail: "\u5728\u5f31\u5bc6\u7801\u5e93\u4e2d"
},
p.PASSWORD_WEAK))),
u.debug("check password frontend", t, o),
n(r, o)
})
},
checkPasswordFrontendSync: function(e) {
var t;
return f.checkPasswordFrontend(e,
function(e, n) {
t = n
}),
t
},
checkWeakPasswordRule: function(t, n) {
t = t || {};
var i = t.password || "",
r = null,
o = !1,
a = i.length,
c = {
number: 0,
letter: 0,
other: 0
};
e.each(e.split(i, ""),
function(e) { / \d / .test(e) ? c.number++:/[a-zA-Z]/.test(e) ? c.letter++:c.other++
});
var s = e.filter(e.keys(c),
function(e) {
return c[e] > 0
});
if (a < 8 ? r = p.PASSWORD_TOO_SHORT: a > 20 ? r = p.PASSWORD_TOO_LONG: / /.test(i) ? r = p.PASSWORD_HAS_EMPTY: /[^\x00-\xff]/.test(i) ? r = p.PASSWORD_CHAR_INVALID: s.length < 2 && (r = p.PASSWORD_TOO_SIMPLE), !r) {
var u = t.username;
if (u) {
Math.abs(u.length - i.length) <= 1 && (e.includes(u, i) || e.includes(i, u)) && (r = p.PASSWORD_ACCOUNT_INCLUDES)
}
}
r && (o = !0);
var l = {
isWeakRule: o,
complexLevel: 0,
reason: r,
charTypes: s,
charCount: c
};
l.isWeakRule ? n(l.reason, l) : n(null, l)
},
checkPassword: function(e, t) {
if (e = String(e), o(e)) return p.PASSWORD_EMPTY;
if (e.match(/[^\x00-\xff]/)) return p.PASSWORD_FULL_SHARP;
if (!t) return ! 1;
switch (c(e)) {
case - 1 : return p.PASSWORD_INVALID;
case - 2 : return p.PASSWORD_CHAR_REPEAT;
case - 3 : return p.PASSWORD_ORDERED;
case - 4 : return p.PASSWORD_WEAK;
default:
return ! 1
}
},
evaluatePassword: function(e) {
return c(e)
},
checkPasswordConfirm: function(e, t) {
return e !== t && p.PASSWORD_NOT_MATCH
}
}
} (QHPass)
}).call(t, n(1))
},
function(e, t, n) { (function(e) { !
function(t) {
var i = n(50),
r = t.$,
o = {
title: "\u6b22\u8fce\u767b\u5f55360",
content: "",
width: "460",
height: "auto",
closeSelector: ".quc-panel-close",
titleSelector: ".quc-panel-title",
contentSelector: ".quc-panel-bd",
closeRemove: !0,
showMask: !0,
fixed: !0,
tpl: '',
maskTpl: ''
},
a = function(e) {
this.opt = r.extend({},
o, e),
this._init(),
this._initEvent()
};
r.extend(a.prototype, {
_init: function() {
var e = this.opt,
t = e.tpl;
e.title && (t = t.replace("{title}", e.title)),
e.content && (t = t.replace("{content}", e.content)),
this.$el = r(t),
this.$hd = this.$el.find(e.titleSelector),
this.$bd = this.$el.find(e.contentSelector)
},
_initEvent: function() {
var e = this;
this.$el.on("click", this.opt.closeSelector,
function(t) {
t.preventDefault(),
e.hide(),
r(e).triggerHandler("close")
});
var n = t.utils.throttle(e.adjustPosition, 10, !0);
this._adjustPosition = function() {
n.apply(e)
};
var o = r(i.getTopWindow());
o.on("resize", this._adjustPosition),
this.opt.fixed && !t.utils.support.fixed && o.on("scroll", this._adjustPosition),
this.$el.on("DOMNodeInserted DOMNodeRemoved", this._adjustPosition)
},
setMask: function() {
var e = i.getTopWindow();
if (this.opt.showMask && (this.$mask = this.$mask || r(this.opt.maskTpl), r(e.document.body).append(this.$mask), !t.utils.support.fixed)) {
var n = r(e.document.body);
this.$mask.css({
height: n.outerHeight(!0),
width: n.outerWidth(!0)
})
}
return this
},
removeMask: function() {
return this.opt.showMask && this.$mask && this.$mask.remove(),
this
},
removeClose: function() {
return this.$el.find(this.opt.closeSelector).remove(),
this
},
setTitle: function(e) {
return "string" == r.type(e) && "<" != r.trim(e).substr(0, 1) ? this.$hd.html(e) : this.$hd.empty().append(r(e)),
this
},
setContent: function(e) {
var t = r(e);
return this.$bd.empty().append(t),
this.adjustPosition(),
t.on("QucDOMUpdated", this._adjustPosition),
this
},
setSize: function(e, t) {
return e && this.$el.width(e),
t && this.$bd.height(t),
this.adjustPosition(),
this
},
adjustPosition: function(e, n) {
var o = i.getTopWindow(),
a = r(o),
c = this.opt.fixed && this.$el.outerHeight(!0) <= a.height(),
s = t.utils.support.fixed;
if (0 == this.$el.parents("body").length) return this;
if (e && "center" != e ? e = parseInt(e, 10) : (e = (a.height() - this.$el.outerHeight(!0)) / 2, e = e < 0 ? 0 : e), n && "center" != n ? n = parseInt(n, 10) : (n = (a.width() - this.$el.outerWidth(!0)) / 2, n = n < 0 ? 0 : n), c && s || (e += a.scrollTop(), n += a.scrollLeft()), this.$el.css({
top: e,
left: n
}), s) this.$el.css("position", c ? "fixed": "absolute");
else if (a.off("scroll", this._adjustPosition), c && a.on("scroll", this._adjustPosition), this.opt.showMask) {
var u = r(o.document.body);
this.$mask.css({
height: u.outerHeight(!0),
width: u.outerWidth(!0)
})
}
return this
},
show: function() {
this.setMask();
var e = i.getTopWindow();
return 0 == this.$el.parent().length && this.$el.appendTo(e.document.body),
this.$el.show(),
this.adjustPosition(),
this
},
hide: function(e) {
return this.removeMask(),
!0 === e || this.opt.closeRemove ? this.remove() : !1 !== e && this.opt.closeRemove || this.$el.hide(),
this
},
remove: function() {
return this.$hd.detach(),
this.$bd.detach(),
this.$el.remove(),
r(i.getTopWindow()).off("resize", this._adjustPosition),
this
}
}),
t.utils.Panel = a,
t.$message = function(i) {
return new e(function(e, r) {
var o = n(97),
a = new t.utils.Panel({
title: i.title,
content: o
}),
c = a.$el;
c.addClass("quc-message"),
c.find(".quc-panel-message").html(i.content),
a.show(),
setTimeout(function() {
a.hide(!0),
e()
},
3e3)
})
},
t.$alert = function() {},
t.$confirm = function() {},
t.$prompt = function() {}
} (QHPass)
}).call(t, n(37))
},
function(e, t) {
e.exports = '<div class="quc-panel-main">\n  <div class="quc-panel-message">\n  </div>\n</div>\n'
},
function(e, t) { !
function(e) {
var t = e.$,
n = function(e) {
this.timeOut = e || 120,
this.timeLeft = this.timeOut,
this.timeStep = 1e3,
this.running = !1
};
t.extend(n.prototype, {
start: function() {
t(this).trigger("timer_start", this.timeLeft),
this.running || (this.running = !0, this.interval = setInterval(e.utils.bind(function() {
this.timeLeft--,
this.timeLeft <= 0 ? this.stop() : t(this).trigger("timer_tick", this.timeLeft)
},
this), this.timeStep))
},
resume: function() {
this.start()
},
pause: function() {
this.running = !1,
clearInterval(this.interval),
t(this).trigger("timer_pause", this.timeLeft)
},
stop: function() {
clearInterval(this.interval),
this.running = !1,
this.reset(),
t(this).trigger("timer_stop")
},
reset: function() {
this.timeLeft = this.timeOut
},
setTimeOut: function(e) {
this.timeOut = e
},
isRunning: function() {
return this.running
},
on: function() {
t().on.apply(t(this), arguments)
}
});
var i = {};
e.utils.getTimer = function(e, t) {
return i[e] || (i[e] = new n(t)),
i[e]
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$;
e.utils.changeRT = function(e, n, i) {
var r = t(e);
isNaN(n) && (i = n, n = 30),
r.on("QucChangeRT", i),
r.each(function(e, i) {
function r() {
var e = c.val();
o !== e && (c.trigger("QucChangeRT", {
oldValue: o,
newValue: e
}), o = e)
}
if ("TEXTAREA" == i.tagName || "INPUT" == i.tagName) {
var o, a, c = t(i);
c.focus(function() {
o = c.val(),
a = setInterval(r, n)
}),
c.blur(function() {
clearInterval(a),
r(),
o = null
})
}
})
}
} (QHPass)
},
function(e, t) { !
function(e) { !
function(e) {
function t(t) {
var n = {},
i = /^jQuery\d+$/;
return e.each(t.attributes,
function(e, t) {
t.specified && !i.test(t.name) && (n[t.name] = t.value)
}),
n
}
function n(t, n) {
var i = this,
o = e(this);
if (i.value === o.attr(c ? "placeholder-x": "placeholder") && o.hasClass(f.customClass)) if (i.value = "", o.removeClass(f.customClass), o.data("placeholder-password")) {
if (o = o.hide().nextAll('input[type="password"]:first').show().attr("id", o.removeAttr("id").data("placeholder-id")), !0 === t) return o[0].value = n,
n;
o.focus()
} else i == r() && i.select()
}
function i(i) {
var r, o = this,
a = e(this),
s = o.id;
if (!i || "blur" !== i.type || !a.hasClass(f.customClass)) if ("" === o.value) {
if ("password" === o.type) {
if (!a.data("placeholder-textinput")) {
try {
r = a.clone().prop({
type: "text"
})
} catch(u) {
r = e("<input>").attr(e.extend(t(this), {
type: "text"
}))
}
r.removeAttr("name").data({
"placeholder-enabled": !0,
"placeholder-password": a,
"placeholder-id": s
}).bind("focus.placeholder", n),
a.data({
"placeholder-textinput": r,
"placeholder-id": s
}).before(r)
}
o.value = "",
a = a.removeAttr("id").hide().prevAll('input[type="text"]:first').attr("id", a.data("placeholder-id")).show()
} else {
var u = a.data("placeholder-password");
u && (u[0].value = "", a.attr("id", a.data("placeholder-id")).show().nextAll('input[type="password"]:last').hide().removeAttr("id"))
}
a.addClass(f.customClass),
a[0].value = a.attr(c ? "placeholder-x": "placeholder")
} else a.removeClass(f.customClass)
}
function r() {
try {
return document.activeElement
} catch(e) {}
}
var o, a, c = !1,
s = "[object OperaMini]" === Object.prototype.toString.call(window.operamini),
u = "placeholder" in document.createElement("input") && !s && !c,
l = "placeholder" in document.createElement("textarea") && !s && !c,
p = e.valHooks,
d = e.propHooks,
f = {};
u && l ? (a = e.fn.placeholder = function() {
return this
},
a.input = !0, a.textarea = !0) : (a = e.fn.placeholder = function(t) {
var r = {
customClass: "placeholder"
};
return f = e.extend({},
r, t),
this.filter((u ? "textarea": ":input") + "[" + (c ? "placeholder-x": "placeholder") + "]").not("." + f.customClass).not(":radio, :checkbox, [type=hidden]").bind({
"focus.placeholder": n,
"blur.placeholder": i
}).data("placeholder-enabled", !0).trigger("blur.placeholder")
},
a.input = u, a.textarea = l, o = {
get: function(t) {
var n = e(t),
i = n.data("placeholder-password");
return i ? i[0].value: n.data("placeholder-enabled") && n.hasClass(f.customClass) ? "": t.value
},
set: function(t, o) {
var a, c, s = e(t);
return "" !== o && (a = s.data("placeholder-textinput"), c = s.data("placeholder-password"), a ? (n.call(a[0], !0, o) || (t.value = o), a[0].value = o) : c && (n.call(t, !0, o) || (c[0].value = o), t.value = o)),
s.data("placeholder-enabled") ? ("" === o ? (t.value = o, t != r() && i.call(t)) : (s.hasClass(f.customClass) && n.call(t), t.value = o), s) : (t.value = o, s)
}
},
u || (p.input = o, d.value = o), l || (p.textarea = o, d.value = o), e(function() {
e(document).delegate("form", "submit.placeholder",
function() {
var t = e("." + f.customClass, this).each(function() {
n.call(this, !0, "")
});
setTimeout(function() {
t.each(i)
},
10)
})
}), e(window).bind("beforeunload.placeholder",
function() {
var t = !0;
try {
"javascript:void(0)" === document.activeElement.toString() && (t = !1)
} catch(n) {}
t && e("." + f.customClass).each(function() {
this.value = ""
})
}))
} (jQuery)
} ()
},
function(e, t) { !
function(e) {
var t = e.$;
e.utils.emailHint = function(n, i) {
function r(e) {
var n = t('<div class="quc-email-hint-wrapper"><div class="quc-email-hint"></div></div>'),
i = n.find(".quc-email-hint");
i.css({
width: e.outerWidth()
});
var r = function() {
var t = e.val();
a && t.indexOf("@") < 0 || !t.match(/^[\w._]+@?[\w.]*$/) ? i.hide() : (i.show(), setTimeout(function() {
0 == i.find(".quc-on:visible").length && (i.find(".quc-on").removeClass("quc-on"), i.children(":visible").first().addClass("quc-on"))
},
30))
},
o = function(e) {
switch (e.which) {
case 38:
c(!0);
break;
case 40:
c();
break;
case 13:
case 32:
var t = i.find(".quc-on");
t.length > 0 && t.mousedown();
break;
case 27:
u(0);
break;
default:
return
}
e.preventDefault()
},
c = function(e) {
var t = i.find(".quc-on");
0 == t.length ? t = i.children(":visible").first() : t.removeClass("quc-on");
var n = e ? t.prevAll(":visible").first() : t.nextAll(":visible").first();
0 == n.length && (n = e ? i.children(":visible").last() : i.children(":visible").first()),
n.addClass("quc-on")
},
u = function(t) {
e.off("blur", u),
setTimeout(function() {
e.off("QucChangeRT", r),
e.off("keydown", o),
n.remove()
},
isNaN(t) ? 100 : t)
};
e.on("QucChangeRT", r),
e.on("keydown", o),
e.on("blur", u),
r(),
t.each(s,
function(n, r) {
var o = t("<a>").attr("href", "#").attr("tabindex", -1).appendTo(i).click(function(e) {
e.preventDefault()
}).mousedown(function() {
e.val(e.val().split("@")[0] + "@" + r),
setTimeout(function() {
e.parents(".quc-field").next(".quc-field").find(".quc-input,.quc-button").focus()
},
30),
u(0)
}).on("selectstart",
function(e) {
e.preventDefault()
}).on("mouseover",
function() {
o.addClass("quc-on").siblings(".quc-on").removeClass("quc-on")
}),
a = function() {
var t = e.val().split("@");
o.html(t[0].replace(/^(.{10}).{2,}(.{7})$/, "$1...$2") + "@" + r),
t[1] && -1 == r.indexOf("." + t[1]) && 0 !== r.indexOf(t[1]) ? (o.hide(), o.hasClass("quc-on") && (o.removeClass("quc-on"), i.children(":visible").first().addClass("quc-on"))) : o.css("display", "block")
};
e.on("QucChangeRT", a),
e.one("blur",
function() {
e.off("QucChangeRT", a)
}),
a()
}),
e.after(n)
}
var o = t(n),
a = "account" == i,
c = o.filter(":text").add(o.find(":text")),
s = e.getConfig("emailHint", ["sina.com", "163.com", "qq.com", "126.com", "vip.sina.com", "sina.cn", "hotmail.com", "gmail.com", "sohu.com", "yahoo.com", "139.com", "189.cn"]);
0 != c.length && (e.utils.changeRT(c), c.on("focus",
function(e) {
r(t(e.target))
}))
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = {
wrapper: t("<div>").css({
lineHeight: 1.2,
fontSize: 12
}),
init: function() {
var e = this;
t(function() {
var n = t("<div>").css({
position: "absolute",
right: 0,
top: 0,
zIndex: 2e5,
background: "lightyellow",
border: "1px orange solid",
padding: 5
}).appendTo(document.body);
t("<a>").attr("href", "#").css({
marginRight: 5,
color: "blue"
}).html("\u663e\u793a\u65e5\u5fd7").click(function(i) {
i.preventDefault(),
n.remove();
var r = window.open("about:blank", "Quc_JS_SDK_Console", "width=800,height=600,location=0,menubar=0,status=0,toolbar=0");
t(r.document.body).append(e.wrapper)
}).appendTo(n),
t("<a>").attr("href", "#").css({
color: "blue"
}).html("\u5173\u95ed").click(function(e) {
e.preventDefault(),
n.remove()
}).appendTo(n)
}),
this.init = function() {}
},
log: function(e, n) {
this.init(),
n && (e = e.replace(/%c(.*)$/g, '<span style="' + n + '">$1</span>')),
t("<p>").css({
margin: 0,
padding: 0
}).html(e).appendTo(this.wrapper)
},
clear: function() {
this.wrapper.clear()
},
trace: function() {}
},
i = window.console ? window.console: n,
r = e.DEBUG_LEVEL = {
ERROR: 1,
FATAL: 1,
WARN: 2,
WARNING: 2,
DEBUG: 4,
INFO: 8,
WARN_OR_UPPER: 3,
WARNING_OR_UPPER: 3,
DEBUG_OR_UPPER: 7,
INFO_OR_UPPER: 15,
ALL: 15
},
o = function() {
var t = e.DEBUG;
return isNaN(parseInt(t, 10)) ? t && r[t] || r.DEBUG_OR_UPPER: t
},
a = e.logger = {
history: [],
log: function(e, t) {
if (QHPass.DEBUG) {
t = t || null;
var n = new Date,
r = n.getHours(),
o = n.getMinutes(),
a = n.getSeconds(),
c = n.getMilliseconds();
e = (r < 10 ? "0": "") + r + ":" + (o < 10 ? "0": "") + o + ":" + (a < 10 ? "0": "") + a + "." + (c < 100 ? c < 10 ? "00": "0": "") + c + " QHPASS " + e,
t ? i.log("%c" + e, "color:" + t) : i.log("LOG: " + e)
}
},
info: function(e) {
this.history.push({
time: new Date,
level: r.INFO,
message: e
}),
o() & r.INFO && this.log("INFO: " + e, "blue")
},
debug: function(e) {
this.history.push({
time: new Date,
level: r.DEBUG,
message: e
}),
o() & r.DEBUG && this.log("DEBUG: " + e, "green")
},
warn: function(e) {
this.history.push({
time: new Date,
level: r.WARN,
message: e
}),
o() & r.WARN && this.log("WARN: " + e, "orange")
},
error: function(e) {
if (this.history.push({
time: new Date,
level: r.ERROR,
message: e
}), o() & r.ERROR) throw new Error(e)
},
download: function(e, n, i) {
var r = this.history;
n = n && n.getTime(),
i = i && i.getTime(),
r = e ? t.grep(r,
function(t) {
return t.level & e
}) : r,
r = n ? t.grep(r,
function(e) {
return n <= e.time.getTime()
}) : r,
r = i ? t.grep(r,
function(e) {
return i <= e.time.getTime()
}) : r,
r = t.map(r,
function(e) {
var t = e.time,
n = t.getFullYear(),
i = t.getMonth(),
r = t.getDate(),
o = t.getHours(),
a = t.getMinutes(),
c = t.getSeconds(),
s = t.getMilliseconds();
return n + "-" + (i < 10 ? "0": "") + i + "-" + (r < 10 ? "0": "") + r + " " + (o < 10 ? "0": "") + o + ":" + (a < 10 ? "0": "") + a + ":" + (c < 10 ? "0": "") + c + "." + (s < 100 ? s < 10 ? "00": "0": "") + s + " " + e.message
});
try {
var o = t("<a>").attr("download", "QHPass_log_" + (new Date).getTime() + ".txt").attr("href", URL.createObjectURL(new Blob([r.join("\r\n")]))).click(),
a = document.createEvent("HTMLEvents");
a.initEvent("click", !1, !1),
o[0].dispatchEvent(a)
} catch(s) {
var c = window.open("about:blank", "QHPass Log");
c.document.write(r.join("\r\n"))
}
}
};
e.events.on("init.core",
function() {
a.info("\u521d\u59cb\u5316")
}),
e.events.on("readConfig.config",
function(t, n) {
var i = n.value;
a.info("\u8bfb\u53d6\u914d\u7f6e Key:" + n.key + " Value:" + e.utils.JSON.stringify(i))
}),
e.events.on("get.sync post.sync",
function(t, n) {
a.info("\u53d1\u9001\u6570\u636e Method:" + t.type + " Data:" + e.utils.JSON.stringify(n.opt.data) + " Url:" + (n.url || n.opt.url))
}),
e.events.on("receive.sync",
function(t, n) {
a.info("\u63a5\u6536\u6570\u636e Data:" + e.utils.JSON.stringify(n))
}),
e.events.on("error.sync",
function(e, t) {
a.warn("\u53d1\u9001\u6570\u636e\u5931\u8d25 Url:" + t)
}),
e.events.on("retryHttp.sync",
function(e, t) {
a.warn("https\u8bf7\u6c42\u5931\u8d25\uff0c\u964d\u7ea7\u81f3http\u91cd\u8bd5 Url:" + t)
}),
e.events.on("init.*",
function(e) {
a.info("\u6a21\u5757\u521d\u59cb\u5316 Module:" + e.namespace)
}),
e.events.on("show.*",
function(e) {
a.info("\u663e\u793a\u754c\u9762 Module:" + e.namespace)
}),
e.events.on("hide.*",
function(e) {
a.info("\u9690\u85cf\u754c\u9762 Module:" + e.namespace)
}),
e.events.on("showLoading.*",
function(e) {
a.info("\u51c6\u5907\u754c\u9762 Module:" + e.namespace)
}),
e.events.on("hideLoading.*",
function(e) {
a.info("\u754c\u9762\u51c6\u5907\u5b8c\u6bd5 Module:" + e.namespace)
}),
e.events.on("invalid.*",
function(e, t) {
a.debug("\u7528\u6237\u8f93\u5165\u6821\u9a8c\u9519\u8bef Module:" + e.namespace + " ErrorCode:" + t.errno + " ErrorMessage:" + t.errmsg)
}),
e.events.on("warn.* warning.*",
function(e, t) {
t.errno && (t = "(" + t.errno + ")" + t.errmsg),
a.warn(" Module:" + e.namespace + " Message:" + t)
}),
e.events.on("error.* fatal.*",
function(e, t) {
t.errno && (t = "(" + t.errno + ")" + t.errmsg),
a.error(" Module:" + e.namespace + " Message:" + t)
}),
e.debug = {
exportLog: function() {
a.download.apply(a, arguments)
},
clearLog: function() {
a.history = []
}
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$;
t && t.fn && t.fn.jquery || e.logger.error("\u672a\u68c0\u6d4b\u5230jQuery\uff0cQHPass\u4f9d\u8d56jQuery\u5e93\uff0c\u8bf7\u52a0\u8f7djQuery 1.8+");
parseInt(t.fn.jquery.replace(/\.(\d+)/g,
function(e, t) {
return ("0" + t).slice( - 2)
})) < 10800 && e.logger.error("jQuery\u7248\u672c\u8fc7\u4f4e\uff0c\u76ee\u524d\u52a0\u8f7d\u7684\u7248\u672c:" + t.fn.jquery + "\uff0c\u9700\u8981\u7248\u672c1.8.0+")
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = e.events,
i = window,
r = function() {
function t(e) {
var t = 0,
n = 0,
i = e.length - 1;
for (i; i >= 0; i--) {
var r = parseInt(e.charCodeAt(i), 10);
t = (t << 6 & 268435455) + r + (r << 14),
0 != (n = 266338304 & t) && (t ^= n >> 21)
}
return t
}
var n = "__guid",
r = e.utils.storage("cookie"),
o = document.domain,
a = r.get(n);
if (!a) {
a = [t(o),
function() {
for (var e = navigator,
n = [e.appName, e.version, e.language || e.browserLanguage, e.platform, e.userAgent, screen.width, "x", screen.height, screen.colorDepth, document.referrer].join(""), r = n.length, o = i.history.length; o;) n += o--^r++;
return 2147483647 * (Math.round(2147483647 * Math.random()) ^ t(n))
} (), +new Date + Math.random() + Math.random()].join(".");
var c = {
expires: 2592e7,
path: "/",
domain: o.toLowerCase().replace(/^(?:.+\.)?(\w+\.\w+)$/, ".$1")
};
r.set(n, a, c)
}
return function() {
return a
}
} ();
e.utils.monitor = {};
var o = i.__quc_moitor_imgs = {},
a = e.utils.monitor.send = function(n) {
if (!e.DEBUG && e.getConfig("useMonitor", !0)) {
var i = e.getConfig("monitorUrl", e.getConfig("protocol") + "://s.msvodx.com/i360/qhpass.htm"),
a = "moitor_img+" + e.utils.getGuid(),
c = o[a] = new Image;
n = t.param(t.extend({
src: e.getConfig("src"),
version: e.version,
guid: r()
},
n)),
i += (i.indexOf("?") > 0 ? "&": "?") + n,
c.onload = c.onerror = function() {
o && o[a] && (o[a] = null, delete o[a])
},
c.src = i
}
};
n.on("init.core",
function() {
var t = i.screen;
a({
action: "init",
resolution: [t.width, t.height].join("x"),
color: t.colorDepth,
language: navigator.language,
isCookieEnabled: e.utils.isCookieEnabled()
})
}),
n.on("retryHttp.sync",
function(e, t) {
t = t.replace(/\?.*/, ""),
a({
action: "retryHttp",
api: t
})
}),
n.on("error.sync",
function(e, t) {
t = t.replace(/\?.*/, ""),
a({
action: "netError",
api: t
})
}),
n.on("show.*",
function(e) {
a({
action: "show",
module: e.namespace
})
}),
n.on("beforeSubmit.*",
function(e) {
a({
action: "submit",
module: e.namespace
})
}),
n.on("success.*",
function(e) {
a({
action: "success",
module: e.namespace
})
}),
n.on("changeType.*",
function(e, t) {
var n = "change" + e.namespace.replace(/^./,
function(e) {
return e.toUpperCase()
}) + "Type";
a({
action: n,
module: e.namespace,
type: t
})
}),
n.on("invalid.*",
function(e, t) {
a({
action: "invalid",
module: e.namespace,
errno: t.errno,
errmsg: t.errmsg
})
}),
n.on("warn.* warning.*",
function(e, t) {
t.errno && (t = "(" + t.errno + ")" + t.errmsg),
a({
action: "warn",
module: e.namespace,
message: t
})
}),
n.on("error.* fatal.*",
function(e, t) {
t.errno && (t = "(" + t.errno + ")" + t.errmsg),
a({
action: "error",
module: e.namespace,
message: t
})
}),
Math.random() < .01 && t.get(e.getConfig("proxy"),
function(e) {
var t = e.match(/version\s*=\s*['"]?([\d.]+)['"]?/i),
n = t && t[1] || "old version";
a({
action: "pspJumpInit",
jumpVersion: n
})
},
"text"),
n.on("init.core",
function() {
e.getConfig("preventClickPenetrate", !0) && n.on("afterShow.*",
function() {
t(".quc-wrapper").mousedown(function(e) {
e.stopPropagation()
})
}),
n.on("afterShow.*",
function(e) {
t(".quc-wrapper").on("click", "a",
function() {
var n = this;
n.href.match(/[^#]$/) && "_blank" == n.target && a({
action: "click",
module: e.namespace,
title: t(n).text(),
link: n.href
})
})
})
})
} (QHPass)
},
function(e, t) { !
function(e) {
function t(e, t) {
return ! e || (r.isFunction(e) ? e(t) : t === e)
}
function n(e, t) {
if (!e) return ! 1;
var n = 0;
return r.each(e.match(/(\d+[wdhms]?)/g),
function(e, t) {
var i = parseInt(t, 10),
r = t.substr(t.length - 1);
n += c[r] ? i * c[r] : i
}),
(new Date).getTime() - t >= n
}
function i(e) {
return r.map(e,
function(e) {
return e.toString()
}).join()
}
var r = e.$,
o = "quc.funcCache",
a = {};
e.utils.cache = {
read: function(c, s, u) {
function l() {
m[h] = m[h] || {},
m[h][g] = d,
p.set(o, e.utils.JSON.stringify(m))
}
r.isPlainObject(s) && (u = s),
u = u || {};
var p, d, f, h = c.funcName;
h ? p = e.utils.storage("local") : (h = c.qucGuid || (c.qucGuid = e.utils.getGuid()), p = e.utils.storage("page"));
var m = e.utils.JSON.parse(p.get(o, "{}")),
g = i(s);
return (f = a[h] && a[h][g]) ? f: (d = m[h] && m[h][g], !d || n(u.expire, d.date) ? (d = {
data: c.apply(u.context || null, s),
date: (new Date).getTime()
},
d.data.done && d.data.fail ? ((a[h] = a[h] || {})[g] = d, d.data.done(function(e) {
t(u.condition, !0) && (d.data = e, d.promise = "resolve", l())
}).fail(function(e) {
t(u.condition, !1) && (d.data = e, d.promise = "reject", l())
}).always(function() {
delete a[h][g]
})) : (t(u.condition, d.data) && l(), d.data)) : d.promise ? r.Deferred()[d.promise](d.data).promise() : d.data)
},
clear: function(t, n) {
t ? cache[t] && n ? delete a[t][i(n)] : delete a[t] : (a = {},
e.utils.storage("page".remove(o)), e.utils.storage("local".remove(o)))
}
};
var c = {
s: 1e3,
m: 6e4,
h: 36e5,
d: 864e5,
w: 6048e5
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = null,
i = function(t) {
this.name = "func_" + e.utils.getGuid(),
this.extend(t),
this._initFlag = !1,
this._data = {}
};
t.extend(i.prototype, {
init: function() {
var t = this;
return t._initFlag ? t.reset() : (t._initFlag = !0, t.setUI(e.ui[t.name]), t.setDeferred(), t.trigger("init"), t.on("show",
function() {
t._isShown = !0
}), t.on("hide",
function() {
t._isShown = !1
})),
t._passThrough = n,
n = null,
t
},
reset: function() {
return this._isShown && this.trigger("hide"),
this.setDeferred(),
this
},
isInit: function() {
return this._initFlag
},
get: function(e, t) {
var n = this._data[e];
return void 0 !== n ? n: t
},
set: function(e, n) {
return t.isPlainObject(e) ? t.extend(this._data, e) : this._data[e] = n,
this
},
setDeferred: function(n) {
var i = this;
return i._deferred = n || t.Deferred(),
i._deferred.done(function(t) {
i._callback && e.utils.parseCallback(i._callback)(t)
}),
i
},
resolve: function(e) {
return this._deferred && this._deferred.resolve(e),
this
},
getCallback: function() {
return this._callback
},
setCallback: function(e) {
return this._callback = e,
this
},
clear: function() {
return this._data = {},
this
},
getUI: function() {
return this.ui
},
setUI: function(e) {
return this.ui = e,
e.init(this),
this
},
getPassThrough: function() {
return this._passThrough
},
setPassThrough: function(e) {
n = e
},
reportError: function(t, n, i) {
n = n ? "Msg:" + n + " ": "",
t.errno ? n = n + "Error:(" + t.errno + ")" + t.errmsg: n += t.toString(),
e.events.trigger((i ? "warn.": "error.") + this.name, n)
},
reportWarn: function(e, t) {
this.reportError(e, t, !0)
},
extend: function() {
var e = [].slice.apply(arguments);
e.unshift(this),
t.extend.apply(null, e)
},
setCaptchaUrl: function(e) {
this._captchaUrl = e
},
getCaptchaUrl: function(n, i) {
var r = this,
o = r._captchaUrl,
a = t.Deferred();
return ! i && o ? (o += "&_=" + (new Date).getTime(), a.resolve(o)) : e.sync.getCaptchaUrl(n).then(function(e) {
o = r._captchaUrl = e.captchaUrl,
o += "&_=" + (new Date).getTime(),
a.resolve(o)
}),
a.promise()
}
}),
t.each(["on", "one", "off", "trigger"],
function(t, n) {
i.prototype[n] = function() {
return arguments[0] = arguments[0].replace(/( |$)/g, "." + this.name + "$1"),
e.events[n].apply(null, arguments),
this
}
}),
e.getLogic = function(e) {
return new i(e)
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$;
e.getUserInfo = function(n, i, r) {
return "function" == t.type(n) && (r = i, i = n, n = void 0),
e.sync.getUserInfo(n).done(function(e) {
i && i(e)
}).fail(function(e) {
r && r(e)
})
}
} (QHPass)
},
function(e, t) { !
function(e) {
e.getUserSecInfo = function(t) {
e.sync.getUserInfo().then(function(t) {
return e.sync.getUserSecInfo(t.crumb)
}).always(t)
}
} (QHPass)
},
function(e, t) { !
function(e) {
e.getEmailStatus = function(t) {
e.sync.getUserInfo().then(function(t) {
return e.sync.checkEmailStatus(t.crumb)
}).always(t)
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t, n = e.$;
e.getQuickLoginStatus = function(i, r) {
if (n.isFunction(i) && (r = i, i = 2e4), !t) {
var o = e.getConfig("protocol"),
a = o + "://axlogin.passport.msvodx.com/ptlogin.php",
c = a + "?nextUrl=" + e.getConfig("proxy") + "&us=1&func=QHPass.getQuickLoginUserLength",
s = n("<iframe>").attr("src", c).hide().appendTo(document.body);
t = n.Deferred();
var u = setTimeout(function() {
t.reject()
},
i);
e.getQuickLoginUserLength = function(e) {
t.resolve(e)
},
t.always(function() {
t = null,
clearTimeout(u),
s.remove()
})
}
t.then(function(t) {
r(n.extend({},
e.ERROR.SUCCESS, {
status: t.us > 0 ? 1 : 2,
userLength: t.us
}))
},
function() {
r(n.extend({},
e.ERROR.TIME_OUT))
})
}
} (QHPass)
},
function(e, t) { !
function(e) {
e.signOut = function(t, n) {
void 0 === n && (n = t, t = !0),
e.sync.signOut(t).done(function() {
e.events.trigger("success.signOut"),
e.utils.parseCallback(n)()
})
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = {
normal: '<form method="POST" class="quc-form"><p class="quc-field quc-field-account quc-input-long"><label class="quc-label">\u5e10&nbsp;&nbsp;&nbsp;\u53f7</label><span class="quc-input-bg"><input class="quc-input quc-input-account" type="text" name="account" placeholder="\u624b\u673a\u53f7/\u7528\u6237\u540d/\u90ae\u7bb1" maxlength="50" autocomplete="off"/></span></p><p class="quc-field quc-field-password quc-input-long"><label class="quc-label">\u5bc6&nbsp;&nbsp;&nbsp;\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-password" type="password" name="password" maxlength="22" placeholder="\u8bf7\u8f93\u5165\u60a8\u7684\u5bc6\u7801" /></span></p><p class="quc-field quc-field-captcha quc-input-short"><label class="quc-label">\u9a8c\u8bc1\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-captcha" type="text" name="phrase" maxlength="7" autocomplete="off" placeholder="\u8bf7\u8f93\u5165\u9a8c\u8bc1\u7801" /></span><img class="quc-captcha-img quc-captcha-change" alt="\u9a8c\u8bc1\u7801" title="\u70b9\u51fb\u66f4\u6362" tabindex="99" /> <a class="quc-link quc-captcha-change-link quc-captcha-change" href="#">\u6362\u4e00\u5f20</a></p><p class="quc-field quc-field-keep-alive"><label><input class="quc-checkbox quc-checkbox-keep-alive" type="checkbox" name="iskeepalive" checked="checked">\u4e0b\u6b21\u81ea\u52a8\u767b\u5f55</label></p><p class="quc-field quc-field-submit"><input type="submit" value="\u767b\u5f55" class="quc-submit quc-button quc-button-primary quc-button-sign-in" /> </p><p class="quc-field quc-field-third-part"><span>\u5176\u4ed6\u5e10\u53f7\u767b\u5f55\uff1a</span><span class="quc-third-part"></span></p></form>',
mobile: '<form method="POST" class="quc-form"><p class="quc-field quc-field-mobile quc-input-long"><label class="quc-label">\u624b\u673a\u53f7</label><span class="quc-input-bg"><input type="tel" name="mobile" class="quc-input quc-input-mobile" maxlength="11" placeholder="\u8bf7\u8f93\u5165\u60a8\u7684\u624b\u673a\u53f7" /></span></p><p class="quc-field quc-field-captcha quc-input-short"><label class="quc-label">\u9a8c\u8bc1\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-captcha" type="text" name="captcha" maxlength="7" autocomplete="off" placeholder="\u8bf7\u8f93\u5165\u9a8c\u8bc1\u7801"/></span><img class="quc-captcha-img quc-captcha-change" alt="\u9a8c\u8bc1\u7801" title="\u70b9\u51fb\u66f4\u6362" tabindex="99" /><a class="quc-link quc-link-captcha-change quc-captcha-change" href="#">&nbsp;\u6362\u4e00\u5f20</a><i class="quc-tip-icon"></i></p><p class="quc-field quc-field-sms-token quc-input-middle"><label class="quc-label">\u6821\u9a8c\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-sms-token" type="tel" name="smscode" autocomplete="off" maxlength="6" placeholder="\u8bf7\u8f93\u5165\u77ed\u4fe1\u6821\u9a8c\u7801" /></span><a class="quc-button quc-button-blue quc-button-get-sms-token" href="#">\u514d\u8d39\u83b7\u53d6\u6821\u9a8c\u7801</a></p><p class="quc-field quc-field-keep-alive"><label><input class="quc-checkbox quc-checkbox-keep-alive" type="checkbox" name="iskeepalive" checked="checked">\u4e0b\u6b21\u81ea\u52a8\u767b\u5f55</label></p><p class="quc-field quc-field-submit"><input class="quc-submit quc-button quc-button-primary quc-button-sign-in" type="submit" value="\u767b\u5f55" /> </p></form>',
qrcode: '<div class="quc-qrcode-wrapper"><div class="quc-qrcode-box"><img class="quc-qrcode" src="###"/><div class="quc-qrcode-mask"><i class="quc-qrcode-mask-bg"></i><div class="quc-qrcode-icon"><span class="quc-qrcode-tip-txt"></span><p class="quc-qrcode-refresh">\u5237\u65b0</p></div></div></div></div><p class="quc-title">\u4f7f\u7528 <a class="quc-link" href="http://i.msvodx.com/security/accountguard">360\u5e10\u53f7\u536b\u58eb</a>\u626b\u7801\u529f\u80fd\uff0c\u5b89\u5168\u767b\u5f55</p>',
quick: '<div class="quc-loading"></div><iframe class="quc-sign-in-iframe" src="about:blank" frameborder="0" scrolling="no" allowtransparency></iframe>'
},
i = {
sina: '<a href="#" class="quc-third-part-icon quc-third-part-icon-sina" title="\u65b0\u6d6a\u5fae\u535a\u767b\u5f55"></a>',
renren: '<a href="#" class="quc-third-part-icon quc-third-part-icon-renren" title="\u4eba\u4eba\u767b\u5f55"></a>',
tencent: '<a href="#" class="quc-third-part-icon quc-third-part-icon-tencent" title="QQ\u767b\u5f55"></a>',
weixin: '<a href="#" class="quc-third-part-icon quc-third-part-icon-weixin" title="\u5fae\u4fe1\u767b\u5f55"></a>'
},
r = {
quick: "\u5feb\u901f\u767b\u5f55",
normal: "\u666e\u901a\u767b\u5f55",
mobile: "\u77ed\u4fe1\u767b\u5f55",
qrcode: "\u4e8c\u7ef4\u7801\u767b\u5f55",
onekey: "\u4e00\u952e\u767b\u5f55"
},
o = {},
a = 0,
c = {
init: function(e) {
o = {},
this.model = e,
this.$el = t('<div class="quc-mod-sign-in"><div class="quc-tip-wrapper"><p class="quc-tip"></p></div><div class="quc-main"></div><div class="quc-footer"><a class="quc-link quc-link-grey quc-link-normal-sign-in" href="#">\u4f7f\u7528\u5176\u4ed6\u5e10\u53f7\u767b\u5f55</a><a class="quc-link quc-link-grey quc-link-quick-sign-in" href="#">\u8fd4\u56de\u5feb\u901f\u767b\u5f55</a><a class="quc-link quc-link-grey quc-link-sign-up" href="#">\u6ce8\u518c\u65b0\u5e10\u53f7</a><a class="quc-link quc-link-about quc-link-about-normal" href="http://i.msvodx.com/findpwd/" target="_blank">\u5fd8\u8bb0\u5bc6\u7801\uff1f</a><a class="quc-link quc-link-about quc-link-about-mobile" href="http://i.msvodx.com/help/smscode" target="_blank">\u6821\u9a8c\u7801\u5e38\u89c1\u95ee\u9898</a><a class="quc-link quc-link-about quc-link-about-qrcode" href="http://i.msvodx.com/findpwd/customerhelper#qrcode" target="_blank">\u4ec0\u4e48\u662f\u4e8c\u7ef4\u7801\u767b\u5f55\uff1f</a><a class="quc-link quc-link-about quc-link-about-onekey" href="#">\u4ec0\u4e48\u662f\u4e00\u952e\u767b\u5f55\uff1f</a></div></div>'),
this.initForm(),
this.initErrorTip(),
this.initFooterLink(),
this.initThirdPartSignIn(),
this.initModelEvent(),
this.initSmsToken(),
this.initQrCode(),
this.initCaptcha()
},
reset: function() {
o = {},
this.initQuickSignIn(),
a = 0,
this.signInType = null,
this.$el.find(".quc-tip").html("")
},
changeType: function(i) {
var r, a = this,
c = a.model,
s = o[i];
if (a.$el.attr("class", "quc-mod-sign-in quc-mod-" + i + "-sign-in"), !s) {
s = o[i] = t(n[i]);
var u = this.model.get("saveAccount");
u && i == u.type && (r = s.find(".quc-input-account,.quc-input-mobile").val(u.account))
}
var l = a.$el.find(".quc-main");
e.utils.resetPlaceholder(l.find("input, textarea")),
l.empty().append(s),
c.trigger("DOMUpdated", this.$el),
a.signInType = i;
var p = a.getTitle();
a.$nav.replaceWith(p),
a.$nav = p,
s.find(".quc-input").each(function(e, n) {
var i = t(n);
if (!i.val()) return c.one("changeType afterShow",
function() {
r && r.focus(),
i.focus()
}),
!1
}),
c.trigger("afterShow.changeType", a.$el[0]),
c.trigger("changeType", i),
c.trigger("changeType:" + i)
},
initQuickSignIn: function() {
if (this.model.isQuickSignInAvailable()) {
var e = t(n.quick);
e.attr("src", this.model.getQuickSignInUrl()),
o.quick = e
}
},
initForm: function() {
var n = this;
n.model.on("changeType",
function(i, r) {
"quick" != r && (n.$el.find(".quc-checkbox-keep-alive").prop("checked", n.model.get("isKeepAlive")).change(function() {
n.model.set("isKeepAlive", t(this).prop("checked"))
}), n.$el.find(".quc-input").focus(function() {
t(this).parent().addClass("quc-input-bg-focus")
}).blur(function() {
t(this).parent().removeClass("quc-input-bg-focus")
}), n.$el.find(".quc-form").submit(function(e) {
e.preventDefault();
var i = t(this),
o = n.model,
a = i.find(".quc-button-sign-in");
a.prop("disabled", !0).val("\u767b\u5f55\u4e2d..."),
o.one("invalid",
function() {
a.prop("disabled", !1).val("\u767b\u5f55")
}),
"normal" == r ? (o.set("username", t.trim(i.find(".quc-input-account").val())), o.set("password", i.find(".quc-input-password").val()), o.set("captcha", t.trim(i.find(".quc-input-captcha").val())), o.set("isNeedCheckCaptcha", !!n.$el.find(".quc-field-captcha:visible")[0])) : "mobile" == r && (o.set("mobile", t.trim(i.find(".quc-input-mobile").val())), o.set("smsToken", t.trim(i.find(".quc-input-sms-token").val())), o.set("captcha", t.trim(i.find(".quc-input-captcha").val())), n.model.set("isNeedCheckCaptcha", !!n.$el.find(".quc-field-captcha:visible")[0])),
n.model.submit(r)
}), e.getConfig("signIn.showEmailHint", !0) && e.utils.emailHint(n.$el.find(".quc-input-account"), "account"))
})
},
initFooterLink: function() {
var e = this,
t = this.$el.find(".quc-footer");
t.find(".quc-link-sign-up").click(function(t) {
t.preventDefault(),
e.onSignUp()
}).end().find(".quc-link-quick-sign-in").click(function(t) {
t.preventDefault(),
e.changeType("quick")
}).end().find(".quc-link-normal-sign-in").click(function(t) {
t.preventDefault(),
e.changeType(e.model.getSignInTypes()[0])
}),
e.model.on("changeType",
function(n, i) {
"quick" == i ? 0 == e.model.getSignInTypes().length && t.hide() : e.model.isQuickSignInAvailable() || t.find(".quc-link-quick-sign-in").hide()
})
},
initQrCode: function() {
function n() {
s.model.listenQrcodeLogin().done(function() {
clearTimeout(d),
clearInterval(p)
})
}
function i() {
r = s.model.getDomainApi(),
c.show().find("span").html(l),
o.hide(),
o.off("load").on("load",
function() {
o.show(),
c.hide(),
a = (new Date).getTime(),
p = setInterval(n, 2e3),
d = setTimeout(function() {
s.model.trigger("timeout"),
clearInterval(p)
},
u)
}),
o.off("error").on("error",
function() {
c.find("span").html("\u4e8c\u7ef4\u7801\u83b7\u53d6\u5931\u8d25"),
c.find(".quc-qrcode-refresh").css("cursor", "pointer").show(),
c.off("click").one("click", ".quc-qrcode-refresh",
function() {
c.find("span").html("\u4e8c\u7ef4\u7801\u52a0\u8f7d\u4e2d..."),
t(this).hide(),
i()
}).show()
}),
o.attr("src", r)
}
var r, o, c, s = this,
u = 1e3 * e.getConfig("signIn.qrCodeTTL", 120),
l = "\u4e8c\u7ef4\u7801\u52a0\u8f7d\u4e2d...",
p = 0,
d = 0;
s.model.on("changeType:qrcode",
function() {
o = s.$el.find(".quc-qrcode"),
c = s.$el.find(".quc-qrcode-mask"),
(new Date).getTime() - a >= u ? i() : (c.hide(), p = setInterval(n, 2e3)),
s.model.on("changeType",
function(e, t) {
"qrcode" != t && clearInterval(p)
})
}).on("clearQrTime",
function() {
a = 0,
clearTimeout(d),
clearInterval(p)
}).on("timeout",
function() {
clearInterval(p),
c.find("span").html("\u4e8c\u7ef4\u7801\u5df2\u8fc7\u671f"),
c.find(".quc-qrcode-refresh").css("cursor", "pointer").show(),
c.off("click").one("click", ".quc-qrcode-refresh",
function() {
c.find("span").html("\u4e8c\u7ef4\u7801\u52a0\u8f7d\u4e2d..."),
t(this).hide(),
i()
}).show()
})
},
initSmsToken: function() {
var t, n, i, r, o = this,
a = e.utils.getTimer("sign_in");
a.on("timer_start",
function(e, t) {
i.addClass("quc-button-disabled"),
i.html(t + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
a.on("timer_tick",
function(e, t) {
i.html(t + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
a.on("timer_stop",
function() {
i.html("\u91cd\u65b0\u83b7\u53d6\u6821\u9a8c\u7801"),
i.removeClass("quc-button-disabled")
});
var c = function(e) {
e.preventDefault(),
i.hasClass("quc-button-disabled") || (o.model.set("mobile", t.val()), o.model.set("captcha", n.val()), i.html("\u53d1\u9001\u4e2d..."), i.addClass("quc-button-disabled"), o.model.sendSmsToken().done(function(e) {
var t = o.$el.find(".quc-tip");
t.removeClass("quc-tip-error").addClass("quc-tip-success").html("\u53d1\u9001\u6210\u529f").show(),
r.find(".quc-input").one("change",
function() {
t.removeClass("quc-tip-success").html(t.attr("data-default-tip"))
}),
a.start(),
o.model.set("token", e.vt),
o.model.trigger("dealCaptcha")
}).fail(function(e) {
i.html("\u514d\u8d39\u83b7\u53d6\u6821\u9a8c\u7801"),
i.removeClass("quc-button-disabled"),
e.field = o.$el.find(".quc-field-mobile");
var t = e.errdetail && e.errdetail.captchaUrl;
t && (e.fromServer = !0, o.model.setCaptchaUrl(t)),
o.model.trigger("invalid", e)
}))
};
this.model.on("changeType:mobile",
function() {
r = o.$el.find(".quc-field-mobile"),
t = r.find(".quc-input-mobile"),
n = o.$el.find(".quc-input-captcha"),
i = o.$el.find(".quc-button-get-sms-token"),
i.off("click", c).on("click", c),
a.isRunning() && a.resume()
})
},
initThirdPartSignIn: function() {
var e = this;
e.model.on("changeType:normal",
function() {
var n = e.model.getThirdPartProviders();
if (n = t.grep(n,
function(t) {
return !! i[t] || (e.model.trigger("warn", "\u9519\u8bef\u7684\u7b2c\u4e09\u65b9\u767b\u5f55\u7c7b\u578b\uff1a" + t), !1)
}), n.length > 0) {
var r = t("<span>").addClass("quc-third-part");
t.each(n,
function(n, o) {
t(i[o]).click(function(t) {
t.preventDefault(),
e.model.thirdPartSignIn(o)
}).appendTo(r)
}),
e.$el.find(".quc-third-part").replaceWith(r)
} else e.$el.find(".quc-field-third-part").hide()
})
},
initModelEvent: function() {
var n = this;
n.model.on("show",
function(e, t) {
n.show(t && t.wrapper)
}).on("success",
function() {
var n = e.getConfig("signInBoxWrapper", ""),
i = e.getConfig("signInBoxOpts", {});
n && e.plugin.signInBox && t(n).empty().html(e.plugin.signInBox(i))
}).on("hide",
function() {
n.hide()
}).on("afterhide",
function() {
"qrcode" == n.getCurrentType() && n.model.trigger("clearQrTime")
}).on("close",
function() {
"qrcode" == n.getCurrentType() && n.model.trigger("clearQrTime")
}).on("dealCaptcha",
function() {
n.$el.find(".quc-field-captcha").hide(),
n.$el.find(".quc-input-captcha").val(""),
n.$el.find(".quc-input-mobile").off("change").on("change",
function() {
n.$el.find(".quc-field-captcha").show();
try {
n.$el.find(".quc-captcha-change").eq(0).trigger("click")
} catch(e) {
n.$el.find(".quc-captcha-img").attr("src", n.$el.find(".quc-captcha-img").attr("src") + "&_t=" + (new Date).getTime())
}
n.model.set("token", null),
n.model.trigger("timer_stop")
})
})
},
initErrorTip: function() {
var t = this;
t.model.on("invalid",
function(n, i) {
var r = t.$el.find(".quc-tip");
if (!i.signInType || t.signInType == i.signInType) {
var o = t.$el.find(".quc-input-" + e.utils.getErrorType(i));
"password" == e.utils.getErrorType(i) && e.utils.selectText(o),
r.removeClass("quc-tip-success").addClass("quc-tip-error").html(i.errmsg),
t.model.one("changeType",
function() {
r.html("")
})
}
})
},
onSignUp: function() {
this.model.signUp()
},
initCaptcha: function() {
var n, i, r, o = this,
a = !1,
c = function(e) {
o.model.getCaptchaUrl("login1", !0).then(function(t) {
n.find(".quc-captcha-img").attr("src", t);
var i = n.find(".quc-input-captcha").val("");
e && i.focus()
})
},
s = function(t, i) {
var r = "captcha" == e.utils.getErrorType(i);
a && i.fromServer && o.signInType == i.signInType ? c(r) : r && (n.show(), a || c(!0), a = !0)
},
u = function(e) {
l(e),
i.show(),
o.$el.find(".quc-captcha-change").off("click").off("mousedown").on("mousedown",
function(e) {
e.preventDefault()
}).on("click",
function(t) {
t.preventDefault(),
l(e),
i.find(".quc-input-captcha").focus()
})
},
l = function(e) {
var n = "mobile" == e ? "strictreg": "reg";
o.model.getCaptchaUrl(n, !0).then(function(e) {
i.find(".quc-captcha-img").attr("src", e),
i.find(".quc-input-captcha").val(""),
i.find(".quc-tip").removeClass("quc-tip-error").html(function() {
return t(this).attr("data-default-tip")
}),
i.find(".quc-tip-icon").removeClass("quc-tip-icon-incorrect quc-tip-icon-correct")
})
},
p = function(t, n) {
var i = n.type || "mobile";
r || "captcha" != e.utils.getErrorType(n) ? n.fromServer && l(i) : (r = !0, u(i))
};
o.model.on("changeType",
function(e, r) {
if (o.model.off("invalid", s), o.model.off("invalid", p), "normal" == r) n = o.$el.find(".quc-field-captcha"),
o.$el.find(".quc-input-account").blur(function() {
var e = t.trim(t(this).val());
e && o.model.checkIsCaptchaRequired(e).done(function(e) {
e ? (n.show(), c()) : n.hide(),
a = e,
o.$el.triggerHandler("QucDOMUpdated")
})
}),
o.$el.find(".quc-captcha-change").off("click").off("mousedown").on("click",
function(e) {
e.preventDefault(),
c()
}).eq(0).trigger("click"),
o.model.on("invalid", s);
else if ("mobile" == r) {
if (o.model.set("token", null), i = o.$el.find(".quc-field-captcha"), 0 == i.length) return;
u(r),
o.model.on("invalid", p)
}
})
},
getCurrentType: function() {
return this.signInType || (this.signInType = this.model.isQuickSignInAvailable() ? "quick": this.model.getSignInTypes()[0]),
this.signInType
},
getTitle: function() {
var n, i = this,
o = i.model.getSignInTypes(),
a = i.getCurrentType();
return "quick" == a || o.length < 2 ? n = t("<span>").html(e.getConfig("signIn.panelTitle", "\u6b22\u8fce\u767b\u5f55360")) : (n = t("<p>").addClass("quc-sign-in-nav quc-sign-in-nav-c" + o.length), t.each(o,
function(e, o) {
t("<a>").addClass(a == o ? "quc-current": "").attr({
href: "#",
"data-type": o
}).html(r[o] || "\u5176\u4ed6\u65b9\u5f0f").click(function(e) {
e.preventDefault(),
a != o && i.changeType(o)
}).appendTo(n)
})),
n
},
show: function(n) {
var i = this;
if (this.reset(), this.$nav = this.getTitle(), this.changeType(this.getCurrentType()), n) this.model.trigger("beforeShow", this.$el[0]),
t(n).addClass("quc-wrapper quc-page").empty().append(this.$el);
else {
var r = this.panel = new e.utils.Panel;
r.setTitle(this.$nav),
r.setContent(this.$el),
this.model.trigger("beforeShow", this.$el[0]),
r.show(),
t(r).on("close", e.getConfig("signIn.panelCloseHandler", t.noop)),
t(r).on("close",
function() {
i.model.trigger("close")
})
}
this.model.trigger("afterShow", this.$el[0])
},
hide: function() {
this.model.trigger("beforeHide", this.$el[0]),
this.panel && this.panel.hide(),
this.model.trigger("afterHide", this.$el[0])
}
};
e.ui.signIn = {
init: function() {
c.init.apply(c, arguments)
},
changeType: function(e) {
c.changeType(e)
},
setOnSignUpCallback: function(e) {
c.onSignUp = e
}
}
} (QHPass)
},
function(e, t, n) { (function(e, t) {
var i = n(81); !
function(r) {
var o, a = r.$,
c = n(13).getLogger("signIn"),
s = n(85),
u = r.getLogic({
name: "signIn",
validate: function(e, t) {
var n = r.validate,
i = !1;
switch (t = t || this.get(e), e.toLowerCase()) {
case "username":
i = !t && n.checkAccount(t);
break;
case "password":
(i = n.checkPassword(t)) && (i = r.utils.isSameError(i, r.ERROR.PASSWORD_EMPTY) ? i: r.ERROR.PASSWORD_WRONG);
break;
case "mobile":
i = n.checkMobile(t);
break;
case "smstoken":
i = n.checkSmsToken(t);
break;
case "captcha":
i = n.checkCaptcha(t)
}
return i
},
getSignInTypes: function() {
return a.grep(r.getConfig("signIn.types"),
function(e) {
return "quick" != e
})
},
getThirdPartProviders: function() {
var e = r.getConfig("src"),
t = ["pcw_so_wenda", "pcw_so_baike", "pcw_so_image", "pcw_so_music", "pcw_so", "pcw_so_map", "pcw_so_adunion", "pcw_so_zc", "pcw_so_zhanzhang", "pcw_open_app", "pcw_wan", "pcw_wan_youxi", "pcw_wan_tg"];
return a.inArray(e, t) > -1 ? r.getConfig("signIn.thirdPart.providers", ["sina", "renren", "fetion", "telecom", "tencent", "weixin"]) || [] : r.getConfig("signIn.thirdPart.providers", ["sina", "renren", "fetion", "telecom"]) || []
},
prepareQuickSignIn: function(e) {
var t = this,
n = a.Deferred();
return void 0 !== o && !e || -1 == a.inArray("quick", r.getConfig("signIn.types")) ? n.resolve() : (r.ptLogin = function(e) {
0 == e.s ? r.sync.getRd().then(function(e) {
return r.sync.setCookie(e.rd)
}).then(function() {
return r.getUserInfo(!1)
}).then(function(e) {
t.trigger("hide").trigger("success", e).resolve(e)
}) : 2 == e.s && (o = !1, t.trigger("quickSignInFailed"), n.reject())
},
r.getQuickLoginStatus(function(e) {
o = 0 == e.errno && e.status < 2,
n.resolve()
})),
n.promise()
},
isQuickSignInAvailable: function() {
return !! o
},
sendSmsToken: function() {
var e = this.get("mobile"),
t = this.get("captcha"),
n = this.get("token"),
i = this.validate("mobile", e) || !n && this.validate("captcha", t);
return i ? a.Deferred().reject(i).promise() : r.sync.sendSmsTokenNeedPhrase(null, !0, e, t, n, "login1")
},
run: function(e) {
c.debug("sign in");
var t = this;
t.isInit() || t.set("isKeepAlive", r.getConfig("signIn.defaultKeepAlive")),
t.init().trigger("showLoading");
var n = r.utils.storage().get("lastSignInAccount", "").split(",");
n[2] && (new Date).getTime() <= n[2] ? t.set("saveAccount", {
type: n[1],
account: n[0]
}) : r.utils.storage().remove("lastSignInAccount"),
t.prepareQuickSignIn().always(function() {
t.trigger("hideLoading").trigger("show", {
wrapper: e
})
})
},
submit: function(n) {
var i, o = this,
a = {
type: n
},
u = o.get("isNeedCheckCaptcha", !1);
return this.trigger("beforeSubmit"),
"mobile" == n ? (a.account = o.get("mobile"), a.password = o.get("smsToken"), i = o.validate("mobile") || u && o.validate("captcha") || o.validate("smsToken")) : (u = o.get("isNeedCheckCaptcha"), a.account = o.get("username"), a.password = o.get("password"), a.captcha = o.get("captcha"), i = o.validate("username") || o.validate("password") || u && o.validate("captcha")),
a.isKeepAlive = o.get("isKeepAlive"),
i ? (i.signInType = n, void o.trigger("invalid", i)) : void e.resolve(r.sync.signIn(a)).then(function(t) {
return t && 0 === t.errno ? (o.trigger("hide"), r.sync.setCookie(t.s).then(function() {
return t.userinfo || {}
})) : e.reject(new Error("login1 fail"))
}).then(function(n) {
var a;
return a = r.isI360() && t.startsWith(location.pathname, "/oauth/bind") ? e.resolve() : s.tryHandleAbnormalPassword(n, o.get("password")),
a.then(function(t) {
if (t && t.shouldChangePassword) return r.isI360() ? (s.gotoPageWithSearchParams("/profile/chuserpwd?op=modifyPwd"), e.reject(new Error("auto goto change pwd page"))) : new e(function(e, t) {
r.modifyPassword(function() {
c.debug("change password success"),
r.$message({
title: "\u5bc6\u7801\u4fee\u6539\u6210\u529f",
content: "\u5bc6\u7801\u4fee\u6539\u6210\u529f, \u8bf7\u60a8\u4f7f\u7528\u65b0\u5bc6\u7801\u767b\u5f55"
}).then(function() {
e()
})
}),
o.trigger("invalid", i)
})
}).caught(function(t) {
return /goto/i.test(t.message) || (c.debug("sign out"), r.signOut(function() {
c.debug("sign out success")
})),
e.reject(t)
})
}).then(function() {
return r.getUserInfo(!1)
}).then(function(e) {
var t = r.getConfig("signIn.saveAccount", 604800);
if (t && "normal" == n) {
var i = (new Date).getTime() + 1e3 * t;
r.utils.storage().set("lastSignInAccount", [a.account, n, i].join(","))
}
o.trigger("success", e).resolve(e)
},
function(e) {
c.debug("login1 fail", e),
e.fromServer = !0,
e.signInType = n;
var t = e.errdetail && e.errdetail.captchaUrl;
t && o.setCaptchaUrl(t),
o.trigger("invalid", e)
})
},
checkIsCaptchaRequired: function(e) {
var t = a.Deferred(),
n = this;
return r.sync.checkSignInCaptchaRequired(e).always(function(e) {
e.captchaUrl && n.setCaptchaUrl(e.captchaUrl),
t.resolve( !! e.captchaFlag)
}),
t.promise()
},
getQuickSignInUrl: function() {
var e = a.map(r.getConfig("domainList", []),
function(e) {
return e.split(".")[0]
}).join(","),
t = r.getConfig("protocol"),
n = r.getConfig("signIn.quick.showUserNum", 3),
i = r.getConfig("signIn.quick.stylesheet", "");
return t + "://axlogin.passport.msvodx.com/ptlogin.php?displayType=" + r.getConfig("signIn.quick.mode", "picture") + "&custUserNum=" + n + "&nextUrl=" + encodeURIComponent(r.getConfig("proxy")) + "&requestScema=" + t + "&custStyleUrl=" + encodeURIComponent(i) + "&src=" + r.getConfig("src") + "&domain_list=" + e + "&t=" + (new Date).getTime()
},
thirdPartSignIn: function(e, n) {
var i, o = this,
c = r.getConfig("signIn.thirdPart", {}),
s = "jump" == c.mode,
u = this.get("callback"),
l = s && c.jumpUrl || s && "string" == typeof u && u || location.href,
p = {
sina: "Sina",
renren: "RenRen",
msn: "Msn",
fetion: "Fetion",
telecom: "Telecom",
tencent: "qq",
weixin: "weixin"
};
t.isFunction(n) && o.setCallback(n),
l = s ? l.replace(/(?:http(s?):\/\/)?(.*)/, "http$1://$2") : l.replace(/((?:https?:\/\/)?[\w.:]*\/?).*/, "$1");
var d = l,
f = r.getConfig("protocol") + "://i.msvodx.com/oauth/loginByOauth?c=" + p[e] + "&type=" + (s ? "normal": "pop") + "&destUrl=" + encodeURIComponent(d) + "&f=" + r.getConfig("src") + "&r=" + (new Date).getTime();
if (s) location.href = f;
else {
var h = "";
if ("tab" != c.mode) {
var m = a(window);
h = "height=645,width=875,left=" + Math.max(Math.round((m.outerWidth() - 875) / 2), 0) + ",top=" + Math.max(Math.round((m.outerHeight() - 645) / 2), 0) + ",alwaysRaised=yes"
}
i = window.open(f, "oauthlogin", h)
}
r.thirdLoginSuccess = function() {
r.sync.getRd().then(function(e) {
return r.sync.setCookie(e.rd)
}).then(function() {
return r.getUserInfo(!1)
}).then(function(e) {
i.close(),
o.trigger("hide").trigger("success", e).resolve(e)
},
function(e) {
r.reportWarn(e),
o.trigger("invalid", e)
})
}
},
getDomainApi: function() {
var e = r.getConfig("currentDomain", ""),
t = e || location.hostname.replace(/^(?:.+\.)?(\w+\.\w+)$/, "$1"),
n = r.getConfig("protocol") + "://login1." + t + "/?o=sso&m=getLoginQrcode&s=3";
return r.getConfig("signIn.qrCodeUrl", n) + "&t=" + Math.random()
},
signUp: function() {
var e = this.getCallback();
r.signUp ? (this.trigger("hide"), r.signUp(e)) : location.href = "http://i.msvodx.com/reg/?src=" + r.getConfig("src") + "&destUrl=" + encodeURIComponent("string" == typeof e ? e: location.href)
},
listenQrcodeLogin: function() {
var e = this;
if (r.utils.getCookie("i360QRKEY")) return r.sync.checkQrCodeSignInStatus().done(function(t) {
return r.sync.setCookie(t.s).then(function() {
return r.getUserInfo(!1)
}).then(function(t) {
e.trigger("hide").trigger("success", t).resolve(t)
},
function(t) {
r.reportWarn(t),
e.trigger("invalid", t)
})
})
}
});
r.thirdPartSignIn = function(e, t) {
return u.init(),
u.thirdPartSignIn(e, t)
},
r.events.on("init.core",
function() {
r.getConfig("signIn.prepareQuick", !1) && u.prepareQuickSignIn()
}),
r.signIn = function(e, t) {
i.load(),
!e || 1 == e.nodeType || e instanceof a || (t = e, e = void 0),
u.setCallback(t).run(e)
},
r.setConfig({
signIn: {
types: ["quick", "normal"],
defaultKeepAlive: !0
}
})
} (QHPass)
}).call(t, n(37), n(1))
},
function(e, t, n) {
var i = n(13).getLogger("modifyPassword"); !
function(e) {
"use strict";
var t = e.$,
n = {
init: function(e) {
this.model = e,
this.$el = t('<div class="quc-mod-modify-password"><p class="quc-tip">&nbsp;</p><form class="quc-form"><p class="quc-field quc-input-long"><label class="quc-label">\u65b0\u5bc6\u7801</label><span class="quc-input-bg"><input type="password" name="password" class="quc-input quc-input-password" placeholder="\u8bf7\u8f93\u5165\u65b0\u5bc6\u7801"></span></p><p class="quc-field quc-input-long"><label class="quc-label">\u786e\u8ba4\u5bc6\u7801</label><span class="quc-input-bg"><input type="password" name="passwordAgain" class="quc-input  quc-input-passwordAgain" placeholder="\u8bf7\u518d\u8f93\u5165\u4e00\u904d\u65b0\u5bc6\u7801"></span></p><p class="quc-field"><input class="quc-button quc-button-primary quc-button-big quc-button-submit" value="\u63d0\u4ea4" type="submit"/></p></form></div>'),
this._$el = this.$el,
this.initModelEvent(),
this.initElementEvent()
},
reset: function() {
i.debug("reset"),
this.$el = this._$el,
this.$el.find(".quc-button-submit").prop("disabled", !1).val("\u63d0\u4ea4"),
this.$el.find(".quc-tip").removeClass("quc-tip-error quc-tip-success").html(""),
this.$el.find(".quc-input").val("").parent().removeClass("quc-input-bg-focus")
},
initElementEvent: function() {
var e = this;
e.$el.find(".quc-input").focus(function() {
t(this).parent().addClass("quc-input-bg-focus")
}).blur(function() {
t(this).parent().removeClass("quc-input-bg-focus"),
e.model.set("password", e.$el.find(".quc-input-password").val()),
e.model.set("passwordAgain", e.$el.find(".quc-input-passwordAgain").val())
}).blur(function() {
var n, i = t(this).val(),
r = t(this).attr("name");
i.length > 0 && ("password" == r ? n = e.model.validate(r, !0).done(function(t) {
e.model.set("weakError", !1),
e.model.set("oldpwd", i)
}).fail(function(t) {
t && (e.model.set("weakError", t), e.showTip(t.errmsg, t.errno))
}) : (n = e.model.validate(r), n ? e.showTip(n.errmsg, n.errno) : n = e.model.validate("password", !0).done(function(t) {
e.model.set("weakError", !1),
e.model.set("oldpwd", i)
}).fail(function(t) {
t && (e.model.set("weakError", t), e.showTip(t.errmsg, t.errno))
})))
}),
e.$el.find(".quc-form").submit(function(t) {
t.preventDefault(),
e.submit()
})
},
initModelEvent: function() {
var t = this;
t.model.on("show",
function(e, n) {
t.show(n && n.wrapper)
}).on("hide",
function() {
t.hide()
}).on("invalid",
function(n, i) {
e.utils.isSameError(i.errno, e.ERROR.IDENTIFY_EXPIRE) || t.showTip(i)
}).on("reset",
function() {
t.$el.find(".quc-button-submit").prop("disabled", !1).val("\u63d0\u4ea4")
})
},
showTip: function(e, t) {
var n = this,
i = this.$el.find(".quc-tip");
e && e.errno && (t = e.errno, e = e.errmsg),
t ? (i.addClass("quc-tip-error").removeClass("quc-tip-success"), setTimeout(function() {
n.$el.one("focus", ".quc-input",
function() {
i.html("")
})
},
30), n.$el.find(".quc-button-submit").prop("disabled", !1).val("\u63d0\u4ea4")) : i.addClass("quc-tip-success").removeClass("quc-tip-error"),
i.html(e)
},
submit: function() {
var e = this,
t = e.$el.find(".quc-button-submit"),
n = e.model.get("weakError"); (!n || 50001 != n.errno && 1091 != n.errno) && (t.prop("disable", !0).val("\u63d0\u4ea4\u4e2d..."), e.model.one("invalid",
function() {
t.prop("disable", !1).val("\u63d0\u4ea4")
}), e.model.set("password", e.$el.find(".quc-input-password").val()), e.model.set("passwordAgain", e.$el.find(".quc-input-passwordAgain").val()), e.model.submit())
},
show: function(n) {
if (this.reset(), i.debug("show panel"), n) this.model.trigger("beforeShow", this.$el[0]),
t(n).addClass("quc-wrapper quc-page").empty().append(this.$el);
else {
var r = this.panel = new e.utils.Panel;
r.setTitle(e.getConfig("modifyPassword.panelTitle", "\u4fee\u6539\u5bc6\u7801")),
r.setContent(this.$el),
this.model.trigger("beforeShow", this.$el[0]),
r.show(),
t(r).on("close", e.getConfig("modifyPassword.panelCloseHandler", t.noop))
}
this.model.trigger("afterShow", this.$el[0])
},
hide: function() {
i.debug("hide panel"),
this.model.trigger("beforeHide", this.$el[0]),
this.panel && this.panel.hide(),
this.model.trigger("afterHide", this.$el[0])
}
};
e.ui.modifyPassword = {
init: function() {
n.init.apply(n, arguments)
}
}
} (QHPass),
function(e) {
"use strict";
var t = e.getLogic({
name: "modifyPassword",
validate: function(t, n) {
i.debug("validate", t, n);
var r, o = this.get("password"),
a = this.get("passwordAgain");
switch (t) {
case "password":
var c = e.getUserInfoCache() || {}; ! (r = e.validate.checkPasswordFrontendSync({
password: o,
username: c.userName
}).reason) && a && (r = this.validate("passwordAgain"));
break;
case "passwordAgain":
r = e.validate.checkPasswordConfirm(o, a)
}
if (!n) return r;
var s = $.Deferred();
if (r) return s.reject(r);
switch (t.toLowerCase()) {
case "password":
return this.get("oldpwd") != o ? e.sync.checkWeakPwd(o) : s.resolve(this.get("weakError"))
}
},
run: function(t) {
var n = this;
n.init().trigger("showLoading"),
i.debug("show loading and identify"),
e.identify(n).always(function() {
n.trigger("hideLoading")
}).done(function() {
n.trigger("show", {
wrapper: t
})
})
},
submit: function() {
var t = this,
n = !1;
i.debug("submit"),
this.trigger("beforeSubmit"),
$.each(["password", "passwordAgain"],
function(e, i) {
if (n = t.validate(i)) return t.trigger("invalid", n),
!1
}),
n || (i.debug("validate pass"), e.getUserInfo().then(function(n) {
return e.sync.modifyPassword(n.crumb, t.get("password"))
}).then(function(e) {
t.trigger("hide").resolve(e),
i.debug("success")
},
function(e) {
t.trigger("invalid", e),
i.debug("error")
}))
}
});
e.modifyPassword = function(e, n) {
i.debug("run"),
"function" == typeof e && (n = e, e = void 0),
t.setCallback(n).run(e)
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = {
mobile: '<p class="quc-field quc-field-mobile quc-input-long"><label class="quc-label">\u624b\u673a\u53f7</label><span class="quc-input-bg"><input class="quc-input quc-input-mobile" type="tel" name="account" data-name="mobile" maxlength="11" /></span><i class="quc-tip-icon"></i><span class="quc-tip">\u8bf7\u8f93\u5165\u60a8\u7684\u624b\u673a\u53f7</span></p>',
email: '<p class="quc-field quc-field-email quc-input-long"><label class="quc-label">\u90ae\u7bb1</label><span class="quc-input-bg"><input class="quc-input quc-input-email" type="text" name="account" data-name="email" autocomplete="off"/></span><i class="quc-tip-icon"></i><span class="quc-tip">\u8bf7\u8f93\u5165\u60a8\u7684\u5e38\u7528\u90ae\u7bb1\uff0c<a class="quc-link" href="http://email.163.com/" target="_blank" tabindex="99">\u6ca1\u6709\u90ae\u7bb1\uff1f</a></span></p>',
username: '<p class="quc-field quc-field-username quc-input-long"><label class="quc-label">\u7528\u6237\u540d</label><span class="quc-input-bg"><input class="quc-input quc-input-username" type="text" name="userName" data-name="username" maxlength="14" /></span><i class="quc-tip-icon"></i><span class="quc-tip">2-14\u4e2a\u5b57\u7b26\uff1a\u82f1\u6587\u3001\u6570\u5b57\u6216\u4e2d\u6587</span></p>',
nickname: '<p class="quc-field quc-field-nickname quc-input-long"><label class="quc-label">\u6635\u79f0</label><span class="quc-input-bg"><input class="quc-input quc-input-nickname" type="text" name="nickname" maxlength="14" /></span><i class="quc-tip-icon"></i><span class="quc-tip">2-14\u4e2a\u5b57\u7b26\uff1a\u82f1\u6587\u3001\u6570\u5b57\u6216\u4e2d\u6587</span></p>',
password: '<p class="quc-field quc-field-password quc-input-long"><label class="quc-label">\u5bc6\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-password" type="password" name="password" maxlength="22" /></span><i class="quc-tip-icon"></i><span class="quc-tip">8-20\u4e2a\u5b57\u7b26(\u533a\u5206\u5927\u5c0f\u5199)</span></p>',
passwordAgain: '<p class="quc-field quc-field-password-again quc-input-long"><label class="quc-label">\u786e\u8ba4\u5bc6\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-password-again" type="password" name="passwordAgain" maxlength="22" /></span><i class="quc-tip-icon"></i><span class="quc-tip">\u8bf7\u518d\u6b21\u8f93\u5165\u5bc6\u7801</span></p>',
captcha: '<p class="quc-field quc-field-captcha quc-input-short"><label class="quc-label">\u9a8c\u8bc1\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-captcha" type="text" name="captcha" maxlength="7" autocomplete="off" /></span><img class="quc-captcha-img quc-captcha-change" alt="\u9a8c\u8bc1\u7801" title="\u70b9\u51fb\u66f4\u6362" tabindex="99" /><a class="quc-link quc-link-captcha-change quc-captcha-change" href="#">\u6362\u4e00\u5f20</a><i class="quc-tip-icon"></i><span class="quc-tip">\u8bf7\u8f93\u5165\u56fe\u4e2d\u7684\u5b57\u6bcd\u6216\u6570\u5b57\uff0c\u4e0d\u533a\u5206\u5927\u5c0f\u5199</span></p>',
smsToken: '<p class="quc-field quc-field-sms-token quc-input-middle quc-clearfix"><label class="quc-label">\u6821\u9a8c\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-sms-token" type="text" name="smscode" data-name="smsToken" maxlength="6" /></span><a href="#" class="quc-button quc-button-blue quc-get-sms-token">\u514d\u8d39\u83b7\u53d6\u6821\u9a8c\u7801</a><i class="quc-tip-icon"></i><span class="quc-tip">\u8bf7\u8f93\u5165\u77ed\u4fe1\u4e2d6\u4f4d\u6570\u5b57\u6821\u9a8c\u7801</span><a class="quc-mobile-tip quc-link" href="http://i.msvodx.com/help/smscode" target="_blank" tabindex="99">\u6821\u9a8c\u7801\u5e38\u89c1\u95ee\u9898</a></p>'
},
i = {
email: {
name: "\u90ae\u7bb1\u6ce8\u518c",
fields: ["email", "username", "nickname", "password", "passwordAgain", "captcha"]
},
mobile: {
name: "\u624b\u673a\u6ce8\u518c",
fields: ["mobile", "captcha", "smsToken", "username", "nickname", "password", "passwordAgain"]
},
username: {
name: "\u7528\u6237\u540d\u6ce8\u518c",
fields: ["username", "nickname", "password", "passwordAgain", "captcha"]
}
},
r = {},
o = {
init: function(e) {
this.model = e,
this.initModelEvent(),
this.initCaptcha(),
this.initSmsToken(),
this.initErrorTip()
},
setElement: function() {
r = {};
var e = this;
e.$el && e.$el.remove(),
e.$el = t('<div class="quc-mod-sign-up quc-clearfix"><div class="quc-left-bar"><ul class="quc-sign-up-type"></ul></div><div class="quc-main"><div class="quc-tip-wrapper quc-global-error"><p class="quc-tip quc-tip-error"></p></div><form class="quc-form" method="post" action="https://i.msvodx.com/signUp/dosignUpAccount"><p class="quc-field quc-field-submit"><input class="quc-button quc-button-primary quc-button-sign-up" type="submit" value="\u7acb\u5373\u6ce8\u518c" /></p><p class="quc-field quc-field-licence"><label><input class="quc-checkbox" type="checkbox" name="is_agree" data-name="agreeLicence"><span>\u9605\u8bfb\u5e76\u540c\u610f<a class="quc-link" href="//i.msvodx.com/pub/protocol.html" target="_blank">\u201c360\u7528\u6237\u534f\u8bae\u201d</a>\u548c<a class="quc-link" href="//i.msvodx.com/reg/privacy" target="_blank">\u201c360\u7528\u6237\u9690\u79c1\u653f\u7b56\u201d</a></span></label></p><p class="quc-login">\u5df2\u6709\u5e10\u53f7\uff0c<a href="#" class="quc-link quc-link-login">\u7acb\u5373\u767b\u5f55</a></p></form></div></div>'),
e.userType = null,
e.initNav(),
e.$el.on("click", ".quc-link-login,.quc-button-login",
function(t) {
t.preventDefault(),
e.onSignIn()
}),
e.$el.find(".quc-form").submit(function(t) {
t.preventDefault(),
e.submit()
}),
e.$el.find(".quc-checkbox").on("click",
function() {
e.model.trigger("afterShow.changeType")
})
},
initModelEvent: function() {
var n = this;
n.model.on("show",
function(e, t) {
n.show(t && t.wrapper)
}).on("success",
function() {
var n = e.getConfig("signInBoxWrapper", ""),
i = e.getConfig("signInBoxOpts", {});
n && e.plugin.signInBox && t(n).empty().html(e.plugin.signInBox(i))
}).on("hide",
function() {
n.hide()
}).on("dealCaptcha",
function() {
n.$el.find(".quc-field-captcha").hide(),
n.$el.find(".quc-input-captcha").val(""),
n.$el.find(".quc-input-mobile").off("change").on("change",
function() {
n.$el.find(".quc-field-captcha").show(),
n.$el.find(".quc-captcha-change").trigger("click"),
n.model.set("token", null),
n.model.trigger("timer_stop")
})
})
},
initCaptcha: function() {
var n, i, r = this,
o = function(e) {
var n = "mobile" == e ? "strictreg": "reg";
r.model.getCaptchaUrl(n, !0).then(function(e) {
i.find(".quc-captcha-img").attr("src", e),
i.find(".quc-input-captcha").val(""),
i.find(".quc-tip").removeClass("quc-tip-error").html(function() {
return t(this).attr("data-default-tip")
}),
i.find(".quc-tip-icon").removeClass("quc-tip-icon-incorrect quc-tip-icon-correct")
})
},
a = function(e) {
o(e),
i.show(),
i.find(".quc-captcha-change").on("mousedown",
function(e) {
e.preventDefault()
}).on("click",
function(t) {
t.preventDefault(),
o(e),
i.find(".quc-input-captcha").focus()
})
};
r.model.on("changeType",
function(e, t) {
i = r.$el.find(".quc-field-captcha"),
0 != i.length && (n || (n = r.model.isCaptchaRequired()) || "mobile" == t) && a(t)
}),
this.model.on("invalid",
function(t, i) {
var r = i.type || "reg";
n || "captcha" != e.utils.getErrorType(i) ? i.fromServer && o(r) : (n = !0, a(r))
})
},
initSmsToken: function() {
var t, n, i, r, o = this,
a = "quc-button-disabled",
c = e.utils.getTimer("sign_up");
c.on("timer_start",
function(e, t) {
n.addClass(a),
n.html(t + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
c.on("timer_tick",
function(e, t) {
n.html(t + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
c.on("timer_stop",
function() {
n.html("\u91cd\u65b0\u83b7\u53d6\u6821\u9a8c\u7801"),
n.removeClass(a)
}),
o.model.on("timer_stop",
function() {
c.stop()
});
var s = function(e) {
e.preventDefault();
var s = n.siblings(".quc-tip-icon");
n.hasClass(a) || (o.model.set("mobile", t.val()), o.model.set("captcha", r.val()), n.html("\u53d1\u9001\u4e2d..."), n.addClass(a), s.hide(), o.model.trigger("afterShow.changeType"), o.model.sendSmsToken().done(function(e) {
var t = i.find(".quc-tip");
t.addClass("quc-tip-success").html("\u53d1\u9001\u6210\u529f").show(),
i.find(".quc-input").one("change",
function() {
t.removeClass("quc-tip-success").html(t.attr("data-default-tip"))
}),
s.show(),
c.start(),
o.model.set("token", e.vt),
o.model.trigger("dealCaptcha")
}).fail(function(e) {
s.show(),
n.html("\u514d\u8d39\u83b7\u53d6\u6821\u9a8c\u7801"),
n.removeClass(a),
e.type = "mobile";
var t = e.errdetail && e.errdetail.captchaUrl;
t && (e.fromServer = !0, o.model.setCaptchaUrl(t)),
o.model.trigger("invalid", e)
}))
};
this.model.on("changeType",
function() {
i = o.$form.find(".quc-field-sms-token"),
t = o.$form.find(".quc-input-mobile"),
r = o.$form.find(".quc-input-captcha"),
n = i.find(".quc-get-sms-token"),
0 != i.length && (n.off("click", s).on("click", s), c.isRunning() && c.resume())
})
},
initErrorTip: function() {
var e = this;
e.model.on("invalid",
function(t, n) {
var i = n.field || e.getErrorField(n.errno),
r = i.find(".quc-input-bg"),
o = i.find(".quc-tip"),
a = i.find(".quc-tip-icon");
o.removeClass("quc-tip-success").addClass("quc-tip-error").html(n.errmsg).show(),
a.removeClass("quc-tip-icon-incorrect").addClass("quc-tip-icon-incorrect"),
r.addClass("quc-input-bg-incorrect"),
i.find(".quc-input").one("focus quc-validate",
function() {
o.removeClass("quc-tip-error").html(o.attr("data-default-tip")),
a.removeClass("quc-tip-icon-incorrect"),
r.removeClass("quc-input-bg-incorrect")
})
}),
e.model.on("afterShow.changeType",
function() {
e.$el.find(".quc-global-error .quc-tip").html("")
})
},
initNav: function() {
var e = this,
n = this.model.getTypes(),
r = this.$el.find(".quc-left-bar").show().find(".quc-sign-up-type").empty();
t.each(n,
function(n, o) {
if (i[o]) {
var a = t("<a>").attr("href", "#").html(i[o].name).prepend(t("<i>").addClass("quc-icon quc-icon-" + o)).click(function(t) {
t.preventDefault(),
e.changeType(o)
});
t("<li>").addClass("quc-type-" + o).append(a).appendTo(r)
}
}),
this.changeType(n[0])
},
onSignIn: function() {
this.model.signIn()
},
getFieldEl: function(e) {
var i = this,
r = n[e],
o = t(r);
return o.find(".quc-input").focus(function() {
t(this).parent().addClass("quc-input-bg-focus"),
i.model.trigger("afterShow.changeType")
}).blur(function() {
t(this).parent().removeClass("quc-input-bg-focus"),
i.validate(o),
o.hasClass("quc-field-password") && i.validate(o.siblings(".quc-field-password-again")),
o.hasClass("quc-field-password-again") && i.validate(o.siblings(".quc-field-password"))
}),
o
},
getFormEl: function(n) {
var o = this;
if (!r[n]) {
if (!i[n]) return void o.model.reportWarn("\u672a\u5b9a\u4e49\u7684\u7c7b\u522b typeConf:" + n);
var a = t("<div>");
t.each(i[n].fields,
function(e, t) {
o.model.isShowField(t, n) && a.append(o.getFieldEl(t))
}),
r[n] = a,
e.utils.emailHint(a.find(".quc-input-email"))
}
return r[n][0]
},
getErrorField: function(t) {
var n = e.utils.getErrorType(t);
return "account" == n ? this.$form.find(".quc-field-" + this.userType) : "other" != n ? this.$form.find(".quc-field-" + n) : this.$el.find(".quc-global-error")
},
changeType: function(e) {
var n = this.$el.find(".quc-sign-up-type .quc-type-" + e);
n.length > 0 && this.userType != e && (n.addClass("quc-current"), n.siblings(".quc-current").removeClass("quc-current"), this.$form && this.$form.detach(), this.$form = t(this.getFormEl(e)), this.$form.prependTo(this.$el.find(".quc-form")), this.model.trigger("DOMUpdated", this.$el), this.$el.triggerHandler("QucDOMUpdated"), this.model.trigger("afterShow.changeType", this.$el[0]), this.model.trigger("changeType", e), this.userType = e, this.$form.find(".quc-field .quc-tip").attr("data-default-tip",
function() {
return t(this).html()
}), this.model.clear())
},
validate: function(e) {
var t = this,
n = e.find(".quc-input"),
i = n.attr("data-name") || n.attr("name"),
r = n.val();
0 != e.length && 0 != r.length && (n.trigger("quc-validate"), t.model.validate(i, r, !0).done(function() {
var t = e.find(".quc-tip-icon");
t.removeClass("quc-tip-icon-incorrect").addClass("quc-tip-icon-correct"),
n.one("focus",
function() {
t.removeClass("quc-tip-icon-correct")
})
}).fail(function(n) {
n.field = e,
t.model.trigger("invalid", n)
}))
},
submit: function() {
var e = this,
n = e.$el.find(".quc-button-sign-up");
e.$el.find(".quc-form input:not(:submit, :button)").each(function(n, i) {
var r = t(i),
o = r.attr("data-name") || r.attr("name"),
a = t.inArray(r.attr("type"), ["checkbox", "radio"]) >= 0 ? r.prop("checked") : r.val();
e.model.set(o, a)
}),
!1 === e.model.get("agreeLicence") && (e.$el.find("[name=is_agree]").is(":visible") || e.model.set("agreeLicence", !0)),
n.prop("disabled", !0).val("\u63d0\u4ea4\u4e2d..."),
e.model.one("invalid",
function() {
n.prop("disabled", !1).val("\u63d0\u4ea4")
}),
e.model.set("isNeedCheckCaptcha", !!e.$el.find(".quc-field-captcha:visible")[0]),
e.model.set("userType", this.userType),
e.model.submit()
},
show: function(n) {
if (this.setElement(), n) this.model.trigger("beforeShow", this.$el[0]),
t(n).addClass("quc-wrapper quc-page").empty().append(this.$el);
else {
var i = this.panel = new e.utils.Panel;
i.setTitle(e.getConfig("signUp.panelTitle", "\u6b22\u8fce\u6ce8\u518c360\u5e10\u53f7")),
i.setContent(this.$el),
this.model.trigger("beforeShow", this.$el[0]),
i.show(),
t(i).on("close", e.getConfig("signUp.panelCloseHandler", t.noop));
var r = e.utils.browser; (r.ie6 || r.ie7) && i.setSize(r.ie6 ? 564 : 544)
}
this.model.trigger("afterShow", this.$el[0])
},
hide: function() {
this.model.trigger("beforeHide", this.$el[0]),
this.panel && this.panel.hide(),
this.model.trigger("afterHide", this.$el[0])
}
};
e.ui.signUp = {
init: function() {
o.init.apply(o, arguments)
},
changeType: function(e) {
o.changeType(e)
}
}
} (QHPass)
},
function(e, t, n) {
var i = n(81); !
function(e) {
var t, n = e.$,
r = {
email: 1,
mobile: 2,
username: 4
},
o = e.getLogic({
name: "signUp",
validate: function(t, i, r) {
var o, a = e.validate;
switch ("boolean" == typeof i && (i = this.get(t)), t.toLowerCase()) {
case "mobile":
o = a.checkMobile(i);
break;
case "email":
o = a.checkEmail(i);
break;
case "username":
this.set("username", i),
o = a.checkUsername(i);
break;
case "nickname":
o = a.checkNickname(i);
break;
case "password":
this.set("password", i);
o = a.checkPasswordFrontendSync({
password: i,
username: this.get("username")
}).reason;
break;
case "passwordagain":
o = a.checkPasswordConfirm(this.get("password"), i);
break;
case "captcha":
o = a.checkCaptcha(i);
break;
case "smstoken":
o = a.checkSmsToken(i)
}
if (!r) return o;
var c = e.sync,
s = n.Deferred();
if (o) return s.reject(o);
switch (t.toLowerCase()) {
case "mobile":
return c.checkMobileNumberExist(i);
case "email":
return c.checkEmailExist(i);
case "username":
return c.checkUsernameExist(i);
case "nickname":
return c.checkNicknameExist(i);
default:
return s.resolve()
}
},
isCaptchaRequired: function() {
return t
},
prepareCaptcha: function() {
var i = this;
return e.sync.checkSignUpCaptchaRequired().then(function(e) {
t = e.captchaFlag,
i.setCaptchaUrl(e.captchaUrl)
},
function() {
return t = !0,
n.Deferred().resolve().promise()
})
},
isShowField: function(t, i) {
var r = n.inArray(t, ["username", "nickname", "passwordAgain"]) >= 0,
o = "signUp.hide" + t.substr(0, 1).toUpperCase() + t.substr(1);
return ! r || i == t || !e.getConfig(o, !1)
},
sendSmsToken: function() {
var t = this.get("mobile"),
i = this.get("captcha"),
r = this.get("token"),
o = this.validate("mobile", t) || !r && this.validate("captcha", i);
return o ? n.Deferred().reject(o).promise() : e.sync.sendSmsTokenNeedPhrase(null, !1, t, i, r, "reg")
},
run: function(t) {
var n = this;
n.init().trigger("showLoading"),
n.prepareCaptcha().then(function() {
return e.activeEmail.prepare(n, t)
}).done(function() {
n.trigger("hideLoading").trigger("show", {
wrapper: t
})
})
},
getTypes: function() {
return e.getConfig("signUp.types", ["mobile", "email"])
},
submit: function() {
var i = this,
o = i.get("userType"),
a = i.get("isNeedCheckCaptcha", !1),
c = r[o];
if (!c) return void i.model.reportWarn("\u672a\u5b9a\u4e49\u7684\u7c7b\u522b typeConf:" + o);
this.trigger("beforeSubmit");
var s = {
acctype: c,
account: i.get(o),
password: i.get("password")
};
s.emailActiveFlag = e.getConfig("signUp.sendActiveEmail", !0),
n.each(["username", "nickname", "passwordAgain", "smsToken", "agreeLicence"],
function(e, t) {
var n = i.get(t, void 0);
void 0 !== n && (s[t] = n)
}),
a && (s.captcha = i.get("captcha"));
var u = !1,
l = {
mobile: i.get("mobile"),
email: i.get("email")
};
n.each(n.extend({},
s, l),
function(e, t) {
var n = i.validate(e, t);
n && i.trigger("invalid", n),
u = u || n
}),
!u && e.sync.signUp(s).then(function(t) {
var r = n.Deferred();
return t.activeurl ? (t.email = i.get("email"), e.activeEmail(t,
function() {
e.sync.getRd().done(function(e) {
r.resolve(e)
}).fail(function() {
i.signIn()
})
})) : (t.rd = encodeURIComponent(t.rd), r.resolve(t)),
r.promise()
}).then(function(t) {
return e.sync.setCookie(t.rd)
}).then(function() {
return e.getUserInfo(!1)
}).done(function(e) {
i.trigger("hide").trigger("success", e).resolve(e)
}).fail(function(e) {
e.fromServer = !0;
var n = e.errdetail && e.errdetail.captchaUrl;
n && (t = !0, i.setCaptchaUrl(n)),
i.trigger("invalid", e)
})
},
signIn: function() {
var t = this.getCallback();
e.signIn ? (this.trigger("hide"), e.signIn(t)) : location.href = "http://i.msvodx.com/login/?src=" + e.getConfig("src") + "&destUrl=" + encodeURIComponent("string" == typeof t ? t: location.href)
}
});
e.signUp = function(e, t) {
i.load(),
!e || 1 == e.nodeType || e instanceof n || (t = e, e = void 0),
o.setCallback(t).run(e)
},
e.setConfig("signUp.hideNickname", !0)
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = '<div class="quc-mod-set-username"><form class="quc-form"><p class="quc-input-wrapper quc-input-long"><span class="quc-input-bg"><input type="text" name="username" class="quc-input quc-input-username" maxlength="14" autocomplete="off" placeholder="\u8bf7\u8f93\u5165\u7528\u6237\u540d\uff1a2-14\u4e2a\u5b57\u7b26,\u652f\u6301\u4e2d\u82f1\u6587"/></span><input type="submit" value="\u4fdd\u5b58" class="quc-submit quc-button quc-button-primary quc-button-save"/></p><p class="quc-tip"></p><div class="quc-alternative-wrapper"><p class="quc-tip-error">\u7528\u6237\u540d\u5df2\u7ecf\u88ab\u5360\u7528\uff0c\u6211\u4eec\u4e3a\u60a8\u63a8\u8350\u4ee5\u4e0b\u7528\u6237\u540d\uff1a</p><div class="quc-alternatives"></div></div></form></div> ',
i = {
init: function(e) {
this.model = e,
this.$el = t(n),
this.initModelEvent(),
this.initElementEvent()
},
reset: function() {
this.$el.remove(),
this.$el = t(n),
this.initElementEvent()
},
initElementEvent: function() {
var e = this;
e.$el.find(".quc-input").focus(function() {
t(this).parent().removeClass("quc-input-bg-incorrect").addClass("quc-input-bg-focus")
}).blur(function() {
t(this).parent().removeClass("quc-input-bg-focus")
}),
e.$el.find(".quc-form").submit(function(n) {
var i = t(this),
r = i.find(".quc-submit"),
o = t.trim(i.find(".quc-input-username").val());
n.preventDefault(),
r.prop("disabled", !0).val("\u4fdd\u5b58\u4e2d..."),
e.model.one("invalid",
function() {
r.prop("disabled", !1).val("\u4fdd\u5b58")
}),
e.model.set("username", o),
e.model.submit()
})
},
initModelEvent: function() {
var e = this;
e.model.on("show",
function(t, n) {
e.show(n && n.wrapper)
}).on("hide",
function() {
e.hide()
}).on("invalid",
function(t, n) {
e.showErrorTip(n)
})
},
setUsername: function(e) {
this.$el.find(".quc-input-username").val(e).focus()
},
showErrorTip: function(t) {
var n = this.$el.find(".quc-input-username");
if (e.utils.isSameError(t, e.ERROR.USERNAME_DUPLICATE) && this.model.get("alternatives", []).length > 0) this.showAlternatives();
else {
var i = this.$el.find(".quc-tip");
this.$el.find(".quc-input-bg").addClass("quc-input-bg-incorrect"),
i.addClass("quc-tip-error").html(t.errmsg).show(),
n.one("focus",
function() {
i.html("")
})
}
n.parent().addClass("quc-input-bg-incorrect")
},
showAlternatives: function() {
var e, n = this,
i = this.model.get("alternatives", []),
r = this.$el.find(".quc-tip");
if (! (i.length <= 0)) {
var o = this.$el.find(".quc-alternatives");
o.empty();
for (var a = 0,
c = i.length; a < c; a++) e = i[a],
t('<a href="#" class="quc-link"></a>').html(e).on("click",
function(e) {
return function(t) {
t.preventDefault(),
n.setUsername(e)
}
} (e)).appendTo(o);
o.parent().show(),
r.hide(),
this.$el.find(".quc-input-username").on("change",
function(e) {
var n = t(this); - 1 == t.inArray(n.val(), i) && (o.parent().hide(), r.show(), n.off(e))
})
}
},
show: function(n) {
if (n) this.model.trigger("beforeShow", this.$el[0]),
t(n).addClass("quc-wrapper quc-page").empty().append(this.$el);
else {
this.panel && this.reset();
var i = this.panel = new e.utils.Panel;
i.setTitle(e.getConfig("setUsername.panelTitle", "\u8bbe\u7f6e\u7528\u6237\u540d")),
i.setContent(this.$el),
this.model.trigger("beforeShow", this.$el[0]),
i.show(),
t(i).on("close", e.getConfig("setUsername.panelCloseHandler", t.noop))
}
this.model.trigger("afterShow", this.$el[0])
},
hide: function() {
this.model.trigger("beforeHide", this.$el[0]),
this.panel && this.panel.hide(),
this.model.trigger("afterHide", this.$el[0])
}
};
e.ui.setUsername = {
init: function() {
i.init.apply(i, arguments)
}
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = e.getLogic({
name: "setUsername",
validate: function(t) {
return t = t || this.get("username"),
e.validate.checkUsername(t)
},
run: function(e) {
this.init().trigger("show", {
wrapper: e
})
},
submit: function() {
var n = this,
i = t.Deferred(),
r = n.validate();
return this.trigger("beforeSubmit"),
r ? i.reject(r) : i.resolve(),
i.then(function() {
return e.getUserInfo(!1)
}).then(function(t) {
return e.sync.setUsername(t.crumb, n.get("username"))
}).done(function(e) {
n.trigger("hide").trigger("success").resolve(e)
}).fail(function(e) {
n.set("alternatives", e.userinfo),
n.trigger("invalid", e)
})
}
});
e.setUsername = function(e, i) { ! e || 1 == e.nodeType || e instanceof t || (i = e, e = void 0),
n.setCallback(i).run(e)
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = '<div class="quc-mod-authentication"><div class="quc-tip-wrapper quc-global-error"><p class="quc-tip quc-tip-error"></p></div><div class="quc-mod-authentication-captcha"><form method="post" class="quc-form quc-form-captcha"><p class="quc-field quc-input-long quc-field-mobile quc-clearfix"><label class="quc-label">\u624b\u673a\u53f7</label><span class="quc-input-bg"><input class="quc-input quc-input-mobile" type="tel" name="account" data-name="mobile" maxlength="11" placeholder="\u8bf7\u8f93\u5165\u60a8\u7684\u624b\u673a\u53f7" autocomplete="off"/></span></p><p class="quc-field quc-field-captcha quc-input-short"><label class="quc-label">\u9a8c\u8bc1\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-captcha" type="text" name="captcha" data-name="captcha" maxlength="7" autocomplete="off" placeholder="\u8bf7\u8f93\u5165\u9a8c\u8bc1\u7801" /></span><img class="quc-captcha-img quc-captcha-change" alt="\u9a8c\u8bc1\u7801" title="\u70b9\u51fb\u66f4\u6362" tabindex="99" /> <a class="quc-link quc-captcha-change-link quc-captcha-change" href="#">\u6362\u4e00\u5f20</a></p><p><input class="quc-button quc-button-primary quc-button-big quc-button-submit quc-button-check-captcha" type="submit" value="\u63d0\u4ea4" /></p></form></div><div class="quc-mod-authentication-token"><form method="post" class="quc-form quc-form-token"><div class="quc-field quc-clearfix"><p class="quc-field-send-smstoken"><span class="quc-input quc-input-method">\u6821\u9a8c\u7801\u5df2\u53d1\u9001\u81f3\uff1a<i class="quc-sec-mobile"></i></span><a href="#" class="quc-button quc-button-blue quc-get-sms-token">\u91cd\u65b0\u83b7\u53d6\u6821\u9a8c\u7801</a></p><a class="quc-link quc-link-mobile-tip" href="http://i.msvodx.com/help/smscode" target="_blank" tabindex="99">\u6821\u9a8c\u7801\u5e38\u89c1\u95ee\u9898</a></div><p class="quc-field quc-field-sms-token quc-input-long"><label class="quc-label">\u6821\u9a8c\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-sms-token" type="text" name="smscode" data-name="smstoken" maxlength="6" placeholder="\u8bf7\u8f93\u5165\u516d\u4f4d\u6821\u9a8c\u7801" autocomplete="off"/></span></p><p><input class="quc-button quc-button-primary quc-button-big quc-button-submit quc-button-identify" type="submit" value="\u63d0\u4ea4" /><a href="###" class="quc-link quc-link-go-back">\u8fd4\u56de</a></p></form></div><div class="quc-mod-authentication-success"><p class="quc-field quc-field-success">\u8be5\u5e10\u53f7\u5df2\u5b8c\u6210\u8ba4\u8bc1\uff01</p><p class="quc-field quc-field-success"><input class="quc-button quc-button-blue quc-button-ensure" type="submit" value="\u786e\u8ba4" /></p></div></div>',
i = {
init: function(e) {
this.model = e,
this.$el = t(n),
this.initModelEvent(),
this.initElementEvent(),
this.initSmsToken(),
this.initCaptcha()
},
reset: function() {
this.$el && this.$el.remove(),
this.$el = t(n),
this.initElementEvent(),
this.initCaptcha()
},
initCaptcha: function() {
var t = this,
n = t.$el.find(".quc-field-captcha"),
i = function(e) {
t.model.getCaptchaUrl("shiming").then(function(t) {
n.find(".quc-captcha-img").attr("src", t);
var i = n.find(".quc-input-captcha").val("");
e && i.focus()
})
},
r = function(t, n) {
var r = "captcha" == e.utils.getErrorType(n);
n.fromServer && i(r)
};
t.$el.find(".quc-captcha-change").click(function(e) {
e.preventDefault(),
i()
}),
t.model.on("invalid", r),
i()
},
initElementEvent: function() {
var e = this,
n = e.model;
e.$el.find(".quc-input").focus(function() {
t(this).parent().removeClass("quc-input-bg-incorrect").addClass("quc-input-bg-focus")
}).blur(function() {
var e = t(this);
e.parent().removeClass("quc-input-bg-focus");
var i = e.attr("data-name") || e.attr("name"),
r = t.trim(e.val());
if (0 != r.length) {
var o = n.validate(i, r);
o ? n.trigger("invalid", o) : n.trigger("clean")
}
}),
e.$el.find(".quc-form-captcha").submit(function(e) {
e.preventDefault();
var i = t(this),
r = i.find(".quc-button-check-captcha");
r.prop("disabled", !0).val("\u63d0\u4ea4\u4e2d..."),
n.one("invalid",
function() {
r.prop("disabled", !1).val("\u63d0\u4ea4")
}),
n.set("mobile", t.trim(i.find(".quc-input-mobile").val())),
n.set("captcha", t.trim(i.find(".quc-input-captcha").val())),
n.checkPhrase()
}),
e.$el.find(".quc-link-go-back").on("click",
function(t) {
t.preventDefault(),
e.model.trigger("showCaptchaPanel")
}),
e.$el.find(".quc-form-token").submit(function(e) {
e.preventDefault();
var i = t(this),
r = i.find(".quc-button-identify");
r.prop("disabled", !0).val("\u63d0\u4ea4\u4e2d..."),
n.one("invalid",
function() {
r.prop("disabled", !1).val("\u63d0\u4ea4")
}),
n.set("smstoken", t.trim(i.find(".quc-input-sms-token").val())),
n.submit()
})
},
initSmsToken: function() {
var t, n = this,
i = "quc-button-disabled",
r = e.utils.getTimer("bind_mobile");
r.on("timer_start",
function(e, n) {
t.addClass(i),
t.html(n + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
r.on("timer_tick",
function(e, n) {
t.html(n + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
r.on("timer_stop",
function() {
t.html("\u91cd\u65b0\u83b7\u53d6\u6821\u9a8c\u7801"),
t.removeClass(i)
});
var o = function(e) {
e.preventDefault(),
t.hasClass(i) || (t.html("\u53d1\u9001\u4e2d..."), t.addClass(i), n.model.sendSmsToken().done(function() {
r.start(),
n.model.trigger("sendSmsTokenSuccess")
}).fail(function(e) {
t.html("\u91cd\u65b0\u83b7\u53d6\u6821\u9a8c\u7801"),
t.removeClass(i),
n.model.trigger("invalid", e)
}))
};
n.model.on("timerStop",
function() {
r.stop()
}),
n.model.on("afterCheckCaptcha",
function(e, a) {
t = n.$el.find(".quc-get-sms-token"),
t.off("click", o).on("click", o),
n.$el.find(".quc-sec-mobile").html(a.mobile),
r.isRunning() && r.resume(),
t.html("\u53d1\u9001\u4e2d..."),
t.addClass(i),
r.stop(),
r.start()
})
},
initModelEvent: function() {
var e = this;
e.model.on("show",
function(t, n) {
e.show(n && n.wrapper),
e.model.trigger("showCaptchaPanel")
}).on("hide",
function() {
e.model.trigger("beforeHide", e.$el[0]),
e.panel && e.panel.hide(),
e.model.trigger("afterHide", e.$el[0])
}).on("sendSmsTokenSuccess",
function() {
e.$el.find(".quc-tip").removeClass("quc-tip-error").addClass("quc-tip-success").html("\u53d1\u9001\u6210\u529f").show()
}).on("invalid",
function(t, n) {
e.$el.find(".quc-tip").removeClass("quc-tip-success").addClass("quc-tip-error").html(n.errmsg)
}).on("clean",
function() {
e.$el.find(".quc-tip").html("")
}).on("showSuccessPanel",
function() {
var t = e.$el.find(".quc-mod-authentication-token"),
n = e.$el.find(".quc-mod-authentication-success");
t.hide(),
n.show(),
n.find(".quc-button-ensure").on("click",
function(t) {
var n = e.model.get("secMobile");
t.preventDefault(),
e.model.trigger("hide").trigger("success").resolve(n)
})
}).on("showSmsTokenPanel",
function() {
var t = e.$el.find(".quc-mod-authentication-captcha"),
n = e.$el.find(".quc-mod-authentication-token");
t.hide(),
n.show(),
n.find(".quc-input-sms-token").val("").focus(),
e.$el.find(".quc-button-check-token").prop("disabled", !1).val("\u63d0\u4ea4"),
e.model.trigger("clean"),
e.model.trigger("sendSmsTokenSuccess")
}).on("showCaptchaPanel",
function() {
var t = e.$el.find(".quc-mod-authentication-captcha"),
n = e.$el.find(".quc-mod-authentication-token"),
i = e.$el.find(".quc-mod-authentication-success");
t.show(),
n.hide(),
i.hide(),
t.find(".quc-input-mobile").val(""),
t.find(".quc-input-captcha").val(""),
t.find(".quc-captcha-change").trigger("click"),
e.$el.find(".quc-button-check-captcha").prop("disabled", !1).val("\u63d0\u4ea4"),
e.model.trigger("clean")
}).on("reset",
function() {
e.$el.find(".quc-button-identify").prop("disabled", !1).val("\u63d0\u4ea4"),
e.$el.find(".quc-input-sms-token").val(""),
e.model.trigger("clean"),
e.model.trigger("timerStop")
})
},
show: function(n) {
var i = this;
if (n) i.model.trigger("beforeShow", i.$el[0]),
t(n).addClass("quc-wrapper quc-page").empty().append(i.$el);
else {
i.panel && i.reset();
var r = i.panel = new e.utils.Panel;
r.setTitle(e.getConfig("authenticate.panelTitle", "\u5b9e\u540d\u8ba4\u8bc1")),
r.setContent(this.$el),
i.model.trigger("beforeShow", i.$el[0]),
r.show(),
t(r).on("close", e.getConfig("authenticate.panelCloseHandler", t.noop))
}
i.model.trigger("afterShow", this.$el[0])
}
};
e.ui.authenticate = {
init: function() {
i.init.apply(i, arguments)
}
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = e.getLogic({
name: "authenticate",
validate: function(t, n) {
var i, r = e.validate;
switch (t.toLowerCase()) {
case "mobile":
i = r.checkMobile(n);
break;
case "captcha":
i = r.checkCaptcha(n);
break;
case "smstoken":
i = r.checkSmsToken(n)
}
return i
},
run: function(t) {
var n = this;
n.init(),
n.trigger("showLoading"),
e.getUserInfo(!1).then(function(t) {
return n.set("crumb", t.crumb),
e.sync.getAuthenticationStatus(t.crumb)
}).always(function() {
n.trigger("hideLoading")
}).done(function(e) {
e.details && e.details.isNeedAuthen ? (n.setCaptchaUrl(e.details.captchaUrl), n.trigger("show", {
wrapper: t
})) : n.trigger("success").resolve(e.details.mobile)
})
},
checkPhrase: function() {
var n = this,
i = !1,
r = {
mobile: n.get("mobile"),
captcha: n.get("captcha")
},
o = n.get("crumb");
this.trigger("beforeCheckCaptcha"),
t.each(t.extend({},
r),
function(e, t) {
var r = n.validate(e, t);
if (i = i || r, r) return n.trigger("invalid", r),
!1
}),
!i && e.sync.submitAuthenMobile(r.mobile, r.captcha, o).done(function(e) {
var t = e.details && e.details.mobile,
i = e.details && e.details.vt;
n.set("token", i),
n.trigger("afterCheckCaptcha", {
mobile: t,
vt: i
}),
n.trigger("showSmsTokenPanel")
}).fail(function(e) {
e.fromServer = !0;
var t = e.errdetail && e.errdetail.captchaUrl;
t && n.setCaptchaUrl(t),
n.trigger("invalid", e)
})
},
submit: function() {
var t = this,
n = t.get("token"),
i = t.get("smstoken"),
r = t.get("crumb"),
o = t.validate("smstoken", i),
a = e.getConfig("authenticate.hideSuccessPanel", !1);
this.trigger("beforeSubmit"),
o && t.trigger("invalid", o),
!o && e.sync.fillAuthenInfo(n, i, r).done(function(e) {
t.set("secMobile", e.details.mobile),
t.trigger("reset"),
a ? t.trigger("hide").trigger("success").resolve(e.details.mobile) : t.trigger("showSuccessPanel")
}).fail(function(e) {
t.trigger("invalid", e)
})
},
sendSmsToken: function() {
var n = this.get("mobile"),
i = this.get("token"),
r = this.get("crumb"),
o = this.validate("mobile", n);
return o ? t.Deferred().reject(o).promise() : e.sync.authSendSmsToken(r, i)
}
});
e.authenticate = function(e, i) { ! e || 1 == e.nodeType || e instanceof t || (i = e, e = void 0),
n.setCallback(i).run(e)
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = '<div class="quc-mod-set-nickname"><form class="quc-form"><p class="quc-input-wrapper quc-input-long"><span class="quc-input-bg"><input type="text" name="nickname" class="quc-input quc-input-nickname" maxlength="14" autocomplete="off" placeholder="\u8bf7\u8f93\u5165\u6635\u79f0\uff1a2-14\u4e2a\u5b57\u7b26,\u652f\u6301\u4e2d\u82f1\u6587"/></span><input type="submit" value="\u4fdd\u5b58" class="quc-submit quc-button quc-button-primary quc-button-save"/></p><p class="quc-tip"></p><div class="quc-alternative-wrapper"><p class="quc-tip-error">\u6635\u79f0\u5df2\u7ecf\u88ab\u5360\u7528\uff0c\u6211\u4eec\u4e3a\u60a8\u63a8\u8350\u4ee5\u4e0b\u6635\u79f0\uff1a</p><div class="quc-alternatives"></div></div></form></div> ',
i = {
init: function(e) {
this.model = e,
this.$el = t(n),
this.initModelEvent(),
this.initElementEvent()
},
reset: function() {
this.$el.remove(),
this.$el = t(n),
this.model.reset(),
this.initElementEvent()
},
initElementEvent: function() {
var e = this;
e.$el.find(".quc-input").focus(function() {
t(this).parent().removeClass("quc-input-bg-incorrect").addClass("quc-input-bg-focus")
}).blur(function() {
t(this).parent().removeClass("quc-input-bg-focus")
}),
e.$el.find(".quc-form").submit(function(n) {
var i = t(this),
r = i.find(".quc-submit"),
o = t.trim(i.find(".quc-input-nickname").val());
n.preventDefault(),
r.prop("disabled", !0).val("\u4fdd\u5b58\u4e2d..."),
e.model.one("invalid",
function() {
r.prop("disabled", !1).val("\u4fdd\u5b58")
}),
e.model.set("nickname", o),
e.model.submit()
})
},
initModelEvent: function() {
var e = this;
e.model.on("show",
function(t, n) {
e.show(n && n.wrapper)
}).on("hide",
function() {
e.hide()
}).on("invalid",
function(t, n) {
e.showErrorTip(n)
})
},
setNickname: function(e) {
this.$el.find(".quc-input-nickname").val(e).focus()
},
showErrorTip: function(t) {
var n = this.$el.find(".quc-input-nickname");
if (e.utils.isSameError(t, e.ERROR.NICKNAME_DUPLICATE) && this.model.get("alternatives", []).length > 0) this.showAlternatives();
else {
var i = this.$el.find(".quc-tip");
this.$el.find(".quc-input-bg").addClass("quc-input-bg-incorrect"),
i.addClass("quc-tip-error").html(t.errmsg).show(),
n.one("focus",
function() {
i.html("")
})
}
n.parent().addClass("quc-input-bg-incorrect")
},
showAlternatives: function() {
var e, n = this,
i = this.model.get("alternatives", []),
r = this.$el.find(".quc-tip");
if (! (i.length <= 0)) {
var o = this.$el.find(".quc-alternatives");
o.empty();
for (var a = 0,
c = i.length; a < c; a++) e = i[a],
t('<a href="#" class="quc-link"></a>').html(e).on("click",
function(e) {
return function(t) {
t.preventDefault(),
n.setNickname(e)
}
} (e)).appendTo(o);
o.parent().show(),
r.hide(),
this.$el.find(".quc-input-nickname").on("change",
function(e) {
var n = t(this); - 1 == t.inArray(n.val(), i) && (o.parent().hide(), r.show(), n.off(e))
})
}
},
show: function(n) {
var i = this.model.get("nickname");
if (n) this.model.trigger("beforeShow", this.$el[0]),
t(n).addClass("quc-wrapper quc-page").empty().append(this.$el);
else {
this.panel && this.reset();
var r = this.panel = new e.utils.Panel;
r.setTitle(e.getConfig("setNickname.panelTitle", i ? "\u4fee\u6539\u6635\u79f0": "\u8bbe\u7f6e\u6635\u79f0")),
r.setContent(this.$el),
this.model.trigger("beforeShow", this.$el[0]),
r.show(),
t(r).on("close", e.getConfig("setNickname.panelCloseHandler", t.noop))
}
this.$el.find(".quc-input-nickname").val(i),
this.model.trigger("aftershow", this.$el[0])
},
hide: function() {
this.model.trigger("beforehide", this.$el[0]),
this.panel && this.panel.hide(),
this.model.trigger("afterhide", this.$el[0])
}
};
e.ui.setNickname = {
init: function() {
i.init.apply(i, arguments)
}
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t, n = e.$,
i = e.getLogic({
name: "setNickname",
validate: function(t) {
return t = t || this.get("nickname"),
e.validate.checkNickname(t)
},
run: function(n) {
var i = this;
i.init().trigger("showLoading"),
e.getUserInfo().always(function() {
i.trigger("hideLoading")
}).done(function(e) {
e.nickname && (i.set("nickname", e.nickname), t = e.nickname),
i.trigger("show", {
wrapper: n
})
})
},
submit: function() {
var i = this,
r = n.Deferred(),
o = i.validate();
return this.trigger("beforeSubmit"),
o ? r.reject(o) : r.resolve(),
r.then(function() {
return e.getUserInfo()
}).then(function(t) {
return e.sync.setNickname(t.crumb, i.get("nickname"))
}).done(function() {
var e = {
oldValue: t,
newValue: i.get("nickname")
};
t = e.newValue,
i.trigger("hide").trigger("success").resolve(e)
}).fail(function(t) {
e.utils.isSameError(e.ERROR.NICKNAME_DUPLICATE, t) && i.set("alternatives", t.userinfo),
i.trigger("invalid", t)
})
}
});
e.setNickname = function(e, t) { ! e || 1 == e.nodeType || e instanceof n || (t = e, e = void 0),
i.setCallback(t).run(e)
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = {
init: function(n) {
this.model = n,
this.$el = t('<div class="quc-mod-set-email"><p class="quc-tip">&nbsp;</p><form class="quc-form"><p class="quc-field quc-input-long"><label class="quc-label">\u767b\u5f55\u90ae\u7bb1</label><span class="quc-input-bg"><input type="text" name="email" class="quc-input quc-input-email" placeholder="\u8bf7\u8f93\u5165\u60a8\u7684\u767b\u5f55\u90ae\u7bb1" autocomplete="off"></span></p><p class="quc-field"><input class="quc-button quc-button-primary quc-button-big quc-button-submit" value="\u63d0\u4ea4" type="submit"/></p><div class="quc-help"><p>\u70b9\u51fb\u201c\u63d0\u4ea4\u201d\u540e\uff0c\u6211\u4eec\u4f1a\u5411\u60a8\u7684\u90ae\u7bb1\u53d1\u9001\u4e00\u5c01\u9a8c\u8bc1\u90ae\u4ef6\uff0c\u8bf7\u6309\u7167\u90ae\u4ef6\u4e2d\u7684\u63d0\u793a\u5b8c\u6210\u64cd\u4f5c\u3002</p></div></form></div>'),
this._$el = this.$el,
this.initModelEvent(),
this.initElementEvent(),
e.utils.emailHint(this.$el.find(".quc-input-email"))
},
reset: function() {
this.$el = this._$el,
this.$el.find(".quc-button-submit").prop("disabled", !1).val("\u63d0\u4ea4"),
this.$el.find(".quc-tip").removeClass("quc-tip-error quc-tip-success").html(""),
this.$el.find(".quc-input").val("").parent().removeClass("quc-input-bg-focus")
},
initElementEvent: function() {
var e = this;
this.$el.find(".quc-input").focus(function() {
t(this).parent().removeClass("quc-input-bg-incorrect").addClass("quc-input-bg-focus")
}).blur(function() {
t(this).parent().removeClass("quc-input-bg-focus")
}).filter(".quc-input-email").blur(function() {
var n = t(this).val();
if (n.length > 0) {
var i = e.model.validate(n);
i && e.showTip(i.errmsg, i.errno)
}
}),
e.$el.find(".quc-form").submit(function(t) {
t.preventDefault(),
e.submit()
})
},
initModelEvent: function() {
var t = this;
this.model.on("show",
function(e, n) {
t.show(n && n.wrapper)
}).on("hide",
function() {
t.hide()
}).on("invalid",
function(n, i) {
e.utils.isSameError(i, e.ERROR.IDENTIFY_EXPIRE) || t.showTip(i)
}).on("reset",
function() {
t.$el.find(".quc-button-submit").prop("disabled", !1).val("\u63d0\u4ea4")
})
},
showTip: function(e, t) {
var n = this,
i = this.$el.find(".quc-tip");
e.errno && (t = e.errno, e = e.errmsg),
t ? (i.addClass("quc-tip-error").removeClass("quc-tip-success"), setTimeout(function() {
n.$el.one("focus", ".quc-input",
function() {
i.html("")
})
},
30)) : i.addClass("quc-tip-success").removeClass("quc-tip-error"),
i.html(e)
},
submit: function() {
var e = this,
t = e.$el.find(".quc-button-submit");
t.prop("disabled", !0).val("\u63d0\u4ea4\u4e2d..."),
e.model.one("invalid",
function() {
t.prop("disabled", !1).val("\u63d0\u4ea4")
}),
e.model.set("email", e.$el.find(".quc-input-email").val()),
e.model.submit(),
e.model.one("next",
function() {
t.prop("disabled", !1).val("\u63d0\u4ea4")
})
},
show: function(n) {
if (this.reset(), n) this.model.trigger("beforeshow", this.$el[0]),
n.addClass("quc-wrapper quc-page").empty().append(this.$el);
else {
var i = this.panel = new e.utils.Panel;
i.setTitle(e.getConfig("setEmail.panelTitle", "\u8bbe\u7f6e\u767b\u5f55\u90ae\u7bb1")),
i.setContent(this.$el),
this.model.trigger("beforeshow", this.$el[0]),
i.show(),
t(i).on("close", e.getConfig("setEmail.panelCloseHandler", t.noop))
}
this.model.trigger("aftershow", this.$el[0])
},
hide: function() {
this.model.trigger("beforehide", this.$el[0]),
this.panel && this.panel.hide(),
this.model.trigger("afterhide", this.$el[0])
}
};
e.ui.setEmail = {
init: function() {
n.init.apply(n, arguments)
}
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = e.getLogic({
name: "setEmail",
validate: function(t) {
return t = t || this.get("email"),
e.validate.checkEmail(t)
},
run: function(t) {
var n = this;
n.init().trigger("showLoading"),
e.identify(n).then(function() {
return e.activeEmail.prepare(n)
}).always(function() {
n.trigger("hideLoading")
}).done(function() {
n.trigger("show", {
wrapper: t
})
})
},
submit: function() {
var n = this,
i = t.Deferred(),
r = n.validate();
return this.trigger("beforeSubmit"),
r ? i.reject(r) : i.resolve(),
i.then(function() {
return e.getUserInfo()
}).then(function(t) {
return e.sync.setEmail(t.crumb, n.get("email"))
}).then(function(i) {
n.trigger("next");
var r = t.Deferred();
return e.activeEmail(i,
function() {
r.resolve()
}),
r.promise()
}).then(function(e) {
n.trigger("hide").trigger("success").resolve(e)
},
function(e) {
n.trigger("invalid", e)
})
}
});
e.setEmail = function(e, i) { ! e || 1 == e.nodeType || e instanceof t || (i = e, e = void 0),
n.setCallback(i).run(e)
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = {
init: function(n) {
this.model = n,
this.$el = t('<div class="quc-mod-set-sec-email"><p class="quc-tip">&nbsp;</p><form class="quc-form"><p class="quc-field quc-input-long"><label class="quc-label">\u5bc6\u4fdd\u90ae\u7bb1</label><span class="quc-input-bg"><input type="text" name="secEmail" class="quc-input quc-input-sec-email" placeholder="\u8bf7\u8f93\u5165\u60a8\u7684\u5bc6\u4fdd\u90ae\u7bb1" autocomplete="off"></span></p><p class="quc-field"><input class="quc-button quc-button-primary quc-button-big quc-button-submit" value="\u63d0\u4ea4" type="submit"/></p></form></div>'),
this._$el = this.$el,
this.initModelEvent(),
this.initElementEvent(),
e.utils.emailHint(this.$el.find(".quc-input-sec-email"))
},
reset: function() {
this.$el = this._$el,
this.$el.find(".quc-button-submit").prop("disabled", !1).val("\u63d0\u4ea4"),
this.$el.find(".quc-tip").removeClass("quc-tip-error quc-tip-success").html(""),
this.$el.find(".quc-input").val("").parent().removeClass("quc-input-bg-focus")
},
initElementEvent: function() {
var e = this;
e.$el.find(".quc-input").focus(function() {
t(this).parent().addClass("quc-input-bg-focus")
}).blur(function() {
t(this).parent().removeClass("quc-input-bg-focus")
}).filter(".quc-input-sec-email").blur(function() {
var n = t(this).val();
if (n.length > 0) {
var i = e.model.validate(n);
i && e.showTip(i.errmsg, i.errno)
}
}),
e.$el.find(".quc-form").submit(function(t) {
t.preventDefault(),
e.submit()
})
},
initModelEvent: function() {
var t = this;
t.model.on("show",
function(e, n) {
t.show(n && n.wrapper)
}).on("hide",
function() {
t.hide()
}).on("invalid",
function(n, i) {
e.utils.isSameError(i, e.ERROR.IDENTIFY_EXPIRE) || t.showTip(i)
}).on("reset",
function() {
t.$el.find(".quc-button-submit").prop("disabled", !1).val("\u63d0\u4ea4")
})
},
showTip: function(e, t) {
var n = this,
i = this.$el.find(".quc-tip");
e.errno && (t = e.errno, e = e.errmsg),
t ? (i.addClass("quc-tip-error").removeClass("quc-tip-success"), setTimeout(function() {
n.$el.one("focus", ".quc-input",
function() {
i.html("")
})
},
30)) : i.addClass("quc-tip-success").removeClass("quc-tip-error"),
i.html(e)
},
submit: function() {
var e = this,
t = e.$el.find(".quc-button-submit");
t.prop("disable", !0).val("\u63d0\u4ea4\u4e2d..."),
e.model.one("invalid",
function() {
t.prop("disable", !1).val("\u63d0\u4ea4")
}),
e.model.set("secemail", e.$el.find(".quc-input-sec-email").val()),
e.model.submit(),
e.model.one("next",
function() {
t.prop("disabled", !1).val("\u63d0\u4ea4")
})
},
show: function(n) {
if (this.reset(), n) this.model.trigger("beforeShow", this.$el[0]),
t(n).addClass("quc-wrapper quc-page").empty().append(this.$el);
else {
var i = this.panel = new e.utils.Panel;
i.setTitle(e.getConfig("setSecEmail.panelTitle", "\u8bbe\u7f6e\u5bc6\u4fdd\u90ae\u7bb1")),
i.setContent(this.$el),
this.model.trigger("beforeShow", this.$el[0]),
i.show(),
t(i).on("close", e.getConfig("setSecEmail.panelCloseHandler", t.noop))
}
this.model.trigger("afterShow", this.$el[0])
},
hide: function() {
this.model.trigger("beforeHide", this.$el[0]),
this.panel && this.panel.hide(),
this.model.trigger("afterHide", this.$el[0])
}
};
e.ui.setSecEmail = {
init: function() {
n.init.apply(n, arguments)
}
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = e.getLogic({
name: "setSecEmail",
validate: function(t) {
return t = t || this.get("secemail"),
e.validate.checkEmail(t)
},
run: function(t) {
var n = this;
n.init().trigger("showLoading"),
e.identify(n).then(function() {
return e.activeEmail.prepare(n)
}).always(function() {
n.trigger("hideLoading")
}).done(function() {
n.trigger("show", {
wrapper: t
})
})
},
submit: function() {
var n = this,
i = t.Deferred(),
r = n.validate();
return this.trigger("beforeSubmit"),
r ? i.reject(r) : i.resolve(),
i.then(function() {
return e.getUserInfo()
}).then(function(t) {
return e.sync.setSecEmail(t.crumb, n.get("secemail"))
}).then(function(i) {
n.trigger("next");
var r = t.Deferred();
return e.activeEmail(i,
function() {
r.resolve()
}),
r.promise()
}).then(function(e) {
n.trigger("hide").trigger("success").resolve(e)
},
function(e) {
n.trigger("invalid", e)
})
}
});
e.setSecEmail = function(e, i) { ! e || 1 == e.nodeType || e instanceof t || (i = e, e = void 0),
n.setCallback(i).run(e)
}
} (QHPass)
},
function(e, t, n) { (function(e) { !
function(t) {
var i = n(13).getLogger("bindMobile"),
r = t.$,
o = '<div class="quc-mod-bind-mobile"><div class="quc-tip-wrapper quc-global-error"><p class="quc-tip quc-tip-error"></p></div><form method="post" class="quc-form"><div class="quc-field quc-field-mobile quc-input-middle quc-clearfix"><div class="quc-input-bg"><input class="quc-input quc-input-mobile" type="tel" placeholder="\u8bf7\u8f93\u5165\u60a8\u7684\u624b\u673a\u53f7" name="account" data-name="mobile" /><div class="quc-state-wrapper"><div class="quc-area-arrow"></div><span class="quc-activeState">+86</span></div><ul class="quc-mobile-Statelist"></ul></div><i class="quc-tip-icon"></i><span class="quc-tip" data-default-tip=""></span></div><p class="quc-field quc-field-sms-token quc-input-middle"><span class="quc-input-bg"><input class="quc-input quc-input-sms-token" type="text" placeholder="\u77ed\u4fe1\u9a8c\u8bc1\u7801" name="smscode" data-name="smsToken" maxlength="6" /></span><a href="#" class="quc-button quc-button-blue quc-get-sms-token">\u514d\u8d39\u83b7\u53d6\u6821\u9a8c\u7801</a><i class="quc-tip-icon"></i><a class="quc-link quc-link-mobile-tip" href="http://i.msvodx.com/help/smscode" target="_blank" tabindex="99">\u6821\u9a8c\u7801\u5e38\u89c1\u95ee\u9898</a><span class="quc-tip" data-default-tip=""></span></p><p><input class="quc-button quc-button-primary quc-button-big quc-button-submit" type="submit" value="\u63d0\u4ea4" /></p></form></div>',
a = {
init: function(e) {
this.model = e,
this.$el = r(o),
this.initModelEvent(),
this.initMobileStates(),
this.initElementEvent(),
this.initSmsToken(),
this.initErrorTip(),
this.initTips()
},
reset: function() {
i.debug("reset ui"),
this.$el && this.$el.remove(),
this.$el = r(o),
this.initMobileStates(),
this.initElementEvent(),
this.initTips()
},
initTips: function() {
this.$el.find(".quc-field .quc-tip").attr("data-default-tip",
function() {
return r(this).html()
})
},
iePlaceholder: function() {
t.utils.initPlaceholder(r("input[name=account],input[name=smscode]"))
},
initElementEvent: function() {
var e = this,
t = e.model;
e.$el.find(".quc-input").focus(function() {
r(this).parent().removeClass("quc-input-bg-incorrect").addClass("quc-input-bg-focus")
}).blur(function() {
var e = r(this);
e.parent().removeClass("quc-input-bg-focus");
var n = e.attr("data-name") || e.attr("name"),
i = e.val(),
o = r(".quc-activeState").html(),
a = e.data("regexp");
0 != i.length && (i = "mobile" == n ? {
mobileNumber: i,
regExp: a,
areaCode: o
}: i, t.validate(n, i, !0).done(function() {
var t = e.parent(".quc-field").find(".quc-tip-icon");
t.removeClass("quc-tip-icon-correct").addClass("quc-tip-icon-correct"),
e.one("focus",
function() {
t.removeClass("quc-tip-icon-correct")
})
}).fail(function(n) {
n.field = e.parents(".quc-field"),
t.trigger("invalid", n)
}))
}),
e.$el.find(".quc-form").submit(function(e) {
i.debug("trigger submit"),
e.preventDefault();
var n, o = r(this),
a = o.find(".quc-submit"),
c = o.find(".quc-input-mobile");
n = o.find(".quc-activeState").html(),
a.prop("disabled", !0).val("\u63d0\u4ea4\u4e2d..."),
t.one("invalid",
function() {
a.prop("disabled", !1).val("\u63d0\u4ea4")
});
var s = c.val(),
u = c.data("regexp");
t.set("mobile", {
mobileNumber: s,
regExp: u,
areaCode: n
}),
t.set("smsToken", o.find(".quc-input-sms-token").val()),
t.submit()
})
},
initSmsToken: function() {
var e, n, o = this,
a = "quc-button-disabled",
c = t.utils.getTimer("bind_mobile");
c.on("timer_start",
function(e, t) {
n.addClass(a),
n.html(t + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
c.on("timer_tick",
function(e, t) {
n.html(t + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
c.on("timer_stop",
function() {
n.html("\u91cd\u65b0\u83b7\u53d6\u6821\u9a8c\u7801"),
n.removeClass(a)
});
var s = function(t) {
t.preventDefault();
var s = e.val(),
u = r(".quc-activeState").html(),
l = e.data("regexp");
o.model.set("mobile", {
mobileNumber: s,
regExp: l,
areaCode: u
}),
n.hasClass(a) || (n.html("\u53d1\u9001\u4e2d..."), n.addClass(a), o.model.bindMobileCheck().then(function(e) {
return o.model.sendSmsToken(e)
}).then(function() {
var e = o.$el.find(".quc-field-mobile"),
t = e.find(".quc-tip");
t.removeClass("quc-tip-error").addClass("quc-tip-success").html("\u53d1\u9001\u6210\u529f").show(),
e.find(".quc-input").on("change",
function() {
t.removeClass("quc-tip-success").html(t.attr("data-default-tip")),
e.find(".quc-tip-icon").removeClass("quc-tip-icon-correct")
}).parent().removeClass("quc-input-bg-incorrect"),
e.find(".quc-tip-icon").removeClass("quc-tip-icon-incorrect").addClass("quc-tip-icon-correct"),
c.start()
}).caught(function(e) {
i.debug("get validate code fail", e),
n.html("\u514d\u8d39\u83b7\u53d6\u6821\u9a8c\u7801"),
n.removeClass(a),
e.errmsg && (e.field = o.$el.find(".quc-field-mobile"), o.model.trigger("invalid", e))
}))
};
o.model.on("show",
function() {
e = o.$el.find(".quc-input-mobile"),
n = o.$el.find(".quc-get-sms-token"),
n.off("click", s).on("click", s),
c.isRunning() && c.resume()
})
},
initModelEvent: function() {
var e = this;
e.model.on("show",
function(t, n) {
e.show(n && n.wrapper)
}).on("hide",
function() {
e.panel && e.panel.hide()
})
},
initMobileStates: function() {
var t = this,
n = t.$el;
t.model.prepareMobileState().then(function(i) {
var o = n.find(".quc-mobile-Statelist");
e.each(i.data,
function(e) {
var t = r("<li>");
t.addClass("quc-list-item").attr("data-regexp", e.pattern);
var n = r("<span>").addClass("quc-left-tip").text(e.zone),
i = r("<span>").addClass("quc-right-tip").text(e.state);
t.append(n).append(i),
o.append(t)
}),
t.$el.on("mouseenter", ".quc-list-item",
function(e) {
r(this).css({
backgroundColor: "#2994fd",
color: "#ffffff"
})
}).on("mouseleave", ".quc-list-item",
function() {
r(this).css({
backgroundColor: "#ffffff",
color: "#808080"
})
}),
r(document).on("click",
function(e) {
var t = r(e.target);
if (t.hasClass("quc-list-item") || t.hasClass("quc-left-tip") || t.hasClass("quc-right-tip")) {
var n = t.hasClass("quc-list-item") ? t: t.closest("li"),
i = n.find(".quc-left-tip").html(),
o = n.data("regexp");
r(".quc-activeState").html(i),
r(".quc-activeState").parent().siblings("input").data("regexp", o)
}
t.hasClass("quc-activeState") || t.hasClass("quc-area-arrow") ? r(".quc-mobile-Statelist").show() : r(".quc-mobile-Statelist").hide()
})
},
function(e) {
t.model.trigger("invalid", e)
})
},
initErrorTip: function() {
var e = this;
e.model.on("invalid",
function(n, i) {
if (!t.utils.isSameError(i, t.ERROR.IDENTIFY_EXPIRE)) {
var r = i.field || e.getErrorField(i.errno),
o = r.find(".quc-input-bg"),
a = r.find(".quc-tip"),
c = r.find(".quc-tip-icon");
a.removeClass("quc-tip-success").addClass("quc-tip-error").html(i.errmsg).show(),
c.addClass("quc-tip-icon-incorrect"),
o.addClass("quc-input-bg-incorrect"),
r.find(".quc-input").one("focus",
function() {
a.removeClass("quc-tip-error").html(a.attr("data-default-tip")),
c.removeClass("quc-tip-icon-incorrect"),
o.removeClass("quc-input-bg-incorrect")
})
}
})
},
getErrorField: function(e) {
var n = t.utils.getErrorType(e);
return "other" != n ? this.$el.find(".quc-field-" + n) : this.$el.find(".quc-global-error")
},
show: function(e) {
var n = this;
if (i.debug("show panel"), e) n.model.trigger("beforeShow", n.$el[0]),
r(e).addClass("quc-wrapper quc-page").empty().append(n.$el);
else {
n.panel && n.reset();
var o = n.panel = new t.utils.Panel;
o.setTitle(t.getConfig("bindMobile.panelTitle", "\u7ed1\u5b9a\u624b\u673a\u53f7")),
o.setContent(this.$el),
n.model.trigger("beforeShow", n.$el[0]),
o.show(),
r(o).on("close", t.getConfig("bindMobile.panelCloseHandler", r.noop))
}
n.model.trigger("afterShow", this.$el[0])
}
};
t.ui.bindMobile = {
init: function() {
a.init.apply(a, arguments)
}
}
} (QHPass)
}).call(t, n(1))
},
function(e, t, n) { (function(e, t) { !
function(i) {
var r = n(13).getLogger("bindMobile"),
o = i.$,
a = {},
c = i.getLogic({
name: "bindMobile",
validate: function(e, t, n) {
r.debug("validate");
var c, s = i.validate;
if ("boolean" != typeof t && void 0 !== t || (t = this.get(e)), /mobile/i.test(e)) return !! n && o.Deferred().resolve();
switch (e.toLowerCase()) {
case "mobile":
c = s.checkMobile(t, !0);
break;
case "smstoken":
c = s.checkSmsToken(t)
}
if (n) {
var u, l = i.sync;
if (c) u = o.Deferred(),
u.reject(c);
else if ("mobile" == e) {
var p = t.mobileNumber,
d = t.areaCode,
f = a[p];
if (f) return f;
u = l.checkMobileNumberExist(p, d),
a[p] = u.promise()
} else u = o.Deferred(),
u.resolve();
return u.promise()
}
return c
},
run: function(e) {
r.debug("run");
var t = this;
t.init(),
t.trigger("showLoading"),
r.debug("danger operator, identify first"),
i.identify(t).then(function(n) {
r.debug("prepare identify"),
t.trigger("show", {
wrapper: e
})
},
function(e) {
if ("1552" == e.errno) return r.debug("shadow account fill profile first"),
i.fillProfile(function() {
return t.trigger("hide").trigger("success").resolve()
})
}).always(function() {
t.trigger("hideLoading")
})
},
prepareMobileState: function() {
return i.sync.getMobileState()
},
submit: function() {
var e = this,
t = o.Deferred();
r.debug("logic submit"),
this.trigger("beforeSubmit");
var n = e.validate("mobile") || e.validate("smsToken");
return n ? t.reject(n) : t.resolve(),
t.then(function() {
return i.getUserInfo()
}).then(function(t) {
return i.sync.bindMobileNew(t.crumb, e.get("mobile"), e.get("smsToken"), e.get("canForceBind"))
}).done(function() {
i.isI360() || i.$message({
type: "success",
title: "\u7ed1\u5b9a\u624b\u673a\u53f7\u6210\u529f",
content: "\u7ed1\u5b9a\u624b\u673a\u53f7\u6210\u529f, \u60a8\u4ee5\u540e\u53ef\u4ee5\u4f7f\u7528\u8be5\u624b\u673a\u53f7\u8fdb\u884c\u767b\u5f55\u5566"
}),
e.trigger("hide").trigger("success").resolve()
}).fail(function(t) {
e.trigger("invalid", t)
})
},
bindMobileCheck: function() {
var t = this,
n = t.get("mobile");
r.debug("bind mobile check", n);
var o = t.validate("mobile");
if (o) return e.reject(o);
var a = n.areaCode + n.mobileNumber;
return t.set("canForceBind", !1),
i.tool.checkBindMobile(a).then(function(e) {
return 0 == e.condition && t.set("canForceBind", !0),
e
})
},
sendSmsToken: function(e) {
r.debug("send sms token", e);
var n = this,
a = n.validate("mobile");
return a ? o.Deferred().reject(a).promise() : i.getUserInfo().then(function(r) {
return i.sync.sendSmsToken(r.crumb, t.get(e, "condition"), n.get("mobile"))
})
}
});
i.bindMobile = function(e, t) { ! e || 1 == e.nodeType || e instanceof o || (t = e, e = void 0),
c.setCallback(t).run(e)
}
} (QHPass)
}).call(t, n(37), n(1))
},
function(e, t) { !
function(e) {
var t = e.$,
n = "",
i = {
normal: '<div class="quc-mod-fill-profile"><div class="quc-tip-wrapper quc-global-error"><p class="quc-tip quc-tip-error"></p></div><form class="quc-form" method="post" action="https://i.msvodx.com/signUp/dosignUpAccount"><p class="quc-field quc-field-username quc-input-long"><label class="quc-label">\u7528\u6237\u540d</label><span class="quc-input-bg"><input type="text" name="userName" data-name="username" maxlength="14"  class="quc-input quc-input-username" /></span><i class="quc-tip-icon"></i><span class="quc-tip">2-14\u4e2a\u5b57\u7b26\uff1a\u82f1\u6587\u3001\u6570\u5b57\u6216\u4e2d\u6587</span></p><p class="quc-field quc-field-password quc-input-long"><label class="quc-label">\u5bc6\u7801</label><span class="quc-input-bg"><input type="password" name="password" class="quc-input quc-input-password" maxlength="20" /></span><i class="quc-tip-icon"></i><span class="quc-tip">8-20\u4e2a\u5b57\u7b26(\u533a\u5206\u5927\u5c0f\u5199)</span></p><p class="quc-field quc-field-password-again quc-input-long"><label class="quc-label">\u786e\u8ba4\u5bc6\u7801</label><span class="quc-input-bg"><input type="password" name="passwordAgain" class="quc-input quc-input-password-again" maxlength="20" /></span><i class="quc-tip-icon"></i><span class="quc-tip">\u8bf7\u518d\u6b21\u8f93\u5165\u5bc6\u7801</span></p><p class="quc-field quc-field-captcha quc-input-short"><label class="quc-label">\u9a8c\u8bc1\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-captcha" type="text" name="captcha" maxlength="7" autocomplete="off" /></span><img class="quc-captcha-img quc-captcha-change" alt="\u9a8c\u8bc1\u7801" title="\u70b9\u51fb\u66f4\u6362" tabindex="99" /><a class="quc-link quc-link-captcha-change quc-captcha-change" href="#">\u6362\u4e00\u5f20</a><i class="quc-tip-icon"></i><span class="quc-tip">\u8bf7\u8f93\u5165\u56fe\u4e2d\u7684\u5b57\u6bcd\u6216\u6570\u5b57\uff0c\u4e0d\u533a\u5206\u5927\u5c0f\u5199</span></p><p class="quc-field quc-field-submit"><input class="quc-button quc-button-primary quc-button-submit" type="submit" value="\u7acb\u5373\u6ce8\u518c" /></p></form></div>',
mobile: '<div class="quc-mod-fill-profile"><div class="quc-tip-wrapper quc-global-error"><p class="quc-tip quc-tip-error"></p></div><form method="POST" class="quc-form"><div class="quc-field quc-field-mobile quc-input-middle quc-clearfix"><label class="quc-label">\u624b\u673a\u53f7</label><div class="quc-input-bg"><input class="quc-input quc-input-mobile" type="text" placeholder="" name="account" data-name="mobile" /><div class="quc-state-wrapper"><div class="quc-area-arrow"></div><span class="quc-activeState">+86</span></div><ul class="quc-mobile-Statelist"></ul></div><i class="quc-tip-icon"></i><span class="quc-tip" data-default-tip="\u8bf7\u8f93\u5165\u60a8\u8981\u7ed1\u5b9a\u7684\u624b\u673a\u53f7\u7801">\u8bf7\u8f93\u5165\u60a8\u8981\u7ed1\u5b9a\u7684\u624b\u673a\u53f7\u7801</span></div><p class="quc-field quc-field-captcha quc-input-short"><label class="quc-label">\u9a8c\u8bc1\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-captcha" type="text" name="captcha" maxlength="7" autocomplete="off"/></span><img class="quc-captcha-img quc-captcha-change" alt="\u9a8c\u8bc1\u7801" title="\u70b9\u51fb\u66f4\u6362" tabindex="99" /><a class="quc-link quc-link-captcha-change quc-captcha-change" href="#">&nbsp;\u6362\u4e00\u5f20</a><i class="quc-tip-icon"></i><span class="quc-tip">\u8bf7\u8f93\u5165\u56fe\u4e2d\u7684\u5b57\u6bcd\u6216\u6570\u5b57\uff0c\u4e0d\u533a\u5206\u5927\u5c0f\u5199</span></p><p class="quc-field quc-field-sms-token quc-input-middle"><label class="quc-label">\u6821\u9a8c\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-sms-token" type="text" name="smscode" autocomplete="off" maxlength="6" /></span><a class="quc-button quc-button-blue quc-button-get-sms-token" href="#">\u514d\u8d39\u83b7\u53d6\u6821\u9a8c\u7801</a><i class="quc-tip-icon"></i><span class="quc-tip">\u8bf7\u8f93\u5165\u77ed\u4fe1\u4e2d6\u4f4d\u6570\u5b57\u6821\u9a8c\u7801</span></p><input type="password" name="password" style="display:none"/><p class="quc-field quc-field-password quc-input-long"><label class="quc-label">\u5bc6\u7801</label><span class="quc-input-bg"><input type="password" name="password" class="quc-input quc-input-password" maxlength="20" /></span><i class="quc-tip-icon"></i><span class="quc-tip">8-20\u4e2a\u5b57\u7b26(\u533a\u5206\u5927\u5c0f\u5199)</span></p><p class="quc-field quc-field-password-again quc-input-long"><label class="quc-label">\u786e\u8ba4\u5bc6\u7801</label><span class="quc-input-bg"><input type="password" name="passwordAgain" class="quc-input quc-input-password-again" maxlength="20" /></span><i class="quc-tip-icon"></i><span class="quc-tip">\u8bf7\u518d\u6b21\u8f93\u5165\u5bc6\u7801</span></p><p class="quc-field quc-field-submit"><input class="quc-button quc-button-primary quc-button-submit" type="submit" value="\u7acb\u5373\u6ce8\u518c" /></p></form><a class="quc-link quc-go-signIn">\u4f7f\u7528\u5df2\u6709\u624b\u673a\u53f7\u767b\u5f55</a></div>'
},
r = {
init: function(e) {
this.model = e,
this.initTpl(),
this.initModelEvent(),
this.initCaptcha(),
this.initErrorTip(),
this.initSmsToken()
},
initTpl: function() {
var e = this.model.isFillProfileByMobile();
n = e ? i.mobile: i.normal
},
initCaptcha: function() {
var e, n = this,
i = function() {
n.model.getCaptchaUrl().then(function(n) {
e.find(".quc-captcha-img").attr("src", n),
e.find(".quc-input-captcha").val(""),
e.find(".quc-tip").removeClass("quc-tip-error").html(function() {
return t(this).attr("data-default-tip")
}),
e.find(".quc-tip-icon").removeClass("quc-tip-icon-incorrect")
})
},
r = function() {
i(),
e.find(".quc-captcha-change").on("mousedown",
function(e) {
e.preventDefault()
}).on("click",
function(t) {
t.preventDefault(),
i(),
e.find(".quc-input-captcha").focus()
})
};
this.model.on("show",
function() {
e = n.$el.find(".quc-field-captcha"),
r()
}).on("invalid",
function(e, t) {
t.fromServer && i()
}).on("dealCaptcha",
function() {
n.$el.find(".quc-field-captcha").hide(),
n.$el.find(".quc-input-captcha").val(""),
n.$el.find(".quc-input-mobile").off("change").on("change",
function() {
n.$el.find(".quc-field-captcha").show(),
n.$el.find(".quc-captcha-change").trigger("click"),
n.model.set("token", null),
n.model.trigger("timer_stop")
})
})
},
initSmsToken: function() {
var n, i, r, o, a = this,
c = "quc-button-disabled",
s = e.utils.getTimer("sign_up");
s.on("timer_start",
function(e, t) {
i.addClass(c),
i.html(t + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
s.on("timer_tick",
function(e, t) {
i.html(t + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
s.on("timer_stop",
function() {
i.html("\u91cd\u65b0\u83b7\u53d6\u6821\u9a8c\u7801"),
i.removeClass(c)
}),
a.model.on("timer_stop",
function() {
s.stop()
});
var u = function(e) {
e.preventDefault();
var u = i.siblings(".quc-tip-icon");
if (!i.hasClass(c)) {
var l = n.val(),
p = t(".quc-activeState").html(),
d = n.data("regexp");
a.model.set("mobile", {
mobileNumber: l,
regExp: d,
areaCode: p
}),
a.model.set("captcha", o.val()),
i.html("\u53d1\u9001\u4e2d..."),
i.addClass(c),
u.hide(),
a.model.trigger("afterShow.changeType"),
a.model.sendSmsToken().done(function(e) {
var t = r.find(".quc-tip"),
n = r.find(".quc-tip-icon"),
i = r.find(".quc-input-bg");
t.addClass("quc-tip-success").html("\u53d1\u9001\u6210\u529f").show(),
i.removeClass("quc-input-bg-incorrect"),
n.removeClass("quc-tip-icon-incorrect").addClass("quc-tip-icon-correct"),
r.find(".quc-input").one("change",
function() {
t.removeClass("quc-tip-success").html(t.attr("data-default-tip"))
}),
u.show(),
s.start(),
a.model.set("token", e.vt),
a.model.trigger("dealCaptcha")
}).fail(function(e) {
u.show(),
i.html("\u514d\u8d39\u83b7\u53d6\u6821\u9a8c\u7801"),
i.removeClass(c),
e.type = "mobile";
var t = e.errdetail && e.errdetail.captchaUrl;
t && (e.fromServer = !0, a.model.setCaptchaUrl(t), a.$el.find(".quc-field-captcha .quc-tip-icon").removeClass("quc-tip-icon-correct")),
a.model.trigger("invalid", e)
})
}
};
this.model.on("show",
function() {
r = a.$el.find(".quc-field-sms-token"),
n = a.$el.find(".quc-input-mobile"),
o = a.$el.find(".quc-input-captcha"),
i = r.find(".quc-button-get-sms-token"),
0 != r.length && (i.off("click", u).on("click", u), s.isRunning() && s.resume())
})
},
setElement: function() {
var i = this;
i.$el && i.$el.remove(),
i.$el = t(n),
i.$el.find(".quc-form").submit(function(e) {
e.preventDefault(),
i.model.set("isNeedCheckCaptcha", !!i.$el.find(".quc-field-captcha:visible")[0]),
i.submit()
}),
i.model.isShowPasswordAgain() || i.$el.find(".quc-field-password-again").remove(),
i.$el.find(":text,:password").focus(function() {
var e = t(this).parent(),
n = e.siblings(".quc-tip");
i.$el.find(".quc-global-error .quc-tip").hide(),
e.addClass("quc-input-bg-focus"),
n.removeClass("quc-tip-success").html(n.attr("data-default-tip"))
}).blur(function() {
var n = t(this),
r = n.parents(".quc-field"),
o = r.siblings(".quc-field-password-again"),
a = r.siblings(".quc-field-password");
n.parent().removeClass("quc-input-bg-focus"),
i.validate(r),
r.hasClass("quc-field-password") && e.utils.isExisted(o) && i.validate(o),
r.hasClass("quc-field-password-again") && e.utils.isExisted(a) && i.validate(a)
}),
i.$el.find(".quc-go-signIn").on("click",
function() {
i.model.signin()
}),
this.$el.find(".quc-field .quc-tip").attr("data-default-tip",
function() {
return t(this).html()
})
},
validate: function(e) {
var n = this,
i = e.find(".quc-input"),
r = i.attr("data-name") || i.attr("name"),
o = t(".quc-activeState").html(),
a = i.data("regexp"),
c = "mobile" == r ? {
mobileNumber: i.val(),
regExp: a,
areaCode: o
}: i.val();
0 == c.length || "mobile" == r && 0 == i.val().length || (i.trigger("quc-validate"), n.model.validate(r, c, !0).done(function() {
var t = e.find(".quc-tip-icon");
t.removeClass("quc-tip-icon-incorrect").addClass("quc-tip-icon-correct"),
i.one("focus",
function() {
t.removeClass("quc-tip-icon-correct")
})
}).fail(function(t) {
t.field = e,
n.model.trigger("invalid", t)
}))
},
initModelEvent: function() {
var e = this;
e.model.on("show",
function(t, n) {
e.show(n && n.wrapper)
}).on("hide",
function() {
e.hide()
})
},
initMobileStates: function() {
var e = this,
n = "";
e.model.prepareMobileState().then(function(i) {
for (var r = i.data,
o = r.length,
a = 0; a < o; a++) n += '<li class="quc-list-item" data-regexp=' + r[a].pattern + '><span class="quc-left-tip">' + r[a].zone + '</span><span class="quc-right-tip">' + r[a].state + "</span></li>";
e.$el.find(".quc-mobile-Statelist").append(n),
e.$el.on("mouseenter", ".quc-list-item",
function(e) {
t(this).css({
backgroundColor: "#2994fd",
color: "#ffffff"
})
}).on("mouseleave", ".quc-list-item",
function() {
t(this).css({
backgroundColor: "#ffffff",
color: "#808080"
})
}),
t(document).on("click",
function(e) {
var n = t(e.target);
if (n.hasClass("quc-list-item") || n.hasClass("quc-left-tip") || n.hasClass("quc-right-tip")) {
var i = n.hasClass("quc-list-item") ? n: n.closest("li"),
r = i.find(".quc-left-tip").html(),
o = i.data("regexp");
t(".quc-activeState").html(r),
t(".quc-activeState").parent().siblings("input").data("regexp", o)
}
n.hasClass("quc-activeState") || n.hasClass("quc-area-arrow") ? t(".quc-mobile-Statelist").show() : t(".quc-mobile-Statelist").hide()
})
},
function(t) {
e.model.trigger("invalid", t)
})
},
initErrorTip: function() {
var e = this;
e.model.on("invalid",
function(t, n) {
var i = n.field || e.getErrorField(n.errno),
r = i.find(".quc-input-bg"),
o = i.find(".quc-tip"),
a = i.find(".quc-tip-icon");
o.removeClass("quc-tip-success").addClass("quc-tip-error").html(n.errmsg).show(),
a.removeClass("quc-tip-icon-incorrect").addClass("quc-tip-icon-incorrect"),
r.addClass("quc-input-bg-incorrect"),
i.find(".quc-input").one("focus quc-validate",
function() {
o.removeClass("quc-tip-error").html(o.attr("data-default-tip")),
a.removeClass("quc-tip-icon-incorrect"),
r.removeClass("quc-input-bg-incorrect")
})
})
},
getErrorField: function(t) {
var n = e.utils.getErrorType(t);
return "other" != n ? this.$el.find(".quc-field-" + n) : this.$el.find(".quc-global-error")
},
submit: function() {
var e = this,
n = this.$el.find(".quc-button-submit");
n.prop("disabled", !0).val("\u63d0\u4ea4\u4e2d..."),
e.model.one("invalid",
function() {
n.prop("disabled", !1).val("\u63d0\u4ea4")
}),
e.$el.find(".quc-input").each(function(n, i) {
var r = t(i),
o = r.attr("data-name") || r.attr("name"),
a = r.val();
if ("mobile" == o) {
var c = e.$el.find(".quc-activeState").html(),
s = r.data("regexp");
e.model.set(o, {
mobileNumber: a,
regExp: s,
areaCode: c
})
} else e.model.set(o, a)
}),
e.model.submit()
},
show: function(n) {
if (this.setElement(), this.initMobileStates(), n) this.model.trigger("beforeShow", this.$el[0]),
t(n).addClass("quc-wrapper quc-page").empty().append(this.$el);
else {
var i = this.panel = new e.utils.Panel;
i.setTitle(e.getConfig("fillProfile.panelTitle", "\u5b8c\u5584\u5e10\u53f7\u8d44\u6599")),
i.setContent(this.$el),
this.model.trigger("beforeShow", this.$el[0]),
i.show(),
t(i).on("close", e.getConfig("fillProfile.panelCloseHandler", t.noop))
}
this.model.trigger("afterShow", this.$el[0])
},
hide: function() {
this.model.trigger("beforeHide", this.$el[0]),
this.panel && this.panel.hide(),
this.model.trigger("afterHide", this.$el[0])
}
};
e.ui.fillProfile = {
init: function() {
r.init.apply(r, arguments)
}
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = {},
i = e.getLogic({
name: "fillProfile",
validate: function(i, r, o) {
var a, c = e.validate;
switch ("boolean" != typeof r && void 0 !== r || (r = this.get(i)), i.toLowerCase()) {
case "username":
this.set("username", r),
a = c.checkUsername(r);
break;
case "password":
this.set("password", r);
a = c.checkPasswordFrontendSync({
password: r,
username: this.get("username")
}).reason;
break;
case "passwordagain":
a = c.checkPasswordConfirm(this.get("password"), r);
break;
case "mobile":
a = c.checkMobile(r, !0);
break;
case "smscode":
a = c.checkSmsToken(r);
break;
case "captcha":
a = c.checkCaptcha(r)
}
if (o) {
var s, u = e.sync,
l = t.Deferred();
if (a) l = t.Deferred(),
l.reject(a);
else if ("username" == i) {
if (s = n[r]) return s;
l = u.checkUsernameExist(r),
n[r] = l.promise()
} else if ("mobile" == i) {
var p = r.mobileNumber,
d = r.areaCode;
if (s = n[p]) return s;
l = u.checkMobileNumberExist(p, d, "fillProfile"),
n[p] = l.promise()
} else l = t.Deferred(),
l.resolve();
return l.promise()
}
return a
},
sendSmsToken: function() {
var n = this.get("mobile"),
i = this.get("captcha"),
r = this.get("token"),
o = this.validate("mobile", n) || !r && this.validate("captcha", i);
return o ? t.Deferred().reject(o).promise() : (n = n.areaCode + n.mobileNumber, e.getUserInfo().then(function(t) {
return e.sync.sendSmsTokenNeedPhrase(t.crumb, !1, n, i, r)
}))
},
prepareMobileState: function() {
return e.sync.getMobileState()
},
prepareCaptcha: function() {
var n = this,
i = "";
return i = this.isFillProfileByMobile() ? "strictreg": "",
e.sync.getCaptchaUrl(i).then(function(e) {
n.setCaptchaUrl(e.captchaUrl)
},
function() {
return t.Deferred().resolve().promise()
})
},
run: function(e) {
var t = this;
t.init().trigger("showLoading"),
t.prepareCaptcha().done(function() {
t.trigger("hideLoading").trigger("show", {
wrapper: e
})
})
},
submit: function() {
var n, i = this,
r = [],
o = i.isFillProfileByMobile(),
a = i.get("mobile"),
c = i.get("smscode"),
s = i.get("password"),
u = i.get("captcha"),
l = i.get("username");
if (this.trigger("beforeSubmit"), o) {
var p = i.get("isNeedCheckCaptcha", !1);
r = ["mobile", "smscode", "password"],
p && r.push("captcha")
} else r = ["username", "password", "captcha"];
i.isShowPasswordAgain() && r.push("passwordAgain"),
t.each(r,
function(e, t) {
var r = i.validate(t);
r && i.trigger("invalid", r),
n = n || r
}),
!n && e.getUserInfo().then(function(t) {
return o ? (a = a.areaCode + a.mobileNumber, e.sync.perfectMobile(t.crumb, a, s, c)) : e.sync.fillProfile(t.crumb, l, s, i.get("passwordAgain", void 0), u)
}).done(function() {
i.trigger("hide").trigger("success").resolve()
}).fail(function(e) {
e.fromServer = !0;
var t = e.errdetail && e.errdetail.captchaUrl;
t && i.setCaptchaUrl(t),
i.trigger("invalid", e)
})
},
signin: function() {
var t = this.getCallback();
e.signIn ? (this.trigger("hide"), e.signIn(t)) : location.href = "http://i.msvodx.com/reg/?src=" + e.getConfig("src") + "&destUrl=" + encodeURIComponent("string" == typeof t ? t: location.href)
},
isShowPasswordAgain: function() {
return ! e.getConfig("fillProfile.hidePasswordAgain", !1)
},
isFillProfileByMobile: function() {
return "mobile" == e.getConfig("fillProfile.type", "username")
}
});
e.fillProfile = function(e, n) { ! e || 1 == e.nodeType || e instanceof t || (n = e, e = void 0),
i.setCallback(n).run(e)
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = {
init: function(e) {
this.model = e,
this.initModelEvent(),
this.initMethods(),
this.initToken(),
this.initErrorTip()
},
selElement: function() {
this.$el && this.$el.remove(),
this.$el = t('<div class="quc-mod-identify"><form class="quc-form"><div class="quc-tip-wrapper"><p class="quc-tip">\u4e3a\u4e86\u4fdd\u62a4\u60a8\u7684\u5e10\u53f7\u5b89\u5168\uff0c\u64cd\u4f5c\u524d\u8bf7\u60a8\u8fdb\u884c\u5b89\u5168\u9a8c\u8bc1</p></div><div class="quc-other-wrapper"><p class="quc-field quc-field-method quc-clearfix"><label class="quc-label">\u9a8c\u8bc1\u65b9\u5f0f</label><select class="quc-select quc-select-method" name="secMethod"></select><span class="quc-input quc-input-method"></span><a class="quc-method-tip quc-link" href="http://i.msvodx.com/complaint" target="_blank" tabindex="99">\u9a8c\u8bc1\u65b9\u5f0f\u90fd\u4e0d\u80fd\u7528\u4e86\uff1f</a></p><p class="quc-field quc-field-token quc-input-middle quc-clearfix"><label class="quc-label">\u6821\u9a8c\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-token" type="tel" name="token" maxlength="6" placeholder="\u8bf7\u8f93\u51656\u4f4d\u6821\u9a8c\u7801" /></span><a href="#" class="quc-button quc-button-blue quc-get-token">\u514d\u8d39\u83b7\u53d6\u6821\u9a8c\u7801</a><span class="quc-tip"></span><a class="quc-token-tip quc-link" href="#" target="_blank" tabindex="99"></a></p></div><div class="quc-password-wrapper"><p class="quc-field quc-field-password quc-input-long quc-clearfix"><label class="quc-label">\u767b\u5f55\u5bc6\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-password" type="password" name="password" maxlength="20" placeholder="\u8bf7\u8f93\u5165\u60a8\u7684\u767b\u5f55\u5bc6\u7801" /></span><i class="quc-tip-icon"></i><a class="quc-token-tip quc-link" href="http://i.msvodx.com/findpwd/" target="_blank" tabindex="99">\u5fd8\u8bb0\u5bc6\u7801\uff1f</a></p><p class="quc-field quc-field-captcha quc-input-short"><label class="quc-label">\u9a8c\u8bc1\u7801</label><span class="quc-input-bg"><input class="quc-input quc-input-captcha" type="text" name="phrase" maxlength="7" autocomplete="off" placeholder="\u8bf7\u8f93\u5165\u9a8c\u8bc1\u7801" /></span><img class="quc-captcha-img quc-captcha-change" alt="\u9a8c\u8bc1\u7801" title="\u70b9\u51fb\u66f4\u6362" tabindex="99" /> <a class="quc-link quc-captcha-change-link quc-captcha-change" href="#">\u6362\u4e00\u5f20</a></p></div><p class="quc-field quc-field-submit"><input class="quc-button quc-button-primary quc-button-submit" type="submit" value="\u63d0\u4ea4" /></p></form></div>'),
this.initElementEvent()
},
initToken: function() {
var t, n = this,
i = e.utils.getTimer("identify"),
r = "quc-button-disabled";
i.on("timer_start",
function(e, n) {
t.addClass(r),
t.html(n + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
i.on("timer_tick",
function(e, n) {
t.html(n + "\u79d2\u540e\u53ef\u91cd\u65b0\u83b7\u53d6")
}),
i.on("timer_stop",
function() {
t.html("\u91cd\u65b0\u83b7\u53d6\u6821\u9a8c\u7801"),
t.removeClass(r)
});
var o = function(e) {
e.preventDefault(),
t.hasClass(r) || (t.html("\u53d1\u9001\u4e2d..."), t.addClass(r), n.model.sendToken().done(function() {
i.start(),
n.$el.find(".quc-tip-wrapper .quc-tip").removeClass("quc-tip-error").addClass("quc-tip-success").html("\u53d1\u9001\u6210\u529f\uff0c\u8bf7\u67e5\u6536\uff01")
}).fail(function(e) {
t.html("\u514d\u8d39\u83b7\u53d6\u6821\u9a8c\u7801"),
t.removeClass(r),
n.model.trigger("invalid", e)
}))
};
n.model.on("show",
function() {
t = n.$el.find(".quc-get-token"),
t.on("click", o),
i.isRunning() && i.resume()
})
},
initElementEvent: function() {
var e = this;
this.$el.find(".quc-input").focus(function() {
t(this).parent().addClass("quc-input-bg-focus")
}).blur(function() {
t(this).parent().removeClass("quc-input-bg-focus")
}),
this.$el.find(".quc-form").submit(function(t) {
t.preventDefault(),
e.submit()
}),
this.$el.find(".quc-select-method").on("change",
function() {
"secMobile" == t(this).val() ? e.$el.find(".quc-sec-help").children("a").attr("href", "http://i.msvodx.com/findpwd/customerhelper#mobiledisabled") : e.$el.find(".quc-sec-help").children("a").attr("href", "http://i.msvodx.com/findpwd/customerhelper#recieveemailcode")
})
},
initMethods: function() {
var e = this;
this.model.on("show",
function() {
var n = e.$el.find(".quc-select-method"),
i = !0,
r = e.model.getMethods(),
o = [];
if (t.each(r,
function(r, a) {
i && (e.changeMethod(r, a.captchaUrl), i = !1),
t("<option>").val(r).html(a.name + "(" + a.value + ")").appendTo(n),
o.push(r)
}), 1 == o.length) {
var a = r[o[0]];
e.$el.find(".quc-input-method").html(a.name + "(" + a.value + ")"),
n.parent().addClass("quc-method-single")
}
n.change(function() {
e.changeMethod(n.val())
}),
i && e.changeMethod("pwd")
})
},
changeMethod: function(e, t) {
var n = this.$el.find(".quc-token-tip"),
i = this.$el.find(".quc-field-captcha"),
r = this,
o = function(e) {
r.model.getCaptchaUrl("login1").then(function(t) {
i.find(".quc-captcha-img").attr("src", t);
var n = i.find(".quc-input-captcha").val("");
e && n.focus()
})
};
"pwd" == e ? (this.$el.find(".quc-other-wrapper").hide(), this.$el.find(".quc-password-wrapper").children().show(), t && (this.model.setCaptchaUrl(t), o()), this.$el.find(".quc-captcha-change").click(function(e) {
e.preventDefault(),
o()
})) : "secMobile" == e ? n.attr("href", "http://i.msvodx.com/findpwd/customerhelper#mobiledisabled").html("\u6536\u4e0d\u5230\u77ed\u4fe1\u6821\u9a8c\u7801\u600e\u4e48\u529e\uff1f") : n.attr("href", "http://i.msvodx.com/findpwd/customerhelper#recieveemailcode").html("\u6536\u4e0d\u5230\u90ae\u4ef6\u6821\u9a8c\u7801\u600e\u4e48\u529e\uff1f"),
this.model.set("method", e),
this.model.on("invalid",
function(e, t) {
t.fromServer && o()
})
},
initModelEvent: function() {
var e = this;
e.model.on("show",
function(t, n) {
e.show(n)
}).on("hide",
function() {
e.hide()
})
},
submit: function() {
var e = this,
t = e.$el.find(".quc-button-submit"),
n = e.$el.find(".quc-input-token").val(),
i = e.$el.find(".quc-input-password").val(),
r = e.$el.find(".quc-input-captcha").val();
t.prop("disabled", !0).val("\u63d0\u4ea4\u4e2d..."),
e.model.one("invalid",
function() {
t.prop("disabled", !1).val("\u63d0\u4ea4")
}),
e.model.set("token", n),
e.model.set("password", i),
e.model.set("captcha", r),
e.model.submit()
},
initErrorTip: function() {
var e = this;
e.model.on("invalid",
function(t, n) {
var i = e.$el.find(".quc-tip-wrapper .quc-tip");
i.removeClass("quc-tip-success").addClass("quc-tip-error").html(n.errmsg),
e.$el.find(".quc-input, .quc-select").one("focus",
function() {
i.html("")
})
})
},
show: function(n) {
if (this.$orgForm = t(n), this.selElement(), this.model.trigger("beforeShow", this.$el[0]), this.$orgForm.parents(".quc-panel").length > 0) this.$orgForm.hide().before(this.$el);
else { (this.panel = new e.utils.Panel).setTitle(e.getConfig("identify.panelTitle", "\u9700\u8981\u6821\u9a8c\u60a8\u7684\u8eab\u4efd")).setContent(this.$el).show()
}
this.$orgForm.triggerHandler("QucDOMUpdated"),
this.model.trigger("afterShow", this.$el[0])
},
hide: function() {
this.model.trigger("beforeHide", this.$el[0]),
this.panel ? this.panel.hide() : (this.$el.remove(), this.$orgForm.show()),
this.$orgForm.triggerHandler("QucDOMUpdated"),
this.model.trigger("afterHide", this.$el[0])
}
};
e.ui.identify = {
init: function() {
n.init.apply(n, arguments)
}
}
} (QHPass)
},
function(e, t, n) { (function(e) { !
function(t) {
var i, r = n(13).getLogger("identify"),
o = t.$,
a = {},
c = t.getLogic({
name: "identify",
validate: function(e, n) {
var i, r = t.validate;
switch (n = n || this.get(e), e.toLowerCase()) {
case "token":
i = r.checkSmsToken(n);
break;
case "password":
(i = r.checkPassword(n)) && (i = t.utils.isSameError(i, t.ERROR.PASSWORD_EMPTY) ? i: t.ERROR.PASSWORD_WRONG);
break;
case "captcha":
i = r.checkCaptcha(n)
}
return i
},
getMethods: function() {
return a[i]
},
prepareMethods: function(e) {
return t.getUserInfo().then(function(n) {
return t.sync.getIdentifyMethod(n.crumb, e)
}).done(function(t) {
a[e] = t.ways
})
},
sendToken: function(e) {
var n = this;
return e = e || this.get("method"),
t.getUserInfo().then(function(n) {
return "secMobile" == e ? t.sync.sendSmsToken(n.crumb, !0) : t.sync.sendEmailToken(n.crumb, e)
}).fail(function(e) {
n.trigger("invalid", e)
})
},
run: function(t, n) {
r.debug("run");
var o = this;
o.init(),
i = t;
var a = o.getMethods(),
c = e.keys(a);
r.debug("identify ways", c),
"bindMobile" === t && 1 === c.length && "pwd" === c[0] ? r.debug("no need identify") : (r.debug("need identify"), o.trigger("show", n))
},
submit: function() {
r.debug("submit");
var e = this,
n = e.get("token"),
a = e.get("method"),
c = e.get("password"),
s = e.get("captcha"),
u = o.Deferred();
this.trigger("beforeSubmit");
var l = "pwd" == a ? e.validate("password") || e.validate("captcha") : e.validate("token");
return l ? u.reject(l) : u.resolve(),
u.then(function() {
return t.getUserInfo()
}).then(function(e) {
var r = "pwd" == a ? c: n;
return t.sync.identify(e.crumb, i, a, r, s)
}).done(function() {
r.debug("success"),
e.trigger("hide").trigger("success")
}).fail(function(t) {
r.debug("fail");
var n = t.errdetail && t.errdetail.captchaUrl;
n && e.setCaptchaUrl(n),
t.fromServer = !0,
e.trigger("invalid", t)
})
}
}),
s = {
bindMobile: "bindMobile",
modifyMobile: "modifyMobile",
delBindMobile: "delMobile",
setEmail: "setLoginEmail",
modifyEmail: "modifyLoginEmail",
identifyEmail: "verifyLoginEmail",
setSecEmail: "setSecEmail",
modifySecEmail: "modifySecEmail",
modifyPassword: "modifyPwd",
setCommonArea: "setComArea",
closeTextLogin: "closeCodeLogin",
secwarnopen: "secwarnopen",
secwarnclose: "secwarnclose",
cancelAccount: "cancelAccount"
};
t.identify = function(e) {
var n, i = s[e.name];
return e.one("beforeShow",
function(e, t) {
n = t,
c.run(i, t)
}),
e.on("invalid",
function(e, r) {
t.utils.isSameError(r, t.ERROR.IDENTIFY_EXPIRE) && c.run(i, n)
}),
e.on("reset",
function() {
c.run(i, n)
}),
c.prepareMethods(i)
}
} (QHPass)
}).call(t, n(1))
},
function(e, t) { !
function(e) {
var t = e.$,
n = {
init: function(e) {
this.model = e,
this.initModelEvent()
},
initModelEvent: function() {
var e = this;
e.model.on("show",
function(t, n) {
e.show(n)
}).on("hide",
function() {
e.hide()
}).on("resendSuccess",
function() {
e.$el.find(".quc-resend-result").removeClass("quc-resending quc-tip-error").html("\u53d1\u9001\u6210\u529f\uff01").show()
}).on("resendFail",
function(t, n) {
e.$el.find(".quc-resend-result").removeClass("quc-resending").addClass("quc-tip-error").html(n.errmsg).show()
})
},
selElement: function() {
var e = this;
e.$el && e.$el.remove(),
e.$el = t('<div class="quc-mod-active-email"><p class="quc-send-result">\u9a8c\u8bc1\u90ae\u4ef6\u5df2\u7ecf\u53d1\u9001\u5230\u60a8\u7684\u90ae\u7bb1:</p><p class="quc-email-address"><a href="#" class="quc-link quc-link-jump" target="_blank">\u53bb\u6fc0\u6d3b</a></p><p class="quc-tip">\u8bf7\u60a8\u572848\u5c0f\u65f6\u5185\u767b\u5f55\u90ae\u7bb1\u5b8c\u6210\u9a8c\u8bc1</p><p class="quc-button-wrapper"><a href="#" class="quc-button quc-button-blue quc-button-activated" target="_blank">\u5df2\u5b8c\u6210\u6fc0\u6d3b</a></p><div class="quc-resend"><p>\u6ca1\u6536\u5230\u90ae\u4ef6\u600e\u4e48\u529e\uff1f</p><p class="quc-modify-wrapper">&middot; \u90ae\u7bb1\u586b\u9519\u4e86\uff0c<a href="#" class="quc-link quc-link-modify">\u91cd\u65b0\u8bbe\u7f6e\u90ae\u7bb1</a></p><p>&middot; <a href="#" class="quc-link quc-link-resend">\u91cd\u65b0\u53d1\u9001</a>\u9a8c\u8bc1\u90ae\u4ef6&nbsp;<span class="quc-resend-result"></span></p><p>&middot; \u4f9d\u7136\u6536\u4e0d\u5230\u90ae\u4ef6\uff0c<a class="quc-link" href="http://i.msvodx.com/findpwd/customerhelper#recieveemailcode" target="_blank">\u67e5\u770b\u5e2e\u52a9</a></p></div></div>');
var n = this.model.getEmailInfo();
n.site && e.$el.find(".quc-link-jump").attr("href", n.site).show(),
"signUp" == n.type && e.$el.find(".quc-modify-wrapper").hide(),
e.$el.find(".quc-email-address").prepend(n.email),
e.$el.find(".quc-link-resend").click(function(t) {
t.preventDefault(),
e.model.resend(),
e.$el.find(".quc-resend-result").addClass("quc-resending").html("\u53d1\u9001\u4e2d...").show()
}),
e.$el.find(".quc-link-modify").click(function(t) {
t.preventDefault(),
e.hide(),
e.model.modify()
}),
e.$el.find(".quc-button-activated").click(function(i) {
i.preventDefault();
var r = t(this);
r.html("\u68c0\u67e5\u6fc0\u6d3b\u72b6\u6001...").addClass("quc-button-disabled"),
e.model.checkActive().fail(function() {
var t = n.site ? '<a class="quc-link" href="' + n.site + '" target="_blank">\u767b\u5f55\u90ae\u7bb1</a>': "\u767b\u5f55\u90ae\u7bb1";
e.$el.find(".quc-tip").addClass("quc-tip-error").html("\u60a8\u4f3c\u4e4e\u8fd8\u6ca1\u6709\u6fc0\u6d3b\uff0c\u8bf7" + t + "\uff0c\u5e76\u6309\u90ae\u4ef6\u5185\u7684\u63d0\u793a\u64cd\u4f5c\u3002"),
r.html("\u5df2\u5b8c\u6210\u6fc0\u6d3b").removeClass("quc-button-disabled")
})
})
},
show: function() {
if (this.$orgForm = t(this.model.getEmailInfo().el), this.selElement(), this.model.trigger("beforeShow", this.$el[0]), this.$orgForm.parents(".quc-panel").length > 0) this.$orgForm.hide().before(this.$el);
else { (this.panel = new e.utils.Panel).setTitle("\u8bf7\u6fc0\u6d3b\u60a8\u7684\u90ae\u7bb1").setContent(this.$el).show()
}
this.$orgForm.triggerHandler("QucDOMUpdated"),
this.model.trigger("afterShow", this.$el[0])
},
hide: function() {
this.model.trigger("beforeHide", this.$el[0]),
this.panel ? this.panel.hide() : (this.$el.remove(), this.$orgForm.show()),
this.$orgForm.triggerHandler("QucDOMUpdated"),
this.model.trigger("afterHide", this.$el[0])
}
};
e.ui.activeEmail = {
init: function() {
n.init.apply(n, arguments)
}
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = {},
i = e.getLogic({
name: "activeEmail",
run: function(t) {
var i = this,
r = e.getConfig("activeEmail.destUrl", location.href);
if (i.init(), "signUp" == n.type) {
if (n.activeUrl = t.activeurl + "&destUrl=" + encodeURIComponent(r), n.email = t.email, n.wrapper) return void(location.href = n.activeUrl);
e.sync.sendSignUpActivationEmail(n.activeUrl).then(function(e) {
n.site = e.goToMail,
i.trigger("show")
})
} else {
if ("setEmail" == n.type) n.email = t.loginEmailUnactivated;
else {
if ("setSecEmail" != n.type) return void this.trigger("error", "");
n.email = t.safeSecEmail
}
n.site = t.mailHostUrl,
i.trigger("show")
}
},
getEmailInfo: function() {
return n
},
resend: function() {
var i = this,
r = t.when();
return "signUp" == n.type ? r = e.sync.sendSignUpActivationEmail(n.activeUrl) : "setEmail" == n.type ? r = e.getUserInfo().then(function(t) {
return e.sync.sendActivationEmail(t.crumb)
}) : "setSecEmail" == n.type && (r = e.getUserInfo().then(function(t) {
return e.sync.sendSecActivationEmail(t.crumb)
})),
r.done(function(e) {
i.trigger("resendSuccess", e)
}).fail(function(e) {
i.trigger("resendFail", e)
})
},
modify: function() {
n.model.trigger("reset")
},
checkActive: function() {
var i = this,
r = t.Deferred();
return "signUp" == n.type ? e.sync.checkEmailExist(n.email).always(function(t) {
e.utils.isSameError(t, e.ERROR.EMAIL_NOT_ACTIVATED) ? r.reject() : r.resolve()
}) : "setEmail" == n.type ? e.getEmailStatus(function(e) {
e.loginEmail ? r.resolve() : r.reject()
}) : e.getUserSecInfo(function(e) {
e.safeSecEmail ? r.resolve() : r.reject()
}),
r.then(function() {
i.trigger("hide").trigger("success").resolve()
}),
r.promise()
}
});
e.activeEmail = function(e, t) {
i.setCallback(t).run(e)
},
e.activeEmail.prepare = function(e, t) {
n.model = e,
n.wrapper = t,
n.type = e.name,
e.on("beforeShow",
function(e, t) {
n.el = t
})
}
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$,
n = e.ui.loading = {
$el: t('<div class="quc-loading"></div><div class="quc-mask quc-mask-loading">\x3c!--[if lte IE 6]><iframe class="quc-ie6-iframe" src="about:blank" border="0" frameborder="0"></iframe><div class="quc-mask-inner"></div><![endif]--\x3e</div>'),
show: function() {
if (n.$el.appendTo(document.body), !e.utils.support.fixed) {
var i = t(window),
r = t(document.body);
n.$el.filter(".quc-mask").css({
height: r.outerHeight(!0),
width: r.outerWidth(!0),
position: "absolute"
}),
n.$el.filter(".quc-loading").css({
height: i.height(),
width: i.width(),
top: i.scrollTop(),
left: i.scrollLeft(),
position: "absolute"
})
}
},
hide: function() {
n.$el.remove()
}
};
e.events.on("showLoading.*", n.show),
e.events.on("hideLoading.*", n.hide)
} (QHPass)
},
function(e, t) { !
function(e) {
var t = e.$;
e.when = {
signIn: function(t) {
var n = function(n) {
"bind" == n.type && 0 == n.userName.indexOf("360U") ? e.fillProfile(function() {
t(n)
}) : t(n)
};
e.getUserInfo(!1, n,
function() {
e.signIn(n)
})
},
username: function(t) {
this.signIn(function(n) {
0 == n.username.indexOf("360U") ? e.setUsername(t) : t()
})
},
nickname: function(t) {
this.signIn(function(n) {
n.nickname ? t() : e.setNickname(t)
})
},
email: function(t) {
this.signIn(function() {
e.getEmailStatus(function(n) {
n.loginEmail ? t() : e.setEmail(t)
})
})
},
secEmail: function(t) {
this.signIn(function() {
e.getUserSecInfo(function(n) {
n.safeSecEmail ? t() : e.setSecEmail(t)
})
})
},
mobile: function(t) {
this.signIn(function() {
e.getUserSecInfo(function(n) {
n.safeSecMobile ? t() : e.bindMobile(t)
})
})
},
emailOrMobile: function(n, i) {
this.signIn(function() {
var r = t.Deferred(),
o = t.Deferred();
e.getUserSecInfo(function(e) {
e.safeSecMobile ? o.reject() : o.resolve()
}),
e.getEmailStatus(function(e) {
e.loginEmail ? r.reject() : r.resolve()
}),
t.when(r, o).then(function() {
i ? e.bindMobile(n) : e.setEmail(n)
},
n)
})
},
mobileOrEmail: function(e, t) {
this.emailOrMobile(e, !t)
},
authenticate: function(t) {
this.signIn(function(n) {
var i = n.crumb;
e.sync.getAuthenticationStatus(i).then(function(n) {
var i = n.details && n.details.mobile;
n.details && n.details.isNeedAuthen ? e.authenticate(t) : t && t(i)
})
})
}
}
} (QHPass)
},
function(e, t, n) {
var i = n(49);
e.exports = i;
var r = {
zh_CN: {
"\u53d6\u6d88": "\u53d6\u6d88",
"override phone warning": "\u8be5\u624b\u673a\u53f7\u5df2\u88ab\u4f7f\u7528\uff0c\u70b9\u51fb\u201c\u7ee7\u7eed\u7ed1\u5b9a\u201d\u6309\u94ae\uff0c\u624b\u673a\u53f7\u5c06\u4e0e\u539f\u5e10\u53f7\u89e3\u9664\u7ed1\u5b9a\uff0c<b>\u539f\u5e10\u53f7\u5c06\u65e0\u6cd5\u4f7f\u7528\u6b64\u624b\u673a\u53f7\u767b\u5f55\uff0c\u4e5f\u53ef\u80fd\u65e0\u6cd5\u518d\u6b21\u627e\u56de\u539f\u5e10\u53f7</b>\uff0c\u8bf7\u8c28\u614e\u64cd\u4f5c\u3002",
"weak password warning": "\u7cfb\u7edf\u68c0\u6d4b\u5230\u60a8\u5e10\u53f7\u5b89\u5168\u7b49\u7ea7\u8f83\u4f4e\uff0c\u5efa\u8bae\u7acb\u5373\u4fee\u6539\u5bc6\u7801",
"leak password warning": "\u7cfb\u7edf\u68c0\u6d4b\u5230\u60a8\u5e10\u53f7\u5b58\u5728\u5b89\u5168\u98ce\u9669\uff0c\u8bf7\u5148\u4fee\u6539\u5bc6\u7801"
},
en: {
"\u53d6\u6d88": "Cancel",
"\u4fee\u6539\u5bc6\u7801": "Set",
"weak password warning": "Weak password, please change the password first",
"leak password warning": "Your account has security risk, please change the password first",
"\u7ee7\u7eed\u7ed1\u5b9a": "Continue",
"override phone warning": 'This phone number has been associated with another 360 account, <b>click "continue" will disassociate it and associate with the current account</b>, operate with cautions.'
}
}; !
function() {
i.setResources(r),
i.setLocale("zh_CN")
} ()
},
function(e, t, n) { (function(e, t) {
function i() {
return t.resolve(QHPass.sync.actualGetUserInfo({
need_weak_info: 1
})).then(function(e) {
return o.debug("check pwd", e),
a.tryHandleAbnormalPassword(e)
}).then(function(e) {
e && e.shouldChangePassword && a.gotoPageWithSearchParams("/profile/chuserpwd?op=modifyPwd")
}).caught(function() {
o.debug("sign out"),
QHPass.signOut(function() {
QHPass.isI360() && "/login1" !== location.pathname && a.gotoPage("/login1")
})
})
}
var r = n(34),
o = n(13).getLogger("request"),
a = n(85),
c = n(36); !
function() {
var t = r.parse(e.slice(location.search, 1));
if (QHPass.isI360() && "/" === location.pathname) {
var n = c.parse(document.referrer, !0);
if ("/oauth/bind" === n.pathname && "dobind" !== n.query.a) return i();
t.checkPwd && i()
}
} ()
}).call(t, n(1), n(37))
},
function(e, t) {
e.exports = ''
 }]);