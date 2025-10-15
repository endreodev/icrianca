<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Action;
use Illuminate\Http\Request;

class ActionsController extends Controller
{
    public function show($id, $slug)
    {
        $action = Action::where('id', $id)->where('status', TRUE)->first();
        $lasted = Action::where('status', TRUE)->orderBy('id', 'desc')->whereNotIn('id', [$action->getId()])->take(6)->get();

        if(empty($action)){
            abort(404);
        }

        return view('frontend.pages.actions.show',[
            'action'    => $action,
            'lasted'    => $lasted,
        ]);
    }

    public function index()
    {

        $actions = Action::where('status', TRUE)->orderBy('created_at', 'desc')->paginate(18);

        return view('frontend.pages.actions.index',[
            'actions' => $actions
        ]);
    }
}
