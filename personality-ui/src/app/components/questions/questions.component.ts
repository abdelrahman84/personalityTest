import { Component, OnInit } from '@angular/core';
import { PersonalityService } from '../../services/personality.service';
// import { FormGroup, FormControl, FormArray, FormBuilder } from '@angular/forms'
import {Answer} from '../../models/answer.model';

@Component({
  selector: 'app-questions',
  templateUrl: './questions.component.html',
  styleUrls: ['./questions.component.scss']
})
export class QuestionsComponent implements OnInit {

  questions = [];
  scores = [1, 2, 3, 4, 5, 6, 7];
  answers: Answer[] = [];
  email = null;
  // answersForm: FormGroup;

  constructor(private personalityService: PersonalityService, 
   // private formGroup: FormBuilder
    ) { }

  ngOnInit(): void {
    this.getQuestions();
    // this.initalizeQuestionsForm();
  }

  getQuestions() {
    this.personalityService.getQuestions().subscribe(res => {
      this.questions = res.Questions;
      for (const question of res.Questions) {
        const a: Answer = {score: null, question_id: question.id};
        this.answers.push(a);
      }
    }, err => console.log(err));
  }

  updateAnswers(index, score) {
    this.answers[index]['score'] = score;
  }

  submit() {
    const EMAIL_REGEXP = /^[a-z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-z0-9]([a-z0-9-]*[a-z0-9])?(\.[a-z0-9]([a-z0-9-]*[a-z0-9])?)*$/i;
    const test = EMAIL_REGEXP.test(this.email);
    if (!test) {
      console.log('invalid email');
    }
    for (const answer of this.answers) {
      if (!answer.score) {
        console.log('missing');
      }
    }
  }



  // initalizeQuestionsForm() {
  //   this.answersForm = this.formGroup.group({
  //     answers: this.formGroup.array([]) ,
  //   });
  // }

  // get answers(): FormArray {
  //   return this.answersForm.get("answers") as FormArray;
  // }

}
