console.info('geolocation.js loaded');

const locationInfo = document.querySelector('#location-info');

function getLocation() {
  navigator.geolocation.getCurrentPosition(function(position) {
    locationInfo.innerHTML = `You appear to be at: ${position.coords.latitude}, ${position.coords.longitude}`;
    const pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    initMap(pos);
  });
}

function initMap(location) {
  map = new google.maps.Map(document.querySelector('#location-map'), {
    center: location,
    zoom: 16
  });

  const marker = new google.maps.Marker({
    position: location,
    map: map,
    title: 'You are here.',
    label: 'Here you are!'
  });
}

getLocation();




// function initMap(location) {
//     map = new google.maps.Map(document.querySelector('#location-map'), {
//         center: location,
//         zoom: 16
//     });
//     let marker = new google.maps.Marker({
//         position:location,
//         map: map,
//         title: 'You are here',
//         label: 'here you are!',
//     })
// }


//  getLocation();
  
