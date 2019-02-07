import {Component, OnInit} from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Component({
    selector: 'app-dashboard',
    templateUrl: './dashboard.component.html',
    styleUrls: ['./dashboard.component.sass']
})
export class DashboardComponent implements OnInit {

    categories = [];

    constructor(private http: HttpClient) {
    }

    ngOnInit() {
        this.http
            .get<{ data: any[] }>('http://localhost:8000/api/categories')
            .subscribe(response => this.categories = response.data)
    }

}

//new DashboardComponent(//dependencias)
// { data: [categories] }