<template>

<div class="app-page-title">
<div class="page-title-wrapper">
<div class="page-title-heading">
<div class="page-title-icon">
<i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
</div>
<div>Quizz
<div class="page-title-subheading">Choose between Quizz to Edit</div>
</div>
</div>

</div>
</div> <div class="main-card mb-3 card">
<div class="card-body">
<table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
<thead>
<tr>
<th>Quiz Name</th>
<th>Published Date</th>
<th># of Student</th>
<th>Edit</th>

</tr>
</thead>
<tbody>
<tr v-for="data in QuizInformation" :key="data.key">
<td>{{ data.nameOfQuiz }}</td>
<td>{{ data.created_at }}</td>
<td>0</td>
<td @click="openModal(data.id)"><i class="metismenu-icon pe-7s-way" ></i></td>

</tr>
</tbody>
<tfoot>
<tr>
<th>Quiz Name</th>
<th>Published Date</th>
<th># of Student</th>
<th>Edit</th>

</tr>
</tfoot>
</table>
</div>
</div>








<div> <!-- The Button to Open the Modal --> 
    <!-- The Modal --> 
    <div id="myModal" class="modal" v-if="showModal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" @click="closeModal">&times;</span>
        <div v-for="(question, questionIndex) in modelData.QuestionsAnswers" :key="questionIndex" class="mb-3">
            <label class="form-label">Question {{ questionIndex + 1 }}</label>
            <input type="text" v-model="question.question" class="form-control mb-2" required>
            <div v-for="(answer, ansIndex) in question.answers" :key="ansIndex" class="mb-2">
                <input type="text" v-model="answer.answer" class="form-control mb-2" placeholder="Answer" required>
                <div class="form-check">
                    <input type="checkbox" v-model="answer.is_correct" class="form-check-input">
                    <label class="form-check-label">Correct Answer</label>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" @click="addAnswer(questionIndex)">Add Answer</button>
            <button type="button" class="btn btn-danger" @click="removeQuestion(questionIndex)">Remove Question</button>
        </div>
        <button type="button" class="btn btn-primary" @click="addQuestion">Add Question</button>
        <button type="button" class="btn btn-success" @click="submitQuiz">Submit Quiz</button>
    </div>
</div>



 
</div>






</template>

<script>
export default {
    data() {
    return {
        showModal: false,
        QuizInformation:{},
        modelData: {
            QuizID: '',
            QuizName: '',
            QuestionsAnswers: [],
            QuestionsToRemove: []
        }
    };
},
mounted(){
    this.checkApi();
},
methods: {
    checkApi(){
   this.$axios.post(this.baseUrl+"ReturnAllQuizes").then(Response=>{this.QuizInformation=Response.data.message})
},
    openModal(id) {
        this.showModal = true;
        this.$axios.post(this.baseUrl + "ReturnCustomQuizes/" + id).then(response => {
            this.modelData.QuizID = id;  // Ensure correct property
            this.modelData.QuizName = response.data.QuizName;
            this.modelData.QuestionsAnswers = response.data.message.map(question => {
                question.answers = question.answers.map(answer => {
                    answer.is_correct = answer.is_correct == 1;
                    return answer;
                });
                return question;
            });
        });
    },
    closeModal() {
        this.showModal = false;
    },
    addQuestion() {
        this.modelData.QuestionsAnswers.push({
            id: null,  // ID is null for new questions
            question: '',
            answers: [{
                id: null,
                answer: '',
                is_correct: false
            }]
        });
    },
    removeQuestion(questionIndex) {
        const question = this.modelData.QuestionsAnswers[questionIndex];
        if (question.id) {
            this.modelData.QuestionsToRemove.push(question.id);
        }
        this.modelData.QuestionsAnswers.splice(questionIndex, 1);
    },
    addAnswer(questionIndex) {
        this.modelData.QuestionsAnswers[questionIndex].answers.push({
            id: null,
            answer: '',
            is_correct: false
        });
    },
    submitQuiz() {
         const quizData = this.modelData.QuestionsAnswers.map(question => { 
            question.answers = question.answers.map(answer => { answer.is_correct = answer.is_correct ? 1 : 0; return answer; }); 
            return question; 
        }); 
        // Log data before sending 
        console.log('Quiz Data to Send:', { quizName: this.modelData.QuizName, questions: quizData, questionsToRemove: this.modelData.QuestionsToRemove }); this.$axios.post(this.baseUrl + "UpdateQuiz/" + this.modelData.QuizID, 
        { quizName: this.modelData.QuizName, questions: quizData, questionsToRemove: this.modelData.QuestionsToRemove }
        )
        
        .then(response => { 
            // Handle the response if needed 
        console.log('Quiz updated successfully', response.data); }).catch(error => { 
            // Handle errors if needed 
        console.error('Error updating quiz', error);
        console.error('Error response:', error.response); 
         
        }); 
        // Close the modal after submitting 
    this.closeModal(); 
    }
}


}
</script>

<style lang="scss">

/* The Modal (background) */
.modal {
    display: block; /* Show the modal */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

td i{
    font-size: 42px;
    color:navy;
}
</style>