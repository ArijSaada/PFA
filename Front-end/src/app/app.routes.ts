import { Routes } from '@angular/router';
import { AcceuilComponent } from './acceuil/acceuil.component';
import { AccesParticipantComponent } from './acces-participant/acces-participant.component';
import { InsriptionComponent } from './insription/insription.component';
import { CycleDeFormationComponent } from './cycle-de-formation/cycle-de-formation.component';
import { AdminComponent } from './admin/admin.component';
import { AdminControlPanelComponent } from './admin-control-panel/admin-control-panel.component';
import { GerercycleComponent } from './gerercycle/gerercycle.component';
import {FiltreParticipantsComponent} from './filtre-participants/filtre-participants.component';
import { GererFormatteursComponent } from './gerer-formatteurs/gerer-formatteurs.component';
import { ConsulterParticipantsComponent } from './consulter-participants/consulter-participants.component';
import { ModifierComponent } from './modifier/modifier.component';
import { ModifierFormatteurComponent } from './modifier-formatteur/modifier-formatteur.component';
import { AfficherParticipantsComponent } from './afficher-participants/afficher-participants.component';


export const routes: Routes = [
    {'path':'',component: AcceuilComponent},
    {'path':'access',component: AccesParticipantComponent},
    {'path':'inscription',component: InsriptionComponent},
    {'path':'cycle',component: CycleDeFormationComponent},
    {'path':'admin',component: AdminComponent},
    {'path':'control',component: AdminControlPanelComponent},
    {'path':'gerercycles',component: GerercycleComponent},
    {'path':'affichage',component: FiltreParticipantsComponent},
    {'path':'gestionformatteurs',component: GererFormatteursComponent},
    {'path':'consulter',component: ConsulterParticipantsComponent},
    {'path':'modifier',component: ModifierComponent},
    {'path':'modifier_form',component: ModifierFormatteurComponent},
    {'path':'Participants',component: AfficherParticipantsComponent}
    
    
];