<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Footer from './components/Footer.vue';
import TopNav from './components/TopNav.vue';

</script>

<template>
  <TopNav/>
  <div class="content-page">
        <div class="content mb-5" >
                   <main>
                    <slot></slot>

                    <RouterView />
                   </main>

                 </div>

        </div>

    <Footer/>

</template>

