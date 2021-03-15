<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-center">
                        <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Create Article</h1>
                    </div>
                    <div class="m-7">
                        <form action="{{url('/articles')}}" method="post" enctype="multipart/form-data" id="form">
                            <div class="mb-6">
                                <label for="first_name"
                                    class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Title</label>
                                <input type="text" name="title" id="title"
                                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                            </div>
                            <div class="mb-6">
                                <label for="body"
                                    class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Body</label>
                                <textarea type="text" name="body" id="body"
                                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"></textarea>
                            </div>
                            <div class="mb-6">
                                <label for="categories"
                                    class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Categories</label>
                                <select name="category_id"
                                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="article_image"
                                    class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Article Image</label>
                                <input type="file" class="h-full w-full" name="article_image">
                            </div>
                            <div class="mb-6">
                                <x-button ::class="{ danger: isDeleting }">
                                    Submit
                                </x-button>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
