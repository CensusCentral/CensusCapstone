<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Isfhead; 
use App\Models\SurveyForms; 
use App\Models\Isfmember; 
use App\Models\householdCondition; 
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class IsfController extends Controller
{


    public function register(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer', 'between:0,2'], // Ensure role is between 0 and 2
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Create the user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);

        // Return a response or redirect
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }



  

    public function accountIndex()
{


    if (!function_exists('getRoleName')) {
        function getRoleName($role)
        {
            $roles = [
                0 => 'Admin',
                1 => 'SurveyTeam',
                2 => '4Ps',
            ];
    
            return $roles[$role] ?? 'Unknown';
        }
    }
    // Fetch all users from the database
    $users = User::all()->map(function ($user) {
        $user->role_name = getRoleName($user->role);
        return $user;
    });

    // Return a view with the users data
    return view('admin.sideComponents.accounts.accounts', compact('users'));
}

    public function index(Request $request,)
    {
        $barangay = $request->input('barangay');
    
        $query = Isfhead::query();
    
        if ($barangay) {
            $query->whereHas('surveyform', function($q) use ($barangay) {
                $q->where('barangay', $barangay);
            });
        }
    
        $isfheads = $query->paginate(5)->appends(['barangay' => $barangay]);

    
        return view('admin.sideComponents.barangay.barangay', [
            'isfheads' => $isfheads,
            'selectedBarangay' => $barangay
        ]);
        
    }


    public function memberIndex($id){

        $isfmember =  Isfmember::findOrFail($id);


        return view('barangay.barangay', [
            'isfmember' => $isfmember,
            
        ]);
        
    }




        public function headIndex(Request $request, $id)
    {
        try {
            // Fetch the specific Isfhead record by ID or fail, including members
            $isfhead = Isfhead::with('members')->findOrFail($id);
            
            // Extract members from the Isfhead instance
        
        

            // Return the view with the head and members data
            return view('barangay.barangay', [
                'isfhead' => $isfhead,
                
            ]);

            // return response()->json([
            //     'isfhead' => $isfhead,
            //     'members' => $members
            // ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return abort(404, 'ISF head not found');
        }
    }


        // FUNCTION TO PARA SA CENSUSFORM
        public function store(Request $request)
    {
        // Decode JSON membersData and merge it back into the request
        $membersData = json_decode($request->input('membersData'), true);
        $request->merge(['membersData' => $membersData]);
    
        $validatedData = $request->validate([

            'surveyDate' => 'required|date',
            'barangay' => 'required|string|max:255',

            'sitioPurok' => 'nullable|string|max:255',
            'interviewerName' => 'required|string|max:255',
            'areaClassification' => 'required|string|max:255',


            // isfheads validation
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'maidenName' => 'nullable|string|max:255',

            'dateOfBirth' => 'required|date',
            'age' => 'required|integer',
            'sex' => 'required|string|max:10',
            'civilStatus' => 'required|string|max:50',

            'occupation' => 'required|string|max:255',
            'workplace' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',

            'pwd' => 'nullable|boolean',
            'senior' => 'nullable|boolean',
            'lgbtq' => 'nullable|boolean',
            '4ps' => 'nullable|boolean',
            'Pagibig' => 'nullable|boolean',

            'gender' => 'nullable|string|max:20',
            'disability' => 'nullable|string|max:255',

            'spouseLname' => 'nullable|string|max:255',
            'spouseFname' => 'nullable|string|max:255',
            'spouseMname' => 'nullable|string|max:255',
            'spouseMaidenName' => 'nullable|string|max:255',
            'spouseDOB' => 'nullable|date',
            'spouseAge' => 'nullable|integer',
            'spouseSex' => 'nullable|string|max:10',
            
            'MedicalHistory' => 'nullable|string|max:255',

            'HouseholdClass' => 'required|string|max:255',
            'yearResidency' => 'required|integer',
            'householdSize' => 'required|integer',
            'doubleHousehold' => 'required|string|max:10',
            'indigenousOrNot' => 'required|string|max:50',
            'placeOrigin' => 'required|string|max:255',
            'reasonEstablishing' => 'required|string|max:255',
            'tenurialStatus' => 'required|string|max:50',
            'governmentResettelment' => 'required|string|max:255',
            'whichProgram' => 'nullable|string|max:255',


            // Household Conditions validation
            'houseAge' => 'required|integer',
            'typeOfStructure' => 'required|string|max:255',
            'useOfStructure' => 'required|string|max:255',
            'NoOfFloors' => 'required|integer',
            'typeOfHouse' => 'required|string|max:255',
            'EstimatedFloorArea' => 'required|numeric',
            'toiletType' => 'required|string|max:255',
            'waterSource' => 'required|string|max:255',
            'garbageDisposal' => 'required|string|max:255',
            'electricitySource' => 'required|string|max:255',
            'modeOfHouse' => 'required|string|max:255',
            'relationToOwner' => 'required|string|max:255',


            'membersData' => 'required|array',
            
            'membersData.*.memberlastName' => 'required|string|max:255',
            'membersData.*.memberfirstName' => 'required|string|max:255',
            'membersData.*.memberMiddleName' => 'nullable|string|max:255',
            'membersData.*.memberMaidenName' => 'nullable|string|max:255',
            'membersData.*.memberSex' => 'required|string|max:10',
            'membersData.*.memberDOB' => 'required|date',
            'membersData.*.memberAge' => 'required|integer',
            'membersData.*.memberCivilStatus' => 'required|string|max:50',
            'membersData.*.memberOccupation' => 'nullable|string|max:255',
            'membersData.*.memberPlaceOfWork' => 'nullable|string|max:255',
            'membersData.*.memberRelationToHead' => 'required|string|max:255',
            'membersData.*.memberOfCommunityGroup' => 'required|string|max:255',
            'membersData.*.memberAnyDisability' => 'nullable|string|max:255',
            'membersData.*.memberGenderIdentification' => 'required|string|max:50',
            'membersData.*.memberEducAttaintment' => 'required|string|max:255',
            'membersData.*.memberEstimatedIncome' => 'nullable|numeric',
                ]);

               

        
        DB::beginTransaction();

        try {
            // Use firstOrCreate to avoid duplicate survey forms
            $surveyForm = SurveyForms::create(
                [

                    'surveyDate' => $validatedData['surveyDate'], 
                    'barangay' => $validatedData['barangay'],
                    'sitioPurok' => $validatedData['sitioPurok'] ?? null,
                    'interviewerName' => $validatedData['interviewerName'],
                    'areaClassification' => $validatedData['areaClassification'],
                ]
            );
            

            
            $isfhead = Isfhead::firstOrCreate(
                [
                    'lastName' => $validatedData['lastName'],
                    'firstName' => $validatedData['firstName'],
                    'dateOfBirth' => $validatedData['dateOfBirth'],
                ],
                [
                    'surveyId' => $surveyForm->id,
                    'middleName' => $validatedData['middleName'] ?? null,
                    'maidenName' => $validatedData['maidenName'] ?? null,
                    'age' => $validatedData['age'],
                    'sex' => $validatedData['sex'],
                    'civilStatus' => $validatedData['civilStatus'],
                    'occupation' => $validatedData['occupation'],
                    'workplace' => $validatedData['workplace'] ?? null,
                    'address' => $validatedData['address'],
                   
                    'pwd' => $validatedData['pwd'] ?? false,
                    'senior' => $validatedData['senior'] ?? false,
                    'lgbtq' => $validatedData['lgbtq'] ?? false,
                    '4ps' => $validatedData['4ps'] ?? false,
                    'Pagibig' => $validatedData['Pagibig'] ?? false,

                    'gender' => $validatedData['gender'] ?? null,
                    'disability' => $validatedData['disability'] ?? null,
                    'spouseLname' => $validatedData['spouseLname'] ?? null,
                    'spouseFname' => $validatedData['spouseFname'] ?? null,
                    'spouseMname' => $validatedData['spouseMname'] ?? null,
                    'spouseMaidenName' => $validatedData['spouseMaidenName'] ?? null,
                    'spouseDOB' => $validatedData['spouseDOB'] ?? null,
                    'spouseAge' => $validatedData['spouseAge'] ?? null,
                    'spouseSex' => $validatedData['spouseSex'] ?? null,
                    'MedicalHistory' => $validatedData['MedicalHistory'] ?? null,
                    'HouseholdClass' => $validatedData['HouseholdClass'],
                    'yearResidency' => $validatedData['yearResidency'],
                    'householdSize' => $validatedData['householdSize'],
                    'doubleHousehold' => $validatedData['doubleHousehold'],
                    'indigenousOrNot' => $validatedData['indigenousOrNot'],
                    'placeOrigin' => $validatedData['placeOrigin'],
                    'reasonEstablishing' => $validatedData['reasonEstablishing'],
                    'tenurialStatus' => $validatedData['tenurialStatus'],
                    'governmentResettelment' => $validatedData['governmentResettelment'],
                    'whichProgram' => $validatedData['whichProgram'] ?? null,
                ]
            );


            // if (!$isfhead->wasRecentlyCreated) {
            //     return response()->json([
            //         'message' => 'Duplicate household head entry detected.',
            //     ], 409);
            // }

            // Use firstOrCreate to avoid duplicate household conditions
            $householdCondition = householdCondition::firstOrCreate(
                [
                    'ownerId' => $isfhead->id,
                ],
                [
                    'houseAge' => $validatedData['houseAge'],
                    'typeOfStructure' => $validatedData['typeOfStructure'],
                    'useOfStructure' => $validatedData['useOfStructure'],
                    'NoOfFloors' => $validatedData['NoOfFloors'],
                    'typeOfHouse' => $validatedData['typeOfHouse'],
                    'EstimatedFloorArea' => $validatedData['EstimatedFloorArea'],
                    'toiletType' => $validatedData['toiletType'],
                    'waterSource' => $validatedData['waterSource'],
                    'garbageDisposal' => $validatedData['garbageDisposal'],
                    'electricitySource' => $validatedData['electricitySource'],
                    'modeOfHouse' => $validatedData['modeOfHouse'],
                    'relationToOwner' => $validatedData['relationToOwner'],
                ]
            );

            // Handle members
            foreach ($validatedData['membersData'] as $memberData) {
                $member=Isfmember::firstOrCreate(
                    [
                        'headId' => $isfhead->id,
                        'memberlastName' => $memberData['memberlastName'],
                        'memberfirstName' => $memberData['memberfirstName'],
                        'memberDOB' => $memberData['memberDOB'],
                    ],
                    [
                        'memberMiddleName' => $memberData['memberMiddleName'] ?? null,
                        'memberMaidenName' => $memberData['memberMaidenName'] ?? null,
                        'memberSex' => $memberData['memberSex'],
                        'memberAge' => $memberData['memberAge'],
                        'memberCivilStatus' => $memberData['memberCivilStatus'],
                        'memberOccupation' => $memberData['memberOccupation'] ?? null,
                        'memberPlaceOfWork' => $memberData['memberPlaceOfWork'] ?? null,
                        'memberRelationToHead' => $memberData['memberRelationToHead'],
                        'memberOfCommunityGroup' => $memberData['memberOfCommunityGroup'],
                        'memberAnyDisability' => $memberData['memberAnyDisability'] ?? null,
                        'memberGenderIdentification' => $memberData['memberGenderIdentification'],
                        'memberEducAttaintment' => $memberData['memberEducAttaintment'],
                        'memberEstimatedIncome' => $memberData['memberEstimatedIncome'] ?? null,
                    ]
                );
            }
            

            


            // Commit the transaction if everything is successful
            DB::commit();
            
            return redirect()->route('dashboard');

        } catch (QueryException $e) {
            DB::rollBack();

            // Handle duplicate entry error (SQLSTATE 23000)
            if ($e->getCode() == 23000) {
                return response()->json(['message' => 'Duplicate entry detected. Please check your data.', 'error' => $e->getMessage()], 409);
            }

            // Log any other database errors
            Log::error('Database error: ' . $e->getMessage());
            return response()->json(['message' => 'Database error occurred. Please try again.', 'error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            DB::rollBack();

            // Log any general errors
            Log::error('Error saving data: ' . $e->getMessage());
            return response()->json(['message' => 'Data Insertion Failed', 'error' => $e->getMessage()], 500);
        }
    }
    


    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            // Fetch the ISFHead
            $isfHead = Isfhead::findOrFail($id);

            // Update ISFHead
            $isfHead->update($request->only([
                'lastName', 'firstName', 'middleName', 'maidenName',
                'dateOfBirth', 'age', 'sex', 'civilStatus',
                'occupation', 'workplace', 'address', 'pwd','senior','lgbtq', '4ps','Pagibig',
                'gender', 'disability',
                'spouseLname', 'spouseFname', 'spouseMname', 'spouseMaidenName',
                'spouseDOB', 'spouseAge', 'spouseSex',
                'MedicalHistory', 'HouseholdClass', 'yearResidency',
                'householdSize', 'doubleHousehold', 'indigenousOrNot',
                'placeOrigin', 'reasonEstablishing', 'tenurialStatus',
                'governmentResettelment', 'whichProgram'
            ]));

            // Update or create HouseholdCondition
            $householdCondition = HouseholdCondition::updateOrCreate(
                ['ownerId' => $isfHead->id],
                $request->only([
                    'houseAge', 'typeOfStructure', 'useOfStructure',
                    'NoOfFloors', 'typeOfHouse', 'EstimatedFloorArea',
                    'toiletType', 'waterSource', 'garbageDisposal',
                    'electricitySource', 'modeOfHouse', 'relationToOwner'
                ])
            );

            DB::commit();

            return response()->json([
                'message' => 'Household updated successfully',
                'isfHead' => $isfHead,
                'householdCondition' => $householdCondition
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error updating household', 'error' => $e->getMessage()], 500);
        }
    }


    public function updateMember(Request $request, $id){




    }



    public function delete($id)
    {
        $deleteIsf = Isfhead::findOrFail($id);
        


        // Delete the model
        $deleteIsf->delete();
    
        // Redirect with a success message
        return redirect()->back()->with('success', 'Record deleted successfully');
    }
    
    
}
