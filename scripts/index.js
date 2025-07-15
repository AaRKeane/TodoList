
const userInput = document.getElementById("todoContent");
const container = document.querySelector(".list-container");
const ul = document.getElementById("todoList");

let todos = JSON.parse(localStorage.getItem("todos")) || [];

function createTodo() {
  const inputValue = userInput.value;
  if (userInput.value === "") {
    document.getElementById("errorLabel").hidden = false;
    return;
  }
  document.getElementById("errorLabel").hidden = true;

  todos.push(inputValue);
  localStorage.setItem("todos", JSON.stringify(todos));
  displayList(inputValue);
  userInput.value = "";
}

function displayList(myTodo) {
  const li = document.createElement("li");
  li.className = "todo-item";

  const checkIcon = document.createElement("span");
  checkIcon.className = "check-icon";
  checkIcon.innerHTML = "◯";

  const text = document.createElement("span");
  text.className = "todo-text";
  text.textContent = myTodo;

  const deleteIcon = document.createElement("span");
  deleteIcon.className = "delete-icon";
  deleteIcon.innerHTML = "\u00d7"; //delete icon unicode

  li.addEventListener("click", (e) => {
    if (e.target === deleteIcon) {
      return;
    }

    li.classList.toggle("checked");
    if (li.classList.contains("checked")) {
      checkIcon.innerHTML = "✔";
    } else {
      checkIcon.innerHTML = "◯";
    }
  });

  deleteIcon.addEventListener("click", () => {
    li.remove();
    todos = todos.filter((t) => t !== myTodo);
    console.log("Current todos array:", todos);
  });
  li.appendChild(checkIcon);
    li.appendChild(text);
  li.appendChild(deleteIcon);

  ul.append(li);
}

window.addEventListener("DOMContentLoaded", () => {
  userInput.value = "";
  for (i = 0; i < todos.length; i++) {
    const todo = todos[i];
    displayList(todos[i]);
  }
});

function clearStorage() {
  localStorage.clear();
  location.reload();
}
