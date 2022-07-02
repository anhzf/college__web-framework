export default class UnathorizedError extends Error {
  title = 'Unauthorized';

  constructor(message?: string) {
    super(message || 'You are not have permission to this action!');
  }
}
