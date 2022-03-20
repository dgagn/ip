import {cookie} from '../functions/cookie';

export default class ThemeSwitcher extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <input type="checkbox" class="!hidden">
      <svg id="moon" class="cursor-pointer hidden fill-primary-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>moon</title><g ><path  d="M21.4,13.7C20.6,13.9,19.8,14,19,14c-5,0-9-4-9-9c0-0.8,0.1-1.6,0.3-2.4c0.1-0.3,0-0.7-0.3-1 c-0.3-0.3-0.6-0.4-1-0.3C4.3,2.7,1,7.1,1,12c0,6.1,4.9,11,11,11c4.9,0,9.3-3.3,10.6-8.1c0.1-0.3,0-0.7-0.3-1 C22.1,13.7,21.7,13.6,21.4,13.7z"></path></g></svg>
      <svg id="sun" class="cursor-pointer hidden fill-warning-500 stroke-warning-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>sun</title><g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" stroke-miterlimit="10"><line x1="1" y1="12" x2="2" y2="12"   ></line> <line x1="4.2" y1="4.2" x2="4.9" y2="4.9" ></line> <line x1="12" y1="1" x2="12" y2="2" ></line> <line x1="19.8" y1="4.2" x2="19.1" y2="4.9" ></line> <line x1="23" y1="12" x2="22" y2="12" ></line> <line x1="19.8" y1="19.8" x2="19.1" y2="19.1" ></line> <line x1="12" y1="23" x2="12" y2="22" ></line> <line x1="4.2" y1="19.8" x2="4.9" y2="19.1" ></line> <circle cx="12" cy="12" r="6"></circle></g></svg>
    `;
    const input = this.querySelector('input');

    const moon = document.getElementById('moon');
    const sun = document.getElementById('sun');

    sun.addEventListener('click', () => {
      input.checked = true;
      const event = new Event('change');
      input.dispatchEvent(event);
    });

    moon.addEventListener('click', () => {
      input.checked = false;
      const event = new Event('change');
      input.dispatchEvent(event);
    });

    input.addEventListener('change', e => {
      const theme = e.currentTarget.checked ? 'dark' : 'light';
      if (theme === 'dark') document.documentElement.classList.add('dark');
      else document.documentElement.classList.remove('dark');

      moon.classList.toggle('hidden', !e.currentTarget.checked);
      sun.classList.toggle('hidden', e.currentTarget.checked);

      cookie('theme', theme, {expires: 7, path: '/'});
    });

    input.checked = document.documentElement.classList.contains('dark');

    moon.classList.toggle('hidden', !input.checked);
    sun.classList.toggle('hidden', input.checked);
  }
}
