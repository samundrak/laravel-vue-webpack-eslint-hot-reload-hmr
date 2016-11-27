<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Register;
use App\Profiyo\Service\User as UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class User extends Controller
{

    use Register;

    /**
     * @var UserService
     */
    private $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
        $this->middleware('auth', ['except' => 'register']);
    }

    /**
     * @param Request $request
     * @return \Exception
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return api_error(
                $validator->getMessageBag()->toArray(),
                [],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }


        if ($user = $this->user->register($request->all())) {
            return api_success('User has been created successfully.', $user);
        }

        return api_error('Unable to create user');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return
            response()->json($this->user->find(auth()->user()->id));
    }

    public function update($userId, Request $request)
    {
        if ($userId != auth()->user()->id) {
            return api_error('You are not authorized', Response::HTTP_UNAUTHORIZED);
        }

        $request = $request->except(['_method', 'id', 'username', 'password', 'email']);
        if ($this->user->update($request, $userId)) {
            return api_success('User profile has been updated');
        }

        return api_error('Unable to update user profile');
    }
}