@extends('v1.layout.email-layout')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation"
           style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
        <tbody>
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                       role="presentation"
                       style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F6F3F0; background-position: center top; color: #000000; width: 640px;"
                       width="640">
                    <tbody>
                    <tr>
                        <td class="column column-1"
                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 15px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                            width="100%">
                            <table border="0" cellpadding="0" cellspacing="0" class="text_block"
                                   role="presentation"
                                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                   width="100%">
                                <tr>
                                    <td style="padding-left:30px;padding-right:30px;">

                                        <div style="font-family: Tahoma, Verdana, sans-serif">
                                            <strong><b>Order Successful</b></strong>
                                            <div class="txtTinyMce-wrapper"
                                                 style="font-family: Tahoma, Verdana, Segoe, sans-serif; font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #2b2d49; line-height: 1.2;margin-top:20px ">
                                                <p style="margin: 0; font-size: 16px; text-align: left; letter-spacing: normal;">
                                                            <span style="font-size:15px;">Dear {{ucfirst($fullName)}}<br><br>
                                                               Thank you for shopping on Kosman wine store! <br><br>
                                                                Your order <b>{{$orderTrackingId}}</b> has been confirmed successfully. <br><br>
                                                               It will be packed and shipped as soon as possible.
                                                                You will receive a notification from us once the item(s) are ready for delivery
                                                                <br><br><br>
                                                            </span>
                                                </p>
                                                <span style="font-size: 15px;"><strong>You ordered for</strong></span></p>
                                                <p style="margin: 0; font-size: 16px; letter-spacing: normal; mso-line-height-alt: 14.399999999999999px;"></p>
                                                <p style="margin: 0; font-size: 10px; letter-spacing: normal; mso-line-height-alt: 14.399999999999999px;">
                                                <div style="overflow-x:auto">


                                                <table border="0" cellpadding="0" cellspacing="0" class="text_block"
                                                       role="presentation"
                                                       style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                       width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th style="padding-left:30px;padding-right:30px;padding-top:10px; border-bottom: 2px solid darkgray" >
                                                            <h3><b>Image</b></h3>
                                                        </th>
                                                        <th style="padding-left:30px;padding-right:30px;padding-top:10px; border-bottom: 2px solid darkgray" >
                                                            <h3><b>Item</b></h3>
                                                        </th>
                                                        <th style="padding-left:30px;padding-right:30px;padding-top:10px; border-bottom: 2px solid darkgray" >
                                                            <h3><b>Qty</b></h3>
                                                        </th>
                                                        <th style="padding-left:30px;padding-right:30px;padding-top:10px; border-bottom: 2px solid darkgray">
                                                            <h3>Price</h3>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($products as $product)
                                                        <tr>
                                                            <td style="width: 50px;padding-left:30px;padding-right:30px;padding-top:10px;border-bottom: 0.5px solid gainsboro">
                                                                <img width="50px" src={{$product->productImage}}>
                                                            </td>
                                                            <td style="padding-left:30px;padding-right:30px;padding-top:10px; border-bottom: 0.5px solid gainsboro">
                                                                <h4>{{$product->productName}}</h4>
                                                            </td>
                                                            <td style="padding-left:30px;padding-right:30px;padding-top:10px; border-bottom: 0.5px solid gainsboro">
                                                                <h4>{{$product->productQuantity}}</h4>
                                                            </td>
                                                            <td style="padding-left:30px;padding-right:30px;padding-top:10px; border-bottom: 0.5px solid gainsboro">
                                                                <h4>₦{{$product->productTotalAmount}}</h4>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                </div>

                            <table border="0" cellpadding="0" cellspacing="0" class="text_block"
                                   role="presentation"
                                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                   width="100%">
                                <tr>
                                    <td style="padding-left:30px;padding-right:30px;">

                                        <div style="font-family: Tahoma, Verdana, sans-serif">
                                            <div class="txtTinyMce-wrapper"
                                                 style="font-family: Tahoma, Verdana, Segoe, sans-serif; font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #2b2d49; line-height: 1.2;margin-top:20px ">
                                                <table border="0" cellpadding="0" cellspacing="0" class="text_block"
                                                       role="presentation"
                                                       style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                       width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td style="padding-left:30px;padding-right:30px;padding-top:0px;" >
                                                            <h3><b> </b></h3>
                                                        </td>
                                                        <td style="padding-left:30px;padding-right:30px;padding-top:0px;" >
                                                            <h3><b> </b></h3>
                                                        </td>
                                                        <td style="padding-left:30px;padding-right:30px;padding-top:0px; border-bottom: 0.5px solid gainsboro" >
                                                            <h4>SubTotal</h4>
                                                        </td>
                                                        <td style="padding-left:30px;padding-right:30px;padding-top:0px; border-bottom: 0.5px solid gainsboro">
                                                            <h4>₦{{$orderSubTotal}}</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left:30px;padding-right:30px;padding-top:0px;" >
                                                            <h3><b> </b></h3>
                                                        </td>
                                                        <td style="padding-left:30px;padding-right:30px;padding-top:0px;" >
                                                            <h3><b> </b></h3>
                                                        </td>
                                                        <td style="padding-left:30px;padding-right:30px;padding-top:0px; border-bottom: 0.5px solid gainsboro" >
                                                            <h4>Delivery Fee</h4>
                                                        </td>
                                                        <td style="padding-left:30px;padding-right:30px;padding-top:0px; border-bottom: 0.5px solid gainsboro">
                                                            <h4>₦{{$orderDeliveryFee}}</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left:30px;height:20px;padding-right:30px;padding-top:0px;" >
                                                            <h3><b> </b></h3>
                                                        </td>
                                                        <td style="padding-left:30px;height:20px;padding-right:30px;padding-top:0px;" >
                                                            <h3><b> </b></h3>
                                                        </td>
                                                        <td style="height:20px;padding-left:30px;padding-right:30px;padding-top:0px; border-bottom: 2px solid black" >
                                                            <h4>Discount</h4>
                                                        </td>
                                                        <td style="height:20px;padding-left:30px;padding-right:30px;padding-top:0px; border-bottom: 2px solid black">
                                                            <h4>₦0</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left:30px;padding-right:30px;padding-top:0px;" >
                                                            <h3><b> </b></h3>
                                                        </td>
                                                        <td style="padding-left:30px;padding-right:30px;padding-top:0px;" >
                                                            <h3><b> </b></h3>
                                                        </td>
                                                        <td style="height:30px;padding-left:30px;padding-right:30px; border-bottom: 2px solid black" >
                                                            <h2><b>Total</b></h2>
                                                        </td>
                                                        <td style="height:30px;padding-left:30px;padding-right:30px;border-bottom: 2px solid black">
                                                            <h4>₦{{$orderTotal}}</h4>
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 40px;"></tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" class="text_block"
                                                       role="presentation"
                                                       style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                       width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td style="" >
                                                            <span style="font-size:15px;">
                                                                <strong>Recepients Details</strong></span>
                                                        </td>
                                                        <td style="padding-left:30px;">
                                                            <h3><strong>Delivery Address</strong></h3>
                                                        </td>
                                                        <td style="">
                                                            <h3><strong>Estimated Delivery Date </strong></h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:150px;border-bottom: 0.5px solid gainsboro">
                                                            <span style="font-size:15px;"></span>
                                                            {{$fullName}} {{$customerPhone}}
                                                        </td>
                                                        <td style="padding-left:30px; border-bottom: 0.5px solid gainsboro">
                                                            <span style="font-size:15px;"></span>
                                                            {{$orderDetailAddress}}
                                                            <h5></h5>
                                                        </td>
                                                        <td style=" border-bottom: 0.5px solid gainsboro">
                                                            <span style="font-size:15px;"></span>
                                                            {{$orderDeliveryEstimatedDate}}
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation"
           style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
        <tbody>
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                       role="presentation"
                       style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F6F3F0; color: #000000; width: 640px;"
                       width="640">
                    <tbody>
                    <tr>
                        <td class="column column-1"
                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 10px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                            width="100%">
                            <div class="spacer_block" style="height:20px;line-height:20px;font-size:1px;"> </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endsection

