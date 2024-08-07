@extends("layouts.adminindex")

@section("content")
                         
     <!-- Start Page Content Area -->
     <div class="container-fluid">
          
          <div class="col-md-12">
               <a href="javascript:void(0);" id="createmodal-btn" class="btn btn-primary btn-sm rounded-0 me-3">Create</a>

          </div>
          
          <hr/>

          <div class="col-md-12 mb-2">
               <div>
                    <a href="javascript:void(0);" id="bulkdelete-btn" class="btn btn-danger btn-sm rounded-0">Bulk Delete</a>
               </div>
               <div>
                    <form action="" method="">
                         <div class="row justify-content-end">
                              <div class="col-md-2 col-sm-6 mb-2">
                                   <div class="input-group">
                                        <input type="text" name="filtername" id="filtername" class="form-control form-control-sm rounded-0" placeholder="Search...." value="{{ request('filtername') }}"/>
                                        <button type="button" id="btn-search" class="btn btn-secondary btn-sm"><i class="fas fa-search"></i></button>
                                   </div>
                              </div>
                         </div>
                    </form>
               </div>
          </div>

          <div class="col-md-12 loader-container">
               
               <table id="mytable" class="table table-sm table-hover border">
          
                    <thead>
                         <th>
                              <input type="checkbox" name="selectalls" id="selectalls" class="form-check-input selectalls" />
                         </th>
                         <th>No</th>
                         <th>Student Id</th>
                         <th>Points</th>
                         <th>Created At</th>
                         <th>Updated At</th>
                         <th>Action</th>
                    </thead>
          
                    <tbody id="tabledata">
                         
                    </tbody>
          
               </table>
               <div class="loader">
                    <div class="loader-item"></div>
                    <div class="loader-item"></div>
                    <div class="loader-item"></div>
               </div>
          

          </div>
     </div>
     <!-- End Page Content Area -->

     <!-- START MODAL AREA -->
          <!-- start create modal -->
          <div id="createmodal" class="modal fade">
               <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content rounded-0">
                         <div class="modal-header">
                              <h6 class="modal-title">Modal Title</h6>
                              <button type="" class="btn-close" data-bs-dismiss="modal"></button>
                         </div>

                         <div class="modal-body">
                              <div id="step1">
                                   <form id="verifyform" action="" method="">
                                        <div class="row">
                                             <div class="col-md-12 form-group mb-3">
                                                  <label for="student_id">Student ID <span class="text-danger">*</span></label>
                                                  <input type="text" name="student_id" id="student_id" class="form-control form-control-sm rounded-0" placeholder="Enter Student Id" value="{{ old('name') }}"/>
                                             </div>

                                             <div class="col-md-12 text-end">
                                                  <button type="button" id="verify-btn" class="btn btn-primary btn-sm rounded-0" >Next</button>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                              <div id="step2" style="display:none;">
                                   <form id="createform" action="" method="">
                                        <div class="row">
                                             <div class="col-md-12 form-group mb-3">
                                                 <ul class="list-group">
                                                 </ul>
                                             </div>

                                             <div class="col-md-12 form-group mb-3">
                                                  <label for="points">Points <span class="text-danger">*</span></label>
                                                  <input type="number" name="points" id="points" class="form-control form-control-sm rounded-0" placeholder="Enter Point" value="{{ old('points') }}"/>
                                             </div>
                                             
                                             <input type="hidden" name="user_id" id="user_id"/>
                                             <input type="hidden" name="userpointid" id="userpointid"/>

                                             <div class="col-md-12 text-end">
                                                  <button type="button" id="stepback-btn" class="btn btn-secondary btn-sm rounded-0 me-3">Back</button>
                                                  <button type="submit" id="create-btn" class="btn btn-primary btn-sm rounded-0" value="action-type">Submit</button>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>

                         <div class="modal-footer">

                         </div>
                    </div>
               </div>
          </div>
          <!-- end create modal -->

         
     <!-- END MODAL AREA -->
@endsection

@section("css")
     <link href="{{ asset('assets/dist/css/loader.css') }}" rel="stylesheet" />     
@endsection

