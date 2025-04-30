<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ReturnRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReturnandrefundController extends Controller
{
    /**
     * Show the return form for a specific order and product
     */
    public function showReturnForm($order_id, $product_id)
    {
        $order = Order::findOrFail($order_id);
        $product_details = Product::findOrFail($product_id);
        
        // Check if this order belongs to the authenticated user
        if ($order->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to return this item.');
        }
        
        return view('returns.form', compact('order', 'product_details'));
    }
    
    /**
     * Process the return request submission
     */
    public function submitReturn(Request $request, $order_id, $product_id)
    {
        // Validate the request
        $request->validate([
            'section' => 'required|string',
            'file' => 'nullable|image|max:5000', // Max 5MB
        ]);
        
        // Get the specific reason based on the section
        $reason = null;
        $section = $request->input('section');
        
        switch ($section) {
            case 'Quality issues':
                $request->validate(['quality_reason' => 'required|string']);
                $reason = $request->input('quality_reason');
                break;
            case 'Size & Fit Issues':
                $request->validate(['size_reason' => 'required|string']);
                $reason = $request->input('size_reason');
                break;
            case 'Changed My Mind':
                $request->validate(['mind_reason' => 'required|string']);
                $reason = $request->input('mind_reason');
                break;
            case 'Different Product':
                $request->validate(['different_reason' => 'required|string']);
                $reason = $request->input('different_reason');
                break;
            case 'Damaged/Used/Stained':
                $request->validate(['damaged_reason' => 'required|string']);
                $reason = $request->input('damaged_reason');
                break;
            default:
                return redirect()->back()->with('error', 'Please select a valid return reason.');
        }
        
        // Handle file upload if provided
        $image_path = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = 'return_' . time() . '_' . $file->getClientOriginalName();
            $image_path = $file->storeAs('return_images', $filename, 'public');
        }
        
        // Create return request
        $return = new ReturnRequest();
        $return->user_id = Auth::id();
        $return->order_id = $order_id;
        $return->product_id = $product_id;
        $return->return_reason_category = $section;
        $return->return_reason = $reason;
        $return->image = $image_path;
        $return->status = 'pending'; // Default status
        $return->save();
        
        // Log the return request
        Log::info('Return request submitted', [
            'user_id' => Auth::id(),
            'order_id' => $order_id,
            'product_id' => $product_id,
            'reason' => $reason,
            'category' => $section
        ]);
        
        return redirect()->route('orders.view', $order_id)->with('success', 'Return request submitted successfully. We will review your request shortly.');
    }
    
    /**
     * View all return requests for the authenticated user
     */
    public function viewReturns()
    {
        $returns = ReturnRequest::where('user_id', Auth::id())
            ->with(['order', 'product'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('returns.index', compact('returns'));
    }
    
    /**
     * View a specific return request details
     */
    public function viewReturnDetails($id)
    {
        $return = ReturnRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->with(['order', 'product'])
            ->firstOrFail();
            
        return view('returns.details', compact('return'));
    }
    
    /**
     * Cancel a return request if it's still in pending status
     */
    public function cancelReturn($id)
    {
        $return = ReturnRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();
            
        $return->status = 'cancelled';
        $return->save();
        
        return redirect()->route('returns.view')->with('success', 'Return request cancelled successfully.');
    }
}