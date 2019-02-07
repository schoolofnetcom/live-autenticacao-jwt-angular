import {Component, OnInit} from '@angular/core';
import {AuthService} from "../../auth.service";
import {Router} from "@angular/router";

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.sass']
})
export class LoginComponent implements OnInit {

    user = {
        email: '',
        password: ''
    };

    constructor(private auth: AuthService, private router: Router) {
    }

    ngOnInit() {
    }

    login() {
        this.auth.login(this.user)
            .subscribe(() => {
                this.router.navigate(['/dashboard']);
            });
    }

}
