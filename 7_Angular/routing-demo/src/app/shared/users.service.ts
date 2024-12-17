import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class UsersService {

  constructor() { }

  url = 'http://localhost:3000/users';

  getUsers(): Promise<any> {
    return fetch(this.url)
      .then(res => res.json())
      .catch(e => console.log(e));
  }

  getUserById(id: number): Promise<any> {
    return fetch(`${this.url}/${id}`)
      .then(res => res.json())
      .catch(e => console.log(e));
  }
}


