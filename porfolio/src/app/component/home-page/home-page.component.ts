import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css']
})
export class HomePageComponent implements OnInit
{
  constructor() { }

  ngOnInit(): void { }

  private selector(el: string , all = false)
  {
    el = el.trim();
    if (all) 
    {
      return Array.from(document.querySelectorAll(el));
    }
    else
    {
      return document.querySelector(el);
    }
  }

  private scrollTo(el)
  {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    })
  }

  public navBarTogle(id: string): void
  {
    const elem = document.getElementById(id);
    const closex = document.querySelector(".mobile-nav-toggle");

    elem.classList.toggle('navbar-mobile')
    closex.classList.toggle('fa-ellipsis');
    closex.classList.toggle('fa-xmark');
  }

  public scrollToSection(hasx: string, event: Event): void 
  {
    const slc = <HTMLElement>this.selector(hasx);
    const target = <HTMLElement>event.target;
    console.log(target);
    
    //const navLink =<HTMLElement> this.selector("#navbar .nav-link");

    if(slc)
    {
      event.preventDefault();

      let navbar = <HTMLElement>this.selector('#navbar')
      let header = <HTMLElement>this.selector('#header')
      let sections = <Array<HTMLElement>>this.selector('section', true)
      let navlinks = <Array<HTMLElement>>this.selector('#navbar .nav-link', true)

      navlinks.forEach((item) =>
      {
        item.classList.remove('active');
      });
      target.classList.add('active');
      
      if (navbar.classList.contains('navbar-mobile')) 
      {
        navbar.classList.remove('navbar-mobile');
        const navbarToggle = <HTMLElement>this.selector('.mobile-nav-toggle');
        navbarToggle.classList.toggle('fa-ellipsis');
        navbarToggle.classList.toggle('fa-xmark');
      }

      if (hasx == '#header')
      {
        header.classList.remove('header-top');
        sections.forEach((item) => 
        {
          item.classList.remove('section-show');
        });
        return;
      }

      if (!header.classList.contains('header-top'))
      {
        header.classList.add('header-top');
        setTimeout(function()
        {
          sections.forEach((item) => 
          {
            item.classList.remove('section-show');
          });
          slc.classList.add('section-show');
        }, 350);
      } 
      else 
      {
        sections.forEach((item) => {
          item.classList.remove('section-show');
        })
        slc.classList.add('section-show');
      }
      this.scrollTo(hasx);
    }

  }

}
