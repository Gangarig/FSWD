import { Component, OnInit } from '@angular/core';
import { products } from '../products/products';
import { iproducts } from '../products/iproducts';
import { ServiceService } from '../service.service';
@Component({
  selector: 'home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  constructor() { }
  products: Array<iproducts> = products;
  ngOnInit(): void {
  }
  

}
