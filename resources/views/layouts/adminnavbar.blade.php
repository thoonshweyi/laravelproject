<div class="col-lg-10 col-md-9 fixed-top ms-auto topnavbars">
     <div class="row">
          <nav class="navbar navbar-expand navbar-light bg-white shadow">
               <!-- search -->
               <form class="me-auto" action="" method="">
                    <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control border-0 shadow-none" placeholder="Search Something..."/>
                    <div class="input-group-append">
                         <button type="submit" class="btn btn-primary "><i class="fas fa-search"></i></button>
                    </div>
                    </div>
               </form>
               <!-- search -->

               <!-- notify & userlogout-->
               <ul class="navbar-nav me-5 pe-5">
                    <!-- notify -->
                    <li class="nav-item dropdowns">
                    <a href="javascript:void(0);" class="nav-link dropbtn" onclick="dropbtn(event)">
                         <i class="fas fa-bell"></i>
                         <span class="badge bg-danger">5+</span>
                    </a>
                    <div class="dropdown-contents mydropdowns">
                         <h6>Alert Center</h6>
                         <a href="javascript:void(0);" class="d-flex">
                              <div>
                                   <i class="fas fa-file-alt"></i>
                              </div>
                              <div>
                                   <p class="small text-muted">3 May 2023</p>
                                   <i>A new members created.</i>
                              </div>
                         </a>
                         <a href="javascript:void(0);" class="d-flex">
                              <div>
                                   <i class="fas fa-database text-warnning"></i>
                              </div>
                              <div>
                                   <p class="small text-muted">3 May 2023</p>
                                   <i>Some of your data are missing.</i>
                              </div>
                         </a>
                         <a href="javascript:void(0);" class="d-flex">
                              <div>
                                   <i class="fas fa-user text-info"></i>
                              </div>
                              <div>
                                   <p class="small text-muted">3 May 2023</p>
                                   <i>A new user are invited you</i>
                              </div>
                         </a>

                         <a href="javascript:void(0);" class="small text-muted">Show All Notification</a>
                    </div>
                    </li>
                    <!-- notify -->

                    <!-- message -->
                    <li class="nav-item dropdowns mx-3">
                    <a href="javascript:void(0);" class="nav-link dropbtn" onclick="dropbtn(event)">
                         <i class="fas fa-envelope"></i>
                    </a>
                    <div class="dropdown-contents mydropdowns">
                         <h6>Message Center</h6>
                         <a href="javascript:void(0);" class="d-flex">
                              <div class="me-3">
                                   <img src="./assets/img/users/user1.jpg" class="rounded-circle" width="30" alt="user1"/>
                              </div>
                              <div>
                                   <p class="small text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                   <i>Ms.July - 25m ago</i>
                              </div>
                         </a>
                         <a href="javascript:void(0);" class="d-flex">
                              <div class="me-3">
                                   <img src="./assets/img/users/user2.jpg" class="rounded-circle" width="30" alt="user1"/>
                                   
                              </div>
                              <div>
                                   <p class="small text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                   <i>Ms.July - 25m ago</i>
                              </div>
                         </a>
                         <a href="javascript:void(0);" class="d-flex">
                              <div class="me-3">
                                   <img src="./assets/img/users/user3.jpg" class="rounded-circle" width="30" alt="user3"/>

                              </div>
                              <div>
                                   <p class="small text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                   <i>Ms.PaPa - 55m ago</i>
                              </div>
                         </a>

                         <a href="javascript:void(0);" class="small text-muted text-center">Read More Message</a>
                    </div>
                    </li>
                    <!-- message -->

                    <!-- user logout -->
                    <li class="nav-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown">
                         <span class="text-muted small me-2">{{ $userdata["name"] }}</span>
                         <img src="./assets/img/users/user1.jpg" class="rounded-circle" width="25" alt="">
                    </a>
                    <div class="dropdown-menu">
                         <a href="jascript:void(0);" class="dropdown-item"><i class="fas fa-user fa-sm text-muted me-2"></i>Profile</a>
                         <a href="jascript:void(0);" class="dropdown-item"><i class="fas fa-user fa-sm text-muted me-2"></i>Profile</a>
                         <a href="jascript:void(0);" class="dropdown-item"><i class="fas fa-cogs fa-sm text-muted me-2"></i>Settings</a>
                         <a href="jascript:void(0);" class="dropdown-item"><i class="fas fa-list fa-sm text-muted me-2"></i>Activity Log</a>
                         <div class="dropdown-divider"></div>
                         <!-- Authentication -->
                        <!-- <form action="{{ route('logout')}}" method="POST" > -->
                            <!-- @csrf -->
                              <!-- <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-sign-out fa-sm text-muted me-2"></i>Logout</a> -->
                              <!-- <a href="javascript:void(0);" class="dropdown-item" onclick="event.preventDefault(); this.parentElement.submit();"><i class="fas fa-sign-out fa-sm text-muted me-2"></i>Logout</a> -->
                         <!-- </form> -->

                         <a href="javascript:void(0);" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"><i class="fas fa-sign-out fa-sm text-muted me-2"></i>Logout</a>
                         <form id="logoutform" action="{{ route('logout') }}" method="POST" >@csrf</form>

                         
                    </div>
                    </li>
                    <!-- user logout -->
               </ul>
               <!-- notify & userlogout -->

               <button type="button" class="close-btns" data-bs-toggle="collapse" data-bs-target="#nav">
                    <i class="fas fa-times"></i>
               </button>
          </nav>
     </div>

</div>