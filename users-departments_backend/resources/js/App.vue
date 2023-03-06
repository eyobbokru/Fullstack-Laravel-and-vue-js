

 <template>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Laravel Vue CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="/home" class="nav-link">Home</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/users" class="nav-link">Users</router-link>
              </li>

              <li class="nav-item">

                <div>
                  <slot></slot>
                </div>
        <router-link to="/departments" class="nav-link">Departments</router-link>
      </li>
    </ul>
  </div>
</nav>

<router-view></router-view>
  </div>
</template>


<script>
import Home from './components/Home.vue';
import Users from './components/Users.vue';
import Departments from './components/Departments.vue';

export default {
  name: 'App',
  components: {
    Home,
    Users,
    Departments,
  },
};
</script>
<style>
.container {
  margin-top: 20px;
}
</style>

