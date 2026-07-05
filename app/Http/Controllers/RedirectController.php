<?php

namespace App\Http\Controllers;

use App\Models\LinkVisit;
use App\Models\ShortLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __invoke(Request $request, string $shortCode): RedirectResponse
    {
        $shortLink = ShortLink::where('short_code', $shortCode)->firstOrFail();
        $shortLink->increment('clicks_count');
        LinkVisit::create([
            'short_link_id' => $shortLink->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->away($shortLink->original_url);
    }
}
