<!doctype html>
  <meta charset="UTF-8">
  <title>donde.js Example 3</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="map" class="map"></div>
  <script src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>
  <script src="vendor/underscore-1.4.4.js"></script>
  <script src="../donde.js"></script>
  <script>
    var donde = new Donde({
      icons: {
        Chupi: 'img/marker-1.png'
      , Baile: 'img/marker-2.png'
      , Morfi: 'img/marker-3.png'
      }
    }).init();

    donde.searchPlace({
      query: 'zonamerica'
      , radius: 10000
      , icon: 'img/marker-3.png'
    });
  </script>
</body>
</html>