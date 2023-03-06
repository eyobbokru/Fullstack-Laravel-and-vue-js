
<script setup>
import useUsers from '@/composables/Users'
import useDepartments from "@/composables/departments";

import { reactive,onMounted } from 'vue'

const form = reactive({
    name: '',
    email:'',
    departments :[],
   
})

const { errors, storeUser } = useUsers()
const {  departments, getDepartments } = useDepartments()

const saveUser = async () => {
    await storeUser({ ...form })
}

onMounted(getDepartments)
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
                    <li class="breadcrumb-item active">Create</li>
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
           

            <h5 class="header-title mt-0 mb-3">Create Users</h5>
            <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-red rounded font-bold mb-4  py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>
            <form class="form-horizontal" role="form" data-parsley-validate novalidate @submit.prevent="saveUser">
               

                <div class="form-group row mb-3">
                    <label for="inputname" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-7">
                        <input type="text" required parsley-type="text" class="form-control"
                               id="inputEmail3" placeholder="name" name="name"  v-model="form.name">
                    </div>
                  
                </div>
                <div class="form-group row mb-3">

                <label for="inputname" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-7">
                        <input type="email" required parsley-type="text" class="form-control"
                               id="inputEmail3" placeholder="email" name="email"  v-model="form.email">
                    </div>
             </div>
                            
             <div class="form-group row mb-3">
          <label for="departments" class="col-sm-4 col-form-label"> Departments</label>
          <div class="col-sm-7">
          <select multiple id="departments" v-model="form.departments" class="form-control" required>
            <option v-for="department in departments" :key="department.id" :value="department.id">{{ department.name }}</option>
          </select>
          </div>
        </div>
          
                
            
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary waves-effect waves-light m-1">
                            Add
                        </button>
                        <button type="reset"
                                class="btn btn-secondary waves-effect waves-light m-1">
                            Cancel
                        </button>
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