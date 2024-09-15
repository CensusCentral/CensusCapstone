

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>CUDHAO</title>
    <link rel="stylesheet" href="{{asset('css/barangay.css')}}">
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
                <div class="profile-img bg-img" style="background-image: "></div>
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
                        <div class="bg-img" style="background-image: "></div>
                        
                        <span class="las la-power-off"></span>
                        <a href="{{route('logout')}}"><span class="logout" >Logout</span></a>
                    </div>
                </div>
            </div>
        </header>
        
        
        <main>
            
            <div class="page-header">
                <h1>Informal Settlers Information</h1>
                <small>Home / Members</small>
            </div>
            <!-- Content here -->
            <div class="page-content">
                
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                
                                    

                                    <div class="input-group d-flex justify-content-between align-items-center">

                                        
                                        {{-- SELECT BARANGAY --}}
                                        <form id="barangay-form" method="GET" action="{{ route('admin.barangay') }}">
                                            <input type="hidden" name="barangay" id="selected-barangay" value="{{ $selectedBarangay  }}">
                                            <div class="dropdown">
                                                <button id="barangay-btn" class="btn" type="button">Barangay</button>
                                                <div class="dropdown-content">

                                                    <a href="#" onclick="selectBarangay('Baclaran')">Baclaran</a>
                                                    <a href="#" onclick="selectBarangay('Banay-Banay')">Banay-Banay</a>
                                                    <a href="#" onclick="selectBarangay('Banlic')">Banlic</a>
                                                    <a href="#" onclick="selectBarangay('Bigaa')">Bigaa</a>
                                                    <a href="#" onclick="selectBarangay('Butong')">Butong</a>
                                                    <a href="#" onclick="selectBarangay('Casile')">Casile</a>
                                                    <a href="#" onclick="selectBarangay('Diezmo')">Diezmo</a>
                                                    <a href="#" onclick="selectBarangay('Gulod')">Gulod</a>
                                                    <a href="#" onclick="selectBarangay('Mamatid')">Mamatid</a>
                                                    <a href="#" onclick="selectBarangay('Marinig')">Marinig</a>
                                                    <a href="#" onclick="selectBarangay('Niugan')">Niugan</a>
                                                    <a href="#" onclick="selectBarangay('Pittland')">Pittland</a>
                                                    <a href="#" onclick="selectBarangay('Pulo')">Pulo</a>
                                                    <a href="#" onclick="selectBarangay('Sala')">Sala</a>
                                                    <a href="#" onclick="selectBarangay('San Isidro')">San Isidro</a>
                                                    <a href="#" onclick="selectBarangay('Barangay I Poblacion')">Barangay I Poblacion</a>
                                                    <a href="#" onclick="selectBarangay('Barangay II Poblacion')">Barangay II Poblacion</a>
                                                    <a href="#" onclick="selectBarangay('Barangay III Poblacion')">Barangay III Poblacion</a>   
                                                </div>
                                            </div>
                                        </form>

                                        <div class="left-side-group d-flex align-items-center">

                                            <div class="search-box mr-2">
                                                <input type="text" id="search" class="form-control" placeholder="Search by Name">
                                            </div>
    
                                            <a href="" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Member</span></a>
                                        </div>

                                    </div>
                                    

                                 
                                  
                            </div>
                        </div>
                        @if($isfheads->isEmpty())
                        <p>No records found for the selected barangay.</p>
                        @else
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="selectAll">
                                                <label for="selectAll"></label>
                                            </span>
                                        </th>
                                        <th>ID</th> 
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Birth Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($isfheads as $isfhead)
                                    <tr>
                                        <td>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                <label for="checkbox1"></label>
                                            </span>
                                        </td>
                                        <td>{{ $isfhead->id }}</td>
                                        <td>{{ $isfhead->lastName }}</td>
                                        <td>{{ $isfhead->firstName }}</td>
                                        <td>{{ $isfhead->middleName }}</td>
                                        <td>{{ $isfhead->dateOfBirth }}</td>
                                        
                                        <td>
                                            <a href="{{ route('barangay.headIndex', $isfhead->id) }}" class="view" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#xe417;</i></a>
                                            <a href="#deleteMember" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        {{-- FOR NAVIGATION OF PAGINATION --}}
                        <div class="clearfix">
                            <div class="hint-text">
                                Showing <b>{{ $isfheads->firstItem() }}</b> to <b>{{ $isfheads->lastItem() }}</b> of <b>{{ $isfheads->total() }}</b> entries
                            </div>

                            
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($isfheads->onFirstPage())
                                    <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                                @else
                                    <li class="page-item"><a href="{{ $isfheads->previousPageUrl() }}" class="page-link">Previous</a></li>
                                @endif
                        
                                {{-- Pagination Elements --}}
                                @foreach ($isfheads->links()->elements[0] as $page => $url)
                                    @if ($page == $isfheads->currentPage())
                                        <li class="page-item active"><a href="#" class="page-link">{{ $page }}</a></li>
                                    @else
                                        <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                        
                                {{-- Next Page Link --}}
                                @if ($isfheads->hasMorePages())
                                    <li class="page-item"><a href="{{ $isfheads->nextPageUrl() }}" class="page-link">Next</a></li>
                                @else
                                    <li class="page-item disabled"><a href="#" class="page-link">Next</a></li>
                                @endif
                            </ul>
                        </div>

                        @endif
                    </div>
                </div>



                <!-- View Information -->
                <div id="viewInfo" class="viewInformation">

                    <div class="viewInfoWrapper">
                        <div class="buttons">
                            <button class="btn btn-primary" id="back">Back</button>
                            <button  class="btn btn-secondary" id="editBtn">Edit</button>

                        </div>
                        
                        <div class="houseHeadInfo">

                            {{-- <div class="header">
                                <span class="title">Information of the Household Head</span>
                            </div> --}}
                        
                            <div class="head-details">

                                <div id="wrapper">
                                    <div class="container">
                                        <ul class="nav nav-tabs nav-justified">
                                            <li class="nav-item active"><a href="#tab1" class="nav-link text-uppercase">Household Head Details</a></li>
                                            <li class="nav-item"><a href="#tab2" class="nav-link text-uppercase">Household Condition Details</a></li>
                                            <li class="nav-item"><a href="#tab3" class="nav-link text-uppercase">Household Member Details</a></li>
                                        </ul>
                                  
                                        <div class="tab-content">
                                          <!-- TAB 1 FOR HOUSEHOLD HEAD DETAILS -->
                                            <form id="householdForm" action="{{ route('barangay.update', $isfhead->id) }}" method="POST">

                                                    @csrf

                                                    @method('PUT')

                                                <div id="tab1" class="content-pane is-active">
                                                    <div class="fields row">
      
                                                      <input type="hidden" id="headId" name="headId" value="{{ $isfhead->id }}" readonly>
      
                                                  
                                                          
                                                      <div class="col-md-3 mb-3">
                                                          <div class="input-field">
                                                              <label>Last Name</label>
                                                              <input type="text" placeholder="Enter Last name" name="lastName" value="{{ $isfhead->lastName }}" required class="form-control" disabled>
                                                          </div>
                                                      </div>
                                                  
                                                      <div class="col-md-3 mb-3">
                                                          <div class="input-field">
                                                              <label>First Name</label>
                                                              <input type="text" placeholder="Enter First name" name="firstName" value="{{ $isfhead->firstName }}" required class="form-control" disabled>
                                                          </div>
                                                      </div>
                                                  
                                                      <div class="col-md-3 mb-3">
                                                          <div class="input-field">
                                                              <label>Middle Name</label>
                                                              <input type="text" placeholder="Enter Middle name" name="middleName" value="{{$isfhead->middleName }}" class="form-control" disabled>
                                                          </div>
                                                      </div>
                                                  
                                                      <div class="col-md-3 mb-3">
                                                          <div class="input-field">
                                                              <label>Maiden Name</label>
                                                              <input type="text" placeholder="Enter Maiden name" name="maidenName" value="{{ $isfhead->maidenName }}" class="form-control" disabled>
                                                          </div>
                                                      </div>
                                                  
                                                      <div class="col-md-3 mb-3">
                                                          <div class="input-field">
                                                              <label>Date of Birth</label>
                                                              <input type="date" name="dateOfBirth" value="{{ $isfhead->dateOfBirth }}" required class="form-control" disabled>
                                                          </div>
                                                      </div>
                                                  
                                                      <div class="col-md-3 mb-3">
                                                          <div class="input-field">
                                                              <label>Age</label>
                                                              <input type="number" placeholder="Enter Age" name="age" value="{{ $isfhead->age }}" required class="form-control" disabled>
                                                          </div>
                                                      </div>
                                                  
                                                      <div class="col-md-3 mb-3">
                                                          <div class="input-field">
                                                              <label for="sex" class="details">Sex</label>
                                                              <select id="sex" name="sex" required class="form-control" disabled>
                                                                  <option value="" disabled selected>Select Sex</option>
                                                                  <option value="Male" {{ $isfhead->sex == 'Male' ? 'selected' : '' }}>Male</option>
                                                                  <option value="Female" {{ $isfhead->sex == 'Female' ? 'selected' : '' }}>Female</option>
                                                              </select>
                                                          </div>
                                                      </div>
                                                  
                                                      <div class="col-md-3 mb-3">
                                                          <div class="input-field">
                                                              <label for="civil" class="details">Civil Status</label>
                                                              <select id="civil" name="civilStatus" required class="form-control" disabled>
                                                                  <option value="" disabled selected>Select Civil Status</option>
                                                                  <option value="Single" {{ $isfhead->civilStatus == 'Single' ? 'selected' : '' }}>Single</option>
                                                                  <option value="Married" {{ $isfhead->civilStatus == 'Married' ? 'selected' : '' }}>Married</option>
                                                                  <option value="Widower" {{ $isfhead->civilStatus == 'Widower' ? 'selected' : '' }}>Widower</option>
                                                                  <option value="Separated" {{ $isfhead->civilStatus == 'Separated' ? 'selected' : '' }}>Separated</option>
                                                                  <option value="Common-Law Partner" {{ $isfhead->civilStatus == 'Common-Law Partner' ? 'selected' : '' }}>Common-Law Partner</option>
                                                              </select>
                                                          </div>
                                                      </div>
                                                  
                                                      <div class="col-md-3 mb-3">
                                                          <div class="input-field">
                                                              <label>Occupation</label>
                                                              <input type="text" placeholder="Enter Occupation" name="occupation" value="{{ $isfhead->occupation }}" required class="form-control" disabled>
                                                          </div>
                                                      </div>
                                                  
                                                      <div class="col-md-3 mb-3">
                                                          <div class="input-field">
                                                              <label>Place of Work</label>
                                                              <input type="text" placeholder="Enter Place of Work" name="workplace" value="{{ $isfhead->workplace }}" class="form-control" disabled>
                                                          </div>
                                                      </div>
                                                  
                                                      <div class="col-md-3 mb-3">
                                                          <div class="input-field">
                                                              <label>Present Address</label>
                                                              <input type="text" placeholder="Enter Address" name="address" value="{{ $isfhead->address }}" required class="form-control" disabled>
                                                          </div>
                                                      </div>
                        
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="details mb-2">Member of vulnerable community group</label>
                                                            <div class="d-flex flex-wrap">
                                                                <div class="form-check me-4 mb-2">
                                                                    <input class="form-check-input" type="checkbox" id="pwd" name="pwd" value="1" {{ $isfhead->pwd ? 'checked' : '' }} @disabled(true)>
                                                                    <label class="form-check-label" for="pwd">PWD</label>
                                                                </div>
                                                                <div class="form-check me-4 mb-2">
                                                                    <input class="form-check-input" type="checkbox" id="senior" name="senior" value="1" {{ $isfhead->senior ? 'checked' : '' }} @disabled(true)>
                                                                    <label class="form-check-label" for="senior">Senior Citizen</label>
                                                                </div>
                                                                <div class="form-check me-4 mb-2">
                                                                    <input class="form-check-input" type="checkbox" id="lgbtqia" name="lgbtq" value="1" {{ $isfhead->lgbtq ? 'checked' : '' }} @disabled(true)>
                                                                    <label class="form-check-label" for="lgbtqia">LGBTQIA+</label>
                                                                </div>
                                                                <div class="form-check me-4 mb-2">
                                                                    <input class="form-check-input" type="checkbox" id="pagibig" name="Pagibig" value="1" {{ $isfhead->Pagibig ? 'checked' : '' }} @disabled(true)>
                                                                    <label class="form-check-label" for="pagibig">PAGIBIG Housing Loan Beneficiary</label>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="checkbox" id="4ps" name="4ps" value="1" {{ $isfhead->{'4ps'} ? 'checked' : '' }} @disabled(true)>
                                                                    <label class="form-check-label" for="4ps">4PS Beneficiaries</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <div class="col-md-6 mb-3">
                                                          <div class="input-field">
                                                              <label>If a PWD, specify disability</label>
                                                              <input type="text" placeholder="Enter disability" name="disability" value="{{ $isfhead->disability }}" disabled class="form-control">
                                                          </div>
                                                      </div>
                                                  
                                                      <div class="col-md-6 mb-3">
                                                          <div class="input-field">
                                                              <label>If Member of LGBTQIA+, Gender Identification</label>
                                                              <input type="text" placeholder="Enter Identification" name="gender" value="{{ $isfhead->gender }}" disabled class="form-control">
                                                          </div>
                                                      </div>
                                                    </div>
      
                                                    <div class="details spouse">
                                                      <span class="title">Partner Details</span>
                                                      <div class="fields row">
                                                          <div class="col-md-3 mb-3">
                                                              <div class="input-field">
                                                                  <label>Last Name</label>
                                                                  <input type="text" placeholder="Enter Last name" name="spouseLname" value="{{ $isfhead->spouseLname }}" class="form-control" disabled>
                                                              </div>
                                                          </div>
                                                      
                                                          <div class="col-md-3 mb-3">
                                                              <div class="input-field">
                                                                  <label>First Name</label>
                                                                  <input type="text" placeholder="Enter First name" name="spouseFname" value="{{ $isfhead->spouseFname }}" class="form-control" disabled>
                                                              </div>
                                                          </div>
                                                      
                                                          <div class="col-md-3 mb-3">
                                                              <div class="input-field">
                                                                  <label>Middle Name</label>
                                                                  <input type="text" placeholder="Enter Middle name" name="spouseMname" value="{{ $isfhead->spouseMname }}" class="form-control" disabled>
                                                              </div>
                                                          </div>
                                                      
                                                          <div class="col-md-3 mb-3">
                                                              <div class="input-field">
                                                                  <label>Maiden Name</label>
                                                                  <input type="text" placeholder="Enter Maiden name" name="spouseMaidenName" value="{{ $isfhead->spouseMaidenName }}" class="form-control" disabled>
                                                              </div>
                                                          </div>
                                                      
                                                          <div class="col-md-3 mb-3">
                                                              <div class="input-field">
                                                                  <label>Date of Birth</label>
                                                                  <input type="date" name="spouseDOB" value="{{ $isfhead->spouseDOB }}" class="form-control" disabled>
                                                              </div>
                                                          </div>
                                                      
                                                          <div class="col-md-3 mb-3">
                                                              <div class="input-field">
                                                                  <label>Age</label>
                                                                  <input type="number" placeholder="Enter Age" name="spouseAge" value="{{ $isfhead->spouseAge }}" class="form-control" disabled>
                                                              </div>
                                                          </div>
                                                      
                                                          <div class="col-md-3 mb-3">
                                                              <div class="input-field">
                                                                  <label for="spouseSex" class="details">Sex</label>
                                                                  <select id="spouseSex" name="spouseSex" class="form-control" disabled>
                                                                      <option value="" disabled>Select Sex</option>
                                                                      <option value="Male" {{ $isfhead->spouseSex == 'Male' ? 'selected' : '' }}>Male</option>
                                                                      <option value="Female" {{ $isfhead->spouseSex == 'Female' ? 'selected' : '' }}>Female</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                      
                                                          <div class="col-md-3 mb-3">
                                                              <div class="input-field">
                                                                  <label>Community Group</label>
                                                                  <input type="text" placeholder="Enter Community Group" name="spouseCommunityGroup" value="{{ $isfhead->spouseCommunityGroup }}" class="form-control" disabled>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      </div>
                                                  </div>
                                  
                                                  <div id="tab2" class="content-pane">
      
                                                      <div class="details medical-history">
                                                          <span class="title">Medical History</span>
                                                          <textarea name="medicalHistory" class="form-control" rows="4" disabled>{{ $isfhead->MedicalHistory }}</textarea>
                                                       </div>
                                                  
                                                      <!-- Household details section -->
                                                      <div class="details household">
                                                          <span class="title">Household Details</span>
                                                          <div class="fields row">
                                                              <div class="col-md-3 mb-3">
                                                                  <div class="input-field">
                                                                      <label>Household Class</label>
                                                                      <input type="text" placeholder="Enter Household Class" name="householdClass" value="{{ $isfhead->HouseholdClass }}" class="form-control" disabled>
                                                                  </div>
                                                              </div>
                                                          
                                                              <div class="col-md-3 mb-3">
                                                                  <div class="input-field">
                                                                      <label>Household Size</label>
                                                                      <input type="number" placeholder="Enter Household Size" name="householdSize" value="{{ $isfhead->householdSize }}" class="form-control" disabled>
                                                                  </div>
                                                              </div>
                                                          
                                                              <div class="col-md-3 mb-3">
                                                                  <div class="input-field">
                                                                      <label>Year of Residency</label>
                                                                      <input type="number" placeholder="Enter Year of Residency" name="yearResidency" value="{{ $isfhead->yearResidency }}" class="form-control" disabled>
                                                                  </div>
                                                              </div>
                                                          
                                                              <div class="col-md-3 mb-3">
                                                                  <div class="input-field">
                                                                      <label>Double Household</label>
                                                                      <input type="text" placeholder="Enter Double Household" name="doubleHousehold" value="{{ $isfhead->doubleHousehold }}" class="form-control" disabled>
                                                                  </div>
                                                              </div>
                                                          
                                                              <div class="col-md-3 mb-3">
                                                                  <div class="input-field">
                                                                      <label>Indigenous or Not</label>
                                                                      <input type="text" placeholder="Enter Indigenous or Not" name="indigenousOrNot" value="{{ $isfhead->indigenousOrNot }}" class="form-control" disabled>
                                                                  </div>
                                                              </div>
                                                          
                                                              <div class="col-md-3 mb-3">
                                                                  <div class="input-field">
                                                                      <label>Place of Origin</label>
                                                                      <input type="text" placeholder="Enter Place of Origin" name="placeOrigin" value="{{ $isfhead->placeOrigin }}" class="form-control" disabled>
                                                                  </div>
                                                              </div>
                                                          
                                                              <div class="col-md-3 mb-3">
                                                                  <div class="input-field">
                                                                      <label>Reason for Establishing</label>
                                                                      <input type="text" placeholder="Enter Reason for Establishing" name="reasonEstablishing" value="{{ $isfhead->reasonEstablishing }}" class="form-control" disabled>
                                                                  </div>
                                                              </div>
                                                          
                                                              <div class="col-md-3 mb-3">
                                                                  <div class="input-field">
                                                                      <label>Tenurial Status</label>
                                                                      <input type="text" placeholder="Enter Tenurial Status" name="tenurialStatus" value="{{ $isfhead->tenurialStatus }}" class="form-control" disabled>
                                                                  </div>
                                                              </div>
                                                          
                                                              <div class="col-md-3 mb-3">
                                                                  <div class="input-field">
                                                                      <label>Government Resettlement</label>
                                                                      <input type="text" placeholder="Enter Government Resettlement" name="governmentResettelment" value="{{ $isfhead->governmentResettelment }}" class="form-control" disabled>
                                                                  </div>
                                                              </div>
                                                          
                                                              <div class="col-md-3 mb-3">
                                                                  <div class="input-field">
                                                                      <label>Which Program</label>
                                                                      <input type="text" placeholder="Enter Program" name="whichProgram" value="{{ $isfhead->whichProgram }}" class="form-control" disabled>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                    
                                                  </div>

                                                  <button type="submit" class="btn btn-success" id="saveBtn" style="display: none;">Save Update</button>
                                            </form>
                                           

                                        

                                            <div id="tab3" class="content-pane">
                                                <div class="table-wrapperMembers">
                                                    <div class="table-title">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <span class="title">Infomation of the Household Members</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Member Id</th>
                                                                <th>Last Name</th>
                                                                <th>First Name</th>
                                                                <th>Middle Name</th>
                                                                <th>Relation To Head</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>

                                                        @if($isfhead->members->isNotEmpty())
                                                                @foreach($isfhead->members as $member)
                                                                    <tr>
                                                                        <td>{{ $member->memberId }}</td>
                                                                        <td>{{ $member->memberlastName }}</td>
                                                                        <td>{{ $member->memberfirstName }}</td>
                                                                        <td>{{ $member->memberMiddleName }}</td>
                                                                        <td>{{ $member->memberRelationToHead }}</td>
                                                                        <td>
                                                                            <a href="{{route('barangay.memberIndex', $member->memberId)}}" class="view" data-toggle="modal" id="showButton"><i class="material-icons" data-toggle="tooltip" title="View">&#xe417;</i></a>
                                                                            <a href="" class="edit" data-toggle="modal">
                                                                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xe872;</i>
                                                                              </a>
                                                                            <a href="#deleteMember" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="5" class="text-center">No members found.</td>
                                                                </tr>
                                                            @endif
                                                    </table>
                                                    
                                                    
                                                </div>
                                            </div>
                            
                                            
                                        </div>
                                    </div>
                            
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                    {{-- SHOW FULL DETAILS OF MEMBER --}}
                <div id="editMemberModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div class="form-section-member">
                           
                            <form id="householdForm">
                                <div class="details member">
                                    <div class="pop-input-field">
                                        <label>Last Name</label>
                                        <input type="text" placeholder="Enter Last name" name="memberlastName" required >
                                    </div>
                                    <div class="pop-input-field">
                                        <label>First Name</label>
                                        <input type="text" placeholder="Enter First name" name="memberfirstName" required>
                                    </div>
                
                
                                    <div class="pop-input-field">
                                        <label>Middle Name</label>
                                        <input type="text" placeholder="Enter Middle name" name="memberMiddleName">
                                    </div>
                
                                    <div class="pop-input-field">
                                        <label>Maiden Name</label>
                                        <input type="text" placeholder="Enter Maiden name" name="memberMaidenName">
                                    </div>
                
                                    <div class="pop-input-field">
                                        <label>Date of Birth</label>
                                        <input type="date" placeholder="Enter birth date" name="memberDOB" required>
                                    </div>
                                    <div class="pop-input-field">
                                        <label>Age</label>
                                        <input type="number" placeholder="Enter Age" name="memberAge" required>
                                    </div>
                                    <div class="pop-input-field">
                                        <label for="sex">Sex</label>
                                        <select id="sex" name="memberSex" required>
                                            <option value="" disabled selected>Choose Sex</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="pop-input-field">
                                        <label>Relation to Household head</label>
                                        <input type="text" placeholder="Enter relation" name="memberRelationToHead" required>
                                    </div>
                                    <div class="pop-input-field">
                                        <label for="civil" class="details">Civil Status</label>
                                        <select id="civil" name="memberCivilStatus" required>
                                            <option value="" disabled selected>Select Civil Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                        </select>
                                    </div>
                                    <div class="pop-input-field">
                                        <label>Occupation</label>
                                        <input type="text" placeholder="Enter Occupation" name="memberOccupation">
                                    </div>
                                    <div class="pop-input-field">
                                        <label>Place of Work</label>
                                        <input type="text" placeholder="Enter Place of Work" name="memberPlaceOfWork">
                                    </div>
                                    <div class="pop-input-field">
                                        <label for="member" class="details">Highest Educational Attainment</label>
                                        <select id="member" name="memberEducAttaintment" required>
                                            <option value="" disabled selected>Select Educational Attainment</option>
                                            <option value="Elementary">Elementary</option>
                                            <option value="Highschool">Highschool</option>
                                            <option value="Undergrad">Undergrad</option>
                                            <option value="College">College</option>
                                        </select>
                                    </div>
                                    <div class="pop-input-field">
                                        <label for="member" class="details">Member of vulnerable community group</label>
                                        <select id="member" name="memberOfCommunityGroup" required>
                                            <option value="" disabled selected>Select Group</option>
                                            <option value="PWD">PWD</option>
                                            <option value="Senior Citizen">Senior Citizen</option>
                                            <option value="Solo parent">Solo parent</option>
                                            <option value="LGBTQI">LGBTQI</option>
                                        </select>
                                    </div>
                                    <div class="pop-input-field">
                                        <label>If a PWD, specify disability</label>
                                        <input type="text" placeholder="Enter disability" name="memberAnyDisability">
                                    </div>
                                    <div class="pop-input-field">
                                        <label>If Member of LGBTQI, Gender Identification</label>
                                        <input type="text" placeholder="Enter Identification" name="memberGenderIdentification">
                                    </div>
                                    <div class="pop-input-field">
                                        <label>Estimated Monthly Income</label>
                                        <input type="number" placeholder="Enter Estimated Income" name="memberEstimatedIncome">
                                    </div>
                                </div>
                
                                <div class="pop-buttons">
                                    <button type="button" id="closeModal">Close</button>
                                    <button type="submit">Add Member</button>
                                </div>
                
                            </form>
                        </div>
                    </div>
                </div>



                <div id="showMemberModal" class="modal">
                    
                    <div class="modal-content">
                        <span class="close" id="closeModal">&times;</span>
                        <div class="form-section-member">
                            <form id="householdForm">
                                <div class="details member">
                                    <div class="details member">
                                        <div class="pop-input-field">
                                            <label>Last Name</label>
                                            <input type="text" placeholder="Enter Last name" name="memberlastName" value="{{ $member->memberlastName }}" disabled>
                                        </div>
                                        <div class="pop-input-field">
                                            <label>First Name</label>
                                            <input type="text" placeholder="Enter First name" name="memberfirstName" value="{{ $member->memberfirstName }}" disabled>
                                        </div>
                                        <div class="pop-input-field">
                                            <label>Middle Name</label>
                                            <input type="text" placeholder="Enter Middle name" name="memberMiddleName" value="{{ $member->memberMiddleName }}" disabled>
                                        </div>
                                        <div class="pop-input-field">
                                            <label>Maiden Name</label>
                                            <input type="text" placeholder="Enter Maiden name" name="memberMaidenName" value="{{ $member->memberMaidenName }}" disabled>
                                        </div>
                                        <div class="pop-input-field">
                                            <label>Date of Birth</label>
                                            <input type="date" name="memberDOB" value="{{ $member->memberDOB }}" disabled>
                                        </div>
                                        <div class="pop-input-field">
                                            <label>Age</label>
                                            <input type="number" placeholder="Enter Age" name="memberAge" value="{{ $member->memberAge }}" disabled>
                                        </div>
                                        <div class="pop-input-field">
                                            <label for="sex">Sex</label>
                                            <select id="sex" name="memberSex" disabled>
                                                <option value="" disabled {{ is_null($member->memberSex) ? 'selected' : '' }}>Choose Sex</option>
                                                <option value="Male" {{ $member->memberSex == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ $member->memberSex == 'Female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>
                                        <div class="pop-input-field">
                                            <label>Relation to Household head</label>
                                            <input type="text" placeholder="Enter relation" name="memberRelationToHead" value="{{ $member->memberRelationToHead }}" disabled>
                                        </div>
                                        
                                        <div class="pop-input-field">
                                            <label for="civil" class="details">Civil Status</label>
                                            <select id="civil" name="memberCivilStatus" disabled>
                                                <option value="" disabled>Select Civil Status</option>
                                                <option value="Single" {{ $member->memberCivilStatus == 'Single' ? 'selected' : '' }}>Single</option>
                                                <option value="Married" {{ $member->memberCivilStatus == 'Married' ? 'selected' : '' }}>Married</option>
                                            </select>
                                        </div>
                                        
                                        <div class="pop-input-field">
                                            <label>Occupation</label>
                                            <input type="text" placeholder="Enter Occupation" name="memberOccupation" value="{{ $member->memberOccupation }}" disabled>
                                        </div>
                                        
                                        <div class="pop-input-field">
                                            <label>Place of Work</label>
                                            <input type="text" placeholder="Enter Place of Work" name="memberPlaceOfWork" value="{{ $member->memberPlaceOfWork }}" disabled>
                                        </div>
                                        
                                        <div class="pop-input-field">
                                            <label for="member" class="details">Highest Educational Attainment</label>
                                            <select id="member" name="memberEducAttaintment" disabled>
                                                <option value="" disabled>Select Educational Attainment</option>
                                                <option value="Elementary" {{ $member->memberEducAttaintment == 'Elementary' ? 'selected' : '' }}>Elementary</option>
                                                <option value="Highschool" {{ $member->memberEducAttaintment == 'Highschool' ? 'selected' : '' }}>Highschool</option>
                                                <option value="Undergrad" {{ $member->memberEducAttaintment == 'Undergrad' ? 'selected' : '' }}>Undergrad</option>
                                                <option value="College" {{ $member->memberEducAttaintment == 'College' ? 'selected' : '' }}>College</option>
                                            </select>
                                        </div>
                                        
                                        <div class="pop-input-field">
                                            <label for="member" class="details">Member of vulnerable community group</label>
                                            <select id="member" name="memberOfCommunityGroup" disabled>
                                                <option value="" disabled>Select Group</option>
                                                <option value="PWD" {{ $member->memberOfCommunityGroup == 'PWD' ? 'selected' : '' }}>PWD</option>
                                                <option value="Senior Citizen" {{ $member->memberOfCommunityGroup == 'Senior Citizen' ? 'selected' : '' }}>Senior Citizen</option>
                                                <option value="Solo parent" {{ $member->memberOfCommunityGroup == 'Solo parent' ? 'selected' : '' }}>Solo parent</option>
                                                <option value="LGBTQI" {{ $member->memberOfCommunityGroup == 'LGBTQI' ? 'selected' : '' }}>LGBTQI</option>
                                            </select>
                                        </div>
                                        
                                        <div class="pop-input-field">
                                            <label>If a PWD, specify disability</label>
                                            <input type="text" placeholder="Enter disability" name="memberAnyDisability" value="{{ $member->memberAnyDisability }}" disabled>
                                        </div>
                                        
                                        <div class="pop-input-field">
                                            <label>If Member of LGBTQI, Gender Identification</label>
                                            <input type="text" placeholder="Enter Identification" name="memberGenderIdentification" value="{{ $member->memberGenderIdentification }}" disabled>
                                        </div>
                                        
                                        <div class="pop-input-field">
                                            <label>Estimated Monthly Income</label>
                                            <input type="number" placeholder="Enter Estimated Income" name="memberEstimatedIncome" value="{{ $member->memberEstimatedIncome }}" disabled>
                                        </div>
                                        
                                </div>
                                
                                <div class="pop-buttons">
                                    <button type="button" id="closeModal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                





               







               


                <!-- Delete Modal HTML -->
                <div id="deleteMember" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form>
                                <div class="modal-header">						
                                    <h4 class="modal-title">Delete Member</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">					
                                    <p>Are you sure you want to delete these Records?</p>
                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            
        </main>
        
    </div>

    <!-- javascript for charts -->
    <script src="{{asset('js/barangay.js')}}"></script>
</body>
</html>