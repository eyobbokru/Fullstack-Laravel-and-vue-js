
<script setup>
import useUsers from '@/composables/Users'

import { onMounted } from "vue";

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

const { user, getUser  } = useUsers()
onMounted(async () => {
   onMounted(getUser(props.id))
})


</script>

<template>
    <div>
        <div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title">Users</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><router-link :to="{ name: 'users.index'}">User</router-link></li>
                    <li class="breadcrumb-item active">Show</li>
                </ol>
            </div>

        </div>
    </div>
</div>


<div class="row">

<div class="col-12"
>

<div class="col-12 mx-auto">
    <div class="card-box">
    <div class="col-10 mx-auto">
        <div class="card-box">
           

            <h5 class="header-title mt-0 mb-3">Show Users</h5>
          
            <form class="form-horizontal" role="form" data-parsley-validate novalidate >
               

                <div class="form-group row mb-3">
                    <label for="inputname" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-7">
                        <input type="text" required parsley-type="text" class="form-control"
                               id="inputEmail3" placeholder="name" name="name"  v-model="user.name" disabled>
                    </div>
                  
                </div>
                <div class="form-group row mb-5 ">

                <label for="inputname" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-7">
                        <input type="email" required parsley-type="text" class="form-control"
                               id="inputEmail3" placeholder="email" name="email"  v-model="user.email" disabled>
                    </div>
             </div>
             <div class="form-group row mb-3 mt-2">            
                <label for="inputname" class="col-sm-4 col-form-label">List of Departments</label>
             <div class="col-sm-7">
            <p v-for="department in user.departments" :key="department.id" :value="department.id" >
              <span class="badge text-bg-info"> {{ department.name }}</span> </p>
                
            </div>
            </div>
            </form>
        </div>
    </div><!-- end col -->
</div>
</div>

</div>
</div>

</div>
</div>
</template>