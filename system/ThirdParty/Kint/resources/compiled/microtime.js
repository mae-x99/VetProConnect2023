void 0 === window.kintMicrotimeInitialized &&
  ((window.kintMicrotimeInitialized = 1),
  window.addEventListener("load", function () {
    "use strict";
    var a = {},
      t = Array.prototype.slice.call(
        document.querySelectorAll("[data-kint-microtime-group]"),
        0
      );
    t.forEach(function (t) {
      var i, e;
      t.querySelector(".kint-microtime-lap") &&
        ((i = t.getAttribute("data-kint-microtime-group")),
        (e = parseFloat(t.querySelector(".kint-microtime-lap").innerHTML)),
        (t = parseFloat(t.querySelector(".kint-microtime-avg").innerHTML)),
        void 0 === a[i] && (a[i] = {}),
        (void 0 === a[i].min || a[i].min > e) && (a[i].min = e),
        (void 0 === a[i].max || a[i].max < e) && (a[i].max = e),
        (a[i].avg = t));
    }),
      t.forEach(function (t) {
        var i,
          e,
          r,
          o,
          n = t.querySelector(".kint-microtime-lap");
        null !== n &&
          ((i = parseFloat(n.textContent)),
          (o = t.dataset.kintMicrotimeGroup),
          (e = a[o].avg),
          (r = a[o].max),
          (o = a[o].min),
          (i === (t.querySelector(".kint-microtime-avg").textContent = e) &&
            i === o &&
            i === r) ||
            (n.style.background =
              e < i
                ? "hsl(" + (40 - 40 * ((i - e) / (r - e))) + ", 100%, 65%)"
                : "hsl(" +
                  (40 + 80 * (e === o ? 0 : (e - i) / (e - o))) +
                  ", 100%, 65%)"));
      });
  }));
