<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Register · Clean Form</title>
    <style>
        /* Global reset & base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(145deg, #f6f9fc 0%, #e9f0f5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            margin: 0;
        }

        /* Main card */
        .register-card {
            background-color: #ffffff;
            max-width: 520px;
            width: 100%;
            padding: 2.5rem 2rem 2.2rem;
            border-radius: 32px;
            box-shadow: 0 20px 40px -12px rgba(0, 20, 30, 0.25),
                        0 8px 24px -6px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        .register-card:hover {
            transform: scale(1.002);
        }

        /* Heading */
        .register-card h2 {
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            color: #0a2a3b;
            margin-bottom: 0.35rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .register-card h2::before {
            content: "✨";
            font-size: 1.9rem;
            filter: drop-shadow(0 2px 4px rgba(0,150,200,0.2));
        }

        .subhead {
            font-size: 0.95rem;
            color: #527a8c;
            margin-bottom: 2rem;
            border-left: 4px solid #b6d7e8;
            padding-left: 1rem;
            font-weight: 400;
        }

        /* Form layout */
        .register-form {
            display: flex;
            flex-direction: column;
            gap: 1.35rem;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .input-group label {
            font-size: 0.87rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            color: #2f5569;
            padding-left: 0.2rem;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 0.9rem 1.2rem;
            font-size: 0.98rem;
            border: 1.8px solid #d4e3ed;
            border-radius: 18px;
            background-color: #fbfdff;
            transition: all 0.2s ease;
            outline: none;
            color: #103544;
            font-weight: 450;
            appearance: none;  /* removes default select arrow in some browsers */
            -webkit-appearance: none;
        }

        /* Custom select arrow */
        .input-group select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%233b6e8c' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1.2rem center;
            background-size: 1.1rem;
            padding-right: 2.8rem;
        }

        /* Focus states */
        .input-group input:focus,
        .input-group select:focus {
            border-color: #3f8db3;
            background-color: #ffffff;
            box-shadow: 0 0 0 5px rgba(63, 141, 179, 0.12);
        }

        /* Placeholder styling */
        ::placeholder {
            color: #9bb7c7;
            font-weight: 400;
            opacity: 0.8;
        }

        /* Password hint / small note */
        .password-hint {
            font-size: 0.76rem;
            color: #7d9dad;
            margin-top: 0.1rem;
            padding-left: 0.3rem;
            letter-spacing: 0.01em;
        }

        /* Register button */
        .register-btn {
            background: #0b3346;
            color: white;
            border: none;
            font-size: 1.1rem;
            font-weight: 600;
            padding: 1rem 1.5rem;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 0.5rem;
            letter-spacing: 0.3px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            box-shadow: 0 8px 16px -6px rgba(11, 51, 70, 0.25);
        }

        .register-btn:hover {
            background: #134a63;
            transform: translateY(-2px);
            box-shadow: 0 14px 24px -8px rgba(11, 51, 70, 0.35);
        }

        .register-btn:active {
            transform: translateY(0px);
            box-shadow: 0 4px 10px -4px rgba(11, 51, 70, 0.4);
        }

        /* Optional footer note */
        .login-redirect {
            text-align: center;
            font-size: 0.9rem;
            color: #557e92;
            margin-top: 1.6rem;
            font-weight: 450;
        }

        .login-redirect a {
            color: #0b3346;
            font-weight: 600;
            text-decoration: none;
            border-bottom: 1.5px solid #b6d7e8;
            transition: border-color 0.2s, color 0.2s;
        }

        .login-redirect a:hover {
            border-bottom-color: #0b3346;
            color: #041f2b;
        }

        /* Responsive tweaks */
        @media (max-width: 480px) {
            .register-card {
                padding: 1.8rem 1.4rem;
                border-radius: 26px;
            }

            .register-card h2 {
                font-size: 1.7rem;
            }

            .input-group input,
            .input-group select {
                padding: 0.8rem 1rem;
                border-radius: 15px;
            }

            .register-btn {
                font-size: 1rem;
                padding: 0.9rem 1.2rem;
            }
        }

        /* Small visual highlight for role select */
        .input-group select option {
            background: white;
            color: #103544;
            padding: 0.6rem;
        }

        .btn_back  {
            width: 13%;
            padding: 5px;
            background: #007bff;
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 5px;
            font-size: 12px;
            text-decoration: none;
            cursor: pointer;
            margin-top: 10px;
            margin-left: 390px;
            display: inline;
        
                     }

           a {
               color: white;
              }

        .btn_back:hover {
            background: #b30065;
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
        }

        .custom-alert-success svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            margin-top: 2px;
        }


    </style>
</head>
<body>
   
    <div class="register-card">

        @if(session('SUCC'))
          <div class="custom-alert-success">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        <span>{{ session('SUCC') }}</span>
          </div>
           @endif

        {{--  <button type="submit" class="btn_back"><a href="/"><-BACK</a></button> --}}
        <h2>  EDIT details</h2>
        <div class="subhead">Join our community in just a few steps  </div>

        <form class="register-form" action="/showselected_updated/{{$GRABDATA_ID -> ID}}" method="POST">
            @csrf
           @method('PUT')
            <!-- Name -->
            <div class="input-group">
                <label for="name">Full name</label>
                <input type="text" id="name" name="name" value =" {{ $GRABDATA_ID -> name }}" placeholder="name" autocomplete="name" required>
            </div>

            <!-- Email -->
            <div class="input-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" value =" {{ $GRABDATA_ID -> email }}"  placeholder="enter your email" autocomplete="email" required>
            </div>

            <!-- Phone number -->
            <div class="input-group">
                <label for="phone">Phone number</label>
                <input type="tel" id="phone" name="phone"  value =" {{ $GRABDATA_ID -> phone }}"  placeholder="Enter your phone number" autocomplete="tel" required>
            </div>

            <!-- Role (select) -->
            <div class="input-group">
                <p style="color:#b30065;">value ="{{ $GRABDATA_ID -> role }}"</p>
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="" disabled selected>— Select your role —</option>
                    <option value="USER" @selected($GRABDATA_ID->role === 'USER')>USER</option>
                    <option value="ADMIN" @selected($GRABDATA_ID->role === 'ADMIN')>ADMIN</option>
                    <option value="SUPER_ADMIN"  @selected($GRABDATA_ID->role === 'SUPER_ADMIN')>SUPER_ADMIN</option>
                   {{--  <option value="other">Other</option> --}}
                </select>
            </div>

          {{--   <!-- Password -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a strong password" autocomplete="new-password" required>
                <div class="password-hint">Minimum 8 characters, include a number & symbol</div>
            </div>
 --}}
            <!-- Submit button -->
            <button type="submit" class="register-btn">
                <span> SAVE CHANGES</span>
                <span style="font-size:0.5rem;"> → </span>
            </button>
        </form>

        <!-- Optional link to login -->
        <div class="login-redirect">
            Return to   <a href="/"> DASHBOARD</a>
        </div>
    </div>
</body>
</html>