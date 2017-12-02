/**
 * Allows you to get address from gmap click and fill input
 *
 *
 * @author Rolando <rgarro@gmail.com>
 */
var addressClickMap = (function(){

  function addressClickMap(){
    this.mapContainer = "map-canvas";
    this.destInput = "#addrNameInput";
    this.map = {};
  }

  addressClickMap.prototype = Object.create(CRFut.FacturasCR.prototype);
  addressClickMap.prototype.constructor = addressClickMap;

  addressClickMap.prototype.display = function(){
    var myLatlng = new google.maps.LatLng(9.9412516,-84.0859219);
    var myOptions = {
      zoom: 15,
      center: myLatlng
    }
    this.map = new google.maps.Map(document.getElementById(this.mapContainer), myOptions);
    var geocoder = new google.maps.Geocoder();
    google.maps.event.addListener(this.map, 'click', function(event) {
      geocoder.geocode({'latLng': event.latLng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $("#addrNameInput").val(results[0].formatted_address)
          }
        }
    });
    });
  }

  return addressClickMap;
})();

CRFut.Widgets.addressClickMap = addressClickMap;
