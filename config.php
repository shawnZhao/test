<?php
header('Content-Type: text/html; charset=UTF-8');

define( "SITEURL", 'http://'.$_SERVER['HTTP_HOST'] );
//define( "STATIC_SERVER", 'http://pinit.sinaapp.com' );
//define( "STATIC_SERVER", 'http://weituxiang.com' );
define( "WB_AKEY" , '3895685104' );
define( "WB_SKEY" , '0ddd7d22f501989ab25696c78cadafda' );

//define( "WB_AKEY" , '4047902212' );
//define( "WB_SKEY" , '60a1d3367dc5092efcb33693e3221942' );

define( "WB_CALLBACK_URL" , SITEURL.'/sina/callback.php' );

define( "buttonJS", "javascript:void((function(){var d=document;window.loadCPPScript=function(s,f){var e=d.createElement('script');e.type='text/javascript';e.charset='UTF-8';if(f){e.onload=e.onreadystatechange=function(){var r=this.readyState;if(!r||'loaded'===r||'complete'===r){f()}}}e.src=s;d.body.appendChild(e)};if(d.cpp){d.cpp.showDialog()}else{window.loadCPPScript('http://test.slim.com/static/js/button.src.js')}})());" );
