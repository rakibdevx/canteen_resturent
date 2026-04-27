<?php

namespace App\Http\Controllers\Admin;

use App\Models\Address;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AdminViewSharedDataTrait;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    use AdminViewSharedDataTrait;

    public function __construct()
    {
        $this->shareAdminViewData();
    }

    // 🔹 Show all addresses
    public function index()
    {
        $addresses = Address::latest()->get();
        return view('admin.location', compact('addresses'));
    }

    // 🔹 Store new address
    public function store(Request $request)
    {
        $request->validate([
            'building_name' => 'required|string|max:255',
            'floor'         => 'required|numeric|max:50',
            'room_no'       => 'required|string|max:50',
            'department'    => 'nullable|string|max:100',
            'campus'        => 'nullable|string|max:100',
            'notes'         => 'nullable|string',
        ]);

        Address::create([
            'label'         => 'delivery',
            'building_name' => $request->building_name,
            'floor'         => $request->floor,
            'room_no'       => $request->room_no,
            'department'    => $request->department,
            'campus'        => $request->campus,
            'notes'         => $request->notes,
            'is_default'    => false,
        ]);

        return redirect()->back()->with('success', 'Address created successfully.');
    }

    // 🔹 Update address
    public function update(Request $request, $id)
    {
        $request->validate([
            'building_name' => 'required|string|max:255',
            'floor'         => 'required|numeric|max:50',
            'room_no'       => 'required|string|max:50',
            'department'    => 'nullable|string|max:100',
            'campus'        => 'nullable|string|max:100',
            'notes'         => 'nullable|string',
        ]);

        $address = Address::findOrFail($id);

        $address->update([
            'building_name' => $request->building_name,
            'floor'         => $request->floor,
            'room_no'       => $request->room_no,
            'department'    => $request->department,
            'campus'        => $request->campus,
            'notes'         => $request->notes,
        ]);

        return redirect()->back()->with('success', 'Address updated successfully.');
    }

    // 🔹 Delete address
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return redirect()->back()->with('success', 'Address deleted successfully.');
    }
}
