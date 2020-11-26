import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-results-page',
  templateUrl: './results-page.component.html',
  styleUrls: ['./results-page.component.scss']
})
export class ResultsPageComponent implements OnInit {
 result;
  constructor() {
   this.result = localStorage.getItem('result');
   }

  ngOnInit(): void {
  }

}
