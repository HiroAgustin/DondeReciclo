<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html class="no-js iem7"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>DondeReciclo</title>
  <meta name="description" content="">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="cleartype" content="on">

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/touch/apple-touch-icon-144x144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/touch/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/touch/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/touch/apple-touch-icon-57x57-precomposed.png">
  <link rel="shortcut icon" href="img/touch/apple-touch-icon.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="img/touch/apple-touch-icon-144x144-precomposed.png">
  <meta name="msapplication-TileColor" content="#222222">

  <!-- For iOS web apps -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="">

  <!-- This script prevents links from opening in Mobile Safari. https://gist.github.com/1042026 -->
  <!--
  <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>
  -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="js/modernizr-2.2.6.min.js"></script>
</head>
<body>
  <header class="header">
    <h1>DóndeReciclo</h1>
  </header>
  <div id="map" class="map" role="main">
    <noscript>
      Necesitas tener JavaScript habilitado en tu navegador.
    </noscript>
  </div>
  <footer class="footer">
    <ul id='controls' class="nav clearfix">
      <li>
        <button class="btn" data-is-active="true" data-type="PILAS">
          <!-- <img class="icon" src="img/icon-pila.png" alt="Pila"> -->
          Pilas
        </button>
      </li>
      <li>
        <button class="btn" data-is-active="true" data-type="LATA">
          <!-- <i class="icon icon-lata"></i> -->
          Latas
        </button>
      </li>
      <li>
        <button class="btn" data-is-active="true" data-type="VIDRIO">
          <!-- <i class="icon icon-vidrio"></i> -->
          Vidrio
        </button>
      </li>
      <li>
        <button class="btn" data-is-active="true" data-type="PLASTICO">
          <!-- <i class="icon icon-plastico"></i> -->
          Plástico
        </button>
      </li>
    </ul>
  </footer>
  <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
  <script src="js/underscore-1.4.4.js"></script>
  <script src="js/donde.js"></script>
  <!--
  <script src="js/helper.js"></script>
  <script>
    MBP.scaleFix();
    MBP.startupImage();
  </script>
  -->
  <script>
    var app = new Donde({
      zoom: 16
    , markers: (<?php include 'residuos.json' ?>).features
    , errorMessage: 'No sabemos dónde estas :('
    , defaultLocation: {
        latitude: -34.8937720817105
      , longitude: -56.1659574508667
      }
    , icons: {
        LATA: 'img/marker-lata.png'
      , PILAS: 'img/marker-pila.png'
      , VIDRIO: 'img/marker-vidrio.png'
      , PLASTICO: 'img/marker-plastico.png'
      }
    , mapping: {
        type: function (item)
        {
          return item.properties.TIPO_RESID;
        }
      , latitude: function (item)
        {
          return item.geometry.coordinates[1];
        }
      , longitude: function (item)
        {
          return item.geometry.coordinates[0];
        }
      }
    });

    app.listen(document.getElementById('controls'));

    app.init();

    // var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]];
    // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    // g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    // s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>
</body>
</html>