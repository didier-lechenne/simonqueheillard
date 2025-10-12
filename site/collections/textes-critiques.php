<?php
return function() {
        return site()
        ->index()
        ->filterBy('intendedTemplate', 'texte')
        ->filterBy('category', 'textes-critiques');     
};

