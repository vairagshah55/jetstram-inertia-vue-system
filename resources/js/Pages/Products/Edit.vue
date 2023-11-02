<script >
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';

export default {
    components: {
        InputError,
        AppLayout,
        Link,
    },
    props: {
        product: Object,
    },
    remember: 'form',
    data() {
        return {
            form: this.$inertia.form({
                _method: 'put',
                first_name: this.product.first_name,
                last_name: this.product.last_name,
                manufacturer_date: this.product.manufacturer_date,
                product_name: this.product.product_name,
                product_mrp: this.product.product_mrp,
                // product_img: this.product.product_img,
            }),

        }
    },
    methods: {

        update() {
            console.log("update in", `/products/${this.product.id}/edit`)
            this.form.post(`/products/${this.product.id}/edit`)
        },
    },
}
</script>


<template>
    <AppLayout title="Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Product Details
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="mt-2 p-4 mb-4 col-span-full xl:mb-0">
                        <nav class="flex mb-5" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                                <li class="inline-flex items-center">
                                    <Link href="/dashboard"
                                        class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                        </path>
                                    </svg>
                                    Home
                                    </Link>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <a href="/products/list"
                                            class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">eVital-App</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Edit
                                        </span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Edit Product Details
                        </h1>
                    </div>
                    <div class="p-4 col-span-2">
                        <div
                            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">

                            <form @submit.prevent="update">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-12 sm:col-span-3">
                                        <label for="first_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                            Name :</label>
                                        <input type="text" v-model="form.first_name" name="first_name" id="first_name"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="First Name">
                                        <InputError class="mt-2" :message="form.errors.first_name" />
                                    </div>
                                    <div class="col-span-12 sm:col-span-3">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                            Name :</label>
                                        <input type="text" v-model="form.last_name" name="last_name" id="last_name"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Last Name">
                                        <InputError class="mt-2" :message="form.errors.last_name" />
                                    </div>
                                    <div class="col-span-12 sm:col-span-3">
                                        <label for="product_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                            Name :
                                        </label>
                                        <input type="text" v-model="form.product_name" name="product_name" id="product_name"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Product Name">
                                        <InputError class="mt-2" :message="form.errors.product_name" />
                                    </div>
                                    <div class="col-span-12 sm:col-span-3">
                                        <label for="manufacturer_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Manufacturer
                                            Date :</label>
                                        <input type="date" name="manufacturer_date" id="manufacturer_date"
                                            v-model="form.manufacturer_date"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="manufacturer_date">
                                        <InputError class="mt-2" :message="form.errors.manufacturer_date" />
                                    </div>

                                    <div class="col-span-12 sm:col-span-3">
                                        <label for="product_mrp"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            MRP ( RS ) :
                                        </label>
                                        <input type="text" v-model="form.product_mrp" name="product_mrp" id="product_mrp"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Product MRP">
                                        <InputError class="mt-2" :message="form.errors.product_mrp" />
                                    </div>

                                    <!-- <img v-if="form.product_img" class="block ml-4 w-8 h-8 rounded-full" :src="form.product_img" />
                                    <div class="col-span-12 sm:col-span-3">
                                        <label for="product_img"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Profile :
                                        </label>
                                        <FileInput type="file" v-model="form.product_img" name="product_img"
                                            id="product_img"
                                            class="shadow-sm text-gray-900 sm:text-sm  focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            accept="image/*" />

                                        <InputError class="mt-2" :message="form.errors.product_img" />
                                    </div> -->

                                    <div class="text-center col-span-6 sm:col-full">
                                        <button :loading="form.processing" type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>