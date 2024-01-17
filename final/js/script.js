const submitform = document.querySelector("#task-form");

async function Inserter(data, url) {
  const response = await fetch(url, {
    method: "POST",
    body: data,
  });
  const confirmation = await response.json();
  console.log(confirmation[0]["message"]);
  if (confirmation[0]["message"] === "Add todo success") {
    window.location.href = "./showLists.html";
  }
}

submitform.addEventListener("submit", function (e) {
  e.preventDefault();
  const formData = new FormData(submitform);
  formData.append("completed", 0);
  const url = "app/insert.php";
  Inserter(formData, url);
});

const checkbox = document.getElementById("checkbox")
checkbox.addEventListener("change", () => {
  document.body.classList.toggle("dark")
})