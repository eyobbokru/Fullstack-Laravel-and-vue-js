<template>
    <div>
        <header id="topnav">

<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle nav-link">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>

          

        </ul>

        <!-- LOGO -->
        <div class="logo-box">

          
            <a href="/" class="logo logo-light">
                <h3 class="mt-3"  height="16" >User Logo</h3>
              
                
            </a>
           
            
        </div>

        <div class="clearfix"></div>
    </div> <!-- end container-fluid-->
</div>
<!-- end Topbar -->

<div class="topbar-menu">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

               
                <li class="has-submenu">
                  
                    <router-link :to="{ name: 'home'}"><i class="mdi mdi-view-dashboard"></i>Dashboard</router-link>

                </li>
              

                <li class="has-submenu">

                    <router-link :to="{ name: 'departments.index'}"><i class="mdi mdi-invert-colors"></i>Departments</router-link>
                   
                 
                   
                </li>
                <li class="has-submenu">
            
                    <router-link :to="{ name: 'users.index'}"><i class="fa fa-user"></i>Users </router-link>
                   
                   
                </li>


           

            

            </ul>
            <!-- End navigation menu -->

            <div class="clearfix"></div>
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>


</header>
    </div>
</template>