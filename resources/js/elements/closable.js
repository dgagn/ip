export default class Closable extends HTMLElement {
  get oncloseclass() {
    return this.getAttribute("oncloseclass") ?? "";
  }

  get delay() {
    const delay = this.getAttribute("delay");
    return isNaN(delay) ? 0 : delay;
  }

  constructor() {
    super();
    this.close = this.close.bind(this);
  }

  connectedCallback() {
    const close = this.querySelector("button");

    close.addEventListener("click", (e) => {
      e.preventDefault();
      this.close();
    });
  }

  close() {
    if (this.oncloseclass) {
      this.classList.add(...this.oncloseclass.split(" "));
    }
    window.setTimeout(() => {
      this.parentElement.removeChild(this);
      this.dispatchEvent(new CustomEvent("close"));
    }, this.delay);
  }
}
