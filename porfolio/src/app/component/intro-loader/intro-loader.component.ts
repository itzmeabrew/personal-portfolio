import { AfterViewInit, Component, OnInit, ViewEncapsulation } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-intro-loader',
  templateUrl: './intro-loader.component.html',
  styleUrls: ['./intro-loader.component.css'],
  encapsulation:  ViewEncapsulation.ShadowDom
})
export class IntroLoaderComponent implements OnInit,AfterViewInit
{

  constructor(private router: Router) { }

  ngOnInit(): void { }

  ngAfterViewInit(): void
  {
    setTimeout(() =>
    {
      this.router.navigateByUrl("home");
    },3800)
  }

}
