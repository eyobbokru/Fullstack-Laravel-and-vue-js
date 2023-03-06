
<script setup>
import useUsers from '@/composables/Users'
import useDepartments from "@/composables/departments";

import { onMounted  } from "vue";

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

const { errors,user, getUser,updateUser  } = useUsers()
const {  departments, getDepartments } = useDepartments()

onMounted(async () => {
   onMounted(getUser(props.id))

})

const saveUser = async () => {
    await updateUser(props.id)
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
                    <li class="breadcrumb-item active">Update</li>
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
           

            <h5 class="header-title mt-0 mb-3">Update Users</h5>
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
                               id="inputEmail3" placeholder="name" name="name"  v-model="user.name">
                    </div>
                  
                </div>
                <div class="form-group row mb-3">

                <label for="inputname" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-7">
                        <input type="email" required parsley-type="text" class="form-control"
                               id="inputEmail3" placeholder="email" name="email"  v-model="user.email">
                    </div>
             </div>
                            
             
             <div class="form-group row mb-3">
          <label for="departments" class="col-sm-4 col-form-label"> Departments</label>
          <div class="col-sm-7">
            <span>selected:</span> <span v-for="dep in user.departments"  class="badge text-bg-info"> {{ dep.name }}</span>
          <select multiple id="departments" v-model="user.departments" class="form-control" required>

            <option v-for="department in departments" :key="department.id" :value="department.id"  
            :selected="user.departments.includes(department.id)">{{ department.name }}</option>
          </select>
          </div>
        </div>

            
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary waves-effect waves-light m-1">
                           Update
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