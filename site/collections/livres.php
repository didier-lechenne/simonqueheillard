<?php


return function () {
    return site()->index()
    ->filterBy('template', 'livre')
    ->listed()
    ->sortBy('date', 'desc')
    // ->sortBy('date', 'asc')
    ;
};