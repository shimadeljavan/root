console.info('direction.js.js loaded');

const locationInfo = document.querySelector('#direction-info');
const directionsElement = document.querySelector('#location-map');
const directionButton = document.querySelector('#get-direction');
directionButton.addEventListener('click', getLocation);
let directionService;
let directionDisplay;
let directionMap;

function getLocation() {
  navigator.geolocation.getCurrentPosition(function(position) {
    locationInfo.innerHTML = `You appear to be at: ${position.coords.latitude}, ${position.coords.longitude}`;
    const pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    initMap(pos);
  });
}

function initMap(location) {
  directionMap = new google.maps.Map(document.querySelector('#location-map'), {
    center: location,
    zoom: 16
  });

  directionService = new google.maps.DirectionsService();
  directionDisplay = new google.maps.DirectionsRenderer();
  directionDisplay.setMap(directionMap);

  let destination = new google.maps.LatLng(45.4794883,-73.7082077);
  calcRoute(location, destination);
}

function calcRoute(start, destination) {
  let request = {
    origin: start,
    destination: destination,
    travelMode: google.maps.TravelMode.DRIVING
  };

  directionService.route(request, function(response, status) {
    if (status === 'OK') {
      directionDisplay.setDirections(response);
      let starter = new google.maps.Marker({
        position: start,
        map: directionMap,
        label: 'You are here'
      });
      const marker = new google.maps.Marker({
        position: destination,
        map: directionMap,
        label: 'Siemens Company'
      });
    }
  });
}




