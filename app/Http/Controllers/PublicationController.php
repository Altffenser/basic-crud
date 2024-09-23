<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePublicationRequest;
use App\Models\Publication;
use Illuminate\Http\RedirectResponse;

class PublicationController extends Controller
{
    public function store(StorePublicationRequest $request): RedirectResponse
    {
        Publication::query()->create($request->validated());

        return back()->with('success', __('Publication created successfully!'));
    }
}
