import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {tap} from "rxjs/operators";

@Injectable({
    providedIn: 'root'
})
export class AuthService {

    constructor(private http: HttpClient) {
    }

    login(user) {
        return this.http.post<{ token: string }>('http://localhost:8000/api/login', user)
            .pipe(
                tap(data => window.localStorage.setItem('token', data.token))
            );
        //~5M
    }

    refresh() {
        return this.http.post<{ token: string }>('http://localhost:8000/api/refresh', {})
            .pipe(
                tap(data => window.localStorage.setItem('token', data.token))
            );
    }
}
