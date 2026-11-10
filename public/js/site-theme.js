(function () {
  "use strict";

  var KEY = "amal-portfolio-appearance";
  var prefersDark = window.matchMedia ? window.matchMedia("(prefers-color-scheme: dark)") : null;
  var mode = prefersDark && prefersDark.matches ? "dark" : "light";

  try {
    var saved = window.localStorage.getItem(KEY);
    if (saved === "light" || saved === "dark") mode = saved;
  } catch (error) {
    // Still switch themes if browser storage is unavailable.
  }

  function renderMode() {
    document.documentElement.setAttribute("data-amal-theme", mode);
    document.documentElement.setAttribute("data-amal-theme-choice", mode);
    document.documentElement.style.colorScheme = mode;

    var button = document.querySelector(".amal-theme-trigger");
    if (button) {
      var nextLabel = mode === "dark" ? "Light Mode" : "Dark Mode";
      button.title = nextLabel;
      button.setAttribute("aria-label", nextLabel);
      button.setAttribute("aria-pressed", String(mode === "dark"));
    }
  }

  function changeTheme() {
    mode = mode === "dark" ? "light" : "dark";
    try {
      window.localStorage.setItem(KEY, mode);
    } catch (error) {
      // Keep current selection for this page.
    }
    renderMode();
  }

  renderMode();

  window.addEventListener("storage", function (event) {
    if (event.key !== KEY) return;
    if (event.newValue === "light" || event.newValue === "dark") {
      mode = event.newValue;
    } else {
      mode = prefersDark && prefersDark.matches ? "dark" : "light";
    }
    renderMode();
  });

  if (prefersDark) {
    var onSystemChange = function () {
      var stored;
      try { stored = window.localStorage.getItem(KEY); } catch (error) { stored = null; }
      if (stored !== "light" && stored !== "dark") {
        mode = prefersDark.matches ? "dark" : "light";
        renderMode();
      }
    };
    if (prefersDark.addEventListener) prefersDark.addEventListener("change", onSystemChange);
    else if (prefersDark.addListener) prefersDark.addListener(onSystemChange);
  }

  document.addEventListener("DOMContentLoaded", function () {
    if (!document.body || document.querySelector(".amal-theme-dock")) return;

    var dock = document.createElement("div");
    dock.className = "amal-theme-dock";
    dock.innerHTML = [
      '<button class="amal-theme-trigger" type="button" aria-label="Dark Mode">',
      '<svg class="amal-theme-icon amal-theme-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">',
      '<circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/>',
      '</svg>',
      '<svg class="amal-theme-icon amal-theme-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">',
      '<path d="M20.985 12.99A9 9 0 0 1 11.01 3.015 9 9 0 1 0 20.985 12.99Z"/>',
      '</svg>',
      '</button>'
    ].join("");

    // Keep the switch beside the existing language button on the homepage.
    // On standalone project and atelier pages, leave it in its previous corner.
    var languageButton = document.getElementById("langBtn");
    if (languageButton && languageButton.closest(".nav .links")) {
      dock.classList.add("amal-theme-dock--nav");
      languageButton.insertAdjacentElement("afterend", dock);
    } else {
      document.body.appendChild(dock);
    }

    dock.querySelector(".amal-theme-trigger").addEventListener("click", changeTheme);
    renderMode();
  });
})();