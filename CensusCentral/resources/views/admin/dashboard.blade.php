<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>CUDHAO</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    
</head>
<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


   <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3><span>Cabuyao</span></h3>
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
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        
        
        <main>
            
            <div class="page-header">
                <h1>Dashboard</h1>
                <small>Home / Dashboard</small>
            </div>
            
            <div class="page-content">
                {{-- ANALYTICS CARD --}}
                <div class="analytics">
                    <div class="card" data-chart="totalPopulation" id="populationCard">
                        <div class="card-head">
                            <h2>{{ $overallTotalPopulation }}</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>ISF Total Population</small>
                        </div>
                    </div>
                
                    <div class="card" data-chart="total4ps" id="fourPsCard">
                        <div class="card-head">
                            <h2>{{ $total4ps ?? 0 }}</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>4P's Pre-Qualified Beneficiaries</small>
                        </div>
                    </div>
                
                    <div class="card" data-chart="totalSenior" id="seniorCard">
                        <div class="card-head">
                            <h2>{{ $totalSenior ?? 0 }}</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Senior Citizen</small>
                        </div>
                    </div>
                
                    <div class="card" data-chart="totalPwd" id="pwdCard">
                        <div class="card-head">
                            <h2>{{ $totalPwd ?? 0 }}</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>PWD</small>
                        </div>
                    </div>

                    <div class="card" data-chart="totalHousingLoan" id="totalHousingLoan">
                        <div class="card-head">
                            <h2>{{ $totalHousingLoan ?? 0 }}</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Housing Loan Pre-Qualified Beneficiaries</small>
                        </div>
                    </div>
                </div>
                
                <div class="charts">
                    <div style="width: 80%; margin: auto;">
                        <h2 id="chartTitle">Total ISF Population by Barangay</h2>
                        <canvas id="populationChart"></canvas>
                    </div>
                </div>
                
                <!-- Inline script to pass PHP data to JavaScript -->
                <script id="chartData" type="application/json">
                    {!! json_encode($data) !!}
                </script>
            </div>         
        </main>  
    </div>

    {{-- <!-- javascript for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script> --}}
</body>
</html>