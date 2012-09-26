<?php

/**
 * ownCloud - Reveal App for ownCloud
 *
 * @author Raghu Nayyar and Frank Karlitschek
 * @copyright 2012 Frank Karlitschek frank@owncloud.org
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either 
 * version 3 of the License, or any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *  
 * You should have received a copy of the GNU Lesser General Public 
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 * 
 */

/*

Todo:
	enable fullscreen presentation

*/

namespace OCA_Reveal;

class Storage {

	public static function getPresentations() {
		$presentations=array();
		$list=\OC_FileCache::searchByMime('text', 'reveal' );
		foreach($list as $l) {
			$info=pathinfo($l);
			$size=\OC_Filesystem::filesize($l);
			$mtime=\OC_Filesystem::filemtime($l);

			$entry=array('url'=>$l,'name'=>$info['filename'],'size'=>$size,'mtime'=>$mtime);
			$presentations[]=$entry;
		}

	
		return $presentations;
	}
	

	public static function showHeader($title) {
		
		echo('
		
		<!doctype html>
		<html lang="en">
		<head>	
		<meta charset="utf-8" />
	<meta name="viewport" content="width=1024" />
	<title>'.$title.'</title>


	<link href="http://fonts.googleapis.com/css?family=Open+Sans:regular,semibold,italic,italicsemibold|PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic" rel="stylesheet" />

	<link href="'.\OCP\Util::linkToAbsolute('reveal', 'css/player.css').'" rel="stylesheet" />
    </head>

<body class="impress-not-supported">
	
	
	<div class="fallback-message">
		<p>Your browser <b>does not support the features required</b> by impress.js, so you are presented with a simplified version of this presentation.</p>
		<p>For the best experience please use the latest <b>Chrome</b>, <b>Safari</b> or <b>Firefox</b> browser.</p>
	</div>
	
	
	<div id="impress">
		
		

		');
			
	}

	public static function showFooter() {
			
		echo('<script src="'.\OCP\Util::linkToAbsolute('reveal', 'js/reveal.js').'"></script>
		
		<script>
		
                    Reveal.initialize({
                        // Display controls in the bottom right corner
                        controls: true,

                        // Display a presentation progress bar
                        progress: true,

                        // Push each slide change to the browser history
                        history: false,

                        // Enable keyboard shortcuts for navigation
                        keyboard: true,

                        // Enable the slide overview mode
                        overview: true,

                        // Loop the presentation
                        loop: false,

                        // Number of milliseconds between automatically proceeding to the 
                        // next slide, disabled when set to 0
                        autoSlide: 0,

                        // Enable slide navigation via mouse wheel
                        mouseWheel: true,

                        // Apply a 3D roll to links on hover
                        rollingLinks: true,

                        // Transition style
                        // default/cube/page/concave/linear(2d)
                        transition: "default"
                    });
			
		</script>
		
		</body></html>
		');
				
	}
		

}
