<?php
header('Content-Type: text/html; charset=UTF-8');

define( "VERSION", "1.0" );
define( "SITEURL", 'http://'.$_SERVER['HTTP_HOST'] );
//define( "STATIC_SERVER", 'http://pinit.sinaapp.com' );
//define( "STATIC_SERVER", 'http://weituxiang.com' );
define( "WB_AKEY" , '2720783040' );
define( "WB_SKEY" , '0b7ffb5309cbf52ec3c8e92013b1b12a' );

//define( "WB_AKEY" , '4047902212' );
//define( "WB_SKEY" , '60a1d3367dc5092efcb33693e3221942' );

define( "WB_CALLBACK_URL" , SITEURL.'/account/weibo-callback' );

define( "buttonJS", "javascript:void((function(){var d=document;window.loadCPPScript=function(s,f){var e=d.createElement('script');e.type='text/javascript';e.charset='UTF-8';if(f){e.onload=e.onreadystatechange=function(){var r=this.readyState;if(!r||'loaded'===r||'complete'===r){f()}}}e.src=s;d.body.appendChild(e)};if(d.cpp){d.cpp.showDialog()}else{window.loadCPPScript('http://cloudpushpin.sinaapp.com/static/js/button.src.js?1')}})());" );
