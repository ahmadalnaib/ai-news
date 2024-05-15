<x-app-layout>
  <section class="text-gray-600 body-font overflow-hidden">
      <div class="container px-5 py-12 mx-auto">
    
        <div class="mb-12 flex items-center justify-between">
            <h2 class="text-2xl font-medium text-gray-900 title-font px-4">
                الاخبار({{ $news->count() }})
            </h2>
            <a href="{{ route('admin.news.create') }}" class="inline-block bg-black hover:bg-black text-white font-bold py-2 px-4 rounded">انشاء خبر جديد</a>
        </div>
          <div class="-my-6">
              @foreach($news as $new)
                  <div
                 
                      class="py-6 px-4 flex flex-wrap md:flex-nowrap border-b border-gray-100 {{ $new->is_highlighted ? 'bg-yellow-100 hover:bg-yellow-200' : 'bg-white hover:bg-gray-100' }}"
                  >
                      <div class="md:w-16 md:mb-0 mb-6 mr-4 flex-shrink-0 flex flex-col">
                          <img src="/storage/{{ $new->image }}" class="w-16 h-16 rounded-full object-cover">
                      </div>
                      <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                          <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $new->title }}</h2>
                          <p class="leading-relaxed text-gray-900">{{ $new->created_at->format('Y-m-d') }}&mdash; <span class="text-gray-600">{{ $new->location }}</span></p>
                      </div>
                    
                      <span class="md:flex-grow flex flex-col items-end justify-center">
                        <div>

                        </div>
                        <a href="{{route('admin.news.edit',$new->slug)}}" class="btn btn-primary"> <i class="bi bi-pencil-square"></i>تعديل</a>
                        <form action="{{route('admin.news.destroy',$new->slug)}}" method="post">
                          @csrf
                          @method('delete')
                          <button  onclick="return confirm('هل متاكد من المسح')"  class="btn btn-danger" type="submit">مسح</button>
                      </form>
                      </span>
                  </div>
              @endforeach
          </div>
      </div>
  </section>
</x-app-layout>