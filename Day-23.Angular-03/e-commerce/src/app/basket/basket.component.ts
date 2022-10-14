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
  buyoutbtn(){
    this.inbasket = [];
    this.totalprice =0;
    return this.inbasket;
  }
  clearbasketbtn() {
    this.inbasket = [];
    this.totalprice =0;
    return this.inbasket;
  }
  plusbtn (i: number) {
    this.cs.plusqtty(i);
    this.totalprice=this.totalprice + this.inbasket[i].price;
    return this.totalprice;
  }
  minusbtn(i:number){
    this.cs.minusqtty(i);
    this.totalprice=this.totalprice - this.inbasket[i].price;
    return this.totalprice;
  }
  // addtobasket(product:iproducts){
  //   if(this.basket.find(val => val.name == product.name)){
  //     product.qtty++;
  //   }else {
  //     this.basket.push(product); 
  //   }
  // }

}
