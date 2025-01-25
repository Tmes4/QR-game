<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function uploadQuestions(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,json|max:2048',
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        if ($extension === 'json') {
            $questions = json_decode(file_get_contents($file), true);
        } elseif ($extension === 'csv') {
            $questions = $this->processCsv($file);
        } else {
            return back()->withErrors(['file' => 'Unsupported file format']);
        }

        foreach ($questions as $question) {
            $request->validate([
                'spel_id' => 'required|exists:spellen,id',
                'inhoud' => 'required|string',
                'type' => 'required|in:open,meerkeuze',
                'punten' => 'required|integer|min:0',
                'qr_code_url' => 'nullable|url',
            ]);
        }

        return back()->with('success', 'Questions uploaded successfully');
    }

    private function processCsv($file)
    {
        $data = array_map('str_getcsv', file($file));
        $header = array_shift($data);
        return array_map(function ($row) use ($header) {
            return array_combine($header, $row);
        }, $data);
    }
}
