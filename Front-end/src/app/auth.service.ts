import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  private baseUrl = 'http://localhost/stage/';
  private mail = '';
  private password = ''; // Use this as the root URL for your backend

  constructor(private http: HttpClient) { }

  // Function to login a user or admin
  login(mail: string, password: string, userType: 'participant' | 'admin'): Observable<any> {
    const formData = new FormData();

    /*if (userType === 'participant') {
      formData.append('mail', mail);
      formData.append('password', password);
      return this.http.post(this.baseUrl + 'login_participant.php', formData);
    } else if (userType === 'admin') {
     */

      formData.append('mail', mail);
      formData.append('pwd', password);
      if (userType === 'admin')
      {
      return this.http.post(this.baseUrl + 'login_admin.php', formData);

    } else { if (userType === 'participant')
    {
      this.mail = mail;
      this.password = password;
      
      
      return this.http.post(this.baseUrl + 'login_participant.php', formData);
    }
    else {
      // Handle unexpected userType
      return throwError(() => new Error('Invalid user type'));
    }
  }
  }
  private participants: any[] = [];
  private cycle: any[] = [];
  getParticipants(theme: string, numSalle: string, date: string): Observable<any> {
    const formData = new FormData();
    formData.append('Theme', theme);
    formData.append('numSalle', numSalle);
    formData.append('date_de_depart', date);
  
    return this.http.post(this.baseUrl + 'filtre-participant.php', formData);
  }
  getStoredParticipants(): any[] {
    return this.participants;
  }
  setParticipants(participants: any[]) {
    this.participants = participants;
  }
  addParticipant(theme: string, name: string, date:  string, pwd: string, mail: string): Observable<any> {
    const formData = new FormData();
    formData.append('theme', theme);
    formData.append('mail', mail);
    formData.append('pwd', pwd);
    formData.append('name', name);
    formData.append('date_debut', date);
  
    return this.http.post(this.baseUrl + 'inscription.php', formData);
  }
  getStoredcycle(): Observable<any> {
    if(!this.mail)
    {
      return throwError(() => new Error('User email not found. Please login first.'));

    }
    else {
      const formData = new FormData();
  formData.append('mail', this.mail);
  return(this.http.post(this.baseUrl + 'cycle.php', formData))


    }
    
      
    

  }

  setcycle(cycle: any[]) {
    this.cycle = cycle;
  }
  delete_formatteur(nom_formatteur: string, specialite: string) : Observable<any> 
  { const formData = new FormData();
    formData.append('nom_formatteur', nom_formatteur);
    formData.append('specialite',specialite);

    return this.http.post(this.baseUrl + 'supprimer_formatteur.php', formData);

  }
  add_formatteur(nom_formatteur: string, specialite: string) : Observable<any> 
  {
    const formData = new FormData();
    formData.append('nom_formatteur', nom_formatteur);
    formData.append('specialite',specialite);
    
  
    return this.http.post(this.baseUrl + 'Ajouter_formatteur.php', formData);

  }
  private nom_formatteur: string = '';
  private specialite: string = '';
  modif_formatteur(nom_formatteur: string, specialite: string) : Observable<any>
  {const formData = new FormData();
    formData.append('nom_formatteur',nom_formatteur);
    formData.append('specialite',specialite);
    this.nom_formatteur = nom_formatteur;
    this.specialite = specialite;
    

    return this.http.post(this.baseUrl + 'modifier_fomatteur.php', formData);
   

  }
  private  theme : string = '';
  private  date_deb : string = '';

  modif_cycle(theme: string, date_deb: string) : Observable<any>
  {const formData = new FormData();
    formData.append('theme',theme);
    formData.append('date_deb',date_deb);
    this.theme = theme;
    this.date_deb = date_deb;
    

    return this.http.post(this.baseUrl + 'modifier_cycle.php', formData);
   

  }
  getFormatteur(nom_formatteur_update: string, specialite_new: string): Observable<any> {
    const formData = new FormData();
    formData.append('nom_formatteur_update',nom_formatteur_update);
    formData.append('specialite_new',specialite_new);
    formData.append('nom_formatteur',this.nom_formatteur);
    formData.append('specialite',this.specialite);
    return this.http.post(this.baseUrl + 'formatteur_modifié.php', formData);
  }
  getCycle(new_theme: string, date_deb_new: string, date_fin: string, num_salle : string,nom_formatteur: string): Observable<any> {
    const formData = new FormData();
    formData.append('new_theme',new_theme);
    formData.append('date_deb_new',date_deb_new);
    formData.append('theme',this.theme);
    formData.append('date_deb',this.date_deb);
    formData.append('date_fin', date_fin);
    formData.append('num_salle',num_salle);
    formData.append('nom_formatteur',nom_formatteur);
    return this.http.post(this.baseUrl + 'cycle_modifié.php', formData);
  }

  
  Ajoutercycle(theme: string,date_deb: string, date_fin: string,form: string,num_salle: string)  : Observable<any>
  // Observable<any> ya3ni ya typescript mta3 ilcomponent illy bch y3ayt ll fonction hedhi 
  // 7adhir rou7k rahi il fonction hedhi tnajm traja3lk ay type de retour , maghir mat9olli type mismatch error
  // wa manadhara 9ad a3dhara 
  { const formData = new FormData();
    formData.append('theme',theme);
    formData.append('date_deb',date_deb);
    formData.append('date_fin',date_fin);
    formData.append('form',form);
    formData.append('num_salle',num_salle);



    return this.http.post(this.baseUrl + 'Ajouter_cycle.php', formData);

  }
  supprimerCycle(theme: string, date_deb: string): Observable<any>
  { const formData = new FormData();
    formData.append('theme',theme);
    formData.append('date_deb',date_deb);

    return this.http.post(this.baseUrl + 'supprimer_cycle.php', formData);

  }
    
 
}
