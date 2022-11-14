import { Injectable } from '@angular/core';
import { iproducts } from './products/iproducts';
import { products } from './products/products';
@Injectable({
  providedIn: 'root'
})
export class ServiceService {
  basket: Array<iproducts> = [];
  constructor() { }
  addtobasket(product:iproducts){
    if(this.basket.find(val => val.name == product.name)){
      product.qtty++;
    }else {
      this.basket.push(product); 
    }
    
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

  plusqtty(i: number){
    this.basket[i].qtty++;
  }
  minusqtty(i:number){
    if(this.basket[i].qtty >0){
    this.basket[i].qtty--;}
    if(this.basket[i].qtty == 0){
     delete this.basket[i];
  }
}
}
