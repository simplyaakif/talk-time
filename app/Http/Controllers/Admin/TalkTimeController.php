<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Talent;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    class TalkTimeController extends Controller {

        public function index()
        {
            $talents = Talent::with('user')->get();
            $users = User::where('id', '<>', Auth::id())->get();

            return view('admin.talkTime.classRoom',compact('talents','users'));
        }
    }
