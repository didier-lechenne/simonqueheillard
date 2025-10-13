<?php

use Kirby\Cms\App as Kirby;

require_once __DIR__ . '/lib/footnotes.php';

Kirby::plugin('sylvainjule/footnotes', [
    'options' => array(
        'wrapper'           => 'div',
        'back'              => '<svg class="icon-retour" viewBox="0 0 103.61 77.17"><path d="m31.38,19.07l6.58,6.45-11.69,11.56-6.72,5.64.13.4,13.03-.81h38.56c9.27,0,17.74-4.7,17.74-15.86s-8.47-15.86-17.74-15.86V1.47c14.92,0,27.68,8.33,27.68,24.99s-12.76,24.99-27.68,24.99h-38.56l-13.03-.81-.13.4,6.72,5.64,11.69,11.56-6.58,6.45L3.57,46.88l27.81-27.81Z"></path></svg>',
        'links'             => true,
        'snippet.container' => 'footnotes_container',
        'snippet.entry'     => 'footnotes_entry',
        'snippet.reference' => 'footnotes_reference',
        'back.title'        => null,
    ),
    'fieldMethods' => [
        'footnotes' => function($field) {
            return Footnotes::convert($field->text());
        },
        'ft' => function($field) {
            return $field->footnotes();
        },
        'collectFootnotes' => function($field) {
            $start = count(Footnotes::$footnotes) + 1;
            return Footnotes::convert($field->text(), false, true, false, true, $start);
        },
        'removeFootnotes' => function($field) {
            return Footnotes::convert($field->text(), true);
        },
        'withoutFootnotes' => function($field) {
            return Footnotes::convert($field->text(), false, true);
        },
        'onlyFootnotes' => function($field) {
            return Footnotes::convert($field->text(), false, false, true);
        },
    ],
    'blocksMethods' => [
        'collectFootnotes' => function() {
            $start = count(Footnotes::$footnotes) + 1;
            return Footnotes::convert($this->toHtml(), false, true, false, false, $start);
        },
    ],
    'translations' => array(
        'en' => require_once __DIR__ . '/lib/languages/en.php',
        'fr' => require_once __DIR__ . '/lib/languages/fr.php',
    ),
    'snippets'     => [
        'footnotes_container' => __DIR__ . '/snippets/container.php',
        'footnotes_entry'     => __DIR__ . '/snippets/entry.php',
        'footnotes_reference' => __DIR__ . '/snippets/reference.php'
    ]
]);
