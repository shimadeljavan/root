console.log('js/weatherapi.js is loaded')



url ="https://api.openweathermap.org/data/2.5/weather?lat=45.4912867&lon=-73.4109464&appid=85d80712d46919d8f9751f5ac5a4d7c0&units=metric"

async function getWeather(url){ //url
    const response = await fetch(url);
    const data = await response.json();
    displayWeather(data);
}

//getWeather(); //comment

const main = document.querySelector('main');

const tempArray =["temp_min","temp","temp_max"];
const tempLabels =["min","temp","max"];


function displayWeather(data){
    console.log(data);
    // console.log(data.main.temp)
    // console.log(data.weather[0].main, data.weather[0].description);

    let section = document.createElement('section');
    section.classList.add('city');
    section.id='location';
    let h3 =document.createElement('h3');
    h3.innerHTML = data.name;

    section.appendChild(h3);
    main.appendChild(section);

    let mainWeather = data.main;
    console.log(mainWeather);

    for(i=0; i<tempArray.length;i++){
      //  console.log(tempArray[i]);
        let div = document.createElement('div');
        div.innerHTML = tempArray[i] +": "+ mainWeather[tempArray[i]];
        main.appendChild(div);
    }

  section.classList.add('humidity');


  let h2 = document.createElement('h2');
  h2.innerHTML = `Humidity: ${data.main.humidity}%`;


  section.appendChild(h2);


  main.appendChild(section);


  



}




function getPosition(){
    navigator.geolocation.getCurrentPosition(showPosition);
}



function getPosition(){
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition((position) => {
            console.log(position.coords.latitude, position.coords.longitude)
            navigator.geolocation.getCurrentPosition(showPosition);
        },
        (err) =>{
            displayError(err.message);
            let url = `https://api.openweathermap.org/data/2.5/weather?lat=45.4912867&lon=-73.4109464&appid=85d80712d46919d8f9751f5ac5a4d7c0&units=metric`;

            getWeather(url);
        })
     } else{
            displayError("Geolocation is not support by yoour browser")
        }
    }




function showPosition(position){
    //console.info(position);
    //console.info(position.coords);
    console.info(position.coords.latitude, position.coords. longitude);
    let url = `https://api.openweathermap.org/data/2.5/weather?lat=${position.coords.latitude}&lon=${position.coords.longitude}&appid=85d80712d46919d8f9751f5ac5a4d7c0&units=metric`;
   
    getWeather(url);
}

getPosition();


function displayError (error){
    let section = document.createElement('section');
    let h3 = document.createElement('h3');
    h3.innerHTML = error;


    section.appendChild(h3);
    main.appendChild(appendChild);
}