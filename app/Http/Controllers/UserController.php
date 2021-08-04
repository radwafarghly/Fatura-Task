<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Response\Resources\UserResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\UserService;
use Dev\Infrastructure\Models\User;
/**
 *
 */
class UserController extends Controller
{
    /**
     *
     */
    private $userService;
    /**
     *
     */
    public function __construct(UserService $userService )
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->get('per_page', 15);
        $filter = [];
        if ($request->has('name')) {
            $filter['name'] = $request->get('name');
        }
        $result = $this->userService->index($filter, $limit);
        if ($result->isEmpty()) {
            return (new UserResource([]))->additional(ResponseType::simpleResponse('No Users found', false));
        }
        return UserResource::collection($result)
            ->additional(ResponseType::simpleResponse('Userss result', true));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  UserFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $data = $request->validated();
        $user= $this->userService->create($data);
        return (new UserResource($user))->additional(ResponseType::simpleResponse(trans('messages.user-add'), true));
    
       
    }
    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return (new UserResource($this->userService->show($user->id)))->additional(ResponseType::simpleResponse('User item', true));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $User
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, USer $user)
    {
        $data = $request->validated();
      
        $result=  $this->userService->update($user, $data);
        return (new UserResource($result))->additional(ResponseType::simpleResponse(trans('messages.user-update'), true));
      
        
      
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        $this->userService->delete($user);
        return (new UserResource([]))->additional(ResponseType::simpleResponse(trans('messages.user-deleted'), true));        
    }
   
    
}