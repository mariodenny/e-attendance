@extends('layouts.dashboard')
@section('title','Form Trial Students ')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card card-frame">
            <div class="card-body">
                <h3>Add Trial Student Class</h3>
               <div class="form-group">
                    <form action="{{ route('student-advisor.trial.save') }}" method="POST">
                        <!--TODO :: Design form insert-->
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Module">Module</label>
                                    <select class="form-control" id="" name="m_module_id">
                                        <option value ="" >Jk8-12 2D Games With Roblox</option>
                                        <option value ="" >Jk8-12 Roblox I</option>
                                        <option value ="" >Jk8-12 Roblox II</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="Module">Teacher</label>
                                    <select class="form-control" id="" name="teacher_id">
                                        <option value ="" >Susan</option>
                                        <option value ="" >Denny</option>
                                        <option value ="" >Rafi</option>
                                    </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="Student Name" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Contact Person" class="form-control"  name="contact_person" />
                                </div>
                            </div>
                         </div>   
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="Phone Number e.g 0813xxxxxx" name="phone_no">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="datetime-local" placeholder="date" class="form-control"  name="date" />
                                </div>
                            </div>
                         </div> 
                         <button type="button" class="btn bg-gradient-info">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-frame">
            <div class="card-body">
                <h3>Remind Upcoming Trial</h3>
                    <!-- Nearest List of student's trial (2 days) for reminding -->
                    <div class="m-3 p-3 border-0 rounded-3 bg-gradient-info">
                        <span class="fw-semibold text-white">Jazon</span>
                    </div>
                    <div class="m-3 p-3 border-0 rounded-3 bg-gradient-info">
                        <span class="fw-semibold text-white">Darren</span>
                    </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col mt-2 p2">
        <div class="card card-frame">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Module</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Teacher</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Datetime</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Phone</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2" colspan="3">Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>              
                                            <h6 class="mb-0 ">John Michael</h6>
                                        </td>
                                         <td>              
                                            <span class="mb-0 ">Jk8-12 Roblox I </span>
                                        </td>
                                         <td>              
                                            <span class="mb-0 ">Ms.Susan </span>
                                        </td>
                                        <td>
                                            <span class="mb-0 ">03/10/2025 1:00</span>
                                        </td>
                                        <td>
                                            <span class="mb-0 ">08137686676</span>
                                        </td>
                                        <td>
                                            <span class="mb-0 badge bg-gradient-success ">Enroll</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                            <button class="btn btn-sm bg-gradient-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="#">Reaschedule</a></li>
                                                <li><a class="dropdown-item" href="#">Join</a></li>
                                                <li><a class="dropdown-item" href="#">Enroll</a></li>
                                                <li><a class="dropdown-item" href="#">Cancel</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>              
                                            <h6 class="mb-0 ">John Michael</h6>
                                        </td>
                                         <td>              
                                            <span class="mb-0 ">Jk8-12 Roblox I </span>
                                        </td>
                                         <td>              
                                            <span class="mb-0 ">Ms.Anggi </span>
                                        </td>
                                        <td>
                                            <span class="mb-0 ">03/10/2025 1:00</span>
                                        </td>
                                        <td>
                                            <span class="mb-0 ">08137686676</span>
                                        </td>
                                        <td>
                                            <span class="mb-0 badge bg-gradient-info">Join</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                            <button class="btn btn-sm bg-gradient-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="#">Reaschedule</a></li>
                                                <li><a class="dropdown-item" href="#">Join</a></li>
                                                <li><a class="dropdown-item" href="#">Enroll</a></li>
                                                <li><a class="dropdown-item" href="#">Cancel</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>              
                                            <h6 class="mb-0 ">John Michael</h6>
                                        </td>
                                         <td>              
                                            <span class="mb-0 ">Jk8-12 Roblox I </span>
                                        </td>
                                         <td>              
                                            <span class="mb-0 ">Ms.Rafi </span>
                                        </td>
                                        <td>
                                            <span class="mb-0 ">03/10/2025 1:00</span>
                                        </td>
                                        <td>
                                            <span class="mb-0 ">08137686676</span>
                                        </td>
                                        <td>
                                            <span class="mb-0 badge bg-gradient-warning ">Pending</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                            <button class="btn btn-sm bg-gradient-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="#">Reaschedule</a></li>
                                                <li><a class="dropdown-item" href="#">Join</a></li>
                                                <li><a class="dropdown-item" href="#">Enroll</a></li>
                                                <li><a class="dropdown-item" href="#">Cancel</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                </div>
            </div>       
        </div>
    </div>
</div>

@endsection