import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Injectable({
    providedIn: 'root'
})
export class CategoryService {

    baseUrl = 'http://localhost:8000/shop/';

    constructor(private http: HttpClient) {
    }

    index() {
        let requestUrl = `${this.baseUrl}/categories`;
        return this.http.get(requestUrl).toPromise();
    }
}
