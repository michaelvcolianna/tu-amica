// index.js
// Kicks off any/all sitewide JS and modular JS components
// Note, in this build, jQuery is globally available — as $, jQuery, or even window.jQuery — via WebPack aliasing & ProvidePlugin
"use strict";

// Axios (AJAX)
import axios from "axios";

// SCSS
// NEW! SCSS as a dependency - using WebPack the way *it* wants
import "./../scss/main.scss";

// Modules
import MenuToggle from 'menu-toggle.js';
import DropdownToggle from 'dropdown-toggle.js';
import AccordionToggle from 'accordion-toggle.js';
import FormSubmit from 'form-submit.js';
import BannerToggle from 'banner-toggle.js';

window.app = window.app || {};

(function() {
    MenuToggle.init();
    DropdownToggle.init();
    AccordionToggle.init();
    FormSubmit.init(axios);
    BannerToggle.init();
})();
