<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Recruit;
use Illuminate\Database\Eloquent\SoftDeletes;

class DEL_UPcontroller extends Controller
{

///////// 1.THIS IS DELETING USER FUNCTION //////////////
    public function user_delete (Request $user_delete_request , Recruit $DELETE_ID) {
        //dd($post); //Dump and Die FUNCTION
 $DELETE_ID-> delete();
 //return back() -> with('SUCC', 'USER ..DELETED SUCCESSFULLY....');  // SAME AS
 return redirect()->back()-> with('SUCC', 'USER ..DELETED SUCCESSFULLY....');
}//delete function ends


//////////// 2.THIS FUNCTION  FOR GRAB THE FORM DATA //////////
public function show_selected_editfunct (Request $show_data_request ,  Recruit $GRABDATA_ID){
    return view('PANELS.showselected' ,compact('GRABDATA_ID'));
}//show_selected_editfunct ends




//////////////////// 3.THIS FUNCTION  FOR update  THE edited form DATA ///////////////////////////
public function show_selected_updatefunct (Request $request , Recruit $GRABDATA_ID ){

      // 1. Validate the input
    $validated = $request->validate([                 
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'role' => 'required|string|max:50|in:ADMIN,USER,SUPER_ADMIN',
    ]);

      // 2. Sanitize/normalize the values
    $validated['name'] = trim($validated['name']);
    //$validated['email'] = strtolower(trim($validated['email']));
     $validated['email'] = (trim($validated['email']));
    $validated['phone'] = trim($validated['phone']);

     // 3. Update the selected user
    $GRABDATA_ID->update($validated);

   // 4. Return the view and pass both the data AND a message using ->with()
    //return view('PANELS.showselected', compact('GRABDATA_ID'))->with('UPDATED_MESSAGE', 'EDIT PAGE LOADED SUCCESSFULLY....');

   //return redirect('/adminPANEL')->with('UPDATED_MESSAGE', 'USER ..UPADTED SUCCESSFULLY....');//Forces redirection to a specific URL path.
   return redirect()->back()->with('SUCC', 'USER ..UPADTED SUCCESSFULLY....'); 

}
}


