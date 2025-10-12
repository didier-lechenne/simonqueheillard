<?php

return [
  'locale' => 'fr_FR.utf8',
	'date.handler' => 'date',
	'date.timezone' => 'Europe/Paris',
  'panel' => [
    'css' => 'assets/css/panel.css',
    'js'  => 'assets/js/panel.js'
  ],


    'thumbs' => [
        'srcsets' => [
            'default' => [
                '300w'  => ['width' => 300],
                '600w'  => ['width' => 600],
                '900w'  => ['width' => 900],
                '1200w' => ['width' => 1200],
                '1800w' => ['width' => 1800]
            ],

        ]
    ],

'cache' => [
    'pages' => [
      'active' => true
    ]
    ],

    'debug' => true,
    'languages' => [
        'detect' => true
    ],

    'yaml.handler' => 'symfony',
    'smartypants' => false,

  'routes' => [
    [
      'pattern' => '(:language)/mentions-legales',
      'action'  => function($language) {
        kirby()->setCurrentLanguage($language);
        return page('home')->render('mentions-legales');
      }
    ]
    ],

    'viewButtons' => [
        'page' => ['typo-and-paste', 'preview', 'settings', 'languages', 'status'],
        'site' => ['typo-and-paste', 'preview', 'languages']
    ],

    'dlechenne.jolitypo.excludedFields' => ['code', 'tags', 'email', 'url', 'slug', 'filename', 'alt'],

    'dlechenne.jolitypo' => [
        'fr' => [
            'rules' => ['Ellipsis', 'Dimension', 'Unit', 'Dash', 'SmartQuotes', 'FrenchNoBreakSpace', 'NoSpaceBeforeComma', 'CurlyQuote', 'Hyphen', 'Trademark']
        ],
        'en' => [
            'rules' => [
                'Ellipsis',
                'Dimension',
                'Numeric',
                'Dash',
                'EnglishQuotes',
                'CurlyQuote',
                'Unit'
            ]
        ]
    ],



    'ready' => function ($kirby) {
        return [
          'junohamburg.reload-on-save' => [
            'active' => $kirby->user() !== null
          ]
        ];
      },
      
  'markdown' => [
      'extra' => true,
      'breaks' => true
  ]


];