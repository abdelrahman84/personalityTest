import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { QuestionsComponent } from './components/questions/questions.component';
import { ResultsPageComponent } from './components/results-page/results-page.component';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'questions',
    pathMatch: 'full'
  },
  {
    path: 'questions',
    component: QuestionsComponent
  },
  {
    path: 'results',
    component: ResultsPageComponent
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
