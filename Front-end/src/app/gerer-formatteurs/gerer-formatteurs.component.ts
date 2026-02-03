import { Component } from '@angular/core';
import { AuthService } from '../auth.service';
import { FormsModule } from '@angular/forms'; 
import { HttpClientModule } from '@angular/common/http'; 
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';
import { Action } from 'rxjs/internal/scheduler/Action';

@Component({
  selector: 'app-gerer-formatteurs',
  standalone: true,
  imports: [FormsModule, HttpClientModule, CommonModule],
  templateUrl: './gerer-formatteurs.component.html',
  styleUrl: './gerer-formatteurs.component.css'
})
export class GererFormatteursComponent {
  nom_formatteur: string = '';
  specialite: string = '';
  action: string = '';


  /*this.add = add.addeventListener('click()'-> fAdd());
  this.delete = del.addeventListener("click"()=> fDelete());
  */
  constructor(private auth: AuthService, private router :Router) {}
  setAction(action: string) {
    this.action = action;
  }
  onSubmit( ) {
    
    if (this.action === 'add')
    { 
      alert("vous avez choisi d'ajouter un formatteur ....");
      this.auth.add_formatteur(this.nom_formatteur, this.specialite).subscribe(
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
      { alert("vous avez choisi de supprimer un formatteur ....");
        this.auth.delete_formatteur(this.nom_formatteur, this.specialite).subscribe(
          response => { if((response.status === "fail" && response.message === "can't delete something that doesn't exist, dummy !") || (response.status = "succcess" ))
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
    if (this.action === 'modifier')
      {
      alert("vous avez choisi de modifier un formatteur ....");
    this.auth.modif_formatteur(this.nom_formatteur,this.specialite).subscribe (
      response => {
        if((response.status === "fail" && response.message === "formatteur inexistant") || (response.status === "succcess" ))
        {
          alert(response.message);
        }
        else {
          console.log(response.message);
         
    this.router.navigate(['modifier_form'], {
      queryParams: {
        nom_formatteur: this.nom_formatteur,
        specialite: this.specialite
      }
    }
  )
}
      })
    }
    else {
      console.log("no action set , check your code .");
    }
  
  } }
  }

    
    
    /*this.auth.modif_formatteur(this.nom_formatteur, this.specialite);
    this.router.navigate(['modifier_form']);
    */
   
  }
    
    
  



