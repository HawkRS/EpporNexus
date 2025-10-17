/*
Template Name: Adminox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 2.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Form mask init js
*/

import 'jquery-mask-plugin';
// Import AutoNumeric
import AutoNumeric from 'autonumeric';

$(document).ready(function() {
    $('[data-toggle="input-mask"]').each(function (idx, obj) {
        var maskFormat = $(obj).data("maskFormat");
        var reverse = $(obj).data("reverse");
        if (reverse != null)
            $(obj).mask(maskFormat, {'reverse': reverse});
        else
            $(obj).mask(maskFormat);
    });
});

// Apply AutoNumeric to multiple elements
jQuery(function($) {
    AutoNumeric.multiple('.autonumber');  // Use the static multiple() method directly
});
