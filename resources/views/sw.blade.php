self.CACHE_NAME = 'kanelmall-store';
self.URL_CACHES = {!! $caches !!};

// Set the callback for the install step
self.addEventListener('install', function (event) {
    // Perform install steps
    event.waitUntil(
        caches.open(CACHE_NAME)
        .then(function (cache) {
            return cache.addAll(self.URL_CACHES);
        })
    );
});

self.addEventListener('fetch', function (event) {
    event.respondWith(
        caches.match(event.request).then(function (response) {
            // Cache hit - return response
            if (response && navigator.onLine === false) {
                return response;
            }

            // IMPORTANT: Clone the request. A request is a stream and
            // can only be consumed once. Since we are consuming this
            // once by cache and once by the browser for fetch, we need
            // to clone the response
            var fetchRequest = event.request.clone();

            return fetch(fetchRequest).then(
                function (response) {
                    // Check if we received a valid response
                    if (!response || response.status !== 200 || response.type !== 'basic') {
                        return response;
                    }

                    // IMPORTANT: Clone the response. A response is a stream
                    // and because we want the browser to consume the response
                    // as well as the cache consuming the response, we need
                    // to clone it so we have 2 stream.
                    var responseToCache = response.clone();
                    caches.open(CACHE_NAME)
                        .then(function (cache) {
                            if (
                                !event.request.url.startsWith('chrome-extension') ||
                                !event.request.url.includes('extension')
                            ) {
                                cache.put(event.request, responseToCache);
                            }

                        });

                    return response;
                }
            );
        })
    );
});
