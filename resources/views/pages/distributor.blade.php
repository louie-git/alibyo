@extends('layout.app')

@section('content')
    <div>
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
        @endforeach
        @if (session('success'))
        <div class="alert alert-success" role="alert">
        {{session('success')}}
        </div>
        @endif
        @if (session('failed'))
        <div class="alert alert-danger" role="alert">
        {{session('failed')}}
        </div>
        @endif
    </div>
    <div class="wrapper" >
        <div>
            <h1>Distributor</h1>
        </div>
        <div class="restable">
            @if (count($distributors)>0)
            <table class="table table-striped table-sm table-fixed text-center ">
                <thead class="thead-dark">
                    <tr>
                        <th>Distributor ID</th>
                        <th>Last Name</th>
                        <th>FirstName</th>
                        <th>Middle Name</th>
                        <th>Gender</th>
                        <th>Contact Number</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($distributors as $distributor)
                          <tr>
                              <td>{{$distributor->distributor_id}}</td>
                              <td>{{$distributor->last_name}}</td>
                              <td>{{$distributor->first_name}}</td>
                              <td>{{$distributor->middle_name}}</td>
                              <td>{{$distributor->gender}}</td>
                              <td>{{$distributor->contact_number}}</td>
                              <td>{{$distributor->date_of_birth}}</td>
                              <td>
                                
                                  @if ($distributor->status=='Enabled')
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{$distributor->status}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <div class="d-flex justify-content-around">
                                                <button class="btn btn-success btn-sm" value="Enable">Enable</button>
                                                <button class="btn btn-danger btn-sm" value="Disable">Disable</button>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="dropdown">
                                        <button class="btn btn-danger dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{$distributor->status}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <div class="d-flex justify-content-around">
                                                <button class="btn btn-success btn-sm" value="Enable">Enable</button>
                                                <button class="btn btn-danger btn-sm" value="Disable">Disable</button>
                                            </div>
                                        </div>
                                    </div>
                                  @endif
                              </td>
                              <td>
                                <button type="button" class="btn btn-primary btn-sm editinfo" data-toggle="modal" data-target="#edit_distributor">
                                    <i class="fas fa-user-edit"></i>
                                  </button>
                              </td>
                          </tr>       
                    @endforeach
                </tbody>
            </table>     
            @else
                <p style="margin-left: 40px">No Distributor list</p>
            @endif
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_distributor">
           Register Distributor
          </button>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="edit_distributor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-control"  required>
                <label>First Name</label>
                <input type="text" name="fname" class="form-control"  required>
                <label>Middle Name</label>
                <input type="text" name="mname" class="form-control"  required>
                <label>Contact Number</label>
                <input type="number" name="contact"  class="form-control" maxlength="11" id="contact" required>
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control"   required>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
        </div>
      </div>




    <!-- Modal -->
<div class="modal fade" id="add_distributor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register Distributor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('/register_distributor')}}" method="POST" >
            {{ csrf_field() }}
            
        <div class="modal-body">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lname"  class="form-control" required>
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="fname"  class="form-control" required>
            </div>
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" name="mname"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Gender</label>
                <select class="form-control" name="gender" id="exampleFormControlSelect1">
                  <option disabled selected>Gender</option>
                  <option>Female</option>
                  <option>Male</option>
                </select>
              </div>
              <input type="hidden" name="status" value="Disabled">
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="text" class="form-control"  name="contact" maxlength="11" required>
            </div>
            <div class="form-group">
                <label for="email">Date of Birth</label>
                <input type="date" class="form-control" name="dob" required>
            </div>
            <hr>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username"  class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password"  class="form-control" required>
            </div>
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Confirm">
        </div>
    </form>
      </div>
    </div>
</div>
  


@endsection


         
