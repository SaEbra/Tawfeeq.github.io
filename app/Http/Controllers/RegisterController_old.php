<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Illuminate\Support\Facades\Session;


class RegisterController1 extends Controller
{
    
    public function index(Request $request)
    {
        $inputs = $request->all();
        $phoneNumber=trim($inputs['phoneNumber']);
        $phoneNumber = str_replace("+","",$phoneNumber); 
        $request->session()->put('phoneNumber',$phoneNumber);
        $phoneNumber = session('phoneNumber');
        
        
        $serviceAccount = ServiceAccount::fromJsonFile('../secret/tawfeeq-zawaj-d08b2478bb96.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $db = $firebase->getDatabase();
           
        $record  =$db->getReference('membersInfo')->orderByChild('phoneNumber')->equalTo("$phoneNumber")->getSnapshot()->getValue();
    
        
 
        if (empty($record)) {
            $db->getReference('membersInfo/'.$phoneNumber)->set([ 'phoneNumber'=> $phoneNumber ]);    
            //$db->getReference('membersSearchStanderds')->push([ 'phoneNumber'=> $phoneNumber ]);    
        }
 
             
            $getCountries = $db->getReference('countries')->getSnapshot()->getValue();
            $getNationalities = $db->getReference('nationalities')->getSnapshot()->getValue();
            $getCities = $db->getReference('cities')->getSnapshot()->getValue();
            $getPartnerAge = $db->getReference('partnerAge')->getSnapshot()->getValue();
            $getSpecializations = $db->getReference('specializations')->getSnapshot()->getValue();
            $getDegrees = $db->getReference('degrees')->getSnapshot()-> getValue();
            $getJobs = $db->getReference('jobs')->getSnapshot()-> getValue();
            $getMonthlyIncome = $db->getReference('monthlyIncome')->getSnapshot()-> getValue();
            $getCurrencies = $db->getReference('currencies')->getSnapshot()-> getValue();
            $getHealth = $db->getReference('health')->getSnapshot()-> getValue();
            $getLength = $db->getReference('length')->getSnapshot()-> getValue();
            $getWeight = $db->getReference('weight')->getSnapshot()-> getValue();
            $getReligion = $db->getReference('religion')->getSnapshot()-> getValue();
            $getSmoking = $db->getReference('smoking')->getSnapshot()-> getValue();
            $getSkinColor= $db->getReference('skinColor')->getSnapshot()-> getValue();
            $getHairType= $db->getReference('hairType')->getSnapshot()-> getValue();
            $getBeauty= $db->getReference('beauty')->getSnapshot()-> getValue();
            $getCleanliness= $db->getReference('cleanliness')->getSnapshot()-> getValue();
            $getTeethBrush= $db->getReference('teethBrush')->getSnapshot()-> getValue();
            $getOrigin= $db->getReference('origin')->getSnapshot()-> getValue();
            $getPray= $db->getReference('pray')->getSnapshot()-> getValue();
            $getFasting= $db->getReference('fasting')->getSnapshot()-> getValue();
            $getIntercourse= $db->getReference('intercourse')->getSnapshot()-> getValue();
            $getMusic= $db->getReference('music')->getSnapshot()-> getValue();
            $getWomanMaritalStatus= $db->getReference('womanMaritalStatus')->getSnapshot()-> getValue();
            $getHijab= $db->getReference('hijab')->getSnapshot()-> getValue();
            $getManMaritalStatus= $db->getReference('manMaritalStatus')->getSnapshot()-> getValue();
            $getBeard= $db->getReference('beard')->getSnapshot()-> getValue();
            $getManMaritalStatus= $db->getReference('manMaritalStatus')->getSnapshot()-> getValue();
            
             
            
        return view('register')->with([
            'record'=>$record,
            'getCountries'=> $getCountries,
            'getNationalities'=>$getNationalities,
            'getCities'=>    $getCities,
            'getPartnerAge'=>   $getPartnerAge,
            'getSpecializations'=>$getSpecializations,
            'getDegrees'=>$getDegrees,
            'getJobs'=>$getJobs,
            'getMonthlyIncome'=>$getMonthlyIncome,
            'getCurrencies'=>$getCurrencies,
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
            
        ]);
        

    }

    public function save(Request $request)
    {
        $inputs = $request->all();

           
        $serviceAccount = ServiceAccount::fromJsonFile('../secret/tawfeeq-zawaj-d08b2478bb96.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $db = $firebase->getDatabase();
            $phoneNumber = session('phoneNumber');
            $phoneNumber = str_replace("+","",$phoneNumber); 
            $genderId = session('genderId');
             
            $value = $db->getReference('fullMembersInfo')->orderByChild("phoneNumber")->equalTo($phoneNumber)->getValue();
            $keyFullMembersInfo = array_keys($value);

            $value = $db->getReference('membersSearchStanderds')->orderByChild("phoneNumber")->equalTo($phoneNumber)->getValue();
            $keyMemberSearchStanderds = array_keys($value);
        
            
            if(isset($inputs['genderId']))
            {
                $db->getReference('fullMembersInfo/'.$keyFullMembersInfo[0])
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
                     
                ]); 

                $db->getReference('membersSearchStanderds/'.$keyMemberSearchStanderds[0])
                ->update([
                    'nationalityId' => trim($inputs['partnerNationalityId']),
                    'residentCountryId' => trim($inputs['partnerResidentCountryId']),
                    'residentCityId' => trim($inputs['partnerResidentCityId']),
                    'partnerAgeId' => trim($inputs['partnerAgeId']),     
                
                ]);  
                
                $request->session()->put('genderId',$inputs['genderId']);
                return "Done";
            }

            if(isset($inputs['jobId']))
            {
                
                $genderId = session('genderId');
                 
                $db->getReference('fullMembersInfo/'.$keyFullMembersInfo[0])
                ->update([
                    'jobId'=> trim($inputs['jobId']),
                    'monthlyIncomeId'=> trim($inputs['monthlyIncomeId']),
                    'currencyId'=> trim($inputs['currencyId']),
                    'healthId' => trim($inputs['healthId']),
                    'sicknessCase' => trim($inputs['sicknessCase']),
                    'specialNeedId' => trim($inputs['specialNeedId']),
                    'specialNeedCase' => trim($inputs['specialNeedCase']),
                    'reproductionId' => trim($inputs['reproductionId']),
                    'lengthId' => trim($inputs['lengthId']),
                ]);

                $db->getReference('membersSearchStanderds/'.$keyMemberSearchStanderds[0])
                ->update([
                    'jobId'=> trim($inputs['partnerJobId']),                        
                    'monthlyIncomeId' =>  trim($inputs['partnerMonthlyIncomeId']),
                    'currencyId' =>  trim($inputs['partnerCurrencyId']),
                    'reproductionId' => trim($inputs['partnerReproductionId']),
                    'lengthId' => trim($inputs['partnerLengthId']), 
                    'specialNeedId' =>trim($inputs['partnerSpecialNeedId']),    
                
                ]);   
                return $genderId;
            }

            if(isset($inputs['weightId']))
            {
                $db->getReference('fullMembersInfo/'.$keyFullMembersInfo[0])
                ->update([
                    'weightId'=> trim($inputs['weightId']),
                    'religionId'=> trim($inputs['religionId']),
                    'smokingId'=> trim($inputs['smokingId']),
                    'skinColorId'=> trim($inputs['skinColorId']),
                    'hairTypeId' =>  trim($inputs['hairTypeId']),
                    
                ]);  

                $db->getReference('membersSearchStanderds/'.$keyMemberSearchStanderds[0])  
                ->update([
                    'religionId'  =>  trim($inputs['partnerReligionId']),
                    'smokingId'   =>  trim($inputs['partnerSmokingId']),
                   
                ]); 

            
                for($i=0 ; $i < count($inputs['partnerWeightArr']) ; $i++)
                {
                    $db->getReference('standerdWeights/'.$phoneNumber)->update([
                        'weightId_'.$i=> $inputs['partnerWeightArr'][$i],
                    ]);
                }

                 
                for($i=0 ; $i < count($inputs['partnerSkinColorArr']) ; $i++)
                {
                    $db->getReference('standerdSkinColor/'.$phoneNumber)->update([
                        'hairTypeId_'.$i=> $inputs['partnerSkinColorArr'][$i],
                    ]);
                }

                for($i=0 ; $i < count($inputs['partnerHairTypeArr']) ; $i++)
                {
                    $db->getReference('standerdHairType/'.$phoneNumber)->update([
                        'hairTypeId_'.$i=> $inputs['partnerHairTypeArr'][$i],
                    ]);
                }
                 
                
            } 
            if(isset($inputs['beautyId']))
            {
                print_r($inputs);
                $db->getReference('fullMembersInfo/'.$keyFullMembersInfo[0])
                ->update([
                    'beautyId'=> trim($inputs['beautyId']),
                    'cleanlinessId'=> trim($inputs['cleanlinessId']),
                    'originId'=> trim($inputs['originId']),
                    'prayId'=> trim($inputs['prayId']),
                    'teethBrushId' =>  trim($inputs['teethBrushId']),
                    
                ]);  

                $db->getReference('membersSearchStanderds/'.$keyMemberSearchStanderds[0])  
                ->update([
                    'cleanlinessId'  =>  trim($inputs['partnerCleanlinessId']),
                    'originId'   =>  trim($inputs['partnerOriginId']),
                    'prayId'  =>  trim($inputs['partnerPrayId']),
                    'teethBrushId'   =>  trim($inputs['partnerTeethBrushId']),
                ]); 

            
                for($i=0 ; $i < count($inputs['partnerBeautyArr']) ; $i++)
                {
                    $db->getReference('standerdBeauty/'.$phoneNumber)->update([
                        'BeautyId'.$i=> $inputs['partnerBeautyArr'][$i],
                    ]);
                }
            } 
            if(isset($inputs['fastingId']))
            {
                $db->getReference('fullMembersInfo/'.$keyFullMembersInfo[0])
                ->update([
                    'fastingId'=> trim($inputs['fastingId']),
                    'intercourseId'=> trim($inputs['intercourseId']),
                    'musicId'=> trim($inputs['musicId']),
                    
                ]);  

                $db->getReference('membersSearchStanderds/'.$keyMemberSearchStanderds[0])  
                ->update([
                    'fastingId'  =>  trim($inputs['partnerFastingId']),
                    'musicId'   =>  trim($inputs['partnerMusicId']),
                    
                ]); 
 
                  

                if($genderId==1)
                {
                    print_r($inputs);
                    
                    $db->getReference('menMembersInfo/'.$phoneNumber)
                    ->update([
                        'phoneNumber'=> $phoneNumber,
                        'manMaritalStatusId'=> trim($inputs['manMaritalStatusId']),
                        'beardId'=> trim($inputs['beardId']),
                    ]); 
                    $db->getReference('menSearchStanderds/'.$phoneNumber)  
                    ->update([
                        'womanMaritalStatusId'  =>  trim($inputs['partnerWomanMaritalStatusId']),
                    ]);

                    for($i=0 ; $i < count($inputs['partnerHijabArr']) ; $i++)
                        {
                            $db->getReference('standerdHijab/'.$phoneNumber)->update([
                                'hijabId_'.$i=> $inputs['partnerHijabArr'][$i],
                            ]);
                        }

                    if($inputs['manMaritalStatusId']==2 )
                    {
                        $db->getReference('widowedmen/'.$phoneNumber)
                        ->update([
                            'phoneNumber'=> $phoneNumber,
                            'childrenNumber'=> trim($inputs['menChildrenNumber']),
                            'custodyId'=> trim($inputs['custodyId']),
                            'custodyNumber'=> trim($inputs['custodyNumber']),
                        ]); 
                    }

                    if($inputs['manMaritalStatusId']==3 )
                    {
                        $db->getReference('divorcedmen/'.$phoneNumber)
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
                        $db->getReference('marriedmen/'.$phoneNumber)
                        ->update([
                            'phoneNumber'=> $phoneNumber,
                            'wivesNumber'=> trim($inputs['wivesNumber']),
                            'secondWifeReason'=> trim($inputs['secondWifeReason']),
                        ]); 

                    }

                    if( ($inputs['manMaritalStatusId']=="2" || $inputs['manMaritalStatusId']=="3"  ) && ($inputs['menChildrenNumber']>"0") )
                    {
                        $db->getReference('memberChildren/'.$phoneNumber)->update([
                            'phoneNumber'=> $phoneNumber,
                        ]);
                        
                        for($i=1 ; $i <= ($inputs['menChildrenNumber']) ; $i++)
                        { 
                            $db->getReference('memberChildren/'.$phoneNumber)->update([
                                'childAge_'.$i=> $inputs['childAge_'.$i],
                                'childGender_'.$i=> $inputs['childGender_'.$i],
                            ]);
                        }
                    }    
                      
                }
                if($genderId==2)
                {
                    //print_r($inputs);
                    $db->getReference('womenMembersInfo/'.$phoneNumber)
                    ->update([
                        'phoneNumber'=> $phoneNumber,
                        'womanMaritalStatusId'=> trim($inputs['womanMaritalStatusId']),
                        'hijabId'=> trim($inputs['hijabId']),
                    ]); 
                    $db->getReference('womenSearchStanderds/'.$phoneNumber)  
                    ->update([
                        'maritalStatus'  =>  trim($inputs['partnerMenmaritalStatus']),
                        'hasChildren'  =>  trim($inputs['partnerHasChildren']),
                        'beardId'   =>  trim($inputs['partnerBeardId']),
                    ]); 

                    if($inputs['womanMaritalStatusId']==3 )
                    {
                        $db->getReference('divorcedWomen/'.$phoneNumber)
                        ->update([
                            'phoneNumber'=> $phoneNumber,
                            'womanDivorceReason'=> trim($inputs['womanDivorceReason']),
                            'divorceNumber'=> trim($inputs['divorceNumber']),
                            'husbandNumber'=> trim($inputs['husbandNumber']),
                            'childrenNumber'=> trim($inputs['womanChildrenNumber']),
                            'custodyIdWoman'=> trim($inputs['custodyIdWoman']),
                            'custodyNumber'=> trim($inputs['custodyNumber']),
                        ]); 

                    }
                    if($inputs['womanMaritalStatusId']==4 )
                    {
                        $db->getReference('widowedWomen/'.$phoneNumber)
                        ->update([
                            'phoneNumber'=> $phoneNumber,
                            'husbandNumber'=> trim($inputs['husbandNumber']),
                            'childrenNumber'=> trim($inputs['womanChildrenNumber']),
                            'custodyIdWoman'=> trim($inputs['custodyIdWoman']),
                            'custodyNumber'=> trim($inputs['custodyNumber']),
                        ]); 
                    }    
                    if( ($inputs['womanMaritalStatusId']=="3" || $inputs['womanMaritalStatusId']=="4" ) && ($inputs['womenChildrenNumber']>"0") )
                    {
                        $db->getReference('memberChildren/'.$phoneNumber)->update([
                            'phoneNumber'=> $phoneNumber,
                        ]);
                        
                        for($i=1 ; $i <= ($inputs['womenChildrenNumber']) ; $i++)
                        { 
                            $db->getReference('memberChildren/'.$phoneNumber)->update([
                                'childAge_'.$i=> $inputs['childAge_'.$i],
                                'childGender_'.$i=> $inputs['childGender_'.$i],
                            ]);
                        }
                        
                    }
                        
                
                 

                   

                }
                // final step
                $db->getReference('membersInfo/'.$phoneNumber)->update(['status'=> '1']);   


            }   
            
        return "<br>done";
    } 

    public function getCities(Request $request)
    {
        $inputs = $request->all();
        $serviceAccount = ServiceAccount::fromJsonFile('../secret/tawfeeq-zawaj-d08b2478bb96.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $db = $firebase->getDatabase();
        $value = $db->getReference('cities')->orderByChild("country_id")->equalTo($inputs['countryId'])->getValue();
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
