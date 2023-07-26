/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/admin/js/admin-function.js":
/*!**********************************************!*\
  !*** ./resources/admin/js/admin-function.js ***!
  \**********************************************/
/***/ (() => {

//  DOCUMENT FUNCTION
$(document).on('click', function () {
  $('.profile-menu').removeClass('active');
  $('.notification-box').removeClass('active');
  $('.message-box').removeClass('active');
});
//  DOCUMENT FUNCTION

// PROFILE MENU FUNCTION

$('.profile-menu').on('click', function (e) {
  e.stopPropagation();
});
$('li.profile').on('click', function (e) {
  e.stopPropagation();
  $('.profile-menu').toggleClass('active');
});

// PROFILE MENU FUNCTION

// NOTIFICATION MENU FUNCTION

$('.notification-box').on('click', function (e) {
  e.stopPropagation();
});
$('.notification').on('click', function (e) {
  e.stopPropagation();
  $('.notification-box').toggleClass('active');
});

// NOTIFICATION MENU FUNCTION

// MESSAGE MENU FUNCTION

$('.message-box').on('click', function (e) {
  e.stopPropagation();
});
$('.message').on('click', function (e) {
  e.stopPropagation();
  $('.message-box').toggleClass('active');
});

// MESSAGE MENU FUNCTION

// MENU SIDE FUNCTION

$('.menu-icon').on('click', function () {
  $('section.menu').toggleClass('hidden');
  $('section.content').toggleClass('full-width');
});

// MENU SIDE FUNCTION

// SEARCH INPUT FUNCTION

$('.search-input').focus(function () {
  $('.menu-header-search > form').addClass('active');
});
$('.search-input').blur(function () {
  $('.menu-header-search > form').removeClass('active');
});

// SEARCH INPUT FUNCTION

// SUB MENU FUNCTION

$('.sub').on('click', function () {
  $('.sub').toggleClass('show-sub-menu');
});

// SUB MENU FUNCTION

// CUSTOM CARD FUNCTION
$('.default-buttons>button').on('click', function (e) {
  var custom_card = e.target.parentNode.parentNode.parentNode.parentNode.parentNode;
  $(custom_card).toggleClass('show-content');
});
// CUSTOM CARD FUNCTION

/***/ }),

/***/ "./resources/scss/login.scss":
/*!***********************************!*\
  !*** ./resources/scss/login.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/admin/scss/app.scss":
/*!***************************************!*\
  !*** ./resources/admin/scss/app.scss ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/admin/scss/custom.scss":
/*!******************************************!*\
  !*** ./resources/admin/scss/custom.scss ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/app.scss":
/*!*********************************!*\
  !*** ./resources/scss/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/custom.scss":
/*!************************************!*\
  !*** ./resources/scss/custom.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/header.scss":
/*!************************************!*\
  !*** ./resources/scss/header.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/admin/js/app": 0,
/******/ 			"dist/css/app": 0,
/******/ 			"admin/css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["dist/css/app","admin/css/app"], () => (__webpack_require__("./resources/admin/js/admin-function.js")))
/******/ 	__webpack_require__.O(undefined, ["dist/css/app","admin/css/app"], () => (__webpack_require__("./resources/admin/scss/app.scss")))
/******/ 	__webpack_require__.O(undefined, ["dist/css/app","admin/css/app"], () => (__webpack_require__("./resources/admin/scss/custom.scss")))
/******/ 	__webpack_require__.O(undefined, ["dist/css/app","admin/css/app"], () => (__webpack_require__("./resources/scss/app.scss")))
/******/ 	__webpack_require__.O(undefined, ["dist/css/app","admin/css/app"], () => (__webpack_require__("./resources/scss/custom.scss")))
/******/ 	__webpack_require__.O(undefined, ["dist/css/app","admin/css/app"], () => (__webpack_require__("./resources/scss/header.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["dist/css/app","admin/css/app"], () => (__webpack_require__("./resources/scss/login.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;