import { Component } from '@angular/core';
import { AuthService } from '../auth.service';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

@Component({
  selector: 'app-modifier-formatteur',
  standalone: true,
  imports: [FormsModule, HttpClientModule, CommonModule],
  templateUrl: './modifier-formatteur.component.html',
  styleUrl: './modifier-formatteur.component.css'
})
export class ModifierFormatteurComponent {
  constructor(private service: AuthService) {}
  nom_formatteur_update: string = '';
  specialite_new: string = '';
  onSubmit() {
    this.service.getFormatteur(this.nom_formatteur_update,this.specialite_new ).subscribe(
    
      response =>
      {
        if (response.status = "succcess" )
          {
            alert(response.message);

           
          }
          else {
            console.log(response.message);
          }
            

      }
    )
    }
  }



