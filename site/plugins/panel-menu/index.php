<?php
Kirby::plugin('mon-plugin/panel-menu-extend', [
    'hooks' => [
        'panel.menu:after' => function (Kirby\Panel\Menu $menu) {
            // Ajoute un lien personnalisé dans le menu principal
            $menu->add([
                'label' => 'Textes',
                'icon'  => 'paragraph',
                'url'   => 'pages/textes',
                'position' => 'after:pages', // Place le lien après "Pages"
            ]);

            // Ajoute un autre lien personnalisé
            $menu->add([
                'label' => 'Documentation',
                'icon'  => 'book',
                'url'   => 'https://exemple.com/docs',
                'target' => '_blank',
                'position' => 'after:textes', // Place le lien après "Textes"
            ]);
        }
    ]
]);
