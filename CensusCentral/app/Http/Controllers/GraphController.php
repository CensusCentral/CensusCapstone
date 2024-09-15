<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Isfhead; 
use App\Models\SurveyForms; 
use App\Models\Isfmember; 
use App\Models\householdCondition; 
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
 
    public function totalPopulationByAllBarangays(Request $request)
    {
        try {
            // Fetch distinct barangays from the surveyForms table
            $barangays = DB::table('survey_forms')->distinct()->pluck('barangay');
    
            $data = [];
            $overallTotalPopulation = 0;
            $totalPwd = 0;
            $totalSenior = 0;
            $total4ps = 0;
            $totalHousingLoan = 0;

            foreach ($barangays as $barangay) {
                // Fetch all ISF heads linked to the specified barangay
                $isfheads = Isfhead::whereIn('surveyId', function($query) use ($barangay) {
                    $query->select('surveyId')
                          ->from('survey_forms')
                          ->where('barangay', $barangay);
                })->get();
                
                $barangayPopulation = $isfheads->sum('householdSize');
                $barangayPwd = $isfheads->where('pwd', '1')->count();
                $barangaySenior = $isfheads->where('senior', '1')->count();
                $barangay4ps = $isfheads->where('4ps', '1')->count();
                
                // Assuming 'Pagibig' field represents housing loan eligibility
                $barangayHousingLoan = $isfheads->where('Pagibig', '1')->count();

                // Store the result
                $data[] = [
                    'barangay' => $barangay,
                    'totalPopulation' => $barangayPopulation,
                    'totalPwd' => $barangayPwd,
                    'totalSenior' => $barangaySenior,
                    'total4ps' => $barangay4ps,
                    'totalHousingLoan' => $barangayHousingLoan,
                ];

                $overallTotalPopulation += $barangayPopulation;
                $totalPwd += $barangayPwd;
                $totalSenior += $barangaySenior;
                $total4ps += $barangay4ps;
                $totalHousingLoan += $barangayHousingLoan;
            }

            
            
            return view('admin.dashboard', [
                'data' => $data,
                'overallTotalPopulation' => $overallTotalPopulation,
                'totalPwd' => $totalPwd,
                'totalSenior' => $totalSenior,
                'total4ps' => $total4ps,
                'totalHousingLoan' => $totalHousingLoan,
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }


    public function getPopulationByBarangay()
    {
        try {
            // Fetch distinct barangays from the surveyForms table
            $barangays = DB::table('survey_forms')->distinct()->pluck('barangay');
    
            $data = [];
            $totalPopulation = 0;
            $totalPwd = 0;
            $totalSenior = 0;
            $total4ps = 0;
            $totalHousingLoan = 0;
    
            foreach ($barangays as $barangay) {
                // Fetch all ISF heads linked to the specified barangay
                $isfheads = Isfhead::whereIn('surveyId', function($query) use ($barangay) {
                    $query->select('surveyId')
                          ->from('survey_forms')
                          ->where('barangay', $barangay);
                })->get();
                
                $barangayPopulation = $isfheads->sum('householdSize');
                $barangayPwd = $isfheads->where('pwd', '1')->count();
                $barangaySenior = $isfheads->where('senior', '1')->count();
                $barangay4ps = $isfheads->where('4ps', '1')->count();
                $barangayHousingLoan = $isfheads->where('Pagibig', '1')->count();
    
                // Store the result
                $data[] = [
                    'barangay' => $barangay,
                    'population' => $barangayPopulation,
                    'pwd' => $barangayPwd,
                    'senior' => $barangaySenior,
                    '4ps' => $barangay4ps,
                    'housingLoan' => $barangayHousingLoan,
                ];
    
                $totalPopulation += $barangayPopulation;
                $totalPwd += $barangayPwd;
                $totalSenior += $barangaySenior;
                $total4ps += $barangay4ps;
                $totalHousingLoan += $barangayHousingLoan;
            }
    
            // Return the view with the data
            return view('admin.sideComponents.reports.reports', [
                'data' => $data,
                'totalPopulation' => $totalPopulation,
                'totalPwd' => $totalPwd,
                'totalSenior' => $totalSenior,
                'total4ps' => $total4ps,
                'totalHousingLoan' => $totalHousingLoan,
            ]);
            
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
   
    

}
