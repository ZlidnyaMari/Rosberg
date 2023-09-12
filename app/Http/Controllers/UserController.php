<?php

namespace App\Http\Controllers;

use App\Components\ImportClient;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @param ImportClient $importClient
     * @return View
     */
    public function index(ImportClient $importClient): View
    {
        return \view('users.index', [
            'userList' => $importClient->getCollection()
        ]);
    }

    /**
     * @param Request $request
     * @param ImportClient $importClient
     * @return View
     */
    public function search(Request $request, ImportClient $importClient): View
    {
        $s = $request->s;
        $collection = $importClient->getCollection();
        $user = $collection->where('name', $s);

        return \view('users.search', [
            'user' => $user
        ]);  
    } 

    /**
     * @param Request $request
     * @return RedirectResponse;
     */
    public function add(Request $request): RedirectResponse
    {
        $name = $request->input('name');

        $user = User::create([
            'name' => $name,
        ]);

        if($user) {
            return redirect()->route('home')->with('success', 'User added');
        }
    }

    /**
     * @return JsonResponse
     */
    public function added_user(): JsonResponse
    {
        $users = User::select('id', 'name')->get();

        return response()->json($users);
        
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request): Response
    {
        User::find($request->id)->delete();

        return response()->noContent();
    }


}
