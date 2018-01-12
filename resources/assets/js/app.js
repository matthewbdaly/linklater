
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('listfilter');

$(document).ready(function () {
  $('ul#links').listfilter({
    'filter': $('input#linkfilter'),
    'clearlink': $('button#clear'),
    'alternate': true
  });
});
