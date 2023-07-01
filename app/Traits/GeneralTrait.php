<?php
namespace App\Traits;

Trait GeneralTrait 
{
    
    public function returnErrorMessage($errNum,$msg)
    {
        return response()->json([
            'status'=>false,
            'msg'=>$msg,             
        ],$errNum);
    }
    public function returnData($key,$value,$msg="")
    {
         return response()->json([
            'status'=>true,
            'msg'=>$msg,
            'data'=>[$key=>$value]
         ],200);
    }
}