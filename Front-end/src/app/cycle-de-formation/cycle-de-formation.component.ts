/*import { Component } from '@angular/core';

@Component({
  selector: 'app-cycle-de-formation',
  standalone: true,
  imports: [],
  templateUrl: './cycle-de-formation.component.html',
  styleUrl: './cycle-de-formation.component.css'
})
export class CycleDeFormationComponent {

}
*/
import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';  // Import your AuthService
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { CommonModule } from '@angular/common';

@Component({
  standalone:true,
  

  imports: [FormsModule, HttpClientModule, CommonModule],

  selector: 'app-cycle-de-formation',
  templateUrl: './cycle-de-formation.component.html',
  styleUrls: ['./cycle-de-formation.component.css']
})
export class CycleDeFormationComponent implements OnInit {
  cycle: any[] = [];  // This will store the cycle data

  constructor(private authService: AuthService) {}

  ngOnInit(): void {
    this.fetchCycleData();
  }

  fetchCycleData(): void {
    this.authService.getStoredcycle().subscribe(
      (response: any) => {
        if (response.status === 'success') {
          this.cycle = response.data;  
          console.log(this.cycle);
          console.log(response);// Store cycle data in the component
        } else {
          console.log('Error fetching cycle data:', response.message);
        }
      },
      (error) => {
        console.log('Error fetching cycle data:', error);
      }
    );
  }
}
