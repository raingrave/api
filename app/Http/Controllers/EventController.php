<?php

namespace App\Http\Controllers;

use App\Event;
use App\Repositories\Contracts\EventRepositoryContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventRepository;

    public function __construct(EventRepositoryContract $eventRepository)
    {
        $this->middleware('auth:api', ['except' => ['login']]);

        $this->eventRepository = $eventRepository;
    }


    public function index(Request $request) : JsonResponse
    {
        if ($request->has('paginate')) {
            return response()->json(
                $this->eventRepository->paginate($request->paginate),
                200
            );
        }

        return response()->json([
            'data' => $this->eventRepository->getAll()
        ], 200);
    }


    public function store(Request $request) : JsonResponse
    {
        try {
            return response()->json([
                'data' => $this->eventRepository->create($request->all())
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 400);
        }
    }


    public function show(int $id) : JsonResponse
    {
        try {
            return response()->json([
                'data' => $this->eventRepository->findById($id)
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 400);
        }
    }


    public function update(Request $request, int $id) : JsonResponse
    {
        try {
            return response()->json([
                'data' => $this->eventRepository->update($request->all(), $id)
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 400);
        }
    }


    public function destroy(int $id)
    {
        try {
            return response()->json([
                'data' => $this->eventRepository->delete($id)
            ], 204);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 400);
        }
    }
}
