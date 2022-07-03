import { progressBar } from './ui';

const { open } = XMLHttpRequest.prototype;

const onLoadStart = () => {
  progressBar.start();
};
const onLoadEnd = () => {
  progressBar.stop();
};

// eslint-disable-next-line func-names
XMLHttpRequest.prototype.open = function () {
  this.addEventListener('loadstart', onLoadStart, { once: true });
  this.addEventListener('loadend', onLoadEnd, { once: true });
  // @ts-ignore
  // eslint-disable-next-line prefer-rest-params
  open.apply(this, arguments);
};
