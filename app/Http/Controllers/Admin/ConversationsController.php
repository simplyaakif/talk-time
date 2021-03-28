<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyConversationRequest;
use App\Http\Requests\StoreConversationRequest;
use App\Http\Requests\UpdateConversationRequest;
use App\Models\Conversation;
use App\Models\Guide;
use App\Models\Talent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConversationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('conversation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $conversations = Conversation::with(['talent', 'guide'])->get();

        return view('admin.conversations.index', compact('conversations'));
    }

    public function create()
    {
        abort_if(Gate::denies('conversation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talent = Talent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guides = Guide::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.conversations.create', compact('talent', 'guides'));
    }

    public function store(StoreConversationRequest $request)
    {
        $conversation = Conversation::create($request->all());

        return redirect()->route('admin.conversations.index');
    }

    public function edit(Conversation $conversation)
    {
        abort_if(Gate::denies('conversation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talent = Talent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guides = Guide::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $conversation->load('talent', 'guide');

        return view('admin.conversations.edit', compact('talent', 'guides', 'conversation'));
    }

    public function update(UpdateConversationRequest $request, Conversation $conversation)
    {
        $conversation->update($request->all());

        return redirect()->route('admin.conversations.index');
    }

    public function show(Conversation $conversation)
    {
        abort_if(Gate::denies('conversation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $conversation->load('talent', 'guide');

        return view('admin.conversations.show', compact('conversation'));
    }

    public function destroy(Conversation $conversation)
    {
        abort_if(Gate::denies('conversation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $conversation->delete();

        return back();
    }

    public function massDestroy(MassDestroyConversationRequest $request)
    {
        Conversation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
