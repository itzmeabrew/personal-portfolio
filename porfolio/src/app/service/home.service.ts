import { Injectable } from '@angular/core';
import { HttpClient } from  '@angular/common/http';
import { Observable } from 'rxjs';
import { AppConstants } from '../app.constants';{}

@Injectable({
  providedIn: 'root'
})
export class HomeService 
{   
  API_ENDPOINT = AppConstants.API_ENDPOINT;
  //API_ENDPOINT = "http://localhost:8080/";

  constructor(private http: HttpClient) { }

  public sendMail(mail: any): Observable<any> 
  {
    return this.http.post(this.API_ENDPOINT + "api/sendmail", mail);
  }
}
