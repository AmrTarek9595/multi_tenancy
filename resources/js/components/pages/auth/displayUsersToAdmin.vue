<template>

    <div class="app-page-title">
    <div class="page-title-wrapper">
    <div class="page-title-heading">
    <div class="page-title-icon">
    <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
    </div>
    <div>Sutednts
    <div class="page-title-subheading">Choose between Students to Edit</div>
    </div>
    </div>
    
    </div>
    </div> <div class="main-card mb-3 card">
    <div class="card-body">
    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
    <thead>
    <tr>
    <th>Student Name</th>
    <th>Created Date</th>
    <th># of Quizz</th>
    <th>Edit</th>
    
    </tr>
    </thead>
    <tbody>
    <tr v-for="data in UsersData.Students" :key="data.key">
    <td>{{ data.name }}</td>
    <td>{{ data.created_at }}</td>
    <td>0</td>
    <td @click="openModal(data.id)"><i class="metismenu-icon pe-7s-way" ></i></td>
    <td @click="RemoveUser(data.id)"><i class="metismenu-icon pe-7s-trash" ></i></td>
    
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <th>Student Name</th>
    <th>Created Date</th>
    <th># of Quizz</th>
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
            <div class="app-main__inner">

<div class="tab-content">
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
<div class="col-md-12 col-lg-12">
<div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">User Informations</h5>
                    <form class="" @submit.prevent="submitForm">
                        <div class="alert alert-success" role="alert" v-if="message.success">
        {{ message.success }}
        </div>
        <div class="alert alert-danger" role="alert"  v-for="error in message.error" :key="error.id">
        {{ error[0] }}
        </div>
                        <div class="position-relative form-group">
                        <label for="exampleName" class="">Name</label>
                        <input id="exampleName" placeholder="with a placeholder" type="text" class="form-control"  v-model="ModelData.name">
                        </div>

                        <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Email</label>
                        <input name="email" id="exampleEmail" placeholder="with a placeholder" type="email" class="form-control" v-model="ModelData.email">
                        </div>

                        <div class="position-relative form-group">
                        <label for="examplePassword" class="">Password</label>
                        <input name="password" id="examplePassword" placeholder="Update Password" type="password" class="form-control" v-model="ModelData.password">
                        </div>

                        <div class="position-relative form-check">
                        <label class="form-check-label">
                        <!-- <input type="checkbox" class="form-check-input" v-bind="ModelData.U"> Check me out -->
                        <input type="checkbox" class="form-check-input" value="1" v-model="ModelData.isCheckedForAdmin">Make Admin
                    </label>
                    
                        </div>


                        <button type="submit" class="mt-1 btn btn-success" >Submit Edit</button>

                    </form>
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
        data() {
        return {
            
            showModal: false,
            UsersData:{},
            ModelData:{
                isCheckedForAdmin: false
            },
            message:{
                success:"",
                error:""
            }
         
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
            this.UsersData.Admins=Response.data.Admins;
        }
    )
    },
        openModal(id) {
            this.showModal = true;
            this.$axios.post(this.baseUrl+'DisplayCutomUsers/'+id).then(Response=>{
                this.ModelData=Response.data.message[0];
             
                // console.log(this.ModelData.get.name)
            });
          
        },
        closeModal() {
            this.showModal = false;
        },
   
 
   
        submitForm() {

            let formData=new FormData();
            formData.append('UserID', this.ModelData.id);
            formData.append('name', this.ModelData.name);
            formData.append('email',this.ModelData.email);

            if(this.ModelData.isCheckedForAdmin==true)
        {
            formData.append('isAdmin',true);

            if(!this.ModelData.password)
            {
                this.$axios.post(this.baseUrl+'UpdateUserData',formData).then(
                    Response=>{
                        if(Response.data.status=="true")
                    {
                        this.message.success=Response.data.message
                        this.message.error="";
                    }
                    else
                    {
                        this.message.error=Response.data.message
                        this.message.success=""

                    }
                    }
                )
            }
            else
            {
                formData.append('password',this.ModelData.password);
                this.$axios.post(this.baseUrl+'UpdateUserData',formData).then(
                    Response=>{
                        if(Response.data.status=="true")
                    {
                        this.message.success=Response.data.message
                        this.message.error=""
                    }
                    else
                    {
                        this.message.error=Response.data.message
                        this.message.success=""

                    }
                    }
                )
            }

            
        }
        else{
            formData.append('isAdmin',false);

            if(!this.ModelData.password)
            {
                this.$axios.post(this.baseUrl+'UpdateUserData',formData).then(
                    Response=>{
                        if(Response.data.status=="true")
                    {
                        this.message.success=Response.data.message
                        this.message.error=""
                    }
                    else
                    {
                        this.message.error=Response.data.message
                        this.message.success=""

                    }
                    }
                )
            }
            else
            {
                formData.append('password',this.ModelData.password);
                this.$axios.post(this.baseUrl+'UpdateUserData',formData).then(
                    Response=>{
                        if(Response.data.status=="true")
                    {
                        this.message.success=Response.data.message
                        this.message.error=""
                    }
                    else
                    {
                        this.message.error=Response.data.message
                        this.message.success=""

                    }
                    }
                )
            }
        }
       
            // Close the modal after submitting 
        // this.closeModal(); 
        },
        RemoveUser(Userid){
            if (confirm("Are you sure you want to delete this Student?")) {

            this.$axios.post(this.baseUrl+'DeleteStudent/'+Userid).then(Response=>{
               alert(Response.data.message)
               this.checkApi();
            })
        }
        else{
            this.checkApi();

        }
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