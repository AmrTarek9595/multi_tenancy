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
<div class="header-dots">

<div class="dropdown">
<button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
<span class="icon-wrapper icon-wrapper-alt rounded-circle">
<span class="icon-wrapper-bg bg-danger"></span>
<i class="icon text-danger icon-anim-pulse ion-android-notifications"></i>
<span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
</span>
</button>
<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
<div class="dropdown-menu-header mb-0">
<div class="dropdown-menu-header-inner bg-deep-blue">
<div class="menu-header-image opacity-1" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
<div class="menu-header-content text-dark">
<h5 class="menu-header-title">Notifications</h5>
<h6 class="menu-header-subtitle">You have <b>21</b> unread messages</h6>
</div>
</div>
</div>
<ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
<li class="nav-item">
<a role="tab" class="nav-link active" data-toggle="tab" href="#tab-messages-header">
<span>Messages</span>
</a>
</li>



</ul>

<div class="tab-content">
<div class="tab-pane active" id="tab-messages-header" role="tabpanel">
<div class="scroll-area-sm">
<div class="scrollbar-container">
<div class="p-3">
<div class="notifications-box">
<div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
<div class="vertical-timeline-item dot-danger vertical-timeline-element">
<div><span class="vertical-timeline-element-icon bounce-in"></span>
<div class="vertical-timeline-element-content bounce-in">
<h4 class="timeline-title">All Hands Meeting</h4>
<span class="vertical-timeline-element-date"></span>
</div>
</div>
</div>
<div class="vertical-timeline-item dot-warning vertical-timeline-element">
<div>
<span class="vertical-timeline-element-icon bounce-in"></span>
<div class="vertical-timeline-element-content bounce-in">
<p>Yet another one, at <span class="text-success">15:00 PM</span></p>
<span class="vertical-timeline-element-date"></span>
</div>
</div>
</div>
<div class="vertical-timeline-item dot-success vertical-timeline-element">
<div>
<span class="vertical-timeline-element-icon bounce-in"></span>
<div class="vertical-timeline-element-content bounce-in">
<h4 class="timeline-title">Build the production release
<span class="badge badge-danger ml-2">NEW</span>
</h4>
<span class="vertical-timeline-element-date"></span>
</div>
</div>
</div>
<div class="vertical-timeline-item dot-primary vertical-timeline-element">
<div>
<span class="vertical-timeline-element-icon bounce-in"></span>

</div>
</div>
<div class="vertical-timeline-item dot-info vertical-timeline-element">
<div>
<span class="vertical-timeline-element-icon bounce-in"></span>
<div class="vertical-timeline-element-content bounce-in">
<h4 class="timeline-title">This dot has an info state</h4>
<span class="vertical-timeline-element-date"></span>
</div>
</div>
</div>
<div class="vertical-timeline-item dot-danger vertical-timeline-element">
<div>
<span class="vertical-timeline-element-icon bounce-in"></span>
<div class="vertical-timeline-element-content bounce-in">
<h4 class="timeline-title">All Hands Meeting</h4>
<span class="vertical-timeline-element-date"></span>
</div>
</div>
</div>
<div class="vertical-timeline-item dot-warning vertical-timeline-element">
<div>
<span class="vertical-timeline-element-icon bounce-in"></span>
<div class="vertical-timeline-element-content bounce-in">
<p>Yet another one, at <span class="text-success">15:00 PM</span>
</p><span class="vertical-timeline-element-date"></span>
</div>
</div>
</div>
<div class="vertical-timeline-item dot-success vertical-timeline-element">
<div><span class="vertical-timeline-element-icon bounce-in"></span>
<div class="vertical-timeline-element-content bounce-in">
<h4 class="timeline-title">Build the production release
<span class="badge badge-danger ml-2">NEW</span>
</h4>
<span class="vertical-timeline-element-date"></span>
</div>
</div>
</div>
<div class="vertical-timeline-item dot-dark vertical-timeline-element">
<div><span class="vertical-timeline-element-icon bounce-in"></span>
<div class="vertical-timeline-element-content bounce-in">
<h4 class="timeline-title">This dot has a dark state</h4>
<span class="vertical-timeline-element-date"></span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


</div>

</div>
</div>


</div>
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
<button class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</button>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="scroll-area-xs" style="height: 150px;">
<div class="scrollbar-container ps">
<ul class="nav flex-column">
<li class="nav-item-header nav-item">Activity</li>
<li class="nav-item">
<a href="javascript:void(0);" class="nav-link">Chat
<div class="ml-auto badge badge-pill badge-info">8</div>
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0);" class="nav-link">Recover Password</a>
</li>
<li class="nav-item-header nav-item">My Account
</li>
<li class="nav-item">
<a href="javascript:void(0);" class="nav-link">Settings
<div class="ml-auto badge badge-success">New</div>
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0);" class="nav-link">Messages
<div class="ml-auto badge badge-warning">512</div>
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0);" class="nav-link">Logs</a>
</li>
</ul>
</div>
</div>
<ul class="nav flex-column">
<li class="nav-item-divider mb-0 nav-item"></li>
</ul>
<div class="grid-menu grid-menu-2col">
<div class="no-gutters row">
<div class="col-sm-6">
<button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
<i class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i> Message Inbox
</button>
</div>
<div class="col-sm-6">
<button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
<i class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
<b>Support Tickets</b>
</button>
</div>
</div>
</div>
<ul class="nav flex-column">
<li class="nav-item-divider nav-item">
</li>
<li class="nav-item-btn text-center nav-item">
<button class="btn-wide btn btn-primary btn-sm"> Open Messages </button>
</li>
</ul>
</div>
</div>
</div>
<div class="widget-content-left  ml-3 header-user-info">
<div class="widget-heading">{{ user_data.name }}</div>
<div class="widget-subheading" v-if="user_data.typ=1"> Admin</div>

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
<router-link to="/" class="">
<i class="metismenu-icon"></i>Home
</router-link>
</li>
<li>
<router-link to="/analytics">
<i class="metismenu-icon"></i>Analytics
</router-link>
</li>
<li>
<router-link to="/NewQuiz">
<i class="metismenu-icon">
</i>Add New Quiz
</router-link>
</li>

<li>
<router-link to="/DisplayAllQuizs">
<i class="metismenu-icon">
</i>Update Quiz
</router-link>
</li>



</ul>
</li>
<li class="mm-active">
<a href="#">
<i class="metismenu-icon pe-7s-rocket"></i>Students
<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
</a>
<ul>
<li>
<router-link to="/newuser" class="">
<i class="metismenu-icon"></i>Add New Student
</router-link>
</li>
<li>
<router-link to="!#" class="">
<i class="metismenu-icon"></i>Remove Student
</router-link>
</li>

<li>
<router-link to="!#" class="">
<i class="metismenu-icon"></i>Update Student Information
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
        this.chechk_type_of_user();
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
    // Assuming you have a way to access the token (e.g., from Local Storage)

    axios.post(this.baseUrl+"return_current_user_data", {
      // Add any data you want to send in the request body
    }, {
      headers: {
        Authorization: `Bearer ${this.access_token}` // Include the Bearer token in the Authorization header
      }
    })
      .then(response => {
        this.user_data=response.data.message;
      })
      .catch(error => {
        console.error('Error fetching user data:', error);
        // Handle errors appropriately (e.g., unauthorized access, network issues)
      });
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