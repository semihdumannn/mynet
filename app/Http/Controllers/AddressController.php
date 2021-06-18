<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\Person;
use App\Repository\AddressRepositoryInterface;
use App\Repository\Eloquent\AddressRepository;
use App\Repository\PersonRepositoryInterface;
use Illuminate\Support\Facades\Cache;


class AddressController extends Controller
{
    private  $addressRepository;
    private  $personRepository;
    public function __construct(AddressRepository  $addressRepository, PersonRepositoryInterface $personRepository)
    {
        $this->middleware('auth');
        $this->addressRepository = $addressRepository;
        $this->personRepository = $personRepository;
    }

    public function index()
    {
        $addresses = $this->addressRepository->all();
        return view('address.list',compact('addresses'));
    }

    public function create()
    {
        $persons = $this->personRepository->all();
        $countries = Cache::rememberForever('countries',function () {
            return Country::with('cities')->get();
        });
        return view('address.create',compact('persons','countries'));
    }

    public function edit(int  $id)
    {
        $address = $this->addressRepository->findById($id);
        $persons = $this->personRepository->all();
        $countries = Cache::rememberForever('countries',function () {
            return Country::with('cities')->get();
        });
        return view('address.edit',compact('address','countries','persons'));
    }

    public function store(StoreAddressRequest $request)
    {
        try {
            $this->addressRepository->store($request->validated());

        }catch (\Exception $exception){
            session()->flash('message',$exception->getMessage());
        }
        return redirect()->route('address.index');
    }

    public function update(StoreAddressRequest $request,int $id)
    {
        try {
            $this->addressRepository->update($id,$request->validated());

        }catch (\Exception $exception){
            session()->flash('message',$exception->getMessage());
        }
        return redirect()->route('address.index');
    }

    public function destroy(int $id)
    {
        try {
            $this->addressRepository->delete($id);
        }catch (\Exception $exception){
            session()->flash('message',$exception->getMessage());
        }
        return redirect()->route('address.index');
    }
}
