import { Component, OnInit } from '@angular/core';
import { products } from '../products';
import { IProducts } from '../IProducts';


@Component({
 selector: 'app-product-list',
 templateUrl: './product-list.component.html',
 styleUrls: ['./product-list.component.css']
})
export class ProductListComponent implements OnInit {
 products:IProducts[] = products;


 constructor() { }

 ngOnInit(): void {
 }

}