
/*
Template Name: Adminox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 2.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Tickets init js
*/

import DataTable from "datatables.net";

import 'datatables.net/js/dataTables.min.js';
import 'datatables.net-bs5';
import 'datatables.net-responsive';

window.$.fn.DataTable = DataTable;

jQuery = window.$;

$(document).ready(function () {
    $('#datatable').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            }
        },
        "drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
    });
});
