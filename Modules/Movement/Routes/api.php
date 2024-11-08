<?php
use Modules\Movement\Http\Controllers\API\MovementController;

Route::resource('movements', MovementController::class)->only(['index']);
