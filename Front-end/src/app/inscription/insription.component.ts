/*import { Component } from '@angular/core';

@Component({
  selector: 'app-insription',
  standalone: true,
  imports: [],
  templateUrl: './insription.component.html',
  styleUrl: './insription.component.css'
})
export class InsriptionComponent {

  

}
*/
import { Component } from '@angular/core';
import { AuthService } from '../auth.service';
import { FormsModule } from '@angular/forms'; 
import { HttpClientModule } from '@angular/common/http'; 
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';

@Component({
  standalone:true,
  selector: 'app-insription',

  imports: [FormsModule, HttpClientModule, CommonModule],
  templateUrl: './insription.component.html',
  styleUrl: './insription.component.css'
})
export class InsriptionComponent {
  mail: string = '';
  pwd: string = '';
  theme: string = '';
  name: string = '';
  date_debut:string = '';
  
  

  constructor(private authService: AuthService, private router :Router) {}

  onSubmit() {
    this.authService.addParticipant(this.theme, this.name,this.date_debut, this.pwd,this.mail).subscribe(
      response => { console.log(response.message);
         if( response.message ==="user_added"){
        alert("inscription réussie");

        this.router.navigate(['access'])
      }
      else {
         console.log(response.message);
         if(response.message == "user already exists")
         {
          alert("You already have an account dummy !");
          
         }
         else {
          if(response.message == "failing to find cycle wanted") {
            alert("Désolé, aucun cycle ne  correspond aux critères choisis");


          }
          if(response.message == "user s studying")
          {
          alert(response.message);
          }
          
            
         }
         
      }
        // You can handle redirection or show a success message
      },
      /*error => {
        console.error('Subscription failed:', error);
        // Show an error message to the user
      }
        */
    );
  }

}
