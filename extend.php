<?php

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/assets/Meting.min.js')
	->js(__DIR__.'/assets/APlayer.min.js')
        ->css(__DIR__.'/assets/APlayer.min.css'),
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->BBCodes->addCustom(
                '[metingjs server="{TEXT1}" id="{TEXT2}" type="{TEXT3}" list-folded="{TEXT4}"]',
                '<div><meting-js server="{TEXT1}" type="{TEXT3}" id="{TEXT2}" list-folded="{TEXT4}"></meting-js></div>'
            );
	    $config->BBCodes->addCustom(
                '[aplayer name="{TEXT1}" artist="{TEXT2}" url="{TEXT3}" cover="{TEXT4}" lrc="{TEXT5}"]',
                '<div><meting-js name="{TEXT1}" artist="{TEXT2}" url="{TEXT3}" cover="{TEXT4}" lrc="{TEXT5}"></meting-js></div>'
            );
        })
];
