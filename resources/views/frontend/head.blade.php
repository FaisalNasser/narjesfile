<head>
    <meta charset="utf-8">
    <title> {!! setting_by_key('title') !!} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name="description"
        content="Wir arbeiten mit innovativen und sorgfältig ausgewählten Marken der Beauty-Branche zusammen, die aus den Sortimenten Naturkosmetik sind. Wir vertreiben Schönheitspflegeprodukte für Haut und Haar.
Für uns ist jedes Haar schön, jedes auf seine Art. Zwischen glattem, lockigem und gewelltem Haar, langem und kurzem, verstehen wir die Notwendigkeit einer erweiterten Pflege für alle Haartypen.">
    <meta name="keywords"
        content="haarkosmetik,domino haarkosmetik,exklusive haarkosmetik,japanische haarklosmetik,kosmetik,haar,haare,frisörartikel,haaröl,haarfärben tipps,silikon,haarspray,zweithaar,haarfarbe,haarpuder,streuhaar,haarfarben,haarpflege,schütthaar,sprühhaare,schwarzkopf,haarefärben,lichtes haar,biohaarfarbe,marianne koch,ein neuer kopf,silikon shampoo,schütteres haar,naturhaarfarbe,haarverdichtung,pflanzenhaarfarbe,tigi,gard, haaröl,haare,lange haare,schöne haare,gesunde haare,haaröl männer,haare pflegen,haaröl vergleich,lange haare bekommen,glänzende haare,haare stylen,haaröle,haare schneiden,haaröl test,guhl haaröl,balea haaröl,gisou haaröl,bestes haaröl,review haaröl,purple haaröl,glatte haare,ogx haaröl test,haare glätten,fettige haare,haaröl drogerie,ayurveda haaröl,haaröle im test,haaröle testen,trockene haare,haaröl anwendung,haaröl für männer,keratin,keratin treatment,brazilian blowout,keratin hair treatment,how to do hair protein treatment at home,hair protein treatment,what is the keratin treatment for hair,keratin treatment sinhala,hair treatment sinhala,what is keratin treatment sinhala,what does keratin do to your hair,hair growth treatments,hair damage treatment at home sinhala,best shampoo brands in sri lanka,keratin cream price in sri lanka,keratin,keratin treatment,keratin hair treatment,keratin treatment on curly hair,keratin treatment at home,how to do keratin treatment at home,hair keratin treatment,keratin treatment review,keratin smoothing treatment,keratin hair treatment at home,keratin treatment on natural hair,hair keratin,keratin for hair,brazilian keratin treatment,step by step procedure for keratin treatment,keratin treatments,best keratin treatment,gk keratin , Keratin 
Haarprotein, Protein-Haarbehandlung, Haarglättung, Haarversiegelung ,Haarausfall stoppen, Hanna Lee Ultima Liss Brasilianische haarglattüng , Narjes Alsham, Narjes Alsham -Protein, Königin des brasilianischen Proteins , Protein BEHANDLUNG
Haarglättung & Haarversiegelung für 8 Monate
Protein BEHANDLUNG für natürliches und gefärbtes Haare, Arbeitsschritte
ein BEHANDLUNG für blondiert und gebleicht Haare
Hanna Lee Professional Ultimate Liss , Hanna Lee, Ultimate Liss Treatment , Ultimate Liss
Hanna Lee , HannaLee , Hannalee, Hanna Lee Ultimate Platinum , Hanna Lee Professional Platinum, Der Traum vom seidigem Haar in nur einem Tag ist wahr geworden
Hautpflege, Naturprodukte, Naturöle, Naturprodukte, Körperpflege, Naturseife,
Haarpflegeprodukte, natürliches Shampoo, Shampoo, Conditioner, Creme, Vitamine, Diamond Cells , Diamond cells Microplastia , Diamond Products protein
Natures Extracts in Ihrem täglichen Leben, Natürliche Extrakte, natürliche ätherische Öle
Rosenwasser, Lavendelwasser, Toner für trockene Haut, Toner für fettige Haut, Toner für Mischhaut, Toner für  sensitive Haut , Lavendelseife, Honig- und Propolisseife, Mandelölseife, Seife für trockene Haut, Seife für fettige Haut, Schwarzkümmelöl, Schwarzkümmelöl und Bockshornklee-Öl , Creme für trockene Haut, Creme für fettige Haut, Kollagencreme, natürliche Creme, WHITE MUSK
">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <?php
    // load overlay color from database somehow
    $Primary = setting_by_key('color');
    $secondary = setting_by_key('color_s');
    ?>
    <style>
        :root {

            --primary: <?php echo $Primary; ?> !important;
            /* --primaryHover: #fca241 !important;
  --primaryTransparent : rgba(239, 143, 34 , 0.5)!important; */
            --secondary: <?php echo $secondary; ?> !important;
            /*--secondaryHover :   #780807 !important;*/
            --white: #ffffff !important;
            --black: #000 !important;
            --mainTrans: 0.5s all ease !important;
            --font-family: 'Cairo', sans-serif !important;
        }
    </style>
    <link rel="icon" href="{{ asset('company/company/nar-germany.png') }}">

    <link rel="stylesheet"
        href="https://www.paypalobjects.com/web/res/f2d/e46ce4d56afce5cd58584f0f36b6a/css/appAlternative.css">
    <style type="text/css">
        html body div#wrapper div#paymentMethodContainer .paymentMethodRow .nameRow {
            font-size: 12px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>

    <script type="text/javascript" src="{{ asset('adminpanel/assets/frontend/js/jquery-1.11.1.min.js') }}"></script>
    <!-- jquery -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">



    <!--=============================================
    =            CSS  files       =
    =============================================-->
    <!-- Google Fonts -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS -->
    <!-- Main CSS -->

    <link href="{{ asset('adminpanel/assets/new_frontend/css/stylepintonsmooth.css') }}" rel="stylesheet">


    <link href="{{ asset('adminpanel/assets/new_frontend/css/vendors.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/assets/new_frontend/css/style.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="//unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="//unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css"
        type="text/css" />
    <link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css"
        type="text/css" />
    <link href="{{ asset('adminpanel/assets/new_frontend/css/style.css') }}" rel="stylesheet">

    <!-- Magnific Popup core CSS file -->
    <link href="
