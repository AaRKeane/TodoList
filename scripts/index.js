$(document).ready(function () {
  fetchTodos();

  $("#todoForm").submit(function (e) {
    e.preventDefault();

    const task = $("#userInput").val().trim();

    if (task !== "" && task !== null) {
      $("#errorLabel").attr("hidden", true);
      $.ajax({
        type: "POST",
        url: "includes/addTodo-inc.php",
        data: { task: task },
        success: function () {
          $("#userInput").val("");
          fetchTodos();
        },
        error: function (err) {
          alert("Failed to add task.");
          console.error("Add Failed: ", err);
        },
      });
    } else {
      $("#errorLabel").removeAttr("hidden");
      return;
    }
  });

  function fetchTodos() {
    $.ajax({
      type: "GET",
      url: "includes/getTodo-inc.php",
      dataType: "json",
      success: function (results) {
        const dataList = $("#todoList");
        dataList.empty();

        if (!results || results.length === 0) {
          const li = $('<li class="no-task" style="justify-content: center; font-size: 3rem;">Nothing TO DO..</li>');
          dataList.append(li);
          return;
        }

        results.forEach((row) => {
          const isChecked = row.task_status === "finished";

          const li = $(`
            <li class="todo-item ${isChecked ? "checked" : ""}" data-id="${
            row.task_id
          }">
              <div class="toggle-area" style="display: flex; align-items: center; gap: 10px; flex-grow: 1; cursor: pointer;">
                <span class="check-icon">${isChecked ? "✔" : "◯"}</span>
                <span class="todo-text">${row.task_todo}</span>
              </div>
              <span class="delete-icon" style="margin-left:auto; cursor:pointer;">\u00d7</span> 
            </li>
          `);

          li.find(".toggle-area").click(function () {
            const newStatus =
              row.task_status === "finished" ? "unfinished" : "finished";
            toggleTodoState(row.task_id, newStatus);
          });

          li.find(".delete-icon").click(function (e) {
            e.stopPropagation();
            if (confirm("Are you sure you want to delete this To-Do?")) {
              deleteTodo(row.task_id);
            }
          });

          dataList.append(li);
        });
      },
      error: function (err) {
        alert("Failed to Retrieve tasks.");
        console.error("Fetch Failed: ", err);
      },
    });
  }

  function toggleTodoState(id, newStatus) {
    $.ajax({
      type: "POST",
      url: "includes/updateTodo-inc.php",
      data: {
        task_id: id,
        task_status: newStatus,
      },
      success: function () {
        fetchTodos();
      },
      error: function (err) {
        alert("Update Failed:");
        console.error(err);
      },
    });
  }

  function deleteTodo(id) {
    $.ajax({
      type: "POST",
      url: "includes/deactivateOneTodo-inc.php",
      data: { taskID: id },
      success: function () {
        fetchTodos();
      },
      error: function (err) {
        alert("Deletion Failed!!");
        console.error(err);
      },
    });
  }

  window.clearList = function () {
    if (confirm("Clear All To-Do's?")) {
      $.ajax({
        type: "POST",
        url: "includes/deactivateAll-inc.php",
        data: { clear: true },
        success: function () {
          fetchTodos();
        },
        error: function () {
          alert("Failed to Clear List!");
        },
      });
    }
  };
});
