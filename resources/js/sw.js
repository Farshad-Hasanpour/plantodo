self.addEventListener("install", e => {
	console.log("Service Worker installing...")
});
self.addEventListener("activate", e => {
	console.log("Service Worker activating...")
});
