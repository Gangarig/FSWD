import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
 rentalcars: Array<{ name :string ; price : number ; pic: string ; qtty:number}> = [
  {
    name: "Car",
    price: 100,
    pic:'https://cdn.pixabay.com/photo/2012/04/13/20/37/car-33556_960_720.png',
    qtty:5,
  },{
    name: "Car",
    price: 100,
    pic:'https://cdn.pixabay.com/photo/2012/04/13/20/37/car-33556_960_720.png',
    qtty:6,
  },{
    name: "Car",
    price: 100,
    pic:'https://cdn.pixabay.com/photo/2012/04/13/20/37/car-33556_960_720.png',
    qtty:7,
  },{
    name: "Car",
    price: 100,
    pic:'https://cdn.pixabay.com/photo/2012/04/13/20/37/car-33556_960_720.png',
    qtty:8,
  },{
    name: "Car",
    price: 100,
    pic:'https://cdn.pixabay.com/photo/2012/04/13/20/37/car-33556_960_720.png',
    qtty:9,
  },{
    name: "Car",
    price: 100,
    pic:'https://cdn.pixabay.com/photo/2012/04/13/20/37/car-33556_960_720.png',
    qtty:10,
  },
 ];
  constructor() { }
  showcar(carid:any) {
    if(this.rentalcars[carid].qtty >0){
    this.rentalcars[carid].qtty--;
    }
    // if(this.rentalcars[carid].qtty == 0){
    // document.getElementsByClassName("text1").innerHTML = `<p>There are no cars to rent</p>`;
    // }
  }

  ngOnInit(): void {
  }


}
