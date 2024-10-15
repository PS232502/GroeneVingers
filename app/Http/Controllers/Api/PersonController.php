<?php

namespace App\Http\Controllers\Api;

use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonCollection;
use App\Filters\PersonFilter;

class PersonController extends Controller
{
    /**Display a listing of the resource.*/
  public function index(Request $request){$filter = new PersonFilter();$fiterItems = $filter->transform($request);

        $includeAddress = $request->query('includeAddress');

        $persons = Person::where($fiterItems)->with('adress')->get();

        // if($includeAddress) 
        // {
        //     $persons->with('adress');
        // }

        // $paginatedPersons = $persons->paginate()->appends($request->query());
 
        // return new PersonCollection($paginatedPersons);
        return  $persons;


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }

    public function updatePersonalSchedule(Request $request, $personId)
    {
        $person = Person::find($personId);
        $personalScheduleId = $request->input('personal_schedule_id');

        $person->personalSchedules()->attach($personalScheduleId);

        // Redirect back or return a response
    }

    public function showLoginForm()
    {
        return view('Login/Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $hash = bcrypt($request->password);

        // var_dump(Hash::make('admin'));
        // var_dump($credentials);
        // exit;
        //$cred = ['email'=>'keesdevries@hotmail.com', 'password'=>'admin'];
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            var_dump("hjkjhk");
            exit;
            return redirect()->route('Kuin');
        }
        Auth::store();
        dd(Auth::attempt($credentials));

        return back()->withErrors([
            'email' => 'Het opgegeven email adress of wachtwoord is incorrect.',
        ]);
    }
}
