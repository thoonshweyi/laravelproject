@extends("layouts.adminindex")

@section("caption","Attendance List")
@section("content")
                         
     <!-- Start Page Content Area -->
     <div class="container-fluid">
          
          <div class="col-md-12">
               <form action="{{route('attendances.store')}}" method="POST">
                    {{ csrf_field() }}

                    <div class="row align-items-end">
                         <div class="col-md-3">
                              <label for="classdate">Class Date <span class="text-danger">*</span></label>
                              @error("classdate")
                                   <span class="text-danger">{{ $message }}<span>
                              @enderror
                              <input type="date" name="classdate" id="classdate" class="form-control form-control-sm rounded-0" value="{{ $gettoday }}"/>
                         </div>

                         <div class="col-md-3">
                              <label for="post_id">Class <span class="text-danger">*</span></label>
                              @error("post_id")
                                   <span class="text-danger">{{ $message }}<span>
                              @enderror
                              <select name="post_id" id="post_id" class="form-control form-control-sm rounded-0">
                                   <option selected disabled>Choose class</option>
                                   @foreach($posts as $post)
                                        {{-- <option value="{{$post['id']}}">{{$post['title']}}</option> --}}
                                        <option value="{{$post->id}}">{{$post->title}}</option> 
                                   @endforeach     
                              </select>
                         </div>

                         <div class="col-md-3">
                              <label for="attcode">Attendance Code <span class="text-danger">*</span></label>
                              @error("attcode")
                                   <span class="text-danger">{{ $message }}<span>
                              @enderror
                              <input type="text" name="attcode" id="attcode" class="form-control form-control-sm rounded-0" value="{{ old('attcode') }}"/>
                         </div>

                         <div class="col-md-3">
                              <button type="reset" class="btn btn-secondary btn-sm rounded-0">Cancel</button>
                              <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Submit</button>
                         </div>
                    </div>
               </form>
          </div>
          
          <hr/>

          <div class="col-md-12">
               
               <table id="mytable" class="table table-sm table-hover border">
          
                    <thead>
                         <th>No</th>
                         <th>Student Id</th>
                         <th>Class</th>
                         <th>Att Code</th>
                         <th>By</th>
                         <th>Class Date</th>
                         <th>Created At</th>
                    </thead>
          
                    <tbody>
                         @foreach($attendances as $idx=>$attendance)
                         <tr>
                              <td>{{++$idx}}</td>
                              <td>{{ $attendance->student($attendance->user_id) }}</td>
                              <td>{{$attendance->post["title"]}}</td>
                              <td>{{ $attendance->attcode }}</td>
                              <td>{{  $attendance->user->name }}</td>
                              <td>{{ $attendance->classdate }}</td>
                              <td>{{ $attendance->created_at->format('d M Y') }}</td>
                         </tr>
                         @endforeach
                    </tbody>
          
               </table>
          

          </div>
     </div>
     <!-- End Page Content Area -->

     <!-- START MODAL AREA -->
          <!-- start edit modal -->
          <div id="editmodal" class="modal fade">
               <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-0">
                         <div class="modal-header">
                              <h6 class="modal-title">Edit Form</h6>
                              <button type="" class="btn-close" data-bs-dismiss="modal"></button>
                         </div>

                         <div class="modal-body">
                              <form id="formaction" action="" method="POST">
                                   {{ csrf_field() }}
                                   {{ method_field('PUT') }}
                                   <div class="row align-items-end">
                                        
                                        <div class="col-md-7 form-group">
                                             <label for="editpost_id">Class <span class="text-danger">*</span></label>
                                             <select name="post_id" id="editpost_id" class="form-control form-control-sm rounded-0">
                                                  @foreach($posts as $post)
                                                       {{-- <option value="{{$post['id']}}">{{$post['title']}}</option> --}} 
                                                       <option value="{{$post->id}}">{{$post->title}}</option> 
                                                  @endforeach     
                                             </select>
                                        </div>

                                        <div class="col-md-3">
                                             <label for="editattcode">Att Code <span class="text-danger">*</span></label>
                                             <input type="text" name="attcode" id="editattcode" class="form-control form-control-sm rounded-0" value="{{ old('classdate') }}"/>
                                        </div>
                                        
               
                                        <div class="col-md-2">
                                             <button type="submit" class="btn btn-primary btn-sm rounded-0">Update</button>
                                        </div>
                                   </div>
                              </form>
                         </div>

                         <div class="modal-footer">

                         </div>
                    </div>
               </div>
          </div>
          <!-- end edit modal -->
     <!-- END MODAL AREA -->
@endsection


@section("scripts")
     <script type="text/javascript">
          $(document).ready(function(){
               // Start Edit Form
               $(document).on("click",".editform",function(e){
                    
                    $("#editpost_id").val($(this).attr("data-post_id"));
                    $("#editattcode").val($(this).data("attcode"));
                    
                    const getid = $(this).attr("data-id");
                    $("#formaction").attr("action",`/attendances/${getid}`);

                    e.preventDefault();
               });
               // End Edit Form
               
          });


     </script>
@endsection