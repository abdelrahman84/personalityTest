import { Injectable } from '@angular/core';
import { Observable, throwError } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { map, catchError} from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class PersonalityService {
  baseURL = 'http://127.0.0.1:8000/';

  constructor(private http: HttpClient) { }

  getQuestions(): Observable<any> {
    return this.http.get<any>(`${this.baseURL}api/questions`).pipe(
      map(response => {
        return response;
      }),
      catchError(error => {
        return throwError(error);
      })
    );
    }
}
