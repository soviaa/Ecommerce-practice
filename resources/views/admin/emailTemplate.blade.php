<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Review!</title>
</head>
<body style="background-color: #f3f4f6; padding: 40px; font-family: Arial, sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 8px; padding: 24px;">
        <h2 style="font-size: 24px; font-weight: 600; color: #1f2937; margin-bottom: 16px;">Thank You for Your Review! 🎉</h2>
        <p style="color: #4b5563; margin-bottom: 16px;">Hi <span style="font-weight: 500;">{{ $users->user->name }}</span>,</p>
        <p style="color: #4b5563; margin-bottom: 16px;">We truly appreciate your feedback on <span style="font-weight: 500;">{{ $product->name }}</span>! Your review helps us improve and assists other customers in making the right choice.</p>

        <!-- Product Details -->
        <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; background-color: #f9fafb; margin-bottom: 16px;">
            <h3 style="font-size: 18px; font-weight: 600; color: #374151;">Your Reviewed Product</h3>
            <div style="display: flex; align-items: center; margin-top: 12px;">
                <img src="{{ $message->embed($image_path) }}" alt="Product Image" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                <div style="margin-left: 16px;">
                    <h4 style="font-size: 16px; font-weight: 500; color: #1f2937;">{{ $product->name }}</h4>
                    <p style="color: #6b7280; font-size: 14px;">{{ $product->description }}</p>
                    <p style="color: #1f2937; font-weight: 600; margin-top: 4px;">Rs. {{ $product->price }}</p>
                </div>
            </div>
        </div>

        <p style="color: #4b5563; margin-bottom: 16px;">If you have any additional thoughts, suggestions, or would like to explore more products, feel free to check out our latest collection.</p>

        <a href="[Your Website URL]" style="display: inline-block; background-color: #2563eb; color: #ffffff; font-weight: 500; padding: 12px 24px; border-radius: 8px; text-decoration: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">Explore More</a>

        <p style="color: #6b7280; font-size: 14px; margin-top: 24px;">Thank you for being a valued part of our community!</p>
    </div>
</body>
</html>
