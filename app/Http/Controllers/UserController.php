<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Traits\RespondsWithHttpStatus;
class UserController extends Controller
{
    use RespondsWithHttpStatus;
    public $providers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {

        $providers_files=Storage::disk('local')->allfiles('providers');

        foreach ($providers_files as $provider_file){
            $data=Storage::disk('local')->get($provider_file);
            $data=json_decode($data,true);
            $this->providers[]=["name"=>$provider_file,"columns"=>$data['columns'],
                "StautsCode"=>$data['StautsCode'],"data"=>collect($data['transactaions'])];
        }
        if(!is_array($this->providers)){
            return $this->failure('Provider files not exit in providers folder inside storage folder',422);
        }
        if(isset($request->provider) && !in_array("providers/".$request->provider.".json", array_column($this->providers, 'name')))
        {
            return $this->failure("Provider Not Found",404);
        }
        elseif(isset($request->provider))
        {
            $key=array_search("providers/".$request->provider.".json", array_column($this->providers, 'name'));
            $data=$this->providers[$key]["data"];
            $transactaions=$this->filter($request,$data,$key);
        }
        elseif(!isset($request->provider))
        {
            $transactaions=collect();
            foreach ($this->providers as $key => $value) {
                $data_provider=$this->providers[$key]["data"];
                $data_provider=$this->filter($request,$data_provider,$key);
                $transactaions=$transactaions->merge($data_provider);
            }
        }

        return $this->success("",$transactaions->values());
    }
    public function filter($request,$data,$key){

        if(isset($request->statusCode))
        {

            $data=$data->where($this->providers[$key]['columns']["statusColumn"],$this->providers[$key]["StautsCode"][$request->statusCode]);
        }
        if(isset($request->amounteMin) && isset($request->amounteMax))
        {
            $data=$data->whereBetween($this->providers[$key]['columns']["amountColumn"],[$request->amounteMin,$request->amounteMax]);
        }
        if(isset($request->currency))
        {
            $data=$data->where($this->providers[$key]['columns']["currencyColumn"],$request->currency);
        }
        return $data;
    }

}
