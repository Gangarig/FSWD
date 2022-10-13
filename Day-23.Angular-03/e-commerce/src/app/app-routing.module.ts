import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { BasketComponent } from './basket/basket.component';
import { HomeComponent } from './home/home.component';
import { InfoComponent } from './info/info.component';
import { NavbarComponent } from './navbar/navbar.component';

const routes: Routes = [
  {
    path:'',
    component:NavbarComponent,
  },{
    path:'basket',
    component:BasketComponent,
  },{
    path:'home',
    component:HomeComponent,
  },{
    path:"info/:p_index",
    component:InfoComponent,
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
