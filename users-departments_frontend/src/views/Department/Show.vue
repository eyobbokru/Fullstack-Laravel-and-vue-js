
<script setup>
import useDepartments from "@/composables/departments";

import { onMounted } from "vue";

const {  department, getDepartment } = useDepartments()

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(async () => {
   onMounted(getDepartment(props.id))
})




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
           

            <h5 class="header-title mt-0 mb-3">Show Department</h5>
        
            <form class="form-horizontal" role="form" data-parsley-validate novalidate >
               

                <div class="form-group row">
                    <label for="inputname" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-7">
                        <input type="text" required parsley-type="text" class="form-control"
                               id="inputEmail3" placeholder="name"   v-model="department.name" disabled>
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