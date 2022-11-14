import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './navbar/navbar.component';
import { BasketComponent } from './basket/basket.component';
import { products } from './products/products';
import { iproducts } from './products/iproducts';
import { HomeComponent } from './home/home.component';
import { InfoComponent } from './info/info.component';
@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    BasketComponent,
    HomeComponent,
    InfoComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {
}
