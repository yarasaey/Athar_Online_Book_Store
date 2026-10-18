<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تأكيد الطلب</title>
</head>
<body style="font-family: Arial, sans-serif; direction: rtl; text-align: right;">

    <h2>تم تأكيد طلبك بنجاح 🎉</h2>
    <p>شكرًا لتسوقك معنا، هذه تفاصيل طلبك:</p>

    <!-- تفاصيل الطلب -->
    <section>
        <h3>تفاصيل الطلب</h3>

        <table width="100%" cellpadding="8" cellspacing="0" border="1" style="border-collapse: collapse;">
            <thead style="background-color:#dc3545;color:#fff;">
                <tr>
                    <th>المنتج</th>
                    <th>الإجمالي</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                <tr>
                    <td>
                        {{ $item->name }} × {{ $item->qty }}
                    </td>
                    <td>
                        {{ number_format($item->total, 2) }} جنيه
                    </td>
                </tr>
                @endforeach

                <tr>
                    <th>الإجمالي الكلي</th>
                    <td><strong>{{ number_format($order->grand_total, 2) }} جنيه</strong></td>
                </tr>
            </tbody>
        </table>
    </section>

    <br>

    <!-- عنوان الفاتورة -->
    <section>
        <h3>عنوان الفاتورة</h3>

        <div style="border:1px solid #ddd;padding:15px;border-radius:5px;">
            <p>{{ $order->first_name }} {{ $order->last_name }}</p>
            <p>{{ $order->address }}</p>
            <p>{{ $order->city }}</p>
            <p>{{ $order->mobile }}</p>
            <p>{{ $order->email }}</p>
        </div>
    </section>

    <br>

    <p>سيتم التواصل معك قريبًا لتأكيد الشحن 🚚</p>
    <p><strong>فريق المتجر
