
<script setup>
import useDepartments from "@/composables/departments";

import { onMounted } from "vue";

const { errors, department, getDepartment, updateDepartment } = useDepartments()

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(async () => {
   onMounted(getDepartment(props.id))
})


const saveDepartment = async () => {
    await updateDepartment(props.id)
}



</script>



<template>
    <div>
        <div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title">Departments</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><router-link :to="{ name: 'departments.index'}">Departments</router-link></li>
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
           

            <h5 class="header-title mt-0 mb-3">Update Department</h5>
            <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-red rounded font-bold mb-4  py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>
            <form class="form-horizontal" role="form" data-parsley-validate novalidate @submit.prevent="saveDepartment">
               

                <div class="form-group row">
                    <label for="inputname" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-7">
                        <input type="text" required parsley-type="text" class="form-control"
                               id="inputEmail3" placeholder="name"   v-model="department.name">
                    </div>
                    
                            
                </div>
             
                
            
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                            update
                        </button>
                        <button type="reset"
                                class="btn btn-secondary waves-effect waves-light">
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
