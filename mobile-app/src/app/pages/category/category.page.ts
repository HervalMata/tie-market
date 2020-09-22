import { Component, OnInit } from '@angular/core';
import {CategoryService} from "../../services/category.service";
import {Category} from "../../model";

@Component({
  selector: 'app-category',
  templateUrl: './category.page.html',
  styleUrls: ['./category.page.scss'],
})
export class CategoryPage implements OnInit {

    categories: Array<Category> = [];

  constructor(private categoryService: CategoryService) { }

  ngOnInit() {
      return this.categoryService.index()
          .subscribe(response => {
              console.log(response.data);
              this.categories = response.data;
          });
  }

}
