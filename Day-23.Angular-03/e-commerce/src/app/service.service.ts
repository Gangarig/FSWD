import { Injectable } from '@angular/core';
import { iproducts } from './products/iproducts';
@Injectable({
  providedIn: 'root'
})
export class ServiceService {
  basket: Array<iproducts> = [];
  constructor() { }
  addtobasket(product:iproducts){
  this.basket.push(product); 
  }
  getitems(){
    return this.basket;
  }

  getTotal(){
    let total : number = 0;
    for(let item of this.basket){
      total += item.price;
    }
    return total;
  }

}
