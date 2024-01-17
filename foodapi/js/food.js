console.info('js/food.js is loaded.');

let url = 'https://www.themealdb.com/api/json/v1/1/random.php';

async function fetchRandomMeals() {
    const response = await fetch(url);
    const data = await response.json();
    displayFood(data.meals[0]);
}

fetchRandomMeals();

const main =document.querySelector('main');

function displayFood(meals) {
    console.info(meals);
    main.innerHTML = '';

    // Meals Name

    let section = document.createElement('section');
    let h1 =document.createElement('h1');
    h1.innerHTML = meals.strCategory;

    section.appendChild(h1);

  

    //image
    let figure = document.createElement('figure');
    let img =document.createElement('img');
    img.classList.add('image-container');
    img.classList.remove('image-container');
    // let imageUrl = "https://www.themealdb.com/images/media/meals/vpxyqt1511464175.jpg";
    img.src = meals.strMealThumb;
    figure.appendChild(img);

    //ingredients

    let InstructionsSection =document.createElement('section');
    let h2 = document.createElement('h2');
    h2.innerHTML = 'Instructions:';
    let p = document.createElement ('p');
    p.innerHTML = meals.strInstructions;

    InstructionsSection.append(h2,p);





    //ingredients
    let ingredientSection = document.createElement('section');
    ingredientSection.id = 'ingredient';

    let i = 1;
    while(meals['strIngredient' + i] && meals['strIngredient' + i].trim() !== ''){
        console.log(meals['strIngredient'+i]);
        let measure = document.createElement('article');
        measure.innerHTML = meals['strMeasure'+i];
        let ingredient = document.createElement('article');
        ingredient.innerHTML = meals['strIngredient'+i];
        ingredientSection.append(measure, ingredient);
        i++;
    }


      //append multipel child
      main.append(section, figure, InstructionsSection, ingredientSection);

}

let refresh = document.querySelector('#btn a');
refresh.addEventListener('click',(event) =>{
    event.preventDefault();
    console.info(event);
    fetchRandomMeals();
})