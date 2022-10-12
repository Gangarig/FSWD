import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})

export class NavbarComponent implements OnInit {
  constructor() { }
  ngOnInit(): void {
  }
  donatedamount = 0;
  donate10() {
    this.donatedamount += 10;
  }
  donate20() {
    this.donatedamount += 20;
  }
  donate50() {
    this.donatedamount += 50;
  }
  donate100() {
    this.donatedamount += 100;
  }
  donate200() {
    this.donatedamount += 200;
  }
}
