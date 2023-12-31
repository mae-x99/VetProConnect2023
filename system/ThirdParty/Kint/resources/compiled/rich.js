void 0 === window.kintRich &&
  (window.kintRich = (function () {
    "use strict";
    var l = {
      selectText: function (e) {
        var t = window.getSelection(),
          a = document.createRange();
        a.selectNodeContents(e), t.removeAllRanges(), t.addRange(a);
      },
      toggle: function (e, t) {
        var a = l.getChildren(e);
        a &&
          (e.classList.toggle("kint-show", t),
          1 === a.childNodes.length &&
            (a = a.childNodes[0].childNodes[0]) &&
            a.classList &&
            a.classList.contains("kint-parent") &&
            l.toggle(a, t));
      },
      toggleChildren: function (e, t) {
        var a = l.getChildren(e);
        if (a) {
          var o = a.getElementsByClassName("kint-parent"),
            n = o.length;
          for (void 0 === t && (t = e.classList.contains("kint-show")); n--; )
            l.toggle(o[n], t);
        }
      },
      switchTab: function (e) {
        var t = e.previousSibling,
          a = 0;
        for (
          e.parentNode
            .getElementsByClassName("kint-active-tab")[0]
            .classList.remove("kint-active-tab"),
            e.classList.add("kint-active-tab");
          t;

        )
          1 === t.nodeType && a++, (t = t.previousSibling);
        for (
          var o = e.parentNode.nextSibling.childNodes, n = 0;
          n < o.length;
          n++
        )
          n === a
            ? (o[n].classList.add("kint-show"),
              1 === o[n].childNodes.length &&
                (t = o[n].childNodes[0].childNodes[0]) &&
                t.classList.contains("kint-parent") &&
                l.toggle(t, !0))
            : o[n].classList.remove("kint-show");
      },
      mktag: function (e) {
        return "<" + e + ">";
      },
      openInNewWindow: function (e) {
        var t = window.open();
        t &&
          (t.document.open(),
          t.document.write(
            l.mktag("html") +
              l.mktag("head") +
              l.mktag("title") +
              "Kint (" +
              new Date().toISOString() +
              ")" +
              l.mktag("/title") +
              l.mktag('meta charset="utf-8"') +
              l.mktag(
                'script class="kint-rich-script" nonce="' + l.script.nonce + '"'
              ) +
              l.script.innerHTML +
              l.mktag("/script") +
              l.mktag(
                'style class="kint-rich-style" nonce="' + l.style.nonce + '"'
              ) +
              l.style.innerHTML +
              l.mktag("/style") +
              l.mktag("/head") +
              l.mktag("body") +
              '<input class="kint-note-input" placeholder="Take some notes!"><div class="kint-rich">' +
              e.parentNode.outerHTML +
              "</div>" +
              l.mktag("/body")
          ),
          t.document.close());
      },
      sortTable: function (e, a) {
        var t = e.tBodies[0];
        [].slice
          .call(e.tBodies[0].rows)
          .sort(function (e, t) {
            if (
              ((e = e.cells[a].textContent.trim().toLocaleLowerCase()),
              (t = t.cells[a].textContent.trim().toLocaleLowerCase()),
              isNaN(e) || isNaN(t))
            ) {
              if (isNaN(e) && !isNaN(t)) return 1;
              if (isNaN(t) && !isNaN(e)) return -1;
            } else (e = parseFloat(e)), (t = parseFloat(t));
            return e < t ? -1 : t < e ? 1 : 0;
          })
          .forEach(function (e) {
            t.appendChild(e);
          });
      },
      showAccessPath: function (e) {
        for (var t = e.childNodes, a = 0; a < t.length; a++)
          if (t[a].classList && t[a].classList.contains("access-path"))
            return (
              t[a].classList.toggle("kint-show"),
              void (t[a].classList.contains("kint-show") && l.selectText(t[a]))
            );
      },
      showSearchBox: function (e) {
        var t = e.querySelector(".kint-search");
        t &&
          (t.classList.toggle("kint-show"),
          t.classList.contains("kint-show")
            ? (e.classList.add("kint-show"),
              t.focus(),
              t.select(),
              l.search(e.parentNode, t.value))
            : e.parentNode.classList.remove("kint-search-root"));
      },
      search: function (e, t) {
        e.querySelectorAll(".kint-search-match").forEach(function (e) {
          e.classList.remove("kint-search-match");
        }),
          e.classList.remove("kint-search-match"),
          e.classList.toggle("kint-search-root", t.length),
          t.length && l.findMatches(e, t);
      },
      findMatches: function (e, t) {
        var a,
          o,
          n,
          r = e.cloneNode(!0);
        if (
          (r.querySelectorAll(".access-path").forEach(function (e) {
            e.remove();
          }),
          -1 != r.textContent.toUpperCase().indexOf(t.toUpperCase()))
        ) {
          for (s in (e.classList.add("kint-search-match"), e.childNodes))
            if ("DD" == e.childNodes[s].tagName) {
              a = e.childNodes[s];
              break;
            }
          if (a)
            if (
              ([].forEach.call(a.childNodes, function (e) {
                "DL" == e.tagName
                  ? l.findMatches(e, t)
                  : "UL" == e.tagName &&
                    (e.classList.contains("kint-tabs")
                      ? (o = e.childNodes)
                      : e.classList.contains("kint-tab-contents") &&
                        (n = e.childNodes));
              }),
              o && n && o.length == n.length)
            )
              for (var s = 0; s < o.length; s++) {
                var i = !1;
                -1 != o[s].textContent.toUpperCase().indexOf(t.toUpperCase())
                  ? (i = !0)
                  : ((r = n[s].cloneNode(!0))
                      .querySelectorAll(".access-path")
                      .forEach(function (e) {
                        e.remove();
                      }),
                    -1 !=
                      r.textContent.toUpperCase().indexOf(t.toUpperCase()) &&
                      (i = !0)),
                  i &&
                    (o[s].classList.add("kint-search-match"),
                    [].forEach.call(n[s].childNodes, function (e) {
                      "DL" == e.tagName && l.findMatches(e, t);
                    }));
              }
        }
      },
      getParentByClass: function (e, t) {
        for (; (e = e.parentNode) && e.classList && !e.classList.contains(t); );
        return e;
      },
      getParentHeader: function (e, t) {
        for (
          var a = e.nodeName.toLowerCase();
          "dd" !== a && "dt" !== a && l.getParentByClass(e, "kint-rich");

        )
          a = (e = e.parentNode).nodeName.toLowerCase();
        return l.getParentByClass(e, "kint-rich")
          ? (e = "dd" === a && t ? e.previousElementSibling : e) &&
            "dt" === e.nodeName.toLowerCase() &&
            e.classList.contains("kint-parent")
            ? e
            : void 0
          : null;
      },
      getChildren: function (e) {
        for (
          ;
          (e = e.nextElementSibling) && "dd" !== e.nodeName.toLowerCase();

        );
        return e;
      },
      isFolderOpen: function () {
        if (l.folder && l.folder.querySelector("dd.kint-foldout"))
          return l.folder
            .querySelector("dd.kint-foldout")
            .previousSibling.classList.contains("kint-show");
      },
      initLoad: function () {
        (l.style = window.kintShared.dedupe("style.kint-rich-style", l.style)),
          (l.script = window.kintShared.dedupe(
            "script.kint-rich-script",
            l.script
          )),
          (l.folder = window.kintShared.dedupe(
            ".kint-rich.kint-folder",
            l.folder
          ));
        var t,
          e = document.querySelectorAll("input.kint-search");
        [].forEach.call(e, function (t) {
          function e(e) {
            window.clearTimeout(a),
              t.value !== o &&
                (a = window.setTimeout(function () {
                  (o = t.value), l.search(t.parentNode.parentNode, o);
                }, 500));
          }
          var a = null,
            o = null;
          t.removeEventListener("keyup", e), t.addEventListener("keyup", e);
        }),
          l.folder &&
            ((t = l.folder.querySelector("dd")),
            [].forEach.call(
              document.querySelectorAll(".kint-rich.kint-file"),
              function (e) {
                e.parentNode !== l.folder && t.appendChild(e);
              }
            ),
            document.body.appendChild(l.folder),
            l.folder.classList.add("kint-show"));
      },
      keyboardNav: {
        targets: [],
        target: 0,
        active: !1,
        fetchTargets: function () {
          var e = l.keyboardNav.targets[l.keyboardNav.target];
          (l.keyboardNav.targets = []),
            document
              .querySelectorAll(
                ".kint-rich nav, .kint-tabs>li:not(.kint-active-tab)"
              )
              .forEach(function (e) {
                (l.isFolderOpen() && !l.folder.contains(e)) ||
                  (0 === e.offsetWidth && 0 === e.offsetHeight) ||
                  l.keyboardNav.targets.push(e);
              }),
            e &&
              -1 !== l.keyboardNav.targets.indexOf(e) &&
              (l.keyboardNav.target = l.keyboardNav.targets.indexOf(e));
        },
        sync: function (e) {
          var t = document.querySelector(".kint-focused");
          t && t.classList.remove("kint-focused"),
            l.keyboardNav.active &&
              ((t = l.keyboardNav.targets[l.keyboardNav.target]).classList.add(
                "kint-focused"
              ),
              e || l.keyboardNav.scroll(t));
        },
        scroll: function (e) {
          var t, a;
          e !== l.folder.querySelector("dt > nav") &&
            ((a = (t = function (e) {
              return e.offsetTop + (e.offsetParent ? t(e.offsetParent) : 0);
            })(e)),
            l.isFolderOpen()
              ? (e = l.folder.querySelector("dd.kint-foldout")).scrollTo(
                  0,
                  a - e.clientHeight / 2
                )
              : window.scrollTo(0, a - window.innerHeight / 2));
        },
        moveCursor: function (e) {
          for (l.keyboardNav.target += e; l.keyboardNav.target < 0; )
            l.keyboardNav.target += l.keyboardNav.targets.length;
          for (; l.keyboardNav.target >= l.keyboardNav.targets.length; )
            l.keyboardNav.target -= l.keyboardNav.targets.length;
          l.keyboardNav.sync();
        },
        setCursor: function (e) {
          if (l.isFolderOpen() && !l.folder.contains(e)) return !1;
          l.keyboardNav.fetchTargets();
          for (var t = 0; t < l.keyboardNav.targets.length; t++)
            if (e === l.keyboardNav.targets[t])
              return (l.keyboardNav.target = t), !0;
          return !1;
        },
      },
      mouseNav: {
        lastClickTarget: null,
        lastClickTimer: null,
        lastClickCount: 0,
        renewLastClick: function () {
          window.clearTimeout(l.mouseNav.lastClickTimer),
            (l.mouseNav.lastClickTimer = window.setTimeout(function () {
              (l.mouseNav.lastClickTarget = null),
                (l.mouseNav.lastClickTimer = null),
                (l.mouseNav.lastClickCount = 0);
            }, 250));
        },
      },
      style: null,
      script: null,
      folder: null,
    };
    return (
      window.addEventListener(
        "click",
        function (e) {
          var t = e.target;
          if (
            l.mouseNav.lastClickTarget &&
            l.mouseNav.lastClickTimer &&
            l.mouseNav.lastClickCount
          )
            if (
              ((t = l.mouseNav.lastClickTarget),
              1 === l.mouseNav.lastClickCount)
            )
              l.toggleChildren(t.parentNode),
                l.keyboardNav.setCursor(t),
                l.keyboardNav.sync(!0),
                l.mouseNav.lastClickCount++,
                l.mouseNav.renewLastClick();
            else {
              for (
                var a = t.parentNode.classList.contains("kint-show"),
                  o = document.getElementsByClassName("kint-parent"),
                  n = o.length;
                n--;

              )
                l.toggle(o[n], a);
              l.keyboardNav.setCursor(t),
                l.keyboardNav.sync(!0),
                l.keyboardNav.scroll(t),
                window.clearTimeout(l.mouseNav.lastClickTimer),
                (l.mouseNav.lastClickTarget = null),
                (l.mouseNav.lastClickTarget = null),
                (l.mouseNav.lastClickCount = 0);
            }
          else if (l.getParentByClass(t, "kint-rich")) {
            var r = t.nodeName.toLowerCase();
            if (("dfn" === r && l.selectText(t), "th" !== r))
              if (
                ((t = l.getParentHeader(t)) &&
                  (l.keyboardNav.setCursor(t.querySelector("nav")),
                  l.keyboardNav.sync(!0)),
                (t = e.target),
                "li" === r && "kint-tabs" === t.parentNode.className)
              )
                "kint-active-tab" !== t.className && l.switchTab(t),
                  (t = l.getParentHeader(t, !0)) &&
                    (l.keyboardNav.setCursor(t.querySelector("nav")),
                    l.keyboardNav.sync(!0));
              else if ("nav" === r)
                "footer" === t.parentNode.nodeName.toLowerCase()
                  ? (l.keyboardNav.setCursor(t),
                    l.keyboardNav.sync(!0),
                    (t = t.parentNode).classList.toggle("kint-show"))
                  : (l.toggle(t.parentNode),
                    l.keyboardNav.fetchTargets(),
                    (l.mouseNav.lastClickCount = 1),
                    (l.mouseNav.lastClickTarget = t),
                    l.mouseNav.renewLastClick());
              else if (t.classList.contains("kint-popup-trigger")) {
                var s = t.parentNode;
                if ("footer" === s.nodeName.toLowerCase())
                  s = s.previousSibling;
                else
                  for (; s && !s.classList.contains("kint-parent"); )
                    s = s.parentNode;
                l.openInNewWindow(s);
              } else
                t.classList.contains("kint-access-path-trigger")
                  ? l.showAccessPath(t.parentNode)
                  : t.classList.contains("kint-search-trigger")
                  ? l.showSearchBox(t.parentNode)
                  : t.classList.contains("kint-search") ||
                    ("pre" === r && 3 === e.detail
                      ? l.selectText(t)
                      : l.getParentByClass(t, "kint-source") && 3 === e.detail
                      ? l.selectText(l.getParentByClass(t, "kint-source"))
                      : t.classList.contains("access-path")
                      ? l.selectText(t)
                      : "a" !== r &&
                        (t = l.getParentHeader(t)) &&
                        (l.toggle(t), l.keyboardNav.fetchTargets()));
            else
              e.ctrlKey ||
                l.sortTable(t.parentNode.parentNode.parentNode, t.cellIndex);
          }
        },
        !0
      ),
      window.addEventListener(
        "keydown",
        function (e) {
          if (e.target === document.body && !e.altKey && !e.ctrlKey) {
            if (68 === e.keyCode) {
              if (l.keyboardNav.active) l.keyboardNav.active = !1;
              else if (
                ((l.keyboardNav.active = !0),
                l.keyboardNav.fetchTargets(),
                0 === l.keyboardNav.targets.length)
              )
                return void (l.keyboardNav.active = !1);
              return l.keyboardNav.sync(), void e.preventDefault();
            }
            if (l.keyboardNav.active) {
              if (9 === e.keyCode)
                return (
                  l.keyboardNav.moveCursor(e.shiftKey ? -1 : 1),
                  void e.preventDefault()
                );
              if (38 === e.keyCode || 75 === e.keyCode)
                return l.keyboardNav.moveCursor(-1), void e.preventDefault();
              if (40 === e.keyCode || 74 === e.keyCode)
                return l.keyboardNav.moveCursor(1), void e.preventDefault();
              var t,
                a,
                o = l.keyboardNav.targets[l.keyboardNav.target];
              if ("li" === o.nodeName.toLowerCase()) {
                if (32 === e.keyCode || 13 === e.keyCode)
                  return (
                    l.switchTab(o),
                    l.keyboardNav.fetchTargets(),
                    l.keyboardNav.sync(),
                    void e.preventDefault()
                  );
                if (39 === e.keyCode || 76 === e.keyCode)
                  return l.keyboardNav.moveCursor(1), void e.preventDefault();
                if (37 === e.keyCode || 72 === e.keyCode)
                  return l.keyboardNav.moveCursor(-1), void e.preventDefault();
              }
              (o = o.parentNode),
                65 === e.keyCode
                  ? (l.showAccessPath(o), e.preventDefault())
                  : "footer" === o.nodeName.toLowerCase() &&
                    o.parentNode.classList.contains("kint-rich")
                  ? 32 === e.keyCode || 13 === e.keyCode
                    ? (o.classList.toggle("kint-show"), e.preventDefault())
                    : 37 === e.keyCode || 72 === e.keyCode
                    ? (o.classList.remove("kint-show"), e.preventDefault())
                    : (39 !== e.keyCode && 76 !== e.keyCode) ||
                      (o.classList.add("kint-show"), e.preventDefault())
                  : 32 === e.keyCode || 13 === e.keyCode
                  ? (l.toggle(o),
                    l.keyboardNav.fetchTargets(),
                    e.preventDefault())
                  : (39 !== e.keyCode &&
                      76 !== e.keyCode &&
                      37 !== e.keyCode &&
                      72 !== e.keyCode) ||
                    ((t = 39 === e.keyCode || 76 === e.keyCode),
                    o.classList.contains("kint-show")
                      ? l.toggleChildren(o, t)
                      : t ||
                        ((a = l.getParentHeader(o.parentNode.parentNode, !0)) &&
                          (l.keyboardNav.setCursor(
                            (o = a).querySelector("nav")
                          ),
                          l.keyboardNav.sync())),
                    l.toggle(o, t),
                    l.keyboardNav.fetchTargets(),
                    e.preventDefault());
            }
          }
        },
        !0
      ),
      l
    );
  })()),
  window.kintShared.runOnce(window.kintRich.initLoad);
