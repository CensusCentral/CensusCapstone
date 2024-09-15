<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>CUDHAO</title>
    <link rel="stylesheet" href="{{asset('css/analysis.css')}}">
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
                <h1>Analysis</h1>
                <small>Home / Analysis</small>
            </div>
            
            <div class="page-content"> 
                <!-- Content here -->
                <div class="content-header">
                    <div class="buttons">
                        <button id="overall-btn" class="btn active">Overall</button>
                        <div class="dropdown">
                            <button id="barangay-btn" class="btn">Barangay</button>
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
                            <h2>Population</h2>
                            <canvas id="myChart" ></canvas>
                        </div>
                        <div class="chart">
                            <h2>4P's Beneficiaries</h2>
                            <canvas id="myChart2" ></canvas>
                        </div>
                        <div class="chart">
                            <h2>Persons with Disabilities</h2>
                            <canvas id="myChart3" ></canvas>
                        </div>
                        <div class="chart">
                            <h2>Senior Citizens</h2>
                            <canvas id="myChart4" ></canvas>
                        </div>
                    </div>


            </div>
            
        </main>
        
    </div>

    <!-- javascript for charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="{{asset('js/analysis.js')}}"></script>
    <!-- javascript for animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>