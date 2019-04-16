</div>

<!-- FOOTER-->
<footer class="app-footer">
     © Wastek Services All Rights Reserved. 2019
    
</footer>
<!-- /FOOTER-->
<!-- Bootstrap and necessary plugins -->
<script src="assets/js/libs/jquery.min.js"></script>
<script src="//maps.googleapis.com/maps/api/js"></script>

<script src="assets/js/libs/bootstrap.min.js"></script>

<script src="assets/js/libs/pace.min.js"></script>

<!-- GenesisUI main scripts -->
<script src="assets/js/app.js"></script>

<!-- Plugins and scripts required by this views -->
<script src="assets/js/libs/jquery.dataTables.min.js"></script>
<script src="assets/js/libs/dataTables.bootstrap4.min.js"></script>


<!-- Custom scripts required by this view -->
<script src="assets/js/views/tables.js"></script>

<script src="js/views/main.js"></script>

<script>

// Code goes here

$(document).ready(function() {
  var map = null;
  var myMarker;
  var myLatlng;

  function initializeGMap(lat, lng) {
    myLatlng = new google.maps.LatLng(lat, lng);

    var myOptions = {
      zoom: 12,
      zoomControl: true,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    myMarker = new google.maps.Marker({
      position: myLatlng
    });
    myMarker.setMap(map);
  }

  // Re-init map before show modal
  $('#detailModal<?php echo $row['book_id']; ?>').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    initializeGMap(button.data('lat'), button.data('lng'));
    $("#location-map").css("width", "100%");
    $("#map_canvas").css("width", "100%");
  });

  // Trigger map resize event after modal shown
  $('#detailModal<?php echo $row['book_id']; ?>').on('shown.bs.modal', function() {
    google.maps.event.trigger(map, "resize");
    map.setCenter(myLatlng);
  });
});

</script>





</body>

</html>