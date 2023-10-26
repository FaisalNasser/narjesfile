<!DOCTYPE html>
<html lang="en-US">
 @include('frontend.head')

 <?php $pages = getPages(); ?>

<body>




    <!-- Header Area Start
    ====================================================== -->


        @include('frontend.header')
        @include('frontend.slider')
    <!-- Preloader Area Start
    ====================================================== -->
    <!-- <div id="mask">
        <div id="loader">
        </div>
    </div> -->
    <div id="overlay" class="overlay"></div>

    <div id="popup" class="popup">
  <div class="popup-content">
    <h2>Cookie-Einwilligung</h2>
  
    
    <p>     Wir verwenden Cookies, um Ihre Erfahrung auf dieser Website zu optimieren,
     Ihnen personalisierte Inhalte und Anzeigen zu zeigen und Ihnen Dienstleistungen und Kommunikation anzubieten, die auf Ihre Interessen zugeschnitten sind.</p>
    <p> Durch die weitere Nutzung unserer Website oder mit dem Klick auf “Akzeptieren” stimmen Sie der Verwendung dieser Cookies zu. Detaillierte Informationen und wie Sie Ihre Einwilligung jederzeit widerrufen können,
      finden Sie in unserer Datenschutzerklärung
                                  @foreach($pages as $page)
                                    @if($page->slug =="Datenschutz")

                                        <a class="datenschutz" href="<?php echo url("pages/" . $page->slug); ?>">
                                            {{ $page->title}}
                                        </a>
                                   

                                    @endif
                                  @endforeach 
    
    .</p>
    <button id="accept-btn">Akzeptieren</button>
  </div>
</div>
    <div width="100%" style="text-align:center" id="image_loader">  </div>
    <!-- =================================================
    Preloader Area End --> 
        @yield('content')
		@include('frontend.footer')

</body>
</html>
