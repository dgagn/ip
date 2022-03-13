import './elements';
import Turbolinks from "turbolinks";

/**
 * Fix ajax problem.
 *
 * https://github.com/turbolinks/turbolinks/issues/75
 */
document.addEventListener("turbolinks:click", (e) => {
  const anchorElement = e.target;
  const isSamePageAnchor =
    anchorElement.hash &&
    anchorElement.origin === window.location.origin &&
    anchorElement.pathname === window.location.pathname;

  if (isSamePageAnchor) {
    Turbolinks.controller.pushHistoryWithLocationAndRestorationIdentifier(
      e.data.url,
      Turbolinks.uuid()
    );
    e.preventDefault();
    window.dispatchEvent(new Event("hashchange"));
  }
});

Turbolinks.start();
