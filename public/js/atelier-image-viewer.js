(function () {
  "use strict";

  function initializeAtelierImages() {
    var images = Array.from(document.querySelectorAll('main img[src^="/images/ateliers/"]'));
    if (!images.length) return;

    var sheet = document.createElement("style");
    sheet.textContent = [
      '.atelier-image-zoomable{cursor:zoom-in}',
      '.atelier-image-zoomable:focus-visible{outline:3px solid #60a5fa;outline-offset:4px}',
      '.atelier-image-viewer{border:0;border-radius:16px;padding:0;width:min(96vw,1550px);max-width:96vw;max-height:95vh;background:#0b1220;color:#fff;box-shadow:0 24px 80px rgba(0,0,0,.5);overflow:hidden}',
      '.atelier-image-viewer[open]{display:flex;flex-direction:column}',
      '.atelier-image-viewer::backdrop{background:rgba(2,6,23,.88)}',
      '.atelier-viewer-tools{display:flex;justify-content:space-between;align-items:center;gap:10px;flex-wrap:wrap;padding:12px 16px;border-bottom:1px solid #334155;font:600 14px/1.4 system-ui,sans-serif}',
      '.atelier-viewer-title{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;min-width:0;flex:1}',
      '.atelier-viewer-actions{display:flex;gap:8px;flex-wrap:wrap}',
      '.atelier-viewer-actions a,.atelier-viewer-actions button{appearance:none;background:#1e293b;color:#fff;border:1px solid #64748b;border-radius:10px;padding:8px 11px;font:600 13px system-ui,sans-serif;text-decoration:none;cursor:pointer}',
      '.atelier-viewer-actions a:hover,.atelier-viewer-actions button:hover{background:#334155}',
      '.atelier-viewer-stage{display:flex;align-items:center;justify-content:center;min-height:160px;min-width:0;overflow:auto;padding:12px}',
      '.atelier-viewer-stage img{display:block;max-width:100%;max-height:calc(95vh - 110px);width:auto;height:auto;object-fit:contain;cursor:default}',
      '@media(max-width:600px){.atelier-viewer-tools{padding:9px}.atelier-viewer-actions a,.atelier-viewer-actions button{padding:7px 9px;font-size:12px}.atelier-viewer-stage img{max-height:calc(95vh - 135px)}}'
    ].join("\n");
    document.head.appendChild(sheet);

    var viewer = document.createElement("dialog");
    viewer.className = "atelier-image-viewer";
    viewer.setAttribute("aria-label", "Agrandissement de la capture");
    viewer.innerHTML = '<div class="atelier-viewer-tools">' +
      '<span class="atelier-viewer-title" id="atelier-viewer-caption"></span>' +
      '<div class="atelier-viewer-actions">' +
      '<a id="atelier-viewer-original" href="#" target="_blank" rel="noopener noreferrer">Voir l’image originale ↗</a>' +
      '<button id="atelier-viewer-close" type="button">Fermer ×</button>' +
      '</div></div>' +
      '<div class="atelier-viewer-stage"><img id="atelier-viewer-image" alt=""></div>';
    document.body.appendChild(viewer);

    var enlarged = viewer.querySelector("#atelier-viewer-image");
    var caption = viewer.querySelector("#atelier-viewer-caption");
    var original = viewer.querySelector("#atelier-viewer-original");
    var close = viewer.querySelector("#atelier-viewer-close");
    var previousFocus = null;

    function showImage(image) {
      if (image.hidden) return;
      var url = image.currentSrc || image.src;
      if (!url) return;
      previousFocus = document.activeElement;
      enlarged.src = url;
      enlarged.alt = image.alt || "Capture agrandie";
      original.href = url;
      var figure = image.closest("figure");
      var label = figure && figure.querySelector("figcaption");
      caption.textContent = (label && label.textContent.trim()) || image.alt || "Capture";
      if (typeof viewer.showModal === "function") {
        viewer.showModal();
        close.focus();
      } else {
        window.open(url, "_blank", "noopener");
      }
    }

    close.addEventListener("click", function () { viewer.close(); });
    viewer.addEventListener("click", function (event) {
      if (event.target === viewer) viewer.close();
    });
    viewer.addEventListener("close", function () {
      enlarged.removeAttribute("src");
      if (previousFocus && typeof previousFocus.focus === "function") previousFocus.focus();
    });

    images.forEach(function (image) {
      image.classList.add("atelier-image-zoomable");
      image.setAttribute("title", "Cliquer pour agrandir la capture");
      var parentLink = image.parentElement && image.parentElement.tagName === "A" ? image.parentElement : null;
      if (parentLink) {
        parentLink.setAttribute("aria-label", "Agrandir : " + (image.alt || "capture"));
        parentLink.addEventListener("click", function (event) {
          event.preventDefault();
          showImage(image);
        });
      } else {
        image.setAttribute("role", "button");
        image.setAttribute("tabindex", "0");
        image.setAttribute("aria-label", "Agrandir : " + (image.alt || "capture"));
        image.addEventListener("click", function () { showImage(image); });
        image.addEventListener("keydown", function (event) {
          if (event.key === "Enter" || event.key === " ") {
            event.preventDefault();
            showImage(image);
          }
        });
      }
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initializeAtelierImages, { once: true });
  } else {
    initializeAtelierImages();
  }
})();