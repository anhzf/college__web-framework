export const removeSearchParams = (url: URL) => [...url.searchParams.keys()]
  .reduce((acc, key) => {
    acc.searchParams.delete(key);
    return acc;
  }, url);
