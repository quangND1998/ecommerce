<div class="bg-gray-100 min-[320px]:pt-5">
    <div class="container   top-55 rounded min-[320px]:flex-wrap sm:flex-wrap md:flex-wrap lg:flex-wrap xl:flex xl:mx-auto 2xl:flex 2xl:mx-auto sm:m-0 flex">
        <div class="min-[320px]:w-full min-[320px]:mb-5  sm:w-full md:w-full lg:w-full xl:w-2/6 2xl:w-2/6">
            <div class="logo ">
                <img class="" src="img/logo.png" alt="">
            </div>
            <label for="small" class="mt-3 mb-3 block mb-2 font-bold text-xl dark:text-white rounded">{{ $setting->company_name }}</label>
            <ul>
                <li class="flex items-center">
                    <i class="fa fa-envelope text_sm p-2 color_gray" aria-hidden="true"></i>
                    <label for="small" class="block mb-2 text-sm text_base dark:text-white">{{ $setting->email }}</label>
    
                </li>
                <li class="flex">
                    <i class="fa fa-map-marker text_sm p-2 color_gray" aria-hidden="true"></i>
                    <label for="small" class="block mb-2 text-sm text_base dark:text-white">{{ $setting->address }}</label>
    
                </li>
                <li class="flex items-center">
                    <img class="img_icon" src="img/icon_tax.png" alt="">
    
                    <label for="small" class="block mb-2 text-sm text_base dark:text-white">MST:
                        {{ $setting->tax_code }}</label>
    
                </li>
            </ul>
        </div>
        <div class="min-[320px]:w-full min-[320px]:mb-5  sm:w-1/3  sm:my-4 md:w-1/4  lg:w-1/4 xl:w-1/6 2xl:w-1/6">
            <label for="small" class="block mb-2 font-bold text-xl  dark:text-white rounded mb-4">SẢN PHẨM</label>
            <ul>
                <li >
                    <a for="small" class="hover:no-underline cursor-pointer  block mb-2 text-sm text_base dark:text-white">Hộp carton</a>
                </li>
                <li >
                    <a for="small" class="hover:no-underline cursor-pointer block mb-2 text-sm text_base dark:text-white">Xốp nổ</a>
                </li>
                <li >
                    <a for="small" class="hover:no-underline cursor-pointer block mb-2 text-sm text_base dark:text-white">Băng dính</a>
                </li>
            </ul>
        </div>
        <div class="min-[320px]:w-full min-[320px]:mb-5  sm:w-1/3 sm:my-4 md:w-1/4 lg:w-1/4 xl:w-1/6 2xl:w-1/6">
            <label for="small" class="block mb-2 font-bold text-xl  dark:text-white rounded mb-4">THÔNG TIN</label>
            <ul>
                <li >
                    <a for="small" class="hover:no-underline cursor-pointer block mb-2 text-sm text_base dark:text-white">Về chúng tôi</a>
                </li>
                <li >
                    <a for="small" class="hover:no-underline cursor-pointer block mb-2 text-sm text_base dark:text-white">Blog</a>
                </li>
                <li >
                    <a for="small" class="hover:no-underline cursor-pointer block mb-2 text-sm text_base dark:text-white">Chính sách bảo mật</a>
                </li>
                <li >
                    <a for="small" class="hover:no-underline cursor-pointer block mb-2 text-sm text_base dark:text-white">Điều khoản sử dụng</a>
                </li>
            </ul>
        </div>
        <div class="min-[320px]:w-full min-[320px]:mb-5 sm:w-1/3 sm:my-4 md:w-1/4 lg:w-1/4  xl:w-1/6 2xl:w-1/6">
            <label for="small" class="block mb-2 font-bold text-xl  dark:text-white rounded mb-4">LIÊN HỆ</label>
            <ul>
                <li class="flex">
                    <a href=""><img src="img/zalo.png" alt=""></a>
                    <a href=""><img src="img/fb.png" alt=""></a>
                </li>
                <li >
                    <a for="small" class="hover:no-underline cursor-pointer block mb-2 text-sm text_base dark:text-white">Hotline {{ $setting->hotline }}</a>
                </li>
                <li >
                    <a for="small" class="hover:no-underline cursor-pointer block mb-2 text-sm text_base font-bold dark:text-white">{{ $setting->zalo }}</a>
                </li>
            </ul>
        </div>
        <div class="min-[320px]:w-full sm:w-full sm:my-5 md:w-1/4 lg:w-1/4 xl:w-1/6 2xl:w-1/6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.8659405900994!2d105.79186327512825!3d20.99801028064361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ada7b959f623%3A0x518b1ac55b68b182!2sHolomia!5e0!3m2!1svi!2s!4v1681167678294!5m2!1svi!2s"
            style="border:0;" class="min-[320px]:w-full sm:w-full" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="bg-gray-100 footer border py-2">
        <div class="container flex js_sp_betteen">
            <div class="logo_first">
                <img src="img/logo_footer.png" alt="">
            </div>
            <div class="paymen_method flex ">
                <label for="small" class="mr-4 block mb-2 text-sm text_base dark:text-white">Phương thức thanh toán:</label>
                <ul class="flex">
                    <li class="mr-4">
                        <img src="img/payment/bank.png" alt="">
                    </li>
                    <li class="mr-4">
                        <img src="img/payment/momo.png" alt="">
                    </li>
                    <li class="mr-4">
                        <img src="img/payment/zalo.png" alt="">
                    </li>
                    <li class="mr-4">
                        <img src="img/payment/shoppe.png" alt="">
                    </li>
                    <li class="mr-4">
                        <img src="img/payment/vnpay.png" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

