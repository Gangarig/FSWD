import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutComponent } from './about/about.component';
import { ContactComponent } from './contact/contact.component';
import { HeroComponent } from './hero/hero.component';
import { ImgInbigsizeComponent } from './img-inbigsize/img-inbigsize.component';
import { PortfolioComponent } from './portfolio/portfolio.component';
import { TestimonialsComponent } from './testimonials/testimonials.component';


const routes: Routes = [
  {
    path: "",
    component: HeroComponent,
  },
  {
    path: "testimonials",
    component: TestimonialsComponent,
  },
  {
    path: "portfolio",   
    component:PortfolioComponent,
  },{
    path:"imgbig/:i",
    component:ImgInbigsizeComponent,
  },{
    path: "contact",
    component: ContactComponent,
  },{
    path:"about",
    component:AboutComponent,
  }
  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
