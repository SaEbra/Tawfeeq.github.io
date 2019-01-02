<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
ini_set('max_execution_time', 180);

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $serviceAccount;
    public $firebase;
    public $db;
    public $phoneNumber;
    public $genderId;
    public $ID;


    public function __construct()
    {
        $this->serviceAccount = ServiceAccount::fromJsonFile("../secret/tawfeeq-zawaj-d08b2478bb96.json");
        $this->firebase = (new Factory)->withServiceAccount($this->serviceAccount)->create();
        $this->db = $this->firebase->getDatabase();

        $this->phoneNumber = session('phoneNumber');
        $this->genderId = session('genderId');
        $this->ID = session('ID');
        
    }
    

    public function showLogin()
    {
        return view('Admins/AdminLogin');
    }

    public function login(Request $request)
    {
        return view('Admins/home');
    }

    public function showOurGoals()
    {
        $text =$this->db->getReference('ourGoals/text')->getSnapshot()->getValue();
        return view('Admins/ourGoals')->with(['text'=>$text]);
    }

    public function saveOurGoals(Request $request)
    {
        $inputs = $request->all();
        $this->db->getReference('ourGoals')->set([ 
            'text'=>trim($inputs['text']),
        ]);  
        return "Done";  
    }

    public function showWhoAreWe()
    {
        $text =$this->db->getReference('whoAreWe/text')->getSnapshot()->getValue();
        return view('Admins/whoAreWe')->with(['text'=>$text]);
        
    }

    public function saveWhoAreWe(Request $request)
    {
        $inputs = $request->all();
        $this->db->getReference('whoAreWe')->set([ 
            'text'=>trim($inputs['text']),
        ]);  
        return "Done"; 
    }
    public function showWarnings()
    {
        $text =$this->db->getReference('warnings/text')->getSnapshot()->getValue();
        return view('Admins/warnings')->with(['text'=>$text]);
    }

    public function saveWarnings(Request $request)
    {
        $inputs = $request->all();
        $this->db->getReference('warnings')->set([ 
            'text'=>trim($inputs['text']),
        ]);  
        return "Done";
    }

    public function showHowItWorks()
    {
        $text =$this->db->getReference('howItWorks/text')->getSnapshot()->getValue();
        return view('Admins/howItWorks')->with(['text'=>$text]);
    }

    public function saveHowItWorks(Request $request)
    {
        $inputs = $request->all();
        $this->db->getReference('howItWorks')->set([ 
            'text'=>trim($inputs['text']),
        ]);  
        return "Done";
    }

    public function showPayData()
    {
        $text =$this->db->getReference('payData/text')->getSnapshot()->getValue();
        return view('Admins/payData')->with(['text'=>$text]);
    }

    public function savePayData(Request $request)
    {
        $inputs = $request->all();
        $this->db->getReference('payData')->set([ 
            'text'=>trim($inputs['text']),
        ]);  
        return "Done";
    }





    
    public function showGeneralQuestions(Request $request)
    {  
        $getGeneralQuestions =$this->db->getReference('generalQuestions/'.$this->phoneNumber)->getSnapshot()->getValue();
        return view('generalQuestions')->with(['getGeneralQuestions'=>$getGeneralQuestions]);
    }


    public function saveGeneralQuestions(Request $request)
    {   
        $inputs = $request->all();
        /*
        $appreciateMarriageLife=trim($inputs['appreciateMarriageLife']);
        $GettingWantsByDialogue=trim($inputs['GettingWantsByDialogue']);
        $affectingSituations=trim($inputs['affectingSituations']);
        $afraidOfAllah=trim($inputs['afraidOfAllah']);
        $angerLevel=trim($inputs['angerLevel']);
        $angerMatters=trim($inputs['angerMatters']);
        $appreciateOthersFeeling=trim($inputs['appreciateOthersFeeling']);
        $appreciateWoman=trim($inputs['appreciateWoman']);
        $calm=trim($inputs['calm']);
        $concernFamily=trim($inputs['concernFamily']);
        $dealingWithMaritalProblems=trim($inputs['dealingWithMaritalProblems']);
        $dealingWithMistakes=trim($inputs['dealingWithMistakes']);
        $dealingWithProblems=trim($inputs['dealingWithProblems']);
        $dialogueChildrenAge=trim($inputs['dialogueChildrenAge']);
        $dislikeInFuturWife=trim($inputs['dislikeInFuturWife']);
        $dislikedPlaces=trim($inputs['dislikedPlaces']);
        $emotional=trim($inputs['emotional']);
        $familyRelationship=trim($inputs['familyRelationship']);
        $flexible=trim($inputs['flexible']);
        $generous=trim($inputs['generous']);
        $gentle=trim($inputs['gentle']);
        $hangOutWithFamilyOrFriends=trim($inputs['hangOutWithFamilyOrFriends']);
        $hobbies=trim($inputs['hobbies']);
        $hopeAboutChildren=trim($inputs['hopeAboutChildren']);
        $humble=trim($inputs['humble']);
        $hurryInJudging=trim($inputs['hurryInJudging']);
        $liar=trim($inputs['liar']);
        $lifeGoal=trim($inputs['lifeGoal']);
        $likeInFuturWife=trim($inputs['likeInFuturWife']);
        $likedPlaces=trim($inputs['likedPlaces']);
        $merciful=trim($inputs['merciful']);
        $negativePoints=trim($inputs['negativePoints']);
        $opinionOfChildren=trim($inputs['opinionOfChildren']);
        $opinionOfMaids=trim($inputs['opinionOfMaids']);
        $opinionOfMarriageLife=trim($inputs['opinionOfMarriageLife']);
        $opinionOfWifeJob=trim($inputs['opinionOfWifeJob']);
        $opinionOfWifeStudy=trim($inputs['opinionOfWifeStudy']);
        $optimistic=trim($inputs['optimistic']);
        $parentsObedience=trim($inputs['parentsObedience']);
        $perfectWife=trim($inputs['perfectWife']);
        $positivePoints=trim($inputs['positivePoints']);
        $priority=trim($inputs['priority']);
        $responsibilityForChildren=trim($inputs['responsibilityForChildren']);
        $siblingsRelationship=trim($inputs['siblingsRelationship']);
        $sittingWithChildren=trim($inputs['sittingWithChildren']);
        $smiley=trim($inputs['smiley']);
        $speakIllOfOthers=trim($inputs['speakIllOfOthers']);
        $spendSpareTime=trim($inputs['spendSpareTime']);
        $spendWeekTime=trim($inputs['spendWeekTime']);
        $stingy=trim($inputs['stingy']);
        $stubborn=trim($inputs['stubborn']);
        $styleDialogue=trim($inputs['styleDialogue']);
        $stylish=trim($inputs['stylish']);
        $venomous=trim($inputs['venomous']);
        $needsInPartner=trim($inputs['needsInPartner']);
        $describeYourSelf=trim($inputs['describeYourSelf']);
        */
        
        
        
        $this->db->getReference('generalQuestions/'.$this->phoneNumber)->set([ 
            'appreciateMarriageLife'=>trim($inputs['appreciateMarriageLife']),
            'GettingWantsByDialogue'=>trim($inputs['GettingWantsByDialogue']),
            'affectingSituations'=>trim($inputs['affectingSituations']),
            'afraidOfAllah'=>trim($inputs['afraidOfAllah']),
            'angerLevel'=>trim($inputs['angerLevel']),
            'angerMatters'=>trim($inputs['angerMatters']),
            'appreciateOthersFeeling'=>trim($inputs['appreciateOthersFeeling']),
            'appreciateWoman'=>trim($inputs['appreciateWoman']),
            'calm'=>trim($inputs['calm']),
            'concernFamily'=>trim($inputs['concernFamily']),
            'dealingWithMaritalProblems'=>trim($inputs['dealingWithMaritalProblems']),
            'dealingWithMistakes'=>trim($inputs['dealingWithMistakes']),
            'dealingWithProblems'=>trim($inputs['dealingWithProblems']),
            'dialogueChildrenAge'=>trim($inputs['dialogueChildrenAge']),
            'dislikeInFuturWife'=>trim($inputs['dislikeInFuturWife']),
            'dislikedPlaces'=>trim($inputs['dislikedPlaces']),
            'emotional'=>trim($inputs['emotional']),
            'familyRelationship'=>trim($inputs['familyRelationship']),
            'flexible'=>trim($inputs['flexible']),
            'generous'=>trim($inputs['generous']),
            'gentle'=>trim($inputs['gentle']),
            'hangOutWithFamilyOrFriends'=>trim($inputs['hangOutWithFamilyOrFriends']),
            'hobbies'=>trim($inputs['hobbies']),
            'hopeAboutChildren'=>trim($inputs['hopeAboutChildren']),
            'humble'=>trim($inputs['humble']),
            'hurryInJudging'=>trim($inputs['hurryInJudging']),
            'liar'=>trim($inputs['liar']),
            'lifeGoal'=>trim($inputs['lifeGoal']),
            'likeInFuturWife'=>trim($inputs['likeInFuturWife']),
            'likedPlaces'=>trim($inputs['likedPlaces']),
            'merciful'=>trim($inputs['merciful']),
            'negativePoints'=>trim($inputs['negativePoints']),
            'opinionOfChildren'=>trim($inputs['opinionOfChildren']),
            'opinionOfMaids'=>trim($inputs['opinionOfMaids']),
            'opinionOfMarriageLife'=>trim($inputs['opinionOfMarriageLife']),
            'opinionOfWifeJob'=>trim($inputs['opinionOfWifeJob']),
            'opinionOfWifeStudy'=>trim($inputs['opinionOfWifeStudy']),
            'optimistic'=>trim($inputs['optimistic']),
            'parentsObedience'=>trim($inputs['parentsObedience']),
            'perfectWife'=>trim($inputs['perfectWife']),
            'positivePoints'=>trim($inputs['positivePoints']),
            'priority'=>trim($inputs['priority']),
            'responsibilityForChildren'=>trim($inputs['responsibilityForChildren']),
            'siblingsRelationship'=>trim($inputs['siblingsRelationship']),
            'sittingWithChildren'=>trim($inputs['sittingWithChildren']),
            'smiley'=>trim($inputs['smiley']),
            'speakIllOfOthers'=>trim($inputs['speakIllOfOthers']),
            'spendSpareTime'=>trim($inputs['spendSpareTime']),
            'spendWeekTime'=>trim($inputs['spendWeekTime']),
            'stingy'=>trim($inputs['stingy']),
            'stubborn'=>trim($inputs['stubborn']),
            'styleDialogue'=>trim($inputs['styleDialogue']),
            'stylish'=>trim($inputs['stylish']),
            'venomous'=>trim($inputs['venomous']),
            'needsInPartner'=>trim($inputs['needsInPartner']),
            'describeYourSelf'=>trim($inputs['describeYourSelf']),
        ]);
        return "Done";    
         
    }

    public function  ShowProfilePhoto()
    {
        return view('profilePhoto');
    }
 
    public function showPersonalQuestions()
    {
        $getDivorcedDetails ='';
        $getMarriedMen='';
        $getMarriedMen='';

        if($this->genderId==1)
        {
            $personalTable='menMembersInfo';
            //$searchTable='menSearchStanderds';
            $getDivorcedDetails =$this->db->getReference('divorcedMen/'.$this->phoneNumber)->getSnapshot()->getValue();
            $getMarriedMen =$this->db->getReference('marriedMen/'.$this->phoneNumber)->getSnapshot()->getValue();
        }
         //Female Case
         if($this->genderId==2)
        {  
            $personalTable='womenMembersInfo';
            //$searchTable='womenSearchStanderds';
            $getDivorcedDetails =$this->db->getReference('divorcedWomen/'.$this->phoneNumber)->getSnapshot()->getValue();
            $getMarriedMen =$this->db->getReference('marriedMen/'.$this->phoneNumber)->getSnapshot()->getValue();
            //return $getDivorcedDetails;
        }
        $getPersonalQuestions =$this->db->getReference($personalTable.'/'.$this->phoneNumber)->getSnapshot()->getValue();

        $getCountries = $this->db->getReference('countries')->getSnapshot()->getValue();
        $getNationalities = $this->db->getReference('nationalities')->getSnapshot()->getValue();
        $getCities = $this->db->getReference('cities')->getSnapshot()->getValue();
        $getPartnerAge = $this->db->getReference('partnerAge')->getSnapshot()->getValue();
        $getSpecializations = $this->db->getReference('specializations')->getSnapshot()->getValue();
        $getDegrees = $this->db->getReference('degrees')->getSnapshot()-> getValue();
        $getJobs = $this->db->getReference('jobs')->getSnapshot()-> getValue();
        $getMonthlyIncome = $this->db->getReference('monthlyIncome')->getSnapshot()-> getValue();
        $getCurrencies = $this->db->getReference('currencies')->getSnapshot()-> getValue();
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

        $getMembersHealthCases =$this->db->getReference('membersHealthCases/'.$this->phoneNumber)->getSnapshot()->getValue();
        $getPoliceRecord =$this->db->getReference('policeRecord')->getSnapshot()->getValue();

        $getPoliceRecordMembers =$this->db->getReference('policeRecordMembers/'.$this->phoneNumber)->getSnapshot()->getValue();
        $getDebts =$this->db->getReference('debts')->getSnapshot()->getValue();
        $getAddiction =$this->db->getReference('addiction')->getSnapshot()->getValue();
        $getHouseType =$this->db->getReference('houseType')->getSnapshot()->getValue();

        $getMemberChildren =$this->db->getReference('memberChildren/'.$this->phoneNumber)->getSnapshot()->getValue();
        $getSpecialNeedMembers =$this->db->getReference('specialNeedMembers/'.$this->phoneNumber)->getSnapshot()->getValue();

        return view('personalQuestions')->with([
            'getPersonalQuestions'=>$getPersonalQuestions,
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
            'getSpecialNeeds'=>$getSpecialNeeds,
            'getReproduction'=>$getReproduction,
            'getMembersHealthCases'=>$getMembersHealthCases,
            'getPoliceRecord'=>$getPoliceRecord,
            'getPoliceRecordMembers'=>$getPoliceRecordMembers,
            'getDebts'=>$getDebts,
            'getAddiction'=>$getAddiction,
            'getDivorcedDetails'=>$getDivorcedDetails,
            'getHouseType'=>$getHouseType,
            'getMemberChildren'=>$getMemberChildren,
            'getMarriedMen'=>$getMarriedMen,
            'getSpecialNeedMembers'=>$getSpecialNeedMembers,
            'getMarriedMen'=>$getMarriedMen,
            
        ]);   

    }
    public function savePersonalQuestions(Request $request)
    {
        if($this->genderId==1)
        {
            $personalTable='menMembersInfo';
            //$searchTable='menSearchStanderds';
        }
        if($this->genderId==2)
        {
            $personalTable='womenMembersInfo';
            //$searchTable='womenSearchStanderds';
        }
        $inputs = $request->all();   

        //print_r($inputs);

        if((trim($inputs['firstName'])=='') || (trim($inputs['lastName'])==''))
        {
            exit("wrong");
        }
        if( ($inputs['policeRecordId']==2) && (trim($inputs['policeRecordReason'])=='') )
        {
            exit("wrong");
        }

        if($this->genderId==1)
        {
            if( $inputs['manMaritalStatusId']=='3' && $inputs['manDivorceReason']==''  ) 
                exit("wrong");
        }

        if($this->genderId==2)
        {
            if(  $inputs['womanMaritalStatusId']=='3' && $inputs['womanDivorceReason']==''  )  
                exit("wrong");
        } 

        $firstName=trim($inputs['firstName']);
        $lastName=trim($inputs['lastName']);
        $nationalityId=trim($inputs['nationalityId']);
        $residentCountryId=trim($inputs['residentCountryId']);
        $residentCityId=trim($inputs['residentCityId']);
        $dateOfBirth=trim($inputs['dateOfBirth']);
        $specializationId=trim($inputs['specializationId']);
        $degreeId=trim($inputs['degreeId']);
        $jobId=trim($inputs['jobId']);
        $monthlyIncomeId=trim($inputs['monthlyIncomeId']);
        $specialNeedId=trim($inputs['specialNeedId']);
        $reproductionId=trim($inputs['reproductionId']);
        $lengthId=trim($inputs['lengthId']);
        $weightId=trim($inputs['weightId']);
        $religionId=trim($inputs['religionId']);
        $smokingId=trim($inputs['smokingId']);
        $skinColorId=trim($inputs['skinColorId']);
        $hairTypeId=trim($inputs['hairTypeId']);
        $beautyId=trim($inputs['beautyId']);
        $originId=trim($inputs['originId']);
        $prayId=trim($inputs['prayId']);
        $fastingId=trim($inputs['fastingId']);
        $intercourseId=trim($inputs['intercourseId']);
        $teethBrushId=trim($inputs['teethBrushId']);
        $cleanlinessId=trim($inputs['cleanlinessId']);
       
        $addictionId=trim($inputs['addictionId']);
        $debtId=trim($inputs['debtId']);
        $musicId=trim($inputs['musicId']);
        $policeRecordId=trim($inputs['policeRecordId']);

        
        $this->db->getReference($personalTable.'/'.$this->phoneNumber)->update([ 
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'nationalityId'=>$nationalityId,
            'residentCountryId'=>$residentCountryId,
            'residentCityId'=>$residentCityId,
            'dateOfBirth'=>$dateOfBirth,
            'specializationId'=>$specializationId,
            'degreeId'=>$degreeId,
            'jobId'=>$jobId,
            'monthlyIncomeId'=>$monthlyIncomeId,
            'specialNeedId'=>$specialNeedId,
            'reproductionId'=>$reproductionId,
            'lengthId'=>$lengthId,
            'weightId'=>$weightId,
            'religionId'=>$religionId,
            'smokingId'=>$smokingId,
            'skinColorId'=>$skinColorId,
            'hairTypeId'=>$hairTypeId,
            'beautyId'=>$beautyId,
            'originId'=>$originId,
            'prayId'=>$prayId,
            'fastingId'=>$fastingId,
            'intercourseId'=>$intercourseId,
            'teethBrushId'=>$teethBrushId,
            'cleanlinessId'=>$cleanlinessId,

            'addictionId'=>$addictionId,
            'debtId'=>$debtId,
            'musicId'=>$musicId,
            'policeRecordId'=>$policeRecordId,

        ]); 
        
        $this->db->getReference('specialNeedMembers/'.$this->phoneNumber)->remove();
        if(trim($inputs['specialNeedCase'])!='' )
        {
            $this->db->getReference('specialNeedMembers/'.$this->phoneNumber)
            ->set([
                'specialNeedCase' => trim($inputs['specialNeedCase']),
            ]);

        }
         

        $this->db->getReference('membersHealthCases/'.$this->phoneNumber)->remove();
        for($i=0 ; $i < count($inputs['healthId']) ; $i++)
            {
                $this->db->getReference('membersHealthCases/'.$this->phoneNumber)->update([
                    'healthId_'.$i=> $inputs['healthId'][$i],
                ]);
            }

        if( ($inputs['chronicIllnessCase'])!='')
            {
                $this->db->getReference('membersHealthCases/'.$this->phoneNumber)->update([
                    'chronicIllnessCase'=> $inputs['chronicIllnessCase'],
                ]);
            }

        if( ($inputs['inheritedIllnessCase'])!='')
            {
                $this->db->getReference('membersHealthCases/'.$this->phoneNumber)->update([
                    'inheritedIllnessCase'=> $inputs['inheritedIllnessCase'],
                ]);
            }

        if( ($inputs['distortionCase'])!='')
            {
                $this->db->getReference('membersHealthCases/'.$this->phoneNumber)->update([
                    'distortionCase'=> $inputs['distortionCase'],
                ]);
            }

        $this->db->getReference('policeRecordMembers/'.$this->phoneNumber)->remove();    
        if(trim($inputs['policeRecordReason'])!='' )
            {
                $this->db->getReference('policeRecordMembers/'.$this->phoneNumber)
                ->update([
                    'policeRecordReason' => trim($inputs['policeRecordReason']),
                ]);
            }
           
        if($this->genderId==2)
            {
                $this->db->getReference($personalTable.'/'.$this->phoneNumber)
                ->update([
                    'womanMaritalStatusId'=> trim($inputs['womanMaritalStatusId']),
                    'hijabId'=> trim($inputs['hijabId']),
                    'houseTypeId'=> trim($inputs['womanHouseTypeId']),
                    
                ]);

                // delete old status
                $this->db->getReference('divorcedWomen/'.$this->phoneNumber)->remove();
                $this->db->getReference('widowedWomen/'.$this->phoneNumber)->remove();
                $this->db->getReference('memberChildren/'.$this->phoneNumber)->remove();
                
                    /*
                    $isDivorcedWomen= $this->db->getReference('divorcedWomen/'.$this->phoneNumber)->getSnapshot()-> getValue();
                    if (! empty($isDivorcedWomen)) {
                        //print_r($isDivorcedWomen);
                        $this->db->getReference('divorcedWomen/'.$this->phoneNumber)->remove();
                    }
                     

                    $isWidowedWomen= $this->db->getReference('widowedWomen/'.$this->phoneNumber)->getSnapshot()-> getValue();
                    if (! empty($isWidowedWomen)) {
                        $this->db->getReference('widowedWomen/'.$this->phoneNumber)->remove();
                        
                    } */

                      

                if($inputs['womanMaritalStatusId']==3 )
                {   
                    
                    $this->db->getReference('divorcedWomen/'.$this->phoneNumber)
                    ->update([
                        'phoneNumber'=> $this->phoneNumber,
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
                    $this->db->getReference('widowedWomen/'.$this->phoneNumber)
                    ->update([
                        'phoneNumber'=> $this->phoneNumber,
                        'husbandNumber'=> trim($inputs['husbandNumber']),
                        'childrenNumber'=> trim($inputs['womanChildrenNumber']),
                        'custodyId'=> trim($inputs['custodyId']),
                        'custodyNumber'=> trim($inputs['custodyNumber']),
                    ]); 
 

                } 


                if( ($inputs['womanMaritalStatusId']=="3" || $inputs['womanMaritalStatusId']=="4" ) && ($inputs['womanChildrenNumber']>0) )
                {
                     
                    
                    for($i=1 ; $i <= ($inputs['womanChildrenNumber']) ; $i++)
                    { 
                        $this->db->getReference('memberChildren/'.$this->phoneNumber)->update([
                            'childAge_'.$i=> $inputs['childAge_'.$i],
                            'childGender_'.$i=> $inputs['childGender_'.$i],
                        ]);
                    }
                    
                }
  
            } 
            
            
        if($this->genderId==1)
            { 
                $this->db->getReference($personalTable.'/'.$this->phoneNumber)
                ->update([
                    'manMaritalStatusId'=> trim($inputs['manMaritalStatusId']),
                    'beardId'=> trim($inputs['beardId']),
                    'houseTypeId'=> trim($inputs['manHouseTypeId']),
                    
                ]);

                  
                    
                    $this->db->getReference('divorcedMen/'.$this->phoneNumber)->remove();
                    $this->db->getReference('widowedMen/'.$this->phoneNumber)->remove();
                    $this->db->getReference('marriedMen/'.$this->phoneNumber)->remove();
                    $this->db->getReference('memberChildren/'.$this->phoneNumber)->remove();
                    /*
                    $isDivorcedMen= $this->db->getReference('divorcedMen/'.$this->phoneNumber)->getSnapshot()-> getValue();
                    if (! empty($isDivorcedMen)) {
                        //print_r($isDivorcedWomen);
                        $this->db->getReference('divorcedMen/'.$this->phoneNumber)->remove();
                    }
                     

                    $isWidowedMen= $this->db->getReference('widowedMen/'.$this->phoneNumber)->getSnapshot()-> getValue();
                    if (! empty($isWidowedMen)) {
                        $this->db->getReference('widowedMen/'.$this->phoneNumber)->remove();
                        
                    } 
                     
                    $isMarriedMen= $this->db->getReference('marriedMen/'.$this->phoneNumber)->getSnapshot()-> getValue();
                    if (! empty($isMarriedMen)) {
                        //print_r($isMemberChildren);
                        $this->db->getReference('marriedMen/'.$this->phoneNumber)->remove();
                    }
                    */
     

                if($inputs['manMaritalStatusId']==2 )
                {
                    $this->db->getReference('widowedMen/'.$this->phoneNumber)
                    ->set([
                        'phoneNumber'=> $this->phoneNumber,
                        'childrenNumber'=> trim($inputs['manChildrenNumber']),
                        'custodyId'=> trim($inputs['custodyId']),
                        'custodyNumber'=> trim($inputs['custodyNumber']),
                    ]); 
 
                }
 
                if($inputs['manMaritalStatusId']==3 )
                {   
                    
                    $this->db->getReference('divorcedMen/'.$this->phoneNumber)
                    ->set([
                        'phoneNumber'=> $this->phoneNumber,
                        'manDivorceReason'=> trim($inputs['manDivorceReason']),
                        'divorceNumber'=> trim($inputs['divorceNumber']),
                        'childrenNumber'=> trim($inputs['manChildrenNumber']),
                        'custodyId'=> trim($inputs['custodyId']),
                        'custodyNumber'=> trim($inputs['custodyNumber']),
                    ]); 
 
                     

                }

                if($inputs['manMaritalStatusId']==4 )
                {  
                    $this->db->getReference('marriedMen/'.$this->phoneNumber)
                    ->set([
                        'phoneNumber'=> $this->phoneNumber,
                        'wivesNumber'=> trim($inputs['wivesNumber']),
                        'secondWifeReason'=> trim($inputs['secondWifeReason']),
                        'childrenNumber'=> trim($inputs['manChildrenNumber']),
                        'custodyId'=> trim($inputs['custodyId']),
                        'custodyNumber'=> trim($inputs['custodyNumber']),
                    ]); 

                    $this->db->getReference('divorcedMen/'.$this->phoneNumber)->remove();
                    $this->db->getReference('widowedMen/'.$this->phoneNumber)->remove();

                }

                /*
                $isMemberChildren= $this->db->getReference('memberChildren/'.$this->phoneNumber)->getSnapshot()-> getValue();
                if (! empty($isMemberChildren)) {
                    //print_r($isMemberChildren);
                    $this->db->getReference('memberChildren/'.$this->phoneNumber)->remove();
                } */

                
                if( ($inputs['manMaritalStatusId']!="1"   ) && ($inputs['manChildrenNumber']>"0") )
                {
                     
                    
                    for($i=1 ; $i <= ($inputs['manChildrenNumber']) ; $i++)
                    { 
                        $this->db->getReference('memberChildren/'.$this->phoneNumber)->update([
                            'childAge_'.$i=> $inputs['childAge_'.$i],
                            'childGender_'.$i=> $inputs['childGender_'.$i],
                        ]);
                    }
                } 
  
            }     

        Session::put('firstName',$firstName);   
        Session::put('lastName',$lastName);
        return 'Done';
    }

    
    public function  showPartnerQuestions()
    {
        $getHijab='';
        $getHijabStanderds='';
        $getWomanMaritalStatusStanderds='';
        if($this->genderId==1)
        {
            $searchTable='menSearchStanderds';
            $getHijab= $this->db->getReference('hijab')->getSnapshot()->getValue();
            $getHijabStanderds = $this->db->getReference('hijabStanderds/'.$this->phoneNumber)->getValue();
            $getWomanMaritalStatusStanderds= $this->db->getReference('womanMaritalStatusStanderds/'.$this->phoneNumber)->getValue();
            
            
        }
         //Female Case
         if($this->genderId==2)
        {  
            $searchTable='womenSearchStanderds';
        }
        $getPartnerQuestions=$this->db->getReference($searchTable.'/'.$this->phoneNumber)->getSnapshot()->getValue();
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
        $getManMaritalStatus= $this->db->getReference('manMaritalStatus')->getSnapshot()-> getValue();
        $getHijab= $this->db->getReference('hijab')->getSnapshot()-> getValue();
        $getManMaritalStatus= $this->db->getReference('manMaritalStatus')->getSnapshot()-> getValue();
        $getBeard= $this->db->getReference('beard')->getSnapshot()-> getValue();
        $getSpecialNeeds= $this->db->getReference('specialNeeds')->getSnapshot()-> getValue();
        $getReproduction= $this->db->getReference('reproduction')->getSnapshot()-> getValue();

        $getBeautyStanderds = $this->db->getReference('beautyStanderds/'.$this->phoneNumber)->getValue();
        $getHairTypeStanderds= $this->db->getReference('hairTypeStanderds/'.$this->phoneNumber)->getValue();
        $getSkinColorStanderds= $this->db->getReference('skinColorStanderds/'.$this->phoneNumber)->getValue();
        $getWeightStanderds= $this->db->getReference('weightStanderds/'.$this->phoneNumber)->getValue(); 

          
            
        return view('partnerQuestions')->with([
            'getPartnerQuestions'=>$getPartnerQuestions,
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
            'getSpecialNeeds'=>$getSpecialNeeds,
            'getReproduction'=>$getReproduction,
            'getBeautyStanderds'=>$getBeautyStanderds,
            'getHairTypeStanderds'=>$getHairTypeStanderds,
            'getSkinColorStanderds'=>$getSkinColorStanderds,
            'getWeightStanderds'=>$getWeightStanderds,
            'getHijab'=>$getHijab,
            'getHijabStanderds'=>$getHijabStanderds,
            'getWomanMaritalStatusStanderds'=>$getWomanMaritalStatusStanderds,
            
            
        ]);
        
    }
    public function  savePartnerQuestions(Request $request)
    { 

        if($this->genderId==1)
        {
            $personalTable='menMembersInfo';
            $searchTable='menSearchStanderds';
        }
        if($this->genderId==2)
        {
            $personalTable='womenMembersInfo';
            $searchTable='womenSearchStanderds';
        }
        $inputs = $request->all();

        //print_r($inputs);
        //if( (count($inputs['weightId'])<=0) || (count($inputs['skinColorId'])  <=0) || (count($inputs['hairTypeId'])  <=0) || (count($inputs['beautyId'])  <=0) || ( count($inputs['hijabId'])  <=0) || ( count($inputs['womanMaritalStatusId'])  <=0) )
        if( (!isset($inputs['weightId'])) || (!isset($inputs['skinColorId'])) || (!isset($inputs['hairTypeId']) ) || (!isset($inputs['beautyId']) )   )
            {
                if($this->genderId==1 )
                {
                    if( !isset($inputs['womanMaritalStatusId']) || ( !isset($inputs['hijabId'])  ))
                    exit("wrong");

                }
                else    
                    exit("wrong");
                 

            }
        
         

        $this->db->getReference($searchTable.'/'.$this->phoneNumber)->update([ 
            'nationalityId'=>trim($inputs['nationalityId']),
            'residentCountryId'=>trim($inputs['residentCountryId']),
            'residentCityId'=>trim($inputs['residentCityId']),
            'partnerAgeId'=>trim($inputs['partnerAgeId']),
            'specializationId'=>trim($inputs['specializationId']),
            'degreeId'=>trim($inputs['degreeId']),
            'jobId'=>trim($inputs['jobId']),
            'monthlyIncomeId'=>trim($inputs['monthlyIncomeId']),
            'specialNeedId'=>trim($inputs['specialNeedId']),
            'reproductionId'=>trim($inputs['reproductionId']),
            'lengthId'=>trim($inputs['lengthId']),
            'religionId'=>trim($inputs['religionId']),
            'smokingId'=>trim($inputs['smokingId']),
            'originId'=>trim($inputs['originId']),
            'prayId'=>trim($inputs['prayId']),
            'fastingId'=>trim($inputs['fastingId']),
            'intercourseId'=>trim($inputs['intercourseId']),
            'cleanlinessId'=>trim($inputs['cleanlinessId']),
            'teethBrushId'=>trim($inputs['teethBrushId']),
            'musicId'=>trim($inputs['musicId']),
             

        ]);

      
        $this->db->getReference('weightStanderds/'.$this->phoneNumber)->remove();
        for($i=0 ; $i < count($inputs['weightId']) ; $i++)
            {
                $this->db->getReference('weightStanderds/'.$this->phoneNumber)->update([
                    'weightId_'.$i=> $inputs['weightId'][$i],
                ]);
            }
        //print_r($inputs['weightId']);
        $this->db->getReference('skinColorStanderds/'.$this->phoneNumber)->remove();    
        for($i=0 ; $i < count($inputs['skinColorId']) ; $i++)
            {
                $this->db->getReference('skinColorStanderds/'.$this->phoneNumber)->update([
                    'hairTypeId_'.$i=> $inputs['skinColorId'][$i],
                ]);
            }

        $this->db->getReference('hairTypeStanderds/'.$this->phoneNumber)->remove();        
        for($i=0 ; $i < count($inputs['hairTypeId']) ; $i++)
            {
                $this->db->getReference('hairTypeStanderds/'.$this->phoneNumber)->update([
                    'hairTypeId_'.$i=> $inputs['hairTypeId'][$i],
                ]);
            }

        $this->db->getReference('beautyStanderds/'.$this->phoneNumber)->remove();                    
        for($i=0 ; $i < count($inputs['beautyId']) ; $i++)
            {
                $this->db->getReference('beautyStanderds/'.$this->phoneNumber)->update([
                    'beautyId_'.$i=> $inputs['beautyId'][$i],
                ]);
            } 

        if($this->genderId==1)    
        {
            $this->db->getReference('hijabStanderds/'.$this->phoneNumber)->remove();                    
            for($i=0 ; $i < count($inputs['hijabId']) ; $i++)
            {
                $this->db->getReference('hijabStanderds/'.$this->phoneNumber)->update([
                    'hijabId_'.$i=> $inputs['hijabId'][$i],
                ]);
            }

            $this->db->getReference('womanMaritalStatusStanderds/'.$this->phoneNumber)->remove();                    
            for($i=0 ; $i < count($inputs['womanMaritalStatusId']) ; $i++)
            {
                $this->db->getReference('womanMaritalStatusStanderds/'.$this->phoneNumber)->update([
                    'womanMaritalStatusId_'.$i=> $inputs['womanMaritalStatusId'][$i],
                ]);
            } 

        }

        if($this->genderId==2)
        {
            $this->db->getReference($searchTable.'/'.$this->phoneNumber)->update([ 
                'manMaritalStatus'=>trim($inputs['manMaritalStatus']),
                'hasChildren'=>trim($inputs['manHasChildren']),
                'beardId'=>trim($inputs['beardId']),
            ]);
        }
        return "Done"; 

    }
    public function  saveInterestedIn(Request $request)
    {
        $inputs = $request->all(); 
        $matchListID=trim($inputs['matchListID']);
         
        $allIDs = $this->db->getReference('interestingMembers')->getValue();
        $keyAllIDs = array_keys($allIDs);
        //print_r($keyAllIDs);
        if (in_array($matchListID, $keyAllIDs))
            {
                $value = $this->db->getReference('interestingMembers/'.$matchListID)->getValue();
                if (in_array($this->phoneNumber, $value))
                    {
                        echo "Match found";
                    }
                    else
                    {
                        $this->db->getReference('interestingMembers/'.$matchListID)->push($this->phoneNumber);
                    }
            }
            else
            {
                $this->db->getReference('interestingMembers/'.$matchListID)->push($this->phoneNumber);
            }
        
    }

    public function  showInterestedInMe(Request $request)
    { 
        if($this->genderId==1)
            {
                $personalTable='menMembersInfo';
                $partnerTable='womenMembersInfo';        
            }
            
        
        if($this->genderId==2)
            {
                $personalTable='womenMembersInfo';  
                $partnerTable='menMembersInfo';          
            }
            
        
        $myData  =$this->db->getReference($personalTable.'/'.$this->phoneNumber)->getSnapshot()->getValue();
        $myID=$myData['ID'];
        $allIDs = $this->db->getReference('interestingMembers')->getValue();
        $keyAllIDs = array_keys($allIDs);
        //print_r($keyAllIDs);
        if (in_array($myID, $keyAllIDs))
            {
                $candidatePhoneNumber = $this->db->getReference('interestingMembers/'.$myID)->getValue();
                $candidate = array();
                foreach ($candidatePhoneNumber as $value=> $key) {
                  //echo  $key;
                  $candidateDetails = $this->db->getReference($partnerTable.'/'.$key)->getValue();
                  $candidate[$value]= array();
                  $ID=$candidateDetails['ID'];
                  
                  $dateOfBirth=$candidateDetails['dateOfBirth'];
                  $candidate[$value]['ID']=$ID;
                  $candidate[$value]['dateOfBirth']=$dateOfBirth;

                }
                //print_r($candidate);
                return view('interestedInMe')->with(['candidate' => $candidate]);
                //print_r($value);
            }
        else
            {
                return view('interestedInMe');
            }    


    }

    public function showProfile($ID)
    { 
        $this->genderId = session('genderId');

        if($this->genderId==1)
            {
                $partnerTable='womenMembersInfo'; 
                $tableMaritalStatus='womanMaritalStatus';       
                $maritalStatusId='womanMaritalStatusId';        
            }
            
        
        if($this->genderId==2)
            {
                $partnerTable='menMembersInfo';  
                $tableMaritalStatus='manMaritalStatus';       
                $maritalStatusId='manMaritalStatusId';        
            }
         
        $profileDetails = $this->db->getReference($partnerTable)->orderByChild("ID")->equalTo("$ID")->limitToFirst('1')->getSnapshot()->getValue();
         
        $keyProfileDetails=array_keys($profileDetails);
        $secondArray=$keyProfileDetails['0']; 
        
        /* 
        Array ( [918142923988] => Array ( [ID] => 22197413 [addictionId] => 1 [beardId] => 1 [beautyId] => 1 [cleanlinessId] => 1 [dateOfBirth] => 12/06/2018 [debtId] => 1 [degreeId] => 1 [fastingId] => 1 [firstName] => Ebrahim [genderId] => 1 [hairTypeId] => 1 [houseTypeId] => 1 [intercourseId] => 1 [jobId] => 1 [lastName] => Tawaf [lengthId] => 1 [manMaritalStatusId] => 1 [monthlyIncomeId] => 1 [musicId] => 1 [nationalityId] => 1 [originId] => 1 [policeRecordId] => 1 [prayId] => 1 [religionId] => 1 [reproductionId] => 1 [] => 1 [] => 1 [skinColorId] => 1 [smokingId] => 1 [specialNeedId] => 1 [specializationId] => 1 [status] => 1 [teethBrushId] => 1 [weightId] => 1 ) )
         */
        //echo $profileDetails[$secondArray]['residentCountryId'];
        
        $getCountries = $this->db->getReference('countries')->orderByChild("id")->equalTo($profileDetails[$secondArray]['residentCountryId'])->getSnapshot()->getValue();
        $getNationalities = $this->db->getReference('nationalities')->orderByChild("country_id")->equalTo($profileDetails[$secondArray]['nationalityId'])->getSnapshot()->getValue();
        $getCities = $this->db->getReference('cities')->orderByChild("id")->equalTo($profileDetails[$secondArray]['residentCityId'])->getSnapshot()->getValue();
        $getSpecializations = $this->db->getReference('specializations')->orderByChild("id")->equalTo($profileDetails[$secondArray]['specializationId'])->getSnapshot()->getValue();
        $getDegrees = $this->db->getReference('degrees')->orderByChild("id")->equalTo($profileDetails[$secondArray]['degreeId'])->getSnapshot()->getValue();
        $getJobs = $this->db->getReference('jobs')->orderByChild("id")->equalTo($profileDetails[$secondArray]['jobId'])->getSnapshot()-> getValue();
        $getMonthlyIncome = $this->db->getReference('monthlyIncome')->orderByChild("id")->equalTo($profileDetails[$secondArray]['monthlyIncomeId'])->getSnapshot()->getValue();
        $getSpecialNeeds= $this->db->getReference('specialNeeds')->orderByChild("id")->equalTo($profileDetails[$secondArray]['specialNeedId'])->getSnapshot()-> getValue();
        $getReproduction= $this->db->getReference('reproduction')->orderByChild("id")->equalTo($profileDetails[$secondArray]['reproductionId'])->getSnapshot()-> getValue();
        $getPoliceRecord= $this->db->getReference('policeRecord')->orderByChild("id")->equalTo($profileDetails[$secondArray]['policeRecordId'])->getSnapshot()-> getValue();
        $getDebts= $this->db->getReference('debts')->orderByChild("id")->equalTo($profileDetails[$secondArray]['debtId'])->getSnapshot()-> getValue();
        $getAddiction= $this->db->getReference('addiction')->orderByChild("id")->equalTo($profileDetails[$secondArray]['addictionId'])->getSnapshot()-> getValue();
        $getLength = $this->db->getReference('length')->orderByChild("id")->equalTo($profileDetails[$secondArray]['lengthId'])->getSnapshot()-> getValue();
        $getWeight = $this->db->getReference('weight')->orderByChild("id")->equalTo($profileDetails[$secondArray]['weightId'])->getSnapshot()-> getValue();
        $getReligion = $this->db->getReference('religion')->orderByChild("id")->equalTo($profileDetails[$secondArray]['religionId'])->getSnapshot()-> getValue();
        $getSmoking = $this->db->getReference('smoking')->orderByChild("id")->equalTo($profileDetails[$secondArray]['smokingId'])->getSnapshot()-> getValue();
        $getSkinColor= $this->db->getReference('skinColor')->orderByChild("id")->equalTo($profileDetails[$secondArray]['skinColorId'])->getSnapshot()-> getValue();
        $getHairType= $this->db->getReference('hairType')->orderByChild("id")->equalTo($profileDetails[$secondArray]['hairTypeId']) ->getSnapshot()-> getValue();
        $getBeauty= $this->db->getReference('beauty')->orderByChild("id")->equalTo($profileDetails[$secondArray]['beautyId']) ->getSnapshot()-> getValue();
        $getCleanliness= $this->db->getReference('cleanliness')->orderByChild("id")->equalTo($profileDetails[$secondArray]['cleanlinessId']) ->getSnapshot()-> getValue();
        $getTeethBrush= $this->db->getReference('teethBrush')->orderByChild("id")->equalTo($profileDetails[$secondArray]['teethBrushId']) ->getSnapshot()-> getValue();
        $getOrigin= $this->db->getReference('origin')->orderByChild("id")->equalTo($profileDetails[$secondArray]['originId']) ->getSnapshot()-> getValue();
        $getPray= $this->db->getReference('pray')->orderByChild("id")->equalTo($profileDetails[$secondArray]['prayId']) ->getSnapshot()-> getValue();
        $getFasting= $this->db->getReference('fasting')->orderByChild("id")->equalTo($profileDetails[$secondArray]['fastingId']) ->getSnapshot()-> getValue();
        $getIntercourse= $this->db->getReference('intercourse')->orderByChild("id")->equalTo($profileDetails[$secondArray]['intercourseId']) ->getSnapshot()-> getValue();
        $getMusic= $this->db->getReference('music')->orderByChild("id")->equalTo($profileDetails[$secondArray]['musicId']) ->getSnapshot()-> getValue();
        $getMaritalStatus= $this->db->getReference($tableMaritalStatus)->orderByChild("id")->equalTo($profileDetails[$secondArray][$maritalStatusId]) ->getSnapshot()-> getValue();
        $getHouseType= $this->db->getReference('houseType')->orderByChild("id")->equalTo($profileDetails[$secondArray]['houseTypeId']) ->getSnapshot()-> getValue();
        

        // ->orderByChild("id")->equalTo($profileDetails[$secondArray]['skinColorId']) 

        $getHijab='';
        $getBeard='';
        if($this->genderId==1)
        {
            $divorced =$this->db->getReference('divorcedWomen/'.$secondArray)->getSnapshot()->getValue();  
            $widowed =$this->db->getReference('widowedWomen/'.$secondArray)->getSnapshot()->getValue();
            $getHijab= $this->db->getReference('hijab')->orderByChild("id")->equalTo($profileDetails[$secondArray]['hijabId']) ->getSnapshot()-> getValue();
            
        }
        
    
        if($this->genderId==2)
            {
                $divorced =$this->db->getReference('divorcedmen/'.$secondArray)->getSnapshot()->getValue();  
                $widowed =$this->db->getReference('widowedmen/'.$secondArray)->getSnapshot()->getValue();
                $divorced =$this->db->getReference('marriedMen/'.$secondArray)->getSnapshot()->getValue();  
                $getBeard= $this->db->getReference('beard')->orderByChild("id")->equalTo($profileDetails[$secondArray]['beardId']) ->getSnapshot()-> getValue();
                    
            }
       
        
        $healthText=array();
        $getMembersHealthCases =$this->db->getReference('membersHealthCases/'.$secondArray)->getSnapshot()->getValue();
        for($i=0 ; $i< count($getMembersHealthCases) ; $i++)
        {
            $getHealth = $this->db->getReference('health')->orderByChild("id")->equalTo($getMembersHealthCases['healthId_'.$i])->getSnapshot()-> getValue();
            $val=$getHealth['0']['case'];
            array_push($healthText,$val);
        }

        $getGeneralQuestions =$this->db->getReference('generalQuestions/'.$secondArray)->getSnapshot()->getValue();
         
        return view('showProfile')->with([
            'profileDetails' => $profileDetails[$secondArray],
            'getNationalities' => $getNationalities,
            'getCountries' => $getCountries,
            'getCities' => $getCities,
            'getSpecializations'=>$getSpecializations,
            'getDegrees'=>$getDegrees,
            'getJobs'=>$getJobs,
            'getMonthlyIncome'=>$getMonthlyIncome,
            'healthText'=>$healthText,
            'getSpecialNeeds'=>$getSpecialNeeds,
            'getReproduction'=>$getReproduction,
            'getPoliceRecord'=>$getPoliceRecord,
            'getDebts'=>$getDebts,
            'getAddiction'=>$getAddiction,
            'getLength'=>$getLength,
            'getWeight'=>$getWeight,
            'getReligion'=>$getReligion,
            'getSmoking'=>$getSmoking,
            'getSkinColor'=>$getSkinColor,
            'getHairType'=>$getHairType,
            'getBeauty'=>$getBeauty,
            'getCleanliness'=>$getCleanliness,
            'getTeethBrush'=>$getTeethBrush,
            'getOrigin'=>$getOrigin,
            'getPray'=>$getPray,
            'getFasting'=>$getFasting,
            'getIntercourse'=>$getIntercourse,
            'getMusic'=>$getMusic,
            'getMaritalStatus'=>$getMaritalStatus,
            'getHouseType'=>$getHouseType,
            'getHijab'=>$getHijab,
            'getBeard'=>$getBeard,
            'getGeneralQuestions'=>$getGeneralQuestions,


        ]);
         
        
        
    }
    
    public function  showServicingStop(){
        return view('servicingStop');
    }
    public function  saveServicingStop(Request $request){

        $inputs = $request->all(); 
        $servicingStopStatus=$inputs['servicingStopStatus'];
        $servicingStopReason=trim($inputs['servicingStopReason']);
        $date = date('Y-m-d H:i:s');
        if($servicingStopStatus==4 && $servicingStopReason=='' )
        {
            return "Wrong";

        }
        else
        {
            $this->db->getReference('servicingStop/'.$this->phoneNumber)->update([
                'timeDate'=> $date,
                'memberID'=> $this->ID,
                'genderId'=> $this->genderId,
                'servicingStopStatus'=> $servicingStopStatus,
                'memberPhone'=> $this->phoneNumber,
            ]);

            if($servicingStopStatus==4 )
                $this->db->getReference('servicingStop/'.$this->phoneNumber)->update([ 'servicingStopReason'=> $servicingStopReason ]);
            else
                $this->db->getReference('servicingStop/'.$this->phoneNumber.'/servicingStopReason')->remove();    
            

            $this->db->getReference('membersInfo/'.$this->phoneNumber)->update([ 'status'=> '2' ]); 

            if($this->genderId==1)   
                $this->db->getReference('menMembersInfo/'.$this->phoneNumber)->update([ 'status'=> '2' ]); 

            if($this->genderId==2)   
                $this->db->getReference('womenMembersInfo/'.$this->phoneNumber)->update([ 'status'=> '2' ]);     
   
            return "Done";

        }

        
        //return "$this->phoneNumber"."<br>"."$this->ID"."<br>"."$this->genderId"."<br>"."$date"."<br>"."$servicingStopStatus"."<br>"."$servicingStopReason" ;
        

    }
    
}
