<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Models\Person;
use App\Repository\PersonRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class PersonController extends Controller
{
    private $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->middleware('auth');

        $this->personRepository = $personRepository;
    }

    public function index()
    {
        $persons = $this->personRepository->all();

        return view('person.list',compact('persons'));
    }

    public function create()
    {
        return view('person.create');
    }

    public function store(StorePersonRequest $request)
    {
        try {
            $this->personRepository->store($request->validated());
            session()->flash('message','Başarılı');
        }catch (\Exception $exception){
            session()->flash('message',$exception->getMessage());
        }
        return redirect()->route('person.index');
    }

    public function edit(int $id)
    {
        $person = $this->personRepository->findById($id);

        return view('person.edit',compact('person'));
    }
    public function update(StorePersonRequest  $request,int $id)
    {
        try {
            $this->personRepository->update($id,$request->validated());
        } catch (\Exception $exception){
            session()->flash('message',$exception->getMessage());
        }

        return redirect()->route('person.index');
    }

    public function destroy (int $id)
    {
        try {
            $this->personRepository->delete($id);

        }catch (\Exception $exception){
            session()->flash('message',$exception->getMessage());
        }
        return redirect()->route('person.index');
    }

    public function address(int $id)
    {
        $person = $this->personRepository->findById($id);
        $addresses = $this->personRepository->getAddressRelation($id);
        $name = $person->name;
        return view('address.list',compact('addresses','name'));
    }
}
