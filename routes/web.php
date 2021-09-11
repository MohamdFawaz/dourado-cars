<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vendor\Chatify\Admin\MessagesController;
/*
* This is the main app route [Chatify Messenger]
*/
Route::group(['prefix' => '/admin/support', 'middleware' => 'auth'], function () {

    Route::get('/', [MessagesController::class, 'index']);

    /**
     *  Fetch info for specific id [user/group]
     */
    Route::post('/idInfo', [MessagesController::class,'idFetchData']);

    /**
     * Send message route
     */
    Route::post('/sendMessage', [MessagesController::class, 'send'])->name('admin.send.message');

    /**
     * Fetch messages
     */
    Route::post('/fetchMessages', [MessagesController::class, 'fetch']);

    /**
     * Download attachments route to create a downloadable links
     */
    Route::get('/download/{fileName}', [MessagesController::class, 'download']);

    /**
     * Authintication for pusher private channels
     */
    Route::post('/chat/auth', [MessagesController::class, 'pusherAuth'])->name('admin-pusher.auth');

    /**
     * Make messages as seen
     */
    Route::post('/makeSeen', [MessagesController::class, 'seen']);

    /**
     * Get contacts
     */
    Route::post('/getContacts', [MessagesController::class, 'getContacts']);

    /**
     * Update contact item data
     */
    Route::post('/updateContacts', [MessagesController::class, 'updateContactItem']);


    /**
     * Star in favorite list
     */
    Route::post('/star', [MessagesController::class,'favorite']);

    /**
     * get favorites list
     */
    Route::post('/favorites', [MessagesController::class, 'getFavorites']);

    /**
     * Search in messenger
     */
    Route::post('/search', [MessagesController::class,'search']);

    /**
     * Get shared photos
     */
    Route::post('/shared', [MessagesController::class,'sharedPhotos']);

    /**
     * Delete Conversation
     */
    Route::post('/deleteConversation', [MessagesController::class, 'deleteConversation']);

    /**
     * Delete Conversation
     */
    Route::post('/updateSettings', [MessagesController::class, 'updateSettings']);

    /**
     * Set active status
     */
    Route::post('/setActiveStatus', [MessagesController::class, 'setActiveStatus']);


    /*
    * [Group] view by id
    */
    Route::get('/group/{id}', [MessagesController::class,'index']);

    /*
    * user view by id.
    * Note : If you added routes after the [User] which is the below one,
    * it will considered as user id.
    *
    * e.g. - The commented routes below :
    */
// Route::get('/route', function(){ return 'Munaf'; }); // works as a route
    Route::get('/{id}', [MessagesController::class, 'index']);
// Route::get('/route', function(){ return 'Munaf'; }); // works as a user id
});
