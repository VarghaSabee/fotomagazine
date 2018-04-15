<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Hash;

class UsersController extends AppBaseController
{
    /** @var  UsersRepository */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
        $this->middleware('auth');
        $this->middleware('auth:admin')->except('update','edit','updateImg');
    }

    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usersRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->usersRepository->all();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRequest $request)
    {
        $input = $request->all();

        $users = $this->usersRepository->create($input);

        Flash::success('Users saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified Users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit()
    {
        $id = Auth::user()->id;
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('users', $users);
    }

    /**
     * Update the specified Users in storage.
     *
     * @param  int              $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if(isset($request->newpassword) && !$request->newpassword == '') {
            if (Hash::check($request->password, $user->password)) {
                if ($request->newpassword == $request->newpasswordconf) {
                    $user->telephone = $request->telephone;
                    $user->name = $request->name;
                    $user->image = $request->image;
                    $user->password = Hash::make($request->newpassword);
                    $user->save();
                } else {
                    return redirect(route('users.edit',['id',$user->id]))->with('status', 'Паролі не збігаються!');
                }
            } else {
                return redirect(route('users.edit',['id',$user->id]))->with('status', 'Невірний пароль!');
            }
        }
        $user->telephone = $request->telephone;
        $user->name = $request->name;
        $user->image = $request->image;
        $user->save();
        return redirect(route('users.edit',['id',$user->id]))->with('status', 'Профіль оновлено!');
    }

    /**
     * Remove the specified Users from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Users deleted successfully.');

        return redirect(route('users.index'));
    }

    public function updateImg(Request $req){
        try{
            $location = public_path() . '/images/users/' . Auth::user()->id . '/';

            if (!file_exists($location)) {
                mkdir($location, 0777, true);
            }

            $files = glob($location . '*');
            foreach($files as $file){
                if(is_file($file))
                    unlink($file);
            }
            $name = time() . '.png';
            $req->image->move($location, $name);

            $img = '' . Auth::user()->id . '/' . $name;

            $user = Auth::user();
            $user->image = $img;
            $user->save();
            return $img;
        }catch (Exception $e){
            return $e;
        }
    }
}