@section("scripts")
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <script type="text/javascript">
          
          

          $(document).ready(function(){

               // Start Passing Header Token
               $.ajaxSetup({
                    headers:{
                         "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    }
               });
               // End Passing Header Token

               // Start Fetch All Datas 
               function fetchalldatas(){
                    $.ajax({
                         url:"{{route('userpoints.index')}}",
                         meethod:"GET",
                         beforeSend:function(){
                              $(".loader").addClass("show");
                         },
                         success:function(response){
                         //    console.log(response);
                              $("#tabledata").html(response);
                         },
                         complete:function(){
                              console.log("complete:");
                              $(".loader").removeClass("show");
                         }
                    });
               }
               fetchalldatas();
               // End Fetch All Datas

               // Start Create & Update Package
               // start create
               $("#createmodal-btn").click(function(){
               
                    $("#step1").show();
                    $("#step2").hide();

                    // clear form data
                    // $("#createform")[0].reset();
                    $("#createform").trigger("reset");
                    $("#verifyform").trigger("reset");
                    
                    $("#createmodal .modal-title").text("Verify Student");
                    $("#create-btn").html("Add New Points");
                    $("#create-btn").val("action-type");

                    $("#createmodal").modal("show"); // toggle() can also used.
                    
               });

               // start vefiry student 
               $("#verify-btn").click(function(){
                    const studentid = $("#student_id").val();
                    $.ajax({
                         url:"{{ route('userpoints.verifystudent') }}",
                         type:"POST",
                         dataType: "json",
                         data: {
                              studentid:studentid
                         },
                         success:function(response){
                              console.log(response);

                              let htmlview="";

                              $("#step1").hide();
                              $("#step2").show();

                              $("#createmodal .modal-title").text("Adding Points");
                              $("#user_id").val(response.user.id);
                         
                              htmlview = `<li class="list-group-item"><a href="{{ URL::to('students/${response.student.id}') }}" target="_blank">${response.student.firstname} ${response.student.lastname}</a></li>`
                              $("#createmodal .modal-body #createform ul.list-group").html(htmlview);
                         },
                         error:function(response){
                              console.log("Error: ",response);
                         }
                    });
               });

               $("#stepback-btn").click(function(){
                    $("#createmodal .modal-title").text("Verify Student");

                    $("#step1").show();
                    $("#step2").hide();

                    $("#verifyform").trigger("reset");
               });

               // start edit
               $(document).on("click",".edit-btns",function(){
                    const getid = $(this).data("id");
                    // console.log(getid);

                    $.get(`userpoints/${getid}/`,function(response){
                         console.log(response); // {id: 9, name: 'myanmar', slug: 'myanmar', status_id: 3, user_id: 1, …}
                    
                         $("#step1").hide();
                         $("#step2").show();
                         $("#step2 #stepback-btn").hide(); // hidding back button
                         $("#step2 #createform .list-group").html(""); // hidding user info list


                         $("#createmodal .modal-title").text("Edit Points");
                         $("#create-btn").text("Update Package");
                         $("#create-btn").val("edit-type");
                         $("#createmodal").modal("show"); // toggle() can also used.
                         
                         $("#userpointid").val(response.id);
                         $("#user_id").val(response.user_id);
                         $("#points").val(response.points);
                    });
               });
               

               $("#create-btn").click(function(e){
                    e.preventDefault();

                    let actiontype = $("#create-btn").val();
                    console.log(actiontype);
                    $(this).html("Sending....");

                    if(actiontype === "action-type"){
                         // Do Create
                         $.ajax({
                              url:"{{ route('userpoints.store') }}",
                              type:"POST",
                              dataType: "json",
                              data:$("#createform").serialize(),
                              success:function(response){
                                   console.log(response);
                                   // console.log(this.data); // name=&price=&duration=&packageid=

                                   // $("#createform")[0].reset();
                                   $("#createform").trigger("reset");

                                   $("#createmodal").modal("hide"); // toggle
                                   
                                   $("#create-btn").html("Save Change");

                                   fetchalldatas();

                                   Swal.fire({
                                        title: "Added!",
                                        text: "Added Successfully!",
                                        icon: "success"
                                   });
                              },
                              error:function(response){
                                   console.log("Error: ",response);
                                   $("#create-btn").html("Save Change");
                              }
                         });
                    }else  if(actiontype === "edit-type"){
                         const getid = $("#userpointid").val();
                         $.ajax({
                              url:`/userpoints/${getid}`,
                              type:"PUT",
                              dataType: "json",
                              data:$("#createform").serialize(),
                              success:function(response){
                                   console.log(response);
                                   // console.log(this.data); // name=&price=&duration=&packageid=

                                   // $("#createform")[0].reset();
                                   $("#createform").trigger("reset");

                                   $("#createmodal").modal("hide"); // toggle
                                   
                                   $("#create-btn").html("Save Change");

                                   fetchalldatas();

                                   Swal.fire({
                                        title: "Updated",
                                        text: "Update Successfully!",
                                        icon: "success"
                                   });
                              },
                              error:function(response){
                                   console.log("Error: ",response);
                                   $("#create-btn").html("Save Change");
                              }
                         });
                    }
               });
               // End Create & Update Package

               // Start Single Delete
               $(document).on("click",".delete-btns",function(){
                    
                    const getid = $(this).data("id");
                    const getidx = $(this).data("idx");
               
                    // console.log(getid);
                    
                    Swal.fire({
                         title: "Are you sure?",
                         text: `You won't be able to revert this id ${getidx}`,
                         icon: "warning",
                         showCancelButton: true,
                         confirmButtonColor: "#3085d6",
                         cancelButtonColor: "#d33",
                         confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                         if (result.isConfirmed) {
                              // data remove 
                              $.ajax({
                                   url:`/userpoints/${getid}`,
                                   type:"DELETE",
                                   dataType:"json",
                                   // data:{_token:"{{csrf_token()}}"},
                                   success:function(response){
                                        console.log(response);   // 1
                                        
                                        if(response){
                                             fetchalldatas();
                                             
                                             Swal.fire({
                                                  title: "Deleted!",
                                                  text: "Your file has been deleted.",
                                                  icon: "success"
                                             });
                                        }
                                   },
                                   error:function(response){
                                        console.log("Error: ",response)
                                   }
                              });
                              
                         }
                    });   
               });

               // End Single Delete

               // Start Bulk Delete 
               $("#selectalls").click(function(){
                    $(".singlechecks").prop("checked",$(this).prop("checked"));
               });

               $("#bulkdelete-btn").on("click",function(){
                    let getselectedids = [];
                    
                    // console.log($("input:checkbox[name=singlechecks]:checked"));
                    $("input:checkbox[name='singlechecks']:checked").each(function(){
                         getselectedids.push($(this).val());
                    });                
                    
                    // console.log(getselectedids); // (4) ['1', '2', '3', '4']

                    Swal.fire({
                         title: "Are you sure?",
                         text: `You won't be able to revert!`,
                         icon: "warning",
                         showCancelButton: true,
                         confirmButtonColor: "#3085d6",
                         cancelButtonColor: "#d33",
                         confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                         if (result.isConfirmed) {
                              // data remove 
                              $.ajax({
                                   url:"{{ route('packages.bulkdeletes') }}",
                                   type:"DELETE",
                                   dataType:"json",
                                   data:{
                                        selectedids:getselectedids,
                                        _token:"{{ csrf_token() }}"
                                   },
                                   success:function(response){
                                        console.log(response);   // 1
                                        
                                        if(response){
                                             fetchalldatas();
                                        
                                             Swal.fire({
                                                  title: "Deleted!",
                                                  text: "Your file has been deleted.",
                                                  icon: "success"
                                             });
                                        }
                                   },
                                   error:function(response){
                                        console.log("Error: ",response)
                                   }
                              });
                              
                         }
                    });   
               });
               // End Bulk Delete 

               // Start Package Search 
               async function searchpackagedatas(query=""){
                    await $.ajax({
                         url:"{{url('/userpointssearch')}}",
                         method:"GET",
                         data:{"query":query},

                         beforeSend:function(){
                              $(".loader").addClass("show");
                         },
                         success:function(response){
                              console.log(response); // {status: 'scuccess', data: Array(2)}
                              
                              $("#tabledata").empty();
                             
                              $("#tabledata").html(response);
                             
                         },
                         // error:function(response){
                         //      console.log(response);
                         // },
                         complete:function(){
                              console.log("complete:");
                              $(".loader").removeClass("show");
                         }
                    });
               }

               $("#btn-search").on("click",function(e){
                    e.preventDefault();
                    const query = $("#filtername").val();
                    // console.log(query);

                    searchpackagedatas(query);
               });
               // End Package Search 
                    
          });

     </script>
@endsection