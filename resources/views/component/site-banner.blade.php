<section class="site-banner">
    <div class="slick-banner slick-items-custom">
        @if($layout->banner_1 != '')
        <div class="items">
            <a href="{{ $layout->link_banner_1 }}"><img class="w-100 d-block" src="{{ asset($layout->banner_1) }}" alt=""></a>
        </div>
        @endif
        @if($layout->banner_2 != '')
        <div class="items">
            <a href="{{ $layout->link_banner_2 }}"><img class="w-100 d-block" src="{{ asset($layout->banner_2) }}" alt=""></a>
        </div>
        @endif
        @if($layout->banner_3 != '')
        <div class="items">
            <a href="{{ $layout->link_banner_3 }}"><img class="w-100 d-block" src="{{ asset($layout->banner_3) }}" alt=""></a>
        </div>
        @endif
    </div>
</section>