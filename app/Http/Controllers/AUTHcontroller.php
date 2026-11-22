<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Recruit;
class AUTHcontroller extends Controller
{
    


    ///// 1.user reguester function 
    public function registeruser_funct (Request $registeruser_request){

// 1. Validate the input fields
$registeruser_input = $registeruser_request->validate([
'name' => 'required',
'email' => 'required',
'phone' => 'required',
'role' => 'required',
'password' => 'required',
]);

 // Hash the password securely before saving 
 //$registeruser_input['password'] = Hash::make($registeruser_input['password']);

  $registeruser_input['password'] = bcrypt($registeruser_input['password'] ) ;

  //dd($registerinput);  // dump and die 

   // 3. Create the record in the database
    Recruit::create($registeruser_input);

   //ALERT MESSAGE
  //  return redirect()->back()->with('succ', 'CONGRATULATIONVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV');
    return redirect('/registerUSER')->with('SUCC', 'CONGRATULATIONVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV.');
    }//registerdata function



    /// 2.user login function 
  public function loginuser_funct (Request $loginuser_request)
  {
    // 1. Validate that the input fields are filled
    $loginuser_input = $loginuser_request->validate([ 'email' => 'required|email',  'password' => 'required']);

    // 2. SCENARIO A: Check if the account / email exists in the database
    $user = Recruit::where('email', $loginuser_input['email'])->first();

    if (!$user) {
        // Account does not exist at all
        return redirect('/loginUSER')->with('SUCC', 'You do not have an account, please register or check your email.');
               }

      // (If $user is an Eloquent object, use $user->email. If it's an array, use $user['email'])
    $userEmail = is_array($user) ? $user['email'] : $user->email;
      //dd($userEmail, $loginuser_input['password'], $user->password);

      
     // 3. SCENARIO B: The account exists, now check if the password is correct
    //Attempt authentication (checks password match) (Using Laravel's Auth attempt) 
    if (auth()->attempt(['email' => $userEmail,  'password' => $loginuser_input['password'] ])) 
        {
        // Regenerate session for security
        $loginuser_request->session()->regenerate();

        $authenticatedUser = auth()->user();

         // 4. ROLE-BASED REDIRECTION.
         // 4.1. SUPER ADMIN CHECK
        if ($authenticatedUser->role === 'SUPER_ADMIN') {
            return redirect('/');
           //return redirect('/')->with('SUCC', 'SUPER ADMIN LOGIN SUCCESSFUL. WELCOME BACK!');
        }

        // 4.2. REGULAR ADMIN CHECK
        if ($authenticatedUser->role === 'ADMIN') {
            return redirect('/adminPANEL');
           //return redirect('/adminPANEL')->with('SUCC', 'LOGIN SUCCESSFUL. WELCOME BACK!');
        }
     
        // 4.3. REGULAR USER CHECK
        if ($authenticatedUser->role === 'USER') {
            // return redirect('/userPANEL');
            return redirect('/userPANEL')->with('SUCC', 'LOGIN SUCCESSFUL. WELCOME BACK!');
        }

        
        /// Fallback for unauthorized/unknown/unexpected roles
        auth()->logout();
        return redirect('/loginUSER')->with('SUCC', 'Unauthorized role.');
       }

      // 5. SCENARIO C: Password was incorrect
      return  redirect('/loginUSER')->with('SUCC', 'Incorrect password, please try again.');
       // return  redirect()->back()->with('SUCC', 'Incorrect password, please try again.');
       //return back()->with('SUCC', 'Incorrect password, please try again..');
}//logindata function


//// 3.user logout function 
public function logoutuser_funct (Request $logout_request){
    Auth() -> logout(); // this grab the user session or grab the key of entrace
        $logout_request->session()->invalidate();
        $logout_request->session()->regenerateToken();
     //return redirect('/loginUSER');
   return redirect('/loginUUSER')->with('SUCC', 'Logged out successfully.'); // redirect towards login page
}// logoutdata function

}






/* 
 // 3. SCENARIO B: The account exists, now check if the password is correct
    //Attempt authentication (checks password match) (Using Laravel's Auth attempt) 
 /*  // DEBUG CHECK: Let's see if the password matches manually
    // If this prints 'MATCH!', your hashing is fine and the issue is Laravel's Auth guard config.
    if (\Illuminate\Support\Facades\Hash::check($loginuser_input['password'], $user->password)) {
        // Manually log the user in
        auth()->login($user);
        $loginuser_request->session()->regenerate();

        if ($user->role === 'SUPER_ADMIN') {
            return redirect('/');
        }
        if ($user->role === 'ADMIN') {
            return redirect('/adminPANEL');
        }
        return redirect('/userPANEL');
    }

    return redirect('/loginUSER')->with('SUCC', 'Incorrect password, please try again.'); */ 