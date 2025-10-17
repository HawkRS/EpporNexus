/*
Template Name: Adminox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 2.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Color Picker init js
*/

!function ($) {
    "use strict";

    var FormPickers = function () { };

    FormPickers.prototype.init = function () {

    //colorpicker start

    $('#default-colorpicker').colorpicker({
        format: 'hex'
    });
    $('#rgba-colorpicker').colorpicker();
    $('#component-colorpicker').colorpicker({
        format: null
    });

    },
    $.FormPickers = new FormPickers, $.FormPickers.Constructor = FormPickers

}(window.jQuery),

//initializing 
function ($) {
    "use strict";
    $.FormPickers.init()
}(window.jQuery);