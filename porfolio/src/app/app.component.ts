import { Component } from '@angular/core';
import { NavigationEnd, Router } from '@angular/router';
import { filter } from 'rxjs';

declare let gtag: Function;

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent 
{
  title = 'porfolio';

  constructor(private router: Router) {}

  ngOnInit() 
  {
      this.setUpAnalytics();
  }

  setUpAnalytics() 
  {
    this.router.events.pipe(filter(event => event instanceof NavigationEnd))
    .subscribe((event: NavigationEnd) => 
    {
      gtag('config', 'G-BSC8004RT3',{page_path: event.urlAfterRedirects});
    });
  }
}