https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/magnific-popup.min.css
" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- ////////////////// -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet"/>
<!-- /////////////// -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- ////////////////// -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet" />
    <!-- /////////////// -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

  
  <script src="//unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
  <script src="//unpkg.com/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="//unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
  <script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>


  





  <!-- ///////////////////////////////////
  //////////////////////////////////
  ///////////////////////////////// -->


   <script src="https://x.klarnacdn.net/express-button/v1/lib.js" data-id="6b1cd9af-c7b5-5b84-8926-5c5b1482e7e5" data-environment="playground" async=""></script>
    <script src="https://x.klarnacdn.net/kp/lib/v1/api.js" async="" defer="" data-nscript="beforeInteractive"></script>
    <style type="text/css">
        @font-face {
            font-family: Roboto;
            src: url("chrome-extension://mcgbeeipkmelnpldkobichboakdfaeon/css/Roboto-Regular.ttf");
        }
    </style>
    <style>
        /*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsInNvdXJjZVJvb3QiOiIifQ== */
    </style>
    <style>
        klarna-express-button {
            width: 308px;
            height: 50px;
            display: inline-block
        }

        /*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8uL2J1dHRvbi9zdHlsZXMvc2l6ZS5nbG9iYWxzLnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBR0Esc0JBQ0UsV0FBQSxDQUNBLFdBQUEsQ0FDQSxvQkFBQSIsInNvdXJjZXNDb250ZW50IjpbIi8vIEhlcmUgd2Ugc2V0IHRoZSBrbGFybmEtZXhwcmVzcy1idXR0b24gY29udGFpbmVyIHRvIGhhdmUgaXRzIGRlZmF1bHQgaGVpZ2h0IGFuZCB3aWR0aC5cbi8vIFRoaXMgaXMgYWRkZWQgYXMgYW4gaW5saW5lIHN0eWxlIHRhZyB0byB0aGUgbWVyY2hhbnQncyBwYWdlXG4vLyBNZXJjaGFudHMgY2FuIG92ZXJ3cml0ZSB0aG9zZSBzdHlsZXMgYnkgZGVmaW5pbmcgYSBtb3JlIHNwZWNpZmljIHNlbGVjdG9yLCBlLmcuIGEgY2xhc3NcbmtsYXJuYS1leHByZXNzLWJ1dHRvbiB7XG4gIHdpZHRoOiAzMDhweDtcbiAgaGVpZ2h0OiA1MHB4O1xuICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG59XG4iXSwic291cmNlUm9vdCI6IiJ9 */
    </style>
     <script src="https://x.klarnacdn.net/express-button/v1/lib.js" data-id="<mid>" data-environment="production" async></script>

</head>
