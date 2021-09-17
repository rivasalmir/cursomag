/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
    'domReady!'
], function ($) {
    'use strict';

    $(window).on('load', function(){
        var acc = $('.ui-tabs-panel');
        setTimeout(function() {
            for (var i = 0 ; i < acc.length; i++) {
                console.log(acc[i])
                if(acc[i].hasClass('active')) {
                    console.log($(this))

                }

            }
        }, 3000);

    })

    var accordion,button;

    window.onload = function() {

        accordion = document.getElementsByClassName('ui-tabs-panel');
        button = document.getElementsByClassName('see_more_button');

        setTimeout(function() {

            for (let i = 0 ; i < accordion.length; i++) {
                // Opens first accordion
                if (i === 0) {
                    accordion[i].classList.toggle('active');
                }

                var childs = accordion[i].children;

                accordion[i].addEventListener('click', function (event) {
                    var noRedirect = '.buttonn';
                    if (!event.target.matches(noRedirect)) {
                        let current = document.getElementsByClassName("active");
                        this.classList.toggle("active");
                    }
                });
            }
            for (let i = 0 ; i < accordion.length; i++) {
                button[i].addEventListener('click', function (event) {
                    setTimeout(function() {
                        accordion[i].className += " fullheight";
                        accordion[i].className += " active";

                    }, 20);
                });
            }

        }, 1000);

    }
});
