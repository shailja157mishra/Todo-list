// Function to create a task row
function createTaskRow(task) {
  const { id, title, date, completed } = task;

  // Create a new task row
  const taskRow = document.createElement("tr");

  // Create the checkbox cell
  const checkboxCell = document.createElement("td");
  const checkbox = document.createElement("input");
  checkbox.type = "checkbox";
  checkbox.checked = completed;
  checkbox.addEventListener("change", function () {
    // Update the task completion status
    task.completed = this.checked;
    updateTask(task);
    taskRow.classList.toggle("completed", this.checked);
  });
  checkboxCell.appendChild(checkbox);

  // Create the task ID cell
  const taskIdCell = document.createElement("td");
  taskIdCell.textContent = id;

  // Create the task title cell
  const taskTitleCell = document.createElement("td");
  taskTitleCell.textContent = title;

  // Create the task date cell
  const taskDateCell = document.createElement("td");
  taskDateCell.textContent = date;

  // Append the cells to the row
  taskRow.appendChild(checkboxCell);
  taskRow.appendChild(taskIdCell);
  taskRow.appendChild(taskTitleCell);
  taskRow.appendChild(taskDateCell);

  // Add the completed class if the task is completed
  if (completed) {
    taskRow.classList.add("completed");
  }

  return taskRow;
}
