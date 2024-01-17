
console.log('js/weatherapi.js is loaded');

 const main = document.querySelector('main');
 const weatherImage = document.querySelector(".weather-icon");


function displayWeather(data) {
    document.querySelector(".city").innerHTML = data.name;
    document.querySelector(".min-temp").innerHTML ="Min :" + data.main.temp_min + "C°";
    document.querySelector(".temp").innerHTML = Math.round(data.main.temp) + "C°";
    document.querySelector(".max-temp").innerHTML = "Max :" +  data.main.temp_max+ "C°";
    document.querySelector(".humidity").innerHTML = data.main.humidity + "%";
    document.querySelector(".wind").innerHTML = data.wind.speed + " km/h";



    if (data.weather[0].main == "Clouds") {
        weatherImage.src = "./images/clouds.png";
    } else if (data.weather[0].main == "Clear") {
        weatherImage.src = "./images/clear-sky.png";
    } else if (data.weather[0].main == "Rain") {
        weatherImage.src = "./images/heavy-rain.png";
    } else if (data.weather[0].main == "Drizzle") {
        weatherImage.src = "./images/drizzle.png";
    } else if (data.weather[0].main == "Mist") {
        weatherImage.src = "./images/foggy.png";
    }


}

async function getWeather(url) {
    const response = await fetch(url);
    const data = await response.json();
    displayWeather(data);
}

function getPosition() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                console.log(position.coords.latitude, position.coords.longitude);
                showPosition(position);
            },
            (err) => {
                displayError(err.message);
                let url = "https://api.openweathermap.org/data/2.5/weather?lat=45.4912867&lon=-73.4109464&appid=85d80712d46919d8f9751f5ac5a4d7c0&units=metric";
                getWeather(url);
            }
        );
    } else {
        displayError("Geolocation is not supported by your browser");
    }
}

function showPosition(position) {
    console.info(position.coords.latitude, position.coords.longitude);
    let url = `https://api.openweathermap.org/data/2.5/weather?lat=${position.coords.latitude}&lon=${position.coords.longitude}&appid=85d80712d46919d8f9751f5ac5a4d7c0&units=metric`;
    getWeather(url);
}

function displayError(error) {
    let section = document.createElement('section');
    let h3 = document.createElement('h3');
    h3.innerHTML = error;
    section.appendChild(h3);
    main.appendChild(section); 
}

getPosition();




