<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>CUDHAO</title>
    <link rel="stylesheet" href="{{asset('css/penalties.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
    <!-- for style and design link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- script for popping modal -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
</head>
<body>
   <input type="checkbox" id="menu-toggle">
   <div class="sidebar">
    <div class="side-header">
        <h3>C<span>abuyao</span></h3>
    </div>
    
    <div class="side-content">
        <div class="profile">
            <div class="profile-img bg-img" style="background-image: url(images/cudhaoLogo.png)"></div>
            <h4>CUDHAO</h4>
            <small>Administrator</small>
        </div>

        <div class="side-menu">
            <ul>
                <li>
                   <a href="{{route('dashboard')}}" class="active">
                        <span class="fas fa-desktop"></span>
                        <small>Dashboard</small>
                    </a>
                </li>
                <li>
                   <a href="{{route('admin.form')}}">
                        <span class="fas fa-th"></span>
                        <small>Census Form</small>
                    </a>
                </li>
                <li>
                   <a href="{{route('admin.barangay')}}">
                        <span class="fas fa-table"></span>
                        <small>Barangay</small>
                    </a>
                </li>
                <li>
                   <a href="{{route('admin.reports' )}}">
                        <span class="fas fa-chart-bar"></span>
                        <small>Reports</small>
                    </a>
                </li>
                <li>
                   <a href="{{url('admin.penalties')}}">
                        <span class="fas fa-exclamation-triangle"></span>
                        <small>Penalties</small>
                    </a>
                </li>
                <li>
                   <a href="{{route('admin.analysis')}}">
                        <span class="fas fa-clipboard"></span>
                        <small>Analysis</small>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.accounts')}}">
                         <span class="fas fa-address-book"></span>
                         <small>Accounts</small>
                     </a>
                 </li>

            </ul>
        </div>
    </div>
</div>
    
    <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                <div class="header-menu">
                    
                    
                    <div class="user">
                        <div class="bg-img" style="background-image: url(images/cudhaoLogo.png)"></div>
                        
                        <span class="las la-power-off"></span>
                        <a href="{{url('login')}}"><span class="logout" >Logout</span></a>
                    </div>
                </div>
            </div>
        </header>
        
        
        <main>
            
            <div class="page-header">
                <h1>Penalties</h1>
                <small>Home / Penalties</small>
            </div>
            <!-- Content here -->
            <div class="page-content">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                        <th>Barangay</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Offense</th>
                                        <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                        <td>Thomas Hardy</td>
                                        <td>Settled</td>
                                        <td>01/01/1980</td>
                                        <td>1st Offense</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href=" " class="view" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#xe417;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                        <td>Thomas Hardy</td>
                                        <td>Settled</td>
                                        <td>01/01/1980</td>
                                        <td>1st Offense</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href=" " class="view" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#xe417;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                        <td>Thomas Hardy</td>
                                        <td>Settled</td>
                                        <td>01/01/1980</td>
                                        <td>1st Offense</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href=" " class="view" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#xe417;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                        <td>Thomas Hardy</td>
                                        <td>Settled</td>
                                        <td>01/01/1980</td>
                                        <td>1st Offense</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href=" " class="view" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#xe417;</i></a>
                                    </td>
                                </tr>					
                                <tr>
                                        <td>Thomas Hardy</td>
                                        <td>Settled</td>
                                        <td>01/01/1980</td>
                                        <td>1st Offense</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href=" " class="view" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#xe417;</i></a>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="contentPenaltiesView">
                    <div class="buttons">
                        <button id="backBtn" class="btn">Back</button>
                        <button id="generateNoticeBtn" class="btn" >Generate Notice</button>
                    </div>
                    <div class="charts">
                                <div class="chart">
                                    <h2>Informal Settlers Families</h2>
                                    <canvas id="populationChart" ></canvas>
                                </div>
                    </div>
                </div>
            </div>
            
                    <!-- Edit Modal HTML -->
            <div id="editEmployeeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title" id="editEmployeeModalLabel">Edit Offense</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="barangay">Barangay</label>
                                    <input type="text" class="form-control" id="barangay" name="barangay" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="settled">Settled</option>
                                        <option value="unsettled">Unsettled</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="offense">Offense</label>
                                    <select class="form-control" id="offense" name="offense" required>
                                        <option value="" disabled selected>Select Offense</option>
                                        <option value="1">1st Offense</option>
                                        <option value="2">2nd Offense</option>
                                        <option value="3">3rd Offense</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            
                

            </div>   
            
        </main>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script src="{{asset('js/penalties.js')}}"></script>
    <!-- javascript for animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
         $(document).ready(function(){
      
     $('.sub-btn').click(function(){
       $(this).next('.sub-menu').slideToggle();
       $(this).find('.dropdown').toggleClass('rotate');
     });
   })
    </script>
</body>
</html>