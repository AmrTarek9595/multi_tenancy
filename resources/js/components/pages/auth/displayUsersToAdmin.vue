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
    <tr v-for="data in UsersData.Students" :key="data.key">
    <td>{{ data.name }}</td>
    <td>{{ data.created_at }}</td>
    <td>0</td>
    <td @click="openModal(data.id)"><i class="metismenu-icon pe-7s-way" ></i></td>
    
    </tr>
    </tbody>
    <tfoot>
    <tr>
    <th>Quiz Name</th>
    <th>Published Date</th>
 
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
            <div class="mb-3">
                <label class="form-label">Question </label>
                <input type="text"  class="form-control mb-2" required>
                <div  class="mb-2">
                    <input type="text"  class="form-control mb-2" placeholder="Answer" required>
                    <div class="form-check">
                        <input type="checkbox"  class="form-check-input">
                        <label class="form-check-label">Correct Answer</label>
                    </div>
                </div>
               
            </div>
           
            <button type="button" class="btn btn-success" @click="submitQuiz">Submit Edit</button>
        </div>
    </div>
    
    
    
     
    </div>
    
    
    
    
    
    
    </template>
    
    <script>
    export default {
        data() {
        return {
            showModal: false,
         UsersData:{}
        };
    },
    mounted(){
        this.checkApi();
    },
    methods: {
        checkApi(){
       this.$axios.post(this.baseUrl+"DisplayAllUsers").then(
        Response=>{
            this.UsersData.Students=Response.data.Students;
        }
    )
    },
        openModal(id) {
            this.showModal = true;
            // this.$axios.post(this.baseUrl + "ReturnCustomQuizes/" + id).then(response => {
            //     this.modelData.QuizID = id;  // Ensure correct property
            //     this.modelData.QuizName = response.data.QuizName;
            //     this.modelData.QuestionsAnswers = response.data.message.map(question => {
            //         question.answers = question.answers.map(answer => {
            //             answer.is_correct = answer.is_correct == 1;
            //             return answer;
            //         });
            //         return question;
            //     });
            // });
        },
        closeModal() {
            this.showModal = false;
        },
   
 
   
        submitQuiz() {

 
            
       
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