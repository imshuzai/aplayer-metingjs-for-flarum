<?php

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
        ->content(function (Document $document) {
            $document->head[] = '<link rel="stylesheet" type="text/css" href="../assets/extensions/imshuzai-aplayer-metingjs-for-flarum/APlayer.min.css"><script src="../assets/extensions/imshuzai-aplayer-metingjs-for-flarum/APlayer.min.js"></script><script src="../assets/extensions/imshuzai-aplayer-metingjs-for-flarum/Meting.min.js"></script>';
        }), 
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->BBCodes->addCustom(
                '[metingjs server="{SERVER}" id="{ID}" type="{TYPE}" list-folded="{LISTFOLDED}"]',
                '<span class="aplayer" server="{SERVER}" type="{TYPE}" id="{ID}" list-folded="{LISTFOLDED}"></span>'
            );
	    $config->BBCodes->addCustom(
                '[aplayer name="{NAME}" artist="{ARTIST}" url="{URL}" cover="{COVER}" lrc="{LRC}"]',
                '<span class="aplayer" name="{NAME}" artist="{ARTIST}" url="{URL}" cover="{COVER}" lrc="{LRC}"></span>'
            );
        })
];
