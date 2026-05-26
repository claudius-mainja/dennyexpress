<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Models\Product;
use App\Services\QuoteService;

class QuoteController extends Controller
{
    protected QuoteService $quoteService;

    public function __construct(QuoteService $quoteService)
    {
        $this->quoteService = $quoteService;
    }

    public function create()
    {
        $products = Product::where('is_active', true)->get();
        return view('quote.create', compact('products'));
    }

    public function store(QuoteRequest $request)
    {
        $products = [];

        if ($request->filled('product_id')) {
            $products[] = [
                'product_id' => $request->product_id,
                'quantity' => $request->quantity ?? 1,
            ];
        }

        $quote = $this->quoteService->createQuoteFromArray($request->validated(), $products);

        return redirect()->route('quote.show', $quote->uuid)
            ->with('success', 'Your quote request has been submitted. We will contact you shortly.');
    }

    public function show(string $uuid)
    {
        $quote = \App\Models\Quote::with('items.product.primaryImage')
            ->where('uuid', $uuid)
            ->firstOrFail();

        return view('quote.show', compact('quote'));
    }

    public function addProductToQuote(QuoteRequest $request, string $uuid)
    {
        $quote = \App\Models\Quote::where('uuid', $uuid)->firstOrFail();
        $quote = $this->quoteService->addToExistingQuote(
            $quote,
            $request->product_id,
            $request->quantity ?? 1
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Product added to quote.',
                'quote' => $quote,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to quote.');
    }
}
