<?php
use Modules\RequestWithdrawing\Http\Controllers\API\User\RequestWithdrawingResourceController;


Route::resource('request-withdrawings', RequestWithdrawingResourceController::class)->only(['index']);

