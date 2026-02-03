import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';  // Import CommonModule
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-afficher-participants',
  standalone: true,
  imports: [CommonModule],  // Add CommonModule here
  templateUrl: './afficher-participants.component.html',
  styleUrls: ['./afficher-participants.component.css']
})
export class AfficherParticipantsComponent {
  participants: any[] = [];

  constructor(private service: AuthService) {
    
    this.participants = this.service.getStoredParticipants();
  }
}
