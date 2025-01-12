<template>
    <div>
        <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
<div class="app-header header-shadow">
<div class="app-header__logo">
<div class="logo-src"></div>
<div class="header__pane ml-auto">
<div>
<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
</button>
</div>
</div>
</div>
<div class="app-header__mobile-menu">
<div>
<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
</button>
</div>
</div>
<div class="app-header__menu">
<span>
<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
<span class="btn-icon-wrapper">
<i class="fa fa-ellipsis-v fa-w-6"></i>
</span>
</button>
</span>
</div> <div class="app-header__content">
<div class="app-header-left">
<div class="search-wrapper">
<div class="input-holder">
<input type="text" class="search-input" placeholder="Type to search">
<button class="search-icon"><span></span></button>
</div>
<button class="close"></button>
</div>


</div>
<div class="app-header-right">

<div class="header-btn-lg pr-0">
<div class="widget-content p-0">
<div class="widget-content-wrapper">
<div class="widget-content-left">
<div class="btn-group">
<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
<!-- <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""> -->
<i class="fa fa-angle-down ml-2 opacity-8"></i>
</a>
<div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
<div class="dropdown-menu-header">
<div class="dropdown-menu-header-inner bg-info">
<div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
<div class="menu-header-content text-left">
<div class="widget-content p-0">
<div class="widget-content-wrapper">
<div class="widget-content-left mr-3">
<!-- <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""> -->
</div>
<div class="widget-content-left">
<div class="widget-heading">{{ user_data.name }}</div>
<div class="widget-subheading opacity-8">A short profile description</div>
</div>
<div class="widget-content-right mr-2">
<button class="btn-pill btn-shadow btn-shine btn btn-focus" @click="logout">Logout</button>
</div>
</div>
</div>
</div>
</div>
</div>




</div>
</div>
</div>
<div class="widget-content-left  ml-3 header-user-info">
<div class="widget-heading">{{ user_data.name }}</div>
<div class="widget-subheading" v-if="user_data.type==1"> Admin</div>
<div class="widget-subheading" v-if="user_data.type==0"> Student</div>

</div>
<div class="widget-content-right header-user-info ml-3">
<button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
<i class="fa text-white fa-calendar pr-1 pl-1"></i>
</button>
</div>
</div>
</div>
</div>

</div>
</div>
</div> 

<div class="app-main">
<div class="app-sidebar sidebar-shadow">
<div class="app-header__logo">
<div class="logo-src"></div>
<div class="header__pane ml-auto">
<div>
<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
</button>
</div>
</div>
</div>
<div class="app-header__mobile-menu">
<div>
<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
</button>
</div>
</div>
<div class="app-header__menu">
<span>
<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
<span class="btn-icon-wrapper">
<i class="fa fa-ellipsis-v fa-w-6"></i>
</span>
</button>
</span>
</div> <div class="scrollbar-sidebar">
<div class="app-sidebar__inner">
<ul class="vertical-nav-menu">
<li class="app-sidebar__heading">Menu</li>
<li class="mm-active">
<a href="#">
<i class="metismenu-icon pe-7s-rocket"></i>Dashboards
<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
</a>
<ul>
<li>
<router-link to="/user" class="">
<i class="metismenu-icon"></i>Home
</router-link>
</li>
<li>
<router-link to="/user/displayQuizz">
<i class="metismenu-icon"></i>Quizz
</router-link>
</li>
<li>
<router-link to="/newQuiz">
<i class="metismenu-icon">
</i>Done Quizz
</router-link>
</li>





</ul>
</li>


</ul>
</div>
</div>
</div><div class="app-main__outer">
<div class="app-main__inner">





<router-view></router-view>







</div>
</div>
</div>
</div>

<div class="app-drawer-overlay d-none animated fadeIn"></div>
    </div>
</template>

<script>
import axios from 'axios';

export default{
    data:()=>({
        user_data:{}
    }),
    mounted(){
        // this.chechk_type_of_user();
        this.return_data_of_user();
    },
    methods:{
        chechk_type_of_user(){
            let userType = localStorage.getItem("type"); 
            if (userType.toLowerCase() === 'user') 
            { 
                this.$router.push("/user"); 
            } 
            else if (userType.toLowerCase() === 'admin') 
            { 
                this.$router.push("/"); 
            }


        },
        return_data_of_user() {

    axios.post(this.baseUrl+"return_current_user_data", {
      // Add any data you want to send in the request body
    }, {
      headers: {
        Authorization: `Bearer ${this.access_token}` // Include the Bearer token in the Authorization header
      }
    })
      .then(response => {
        this.user_data=response.data.message;
        console.log(this.user_data.type)
      })
      .catch(error => {
        console.error('Error fetching user data:', error);
        // Handle errors appropriately (e.g., unauthorized access, network issues)
      });
  },
  logout(){
   this.$axios.post(this.baseUrl+"logout").then(
    Response=>{
      if(Response.data.status=="true")
    {
      localStorage.clear();
      window.location.href='/';
    }
    }
   )
  }
    }
}

</script>

<style lang="scss" scoped>
.router-link-active{
    color: #3f6ad8;
    background: #e0f3ff;
    font-weight: 700;
}

</style>