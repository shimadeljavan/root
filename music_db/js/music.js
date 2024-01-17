async function fetchFavourites(url){
    const response = await fetch(url);
    const data = await response.json();
    displayData(data);
    //console.log(data);
}

fetchFavourites('app/select.php');

function displayData(data){

    //baraye inke date haye database binim to safe in bakhsho neveshtim
    //toye HTML ye div ba id display dorost kardim ke onja neshon bede.
    const display = document.querySelector('#display');
    //refresh kardan
    display.innerHTML = '';

    //list baraye namayesh
    let ul = document.createElement('ul');

    data.forEach((user)=>{
        //hala toye loop foreach tak tak neshon bede
        let li = document.createElement('li');
        li.innerHTML = `${user.name} likes to listen to ${user.musicvideo}.`;
        ul.appendChild(li);
    })
//bayae namash dadan roye safhe bayad ino ezafe konim
    display.appendChild(ul);

}


//baraye button ino minevisim ke datahaye vared shode ro befste to DATABASE

const submitButton = document.querySelector('#submit');
submitButton.addEventListener('click', getFormatData);

function getFormatData(event){
    event.preventDefault();


    //dadehate az data begirim az async function
    const insertFormData = new FormData(document.querySelector('#insert-form'));
    
    let url = 'app/insert_v2.php';
    Inserter(insertFormData, url);
}

async function Inserter(data, url){
    const response = await fetch(url, {
        method: "POST",
        body: data
    });
    const confirmation = await response.json();
    console.log(confirmation);
//refresh page 
    fetchFavourites('app/select.php');
}