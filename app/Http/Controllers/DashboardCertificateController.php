<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.certificate.index', [
            'certificates' => Certificate::all(),
            'title' => 'Certificates'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.certificate.create', [
            'certificates' => Certificate::all(),
            'title' => 'Certificates | Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('certificate-images', 'public');
        }

        Certificate::create($validatedData);
        return redirect()->route('certificates.index')->with('success', 'Certificate created successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        return view('dashboard.certificate.show', [
            'certificate' => $certificate,
            'title' => 'Certificates | Show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return view('dashboard.certificate.edit', [
            'certificate' => $certificate,
            'title' => 'Certificates | Edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('image')) {
            if ($certificate->image) {
                Storage::disk('public')->delete($certificate->image);
            }
            $validatedData['image'] = $request->file('image')->store('certificate-images', 'public');
        }
        Certificate::where('id', $certificate->id)
            ->update($validatedData);
        return redirect()->route('certificates.index', $certificate)->with('success', 'Certificate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }
        Certificate::destroy($certificate->id);
        return redirect()->route('certificates.index')->with('deleted', 'Certificate deleted successfully');
    }
}
