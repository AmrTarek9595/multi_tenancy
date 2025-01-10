<template>

<login v-if="login"/>

<admin v-if="is_admin"/>

<user v-if="is_user"/>

</template>

<script>
import login from "../pages/auth/login.vue";
import User from "./user.vue";
import Admin from "./admin.vue";

    export default {
        components:{'login':login,'admin':Admin,'user':User},
        data:()=>({
            is_admin:false,
            is_user:false,
            login:false
        }),
        mounted(){
        this.return_subdomain_and_save_in_localstorage();
        this.check_if_type_admin_or_user();
        },
        methods:{
            return_subdomain_and_save_in_localstorage:function(){
                const currentUrl = window.location.href;
                const parsedUrl = new URL(currentUrl);
                const hostname = parsedUrl.hostname;
                const subdomain = hostname.split('.')[0];
                localStorage.setItem('subdomain',subdomain)
            },
            check_if_type_admin_or_user:function(){
                let user_type=localStorage.getItem('type');

            if(!user_type)
                {
                    this.login=true;
                    this.admin=false;
                    this.is_user=false;

                }
            else{
                if(user_type=='Admin')
                {   this.login=false;
                    this.is_admin=true; 
                    this.is_user=false;  
                }
                else
                {
                    this.login=false;
                    this.is_admin=false; 
                    this.is_user=true;
                }
            }
                
            }
        }
   
    

}
</script>

<style lang="scss" scoped>


</style>