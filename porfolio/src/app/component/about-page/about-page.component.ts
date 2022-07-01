import { Component, HostListener, OnInit, ViewEncapsulation } from '@angular/core';
import { of } from 'rxjs';
import { loadFull } from "tsparticles";
import { ClickMode, Container, Engine, HoverMode, MoveDirection, OutMode } from 'tsparticles-engine';

@Component({
  selector: 'app-about-page',
  templateUrl: './about-page.component.html',
  styleUrls: ['./about-page.component.css']
})
export class AboutPageComponent implements OnInit 
{
  constructor() { }

  innerCursor:HTMLElement = null;

  id = "tsparticles";

  /* Starting from 1.19.0 you can use a remote url (AJAX request) to a JSON with the configuration */
  //particlesUrl = "http://foo.bar/particles.json";

  /* or the classic JavaScript object */
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

  public particlesLoaded(container: Container): void 
  {
    console.log(container);
  }

  async particlesInit(engine: Engine): Promise<void> 
  {
    console.log(engine);
    await loadFull(engine);
  }

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

  ngOnInit(): void
  { 
    this.cursorAnimation();
  }

  @HostListener('document:mousemove', ['$event']) 
  private onMouseMove(e) :void 
  {
    const clientX = e.pageX - 6;
    const clientY = e.pageY - 5;

    this.innerCursor.setAttribute("style" , "top:" + clientY + "px; left:" + clientX + "px;");
  }

  @HostListener('document:click', ['$event']) 
  private onMouseClick(e) :void 
  {
    this.innerCursor.classList.add("expand");

    setTimeout(() => 
    {
      this.innerCursor.classList.remove("expand");
    },500);
  }

  private cursorAnimation(): void
  {
    this.innerCursor = this.selector(".cursor");
  }
}


