<template>
    <div>
        <div class="app-container app-theme-white body-tabs-shadow">
<div class="app-container">
<div class="h-100">
<div class="h-100 no-gutters row">
<div class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-7">
<div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
<div class="app-logo"></div>
<h4>
<div>Welcome,</div>
<span>It only takes a <span class="text-success">few seconds</span> to create your account</span>
</h4>
<div>
<form class="" @submit.prevent="CreateNewUser">
        <div class="alert alert-success" role="alert" v-if="message.success">
        {{ message.success }}
        </div>
        <div class="alert alert-danger" role="alert"  v-for="error in message.error" :key="error.id">
        {{ error[0] }}
        </div>
        
<div class="form-row">
<div class="col-md-6">
<div class="position-relative form-group">
<label for="exampleEmail" class=""><span class="text-danger">*</span> Email</label>
<input name="email" id="exampleEmail" placeholder="Email here..." type="email" class="form-control" required>
</div>
</div>
<div class="col-md-6">
<div class="position-relative form-group">
<label for="exampleName" class="">Name</label>
<input name="FUllname" id="exampleName" placeholder="Name here..." type="text" class="form-control" required>
</div>
</div>
<div class="col-md-6">
<div class="position-relative form-group">
<label for="examplePassword" class=""><span class="text-danger">*</span> Password</label>
<input name="password" id="examplePassword" placeholder="Password here..." type="password" class="form-control" required>
</div>
</div>
<!-- <div class="col-md-6">
<div class="position-relative form-group">
<label for="examplePasswordRep" class=""><span class="text-danger">*</span> Repeat Password</label>
<input name="passwordrep" id="examplePasswordRep" placeholder="Repeat Password here..." type="password" class="form-control">
</div>
</div> -->
</div>
<div class="mt-3 position-relative form-check">
<input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
<label for="exampleCheck" class="form-check-label">Accept our <a href="javascript:void(0);">Terms and Conditions</a>.</label>
</div>
<div class="mt-4 d-flex align-items-center">
<div class="ml-auto">
<button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">Create Account </button>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="d-lg-flex d-xs-none col-lg-5">
<div class="slider-light">
<div class="slick-slider slick-initialized">
<div>
<div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
<div class="slide-img-bg" style="background-image: url('assets/images/originals/citynights.jpg');"></div>
<div class="slider-content">
<h3>Scalable, Modular, Consistent</h3>
<p>Easily exclude the components you don't require. Lightweight, consistent
Bootstrap based styles across all elements and components
</p>
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
</template>

<script>

    export default {

    
data(){
    return{
        message:{}
    }
},
mounted(){

},
methods:{
    CreateNewUser(){
        let UserData={};
        UserData.email=document.getElementById("exampleEmail").value;
        UserData.name=document.getElementById("exampleName").value;
        UserData.password=document.getElementById("examplePassword").value
        this.$axios.post(this.baseUrl+'create_user',{UserData}).then(Response=>{
            if(Response.data.status=='false')
        {
            this.message.error=Response.data.message
            this.message.success=""
        }
        else{
            this.message.success=Response.data.message
            this.message.error=""
        }

        }).catch(error => { 
            // Handle errors if needed 
        console.error(error);
        console.error('Error response:', error.response.data.error); 
         
        }); 

        
    }
}
}
</script>

<style lang="scss" scoped>


</style>