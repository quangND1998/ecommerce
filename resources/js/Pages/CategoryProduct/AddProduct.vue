<template>
    <section class="content">

        <Head title="Thêm sản phẩm"></Head>
        <!-- Modal -->
        <div>
            <div class="m-8">
                <div class="p-4">
                    <div class="my-3 flex">
                        <button class="px-3 mr-4 py-1 bg-white border rounded-lg"><font-awesome-icon
                                :icon="['fas', 'chevron-left']" /></button>
                        <div class="block">
                            <p class="text-gray-500 text-xs">Trở về kho hàng</p>
                            <h2 class="font-semibold text-3xl flex mr-2">Thêm sản phẩm mới </h2>
                        </div>
                    </div>

                    <div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-2">
                                <div>
                                    <h3 class="font-semibold text-lg">Thông tin sản phẩm</h3>
                                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                        <div class="mb-6">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên
                                                sản phẩm</label>
                                            <input
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Nhập tên sản phẩm">
                                        </div>
                                        <div class="mb-6">
                                            <label for=""
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mô tả
                                                sản phẩm</label>

                                            <form>
                                                <div
                                                    class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                                    <div
                                                        class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
                                                        <div
                                                            class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600">
                                                            <div class="flex items-center space-x-1 sm:pr-4">
                                                                <button type="button"
                                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Attach file</span>
                                                                </button>
                                                                <button type="button"
                                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Embed map</span>
                                                                </button>
                                                                <button type="button"
                                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Upload image</span>
                                                                </button>
                                                                <button type="button"
                                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Format code</span>
                                                                </button>
                                                                <button type="button"
                                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Add emoji</span>
                                                                </button>
                                                            </div>
                                                            <div class="flex flex-wrap items-center space-x-1 sm:pl-4">
                                                                <button type="button"
                                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Add list</span>
                                                                </button>
                                                                <button type="button"
                                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Settings</span>
                                                                </button>
                                                                <button type="button"
                                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Timeline</span>
                                                                </button>
                                                                <button type="button"
                                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Download</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <button type="button" data-tooltip-target="tooltip-fullscreen"
                                                            class="p-2 text-gray-500 rounded cursor-pointer sm:ml-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 11-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="sr-only">Full screen</span>
                                                        </button>
                                                        <div id="tooltip-fullscreen" role="tooltip"
                                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                            Show full screen
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    </div>
                                                    <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                                                        <label for="editor" class="sr-only">Publish post</label>
                                                        <textarea id="editor" rows="8"
                                                            class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                                            placeholder="Nhập mô tả" required></textarea>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                    </form>
                                </div>

                                <div>
                                    <h3 class="font-semibold text-lg">Hình ảnh</h3>
                                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                        <div data-v-24fde35b="" class="text-center my-3">
                                            <div data-v-24fde35b="" class="flex items-center justify-center w-full">
                                                <label data-v-24fde35b="" for="dropzone-file"
                                                    class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div data-v-24fde35b=""
                                                        class="flex flex-col items-center justify-center pt-2 pb-3">
                                                        <svg data-v-24fde35b="" aria-hidden="true" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="w-10 h-10 mb-3 text-gray-400">
                                                            <path data-v-24fde35b="" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                            </path>
                                                        </svg>
                                                        <p data-v-24fde35b=""
                                                            class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                                data-v-24fde35b="" class="font-semibold">Click to
                                                                upload</span> or drag and drop
                                                        </p>
                                                        <p data-v-24fde35b=""
                                                            class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG
                                                            or GIF (MAX. 40x40px)</p>
                                                    </div> <input data-v-24fde35b="" id="dropzone-file" type="file"
                                                        accept="image/*" class="hidden">
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg">Mẫu mã</h3>
                                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                        <div class="flex mb-4 my-3">
                                            <div class="w-1/2 mr-2 h-12">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sóng
                                                    giấy</label>
                                                <select id="countries"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mr-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>Chọn giấy sóng</option>
                                                    <option value="US">Còn hàng</option>
                                                    <option value="CA">Hết hàng</option>

                                                </select>
                                            </div>
                                            <div class="w-1/2 ml-2  h-12">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số
                                                    lớp</label>
                                                <select id="countries"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mr-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>Chọn số lớp</option>
                                                    <option value="US">Còn hàng</option>
                                                    <option value="CA">Hết hàng</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="block mb-4 ">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kích
                                                thước</label>
                                            <div class="flex">
                                                <div class="w-1/3 mr-2 h-12">
                                                    <input
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Chiều dài">
                                                </div>
                                                <div class="w-1/3 ml-2 h-12">
                                                    <input
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Chiều rộng">
                                                </div>
                                                <div class="w-1/3  ml-2 h-12">
                                                    <input
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Chiều cao">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="flex mb-4 ">
                                            <div class="w-1/2 h-12">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mặt
                                                    giấy</label>
                                                <select id="countries"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mr-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>Chọn giấy sóng</option>
                                                    <option value="US">Còn hàng</option>
                                                    <option value="CA">Hết hàng</option>

                                                </select>
                                            </div>
                                            <div class="w-1/2  h-12">

                                            </div>
                                        </div>
                                        <div class="mt-5 mb-4 ">
                                            <hr class="mt-3">
                                        </div>

                                        <div class="flex mb-4">
                                            <div class="w-1/2 h-12">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKU</label>
                                                <input
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="w-1/2  h-12">

                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Định giá</h3>
                                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                    <div class="mb-6">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Giá
                                            bán</label>
                                        <input
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    <div class="mb-6">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Giá gốc
                                        </label>
                                        <input
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                </form>
                                <div>
                                <h3 class="font-semibold text-lg">Số lượng</h3>
                                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                    <div class="mb-6">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tình
                                            trạng</label>
                                        <select id="countries"
                                            class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mr-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Tình trạng</option>
                                            <option value="US">Còn hàng</option>
                                            <option value="CA">Hết hàng</option>

                                        </select>
                                    </div>
                                    <div class="mb-6">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số
                                            lượng đã bán </label>
                                        <select id="countries"
                                            class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mr-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Auto</option>
                                            <option value="US">Auto 1</option>
                                            <option value="CA">Auto 2</option>

                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Danh mục sản phẩm</h3>
                                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                    <div class="mb-6">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Danh
                                            mục sản phẩm</label>
                                        <select id="countries"
                                            class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mr-3 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Hộp carton 3 lớp</option>
                                            <option value="US">Xốp nổ</option>
                                            <option value="CA">Băng dính</option>

                                        </select>
                                    </div>

                                </form>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Công cụ tìm kiếm</h3>
                                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                    <h4 class="text-blue-600 font-semibold">Tên sản phẩm</h4>
                                    <a href=""
                                        class="block text-blue-300">https://cartonlebui.com/hop-carton-3-lop/ten-san-pham</a>
                                    <span class="text-gray-500 text-xs">mô tả sản phẩm</span>

                                    <div class="mb-6">
                                        <h4 class="text-gray-500 text-lg">URL</h4>
                                        <input
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="my-3 justify-between text-end">
                        <a class="text-red-600 flex cursor-pointer">
                            <font-awesome-icon :icon="['fas', 'trash']" />
                            <p class="ml-3">Xóa sản phẩm</p>
                        </a>
                        <button class="px-3 py-2 rounded-lg bg-primary text-white">Lưu </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section></template>
  
<script>
import { Link, Head } from "@inertiajs/inertia-vue";
import Layout from "@/Components/Layout/Layout";
import Alert from "@/Components/Alert";
import SearchCategory from "@/Pages/CategoryProduct/SearchCategory";
export default {
    layout: Layout,
    components: {
        Link,
        Alert,
        SearchCategory,
        Head
    },
    props: {
        categories: Array,
        errors: Object
    },
    data() {
        return {

        };
    },
    mounted: function () {
        $(".list_icon_crud").hide();
        $(".item_crud").click(function (e) {
            $(".list_icon_crud").hide();
            e.preventDefault();
            //   $(this).next(".list_icon_crud").css("display","inline-grid");
            $(this).next(".list_icon_crud").slideToggle();
        })
    },
    methods: {


    }
};
</script>
  
<style scoped>.list_icon_crud {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;

    right: -40px;
    top: 20px;
    z-index: 111;
    display: inline-grid;
}

.btn_crud {
    font-size: 20px;
}</style>