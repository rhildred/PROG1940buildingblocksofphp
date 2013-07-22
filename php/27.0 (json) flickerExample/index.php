<?php 

$sUrl = "http://api.flickr.com/services/feeds/photos_public.gne?id=51035594111@N01&format=json";

$theData = file_get_contents($sUrl);

// unfortunately flickr returns invalid JSON data

// take off prefix and closing bracket
$jsonData = substr($theData, 15, strlen($theData) - 16);

// get rid of mid string line endings
$jsonData = str_replace("\r\n", " ", $jsonData);

// unescape apostraphe
$jsonData = str_replace("\\'", "'", $jsonData);

$oFeed = json_decode($jsonData);

?>
<!DOCTYPE html>
<!--
This is a minimalist example of a slideshow, using some of my public images on flickr. 
The good thing about the swapImage div is that it can contain anything and it will be swapped one for the other.
Only the first image is an actual image, the rest are anchors that get loaded the first time.
The .js code is somewhat modified gpl courtesy of TrendMedia Technologies, Inc., Brian McNitt. 
-->
<html>
<head>
    <title>Demo of slideshow with buttons</title>
    <style type="text/css">
        .slideshow
        {
            position:relative;
        }
        .swapImage
        {
            position:absolute;
        }
        .pictureLinks
        {
            position:relative;
            /* needs to be below picture */
            margin-top:500px;
            float:left;
		}
        .pictureLinks button{
          width:20px;
	        height:20px;
	        border-radius:10px;
	        font-size:20px;
	        color:#666;
	        line-height:100px;
	        text-align:center;
            background:#8DC63E;
            margin-left: 7px;
        }

        .pictureLinks button.active{
	        background:#801809;
        }
    </style>
</head>
<body>
    <div class="slideshow">
    <?php foreach($oFeed->items as $n=>$oItem)
    {
    	$sImage = str_replace("_m", "", $oItem->media->m);
    	if($n == 0)
    	{?>
        <div class="swapImage">
        	<h1><?php echo $oItem->title ?></h1>
            <img src="<?php echo $sImage ?>" />
        </div>
    	
    	<?php }
    	else
    	{?>
        <div class="swapImage" style="display:none">
        	<h1><?php echo $oItem->title ?></h1>
        	<a href="<?php echo $sImage ?>"></a>
        </div>
    	
    	<?php }
    }?>
    </div>
    
</body>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
    // Copyright (c) 2010 TrendMedia Technologies, Inc., Brian McNitt. 
    // All rights reserved.
    //
    // Released under the GPL license
    // http://www.opensource.org/licenses/gpl-license.php
    //
    // **********************************************************************
    // This program is distributed in the hope that it will be useful, but
    // WITHOUT ANY WARRANTY; without even the implied warranty of
    // MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
    // **********************************************************************

    $(window).load(function () {	//start after HTML, images have loaded

        var InfiniteRotator =
	{
	    init: function () {
	        //initial fade-in time (in milliseconds)
	        var initialFadeIn = 1000;

	        //interval between items (in milliseconds)
	        var itemInterval = 10000;

	        //cross-fade time (in milliseconds)
	        var fadeTime = 2500;

	        //count number of items
	        var numberOfItems = $('.swapImage').length;

	        //set current item
	        var currentItem = 0;

	        var swapImage = function (nNew) {
	            // .stop true makes it not save up events
	            if (typeof nNew == 'undefined') {
	                $('.swapImage').eq(currentItem).stop(true, true).fadeOut(fadeTime);
	            } else {
	                $('.swapImage').eq(currentItem).hide();
	            }
	            $('#' + currentItem).attr('class', '');
	            if (typeof nNew !== 'undefined') {
	                currentItem = nNew;
	            } else if (currentItem == numberOfItems - 1) {
	                currentItem = 0;
	            } else {
	                currentItem++;
	            }
	            // find out if there is an anchor tag and no image tag in the current item, and if so swap it for the img tag
	            var dCur = $('.swapImage').eq(currentItem);
	            var aCur = dCur.find('a');
	            var aImg = dCur.find('img');
	            if (aCur.length && !aImg.length) {
	                var img = $('<img>'); //Equivalent: $(document.createElement('img'))
	                img.attr('src', aCur.attr('href'));
	                img.attr('class', aCur.attr('class'));
	                img.appendTo(dCur);
	                aCur.remove();
	            }
	            $('#' + currentItem).attr('class', 'active');
	            if (typeof nNew == 'undefined') {
	                $('.swapImage').eq(currentItem).fadeIn(fadeTime);
	            } else {
	                $('.swapImage').eq(currentItem).show();
	            }

	        };

	        //loop through the items		
	        var infiniteLoop = setInterval(swapImage, itemInterval);

	        if (numberOfItems > 0) {
	            var oParent = $('.swapImage')[0].parentNode;
	            var oNew = $('<div class="pictureLinks">');
	            for (var i = 0; i < numberOfItems; i++) {
                    // 1 button for each item
	                var oLink = $('<button id="' + i + '">&nbsp;</button>');
	                if (i == 0) {
	                    oLink.attr('class', 'active');
	                }
	                oLink.click(function (evt) {
	                    evt.stopPropagation();
	                    clearInterval(infiniteLoop);
	                    var nNew = parseInt(this.id);
	                    swapImage(nNew);
	                });
	                oNew.append(oLink);
	            }
	            $(oParent).append(oNew);
	        }

	    }
	};

        InfiniteRotator.init();

    });
</script>
</html>