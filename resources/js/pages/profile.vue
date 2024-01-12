<template>
    <div class="container mx-auto pt-8 ">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-6 px-4">
      <div class="col-span-1 sm:col-span-2 lg:col-span-3">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex flex-col items-center">
                        <img
                            src="https://randomuser.me/api/portraits/men/94.jpg"
                            class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0"
                        />

                        <h1 class="text-xl font-bold">{{ user.name }}</h1>
                        <p class="text-gray-700">{{ user.email }}</p>
                        <div class="mt-6 flex flex-wrap gap-4 justify-center">
                            <a
                                href="#"
                                class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded"
                                >Contact</a
                            >
                            <a
                                href="#"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded"
                                >Resume</a
                            >
                        </div>
                    </div>
                    <hr class="my-6 border-t border-gray-300" />
                    <div class="flex flex-col">
                        <span
                            class="text-gray-700 uppercase font-bold tracking-wider text-center mb-2"
                            >Details</span
                        >
                    </div>
                </div>
            </div>
      <div class="col-span-1 sm:col-span-2 lg:col-span-9">
        <div class="bg-white shadow rounded-lg p-6">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                            <h2
                                class="mb-4 text-xl font-bold text-gray-900 dark:text-white"
                            >
                                Add a new product
                            </h2>
                            <form action="#">
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="sm:col-span-2">
                                        <label
                                            for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            >Product Name</label
                                        >
                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Type product name"
                                            required=""
                                        />
                                    </div>
                                    <div class="w-full">
                                        <label
                                            for="brand"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            >Brand</label
                                        >
                                        <input
                                            type="text"
                                            name="brand"
                                            id="brand"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Product brand"
                                            required=""
                                        />
                                    </div>
                                    <div class="w-full">
                                        <label
                                            for="price"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            >Price</label
                                        >
                                        <input
                                            type="number"
                                            name="price"
                                            id="price"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="$2999"
                                            required=""
                                        />
                                    </div>
                                    <div>
                                        <label
                                            for="category"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            >Category</label
                                        >
                                        <select
                                            id="category"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        >
                                            <option selected="">
                                                Select category
                                            </option>
                                            <option value="TV">
                                                TV/Monitors
                                            </option>
                                            <option value="PC">PC</option>
                                            <option value="GA">
                                                Gaming/Console
                                            </option>
                                            <option value="PH">Phones</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label
                                            for="item-weight"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            >Item Weight (kg)</label
                                        >
                                        <input
                                            type="number"
                                            name="item-weight"
                                            id="item-weight"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="12"
                                            required=""
                                        />
                                    </div>

                                </div>
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
                                >
                                    Add product
                                </button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
      data() {
    return {
      user: {},

    };
  },
  mounted() {
    axios
      .get("/api/user")
      .then((response) => {
        this.user = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
