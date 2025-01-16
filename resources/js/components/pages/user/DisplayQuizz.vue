 <template>

<div class="app-page-title">
<div class="page-title-wrapper">
<div class="page-title-heading">
<div class="page-title-icon">
<i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
</div>
<div>Quizz
</div>
</div>
<div class="page-title-actions">

<div class="d-inline-block dropdown">


</div>
</div> 
</div>
</div> 


<div class="main-card mb-3 card">
<div class="card-body">
    <div class="page-title-subheading"><h2>Quizz TO DO ......</h2></div>

<table style="width: 100%;" id="example1" class="table table-hover table-striped table-bordered">

<thead>
<tr>
<th>Name</th>
<th>Published Date</th>
<th>Do Now...</th>

<th>Score</th>
</tr>
</thead>
<tbody>
<tr v-for="QuizzToDo in Quizz.Inprogress" :key="QuizzToDo.id">
<td>{{ QuizzToDo.nameOfQuiz }}</td>
<td>{{ QuizzToDo.created_at }}</td>
<td><router-link to="#!" @click="openQuiz(QuizzToDo.id)"><i class="pe-7s-arc"></i></router-link></td>
<td>{{ QuizzToDo.question_count }}</td>
</tr>

</tbody>
<tfoot>
<tr>
<th>Name</th>
<th>Published Date</th>
<th>Do Now...</th>

<th>Score</th>
</tr>
</tfoot>
</table>
</div>

</div>

<div class="main-card mb-3 card">
<div class="card-body">
    <div class="page-title-subheading"><h2>Quizz Completed</h2></div>

<table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">

<thead>
<tr>
<th>Name</th>
<th>Solved Date</th>
<th>Score</th>
<th>/of Score</th>


</tr>
</thead>
<tbody>

  <tr v-for="QuizzDone in Quizz.Completed" :key="QuizzDone.id">
<td>{{ QuizzDone.nameOfQuiz}}</td>
<td>{{ QuizzDone.quiz_user_created_date}}</td>
<td>{{ QuizzDone.score}}</td>
<td>{{ QuizzDone.ScoreOfQuiz}}</td>
</tr>

</tbody>
<tfoot>
<tr>
<th>Name</th>
<th>Date</th>
<th>Score</th>
<th>/of Score</th>
</tr>
</tfoot>
</table>
</div>

</div>




<div id="myModal" class="modal" v-if="showModal">
        <!-- Modal content -->
        <div class="modal-content">
          <span class="close" @click="closeModal">&times;</span>
          
          <h2>{{ quiz.nameOfQuiz }}</h2>
          <form @submit.prevent="submitQuiz(quiz.id)">
            <div v-for="(question, qIndex) in quiz.question" :key="qIndex" class="mb-3">
              <label class="form-label">Question {{ qIndex + 1 }}</label>
              <div>{{ question.question }}</div>
              <div v-for="(answer, aIndex) in question.answers" :key="aIndex" class="mb-2">
                <input type="radio" :name="'question' + qIndex" :value="aIndex" v-model="studentAnswers[qIndex]" required>
                {{ answer.answer }}
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit Quiz</button>
          </form>
        </div>
      </div>
    
 </template>
 
 <script>
 
     export default {
 data(){
    return{
        Quizz:{
            Inprogress:'',
            Completed:''
        },
        showModal: false,
        quiz: {
          nameOfQuiz: '',
          question: []
        },
        studentAnswers: []
    }
 },

 mounted() 
    {
    this.getQuizz();
    },



        methods:{
            getQuizz(){
            this.$axios.post(this.baseUrl+"RetriveQuizz").then(Response=>{
                this.Quizz.Inprogress=Response.data.notSolved;
                this.Quizz.Completed=Response.data.solved
                console.log(Response.data)
            })
        },
        openQuiz(quizId) {
        // Fetch quiz data based on quiz ID (replace with actual API call)
        this.$axios.post(this.baseUrl + `GetQuiz/${quizId}`)
          .then(response => {
            console.log('API Response:', response.data); // Log the API response
            if (response.data && response.data.message && Array.isArray(response.data.message.question)) {
              this.quiz = response.data.message;
              console.log('Quiz Data:', this.quiz); // Log the quiz data
              console.log('Questions Length:', this.quiz.question.length); // Log the questions length correctly
              this.studentAnswers = new Array(this.quiz.question.length).fill(null);
              this.showModal = true;
            } else {
              console.error('Quiz data or questions are missing.');
            }
          })
          .catch(error => {
            console.error('Error fetching quiz:', error);
          });
      },
         
closeModal() 
         
{ 
            this.showModal = false; 
} ,
            
submitQuiz(id) 
{ 
                let score = 0; 
                this.quiz.question.forEach((question, qIndex) => { 
                    if (question.answers[this.studentAnswers[qIndex]] && question.answers[this.studentAnswers[qIndex]].is_correct) { score += 1; } 
                }); // Send score to backend 
                this.$axios.post(this.baseUrl+'PostQuizResutl/'+id, { score })
                 .then(response => 
                 { 
                  alert(`Quiz submitted successfully! Your score: ${score}`); 
                  this.closeModal(); 
                  this.getQuizz();
                }) 
                  .catch(error => { console.error('Error saving score:', error); }); 
 
              } 
            }
     
 
 }
 </script>



 
  

<!--   
  
  //   methods: {

  //   
  //     submitQuiz() {
  //       let score = 0;
  //       this.quiz.question.forEach((question, qIndex) => {
  //         if (question.answers[this.studentAnswers[qIndex]] && question.answers[this.studentAnswers[qIndex]].is_correct) {
  //           score += 1;
  //         }
  //       });
  
  //       // Send score to backend
  //       axios.post('your_api_endpoint/SaveScore', { score })
  //         .then(response => {
  //           alert(`Quiz submitted successfully! Your score: ${score}`);
  //           this.closeModal();
  //         })
  //         .catch(error => {
  //           console.error('Error saving score:', error);
  //         });
  //     }
  //   }
  // }; -->

  
  <style scoped>
  /* Add any necessary styling here */
  </style>
  