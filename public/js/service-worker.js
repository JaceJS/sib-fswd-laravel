const CACHE_NAME = "my-site-cache-v1";
const urlsToCache = [
    "../../resources/views/landing.blade.php",
    "../css/landing.css",
    "../js/scripts.js",
    // ... tambahkan sumber daya lain yang ingin di-cache
];

self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => cache.addAll(urlsToCache))
    );
});

self.addEventListener("fetch", (event) => {
    event.respondWith(
        caches
            .match(event.request)
            .then((response) => response || fetch(event.request))
    );
});
