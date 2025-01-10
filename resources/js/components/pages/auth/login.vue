<template>
    <div class="app-container app-theme-white body-tabs-shadow">
<div class="app-container">
<div class="h-100">
<div class="h-100 no-gutters row">
<div class="d-none d-lg-block col-lg-4">
<div class="slider-light">
<div class="slick-slider">
<div>
<div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
<div class="slide-img-bg" style="background-image: url('/assets/images/originals/city.jpg');"></div>
<div class="slider-content">
<h3>Perfect Balance</h3>
<p>ArchitectUI is like a dream. Some think it's too good to be true! Extensive
collection of unified React Boostrap Components and Elements.
</p>
</div>
</div>
</div>
<div>

</div>
<div>

</div>
</div>
</div>
</div>
<div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
<div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
<div class="app-logo"></div>
<h4 class="mb-0">
<span class="d-block">Welcome back,</span>
<span>Please sign in to your account.</span>
</h4>
<h6 class="mt-3">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6>
<div class="divider row"></div>
<div>
<form class="" @submit.prevent="login_method">
    <div class="alert alert-danger" role="alert" v-if="err_message">
    {{ err_message }}
</div>
<div class="form-row">
<div class="col-md-6">
<div class="position-relative form-group">
<label for="exampleEmail" class="">Email</label>
<input name="email" id="exampleEmail" placeholder="Email here..." type="email" class="form-control" >
</div>
</div>
<div class="col-md-6">
<div class="position-relative form-group">
<label for="examplePassword" class="">Password</label>
<input name="password" id="examplePassword" placeholder="Password here..." type="password" class="form-control" required>
</div>
</div>
</div>
<div class="position-relative form-check">
<!-- <input name="check" id="exampleCheck" type="checkbox" class="form-check-input"> -->
<!-- <label for="exampleCheck" class="form-check-label">Keep me logged in</label> -->
</div>
<div class="divider row"></div>
<div class="d-flex align-items-center">
<div class="ml-auto">
<!-- <a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a> -->
<button class="btn btn-primary btn-lg" type="submit">Login to Dashboard</button>
</div>
</div>
</form>
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
       

        data:()=>({
            err_message:''
        }),
        
        mounted(){
           // Utility to handle mixins in Vue 3 export default { 
           this.handle_if_reEnter_to_login_page();
        },
        methods:{
            login_method:function(){
                let email=document.getElementById('exampleEmail').value;
                let paswd=document.getElementById('examplePassword').value;
                let subdomain=localStorage.getItem('subdomain');

                this.$axios.post(this.baseUrl+"login?email="+email+'&password='+paswd).
                then(
                    response=>{ 
                       if(response.data.status=='false') 
                            {
                                this.err_message=response.data.message
                            }
                            else{

                                if(response.data.status=="User")
                                {
                                    localStorage.setItem('type',response.data.status);
                                    localStorage.setItem('access_token',response.data.message.access_token);
                                    location.href="/user"

                                }
                                else if(response.data.status=="Admin")
                                {
                                    localStorage.setItem('type',response.data.status);
                                    localStorage.setItem('access_token',response.data.message.access_token);
                                    location.href="/"

                                }

                            }
                    }
            )

            },
            handle_if_reEnter_to_login_page:function(){
                if(localStorage.getItem('type')=='Admin' ||localStorage.getItem('type')=='admin')
                {
                    location.href="/";
                }
                else if(localStorage.getItem('type')=='User'||localStorage.getItem('type')=='user'){
                    location.href="/user";

                }
            }
        }
    

}
</script>

<style lang="scss" scoped>


</style>