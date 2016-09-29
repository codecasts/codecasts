<?php

namespace Codecasts\Units\Settings\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Support\Http\Controller;
use Codecasts\Units\Settings\Http\Requests\CreateSubscriptionRequest;
use Codecasts\Units\Settings\Http\Requests\UpdateSubscriptionRequest;

class SubscriptionController extends Controller
{
    use SEOTools;

    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
    }

    public function index()
    {
        $this->seo()->setTitle('Assinatura');

        $subscription = $this->user->loadSubscription();

        if ($this->user->isGuest()) {
            \Session::flash('_success', "Você tem acesso como convidado até {$this->user->presentGuestUntil()}");
        }

        if ($subscription) {
            return $this->view('settings::subscription.edit')->with(compact('subscription'));
        } else {
            return $this->view('settings::subscription.create');
        }
    }

    public function store(CreateSubscriptionRequest $request)
    {
        $plan = $request->get('plan');
        $this->user->subscribe($plan);
        $subscription = $this->user->loadSubscription();

        return redirect(route('subscription.index'));
    }

    public function update($id, UpdateSubscriptionRequest $request)
    {
        $action = $request->get('action');
        $this->user->loadSubscription();
        if ($action == 'suspend') {
            $this->user->suspend();
        } elseif ($action == 'activate') {
            $this->user->activate();
        } elseif ($action == 'plan') {
            $new_plan = $request->get('plan');
            $this->user->changePlan($new_plan);
        }

        $this->user->loadSubscription();

        return redirect(route('subscription.index'));
    }
}
