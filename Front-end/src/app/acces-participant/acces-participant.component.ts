import { Component } from '@angular/core';
import { AuthService } from '../auth.service';
import { FormsModule } from '@angular/forms'; 
import { HttpClientModule } from '@angular/common/http'; 
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router'; // Import Router for navigation

@Component({
  standalone: true,
  selector: 'app-acces-participant',
  templateUrl: './acces-participant.component.html',
  styleUrls: ['./acces-participant.component.css'],
  imports: [FormsModule, HttpClientModule, CommonModule]
})
export class AccesParticipantComponent {
  mail: string = '';
  password: string = '';

  constructor(private authService: AuthService, private router: Router) {} // Inject Router

  onSubmit() {
    // Step 1: Log in the participant
    this.authService.login(this.mail, this.password, 'participant').subscribe(
      response => {
        if (response.status === 'success') {
          console.log('Login success:', response.message);
          alert("Welcome back, participant!");

          // Step 2: Fetch the cycle data after successful login
          this.authService.getStoredcycle().subscribe(response=> {
            if (response.status === 'success') {
              console.log('Cycle data fetched successfully:', response.data);

              // Optionally navigate to another route if needed
              this.router.navigate(['cycle']);
              //console.log(response); // Navigate to the cycle page
            } else {
              console.log(response);
              alert('Failed to fetch cycle data');
            }
          });
        } else {
          alert('Incorrect email or password');
        }
      },
      error => {
        console.log('Login failed:', error);
        // Show an error message to the user
        alert('Login failed, please try again.');
      }
    );
  }
}
