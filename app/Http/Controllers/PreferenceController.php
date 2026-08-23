<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Schema;

class PreferenceController extends Controller
{
    private function cleanMerge(array $current, array $incoming): array
    {
        foreach ($incoming as $key => $value) {
            if (is_array($value)) {
                $existing = is_array($current[$key] ?? null) ? $current[$key] : [];
                $current[$key] = $this->cleanMerge($existing, $value);
            } elseif ($value !== null && $value !== '') {
                $current[$key] = $value;
            }
        }
        return $current;
    }

    public function show(): JsonResponse
    {
        if (!Schema::hasTable('preferences')) {
            return response()->json([]);
        }
        $pref = Preference::where('key', 'global_preferences')->first();
        if ($pref && is_array($pref->value)) {
            return response()->json($pref->value);
        }
        return response()->json([]);
    }

    public function update(Request $request): JsonResponse
    {
        if (!Schema::hasTable('preferences')) {
            return response()->json(['error' => 'Table preferences does not exist in database'], 500);
        }
        $pref = Preference::where('key', 'global_preferences')->first();
        $current = $pref && is_array($pref->value) ? $pref->value : [];
        $body = $request->all();

        $updatedPreferences = $this->cleanMerge($current, $body);

        // Clean out legacy rc/nif/nis/article numbers if present
        if (isset($updatedPreferences['businessInfo']['rcNumber'])) unset($updatedPreferences['businessInfo']['rcNumber']);
        if (isset($updatedPreferences['businessInfo']['nifNumber'])) unset($updatedPreferences['businessInfo']['nifNumber']);
        if (isset($updatedPreferences['businessInfo']['nisNumber'])) unset($updatedPreferences['businessInfo']['nisNumber']);
        if (isset($updatedPreferences['businessInfo']['articleNumber'])) unset($updatedPreferences['businessInfo']['articleNumber']);

        $pref = Preference::updateOrCreate(
            ['key' => 'global_preferences'],
            ['value' => $updatedPreferences]
        );

        return response()->json([
            'success' => true,
            'preferences' => $pref->value,
        ]);
    }
}
