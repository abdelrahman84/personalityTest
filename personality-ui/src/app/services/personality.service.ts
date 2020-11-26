import { Injectable } from '@angular/core';
import { Observable, throwError } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { map, catchError} from 'rxjs/operators';
import { ToastrService } from 'ngx-toastr';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class PersonalityService {
  baseURL = 'http://127.0.0.1:8000/';

  constructor(private http: HttpClient, private toastr: ToastrService, private router: Router) { }

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

    cacluatePersonality(email, answers): Observable<any> {
      return this.http.post<any>(`${this.baseURL}api/personality_score`, {email: email, answers: answers}).pipe(
        map(response => {
          this.router.navigateByUrl('/results');
          localStorage.setItem('result', response);
          return response;
        }),
        catchError(error => {
          console.log(error);
          this.toastr.error(error.error.Message, 'Error', {timeOut: 3000});
          return throwError(error);
        })
      );
      }
}
