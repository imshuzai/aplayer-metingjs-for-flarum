<?php

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
        ->content(function (Document $document) {
            $document->head[] = '
	<link href="https://unpkg.com/browse/aplayer@1.10.1/dist/APlayer.min.css">
	<script async src="https://unpkg.com/browse/aplayer@1.10.1/dist/APlayer.min.js"></script>
	<script async src="https://unpkg.com/meting@2.0.1/dist/Meting.min.js"></script>';
        }),
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->BBCodes->addCustom(
                '[metingjs server="{TEXT1}" id="{TEXT2}" type="{TEXT3}"]',
                '<div><meting-js server="{TEXT1}" type="{TEXT3}" id="{TEXT2}"></meting-js></div>'
            );
	    $config->BBCodes->addCustom(
                '[aplayer name="{TEXT1}" artist="{TEXT2}" url="{TEXT3}" cover="{TEXT4?}" lrc="{TEXT5?}"]',
                '<div><meting-js name="{TEXT1}" artist="{TEXT2}" url="{TEXT3}" cover="{TEXT4}" lrc="{TEXT5}"></meting-js></div>'
            );
        })
];
