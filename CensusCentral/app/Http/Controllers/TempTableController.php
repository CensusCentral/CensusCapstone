<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Isfhead; 
use App\Models\Isfmember; 


class TempTableController extends Controller
{
    public function storeInTempTable()
    {
        try {
            // Fetch Isfhead records where pwd is true
            $isfheadsWithPwd = Isfhead::where('pwd', true)->get();

            // Fetch Isfmember records where pwd is true
            $isfmembersWithPwd = Isfmember::where('pwd', true)->get();

            // Clear the temporary table before inserting new data
            DB::table('temp_pwd')->truncate();

            // Prepare data for insertion into the temporary table
            $data = [];

            foreach ($isfheadsWithPwd as $head) {
                $data[] = [
                    'type' => 'head',
                    'reference_id' => $head->id,
                    'last_name' => $head->lastName,
                    'first_name' => $head->firstName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            foreach ($isfmembersWithPwd as $member) {
                $data[] = [
                    'type' => 'member',
                    'reference_id' => $member->memberId,
                    'last_name' => $member->memberlastName,
                    'first_name' => $member->memberfirstName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Insert the combined data into the temporary table
            DB::table('temp_pwd')->insert($data);

            // Return a view with the combined data
            return view('admin.temp_pwd_list');

        } catch (\Exception $e) {
            // Handle any errors
            return response()->json([
                'error' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
}
