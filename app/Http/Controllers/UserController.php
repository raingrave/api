<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @var UserRepositoryContract
     */
    protected $userRepository;

    /**
     * UserController constructor.
     * @param UserRepositoryContract $userRepository
     */
    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->middleware('auth:api', ['except' => ['store']]);

        $this->userRepository = $userRepository;
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        if ($request->has('paginate')) {
            return response()->json(
                $this->userRepository->paginate($request->paginate),
                200
            );
        }

        return response()->json([
           'data' => $this->userRepository->getAll()
        ], 200);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request) : JsonResponse
    {
        try {
            return response()->json([
                'data' => $this->userRepository->create($request->all())
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 400);
        }
    }


    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id) : JsonResponse
    {
        try {
            return response()->json([
                'data' => $this->userRepository->findById($id)
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 400);
        }
    }


    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id) : JsonResponse
    {
        try {
            return response()->json([
                'data' => $this->userRepository->update($request->all(), $id)
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 400);
        }
    }


    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            return response()->json([
                'data' => $this->userRepository->delete($id)
            ], 204);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 400);
        }
    }
}
