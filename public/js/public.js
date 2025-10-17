/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/public.js":
/*!********************************!*\
  !*** ./resources/js/public.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.onload = function () {
  MainFunction();
};

function MainFunction() {
  // Cambiar el color del menú al hacer scroll
  window.addEventListener("scroll", function () {
    var navbar = document.querySelector(".navbar");

    if (window.scrollY > 50) {
      navbar.classList.add("navbar-scrolled");
    } else {
      navbar.classList.remove("navbar-scrolled");
    }
  });

  function changeActiveLink(clickedLink) {
    // Obtener todos los elementos con la clase "nav-link"
    var navLinks = document.querySelectorAll('.nav-item'); // Quitar la clase "active" de todos los enlaces

    navLinks.forEach(function (link) {
      link.classList.remove('active');
    }); // Agregar la clase "active" al enlace clicado

    clickedLink.classList.add('active');
  }
}

document.addEventListener("DOMContentLoaded", function () {
  var lightbox = document.getElementById("lightbox");
  var lightboxImg = lightbox.querySelector(".lightbox-img");
  var images = document.querySelectorAll(".gallery-img");
  var closeBtn = document.getElementById("close");
  var prevBtn = document.getElementById("prev");
  var nextBtn = document.getElementById("next");
  var currentImageIndex = 0; // Abrir lightbox

  images.forEach(function (img, index) {
    img.addEventListener("click", function () {
      currentImageIndex = index;
      updateLightbox();
      lightbox.classList.add("active");
    });
  }); // Cerrar lightbox con el botón de cierre

  closeBtn.addEventListener("click", function () {
    lightbox.classList.remove("active");
  }); // Cerrar lightbox al hacer clic fuera de la imagen

  lightbox.addEventListener("click", function (event) {
    if (event.target === lightbox) {
      lightbox.classList.remove("active");
    }
  }); // Navegar a la imagen anterior

  prevBtn.addEventListener("click", function (event) {
    event.stopPropagation(); // Evitar que el clic cierre el lightbox

    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    updateLightbox();
  }); // Navegar a la siguiente imagen

  nextBtn.addEventListener("click", function (event) {
    event.stopPropagation(); // Evitar que el clic cierre el lightbox

    currentImageIndex = (currentImageIndex + 1) % images.length;
    updateLightbox();
  }); // Actualizar imagen del lightbox

  function updateLightbox() {
    var selectedImage = images[currentImageIndex];
    lightboxImg.src = selectedImage.src;
    lightboxImg.alt = selectedImage.alt;
  }
});

/***/ }),

/***/ 2:
/*!**************************************!*\
  !*** multi ./resources/js/public.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp7\htdocs\AdminEppor\resources\js\public.js */"./resources/js/public.js");


/***/ })

/******/ });