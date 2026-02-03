import { Component } from '@angular/core';
import { AuthService } from '../auth.service';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

@Component({
  selector: 'app-modifier',
  standalone: true,
  imports: [FormsModule, HttpClientModule, CommonModule],
  templateUrl: './modifier.component.html',
  styleUrl: './modifier.component.css'
})
export class ModifierComponent {
  constructor(private service: AuthService) {}
  new_theme :  string = '';
  new_date_deb: string = '';
  date_fin: string ='';
  num_salle: string ='';
  nom_formatteur: string='';
  onSubmit() {
    this.service.getCycle(this.new_theme,this.new_date_deb,this.date_fin,this.num_salle, this.nom_formatteur).subscribe(
    
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
