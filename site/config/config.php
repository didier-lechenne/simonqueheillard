<?php

return [
  'locale' => 'fr_FR.utf8',
	'date.handler' => 'date',
	'date.timezone' => 'Europe/Paris',
  'url' => false,
  
  'panel' => [
      'css'  => 'assets/css/panel.css',
      'js'   => 'assets/js/panel.js'
  ],




    'thumbs' => [
        'srcsets' => [
            'default' => [
                '300w'  => ['width' => 300],
                '600w'  => ['width' => 600],
                '900w'  => ['width' => 900],
                '1200w' => ['width' => 1200]
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

    // 'routes' => [
    //     [
    //       'pattern' => '(:any)',
    //       'action'  => function ($uid) {
    //         $page = page($uid);

    //         if ($page?->intendedTemplate() === 'link') {
    //           return go($page->link(), 301);
    //         }

    //         return $page;
    //       }
    //     ]
    //     ],

    'viewButtons' => [
        'page' => ['typo-and-paste', 'preview', 'settings', 'languages', 'status'],
        'site' => ['typo-and-paste', 'preview', 'languages']
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