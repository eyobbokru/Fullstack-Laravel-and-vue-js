
<script setup>

import useDepartments from '@/composables/departments'


import { onMounted } from 'vue';


const { departments, getDepartments, destroyDepartment } = useDepartments()


const deleteDepartment = async (id) => {
    if (!window.confirm('You sure?')) {
        return
    }

    await destroyDepartment(id)
    await getDepartments()
}

onMounted(getDepartments)


</script>
<template>
<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title">Departments</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><router-link :to="{ name: 'departments.index'}">Departments</router-link></li>
                    <li class="breadcrumb-item active">index</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">

    <div class="col-12"
    >

    <div class="col-8 mx-auto">
        <div class="card-box">
           
            <div class="float-end mr-5 mb-3">
            
            <router-link :to="{ name: 'departments.create'}"  class="btn btn-success rounded-md waves-effect waves-light ">Create New</router-link>
        </div>

            <h5 class="header-title mt-0 mb-3 ">List of Departments</h5>
          
            <div class="table-responsive mx-auto">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        <template v-for="item in departments" :key="item.id">
                        
                        <tr>
                            <td>{{ item.id }}</td>
                           <td>{{ item.name }}</td>
                            <td>
                               
                                <router-link :to="{ name: 'departments.show', params: { id: item.id } }" class="btn btn-icon waves-effect waves-light btn-warning m-1" href=""> show</router-link>
                                <router-link :to="{ name: 'departments.edit', params: { id: item.id } }" class="btn btn-icon waves-effect waves-light btn-primary m-1" href=""> edit</router-link>
                                  
                                    <button  @click="deleteDepartment(item.id)" class="btn btn-icon waves-effect waves-light btn-danger show_confirm m-1" data-toggle="tooltip"> delete</button>
                               
                            </td>
                           
                        </tr>
                     
                       
                        </template>
                    </tbody>
                </table>
             
                
                <div class="col-md-12">
                  
                </div>
            </div>
        </div>
    </div><!-- end col -->


</div>

</div>






</div>
</template>