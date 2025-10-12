<?php
return function() {
    return site()
        ->index()
        ->filterBy('template', 'texte') 
        ->filterBy('category', 'textes-critiques');     
};