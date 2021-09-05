<div class="container">
    <!-- main images -->
    <div class="holder">
        @foreach($car->gallery as $galleryItem)
        <div class="slides">
            <img src="{{$galleryItem->image}}" alt="{{$galleryItem->id}}-slider-image" />
        </div>
        @endforeach
    </div>

    <div class="prevContainer"><a class="prev" onclick="plusSlides(-1)">
            <svg viewBox="0 0 24 24">
                <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
            </svg>
        </a></div>
    <div class="nextContainer"><a class="next" onclick="plusSlides(1)">
            <svg viewBox="0 0 24 24">
                <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
            </svg>
        </a></div>

    <div class="caption-container">
        <p id="caption"></p>
    </div>

    <!-- thumnails in a row -->
    <div class="row">
        @foreach($car->gallery as $galleryItem)
        <div class="column">
            <img class="slide-thumbnail" src="{{$galleryItem->image}}" onclick="currentSlide({{$loop->iteration}})" alt="{{$loop->iteration}}-slider-image-thumbnail">
        </div>
        @endforeach
    </div>
</div>

