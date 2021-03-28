<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use App\Models\Guide;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    class TalkTimeController extends Controller {

        public function index()
        {
            $guides = Guide::with('user')->get();
            $users = User::where('id', '<>', Auth::id())->get();

            return view('frontend.talkTime.classRoom',compact('guides','users'));
        }
    }
