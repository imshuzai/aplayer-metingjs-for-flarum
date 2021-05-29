<?php

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
        ->content(function (Document $document) {
            $document->head[] = '
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css">
	<script async src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
	<script async src="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.js"></script>
	<script async src="https://cdn.jsdelivr.net/npm/meting@2.0.1/dist/Meting.min.js"></script>';
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
	    $config->BBCodes->addCustom(
                '[aplayer-hls name="{TEXT1}" artist="{TEXT2}" url="{TEXT3}" cover="{TEXT4?}"]',
                '<script>
		 const ap = new APlayer({
    		 container: document.getElementById('aplayer'),
    		 audio: [{
        	 name: '{TEXT1}',
        	 artist: '{TEXT2}',
        	 url: '{TEXT3}',
        	 cover: '{TEXT4}',
        	 type: 'hls'
    		 }]
		 });
		 </script>'
            );
            $config->BBCodes->addCustom(
                '[song-in-list name="{TEXT1}" artist="{TEXT2}" url="{TEXT3}" cover="{TEXT4?}" lrc="{TEXT5?}"]',
                '{
            	  name: '{TEXT1}',
            	  artist: '{TEXT2}',
            	  url: '{TEXT3}',
            	  cover: '{TEXT4}',
            	  lrc: '{TEXT5}',
        	  }'
            );
	    $config->BBCodes->addCustom(
                '[aplayer-list]{TEXT6}[/aplayer-list]',
                '<script>
		 const ap = new APlayer({
    		 container: document.getElementById('player'),
    	         lrcType: 1,
    		 audio: [{TEXT6}]
		 });
		 </script>'
            );
        })
];
