import { Component, effect, inject } from  '@angular/core';
import { CommonModule } from  '@angular/common';
import { FormsModule } from  '@angular/forms';
import { TodoService } from  '../shared/todo.service';
import { Todo } from  '../shared/todo';

@Component({
  selector: 'app-todo-list',
  standalone: true,
  imports: [CommonModule, FormsModule],
  template: `
    <div class="todo-container">
      <h2>Todo List</h2>
      
      <div class="add-todo">
        <input #todoInput
               type="text"
               placeholder="Add new todo"
               (keyup.enter)="addTodo(todoInput.value); todoInput.value = ''">
        <button (click)="addTodo(todoInput.value); todoInput.value = ''">Add</button>
      </div>

      @if (todos().length === 0) {
        <p>No todos yet! Add one above.</p>
      }

      <ul class="todo-list">
        @for (todo of todos(); track todo.id) {
          <li class="todo-item">
            <input
              type="checkbox"
              [checked]="todo.completed"
              (change)="toggleTodo(todo)"
            >
            <span [class.completed]="todo.completed">{{ todo.title }}</span>
            <button (click)="deleteTodo(todo.id)">Delete</button>
          </li>
        }
      </ul>
    </div>
  `,
  styles: [`
    .todo-container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
    }

    .add-todo {
      margin-bottom: 20px;
    }

    .todo-list {
      list-style: none;
      padding: 0;
    }

    .todo-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px;
      border-bottom: 1px solid #eee;
    }

    .completed {
      text-decoration: line-through;
      color: #888;
    }
  `]
})
export class TodoListComponent {
  private todoService = inject(TodoService);
  todos = this.todoService.todos;

  constructor() {
    this.todoService.loadTodos();

    // Example of using effect
    effect(() => {
      console.log('Todos updated:', this.todos());
    });
  }

  addTodo(title: string) {
    if (title.trim()) {
      this.todoService.addTodo(title);
    }
  }

  toggleTodo(todo: Todo) {
    this.todoService.toggleTodo(todo);
  }

  deleteTodo(id: number) {
    this.todoService.deleteTodo(id);
  }
}