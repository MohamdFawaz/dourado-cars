<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        @foreach($banners as $banner)
        <div class="banner-item-01"
             style="background-image: url({{$banner->image}});">
            <div class="text-content">
                <h2>{{$banner->title}}</h2>
            </div>
        </div>
        @endforeach
    </div>
    @include('front.components.sections.filter')
</div>
