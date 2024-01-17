console.info('spa.js loaded');

let siemens = { lat: 45.4957708, lng: -73.7416575 };
let map;

function initMap() {
    map = new google.maps.Map(document.querySelector('#simple-map'), {
        center: LYBER-T,
        zoom: 16,
    });

    let marker = new google.maps.Marker({
        position: LYBER-T,
        map: map,
        title: 'SIMENS company',
        label: 'SIMENS'
    });
}

// let map;

// async function initMap() {
//   const { Map } = await google.maps.importLibrary("maps");

//   map = new Map(document.getElementById("map"), {
//     center: { lat: 45.4953568, lng: -73.740815 },
//     zoom: 8,
//   });
// }

// initMap();