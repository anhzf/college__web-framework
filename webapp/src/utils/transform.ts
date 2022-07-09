export const removeSearchParams = (params: URLSearchParams, ...keys: string[]) => [...params.keys()]
  .reduce((acc, key) => {
    if (!keys.includes(key) && params.has(key)) {
      acc.append(key, params.get(key)!);
    }
    return acc;
  }, new URLSearchParams());

export const removeUrlSearchParams = (url: URL) => [...url.searchParams.keys()]
  .reduce((acc, key) => {
    acc.searchParams.delete(key);
    return acc;
  }, url);
