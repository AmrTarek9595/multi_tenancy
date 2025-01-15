<template>
    <div class="app-page-title">
 <div class="page-title-wrapper">
 <div class="page-title-heading">
 <div class="page-title-icon">
 <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
 </div>
 <div>Analytics Dashboard
 <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.</div>
 </div>
 </div>
  </div>
 </div> 
 
 <div class="tabs-animation">
 <div class="mb-3 card">
 <div class="card-header-tab card-header">
 <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
 <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
 Portfolio Performance
 </div>
 <div class="btn-actions-pane-right text-capitalize">
 </div>
 </div>
 <div class="no-gutters row">
 <div class="col-sm-6 col-md-4 col-xl-4">
 <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
 <div class="icon-wrapper rounded-circle">
 <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
 <i class="lnr-laptop-phone text-dark opacity-8"></i>
 </div>
 <div class="widget-chart-content">
 <div class="widget-subheading">Total Quizzes</div>
 <div class="widget-numbers">{{ Quizz.CountOfSolved.length+Quizz.CountOfUnSolved.length }}</div>
 <div class="widget-description opacity-8 text-focus">
 
 </div>
 </div>
 </div>
 <div class="divider m-0 d-md-none d-sm-block"></div>
 </div>
 <div class="col-sm-6 col-md-4 col-xl-4">
 <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
 <div class="icon-wrapper rounded-circle">
 <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
 <i class="lnr-graduation-hat text-white"></i>
 </div>
 <div class="widget-chart-content">
 <div class="widget-subheading">Completed Quizzes</div>
 <div class="widget-numbers text-success"><span>{{ Quizz.CountOfSolved.length }}</span></div>

 </div>
 </div>
 <div class="divider m-0 d-md-none d-sm-block"></div>
 </div>
 <div class="col-sm-12 col-md-4 col-xl-4">
 <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
 <div class="icon-wrapper rounded-circle">
 <div class="icon-wrapper-bg opacity-9 bg-success"></div>
 <i class="lnr-apartment text-white"></i>
 </div>
 <div class="widget-chart-content">
 <div class="widget-subheading">Unsolved Yet!</div>
 <div class="widget-numbers"><span>{{ Quizz.CountOfUnSolved.length }}</span></div>
 <!-- <div class="widget-description text-focus">
 Increased by
 <span class="text-warning pl-1">
 <i class="fa fa-angle-up"></i>
 <span class="pl-1">7.35%</span>
 </span>
 </div> -->
 </div>
 </div>
 </div>
 </div>
 
 </div>
 
 
 
 <div class="row">
 <div class="col-sm-12 col-lg-6">
 <div class="card-hover-shadow-2x mb-3 card">
 <div class="card-header-tab card-header">
 <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
 <i class="header-icon lnr-database icon-gradient bg-malibu-beach"> </i>UnSolved Quizzes
 </div>
 <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
 
 </div>
 </div>
 <div class="scroll-area-lg">
 <div class="scrollbar-container">
 <div class="p-2">
 <ul class="todo-list-wrapper list-group list-group-flush">
  
 <li class="list-group-item" v-for="QuizzData in Quizz.CountOfUnSolved" :key="QuizzData.id">
 <div class="todo-indicator bg-focus"></div>
 <div class="widget-content p-0">
 <div class="widget-content-wrapper">
 <div class="widget-content-left mr-2">
 <div class="custom-checkbox custom-control">
 </div>
 </div>
 <div class="widget-content-left">
 <router-link to="/user/displayQuizz" class="widget-heading">{{ QuizzData.nameOfQuiz }}</router-link>
 <div class="widget-subheading">
 <div>
 <div class="badge badge-pill badge-info ml-2">{{ QuizzData.created_at }}</div>
 </div>
 </div>
 </div>
 <div class="widget-content-right widget-content-actions">
 <div class="d-inline-block dropdown">


 </div>
 </div>
 </div>
 </div>
 </li>
 
 
 
 
 
 
 
 </ul>
 </div>
 </div>
 </div>
 <!-- <div class="d-block text-right card-footer">
 <button class="mr-2 btn btn-link btn-sm">Cancel</button>
 <button class="btn btn-primary">Add Task</button>
 </div> -->
 </div>
 </div>
 <div class="col-sm-12 col-lg-6">
 <div class="card-hover-shadow-2x mb-3 card">
 <div class="card-header-tab card-header">
 <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
 <i class="header-icon lnr-printer icon-gradient bg-ripe-malin"> </i>Chat Box
 </div>
 <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
 
 </div>
 </div>
 <div class="scroll-area-lg">
 <div class="scrollbar-container">
 <div class="p-2">
 <div class="chat-wrapper p-1">
 <div class="chat-box-wrapper">
 <div>
 <div class="avatar-icon-wrapper mr-1">
 <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg">
 </div>
 <div class="avatar-icon avatar-icon-lg rounded">
 <img src="assets/images/avatars/2.jpg" alt="">
 </div>
 </div>
 </div>
 <div>
 <div class="chat-box">But I must explain to you how all this mistaken
 idea of denouncing pleasure and praising pain was born and I will
 give you a complete account of the system.</div>
 <small class="opacity-6">
 <i class="fa fa-calendar-alt mr-1"></i>
 11:01 AM | Yesterday
 </small>
 </div>
 </div>
 <div class="float-right">
 <div class="chat-box-wrapper chat-box-wrapper-right">
 <div>
 <div class="chat-box">Expound the actual teachings of the great
 explorer of the truth, the master-builder of human happiness.
 </div>
 <small class="opacity-6">
 <i class="fa fa-calendar-alt mr-1"></i>
 11:01 AM | Yesterday
 </small>
 </div>
 <div>
 <div class="avatar-icon-wrapper ml-1">
 <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg">
 </div>
 <div class="avatar-icon avatar-icon-lg rounded">
 <img src="assets/images/avatars/3.jpg" alt="">
 </div>
 </div>
 </div>
 </div>
 </div>
 <div class="chat-box-wrapper">
 <div>
 <div class="avatar-icon-wrapper mr-1">
 <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg">
 </div>
 <div class="avatar-icon avatar-icon-lg rounded">
 <img src="assets/images/avatars/2.jpg" alt="">
 </div>
 </div>
 </div>
 <div>
 <div class="chat-box">But I must explain to you how all this mistaken
 idea of denouncing pleasure and praising pain was born and I will
 give you a complete account of the system.</div>
 <small class="opacity-6">
 <i class="fa fa-calendar-alt mr-1"></i>
 11:01 AM | Yesterday
 </small>
 </div>
 </div>
 <div class="float-right">
 <div class="chat-box-wrapper chat-box-wrapper-right">
 <div>
 <div class="chat-box">Denouncing pleasure and praising pain was born
 and I will give you a complete account.</div>
 <small class="opacity-6">
 <i class="fa fa-calendar-alt mr-1"></i>
 11:01 AM | Yesterday
 </small>
 </div>
 <div>
 <div class="avatar-icon-wrapper ml-1">
 <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg">
 </div>
 <div class="avatar-icon avatar-icon-lg rounded">
 <img src="assets/images/avatars/2.jpg" alt="">
 </div>
 </div>
 </div>
 </div>
 </div>
 <div class="float-right">
 <div class="chat-box-wrapper chat-box-wrapper-right">
 <div>
 <div class="chat-box">The master-builder of human happiness.</div>
 <small class="opacity-6">
 <i class="fa fa-calendar-alt mr-1"></i>
 11:01 AM | Yesterday
 </small>
 </div>
 <div>
 <div class="avatar-icon-wrapper ml-1">
 <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg">
 </div>
 <div class="avatar-icon avatar-icon-lg rounded">
 <img src="assets/images/avatars/2.jpg" alt="">
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 <div class="card-footer">
 <input placeholder="Write here and hit enter to send..." type="text" class="form-control-sm form-control">
 </div>
 </div>
 </div>
 </div>
 
 </div>
 </template>
 
 <script>
     export default {
 data(){
    return{
            Quizz:{
                CountOfSolved:"",
                CountOfUnSolved:""
            }
    }
 },

 mounted() 
    {
    this.getQuizz();
    },



        methods:{
            getQuizz(){
            this.$axios.post(this.baseUrl+"RetriveQuizz").then(Response=>{
                this.Quizz.CountOfUnSolved=Response.data.notSolved;
                this.Quizz.CountOfSolved=Response.data.solved
                // console.log(this.Quizz.CountOfUnSolved.length+this.Quizz.CountOfSolved.length)
            })
        },
 
            }
     
 
 }
 </script>
 
 <style lang="scss" scoped>
 
 
 </style>