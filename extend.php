<?php

/*
 * A Flarum extension template for BBCode created by Billy Wilcosky.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For instructions, please view the README file.
 */

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
                '[aplayer server="{SERVER}" id="{ID}" type="{TYPE}" list-folded="{LISTFOLDED}" name="{NAME}" artist="{ARTIST}" url="{URL} " cover="{COVER}" lrc="{LRC}"]',
                '<meting-js
	            server="{SERVER}"
	            type="{TYPE}"
	            id="{ID}"
                    list-folded="{LISTFOLDED}"
                    name="{NAME}"
	            artist="{ARTIST}"
	            url="{URL}"
	            cover="{COVER}"
                    lrc="{LRC}">
                 </meting-js>'
            );
        })
];
