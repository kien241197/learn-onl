<section class="site-banner">
    <div class="slick-banner slick-items-custom">
        @if($layout->banner_1 != '')
        <div class="items">
            <img class="w-100 d-block" src="{{ asset($layout->banner_1) }}" alt="">
        </div>
        @endif
        @if($layout->banner_2 != '')
        <div class="items">
            <img class="w-100 d-block" src="{{ asset($layout->banner_2) }}" alt="">
        </div>
        @endif
        @if($layout->banner_3 != '')
        <div class="items">
            <img class="w-100 d-block" src="{{ asset($layout->banner_3) }}" alt="">
        </div>
        @endif
    </div>
</section>