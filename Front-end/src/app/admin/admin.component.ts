import { Component } from '@angular/core';
import { AuthService } from '../auth.service';
import { FormsModule } from '@angular/forms'; 
import { HttpClientModule } from '@angular/common/http'; 
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';

@Component({
  standalone:true,
  selector: 'app-admin',

  imports: [FormsModule, HttpClientModule, CommonModule],
  templateUrl: './admin.component.html',
  styleUrl: './admin.component.css'
})
export class AdminComponent {
  mail: string = '';
  pwd: string = '';
  

  constructor(private authService: AuthService, private router :Router) {}

  onSubmit() {
    this.authService.login(this.mail, this.pwd, 'admin').subscribe(
      response => { if(response.status === 'success'){
        console.log('Login success:', response);
        this.router.navigate(['control'])
      }
      else {
         alert('mail ou mot de passe erroné') 
      }
        // You can handle redirection or show a success message
      },
      error => {
        console.error('Login failed:', error);
        // Show an error message to the user
      }
    );
  }

}
