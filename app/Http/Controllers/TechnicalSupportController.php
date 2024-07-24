<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechnicalSupport;

class TechnicalSupportController extends Controller
{
    public function viewReport()
    {
        return view('customers.report');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $customerId = session('customer_id');
        $technicalSupport = new TechnicalSupport();
        $technicalSupport->customer_id = $customerId; // Assuming the customer is logged in
        $technicalSupport->subject = $request->subject;
        $technicalSupport->description = $request->description;
        $technicalSupport->status = 'pending';

        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments', 'public');
            $technicalSupport->attachment = $filePath;
        } else {
            $technicalSupport->attachment = null; // Explicitly set to null when no file is uploaded
        }

        $technicalSupport->save();

        return redirect()->back()->with('success', 'Request submitted successfully.');
    }

    public function index()
    {
        $technicalSupports = TechnicalSupport::with('customer')->paginate(10);
        return view('customers.adminReport ', compact('technicalSupports'));
    }

    public function reportstatus(Request  $request)
    {
        $reportStatus = [
            'received', 'fixed'
        ];

        if (!in_array($request->status, $reportStatus)) {
            return back()->with('error', "invalid report status {$request->status}");
        };

        $report = TechnicalSupport::findOrFail($request->id);

        $report->status = $request->status;

        $report->save();

        return back()->with('success', "report status has been changed to {$request->status}");

    }

}
