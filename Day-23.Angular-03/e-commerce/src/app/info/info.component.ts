import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import { ServiceService } from '../service.service';
import { products } from '../products/products';
import { iproducts } from '../products/iproducts';

@Component({
  selector: 'app-info',
  templateUrl: './info.component.html',
  styleUrls: ['./info.component.css']
})
export class InfoComponent implements OnInit {
  product: iproducts ={} as iproducts;
  p_index = 0;
  
  constructor(private route:ActivatedRoute ,private tobasket:ServiceService) { }

  ngOnInit(): void {
    this.route.params.subscribe((params:Params) => {
      this.p_index = Number(params["p_index"]); 
      this.product = products[this.p_index];
    })
  }
  buy(){
    alert ("Product added to basket");
    this.tobasket.addtobasket(this.product);
  }

}
