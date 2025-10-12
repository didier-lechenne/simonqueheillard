<?php
/**
 * Controllers allow you to separate the logic of your templates from your markup.
 * This is especially useful for complex logic, but also in general to keep your templates clean.
 *
 * In this example, we handle tag filtering and paginating livres in the controller,
 * before we pass the currently active tag and the livres to the template.
 *
 * More about controllers:
 * https://getkirby.com/docs/guide/templates/controllers
 */
return function ($page) {

    /**
     * We use the collection helper to fetch the livres collection defined in `/site/collections/livres.php`
     * 
     * More about collections:
     * https://getkirby.com/docs/guide/templates/collections
     */
    $livres = collection('livres');

    $tag = param('tag');
    if (empty($tag) === false) {
        $livres = $livres->filterBy('tags', $tag, ',');
    }

    return [
        'tag'   => $tag,
        'livres' => $livres->paginate(6)
    ];

};
