void 0 === window.kintPlain &&
  (window.kintPlain = (function () {
    "use strict";
    var i = {
      initLoad: function () {
        (i.style = window.kintShared.dedupe("style.kint-plain-style", i.style)),
          (i.script = window.kintShared.dedupe(
            "script.kint-plain-script",
            i.script
          ));
      },
      style: null,
      script: null,
    };
    return i;
  })()),
  window.kintShared.runOnce(window.kintPlain.initLoad);
