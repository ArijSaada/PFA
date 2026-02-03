/*import { Component } from '@angular/core';

@Component({
  selector: 'app-gerercycle',
  standalone: true,
  imports: [],
  templateUrl: './gerercycle.component.html',
  styleUrl: './gerercycle.component.css'
})
export class GerercycleComponent {


}
*/
import { Component } from '@angular/core';
import { AuthService } from '../auth.service';
import { FormsModule } from '@angular/forms'; 
import { HttpClientModule } from '@angular/common/http'; 
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';
import { Action } from 'rxjs/internal/scheduler/Action';

@Component({
  selector: 'app-gerercycle',
  standalone: true,
  imports: [FormsModule, HttpClientModule, CommonModule],
   templateUrl: './gerercycle.component.html',
  styleUrl: './gerercycle.component.css'
})
export class GerercycleComponent {
  
  action: string = '';
theme: string = '';
date_deb: string = '';
date_fin: string = '';
form: string = '';
num_salle: string ='';


  /*this.add = add.addeventListener('click()'-> fAdd());
  this.delete = del.addeventListener("click"()=> fDelete());
  */
  constructor(private auth: AuthService, private router :Router) {}
  setAction(action: string) {
    this.action = action;
  }
  onSubmit( ) {
    console.log(`Action set to: ${this.action}`);
    
    if (this.action === 'add')
    { 
      alert("vous avez choisi d'ajouter un cycle ....");
      this.auth.Ajoutercycle(this.theme, this.date_deb,this.date_fin,this.form,this.num_salle).subscribe(
        response => { if(response.status === "loading ...."){
          console.log(response.status);
          alert(response.message);



    }
  else {
    alert(response.status);
    alert(response.message);
    
  }})}

    else {
      if(this.action === 'delete')
      { alert("vous avez choisi de supprimer un cycle ....");
        this.auth.supprimerCycle(this.theme, this.date_deb).subscribe(
          response => {  if((response.status === "fail" && response.message === "can't delete something that doesn't exist, dummy !") || (response.status = "succcess" ))
            {
              alert(response.message);
  
             
            }
            else {
              console.log(response.message);
            }

           }

        )
      }
    
  
      else {
         if (this.action === 'modifer')
      {
        alert("vous avez choisi de modifier un cycle ....");
      this.auth.modif_cycle(this.theme,this.date_deb).subscribe (
        response => {
          if((response.status === "fail" && response.message === "cycle inexistant") || (response.status === "succcess" ))
          {
            alert(response.message);
          }
          else {
            
            console.log(response.message);
           
      this.router.navigate(['modifier'], {
        queryParams: {
          date_deb: this.date_deb,
          theme: this.theme
        }
      }
    )
  }
        })
        
      }
      else {
        console.log("action not set, check your code .");
      }
    
    
  }
  
}
  }

}
