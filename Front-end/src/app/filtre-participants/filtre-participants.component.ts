import { Component } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms'; // Import ReactiveFormsModule
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-filtre-participants',
  standalone: true,
  imports: [ReactiveFormsModule],  // Include ReactiveFormsModule here
  templateUrl: './filtre-participants.component.html',
  styleUrls: ['./filtre-participants.component.css']
})
export class FiltreParticipantsComponent {
  myform: FormGroup;

  constructor(
    private formBuilder: FormBuilder, // Renamed to formBuilder for clarity
    private router: Router,
    private service: AuthService
  ) {
    this.myform = this.formBuilder.group({
      Theme: [''],
      numSalle: [''],
      date: ['']
    });
  }

  onSubmit() {
    if (this.myform.valid) {
      this.service.getParticipants(
        this.myform.value.Theme,
        this.myform.value.numSalle,
        this.myform.value.date
      ).subscribe(response => {
        if (response.status === 'success') {
          alert("Response working...");
          this.service.setParticipants(response.data);
          this.router.navigate(['Participants']);
        } else {
          alert('Error');
        }
      });
    }
  }

  onReset() {
    this.myform.reset();
  }
}
