function initMap(){

    //option
    let option = {
        zoom: 10,
        center:{lat: 45.4668844 ,lng: -73.7082077}

    }

 
//new map

    let map = new 
    google.maps.Map(document.getElementById('map'), option);

   //multiple marker
    google.maps.event.addListener(map, 'click', function(event) {
        addMarker({ coords: event.latLng });
    });


/*
    //marker
    let marker = new google.maps.Marker({
        position: { lat: 45.4668844, lng: -73.7082077 },
        map: map,
        icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
    });

    var infoWindow = new google.maps.InfoWindow({
        content:'<h1>Simenes Campany</h1>'
    });

    marker.addListener('click', function(){
        infoWindow.open(map, marker);
    });

//    addMarker:({lat:45.5220455,lng:-73.5678777}),


//     function addMarker(coords){
//         let marker = new google.maps.Marker({
//             position:coords,
//             map:map,
//         });

//     }*/


//marker

addMarker({
    coords:{lat:45.5220455,lng:-73.5678777},
    iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
    content:'<h1>Home</h1>'
});
addMarker({
    coords:{lat:45.4912867,lng:-73.4109518},
    content:'<h1>Work</h1>'
});
addMarker({
    coords:{lat: 45.4668844 ,lng: -73.7082077},
    content:'<h1>My  Firends</h1>'});



//add marker

function addMarker(props){
    let marker = new google.maps.Marker({
        position: props.coords,
        map: map,
        //icon: props.iconImage
    });

    if(props.iconImage){
        marker.setIcon(props.iconImage);
    }

    if(props.content){
        var infoWindow = new google.maps.InfoWindow({
            content:props.content
        });
    
        marker.addListener('click', function(){
            infoWindow.open(map, marker);
        });
    
    }
}

}

