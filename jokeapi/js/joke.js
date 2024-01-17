// console.info('js/joke.js is loaded.');

// const jokeEl = document.getElementById('joke'); 
// const getJokeBtn = document.getElementById('get_joke'); 

// getJokeBtn.addEventListener('click', generateJoke);

// generateJoke(); // Fixed function name

// async function generateJoke() {
//   try {
//     const jokeRes = await fetch('https://icanhazdadjoke.com/', {
//       headers: {
//         Accept: 'application/json', 
//       },
//     });

//     const jokeData = await jokeRes.json();
//     console.log(jokeData);
//     jokeEl.innerHTML = jokeData.joke;
//   } catch (error) {
//     console.error('Error fetching joke:', error);
//   }
// }

console.info('js/joke.js is loaded.');

const jokeEl = document.getElementById('joke');
const getJokeBtn = document.getElementById('get_joke');

getJokeBtn.addEventListener('click', generateJoke);

generateJoke();

async function generateJoke() {
  try {
    const url = 'https://icanhazdadjoke.com/';
    const jokeRes = await fetch(url, {
      headers: {
        Accept: 'application/json',
      },
    });

    const jokeData = await jokeRes.json();
    console.log(jokeData);
    jokeEl.innerHTML = jokeData.joke;
  } catch (error) {
    console.error('Error fetching joke:', error);
  }
}