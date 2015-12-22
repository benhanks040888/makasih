var version = 'v0.2.0:';

var shouldWorkOffline = [
  '/',
  '/upload',
  '/submit',
  '/thankyou',
  '/offline.html'
];

var updateStaticCache = function() {
  return caches.open(version + 'fundamentals').then(function(cache) {
    return cache.addAll([
      '/',
      '/upload',
      '/submit',
      '/thankyou',
      '/offline.html'
    ]);
    // return Promise.all(shouldWorkOffline.map(function(value) {
    //   var request = new Request(value);
    //   var url = new URL(request.url);
    //   if (url.origin != location.origin) {
    //     request = new Request(value, {mode: 'no-cors'});
    //   }

    //   return fetch(request).then(function(response) {
    //     var cachedCopy = response.clone();
    //     return cache.put(request, cachedCopy);
    //   });
    // }))
  })
}

self.addEventListener("install", function(event) {
  event.waitUntil(updateStaticCache());
});

var clearOldCaches = function() {
  return caches.keys().then(function(keys) {
    return Promise.all(
      keys
        .filter(function(key) {
          return key.indexOf(version) != 0;
        })
        .map(function(key) {
          return caches.delete(key);
        })
      );
  })
}

var limitCache = function(cache, maxItems) {
  cache.keys().then(function(items) {
    if (items.length > maxItems) {
      cache.delete(items[0]);
    }
  });
}


self.addEventListener("fetch", function(event) {
  var fetchFromNetwork = function(response) {
    var cacheCopy = response.clone();
    if (event.request.headers.get('Accept').indexOf('text/html') != -1) {
      caches.open(version + 'pages').then(function(cache) {
        cache.put(event.request, cacheCopy).then(function() {
          limitCache(cache, 25);
        });
      })
    } else if (event.request.headers.get('Accept').indexOf('image') != -1) {
      caches.open(version + 'images').then(function(cache) {
        cache.put(event.request, cacheCopy).then(function() {
          limitCache(cache, 10);
        });
      })
    } else {
      caches.open(version + 'assets').then(function(cache) {
        cache.put(event.request, cacheCopy);
      });
    }

    return response;
  }

  var fallback = function() {
    if (event.request.headers.get('Accept').indexOf('text/html') != -1) {
      return caches.match(event.request).then(function(response) {
        return response || caches.match('/offline.html');
      })
    } else if (event.request.headers.get('Accept').indexOf('image') != -1) {
      return new Response('<svg width="400" height="300" role="img" aria-labelledby="offline-title" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg"><title id="offline-title">Offline</title><g fill="none" fill-rule="evenodd"><path fill="#D8D8D8" d="M0 0h400v300H0z"/><text fill="#9B9B9B" font-family="Helvetica Neue,Arial,Helvetica,sans-serif" font-size="72" font-weight="bold"><tspan x="93" y="172">offline</tspan></text></g></svg>', { headers: { 'Content-Type': 'image/svg+xml' }});
    }
  }

  if (event.request.method != 'GET') {
    event.respondWith(fetch(event.request).then(fetchFromNetwork, fallback));
    return;
  }

  if (event.request.headers.get('Accept').indexOf('text/html') != -1) {
    event.respondWith(fetch(event.request).then(fetchFromNetwork, fallback));
    return;
  }

  event.respondWith(
    caches.match(event.request).then(function(cached) {
      return cached || fetch(event.request).then(fetchFromNetwork, fallback);
    })
  )
});

self.addEventListener("activate", function(event) {
  event.waitUntil(clearOldCaches());
});

self.addEventListener('push', function(event) {
  console.log('Push message', event);
  var title = 'Push message';
  event.waitUntil(
    self.registration.showNotification(title, {
      body: 'Hadiah kamu sudah diterima anak-anak yang membutuhkan!',
      icon: '/assets/images/logo.png',
      tag: 'my-tag'
    }));
});

self.addEventListener('notificationclick', function(event) {
  console.log('Notification click: tag ', event.notification.tag);
  event.notification.close();
  var url = 'https://makasih.ngrok.com';
  event.waitUntil(
      clients.matchAll({
          type: 'window'
      })
      .then(function(windowClients) {
          for (var i = 0; i < windowClients.length; i++) {
              var client = windowClients[i];
              if (client.url === url && 'focus' in client) {
                  return client.focus();
              }
          }
          if (clients.openWindow) {
              return clients.openWindow(url);
          }
      })
  );
});

