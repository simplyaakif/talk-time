<?php

    Route::view('/', 'landingPage');
    Auth::routes(['register' => true]);

    Route::group([
                     'prefix'     => 'admin',
                     'as'         => 'admin.',
                     'namespace'  => 'Admin',
                     'middleware' => [
                         'auth',
                         'admin'
                     ]
                 ], function () {

//    AR Routes
        Route::get('/talktime', 'TalkTimeController@index');


        Route::get('/', 'HomeController@index')->name('home');
        // Permissions
        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
        Route::resource('roles', 'RolesController');

        // Users
        Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
        Route::resource('users', 'UsersController');

        // Talent
        Route::delete('talent/destroy', 'TalentController@massDestroy')->name('talent.massDestroy');
        Route::post('talent/media', 'TalentController@storeMedia')->name('talent.storeMedia');
        Route::post('talent/ckmedia', 'TalentController@storeCKEditorImages')->name('talent.storeCKEditorImages');
        Route::resource('talent', 'TalentController');

        // Audit Logs
        Route::resource('audit-logs', 'AuditLogsController', [
            'except' => [
                'create',
                'store',
                'edit',
                'update',
                'destroy'
            ]
        ]);

        // Guides
        Route::delete('guides/destroy', 'GuidesController@massDestroy')->name('guides.massDestroy');
        Route::post('guides/media', 'GuidesController@storeMedia')->name('guides.storeMedia');
        Route::post('guides/ckmedia', 'GuidesController@storeCKEditorImages')->name('guides.storeCKEditorImages');
        Route::resource('guides', 'GuidesController');

        // Conversations
        Route::delete('conversations/destroy', 'ConversationsController@massDestroy')->name('conversations.massDestroy');
        Route::resource('conversations', 'ConversationsController');

        // Talent Talk Times
        Route::delete('talent-talk-times/destroy', 'TalentTalkTimeController@massDestroy')->name('talent-talk-times.massDestroy');
        Route::resource('talent-talk-times', 'TalentTalkTimeController');

        // Guide Talk Times
        Route::delete('guide-talk-times/destroy', 'GuideTalkTimeController@massDestroy')->name('guide-talk-times.massDestroy');
        Route::resource('guide-talk-times', 'GuideTalkTimeController');

        Route::get('messenger', 'MessengerController@index')->name('messenger.index');
        Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
        Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
        Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
        Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
        Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
        Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
        Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
        Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    });
    Route::group([
                     'prefix'     => 'profile',
                     'as'         => 'profile.',
                     'namespace'  => 'Auth',
                     'middleware' => ['auth']
                 ], function () {
// Change password
        if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
            Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
            Route::post('password', 'ChangePasswordController@update')->name('password.update');
            Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
            Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        }
    });
    Route::group([
                     'as'         => 'frontend.',
                     'namespace'  => 'Frontend',
                     'middleware' => ['auth']
                 ], function () {
        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/talktime', 'TalkTimeController@index')->name('talktime');

        // Permissions
        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
        Route::resource('roles', 'RolesController');

        // Users
        Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
        Route::resource('users', 'UsersController');

        // Talent
        Route::delete('talent/destroy', 'TalentController@massDestroy')->name('talent.massDestroy');
        Route::post('talent/media', 'TalentController@storeMedia')->name('talent.storeMedia');
        Route::post('talent/ckmedia', 'TalentController@storeCKEditorImages')->name('talent.storeCKEditorImages');
        Route::resource('talent', 'TalentController');

        // Guides
        Route::delete('guides/destroy', 'GuidesController@massDestroy')->name('guides.massDestroy');
        Route::post('guides/media', 'GuidesController@storeMedia')->name('guides.storeMedia');
        Route::post('guides/ckmedia', 'GuidesController@storeCKEditorImages')->name('guides.storeCKEditorImages');
        Route::resource('guides', 'GuidesController');

        // Conversations
        Route::delete('conversations/destroy', 'ConversationsController@massDestroy')->name('conversations.massDestroy');
        Route::resource('conversations', 'ConversationsController');

        // Talent Talk Times
        Route::delete('talent-talk-times/destroy', 'TalentTalkTimeController@massDestroy')->name('talent-talk-times.massDestroy');
        Route::resource('talent-talk-times', 'TalentTalkTimeController');

        // Guide Talk Times
        Route::delete('guide-talk-times/destroy', 'GuideTalkTimeController@massDestroy')->name('guide-talk-times.massDestroy');
        Route::resource('guide-talk-times', 'GuideTalkTimeController');

        Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
        Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
        Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
        Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/agora-chat', 'AgoraVideoController@index');
        Route::post('/agora/token', 'AgoraVideoController@token');
        Route::post('/agora/call-user', 'AgoraVideoController@callUser');
    });

    Route::get('test-ssl',function (){
        var_dump(openssl_get_cert_locations());
    });
