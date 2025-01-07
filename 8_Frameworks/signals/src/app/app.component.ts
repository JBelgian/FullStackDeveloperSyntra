import { Component } from  '@angular/core';
import { CommonModule } from  '@angular/common';
import { TodoListComponent } from  './todo-list/todo-list.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, TodoListComponent],
  template: `
    <div class="app-container">
      <h1>Angular 19 Todos</h1>
      <app-todo-list />
    </div>
  `,
  styles: [`
    .app-container {
      padding: 20px;
    }
  `]
})
export class AppComponent {}