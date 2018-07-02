@push('after-styles')
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />--}}
    <!-- Import PhotoSwipe Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/default-skin/default-skin.css">
    <style>
        .pswp__caption__center {text-align: center;}
        figure {
            display: inline-block;
            width: 33.333%;
            float: left;
        }

        .spacer {height: 5em;}
    </style>
@endpush


<!-- Galley wrapper that contains all items -->
<div id="gallery" class="gallery" itemscope itemtype="http://schema.org/ImageGallery">
<p>Click on a thumbnail to view the full image</p>
    <div class="row">
    @foreach($photos as $photo)
        <div class="col-md-4" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">

            <a href="{{asset('election_day_images/'.$photo->file_name)}}" data-caption="{{$photo->description}}<br><em class='text-muted'>{{$election->getElectionPlace()->name}} {{$election->getElectionPlace()->getPlaceType()}} {{$election->getElectionType()->type }} election on {{$election->day.' - '.$election->month.' - '.$election->year }}</em>" data-width="{{$photo->width}}" data-height="{{$photo->height}}" itemprop="contentUrl" class="photoswipe">
                <!-- Thumbnail -->
                <img class="img-fluid img-responsive" src="{{asset('election_day_images/'.$photo->file_name)}}" itemprop="thumbnail" alt="{{$photo->description}}">
            </a>
        </div>

        @if(is_int(($loop->index + 1)/3))
            {{--end a bootstrap row and begin a new one --}}
    </div>
    <div style="margin-bottom: 2em"></div>
    <div class="row">
            @endif
    @endforeach
    </div>
</div>
<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- Background of PhotoSwipe.
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>
    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">
        <!-- Container that holds slides.
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <!--  Controls are self-explanatory. Order can be changed. -->
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>


@push('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe-ui-default.min.js"></script>

    <script>
        'use strict';

        /* global jQuery, PhotoSwipe, PhotoSwipeUI_Default, console */

        (function($){

            // Init empty gallery array
            var container = [];

            // Loop over gallery items and push it to the array
            $('#gallery').find('.col-md-4').each(function(){
                var $link = $(this).find('a'),
                    item = {
                        src: $link.attr('href'),
                        w: $link.data('width'),
                        h: $link.data('height'),
                        title: $link.data('caption')
                    };
                container.push(item);
            });

            // Define click event on gallery item
            $('.photoswipe').click(function(event){

                // Prevent location change
                event.preventDefault();

                // Define object and gallery options
                var $pswp = $('.pswp')[0],
                    options = {
                        index: $(this).parent('figure').index(),
                        bgOpacity: 0.85,
                        showHideOpacity: true
                    };

                // Initialize PhotoSwipe
                var gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, container, options);
                gallery.init();
            });

        }(jQuery));
    </script>

@endpush
