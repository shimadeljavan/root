async function addTask(url) {
    const response = await fetch(url);
    const data = await response.json();
    displayData(data);
}

addTask('app/select.php');

function displayData(data) {
    const display = document.querySelector('#task-list');
    display.innerHTML = '';

    let ul = document.createElement('ul');

    data.forEach((task) => {
        let li = document.createElement('li');
        // console.log(task);
        li.id = task.id;
        // Create a span element to hold the task details
        let taskDetails = document.createElement('span');
        taskDetails.innerHTML = `${task.name} have to finish this task ${task.description} until ${task.deadline}`;

        // Create a button element for removing the task
        let removeButton = document.createElement('button');
        removeButton.innerText = 'Done';
        removeButton.addEventListener('click', (event) => {
            console.log(event.target.parentNode.id);
            let url = `app/mark-as-completed.php`;
            markascompeleted(url,event.target.parentNode.id);
            // Remove the <li> element when the button is clicked
            // ul.removeChild(li);
        });

        // Append the task details and the remove button to the <li> element
        li.appendChild(taskDetails);
        li.appendChild(removeButton);

        ul.appendChild(li);
    });

    display.appendChild(ul);
}

const submitButton = document.querySelector('#submit');
submitButton.addEventListener('click', getFormData);

function getFormData(event) {
    event.preventDefault();

    const insertFormData = new FormData(document.querySelector('#task-form'));

    let url = 'app/insert.php';
    Inserter(insertFormData, url);
}

async function Inserter(data, url) {
    const response = await fetch(url, {
        method: "POST",
        body: data
    });
    const confirmation = await response.json();
    console.log(confirmation);


    addTask('app/select.php');
}

async function markascompeleted(url, id) {
    const updateFormData = new FormData();
    updateFormData.append('task_id', id);
    const response = await fetch(url, {
        method: "POST",
        body: updateFormData
    });
    const data = await response.json();
    // displayData(data);
    console.log(data);
    addTask('app/select.php');
}

