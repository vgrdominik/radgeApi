<?php
use Illuminate\Http\Request;
use App\Modules\User\Transformers\User as UserTransformer;

Route::middleware('auth:airlock')->get('/user', function (Request $request) {
    return new UserTransformer(auth()->user());
});

// Used to user authentication api

Route::namespace('\\App\\Modules\\User\\Infrastructure\\Controller\\')->group(function () {
    Route::post('/login', 'Api@login');
    // TODO Route::post('/refreshToken', 'Api@refreshToken');
    Route::middleware('auth:airlock')->post('/logout', 'Api@logout');
    Route::post('/forgotReset', 'Api@forgotReset');
    Route::post('/forgotSendResetLinkEmail', 'Api@forgotSendResetLinkEmail');
    Route::post('/register', 'Api@register');
    Route::post('/verify', 'Api@verify');
});

// Usual routes authed
Route::namespace('\\App\\Modules\\')->middleware('auth:airlock')->group(function () {
    Route::namespace('User\\Infrastructure\\Controller')->group(function () {
        Route::get('listUsers', 'Api@index');
        Route::post('linkWallet', 'Api@linkWallet');
    });
    Route::namespace('Event\\Infrastructure\\Controller')->group(function () {
        Route::get('eventSummary', 'Api@eventSummary');
        Route::resource('event', 'Api');
    });
    Route::namespace('Game\\Node\\Infrastructure\\Controller')->group(function () {
        Route::resource('node', 'Api');
    });
    Route::namespace('Game\\Blueprint\\Infrastructure\\Controller')->group(function () {
        Route::resource('blueprint', 'Api');
        Route::post('addBlueprintToCraftUser', 'Api@addBlueprintToCraftUser');
        Route::get('getBlueprintToCraftUser', 'Api@getBlueprintToCraftUser');
    });
    Route::namespace('Game\\Plane\\Infrastructure\\Controller')->group(function () {
        Route::resource('plane', 'Api');
    });
    Route::namespace('Game\\Profile\\Infrastructure\\Controller')->group(function () {
        Route::resource('profile', 'Api');
    });
    Route::namespace('Blockchain\\Wallet\\Infrastructure\\Controller')->group(function () {
        Route::post('wallet/transferZen', 'Api@transferZen');
        Route::get('wallet/show', 'Api@show');
    });
});

// Public game routes
Route::namespace('\\App\\Modules\\Game\\')->group(function () {
    Route::get('material', 'Node\\Infrastructure\\Controller\\Api@nodeSummary');
});
Route::namespace('\\App\\Modules\\Blockchain\\')->group(function () {
    Route::get('sorteo', 'Wallet\\Infrastructure\\Controller\\Api@sorteo');
});
