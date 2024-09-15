<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUDHAO</title>
    <link rel="stylesheet" href="{{asset('css/accounts.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                        <div class="bg-img" style="background-image: url(images/cudhaoLogo.png)"></div>
                        
                        <span class="las la-power-off"></span>
                        <a href="{{url('login')}}"><span class="logout" >Logout</span></a>
                    </div>
                </div>
            </div>
        </header>
        
        <main>
            <div class="page-header">
                <h1>Accounts</h1>
                <small>Home / Accounts</small>
            </div>
            
            <div class="page-content">
                <div class="table-header">
                    <h2>Accounts List</h2>
                    <button class="add-account-btn">Add Account</button>
                </div>
                
                <table class="accounts-table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Na me</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="accountsTableBody">
                      
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role_name }}</td>
                            
                            <td>
                                <!-- Change Password Button -->
                                <a href="" class="btn btn-warning">Change Password</a>
                                
                                <!-- Delete Button -->
                                <form action="" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Add Account Modal -->
    <!-- Add Account Modal -->
<div id="addAccountModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Add Account</h2>
        <form id="addAccountForm" method="POST" action="{{ route('register.save') }}">
            @csrf

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="{{ old('name') }}">
            @error('name')
                <span class="text-red-600">{{ $message }}</span>
            @enderror

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}">
            @error('email')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
            
            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <button type="button" class="toggle-password-visibility"><i class="fas fa-eye"></i></button>
            </div>
            @error('password')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
            
            <label for="password_confirmation">Confirm Password:</label>
            <div class="password-container">
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                <button type="button" class="toggle-password-visibility"><i class="fas fa-eye"></i></button>
            </div>

            <label for="role">User Type:</label>
            <select id="role" name="role" required>
                <option value="0">Admin</option>
                <option value="1">Survey Team</option>
                <option value="2">4Ps Admin</option>
            </select>
            
            <button type="submit">Add</button>
            <button type="button" class="cancel-btn">Cancel</button>
        </form>
    </div>
</div>


    <!-- Edit Account Modal -->
    <div id="editAccountModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Edit Account</h2>
            <form id="editAccountForm">
                <label for="edit-username">Username:</label>
                <input type="text" id="edit-username" required readonly>
                
                <label for="edit-password">New Password:</label>
                <div class="password-container">
                    <input type="password" id="edit-password">
                    <button type="button" class="toggle-password-visibility"><i class="fas fa-eye"></i></button>
                </div>
                
                <label for="edit-confirm-password">Confirm New Password:</label>
                <div class="password-container">
                    <input type="password" id="edit-confirm-password">
                    <button type="button" class="toggle-password-visibility"><i class="fas fa-eye"></i></button>
                </div>

                <label for="edit-user-type">User Type:</label>
                <input type="text" id="edit-user-type" name="edit-user-type" readonly>
                
                <button type="submit">Update</button>
                <button type="button" class="cancel-btn">Cancel</button>
            </form>
        </div>
    </div>

    <script src="{{asset('js/accounts.js')}}"></script>
</body>
</html>