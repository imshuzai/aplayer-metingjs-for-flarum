<?php

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
        ->content(function (Document $document) {
            $document->head[] = '	
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css">
	<script src="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/meting@2.0.1/dist/Meting.min.js"></script>';
        }), 
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->BBCodes->addCustom(
                '[metingjs server="{SERVER}" id="{ID}" type="{TYPE}" list-folded="{LISTFOLDED}"]',
                '<div><meting-js
	            server="{SERVER}"
	            type="{TYPE}"
	            id="{ID}"
                    list-folded="{LISTFOLDED}">
                 </meting-js></div>'
            );
	    $config->BBCodes->addCustom(
                '[aplayer name="{NAME}" artist="{ARTIST}" url="{URL}" cover="{COVER}" lrc="{LRC}"]',
                '<div><meting-js
                    name="{NAME}"
	            artist="{ARTIST}"
	            url="{URL}"
	            cover="{COVER}"
                    lrc="{LRC}">
                 </meting-js></div>'
            );
        })
];
