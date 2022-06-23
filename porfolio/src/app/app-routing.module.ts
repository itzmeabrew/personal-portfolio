import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutPageComponent } from './component/about-page/about-page.component';
import { HomePageComponent } from './component/home-page/home-page.component';
import { NotFoundComponent } from './component/not-found/not-found.component';

const routes: Routes =
[
  {path: "", component:HomePageComponent},
  {path: "home", component:HomePageComponent},
  {path: "not-found", component:NotFoundComponent},
  {path: "**", pathMatch: "full", component: NotFoundComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
