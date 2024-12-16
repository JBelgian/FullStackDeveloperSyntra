import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

interface Task {
  id: number;
  title: string;
  completed: boolean;
  priority?: 'low' | 'medium' | 'high';
  category?: 'work' | 'personal' | 'shopping' | 'health';
  dueDate: Date ;
}

// ? makes an attribute optional

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [FormsModule, CommonModule],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  newTaskTitle: string = '';
  selectedPriority: 'low' | 'medium' | 'high' = 'medium'; // : 'low' | 'medium' | 'high'` is a union type that means: the attribute can only have one of these 3 values!
  selectedCategory: 'work' | 'personal' | 'shopping' | 'health' = 'work';
  selectedDueDate: Date = new Date();
  

  tasks: Task[] = [
    { id: 1, title: 'Learn Angular 19', completed: false, priority: 'high', category: 'work', dueDate: new Date(2025, 5, 26) },
    { id: 2, title: 'Buy xmas presents', completed: true, priority: 'medium', category: 'shopping', dueDate: new Date(2024, 11, 9) },
    { id: 3, title: 'Go on holiday', completed: false, priority: 'high', category: 'personal', dueDate: new Date(2024, 11, 12) },
    { id: 4, title: 'Finish assignment', completed: false, priority: 'low', category: 'health', dueDate: new Date(2024, 11, 11) },
  ];

  ngOnInit(): void {
    this.tasks.sort((a, b) => a.dueDate.getTime() - b.dueDate.getTime());
  }

  isOverdue(dueDate: Date): boolean {
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    return dueDate < today;
  }

  addTask() {
    if (this.newTaskTitle.trim()) {
      const newTask: Task = {
        id: this.tasks.length + 1,
        title: this.newTaskTitle,
        completed: false,
        priority: this.selectedPriority,
        category: this.selectedCategory,
        dueDate: this.selectedDueDate
      };
      this.tasks.push(newTask);
      this.newTaskTitle = ''; // Reset input
    }
  }

  toggleTask(task: Task) {
    console.log(task);
    console.log('Before:', task.completed);  // e.g., false
    task.completed = !task.completed;
    console.log('After:', task.completed);  // e.g., true
  }

// Various getters
  get incompleteTasks() {
    return this.tasks.filter(task => !task.completed).length;
  }

  get completedTasks() {
    return this.tasks.filter(task => task.completed).length;
  }

  get progress() {
    return (this.completedTasks / this.tasks.length) * 100;
  }

  
}