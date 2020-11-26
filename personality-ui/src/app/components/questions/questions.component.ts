import { Component, OnInit } from '@angular/core';
import { PersonalityService } from '../../services/personality.service';
import { Answer } from '../../models/answer.model';
import { ToastrService } from 'ngx-toastr';
import { NgxSpinnerService } from 'ngx-spinner';
import { NgxSmartModalService } from 'ngx-smart-modal';


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
  user_email = null;

  constructor(private personalityService: PersonalityService, private toastr: ToastrService,
              private spinner: NgxSpinnerService, public ngxSmartModalService: NgxSmartModalService) { }

  ngOnInit(): void {
    this.getQuestions();
  }

  getQuestions() {
    this.personalityService.getQuestions().subscribe(res => {
      this.questions = res.Questions;
      for (const question of res.Questions) {
        const a: Answer = { score: null, question_id: question.id };
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
    let answersMissing = false;
    for (const answer of this.answers) {
      if (!answer.score) {
        answersMissing = true;
      }
    }
    if (!test) {
      this.toastr.error('Email is missing, or with wrong format', 'Error', { timeOut: 3000 });
    } else if (answersMissing) {
      this.toastr.error('Please answers all questions to get accurate result', 'Error', { timeOut: 3000 });
    } else {
      this.spinner.show();
      this.personalityService.cacluatePersonality(this.email, this.answers).subscribe(res => {
        this.spinner.hide();
        this.toastr.success('Thank you for taking the survey', 'Success', { timeOut: 3000 });
      }, err => this.spinner.hide());
    }
  }

  login() {
    const EMAIL_REGEXP = /^[a-z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-z0-9]([a-z0-9-]*[a-z0-9])?(\.[a-z0-9]([a-z0-9-]*[a-z0-9])?)*$/i;
    const test = EMAIL_REGEXP.test(this.user_email);
    if (!test) {
      this.toastr.error('Email is missing, or with wrong format', 'Error', { timeOut: 3000 });
    } else {
        this.spinner.show();
        this.personalityService.login(this.user_email).subscribe(res => {
          this.spinner.hide();
        }, err => this.spinner.hide());
      }
    }


  }
