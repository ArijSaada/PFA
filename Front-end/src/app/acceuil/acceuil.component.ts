/*import { Component } from '@angular/core';

@Component({
  selector: 'app-acceuil',
  standalone: true,
  imports: [],
  templateUrl: './acceuil.component.html',
  styleUrl: './acceuil.component.css'
})
export class AcceuilComponent {


}*/
/*import { Component, Inject, OnInit, PLATFORM_ID, AfterViewInit } from '@angular/core';
import { AppComponent } from "../app.component";
import { Router } from '@angular/router';
import { isPlatformBrowser } from '@angular/common';

@Component({
  selector: 'app-acceuil',
  standalone: true,
  imports: [AppComponent],
  templateUrl: './acceuil.component.html',
  styleUrls: ['./acceuil.component.css']
})
export class AcceuilComponent implements OnInit, AfterViewInit {
  router: any;
  //router: any;
  constructor(@Inject(PLATFORM_ID) private platformId: Object,router: Router) {}

  ngOnInit(): void {
   
  }

  ngAfterViewInit(): void {
   
    if (isPlatformBrowser(this.platformId)) {
    
  
 const  x = document.querySelectorAll("button");
  if(x.length == 4) {alert("bouton success")};
  x.forEach(button => { 
    const txt = button.textContent?.trim();
   if (txt  ==="S'inscrire")
  {
   button.addEventListener ("click", () => this.router.navigate(['inscription']))
  }
  else {
   if (txt === "Déjà Participant ?" )
  {
   button.addEventListener ("click", () => this.router.navigate(['inscription']));

  }
  else {
  if (txt === "Connection" )
  {
   button.addEventListener ("click", () => this.router.navigate(['access']));

  }
  else {

  
  
   button.addEventListener ("click", () => window.location.href="../acces-participant/acces-participant.component.html");
}
}

  
  }
}
  );
}

}
}
*/ import { Component, Inject, OnInit, PLATFORM_ID, AfterViewInit } from '@angular/core';
import { Router } from '@angular/router';
import { isPlatformBrowser } from '@angular/common';

@Component({
  selector: 'app-acceuil',
  standalone: true,
  templateUrl: './acceuil.component.html',
  styleUrls: ['./acceuil.component.css']
})
export class AcceuilComponent implements OnInit, AfterViewInit {
  constructor(@Inject(PLATFORM_ID) private platformId: Object, private router: Router) {}

  ngOnInit(): void {}

  ngAfterViewInit(): void {
    if (isPlatformBrowser(this.platformId)) {
      const buttons = document.querySelectorAll("button");
      if (buttons.length === 4) {
        alert("bouton success");
      }
      buttons.forEach(button => {
        const txt = button.textContent?.trim();
        if (txt === "S'inscrire") {
          button.addEventListener("click", () => this.router.navigate(['inscription']));
        } else if (txt === "Déjà Participant ?") {
          button.addEventListener("click", () => this.router.navigate(['access']));
        } else if (txt === "Connection") {
          button.addEventListener("click", () => this.router.navigate(['admin']));
        } else {
          button.addEventListener("click", () => window.location.href = "../acces-participant/acces-participant.component.html");
        }
      });
    }
  }
}

