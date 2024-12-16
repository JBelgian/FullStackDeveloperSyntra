import { Component, OnInit, OnDestroy } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Subscription } from 'rxjs';
import { UsersService } from '../../shared/users.service';
import { Users } from '../../users';

@Component({
  selector: 'app-user',
  standalone: true,
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css'],
  imports: [],
  providers: [UsersService]
})

export class UserComponent implements OnInit, OnDestroy {
  userId: string = '';
  users: Users[] = [];
  private routeSub!: Subscription;

  constructor(private route: ActivatedRoute, private usersService: UsersService) { }

  ngOnInit() {
    this.users = this.usersService.getUsers();
    // Subscribe to parameter changes
    this.routeSub = this.route.params.subscribe(params => {
      this.userId = params['id'];
    });
  }

  ngOnDestroy() {
    // Clean up subscription when component is destroyed
    if (this.routeSub) {
      this.routeSub.unsubscribe();
    }
  }
}