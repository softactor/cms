

            <!--   All Navigation url-->

    <?php
         $create_compalin_type = url('admin/create_complain_type');
         $complain_details_create_url = url('admin/complain_details_create');
         $complain_details_url = url('executive/list_complain');
         $list_complain_type_url = url('admin/list_complain_type');
         $viewComplain= url('engineer/dashboard');
         $addNewUser = url('admin/create_user');
          $ListUsers = url('admin/list_users');
  ?>
            <!-- End  All Navigation url-->

<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            
            
        <!--administrate Dashboard -->
            @if (Auth::user()->role_id==('3'))
            <span>Admin Dashboard</span>
             @endif
             
             <!--Engineer Dashboard -->
            @if (Auth::user()->role_id==('1'))
                <span>Engineer Dashboard</span>
                 @endif

                    <!--Employee Dashboard -->
            @if (Auth::user()->role_id==('2'))
                      <span>Employee Dashboard</span>
                       @endif
                       
                       <!--Executive Dashboard -->
            @if (Auth::user()->role_id==('4'))
                   <span>Executive Dashboard</span>
                    @endif

    </a>
    </li>
<<<<<<< HEAD
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.html">Login</a>
            <a class="dropdown-item" href="register.html">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.complain_type.create') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Create Complain Type</span></a>
    </li>    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.departement.create') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Departement Create</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.complain.create') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Complain</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.feedback.create') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Complain Feedback</span></a>
    </li>
</ul>
=======

    

                    <!--------  Admin Allowed Menus -------->

               @if (Auth::user()->role_id==('3'))
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-fw fa-folder"></i>
                       <span>Complains</span>
                   </a>
                   <div class="dropdown-menu" aria-labelledby="pagesDropdown">


                       <a class="dropdown-item" onclick="create_complain_type('{{ $create_compalin_type }}');">
                           <i class="fa fa-plus"></i>
                           <span>New Complain Type</span>
                       </a>


                       <a class="dropdown-item"  onclick="complain_details('{{ $complain_details_create_url }}');">
                           <i class="fa fa-comments"></i>
                           <span>Create Complain</span>
                       </a>

                       <a class="dropdown-item" onclick="list_complain('{{ $complain_details_url }}');">
                           <i class="fa fa-list"></i>
                           <span>List Complains</span>
                       </a>

                       <a class="dropdown-item" onclick="list_complain_types('{{ $list_complain_type_url }}');">
                           <i class="fa fa-list"></i>
                           <span>List Complain Types</span>
                       </a>
                   </div>
               </li>


               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-fw fa-folder"></i>
                       <span>Departments</span>
                   </a>
                   <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                       <a class="dropdown-item" href="department_create">
                           <i class="fa fa-plus"></i>
                           <span>New</span>
                       </a>
                       <a class="dropdown-item" href="department_list">
                           <i class="fa fa-list"></i>
                           <span>List</span>
                       </a>
                   </div>
               </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fa fa-user"></i>
                       <span>Users Acounts</span>
                   </a>
                   <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                       <a class="dropdown-item " onclick="addNewUser('{{$addNewUser}}')">
                           <i class="fa fa-plus"></i>
                           <span>Add User</span>
                       </a>


                       <a class="dropdown-item"onclick="listUsers('{{$ListUsers}}');">
                           <i class="fa fa-list"></i>
                           <span>List</span>
                       </a>
                   </div>
               </li>
              
              @endif
              
             <!------------------ End Admin Allowed Menus --------------------------->
             
             
             
             
             <!------------------  Employee Allowed Menus --------------------------->
             
             @if (Auth::user()->role_id==('2'))

             <a   onclick="complain_details('{{ $complain_details_create_url }}');" style="color: #ADADAD; margin-top: 10%;margin-left: 5%">
                 <i class="fa fa-plus"></i>
                 <span>Create Complain</span>
             </a>

             @endif
             
              <!------------------ End Employee Allowed Menus --------------------------->
             
             
              
                 <!------------------  Executive Allowed Menus --------------------------->
                 
                 @if (Auth::user()->role_id==('4'))
                  <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-fw fa-folder"></i>
                       <span>Complains</span>
                   </a>
                                
                   <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                       <a class="dropdown-item" onclick="create_complain_type('{{ $create_compalin_type }}');">
                           <i class="fa fa-plus"></i>
                           <span>New Complain Type</span>
                       </a>
                       <a class="dropdown-item"  onclick="complain_details('{{ $complain_details_create_url }}');">
                           <i class="fa fa-comments"></i>
                           <span>Create Complain</span>
                       </a>

                       <a class="dropdown-item" onclick="list_complain('{{ $complain_details_url }}');">
                           <i class="fa fa-list"></i>
                           <span>List Complains</span>
                       </a>

                       <a class="dropdown-item" onclick="list_complain_types('{{ $list_complain_type_url }}');">
                           <i class="fa fa-list"></i>
                           <span>List Complain Types</span>
                       </a>
                   </div>
               </li>


               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-fw fa-folder"></i>
                       <span>Departments</span>
                   </a>
                   <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                       <a class="dropdown-item" href="department_create">
                           <i class="fa fa-plus"></i>
                           <span>New</span>
                       </a>
                       <a class="dropdown-item" href="department_list">
                           <i class="fa fa-list"></i>
                           <span>List</span>
                       </a>
                   </div>
               </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fa fa-user"></i>
                       <span>Users Acounts</span>
                   </a>
                   <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                       <a class="dropdown-item " onclick="addNewUser('{{$addNewUser}}')">
                           <i class="fa fa-plus"></i>
                           <span>Add User</span>
                       </a>


                       <a class="dropdown-item"onclick="listUsers('{{$ListUsers}}');">
                           <i class="fa fa-list"></i>
                           <span>List</span>
                       </a>
                   </div>
               </li>
              
                 
                 @endif
                 
                  <!------------------ End Executive Allowed Menus --------------------------->
             
             
                  <!------------------  Engineer Allowed Menus --------------------------->
                                    @if (Auth::user()->role_id==('1'))
                                     <li class="nav-item dropdown">
                                         <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               <i class="fa fa-eye"></i>
                                        <span>View Complains</span>
                                         </a>
                                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                                        
                                        <a class="dropdown-item" href="/cms/engineer/dashboard">
                                      <span>complain</span>
                                    </a>
                                    </div>
                                         </li>
                                    @endif
             
                <!------------------ End Engineer Allowed Menus --------------------------->
            
             
             
           
                  
   

<!--                       <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Complains FeedBack</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                                <a class="dropdown-item"  href="{{ route('admin.feedback.create') }}">
                                    <i class="fa fa-comments"></i>
                                    <span>Create FeedBack</span>
                                </a>
                                <a class="dropdown-item" href="feedback_list">
                                    <i class="fa fa-list"></i>
                                    <span>List Complains</span>
                                </a>
                            </div>
                        </li>
    -->
      
 
                        <!--complain feed back List Start-->
                  
    
    
  
</ul>
        
>>>>>>> 86940859d2627c92754b58755e1a28b85b7adc7e
