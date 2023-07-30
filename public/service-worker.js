// // public/service-worker.js

// self.addEventListener("install", (event) => {
//     event.waitUntil(
//         caches.open("offline-cache").then((cache) => {
//             return cache.addAll([
//                 // Add the URLs of the assets you want to cache for offline use
//                 // For example, you can cache CSS, JS, images, and other essential files
//                 // "/css/styles.css",
//                 // "/js/main.js",
//                 // "/images/logo.png",
//                 // Add more URLs as needed
//             ]);
//         })
//     );

//     // Display the initial notification when the service worker installs
//     self.registration.showNotification("Bunny", {
//         body: "Remember to complete your lessons!",
//     });
// });

// self.addEventListener("fetch", (event) => {
//     event.respondWith(
//         caches.match(event.request).then((response) => {
//             // Return the cached version if available, otherwise fetch from the network
//             return response || fetch(event.request);
//         })
//     );
// });

// self.addEventListener("notificationclick", (event) => {
//     // Handle notification click event here
//     // For example, you can open a specific URL when the notification is clicked
//     const url = "/";
//     event.notification.close();
//     event.waitUntil(clients.openWindow(url));
// });
