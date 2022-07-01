import { Component, HostListener } from '@angular/core';
import { NavigationEnd, Router } from '@angular/router';
import { filter } from 'rxjs';
import { loadFull } from 'tsparticles';
import { ClickMode, HoverMode, MoveDirection, OutMode, Container, Engine } from 'tsparticles-engine';

declare let gtag: Function;

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css','./cursor-style.css']
})
export class AppComponent 
{
  title = 'porfolio';

  innerCursor:HTMLElement = null;
  id = "tsparticles";
  showVar: boolean = false;

  particlesOptions = 
  {
    background: 
    {
      image: "#040404 url('../src/assets/images/bg3.jpg') center no-repeat !important"
    },
    fpsLimit: 30,
    interactivity: 
    {
      events: 
      {
        onClick: 
        {
          enable: true,
          mode: ClickMode.push
        },
        onHover: 
        {
          enable: true,
          mode: HoverMode.repulse
        },
        resize: true
      },
      modes: 
      {
        push: 
        {
          quantity: 4
        },
        repulse: 
        {
          distance: 200,
          duration: 0.4
        }
      }
    },
    particles: 
    {
      color: 
      {
        value: "#ffffff",
      },
      links: 
      {
        color: "#ffffff",
        distance: 150,
        enable: true,
        opacity: .2,
        width: 1
      },
      collisions: 
      {
        enable: true
      },
      move: 
      {
        direction: MoveDirection.none,
        enable: true,
        outModes: 
        {
          default: OutMode.bounce
        },
        bounce: false,
        random: false,
        speed: 3,
        straight: false
      },
      number: 
      {
        density: 
        {
          enable: true,
          area: 800
        },
        value: 80
      },
      opacity: 
      {
        value: 0.2
      },
      shape: 
      {
        type: "circle"
      },
      size: 
      {
        value: {min: 1, max: 5 },
      }
    },
    detectRetina: true
  };

  constructor(private router: Router) {}

  ngOnInit(): void
  { 
    this.setUpAnalytics();
    this.cursorAnimation();
  }

  public setUpAnalytics(): void
  {
    this.router.events.pipe(filter(event => event instanceof NavigationEnd))
    .subscribe((event: NavigationEnd) => 
    {
      gtag('config', 'G-BSC8004RT3',{page_path: event.urlAfterRedirects});
    });
  }

  ///////////////////////////////////////////////////////////////////

  private selector(el: string , all = false): any
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

  public particlesLoaded(container: Container): void 
  {
    console.log(container);
  }

  async particlesInit(engine: Engine): Promise<void> 
  {
    console.log(engine);
    await loadFull(engine);
  }

  private cursorAnimation(): void
  {
    this.innerCursor = this.selector(".cursor");
    this.showVar = false;
  }

  @HostListener('document:mousemove', ['$event']) 
  private onMouseMove(e) :void 
  {
    this.showVar = true;
    const clientX = e.pageX - 6;
    const clientY = e.pageY - 5;

    this.innerCursor.setAttribute("style" , "top:" + clientY + "px; left:" + clientX + "px;");
    
    if(this.innerCursor.classList.contains("disappear"))
    {
      this.innerCursor.classList.remove("disappear");
    }
  }

  @HostListener('document:click', ['$event']) 
  private onMouseClick(e) :void 
  {
    this.showVar = true;
    this.innerCursor.classList.add("expand");

    setTimeout(() => 
    {
      this.innerCursor.classList.remove("expand");
    },500);
  }

  @HostListener('document:scroll', ['$event'])
  private onMouseScroll(e) :void
  {
    //console.log("hi");
    
    this.innerCursor.classList.add("disappear");
  }

}