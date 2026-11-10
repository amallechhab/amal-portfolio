(function () {
  "use strict";
  var KEY = "amal-portfolio-appearance";
  var choice = "system";
  var prefersDark = window.matchMedia ? window.matchMedia("(prefers-color-scheme: dark)") : null;

  try {
    var stored = window.localStorage.getItem(KEY);
    if (stored === "system" || stored === "light" || stored === "dark") choice = stored;
  } catch (error) {
    // The switch still works if storage is blocked.
  }

  function currentTheme() {
    return choice === "system" ? (prefersDark && prefersDark.matches ? "dark" : "light") : choice;
  }

  function applyTheme() {
    var mode = currentTheme();
    document.documentElement.setAttribute("data-amal-theme", mode);
    document.documentElement.setAttribute("data-amal-theme-choice", choice);
    document.documentElement.style.colorScheme = mode;
  }

  function saveTheme(next) {
    if (next !== "system" && next !== "light" && next !== "dark") return;
    choice = next;
    try { window.localStorage.setItem(KEY, next); } catch (error) { /* Storage may be disabled. */ }
    applyTheme();
    updateButtons();
  }

  function updateButtons() {
    var buttons = document.querySelectorAll(".amal-theme-choice");
    buttons.forEach(function (button) {
      var active = button.getAttribute("data-choice") === choice;
      button.setAttribute("aria-pressed", String(active));
    });
    var trigger = document.querySelector(".amal-theme-trigger");
    if (trigger) {
      trigger.title = "Apparence : " + (choice === "system" ? "System" : choice === "light" ? "Light" : "Dark");
    }
  }

  applyTheme();

  if (prefersDark) {
    var onSystemChange = function () { if (choice === "system") applyTheme(); };
    if (prefersDark.addEventListener) prefersDark.addEventListener("change", onSystemChange);
    else if (prefersDark.addListener) prefersDark.addListener(onSystemChange);
  }

  window.addEventListener("storage", function (event) {
    if (event.key === KEY) {
      choice = event.newValue === "light" || event.newValue === "dark" ? event.newValue : "system";
      applyTheme();
      updateButtons();
    }
  });

  document.addEventListener("DOMContentLoaded", function () {
    if (!document.body || document.querySelector(".amal-theme-dock")) return;

    var dock = document.createElement("div");
    dock.className = "amal-theme-dock";
    dock.innerHTML = [
      '<button class="amal-theme-trigger" type="button" aria-controls="amal-theme-menu" aria-expanded="false" aria-label="Changer l’apparence">',
      '<span class="amal-theme-symbol" aria-hidden="true">◐</span><span>Thème</span>',
      '</button>',
      '<div class="amal-theme-menu" id="amal-theme-menu" hidden>',
      '<div class="amal-theme-title">Apparence</div>',
      '<div class="amal-theme-subtitle">Choisis les couleurs du portfolio</div>',
      '<div class="amal-theme-options" role="group" aria-label="Apparence du portfolio">',
      '<button class="amal-theme-choice" type="button" data-choice="system" aria-pressed="false"><span aria-hidden="true">▣</span> System</button>',
      '<button class="amal-theme-choice" type="button" data-choice="light" aria-pressed="false"><span aria-hidden="true">☼</span> Light</button>',
      '<button class="amal-theme-choice" type="button" data-choice="dark" aria-pressed="false"><span aria-hidden="true">☾</span> Dark</button>',
      '</div></div>'
    ].join("");

    document.body.appendChild(dock);
    var trigger = dock.querySelector(".amal-theme-trigger");
    var menu = dock.querySelector(".amal-theme-menu");

    function closeMenu() {
      menu.hidden = true;
      trigger.setAttribute("aria-expanded", "false");
    }
    trigger.addEventListener("click", function () {
      menu.hidden = !menu.hidden;
      trigger.setAttribute("aria-expanded", String(!menu.hidden));
    });
    dock.querySelectorAll(".amal-theme-choice").forEach(function (button) {
      button.addEventListener("click", function () {
        saveTheme(button.getAttribute("data-choice"));
        closeMenu();
        trigger.focus();
      });
    });
    document.addEventListener("click", function (event) {
      if (!dock.contains(event.target)) closeMenu();
    });
    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape" && !menu.hidden) {
        closeMenu();
        trigger.focus();
      }
    });
    updateButtons();
  });
})();