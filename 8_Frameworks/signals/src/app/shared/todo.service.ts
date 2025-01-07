import { Injectable, signal } from '@angular/core';
import { Todo } from '../shared/todo';

@Injectable({
  providedIn: 'root'
})
export class TodoService {
  private apiUrl = 'http://localhost:3000/todos';
  todos = signal<Todo[]>([]);

  constructor() {}

  async loadTodos() {
    const response = await fetch(this.apiUrl);
    const todos = await response.json();
    if (todos) {
      this.todos.set(todos);
    }
  }

  async addTodo(title: string) {
    const newTodo = {
      title,
      completed: false
    };

    const response = await fetch(this.apiUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(newTodo)
    });
    const todo = await response.json();
    if (todo) {
      this.todos.update(todos => [...todos, todo]);
    }
  }

  async toggleTodo(todo: Todo) {
    const updatedTodo = { ...todo, completed: !todo.completed };
    
    const response = await fetch(`${this.apiUrl}/${todo.id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(updatedTodo)
    });
    const result = await response.json();
    if (result) {
      this.todos.update(todos =>
        todos.map(t => t.id === todo.id ? updatedTodo : t)
      );
    }
  }

  async deleteTodo(id: number) {
    await fetch(`${this.apiUrl}/${id}`, {
      method: 'DELETE'
    });
    this.todos.update(todos => todos.filter(t => t.id !== id));
  }
}