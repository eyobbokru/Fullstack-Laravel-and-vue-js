<script setup>
  import { ref, onMounted,watch } from 'vue'

import useUsers from '@/composables/Users'
import useDepartments from "@/composables/departments";

const { users, getUsers } = useUsers()
const {  departments, getDepartments } = useDepartments()


  // Define reactive variables to store the counts of users and departments
  const userCount = ref(0)
  const departmentCount = ref(0)

  // Fetch the users and departments when the component is mounted
  onMounted(async () => {
    await getUsers()
    await getDepartments()
    userCount.value = users.value.length
    departmentCount.value = departments.value.length
 
  })

</script>

<template>


<div class="container-fluid mt-5">



<div class="row mb-3">

<div class="col-12"
>

<div class="col-8 mx-auto ">
    <div class="card-box ">
      
        <div class="row">


     <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title mb-3">Total No. Users</h4>
                <div class="d-flex justify-content-between">
                    <div class="me-3">
                    <!-- <span class="badge bg-success rounded-pill">32% <i class="bi bi-arrow-up"></i></span> -->
                    </div>
                    <div class="flex-shrink-0">
                    <h2 class="fw-normal mb-1">{{userCount }}</h2>
                   
                    </div>
                </div>
                <div class="progress mt-3" style="height: 5px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 77%;" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
            </div>

  

</div><!-- end col -->
  <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title mb-3">Total No. Departments</h4>
                <div class="d-flex justify-content-between">
                    <div class="me-3">
                    <!-- <span class="badge bg-success rounded-pill">32% <i class="bi bi-arrow-up"></i></span> -->
                    </div>
                    <div class="flex-shrink-0">
                    <h2 class="fw-normal mb-1">{{ departmentCount }}</h2>
                  
                    </div>
                </div>
                <div class="progress mt-3" style="height: 5px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 77%;" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
            </div>
            </div>

</div>
<!-- end row -->


<!-- end row -->



<!-- end row -->



       
   
    </div>
    </div>

</div>
        </div>
        </div>

 
</template>
