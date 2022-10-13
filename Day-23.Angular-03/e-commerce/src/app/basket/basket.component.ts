import { Component, OnInit } from '@angular/core';
import { iproducts } from '../products/iproducts';
import { ServiceService } from '../service.service';

@Component({
  selector: 'app-basket',
  templateUrl: './basket.component.html',
  styleUrls: ['./basket.component.css']
})
export class BasketComponent implements OnInit {
  inbasket: Array <iproducts> = [];
  constructor( private cs: ServiceService) { }
  totalprice = 0;
  ngOnInit(): void {
    this.inbasket = this.cs.getitems();
    this.totalprice = this.cs.getTotal();
  }
  cleanbasket(){
    this.inbasket = [];
    return this.inbasket;
  }
  

}
