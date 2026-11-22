```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SUPER Admin(dashboard)</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f7fb;
            color: #1f2937;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 240px;
            height: 100vh;
            background: #0b3346;
            color: white;
            padding: 25px 18px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 40px;
            padding-left: 10px;
        }

        .logo span {
            color: #55c2f2;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 8px;
        }

        .menu a {
            display: block;
            padding: 13px 15px;
            color: #d9e8ef;
            text-decoration: none;
            border-radius: 10px;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #134a63;
            color: white;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 240px;
            min-height: 100vh;
        }

        /* ================= TOPBAR ================= */

        .topbar {
            height: 75px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .topbar h1 {
            font-size: 24px;
            color: #0b3346;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            background: #0b3346;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .admin-info span {
            font-size: 14px;
            font-weight: 600;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 30px;
        }

        /* ================= CARDS ================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.04);
        }

        .card-title {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card-value {
            font-size: 30px;
            font-weight: bold;
            color: #0b3346;
        }

        /* ================= USERS SECTION ================= */

        .users-section {
            background: white;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.04);
        }

        .users-header {
            padding: 22px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .users-header h2 {
            font-size: 20px;
            color: #0b3346;
        }

        .add-user {
            background: #0b3346;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .add-user:hover {
            background: #134a63;
        }

        /* ================= TABLE ================= */

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            color: #52606d;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: left;
            padding: 16px 20px;
        }

        td {
            padding: 17px 20px;
            border-top: 1px solid #edf0f3;
            font-size: 14px;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f8fbfd;
        }

        /* ================= USER ================= */

        .user-name {
            font-weight: 600;
            color: #0b3346;
        }

        .user-email {
            color: #6b7280;
        }

        /* ================= ROLE ================= */

        .role {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .role-admin {
            background: #e8f1ff;
            color: #2563eb;
        }

        .role-user {
            background: #e9f8ef;
            color: #16803c;
        }

        /* ================= STATUS ================= */

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #16803c;
            font-size: 13px;
            font-weight: 600;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #22c55e;
        }

        /* ================= ACTIONS ================= */

        .actions {
            display: flex;
            gap: 7px;
        }

     .action-btn {
            padding: 7px 11px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            border: 0px solid white;
            margin-top: -5.8px;
        }

        .view {
            background: #eef6fa;
            color: #0b5875;
        }

        .edit {
            background: #fff7df;
            color: #a16207;
        }

        .delete {
            background: #fff0f0;
            color: #dc2626;
            
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {

            .sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 0 18px;
            }

            .content {
                padding: 18px;
            }

            .sidebar .menu {
                display: flex;
                gap: 5px;
                overflow-x: auto;
            }

            .sidebar .menu li {
                margin-bottom: 0;
            }

            .sidebar .menu a {
                white-space: nowrap;
            }

            .users-header {
                gap: 15px;
                flex-wrap: wrap;
            }
        }

         .custom-alert-success {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background-color: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            word-break: break-word;
            overflow-wrap: break-word;
            place-items: center;
            text-align: center;
        }

        .custom-alert-success svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            margin-top: 2px;
             place-items: center;
            text-align: center;
        
        }

        .logout-btn {
   background: #0b3346;
    color: white;
    text-decoration: none;
    cursor: pointer;
    border-radius: 4px;
    border: 0px solid #0b3346;
}
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            Admin<span>Panel</span>
        </div>

        <ul class="menu">

            <li>
                <a href="/" class="active">
                    Dashboard
                </a>
            </li>

             <li>
                <a href="/adminPANEL">
                    ADMIN
                </a>
            </li>

            <li>
                <a href="/userPANEL">
                    Users
                </a>
            </li>

            <li>
                <a href="#">
                    Settings
                </a>
            </li>

            <li>

            <form action="/logoutUSER" method="POST">
               @csrf
             <button type="submit" class="logout-btn"> 
                 <a href="/loginUSER">Logout </a> 
            </button>
            </form>
               
            </li>

        </ul>

    </aside>


    <!-- MAIN -->
    <main class="main">
            @if(session('SUCC'))
                <div class="custom-alert-success">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <span>{{ session('SUCC') }}</span>
                </div>
            @endif
        <!-- TOP BAR -->
        <header class="topbar">

            <h1>Dashboard</h1>

            <div class="admin-info">

                <div class="admin-avatar">
                    A
                </div>

                <span>Administrator</span>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="content">


            <!-- STATISTICS -->
            <div class="cards">

                <div class="card">
                    <div class="card-title">
                        Total Users
                    </div>

                    <div class="card-value">
                        25
                    </div>
                </div>


                <div class="card">
                    <div class="card-title">
                        Administrators
                    </div>

                    <div class="card-value">
                        5
                    </div>
                </div>


                <div class="card">
                    <div class="card-title">
                        Normal Users
                    </div>

                    <div class="card-value">
                        20
                    </div>
                </div>

            </div>


            <!-- USERS TABLE -->
            <div class="users-section">

                <div class="users-header">

                    <h2>All Users</h2>

                    <a href="/registerUSER" class="add-user">
                        + Add User
                    </a>

                </div>


                <div class="table-container">

                    <table>

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>


                        <tbody>

                            <!-- USER 1 -->
                       @foreach( $identityTV  as $identity )
                            <tr>
                                          <td>  {{ $identity -> ID }}    </td>
                 <td> <div class="user-name"> {{  $identity -> name }} </div>  </td>
                <td><div class="user-email">  {{  $identity -> email }} </div></td>
                                         <td> {{ $identity -> phone}} </td>
            <td> <span class="role role-admin"> {{  $identity -> role }} </span> </td>
            <td>  <span class="status"> <span class="status-dot"></span> Active</span> </td>

           <td> 
             <div class="actions"> 

                  <form action="">  
                    <a href="#" class="action-btn view">  View   </a> 
                    @csrf
                </form> 

                   <form action="/showselected_edit/{{$identity -> ID }}"  method="GET">
                        @csrf
                         <button  class="action-btn edit"> Edit</button> 
                    </form>

                   <form action="/delete/{{ $identity -> ID  }}"  method="POST">
                          @csrf
                          @method('DELETE')
                    <button  class="action-btn delete"> Delete </button>  
                 </form>

             </div>
           </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </main>

</body>
</html>
