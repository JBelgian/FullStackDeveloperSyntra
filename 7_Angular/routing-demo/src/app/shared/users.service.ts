import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class UsersService {

  constructor() { }

  users = [
    { id:1, name: "John Smith", age: 25 },
    { id:2, name: "Terry Finch", age: 34 }
  ]

  getUsers() {
    return this.users;
  }

  getUserbyId(id: number) {
    return this.users.find(user => user.id === id);
  }
}


