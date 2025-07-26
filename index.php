<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-compatible" content="ie=edge" />
  <link rel="stylesheet" href="styles/main.css" />
  <title>To-Do List</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="container-todo">
      <div class="header-bar">
        <div class="title-group">
          <h2>MY TO DO LIST</h2>
          <img src="assets/checklist.png" />
        </div>
        <form id="todoForm" method="POST">
          <div class="input-row">
            <input  type="text" id="userInput" name="userInput" placeholder="Enter To Do Here" autocomplete="off" />
            <button type="submit" class="addBtn">Add</button>
          </div>
        </form>
        <label id="errorLabel" hidden style="color: red; margin-left: 10px;">You Must Type Something*</label>
      </div>
      <div class="list-container">
        <ul id="todoList">
         
        </ul>
      </div>
      <hr style="margin-top: 20px">

      <span class="clearBtn" onclick="clearList()" style="margin-top: 25px;">Clean List</span>
      <script src="scripts/index.js"></script>
    </div>
  </div>
</body>
</html>