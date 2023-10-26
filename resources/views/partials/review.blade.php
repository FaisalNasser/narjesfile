<div class="grid-cols">
  <div class="grid-col grid-col-bottom-1-1">
    <div class="grid-items">
      <div class="grid-item grid-item-bottom-1-1-1">
        <div class="module title-module module-title-305">
          <div class="title-wrapper">
            <h3>@lang('site.customer_review')</h3>
            <div style="background: rgb(208 146 48);" class="title-divider"></div>
            <div class="subtitle"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="grid-col grid-col-bottom-1-2">
    <div class="grid-items">
      <div class="grid-item grid-item-bottom-1-2-1">
        <div class="module module-testimonials module-testimonials-256 blocks-grid carousel-mode">
          <div class="module-body">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                @foreach($reviews as $review)
                  <div class="swiper-slide">
                    <div class="block-body">
                      <div class="block-header"><i class="icon icon-block"></i></div>
                      <div class="block-content block-text">{{ $review->message }}</div>
                      <div class="block-footer">- {{ $review->name }}</div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 'auto',
    spaceBetween: 25,
    autoplay: {
      delay: 6000,
    },
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    touchEventsTarget: 'wrapper',
    breakpoints: {
      767: {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: false,
      },
      1200: {
        slidesPerView: 4, // Display 4 slides on laptops (screen width >= 1200px)
      },
    },
    on: {
      init: function () {
        var swiper = this;
        setTimeout(function () {
          swiper.update(); // Manually update swiper after initialization
          swiper.navigation.update(); // Update navigation after initialization
        }, 500);
      },
      resize: function () {
        this.update(); // Update swiper on window resize
        this.navigation.update(); // Update navigation on window resize
      },
    },
  });
</script>


<style>
  /* Mobile Styles */
  @media (max-width: 767px) {
    .grid-cols {
      display: block;
    }

    .grid-col {
      margin-bottom: 20px;
    }

    .swiper-container {
      width: 100%;
    }

    .swiper-slide {
      height: auto !important; /* Adjust the height to fit the content */
      width: 100%;
      display: none; /* Hide all slides by default */
    }

    .swiper-slide-active {
      display: block; /* Show only the active slide */
    }

    .swiper-pagination {
      position: static;
      margin-top: 15px;
    }

    .swiper-button-prev,
    .swiper-button-next {
      display: block;
      text-rendering: auto;
    }
  }
</style>
