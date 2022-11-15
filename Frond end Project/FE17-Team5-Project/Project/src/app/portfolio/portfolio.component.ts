import { Component, OnInit } from '@angular/core';
import { i_imgpath } from '../i_imgpath';
import { portfolio } from '../imgpath';
@Component({
  selector: 'app-portfolio',
  templateUrl: './portfolio.component.html',
  styleUrls: ['./portfolio.component.css']
})
export class PortfolioComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }
  portfolio :Array<i_imgpath>=portfolio;
}
