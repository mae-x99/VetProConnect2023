void 0 === window.kintShared &&
  (window.kintShared = (function () {
    "use strict";
    var e = {
      dedupe: function (e, n) {
        return (
          [].forEach.call(document.querySelectorAll(e), function (e) {
            e !== (n = !n || !n.ownerDocument.contains(n) ? e : n) &&
              e.parentNode.removeChild(e);
          }),
          n
        );
      },
      runOnce: function (e) {
        "complete" === document.readyState
          ? e()
          : window.addEventListener("load", e);
      },
    };
    return (
      window.addEventListener("click", function (e) {
        var n;
        e.target.classList.contains("kint-ide-link") &&
          ((n = new XMLHttpRequest()).open("GET", e.target.href),
          n.send(null),
          e.preventDefault());
      }),
      e
    );
  })());
