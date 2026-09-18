(function () {
  "use strict";

  function initPillars() {
    var stage = document.querySelector("[data-pillars]");
    if (!stage) return;

    var tabs = stage.querySelectorAll("[data-pillar-tab]");
    var panels = stage.querySelectorAll("[data-pillar-panel]");

    tabs.forEach(function (tab) {
      tab.addEventListener("click", function () {
        var index = tab.getAttribute("data-pillar-tab");

        tabs.forEach(function (t) {
          var active = t.getAttribute("data-pillar-tab") === index;
          t.classList.toggle("is-active", active);
          t.setAttribute("aria-selected", active ? "true" : "false");
        });

        panels.forEach(function (panel) {
          panel.classList.toggle("is-active", panel.getAttribute("data-pillar-panel") === index);
        });
      });
    });
  }

  function initMobileNav() {
    var toggle = document.querySelector("[data-nav-toggle]");
    var nav = document.querySelector("[data-nav-menu]");
    if (!toggle || !nav) return;

    toggle.addEventListener("click", function () {
      var isOpen = nav.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    initPillars();
    initMobileNav();
  });
})();
