<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class RegisterController extends Controller
{
    public function __construct()
    {
        $this->serviceAccount = ServiceAccount::fromJsonFile("../secret/tawfeeq-zawaj-d08b2478bb96.json");
        $this->firebase = (new Factory)->withServiceAccount($this->serviceAccount)->create();
        $this->db = $this->firebase->getDatabase();
    }
     
    public function index(Request $request)
    {   
        $inputs = $request->all();
        $phoneNumber=trim($inputs['phoneNumber']);
        $countryCode=trim($inputs['countryCode']);
        
        $countryCode = str_replace("+","",$countryCode); 
        $phoneNumber="$countryCode"."$phoneNumber";
        //return "$phoneNumber";
        $request->session()->put('phoneNumber',$phoneNumber);
        $phoneNumber = session('phoneNumber');
           
        $record  =$this->db->getReference('membersInfo')->orderByChild('phoneNumber')->equalTo("$phoneNumber")->getSnapshot()->getValue();
        
        if(isset($record[$phoneNumber]['status']) && ($record[$phoneNumber]['status']==1 || $record[$phoneNumber]['status']==2 ) ) {
            $request->session()->put('genderId', $record[$phoneNumber]['genderId']);
            $genderId = session('genderId');
            //echo "<br><br><br><br>".$record[$phoneNumber]['status']."<br><br>";
            if($record[$phoneNumber]['status']==2)
            {
                $this->db->getReference('membersInfo/'.$phoneNumber)->update([ 'status'=> '1' ]); 

                if($record[$phoneNumber]['genderId']==1 )   
                    $this->db->getReference('menMembersInfo/'.$phoneNumber)->update([ 'status'=> '1' ]); 

                    if($record[$phoneNumber]['genderId']==2 ) 
                    $this->db->getReference('womenMembersInfo/'.$phoneNumber)->update([ 'status'=> '1' ]); 
            }
            return redirect('matchList');
        }
        else {

            if(empty($record)) {
                $this->db->getReference('membersInfo/'.$phoneNumber)->set([ 'phoneNumber'=> $phoneNumber ]);    
                 
            }
            elseif(isset($record[$phoneNumber]['genderId'])) {
    
                if($record[$phoneNumber]['genderId']==1)
                    $existedData  =$this->db->getReference('menMembersInfo/'.$phoneNumber)->getSnapshot()->getValue();
                if($record[$phoneNumber]['genderId']==2)
                    $existedData  =$this->db->getReference('womenMembersInfo/'.$phoneNumber)->getSnapshot()->getValue();
    
                    if(isset($existedData['genderId']))
                        Session::put('genderId',$existedData['genderId']);
                        
                    if(isset($existedData['jobId']))
                        Session::put('jobId',$existedData['jobId']);
                        
                    if(isset($existedData['weightId']))
                        Session::put('weightId',$existedData['weightId']);
                        
                    if(isset($existedData['beautyId']))
                        Session::put('beautyId',$existedData['beautyId']);
                        
                    if(isset($existedData['fastingId']))
                        Session::put('fastingId',$existedData['fastingId']);
                    
            }
            
            return redirect('register');
        }

        
    }
    public function register(Request $request)
    {  

            $getCountries = $this->db->getReference('countries')->getSnapshot()->getValue();
            $getNationalities = $this->db->getReference('nationalities')->getSnapshot()->getValue();
            $getCities = $this->db->getReference('cities')->getSnapshot()->getValue();
            $getPartnerAge = $this->db->getReference('partnerAge')->getSnapshot()->getValue();
            $getSpecializations = $this->db->getReference('specializations')->getSnapshot()->getValue();
            $getDegrees = $this->db->getReference('degrees')->getSnapshot()-> getValue();
            $getJobs = $this->db->getReference('jobs')->getSnapshot()-> getValue();
            $getMonthlyIncome = $this->db->getReference('monthlyIncome')->getSnapshot()-> getValue();
            $getHealth = $this->db->getReference('health')->getSnapshot()-> getValue();
            $getLength = $this->db->getReference('length')->getSnapshot()-> getValue();
            $getWeight = $this->db->getReference('weight')->getSnapshot()-> getValue();
            $getReligion = $this->db->getReference('religion')->getSnapshot()-> getValue();
            $getSmoking = $this->db->getReference('smoking')->getSnapshot()-> getValue();
            $getSkinColor= $this->db->getReference('skinColor')->getSnapshot()-> getValue();
            $getHairType= $this->db->getReference('hairType')->getSnapshot()-> getValue();
            $getBeauty= $this->db->getReference('beauty')->getSnapshot()-> getValue();
            $getCleanliness= $this->db->getReference('cleanliness')->getSnapshot()-> getValue();
            $getTeethBrush= $this->db->getReference('teethBrush')->getSnapshot()-> getValue();
            $getOrigin= $this->db->getReference('origin')->getSnapshot()-> getValue();
            $getPray= $this->db->getReference('pray')->getSnapshot()-> getValue();
            $getFasting= $this->db->getReference('fasting')->getSnapshot()-> getValue();
            $getIntercourse= $this->db->getReference('intercourse')->getSnapshot()-> getValue();
            $getMusic= $this->db->getReference('music')->getSnapshot()-> getValue();
            $getWomanMaritalStatus= $this->db->getReference('womanMaritalStatus')->getSnapshot()-> getValue();
            $getHijab= $this->db->getReference('hijab')->getSnapshot()-> getValue();
            $getManMaritalStatus= $this->db->getReference('manMaritalStatus')->getSnapshot()-> getValue();
            $getBeard= $this->db->getReference('beard')->getSnapshot()-> getValue();
            $getManMaritalStatus= $this->db->getReference('manMaritalStatus')->getSnapshot()-> getValue();
            $getSpecialNeeds= $this->db->getReference('specialNeeds')->getSnapshot()-> getValue();
            $getReproduction= $this->db->getReference('reproduction')->getSnapshot()-> getValue();
            $getPoliceRecord= $this->db->getReference('policeRecord')->getSnapshot()-> getValue();
            $getDebts= $this->db->getReference('debts')->getSnapshot()-> getValue();
            $getAddiction= $this->db->getReference('addiction')->getSnapshot()-> getValue();
            $getHouseType= $this->db->getReference('houseType')->getSnapshot()-> getValue();
            
            
            /*
            $value = $request->session()->pull('genderId', 'genderId');
            $value = $request->session()->pull('jobId', 'jobId');
            $value = $request->session()->pull('weightId', 'weightId');
            $value = $request->session()->pull('beautyId', 'beautyId');
            $value = $request->session()->pull('fastingId', 'fastingId');
            */
             
            
        return view('register')->with([
            //'record'=>$record,
            'getCountries'=> $getCountries,
            'getNationalities'=>$getNationalities,
            'getCities'=>    $getCities,
            'getPartnerAge'=>   $getPartnerAge,
            'getSpecializations'=>$getSpecializations,
            'getDegrees'=>$getDegrees,
            'getJobs'=>$getJobs,
            'getMonthlyIncome'=>$getMonthlyIncome,
            'getHealth'=>$getHealth,
            'getLength'=>$getLength,
            'getWeight'=>$getWeight,
            'getReligion'=>$getReligion,
            'getSmoking'=>$getSmoking,
            'getSkinColor'=>$getSkinColor,
            'getHairType' =>$getHairType,
            'getBeauty' =>$getBeauty,
            'getCleanliness' =>$getCleanliness,
            'getTeethBrush' =>$getTeethBrush,
            'getOrigin' =>$getOrigin,
            'getPray'=>$getPray,
            'getFasting'=>$getFasting,
            'getIntercourse'=>$getIntercourse,
            'getMusic'=>$getMusic,
            'getWomanMaritalStatus'=>$getWomanMaritalStatus,
            'getHijab'=>$getHijab,
            'getManMaritalStatus'=>$getManMaritalStatus,
            'getBeard'=>$getBeard,
            'getManMaritalStatus'=>$getManMaritalStatus,
            'getReproduction'=>$getReproduction,
            'getPoliceRecord'=>$getPoliceRecord,
            'getDebts'=>$getDebts,
            'getAddiction'=>$getAddiction,
            'getHouseType'=>$getHouseType,
            
        ]);
        

    }

    public function save(Request $request)
    {
            $inputs = $request->all();
            $phoneNumber = session('phoneNumber');
            $phoneNumber = str_replace("+","",$phoneNumber); 
            $genderId = session('genderId');
            $ID=rand(1, 100000000);
            
             
            //$value = $this->db->getReference('fullMembersInfo')->orderByChild("phoneNumber")->equalTo($phoneNumber)->getValue();
            //$keyFullMembersInfo = array_keys($value);

            //$value = $this->db->getReference('membersSearchStanderds')->orderByChild("phoneNumber")->equalTo($phoneNumber)->getValue();
            //$keyMemberSearchStanderds = array_keys($value);
        
            //Male Case
            if((isset($inputs['genderId']) and ($inputs['genderId']==1)) || session('genderId')==1)
                {
                    $personalTable='menMembersInfo';
                    $searchTable='menSearchStanderds';
                     
                }
            //Female Case
            if((isset($inputs['genderId']) and ($inputs['genderId']==2)) || session('genderId')==2)
                {
                    $personalTable='womenMembersInfo';
                    $searchTable='womenSearchStanderds';
                }
            
            if(isset($inputs['genderId']))
            {
                $this->db->getReference($personalTable.'/'.$phoneNumber)
                ->update([
                    'genderId'=> trim($inputs['genderId']),
                    'firstName' => trim($inputs['firstName']),
                    'lastName' =>  trim($inputs['lastName']),
                    'nationalityId' => trim($inputs['nationalityId']),
                    'residentCountryId' => trim($inputs['residentCountryId']),
                    'residentCityId' => trim($inputs['residentCityId']),
                    'dateOfBirth' => trim($inputs['dateOfBirth']),
                    'specializationId' => trim($inputs['specializationId']),
                    'degreeId' => trim($inputs['degreeId']),          
                    'ID' => "$ID",          
                ]);

                $this->db->getReference($searchTable.'/'.$phoneNumber)
                ->update([
                    'nationalityId' => trim($inputs['partnerNationalityId']),
                    'residentCountryId' => trim($inputs['partnerResidentCountryId']),
                    'residentCityId' => trim($inputs['partnerResidentCityId']),
                    'partnerAgeId' => trim($inputs['partnerAgeId']),  
                    'specializationId' => trim($inputs['partnerSpecializationId']),  
                    'degreeId' => trim($inputs['partnerDegreeId']),  
                       
                    
                ]); 

                $this->db->getReference('membersInfo/'.$phoneNumber)->update(['genderId'=> $inputs['genderId'], 'ID'=> "$ID"  ]); 
                
                // update name
                $memberData = $auth->getUserByPhoneNumber('+'.$phoneNumber);
                $memberUid  = $memberData->uid; 
                $uid = $memberUid;
                $properties = ['displayName' => "$ID"];
                $updatedUser = $auth->updateUser($uid, $properties);


                //$request->session()->put('genderId',$inputs['genderId']);
                Session::put('genderId',$inputs['genderId']);
                return $inputs['genderId'];
                 
                
            }

            if(isset($inputs['jobId']))
            { 
                $this->db->getReference($personalTable.'/'.$phoneNumber)
                ->update([
                    'jobId'=> trim($inputs['jobId']),
                    'monthlyIncomeId'=> trim($inputs['monthlyIncomeId']),
                    'specialNeedId' => trim($inputs['specialNeedId']),
                    'reproductionId' => trim($inputs['reproductionId']),
                    'policeRecordId' => trim($inputs['policeRecordId']),
                    'debtId' => trim($inputs['debtId']),
                    'addictionId' => trim($inputs['addictionId']),
                    'lengthId' => trim($inputs['lengthId']),
                ]);
                /*
                if(trim($inputs['sicknessCase'])!='' )
                {
                    $this->db->getReference('unhealthyMembers/'.$phoneNumber)
                    ->update([
                        'sicknessCase' => trim($inputs['sicknessCase'])
                    ]);
                } 
                */
                
                if(trim($inputs['specialNeedCase'])!='' )
                {
                    $this->db->getReference('specialNeedMembers/'.$phoneNumber)
                    ->update([
                        'specialNeedCase' => trim($inputs['specialNeedCase']),
                    ]);

                }

                if(trim($inputs['policeRecordReason'])!='' )
                {
                    $this->db->getReference('policeRecordMembers/'.$phoneNumber)
                    ->update([
                        'policeRecordReason' => trim($inputs['policeRecordReason']),
                    ]);

                }

                
                for($i=0 ; $i < count($inputs['healthArr']) ; $i++)
                {
                    $this->db->getReference('membersHealthCases/'.$phoneNumber)->update([
                        'healthId_'.$i=> $inputs['healthArr'][$i],
                    ]);
                }

                if( ($inputs['chronicIllnessCase'])!='')
                {
                    $this->db->getReference('membersHealthCases/'.$phoneNumber)->update([
                        'chronicIllnessCase'=> $inputs['chronicIllnessCase'],
                    ]);
                }

                if( ($inputs['inheritedIllnessCase'])!='')
                {
                    $this->db->getReference('membersHealthCases/'.$phoneNumber)->update([
                        'inheritedIllnessCase'=> $inputs['inheritedIllnessCase'],
                    ]);
                }

                if( ($inputs['distortionCase'])!='')
                {
                    $this->db->getReference('membersHealthCases/'.$phoneNumber)->update([
                        'distortionCase'=> $inputs['distortionCase'],
                    ]);
                }

                $this->db->getReference($searchTable.'/'.$phoneNumber)
                ->update([
                    'jobId'=> trim($inputs['partnerJobId']),                        
                    'monthlyIncomeId' =>  trim($inputs['partnerMonthlyIncomeId']),
                    'reproductionId' => trim($inputs['partnerReproductionId']),
                    'lengthId' => trim($inputs['partnerLengthId']), 
                    'specialNeedId' =>trim($inputs['partnerSpecialNeedId']),    
                
                ]);
                
            }

            if(isset($inputs['weightId']))
            {   
                $this->db->getReference($personalTable.'/'.$phoneNumber)
                ->update([
                    'weightId'=> trim($inputs['weightId']),
                    'religionId'=> trim($inputs['religionId']),
                    'smokingId'=> trim($inputs['smokingId']),
                    'skinColorId'=> trim($inputs['skinColorId']),
                    'hairTypeId' =>  trim($inputs['hairTypeId']),
                    
                ]);  

                $this->db->getReference($searchTable.'/'.$phoneNumber)
                ->update([
                    'religionId'  =>  trim($inputs['partnerReligionId']),
                    'smokingId'   =>  trim($inputs['partnerSmokingId']),
                   
                ]); 
                for($i=0 ; $i < count($inputs['partnerWeightArr']) ; $i++)
                {
                    $this->db->getReference('weightStanderds/'.$phoneNumber)->update([
                        'weightId_'.$i=> $inputs['partnerWeightArr'][$i],
                    ]);
                }
                for($i=0 ; $i < count($inputs['partnerSkinColorArr']) ; $i++)
                {
                    $this->db->getReference('skinColorStanderds/'.$phoneNumber)->update([
                        'hairTypeId_'.$i=> $inputs['partnerSkinColorArr'][$i],
                    ]);
                }
                for($i=0 ; $i < count($inputs['partnerHairTypeArr']) ; $i++)
                {
                    $this->db->getReference('hairTypeStanderds/'.$phoneNumber)->update([
                        'hairTypeId_'.$i=> $inputs['partnerHairTypeArr'][$i],
                    ]);
                }
            } 
            if(isset($inputs['beautyId']))
            {
                $this->db->getReference($personalTable.'/'.$phoneNumber)
                ->update([
                    'beautyId'=> trim($inputs['beautyId']),
                    'cleanlinessId'=> trim($inputs['cleanlinessId']),
                    'originId'=> trim($inputs['originId']),
                    'prayId'=> trim($inputs['prayId']),
                    'teethBrushId' =>  trim($inputs['teethBrushId']),
                    
                ]);  

                $this->db->getReference($searchTable.'/'.$phoneNumber)
                ->update([
                    'cleanlinessId'  =>  trim($inputs['partnerCleanlinessId']),
                    'originId'   =>  trim($inputs['partnerOriginId']),
                    'prayId'  =>  trim($inputs['partnerPrayId']),
                    'teethBrushId'   =>  trim($inputs['partnerTeethBrushId']),
                ]); 

                for($i=0 ; $i < count($inputs['partnerBeautyArr']) ; $i++)
                {
                    $this->db->getReference('beautyStanderds/'.$phoneNumber)->update([
                        'beautyId_'.$i=> $inputs['partnerBeautyArr'][$i],
                    ]);
                }
            } 
            if(isset($inputs['fastingId']))
            {    
                
                $this->db->getReference($personalTable.'/'.$phoneNumber)
                ->update([
                    'fastingId'=> trim($inputs['fastingId']),
                    'intercourseId'=> trim($inputs['intercourseId']),
                    'musicId'=> trim($inputs['musicId']),
                    
                ]);  

                $this->db->getReference($searchTable.'/'.$phoneNumber)
                ->update([
                    'fastingId'  =>  trim($inputs['partnerFastingId']),
                    'musicId'   =>  trim($inputs['partnerMusicId']),
                    'intercourseId'=> trim($inputs['partnerIntercourseId']),
                    
                ]); 
                
                if($genderId==1)
                {
                    $this->db->getReference($personalTable.'/'.$phoneNumber)
                    ->update([
                        'manMaritalStatusId'=> trim($inputs['manMaritalStatusId']),
                        'beardId'=> trim($inputs['beardId']),
                        'houseTypeId'=> trim($inputs['manHouseTypeId']),
                    ]); 

                    for($i=0 ; $i < count($inputs['partnerHijabArr']) ; $i++)
                        {
                            $this->db->getReference('hijabStanderds/'.$phoneNumber)->update([
                                'hijabId_'.$i=> $inputs['partnerHijabArr'][$i],
                            ]);
                        }

                    for($i=0 ; $i < count($inputs['partnerWomanMaritalStatusArr']) ; $i++)
                        {
                            $this->db->getReference('womanMaritalStatusStanderds/'.$phoneNumber)->update([
                                'womanMaritalStatusId_'.$i=> $inputs['partnerWomanMaritalStatusArr'][$i],
                            ]);
                        }                        
                    
                    if($inputs['manMaritalStatusId']==2 )
                    {
                        $this->db->getReference('widowedmen/'.$phoneNumber)
                        ->update([
                            'phoneNumber'=> $phoneNumber,
                            'childrenNumber'=> trim($inputs['manChildrenNumber']),
                            'custodyId'=> trim($inputs['custodyId']),
                            'custodyNumber'=> trim($inputs['custodyNumber']),
                        ]); 
                    }

                    if($inputs['manMaritalStatusId']==3 )
                    {
                        $this->db->getReference('divorcedMen/'.$phoneNumber)
                        ->update([
                            'phoneNumber'=> $phoneNumber,
                            'manDivorceReason'=> trim($inputs['manDivorceReason']),
                            'divorceNumber'=> trim($inputs['divorceNumber']),
                            'childrenNumber'=> trim($inputs['manChildrenNumber']),
                            'custodyId'=> trim($inputs['custodyId']),
                            'custodyNumber'=> trim($inputs['custodyNumber']),
                        ]); 

                    }

                    if($inputs['manMaritalStatusId']==4 )
                    {
                        $this->db->getReference('marriedMen/'.$phoneNumber)
                        ->update([
                            'phoneNumber'=> $phoneNumber,
                            'wivesNumber'=> trim($inputs['wivesNumber']),
                            'secondWifeReason'=> trim($inputs['secondWifeReason']),
                        ]); 

                    }

                    if( ($inputs['manMaritalStatusId']=="2" || $inputs['manMaritalStatusId']=="3"  ) && ($inputs['manChildrenNumber']>"0") )
                    {
                        $this->db->getReference('memberChildren/'.$phoneNumber)->update([
                            'phoneNumber'=> $phoneNumber,
                        ]);
                        
                        for($i=1 ; $i <= ($inputs['manChildrenNumber']) ; $i++)
                        { 
                            $this->db->getReference('memberChildren/'.$phoneNumber)->update([
                                'childAge_'.$i=> $inputs['childAge_'.$i],
                                'childGender_'.$i=> $inputs['childGender_'.$i],
                            ]);
                        }
                    } 
                    
                    // final step
                    $this->db->getReference($personalTable.'/'.$phoneNumber)->update(['status'=> '1']); 
                    $this->db->getReference($searchTable.'/'.$phoneNumber)->update(['status'=> '1']); 
                    $this->db->getReference('membersInfo/'.$phoneNumber)->update(['status'=> '1']);
             
                      
                }
                if($genderId==2)
                {

                    print_r($inputs);
                    //exit;
                    //return print_r($inputs);
                    
                    $this->db->getReference($personalTable.'/'.$phoneNumber)
                    ->update([
                        'womanMaritalStatusId'=> trim($inputs['womanMaritalStatusId']),
                        'hijabId'=> trim($inputs['hijabId']),
                        'houseTypeId'=> trim($inputs['womanHouseTypeId']),
                        
                    ]); 
                    $this->db->getReference($searchTable.'/'.$phoneNumber)
                    ->update([
                        'manMaritalStatus'  =>  trim($inputs['partnerManMaritalStatus']),
                        'hasChildren'  =>  trim($inputs['partnerHasChildren']),
                        'beardId'   =>  trim($inputs['partnerBeardId']),
                    ]); 
                    

                    if($inputs['womanMaritalStatusId']==3 )
                    {  echo "phoneNumber:".$phoneNumber;
                        
                        $this->db->getReference('divorcedWomen/'.$phoneNumber)
                        ->update([
                            'phoneNumber'=> $phoneNumber,
                            'womanDivorceReason'=> trim($inputs['womanDivorceReason']),
                            'divorceNumber'=> trim($inputs['divorceNumber']),
                            'husbandNumber'=> trim($inputs['husbandNumber']),
                            'childrenNumber'=> trim($inputs['womanChildrenNumber']),
                            'custodyId'=> trim($inputs['custodyIdWoman']),
                            'custodyNumber'=> trim($inputs['custodyNumber']),
                        ]); 

                    }
                     
                    if($inputs['womanMaritalStatusId']==4 )
                    {
                        $this->db->getReference('widowedWomen/'.$phoneNumber)
                        ->update([
                            'phoneNumber'=> $phoneNumber,
                            'husbandNumber'=> trim($inputs['husbandNumber']),
                            'childrenNumber'=> trim($inputs['womanChildrenNumber']),
                            'custodyId'=> trim($inputs['custodyId']),
                            'custodyNumber'=> trim($inputs['custodyNumber']),
                        ]); 
                    }    
                    if( ($inputs['womanMaritalStatusId']=="3" || $inputs['womanMaritalStatusId']=="4" ) && ($inputs['womanChildrenNumber']>0) )
                    {
                        $this->db->getReference('memberChildren/'.$phoneNumber)->update([
                            'phoneNumber'=> $phoneNumber,
                        ]);
                        
                        for($i=1 ; $i <= ($inputs['womanChildrenNumber']) ; $i++)
                        { 
                            $this->db->getReference('memberChildren/'.$phoneNumber)->update([
                                'childAge_'.$i=> $inputs['childAge_'.$i],
                                'childGender_'.$i=> $inputs['childGender_'.$i],
                            ]);
                        }
                        
                    }

                    // final step
                    $this->db->getReference($personalTable.'/'.$phoneNumber)->update(['status'=> '1']); 
                    $this->db->getReference($searchTable.'/'.$phoneNumber)->update(['status'=> '1']); 
                    $this->db->getReference('membersInfo/'.$phoneNumber)->update(['status'=> '1']);
                       
                }
               
            }   
    } 

    public function getCities(Request $request)
    {
        $inputs = $request->all();
       
        $value = $this->db->getReference('cities')->orderByChild("country_id")->equalTo($inputs['countryId'])->getValue();
        $getCities = array();
        foreach($value as $key => $data)
            {
                $getCities[$key]['city_id'] =$data['id'];
                $getCities[$key]['name'] =$data['name'];   
            }
        sort($getCities);  
         
        return $getCities;
            
        
            
    }
  
    

    public function try(Request $request){
        return view('try');
    }   
}
