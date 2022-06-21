import { Injectable } from '@angular/core';
import { HttpClient } from  '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class HomeService 
{
  //API_ENDPOINT = "http://34.83.133.79:8080/";
  API_ENDPOINT = "";

  constructor(private http: HttpClient) { }

  public sendMail(mail: any): Observable<any> 
  {
    return this.http.post(this.API_ENDPOINT + "api/sendmail", mail);
  }
}
