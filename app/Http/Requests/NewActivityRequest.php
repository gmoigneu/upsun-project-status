<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "id" => "required|string",
            "created_at" => "required|date_format:Y-m-d\TH:i:s.uP",
            "updated_at" => "date_format:Y-m-d\TH:i:s.uP|nullable",
            "type" => "required|string",
            // "parameters": {},
            "project" => "required|string",
            "environments" => "required|array",
            "state" => "required|string",
            "result" => "string",
            "started_at" => "required|date",
            "completed_at" => "date_format:Y-m-d\TH:i:s.uP|nullable",
            //"completion_percent" => 100,
            "cancelled_at" => "date_format:Y-m-d\TH:i:s.uP|nullable",
            "timings.wait" => "decimal:0,3",
            "timings.build" => "decimal:0,3",
            "timings.deploy" => "decimal:0,3",
            "timings.execute" => "decimal:0,3",
            // "log" => "Building application 'app' (runtime type: php:8.2, tree: 9851a01)\n  Reusing existing build for this tree ID\n\n...\nRedeploying environment test, as a clone of main\n  ...\n  Closing all services\n  Opening application app and its relationships\n  Executing deploy hook for application app\n ... Environment configuration\n    app (type: php:8.0, size: S, disk: 2048)\n\n  ...",
            // "payload" => {},
            "description" => "string",
            "text" => "string",
            "expires_at" => "date_format:Y-m-d\TH:i:s.uP|nullable",
        ];
    }
}
