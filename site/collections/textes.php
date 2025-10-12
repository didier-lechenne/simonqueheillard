<?php

return function () {
    return site()->index()->filterBy('template', 'texte')->listed()->sortBy('date', 'desc');
};