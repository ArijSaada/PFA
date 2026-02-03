import { Component, Inject, OnInit, PLATFORM_ID, AfterViewInit } from '@angular/core';
import { Router } from '@angular/router';
import { isPlatformBrowser } from '@angular/common';


@Component({
  selector: 'app-admin-control-panel',
  standalone: true,
  imports: [],
  templateUrl: './admin-control-panel.component.html',
  styleUrl: './admin-control-panel.component.css'
})
export class AdminControlPanelComponent implements OnInit, AfterViewInit {
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
        if (txt === "Acceder") {
          button.addEventListener("click", () => this.router.navigate(['gerercycles']));
        } else if (txt === "Acceder_Formatteurs") {
          button.addEventListener("click", () => this.router.navigate(['gestionformatteurs']));
        } else if (txt === "Connection") {
          button.addEventListener("click", () => this.router.navigate(['admin']));
        } else {
          button.addEventListener("click", () => this.router.navigate(['affichage']));
        }
      });
    }
  }
}


 
