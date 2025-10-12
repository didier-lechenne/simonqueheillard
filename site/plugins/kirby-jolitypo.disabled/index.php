<?php
// site/plugins/kirby-jolitypo/index.php

@include_once __DIR__ . '/vendor/autoload.php';

if (!class_exists('JoliTypo\Fixer')) {
    require_once kirby()->root('composer') . '/vendor/autoload.php';
}

use JoliTypo\Fixer;

Kirby::plugin('dlechenne/jolitypo', [
    'options' => [
        'fr' => [
            'rules' => ['Ellipsis', 'Dimension', 'Unit', 'Dash', 'SmartQuotes', 'FrenchNoBreakSpace', 'NoSpaceBeforeComma', 'CurlyQuote', 'Hyphen', 'Trademark']
        ],
        'en' => [
            'rules' => ['Ellipsis', 'Dimension', 'Numeric', 'Dash', 'EnglishQuotes', 'CurlyQuote', 'Unit']
        ]
    ],
    'fieldMethods' => [
        'fixTypo' => function($field) {
            $site = kirby()->site();
            $lang = $site->language() ? $site->language()->code() : 'fr';
            
            // Fallback à fr si la langue n'est pas configurée
            $lang = in_array($lang, ['fr', 'en']) ? $lang : 'fr';
            
            $rules = option('dlechenne.jolitypo.' . $lang . '.rules');
            
            $fixer = new Fixer($rules);
            $fixer->setLocale($lang);
            
            return $fixer->fix($field->value ?? '');
        }
    ],

    'hooks' => [
        'kirbytext:after' => function($text) {
            $site = kirby()->site();
            $lang = $site->language() ? $site->language()->code() : 'fr';
            
            // Fallback à fr si la langue n'est pas configurée
            $lang = in_array($lang, ['fr', 'en']) ? $lang : 'fr';
            
            $rules = option('dlechenne.jolitypo.' . $lang . '.rules');
            
            $fixer = new Fixer($rules);
            $fixer->setLocale($lang);
            
            return $fixer->fix($text ?? '');
        }
    ],


    'tags' => [
        'noTypo' => [
            'html' => function($tag) {
                return '<span class="no-typo">' . $tag->value . '</span>';
            }
        ]
    ]
]);