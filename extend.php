<?php

namespace Shuzai\Aplayer;

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
                '[metingjs server="{SERVER?}" id="{ID?}" type="{TYPE?}" list-folded="{LISTFOLDED?}"]',
                '<div><meting-js server="{SERVER}" type="{TYPE}" id="{ID}" list-folded="{LISTFOLDED}"></meting-js></div>'
            );
	    $config->BBCodes->addCustom(
                '[aplayer name="{NAME?}" artist="{ARTIST?}" url="{URL?}" cover="{COVER?}" lrc="{LRC?}"]',
                '<div><meting-js name="{NAME}" artist="{ARTIST}" url="{URL}" cover="{COVER}" lrc="{LRC}"></meting-js></div>'
            );
        })
];
