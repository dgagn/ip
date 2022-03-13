function withOpacityValue(variable) {
  return ({opacityValue}) => {
    if (opacityValue === undefined) {
      return `rgb(var(${variable}))`;
    }
    return `rgb(var(${variable}) / ${opacityValue})`;
  };
}

function generateColorMap(variable) {
  const obj = {};
  for (let i = 0; i <= 900; i += 50) {
    if (i === 0) continue;
    if (i % 100 !== 0 && i !== 50) continue;
    obj[i] = withOpacityValue(`${variable}-${i}`);
  }
  return obj;
}

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*',
  ],
  safelist: [
    'bg-info-200',
    'fill-info-500',
    'dark:bg-info-200/30',
    'bg-warning-200',
    'fill-warning-500',
    'dark:bg-warning-200/30',
    'bg-success-200',
    'fill-success-500',
    'dark:bg-success-200/30',
    'bg-error-200',
    'fill-error-500',
    'dark:bg-error-200/30',
  ],
  darkMode: 'class',
  mode: 'jit',
  theme: {
    colors: {
      primary: generateColorMap('--color-primary'),
      secondary: generateColorMap('--color-secondary'),
      contrast: generateColorMap('--color-contrast'),
      info: generateColorMap('--color-info'),
      error: generateColorMap('--color-error'),
      success: generateColorMap('--color-success'),
      warning: generateColorMap('--color-warning'),
      caution: generateColorMap('--color-caution'),
      bg: withOpacityValue('--color-bg'),
      transparent: 'transparent',
    },

    fontSize: {
      base: 'var(--text-base)',
      '6xl': 'var(--text-6xl)',
      '5xl': 'var(--text-5xl)',
      '4xl': 'var(--text-4xl)',
      '3xl': 'var(--text-3xl)',
      '2xl': 'var(--text-2xl)',
      xl: 'var(--text-xl)',
      lg: 'var(--text-lg)',
      md: 'var(--text-md)',
      sm: 'var(--text-sm)',
      xs: 'var(--text-xs)',
    },
    screens: {
      xs: '32rem',
      sm: '48rem',
      md: '64rem',
      lg: '80rem',
      xl: '90rem',
    },
    maxWidth: {
      // tailwind
      none: 'none',
      0: '0',
      full: '100%',
      min: 'min-content',
      max: 'max-content',
      fit: 'fit-content',
      prose: '65ch',

      // custom
      '4xs': '20rem',
      '3xs': '26rem',
      '2xs': '32rem',
      xs: '38rem',
      sm: '48rem',
      md: '64rem',
      lg: '80rem',
      xl: '90rem',
      '2xl': '100rem',
      '3xl': '120rem',
      '4xl': '150rem',
    },

    spacing: {
      '4xs': '0.125em',
      '3xs': '0.25em',
      '2xs': '0.375em',
      xs: '0.5em',
      sm: '0.75em',
      md: '1.25em',
      lg: '2em',
      xl: '3.25em',
      '2xl': '5.25em',
      '3xl': '8.5em',
      '4xl': '13.75em',
    },

    container: {
      padding: '1.25em',
      center: true,
    },
  },

  plugins: [
    require('@tailwindcss/forms')({
      strategy: 'class',
    }),
  ],
};
