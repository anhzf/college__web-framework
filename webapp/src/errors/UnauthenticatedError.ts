export default class UnathenticatedError extends Error {
  title = 'Unauthenticated';

  constructor(message?: string) {
    super(message || 'You are not authenticated!');
  }
}
