<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Talent
    Route::post('talent/media', 'TalentApiController@storeMedia')->name('talent.storeMedia');
    Route::apiResource('talent', 'TalentApiController');

    // Guides
    Route::post('guides/media', 'GuidesApiController@storeMedia')->name('guides.storeMedia');
    Route::apiResource('guides', 'GuidesApiController');

    // Conversations
    Route::apiResource('conversations', 'ConversationsApiController');

    // Talent Talk Times
    Route::apiResource('talent-talk-times', 'TalentTalkTimeApiController');

    // Guide Talk Times
    Route::apiResource('guide-talk-times', 'GuideTalkTimeApiController');
});
