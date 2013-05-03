//http://joliclic.free.fr/php/javascript-packer/en/index.php
/*
 * cpp = cloudPushpin
 */
var CPPDomain = 'http://test.slim.com/';
var CPPInit = function ($) {
    window.loadCPPScript(CPPDomain + 'static/js/jquery/jquery.postmessage.min.js', function() {
        $.receiveMessage(function(e) {
            if (e.data === 'closeWTXToolLay') {
                document.cpp.isRunning = 0;
                document.cpp.images = [];
                $('#CPPIframe').hide();
            } else if (e.data === 'openWTXToolLay') {
                $.postMessage(document.cpp.images.join(','), CPPDomain + 'upload#' + encodeURIComponent(document.location.href), $('#CPPIframe').get(0).contentWindow);
                $('#CPPIframe').show();
                $('.cpp-info').remove();
            }
        }, CPPDomain);
    });
    document.cpp = {
        images: [],
        isRunning: 0,
        windowScrollTop: function() {
            return $(window).scrollTop();
        },
        windowHeight: function() {
            return $(window).height();
        },
        showLoading: function() {
            $('body').append('<div class="cpp-loading cpp-info">微图享正在为您取图，请稍等...</div>');
        },
        processImg: function() {
            this.images = [];
            var images = [];
            var windowScrollTop = this.windowScrollTop();
            var windowHeight = this.windowHeight();
            $('img').each(function(i) {
                if ($(this).width() > 200 && $(this).height() > 200 && ($(this).width() > 300 || $(this).height() > 300)) {
                    img_h = $(this).height();
                    imgOffsetTop = $(this).offset().top;
                    imgVisualHeight = windowHeight + windowScrollTop - imgOffsetTop;
                    if (imgOffsetTop <= windowScrollTop && imgOffsetTop + img_h > windowScrollTop + windowHeight) {
                        images.push([2, $(this).attr('src')]);
                    } else if (imgVisualHeight > img_h && imgOffsetTop > windowScrollTop) {
                        images.push([1, $(this).attr('src')]);
                    } else if (imgVisualHeight > img_h && imgOffsetTop+img_h > windowScrollTop) {
                        images.push([((img_h + imgOffsetTop - windowScrollTop) / img_h).toFixed(2), $(this).attr('src')]);
                    } else if (imgOffsetTop > windowScrollTop && imgOffsetTop < windowScrollTop + windowHeight) {
                        images.push([(1 - ((imgOffsetTop + img_h) - (windowScrollTop + windowHeight)) / img_h).toFixed(2), $(this).attr('src')]);
                    } else {
                    }
                }
            });
            this.images.push($.map(images.sort(function(a, b) {
                return b[0] - a[0]
            }), function(item) {
                return item[1];
            }));
        },
        loadDialog: function() {
            if (!this.isRunning) {
                this.isRunning = 1;
                if (/msie/i.test(navigator.userAgent) && navigator.userAgent.toLowerCase().match(/msie ([\d.]+)/)[1] == '6.0') {
                    alert('亲，建议你升级IE浏览器或使用chrome效果更佳！');
                    this.isRunning = 0;
                    return false;
                }
                this.showLoading();
                this.processImg();
                if (this.images == '') {
                    this.isRunning = 0;
                    $('#CPPInfo').remove();
                    window.alert('未检索到尺寸大于300*300像素的图片!\n\r\n\r1、让您喜欢的图片处于浏览器可视区域内；\n\r2、点击收藏栏中的[云图钉]。');
                    return false;
                } else {
                    if ($('#CPPIframe').length <= 0) {
                        $('body').append('<iframe class="cpp-iframe" scrolling="no" frameborder="0" id="CPPIframe" allowtransparency="true" src="' + CPPDomain + 'upload?refer=' + encodeURIComponent(document.location.href) + '"></iframe>');
                        $('#CPPIframe').css('height', $(document).height()).show();
                    }
                    return true;
                }
                return true;
            }
        },
        showDialog: function() {
            if (this.loadDialog()) {
                var dialogUrl = CPPDomain + '/sina/upload.php#' + encodeURIComponent(document.location.href);
                $.postMessage('asynLoad', dialogUrl, $('#CPPIframe').get(0).contentWindow);
            }
        },
        loadStyle: function () {
            var e = document.createElement('link');
            e.type = 'text/css';
            e.rel = 'stylesheet';
            e.href = CPPDomain + 'static/css/button.css';
            document.body.appendChild(e);
        }
    };
    document.cpp.loadStyle();
    document.cpp.loadDialog();
};
if (!window.jQuery || jQuery.fn.jquery < '1.7.1') {
    window.loadCPPScript('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', function() {
        CPPInit(window.jQuery);
    });
} else {
    CPPInit(window.jQuery);
};
