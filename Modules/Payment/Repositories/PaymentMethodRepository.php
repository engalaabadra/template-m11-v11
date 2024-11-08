<?php
namespace Modules\Payment\Repositories;

use Modules\Payment\Repositories\PaymentMethodRepositoryInterface;
use App\Repositories\Eloquent\EloquentRepository;
 
use Illuminate\Support\Facades\Session;

class PaymentMethodRepository extends EloquentRepository implements PaymentMethodRepositoryInterface
{

}
