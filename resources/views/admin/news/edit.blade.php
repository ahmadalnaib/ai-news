<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          تحديث الأخبار 
        </h2>
    </x-slot>
  
    <section class="text-gray-600 body-font overflow-hidden">
      <div class="w-full md:w-1/2 py-24 mx-auto">
       
          @if($errors->any())
              <div class="mb-4 p-4 bg-red-200 text-red-800">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form
              action="{{ route('admin.news.update',$news->slug) }}"
              id="payment_form"
              method="post"
              enctype="multipart/form-data"
              class="bg-gray-100 p-4"
          >
              @csrf
              @method('put')
              
              <div class="mb-4 mx-2">
                  <x-input-label for="title" value="عنوان الوظيفة" />
                  <x-text-input
                      id="title"
                      class="block mt-1 w-full"
                      type="text"
                      name="title"
                      value="{{ $news->title }}"
                      required />
              </div>
            
              <div class="mb-4 mx-2">
                  <x-input-label for="logo" value="شعار الشركة" />
                  <x-text-input
                      id="logo"
                      class="block mt-1 w-full"
                      type="file"
                      name="image" />
                      
              </div>
           
              <div class="mb-4 mx-2">
                  <x-input-label for="apply_link" value="رابط التقديم" />
                  <x-text-input
                      id="apply_link"
                      class="block mt-1 w-full"
                      type="text"
                      name="link"
                      value="{{ $news->link }}"
                      required />
              </div>
              <div class="mb-4 mx-2">
                  <x-input-label for="tags" value="العلامات (افصل بينها بفاصلة)" />
                  <x-text-input
                      id="tags"
                      class="block mt-1 w-full"
                      type="text"
                      name="tags"
                      value="{{ $news->tags->pluck('name')->implode(',') }}"
                       />
                      
              </div>
              <div class="mb-4 mx-2">
                  <x-input-label for="content" value="محتوى القائمة (Markdown مقبول)" />
                  <textarea
                      id="content"
                      rows="8"
                      class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full ckeditor"
                      name="description"
                  >{{ $news->description }}</textarea>
              </div>
              <div class="mb-4 mx-2">
                  <label for="is_highlighted" class="inline-flex items-center font-medium text-sm text-gray-700">
                      <input
                          type="checkbox"
                          id="is_highlighted"
                          name="is_highlighted"
                          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                          @if($news->is_highlighted) checked @endif>
                      <span class="ml-2">تمييز هذا الخبر</span>
                  </label>
              </div>
              
              <div class="mb-4 mx-2">
                  <label for="is_published" class="inline-flex items-center font-medium text-sm text-gray-700">
                      <input
                          type="checkbox"
                          id="is_published"
                          name="is_published"
                          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                          @if($news->is_published) checked @endif>
                      <span class="ml-2">نشر هذا الخبر</span>
                  </label>
              </div>
             
              <div class="mb-2 mx-2">
               
                  <button type="submit" id="form_submit" class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0"> استمر</button>
              </div>
          </form>
      </div>
  </section>
  </x-app-layout>