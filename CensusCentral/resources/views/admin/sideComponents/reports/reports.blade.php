<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>CUDHAO</title>
    <link rel="stylesheet" href="{{asset('css/reports.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    

    
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
                <h1>Reports</h1>
                <small>Home / Reports</small>
            </div>
            <!-- Content here -->
            <div class="page-content">
            
                <div class="content-header">
                    <div class="buttons">
                        <button id="overall-btn" class="btn active" onclick="highlightButton('overall')">Overall</button>
                        <div class="dropdownBarangay">
                            <button id="barangay-btn" class="btn" onclick="highlightButton('barangay')">Barangay</button>
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
                    </div>
                    </div>

                    <div class="charts">
                        <div class="chart">
                            <div class="head">
                                <h2>Population</h2>
                                <div class="dropdown">
                                    <i class="fas fa-ellipsis-vertical dropdown-icon"></i>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('admin.barangay') }}">
                                            <span class="dropdown-item">
                                               <i class="fas fa-eye mx-2"></i> View
                                            </span>

                                            </a>
                                        </li>
                                        <li>
                                            <span class="dropdown-item">
                                                <i class="fas fa-trash mx-2"></i> Delete
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>  
                            <canvas id="populationChart"></canvas>

                            <script id="chartData" type="application/json">
                                {!! json_encode($data) !!}
                            </script>
                        </div>

                        <div class="chart">
                            <div class="head">
                                <h2>Person with Disabilities</h2>
                                <div class="dropdown">
                                    <i class="fas fa-ellipsis-vertical dropdown-icon"></i>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <span class="dropdown-item">
                                                <i class="fas fa-eye mx-2"></i> View
                                            </span>
                                        </li>
                                        <li>
                                            <span class="dropdown-item">
                                                <i class="fas fa-trash mx-2"></i> Delete
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div> 
                            <canvas id="pwdChart"></canvas>
                        </div>

                        <div class="chart">
                            <div class="head">
                                <h2>4P's Beneficiaries</h2>
                                <div class="dropdown">
                                    <i class="fas fa-ellipsis-vertical dropdown-icon"></i>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <span class="dropdown-item">
                                                <i class="fas fa-eye mx-2"></i> View
                                            </span>
                                        </li>
                                        <li>
                                            <span class="dropdown-item">
                                                <i class="fas fa-trash mx-2"></i> Delete
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <canvas id="4psChart"></canvas>
                        </div>

                        <div class="chart">
                            <div class="head">
                                <h2>Senior Citizens</h2>
                                <div class="dropdown">
                                    <i class="fas fa-ellipsis-vertical dropdown-icon"></i>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <span class="dropdown-item">
                                                <i class="fas fa-eye mx-2"></i> View
                                            </span>
                                        </li>
                                        <li>
                                            <span class="dropdown-item">
                                                <i class="fas fa-trash mx-2"></i> Delete
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <canvas id="seniorChart"></canvas>
                        </div>

                        <div class="chart">
                            <div class="head">
                                <h2>Pagibig Housing Loan</h2>
                                <div class="dropdown">
                                    <i class="fas fa-ellipsis-vertical dropdown-icon"></i>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <span class="dropdown-item">
                                                <i class="fas fa-eye mx-2"></i> View
                                            </span>
                                        </li>
                                        <li>
                                            <span class="dropdown-item">
                                                <i class="fas fa-trash mx-2"></i> Delete
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <canvas id="housingLoanChart"></canvas>
                        </div>
                    </div>
                </div>   
            </div>
        
            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
            <script src="{{asset('js/reports.js')}}"></script>
            <!-- javascript for animation -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
            
               <script>
                 document.addEventListener('DOMContentLoaded', function() {
            const dropdownIcons = document.querySelectorAll('.dropdown-icon');

            dropdownIcons.forEach(function(icon) {
                icon.addEventListener('click', function() {
                    const menu = icon.nextElementSibling;
                    menu.classList.toggle('show');
                });
            });

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.dropdown-icon')) {
                    const dropdowns = document.querySelectorAll('.dropdown-menu');
                    dropdowns.forEach(function(dropdown) {
                        if (dropdown.classList.contains('show')) {
                            dropdown.classList.remove('show');
                        }
                    });
                }
            }
        });
    </script>
           
</body>
</html>