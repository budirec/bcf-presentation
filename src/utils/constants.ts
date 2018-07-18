export const SLIDES_URL: string = 'http://pacific-oasis-39245.herokuapp.com/slides';

export const keyCodes: KeyCodes = Object.freeze({
  up: 38,
  right: 39,
  down: 40,
  left: 37,
});

export interface KeyCodes {
  up: number;
  right: number;
  down: number;
  left: number;
}
