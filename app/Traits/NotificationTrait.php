<?php

namespace App\Traits;

use App\Http\Requests\ServiceRequest;
use App\Models\Order;
use App\Models\Doctor;
use App\Models\Appointment;

trait NotificationTrait
{




    protected static function newOrderNotification($order,$userId)
    {
      
        $titleAr   = "تم ارسال طلب جديد";
        $titleEn   = "new order received";
        $messageAr = "تلقيت رسالة جديدة عبر التواصل الخاص. يرجى مراجعتها والرد في أقرب وقت ممكن";
        $messageEn = "You received a new message via the chat. Please review and reply as soon as possible";
        $icon      = '<svg id="Icon_ionic-ios-notifications-outline" data-name="Icon ionic-ios-notifications-outline" xmlns="http://www.w3.org/2000/svg" width="14.381" height="18" viewBox="0 0 14.381 18">
            <path id="Path_19090" data-name="Path 19090" d="M18.328,28.336a.583.583,0,0,0-.571.459,1.127,1.127,0,0,1-.225.49.85.85,0,0,1-.724.265.864.864,0,0,1-.724-.265,1.127,1.127,0,0,1-.225-.49.583.583,0,0,0-.571-.459h0a.587.587,0,0,0-.571.715,2.01,2.01,0,0,0,2.092,1.669A2.006,2.006,0,0,0,18.9,29.051a.589.589,0,0,0-.571-.715Z" transform="translate(-9.63 -12.72)" fill="#339696"/>
            <path id="Path_19091" data-name="Path 19091" d="M20.975,17.261c-.693-.913-2.056-1.449-2.056-5.538,0-4.2-1.854-5.885-3.581-6.289-.162-.04-.279-.094-.279-.265v-.13A1.1,1.1,0,0,0,13.98,3.93h-.027a1.1,1.1,0,0,0-1.08,1.107v.13c0,.166-.117.225-.279.265-1.732.409-3.581,2.092-3.581,6.289,0,4.089-1.363,4.62-2.056,5.538a.893.893,0,0,0,.715,1.431h12.6A.894.894,0,0,0,20.975,17.261Zm-1.755.261H8.729a.2.2,0,0,1-.148-.328,5.45,5.45,0,0,0,.945-1.5,10.2,10.2,0,0,0,.643-3.968,6.9,6.9,0,0,1,.94-3.905A2.887,2.887,0,0,1,12.85,6.576a1.577,1.577,0,0,0,.837-.472.356.356,0,0,1,.535-.009,1.63,1.63,0,0,0,.846.481,2.887,2.887,0,0,1,1.741,1.242,6.9,6.9,0,0,1,.94,3.905,10.2,10.2,0,0,0,.643,3.968,5.512,5.512,0,0,0,.967,1.525A.186.186,0,0,1,19.221,17.522Z" transform="translate(-6.775 -3.93)" fill="#339696"/>
          </svg>';
        $color     = "primary";
        storeAndPushNotification(
          $titleAr,
          $titleEn,
          $messageAr,
          $messageEn,
          $icon,
          $color,
          route('dashboard.orders.show', $order->id),
          'order_received',
          $userId // Add the user ID to specify the notification recipient
      );
      }
    protected function newNotification($notification)
    {
        if ($notification)
        {
            $titleAr   = "اشعار جديد";
            $titleEn   = "New Notification";
            $messageAr = "تم ارسال اشعار جديد بتاريخ " . $notification->date->format('Y-m-d') . " الساعة " . $notification->time->translatedFormat('h:i A') . " اضغط لعرض التفاصيل";
            $messageEn = "A new notification has been sent in " . $notification->date->format('Y-m-d') . " at " . $notification->time->translatedFormat('h:i A') . " Click to view details";
            $icon      = '<svg width="25" height="28" viewBox="0 0 25 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.40094 3.4401V2.10677C7.40033 1.76658 7.52977 1.43903 7.76277 1.19116C7.99577 0.943285 8.3147 0.793848 8.65427 0.773438H16.0009C16.3381 0.797099 16.6538 0.947953 16.884 1.19548C17.1142 1.44301 17.2418 1.76874 17.2409 2.10677V3.4401C17.2418 3.77813 17.1142 4.10386 16.884 4.35139C16.6538 4.59892 16.3381 4.74978 16.0009 4.77344H8.65427C8.3147 4.75303 7.99577 4.60359 7.76277 4.35572C7.52977 4.10785 7.40033 3.78029 7.40094 3.4401ZM24.0009 10.3068V19.9334C24.0168 20.8755 23.847 21.8114 23.5011 22.6878C23.1552 23.5642 22.6401 24.3639 21.9851 25.0412C21.3301 25.7185 20.5481 26.2601 19.6837 26.6351C18.8194 27.0101 17.8897 27.2111 16.9476 27.2268H7.08094C5.18074 27.2022 3.36795 26.4246 2.04054 25.0646C0.713134 23.7047 -0.0204132 21.8737 0.000939745 19.9734V10.3468C-0.0270515 8.61371 0.571086 6.92871 1.68552 5.60118C2.79996 4.27366 4.35589 3.39271 6.06761 3.1201V3.4401C6.06729 4.1337 6.33724 4.80013 6.82016 5.29799C7.30309 5.79585 7.96099 6.08596 8.65427 6.10677H16.0009C16.6919 6.08257 17.3464 5.79097 17.8265 5.29348C18.3066 4.79598 18.5747 4.13147 18.5743 3.4401V3.21344C20.1405 3.62092 21.5255 4.54049 22.5088 5.82584C23.4921 7.1112 24.0174 8.68849 24.0009 10.3068ZM7.80094 15.4134L10.9743 19.3334C11.0666 19.4457 11.1826 19.5362 11.314 19.5985C11.4454 19.6607 11.5889 19.6931 11.7343 19.6934C11.8856 19.6924 12.0345 19.6557 12.1689 19.5861C12.3033 19.5166 12.4193 19.4163 12.5076 19.2934L16.8543 13.4401C16.9828 13.2317 17.0357 12.9855 17.0041 12.7427C16.9726 12.4999 16.8585 12.2754 16.6809 12.1068C16.4748 11.9647 16.2224 11.9064 15.9748 11.9435C15.7272 11.9806 15.503 12.1105 15.3476 12.3068L11.7476 17.1468L9.33427 14.1601C9.17326 13.9701 8.94633 13.8479 8.69903 13.8183C8.45172 13.7886 8.20234 13.8536 8.00094 14.0001C7.79628 14.1676 7.66209 14.4059 7.62504 14.6677C7.58799 14.9296 7.65078 15.1958 7.80094 15.4134Z" fill="currentColor"/>
                    </svg>';
            $color     = 'success';

            storeAndPushNotification($titleAr, $titleEn, $messageAr, $messageEn, $icon, $color, route('dashboard.appointments.show', $notification));
        }
    }
    protected static function newContactUsNotification($contact)
    {
        $titleAr   = "رسالة جديدة من صفحة تواصل معنا";
        $titleEn   = "New message from the Contact Us page";
        $messageAr = "تلقيت رسالة جديدة عبر صفحة تواصل معنا. يرجى مراجعتها والرد في أقرب وقت ممكن";
        $messageEn = "You received a new message via the Contact Us page. Please review and reply as soon as possible";
        $icon      = '<svg id="Icon_ionic-ios-notifications-outline" data-name="Icon ionic-ios-notifications-outline" xmlns="http://www.w3.org/2000/svg" width="14.381" height="18" viewBox="0 0 14.381 18">
            <path id="Path_19090" data-name="Path 19090" d="M18.328,28.336a.583.583,0,0,0-.571.459,1.127,1.127,0,0,1-.225.49.85.85,0,0,1-.724.265.864.864,0,0,1-.724-.265,1.127,1.127,0,0,1-.225-.49.583.583,0,0,0-.571-.459h0a.587.587,0,0,0-.571.715,2.01,2.01,0,0,0,2.092,1.669A2.006,2.006,0,0,0,18.9,29.051a.589.589,0,0,0-.571-.715Z" transform="translate(-9.63 -12.72)" fill="#339696"/>
            <path id="Path_19091" data-name="Path 19091" d="M20.975,17.261c-.693-.913-2.056-1.449-2.056-5.538,0-4.2-1.854-5.885-3.581-6.289-.162-.04-.279-.094-.279-.265v-.13A1.1,1.1,0,0,0,13.98,3.93h-.027a1.1,1.1,0,0,0-1.08,1.107v.13c0,.166-.117.225-.279.265-1.732.409-3.581,2.092-3.581,6.289,0,4.089-1.363,4.62-2.056,5.538a.893.893,0,0,0,.715,1.431h12.6A.894.894,0,0,0,20.975,17.261Zm-1.755.261H8.729a.2.2,0,0,1-.148-.328,5.45,5.45,0,0,0,.945-1.5,10.2,10.2,0,0,0,.643-3.968,6.9,6.9,0,0,1,.94-3.905A2.887,2.887,0,0,1,12.85,6.576a1.577,1.577,0,0,0,.837-.472.356.356,0,0,1,.535-.009,1.63,1.63,0,0,0,.846.481,2.887,2.887,0,0,1,1.741,1.242,6.9,6.9,0,0,1,.94,3.905,10.2,10.2,0,0,0,.643,3.968,5.512,5.512,0,0,0,.967,1.525A.186.186,0,0,1,19.221,17.522Z" transform="translate(-6.775 -3.93)" fill="#339696"/>
          </svg>';
        $color     = "primary";
        storeAndPushNotification($titleAr, $titleEn, $messageAr, $messageEn, $icon, $color, route('dashboard.contact-us.edit', $contact->id), 'contact_us');
    }
    protected static function newAddAdsNotification($car)
    {
        $titleAr   = "إعلان سيارة جديد للمراجعة";
        $titleEn   = "New car ad for review";
        $messageAr = "تم إضافة إعلان سيارة جديد على الموقع. يرجى مراجعة الإعلان للتأكد من مطابقته للمعايير قبل نشره.";
        $messageEn = "A new car advertisement has been added to the website. Please review the ad to ensure it meets the standards before publishing it.";
        $icon      = '<svg id="Icon_ionic-ios-notifications-outline" data-name="Icon ionic-ios-notifications-outline" xmlns="http://www.w3.org/2000/svg" width="14.381" height="18" viewBox="0 0 14.381 18">
            <path id="Path_19090" data-name="Path 19090" d="M18.328,28.336a.583.583,0,0,0-.571.459,1.127,1.127,0,0,1-.225.49.85.85,0,0,1-.724.265.864.864,0,0,1-.724-.265,1.127,1.127,0,0,1-.225-.49.583.583,0,0,0-.571-.459h0a.587.587,0,0,0-.571.715,2.01,2.01,0,0,0,2.092,1.669A2.006,2.006,0,0,0,18.9,29.051a.589.589,0,0,0-.571-.715Z" transform="translate(-9.63 -12.72)" fill="#339696"/>
            <path id="Path_19091" data-name="Path 19091" d="M20.975,17.261c-.693-.913-2.056-1.449-2.056-5.538,0-4.2-1.854-5.885-3.581-6.289-.162-.04-.279-.094-.279-.265v-.13A1.1,1.1,0,0,0,13.98,3.93h-.027a1.1,1.1,0,0,0-1.08,1.107v.13c0,.166-.117.225-.279.265-1.732.409-3.581,2.092-3.581,6.289,0,4.089-1.363,4.62-2.056,5.538a.893.893,0,0,0,.715,1.431h12.6A.894.894,0,0,0,20.975,17.261Zm-1.755.261H8.729a.2.2,0,0,1-.148-.328,5.45,5.45,0,0,0,.945-1.5,10.2,10.2,0,0,0,.643-3.968,6.9,6.9,0,0,1,.94-3.905A2.887,2.887,0,0,1,12.85,6.576a1.577,1.577,0,0,0,.837-.472.356.356,0,0,1,.535-.009,1.63,1.63,0,0,0,.846.481,2.887,2.887,0,0,1,1.741,1.242,6.9,6.9,0,0,1,.94,3.905,10.2,10.2,0,0,0,.643,3.968,5.512,5.512,0,0,0,.967,1.525A.186.186,0,0,1,19.221,17.522Z" transform="translate(-6.775 -3.93)" fill="#339696"/>
          </svg>';
        $color     = "primary";
        storeAndPushNotification($titleAr, $titleEn, $messageAr, $messageEn, $icon, $color, route('dashboard.cars.edit', $car->id), 'cars');
    }
    protected static function newOrderApiNotification($order)
    {
        $titleAr   = "طلب شراء سيارة جديد";
        $titleEn   = "Order to purchase a new car";
        $messageAr = "تم تقديم طلب شراء سيارة جديد. يرجى التحقق والمتابعة.";
        $messageEn = "An order to purchase a new car has been submitted. Please check and follow.";
        $icon      = '<svg id="Icon_ionic-ios-notifications-outline" data-name="Icon ionic-ios-notifications-outline" xmlns="http://www.w3.org/2000/svg" width="14.381" height="18" viewBox="0 0 14.381 18">
            <path id="Path_19090" data-name="Path 19090" d="M18.328,28.336a.583.583,0,0,0-.571.459,1.127,1.127,0,0,1-.225.49.85.85,0,0,1-.724.265.864.864,0,0,1-.724-.265,1.127,1.127,0,0,1-.225-.49.583.583,0,0,0-.571-.459h0a.587.587,0,0,0-.571.715,2.01,2.01,0,0,0,2.092,1.669A2.006,2.006,0,0,0,18.9,29.051a.589.589,0,0,0-.571-.715Z" transform="translate(-9.63 -12.72)" fill="#339696"/>
            <path id="Path_19091" data-name="Path 19091" d="M20.975,17.261c-.693-.913-2.056-1.449-2.056-5.538,0-4.2-1.854-5.885-3.581-6.289-.162-.04-.279-.094-.279-.265v-.13A1.1,1.1,0,0,0,13.98,3.93h-.027a1.1,1.1,0,0,0-1.08,1.107v.13c0,.166-.117.225-.279.265-1.732.409-3.581,2.092-3.581,6.289,0,4.089-1.363,4.62-2.056,5.538a.893.893,0,0,0,.715,1.431h12.6A.894.894,0,0,0,20.975,17.261Zm-1.755.261H8.729a.2.2,0,0,1-.148-.328,5.45,5.45,0,0,0,.945-1.5,10.2,10.2,0,0,0,.643-3.968,6.9,6.9,0,0,1,.94-3.905A2.887,2.887,0,0,1,12.85,6.576a1.577,1.577,0,0,0,.837-.472.356.356,0,0,1,.535-.009,1.63,1.63,0,0,0,.846.481,2.887,2.887,0,0,1,1.741,1.242,6.9,6.9,0,0,1,.94,3.905,10.2,10.2,0,0,0,.643,3.968,5.512,5.512,0,0,0,.967,1.525A.186.186,0,0,1,19.221,17.522Z" transform="translate(-6.775 -3.93)" fill="#339696"/>
          </svg>';
        $color     = "primary";
        $order     = Order::find($order->id);
        storeAndPushNotificationBasedEmployee($order, $titleAr, $titleEn, $messageAr, $messageEn, $icon, $color, route('dashboard.orders.show', $order->id));
    }
    protected static function newServiceRequestApiNotification($serviceRequest)
    {
        $titleAr   = "طلب شراء سيارة جديد";
        $titleEn   = "Order to purchase a new car";
        $messageAr = "تم تقديم طلب شراء سيارة جديد. يرجى التحقق والمتابعة.";
        $messageEn = "An order to purchase a new car has been submitted. Please check and follow.";
        $icon      = '<svg id="Icon_ionic-ios-notifications-outline" data-name="Icon ionic-ios-notifications-outline" xmlns="http://www.w3.org/2000/svg" width="14.381" height="18" viewBox="0 0 14.381 18">
            <path id="Path_19090" data-name="Path 19090" d="M18.328,28.336a.583.583,0,0,0-.571.459,1.127,1.127,0,0,1-.225.49.85.85,0,0,1-.724.265.864.864,0,0,1-.724-.265,1.127,1.127,0,0,1-.225-.49.583.583,0,0,0-.571-.459h0a.587.587,0,0,0-.571.715,2.01,2.01,0,0,0,2.092,1.669A2.006,2.006,0,0,0,18.9,29.051a.589.589,0,0,0-.571-.715Z" transform="translate(-9.63 -12.72)" fill="#339696"/>
            <path id="Path_19091" data-name="Path 19091" d="M20.975,17.261c-.693-.913-2.056-1.449-2.056-5.538,0-4.2-1.854-5.885-3.581-6.289-.162-.04-.279-.094-.279-.265v-.13A1.1,1.1,0,0,0,13.98,3.93h-.027a1.1,1.1,0,0,0-1.08,1.107v.13c0,.166-.117.225-.279.265-1.732.409-3.581,2.092-3.581,6.289,0,4.089-1.363,4.62-2.056,5.538a.893.893,0,0,0,.715,1.431h12.6A.894.894,0,0,0,20.975,17.261Zm-1.755.261H8.729a.2.2,0,0,1-.148-.328,5.45,5.45,0,0,0,.945-1.5,10.2,10.2,0,0,0,.643-3.968,6.9,6.9,0,0,1,.94-3.905A2.887,2.887,0,0,1,12.85,6.576a1.577,1.577,0,0,0,.837-.472.356.356,0,0,1,.535-.009,1.63,1.63,0,0,0,.846.481,2.887,2.887,0,0,1,1.741,1.242,6.9,6.9,0,0,1,.94,3.905,10.2,10.2,0,0,0,.643,3.968,5.512,5.512,0,0,0,.967,1.525A.186.186,0,0,1,19.221,17.522Z" transform="translate(-6.775 -3.93)" fill="#339696"/>
          </svg>';
        $color     = "primary";
        $order     = $serviceRequest->name;
        storeAndPushNotificationBasedEmployee($order, $titleAr, $titleEn, $messageAr, $messageEn, $icon, $color, route('dashboard.services.request'));
    }
    protected static function newAssignOrderNotification($order)
    {
        $titleAr   = "تعيين طلب جديد";
        $titleEn   = "assign a new order";
        $messageAr = "تم تعيين طلب جديد اليك. يرجى المتابعة";
        $messageEn = "A new order has been assigned to you. Please proceedز";
        $icon      = '<svg id="Icon_ionic-ios-notifications-outline" data-name="Icon ionic-ios-notifications-outline" xmlns="http://www.w3.org/2000/svg" width="14.381" height="18" viewBox="0 0 14.381 18">
            <path id="Path_19090" data-name="Path 19090" d="M18.328,28.336a.583.583,0,0,0-.571.459,1.127,1.127,0,0,1-.225.49.85.85,0,0,1-.724.265.864.864,0,0,1-.724-.265,1.127,1.127,0,0,1-.225-.49.583.583,0,0,0-.571-.459h0a.587.587,0,0,0-.571.715,2.01,2.01,0,0,0,2.092,1.669A2.006,2.006,0,0,0,18.9,29.051a.589.589,0,0,0-.571-.715Z" transform="translate(-9.63 -12.72)" fill="#339696"/>
            <path id="Path_19091" data-name="Path 19091" d="M20.975,17.261c-.693-.913-2.056-1.449-2.056-5.538,0-4.2-1.854-5.885-3.581-6.289-.162-.04-.279-.094-.279-.265v-.13A1.1,1.1,0,0,0,13.98,3.93h-.027a1.1,1.1,0,0,0-1.08,1.107v.13c0,.166-.117.225-.279.265-1.732.409-3.581,2.092-3.581,6.289,0,4.089-1.363,4.62-2.056,5.538a.893.893,0,0,0,.715,1.431h12.6A.894.894,0,0,0,20.975,17.261Zm-1.755.261H8.729a.2.2,0,0,1-.148-.328,5.45,5.45,0,0,0,.945-1.5,10.2,10.2,0,0,0,.643-3.968,6.9,6.9,0,0,1,.94-3.905A2.887,2.887,0,0,1,12.85,6.576a1.577,1.577,0,0,0,.837-.472.356.356,0,0,1,.535-.009,1.63,1.63,0,0,0,.846.481,2.887,2.887,0,0,1,1.741,1.242,6.9,6.9,0,0,1,.94,3.905,10.2,10.2,0,0,0,.643,3.968,5.512,5.512,0,0,0,.967,1.525A.186.186,0,0,1,19.221,17.522Z" transform="translate(-6.775 -3.93)" fill="#339696"/>
          </svg>';
        $color     = "primary";
        storeAndPushNotificationBasedEmployee($order, $titleAr, $titleEn, $messageAr, $messageEn, $icon, $color, route('dashboard.orders.show', $order->id));
    }
}
